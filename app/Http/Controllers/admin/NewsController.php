<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\News;
use Validator;

class NewsController extends Controller
{
    public function category()
    {
    	$categories =Category::all();
    	return view('admin.news.category.index',compact('categories'));
    }

    public function category_create()
    {
    	return view('admin.news.category.create');
    }

    public function category_store(Request $request)
    {

    if ($request->ajax()) {
      $validator = Validator::make($request->all(), [
         'name' => 'required|string',
         'banner' => 'mimes:jpeg,bmp,png,jpg|max:3000',

      ]);

      if ($validator->fails()) {
        return response()->json(['success' => false, 'status' => 'danger', 'message' => $validator->errors()]);
      }
      	$category =new Category;
         if($request->hasFile('banner')) {
              $storagepath = $request->file('banner')->store('public/news/category');
              $fileName = basename($storagepath);
              $category->banner = $fileName;
          }

          $category->name =$request->name;
          $category->save();
          return response()->json(['success' => true, 'status' => 'success', 'message' => 'News Category Add Successfully.','goto'=>route('admin.news.category')]);
	  	}
	   }

	   public function category_edit($id)
	   {
	   	$category =Category::find($id);
	   	return view('admin.news.category.edit',compact('category'));
	   }

	   public function category_update(Request $request)
	   {

	  if ($request->ajax()) {
      $validator = Validator::make($request->all(), [
         'name' => 'required|string',
         'banner' => 'mimes:jpeg,bmp,png,jpg|max:3000',

      ]);

      if ($validator->fails()) {
        return response()->json(['success' => false, 'status' => 'danger', 'message' => $validator->errors()]);
     	 }
      	$category =Category::find($request->id);

        if ($request->hasFile('banner')) {
        $storagepath = $request->file('banner')->store('public/news/category');
        $fileName = basename($storagepath);
        $category->banner = $fileName;

        //if file chnage then delete old one
        $oldFile = $request->get('oldbanner', '');
        if ($oldFile != '') {
          $file_path = "public/news/category" . $oldFile;
          Storage::delete($file_path);
        }
      }
      else {
        $category->banner = $request->get('oldbanner', '');
       }

          $category->name =$request->name;
          $category->save();
          return response()->json(['success' => true, 'status' => 'success', 'message' => 'News Category Update Successfully.','goto'=>route('admin.news.category')]);
	  	}
	   }

	   public function category_delete(Request $request,$id)
	   {
	   	if ($request->ajax()) {
	   		 $category = Category::find($id);
		      unlink('storage/news/category/'.$category->banner);
			 $category->delete();
			      if ($category) {
			         return response()->json(['success' => true, 'status' => 'success', 'message' => 'Category Information Delete Successfully.']);
			    }
	   	}
	   }

     /*::::::::::::::::::::::news:::::::::::::::::::*/
     public function news()
     {
      $news =News::all();
      return view('admin.news.index',compact('news'));
     }

     public function news_create()
     {
      $categories =Category::all();
      return view('admin.news.create',compact('categories'));
     }

     public function news_store(Request $request)
     {
      if ($request->ajax()) {
         $validator = Validator::make($request->all(), [
         'title' => 'required|string',
         'short_content' => 'required|string',
         'category_id' => 'required|string',
         'comment' => 'required|string',
         'date' => 'required|string',
         'news_content' => 'required|string',
         'banner' => 'required|mimes:jpeg,bmp,png,jpg|max:3000',
         'photo' => 'required|mimes:jpeg,bmp,png,jpg|max:3000',

         ]);

      if ($validator->fails()) {
        return response()->json(['success' => false, 'status' => 'danger', 'message' => $validator->errors()]);
      }

      $news =new News;
         if($request->hasFile('banner')) {
              $storagepath = $request->file('banner')->store('public/news/banner');
              $fileName = basename($storagepath);
              $news->banner = $fileName;
          }

          if($request->hasFile('photo')) {
              $storagepath = $request->file('photo')->store('public/news/photo');
              $fileName = basename($storagepath);
              $news->photo = $fileName;
          }

          $news->title=$request->title;
          $news->slug =str_slug($request->title);
          $news->short_content =$request->short_content;
          $news->category_id =$request->category_id;
          $news->comment =$request->comment;
          $news->date =$request->date;
          $news->news_content =$request->news_content;
          $news->meta_title =$request->meta_title;
          $news->meta_keywords =$request->meta_keywords;
          $news->meta_description =$request->meta_description;
          $news->save();
          return response()->json(['success' => true, 'status' => 'success', 'message' => 'News Content Upload Successfully.','goto'=>route('admin.news.blog')]);
      }
     }

     public function news_edit($id)
     {
      $news =News::find($id);
      $categories =Category::all();
      return view('admin.news.edit',compact('news','categories'));
     }

     public function news_update(Request $request)
     {
      if ($request->ajax()) {
         $validator = Validator::make($request->all(), [
         'title' => 'required|string',
         'short_content' => 'required|string',
         'category_id' => 'required|string',
         'comment' => 'required|string',
         'date' => 'required|string',
         'news_content' => 'required|string',
         'banner' => 'mimes:jpeg,bmp,png,jpg|max:3000',
         'photo' => 'mimes:jpeg,bmp,png,jpg|max:3000',

         ]);

        if ($validator->fails()) {
        return response()->json(['success' => false, 'status' => 'danger', 'message' => $validator->errors()]);
      }
       $news =News::find($request->id);

        if ($request->hasFile('banner')) {
        $storagepath = $request->file('banner')->store('public/news/banner');
        $fileName = basename($storagepath);
        $news->banner = $fileName;

        //if file chnage then delete old one
        $oldFile = $request->get('oldbanner', '');
        if ($oldFile != '') {
          $file_path = "public/news/banner" . $oldFile;
          Storage::delete($file_path);
        }
          }
      else {
        $news->banner = $request->get('oldbanner', '');
       }
       //

        if ($request->hasFile('photo')) {
        $storagepath = $request->file('photo')->store('public/news/photo');
        $fileName = basename($storagepath);
        $news->photo = $fileName;

        //if file chnage then delete old one
        $oldFile = $request->get('oldphoto', '');
        if ($oldFile != '') {
          $file_path = "public/news/photo" . $oldFile;
          Storage::delete($file_path);
        }
          }
      else {
        $news->photo = $request->get('oldphoto', '');
       }
          $news->title=$request->title;
          $news->slug =str_slug($request->title);
          $news->short_content =$request->short_content;
          $news->category_id =$request->category_id;
          $news->comment =$request->comment;
          $news->date =$request->date;
          $news->news_content =$request->news_content;
          $news->meta_title =$request->meta_title;
          $news->meta_keywords =$request->meta_keywords;
          $news->meta_description =$request->meta_description;
          $news->save();
          return response()->json(['success' => true, 'status' => 'success', 'message' => 'News Content Update Successfully.','goto'=>route('admin.news.blog')]);

      }
     }

     public function news_delete(Request $request,$id)
     {
      if ($request->ajax()) {
      $news = News::find($id);
      unlink('storage/news/photo/'.$news->photo);
      unlink('storage/news/banner/'.$news->banner);
      $news->delete();
      if ($news) {
         return response()->json(['success' => true, 'status' => 'success', 'message' => 'News Information Delete Successfully.']);
      }
    }
    }
}
