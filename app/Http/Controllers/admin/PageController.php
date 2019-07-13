<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Pages;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
   public function index()
   {
   	 $about = Pages::where('key', 'about')->select('key','value')->first();
   	 $contact = Pages::where('key', 'contact')->select('key','value')->first();
   	 $faq = Pages::where('key', 'faq')->select('key','value')->first();
   	 $aboutinfo =null;
   	 $contactinfo =null;
   	 $faqinfo =null;
   	 if ($about) {
   	 	$aboutinfo=json_decode($about->value);
   	 }
   	 if ($contact) {
   	 	$contactinfo=json_decode($contact->value);
   	 }

   	 if ($faq) {
   	 	$faqinfo=json_decode($faq->value);
   	 }
   	return view('admin.pages.index',compact('aboutinfo','contactinfo','faqinfo'));
   }

   public function store(Request $request)
   {
   	 if ($request->ajax()) {
   	 	 $validator = Validator::make($request->all(), [
         'abt_heading' => 'sometimes|nullable|string',
         'cnt_heading' => 'sometimes|nullable|string',
         'abt_content' => 'sometimes|nullable|string',
         'cnt_content' => 'sometimes|nullable|string',
         'about_banner' => 'mimes:jpeg,bmp,png,jpg|max:2000',
         'contact_banner' => 'mimes:jpeg,bmp,png,jpg|max:2000',
         'faq_banner' => 'mimes:jpeg,bmp,png,jpg|max:2000',

      ]);

      if ($validator->fails()) {
        return response()->json(['success' => false, 'status' => 'danger', 'message' => $validator->errors()]);
      }

        if($request->hasFile('about_banner')) {
                $storagepath = $request->file('about_banner')->store('public/pages/about');
                $fileName = basename($storagepath);
                $about['about_banner'] = $fileName;

                //if file chnage then delete old one
                $oldFile = $request->get('old_about_banner','');
                if( $oldFile != ''){
                    $file_path = "public/pages/about/".$oldFile;
                    Storage::delete($file_path);
                }
            }
            else{
                $about['about_banner'] = $request->get('old_about_banner','');
            }
            $about['abt_heading'] =$request->abt_heading;
            $about['abt_content'] =$request->abt_content;
            $about['abt_meta_title'] =$request->abt_meta_title;
            $about['abt_meta_keywords'] =$request->abt_meta_keywords;
            $about['abt_meta_description'] =$request->abt_meta_description;

              //now crate about page
            Pages::updateOrCreate(
                ['key' => 'about'],
                ['value' => json_encode($about)]
            );

            //Contact page
              if($request->hasFile('contact_banner')) {
                $storagepath = $request->file('contact_banner')->store('public/pages/contact');
                $fileName = basename($storagepath);
                $contact['contact_banner'] = $fileName;

                //if file chnage then delete old one
                $oldFile = $request->get('old_contact_banner','');
                if( $oldFile != ''){
                    $file_path = "public/pages/contact/".$oldFile;
                    Storage::delete($file_path);
                }
            }
            else{
                $contact['contact_banner'] = $request->get('old_contact_banner','');
            }
            $contact['cnt_heading'] =$request->cnt_heading;
            $contact['cnt_content'] =$request->cnt_content;
            $contact['cnt_meta_title'] =$request->cnt_meta_title;
            $contact['cnt_meta_keywords'] =$request->cnt_meta_keywords;
            $contact['cnt_meta_description'] =$request->cnt_meta_description;

              //now crate
            Pages::updateOrCreate(
                ['key' => 'contact'],
                ['value' => json_encode($contact)]
            );

            //faq page
              if($request->hasFile('faq_banner')) {
                $storagepath = $request->file('faq_banner')->store('public/pages/faq');
                $fileName = basename($storagepath);
                $faq['faq_banner'] = $fileName;

                //if file chnage then delete old one
                $oldFile = $request->get('old_faq_banner','');
                if( $oldFile != ''){
                    $file_path = "public/pages/faq/".$oldFile;
                    Storage::delete($file_path);
                }
            }
            else{
                $faq['faq_banner'] = $request->get('old_faq_banner','');
            }
            $faq['faq'] =$request->faq;

              //now crate
            Pages::updateOrCreate(
                ['key' => 'faq'],
                ['value' => json_encode($faq)]
            );
             return response()->json(['success' => true, 'status' => 'success', 'message' => 'Page Update Successfully.']);
   	 }
   }
}
