@extends('admin.layouts.master')
@section('pageTitle') Pages @endsection
@section('page-header')
<div class="page-header page-header-default">
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
            <li class="active">Page</li>
        </ul>
    </div>
</div>
@endsection
@section('content')
<div class="row">
    
        <div class="col-md-12">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h6 class="panel-title">Site Pages</h6>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="collapse"></a></li>
                            <li><a data-action="reload"></a></li>
                            <li><a data-action="close"></a></li>
                        </ul>
                    </div>
                </div>

                <div class="panel-body">
                    <div class="tabbable">
                        <ul class="nav nav-tabs nav-tabs-highlight nav-justified">
                            <li class="active"><a href="#highlighted-justified-tab1" data-toggle="tab">About Us</a></li>
                            <li><a href="#highlighted-justified-tab2" data-toggle="tab">Contact Us</a></li>

                              <li><a href="#highlighted-justified-tab3" data-toggle="tab">Faq Page</a></li>


                        
                        </ul>

                   <form action="{{ route('admin.page.update') }}"  method="post" enctype="multipart/form-data" id="pages">
                            <div class="tab-content">
                            <div class="tab-pane active" id="highlighted-justified-tab1">

                                 <div class="row">
                                <div class="col-md-12">
                                      <div class="form-group">
                                        <label>About Heading:</label>
                                        <input type="text" name="abt_heading" id="abt_heading" class="form-control" placeholder="About Heading" value="{{$aboutinfo?$aboutinfo->abt_heading:''}}">
                                    </div>
                                </div>

                                   <div class="col-md-12">
                                    <div class="form-group">
                                        <label>About Content:</label>
                                        <textarea rows="5" cols="5" class="form-control summernote" name="abt_content" id="abt_content" placeholder="About Content" style="resize: none;">{{$aboutinfo?$aboutinfo->abt_content:''}}</textarea>
                                    </div>
                                </div>

                                  <div class="col-md-6">
                                    <div class="form-group">
                                        <label>About Banner:</label>
                                        <input type="file" name="about_banner">
                                         @if($aboutinfo && isset($aboutinfo->about_banner))
                                            <input type="hidden" name="old_about_banner" value="{{$aboutinfo->about_banner}}">
                                         @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                @if($aboutinfo && isset($aboutinfo->about_banner))
                                    <img class="img-responsive img-thumbnail" src="{{asset('/storage/pages/about/'.$aboutinfo->about_banner)}}" alt="" width="120px">
                                    @endif
                                </div>
                            </div>
                              <div class="row">
                         <h4>SEO Information</h4>
                            <div class="col-md-6">
                            <div class="form-group">
                                <label>Meta Title:</label>
                                <input type="text" name="abt_meta_title" id="abt_meta_title" class="form-control" placeholder="Meta Title" value="{{$aboutinfo?$aboutinfo->abt_meta_title:''}}">

                            </div>
                            </div>
                             <div class="col-md-6">
                                <div class="form-group">
                                <label>Meta Keywords:</label>
                                <input type="text" name="abt_meta_keywords" id="abt_meta_keywords" class="form-control" placeholder="Keywords" value="{{$aboutinfo?$aboutinfo->abt_meta_keywords:''}}">

                               </div>
                             </div> 
                       </div>
                          <div class="row">
                             <div class="col-md-12">
                                <div class="form-group">
                                <label>Meta Description:</label>
                                <textarea rows="5" cols="5" class="form-control " name="abt_meta_description" id="abt_meta_description" style="resize: none;" placeholder="Meta Description">{{$aboutinfo?$aboutinfo->abt_meta_description:''}}</textarea>
                            </div>
                             </div>
                         </div>
                                
                        </div>

                            <div class="tab-pane" id="highlighted-justified-tab2">
                                   <div class="row">
                                <div class="col-md-12">
                                      <div class="form-group">
                                        <label>Contact Heading:</label>
                                        <input type="text" name="cnt_heading" id="cnt_heading" class="form-control" placeholder="Contact Heading" value="{{$contactinfo?$contactinfo->cnt_heading:''}}">
                                    </div>
                                </div>

                                   <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Contact Content:</label>
                                        <textarea rows="5" cols="5" class="form-control summernote" name="cnt_content" id="cnt_content" placeholder="Contact Content" style="resize: none;">{{$contactinfo?$contactinfo->cnt_content:''}}</textarea>
                                    </div>
                                </div>

                                  <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Contact Banner:</label>
                                        <input type="file" name="contact_banner">
                                         @if($contactinfo && isset($contactinfo->contact_banner))
                                            <input type="hidden" name="old_contact_banner" value="{{$contactinfo->contact_banner}}">
                                         @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                @if($contactinfo && isset($contactinfo->contact_banner))
                                    <img class="img-responsive img-thumbnail" src="{{asset('/storage/pages/contact/'.$contactinfo->contact_banner)}}" alt="" width="120px">
                                    @endif
                                </div>
                            </div>
                              <div class="row">
                            <h4>SEO Information</h4>
                            <div class="col-md-6">
                            <div class="form-group">
                                <label>Meta Title:</label>
                                <input type="text" name="cnt_meta_title" id="cnt_meta_title" class="form-control" placeholder="Meta Title" value="{{$contactinfo?$contactinfo->cnt_meta_title:''}}">

                            </div>
                            </div>
                             <div class="col-md-6">
                                <div class="form-group">
                                <label>Meta Keywords:</label>
                                <input type="text" name="cnt_meta_keywords" id="cnt_meta_keywords" class="form-control" placeholder="Keywords" value="{{$contactinfo?$contactinfo->cnt_meta_keywords:''}}">

                               </div>
                             </div> 
                         </div>
                          <div class="row">
                             <div class="col-md-12">
                                <div class="form-group">
                                <label>Meta Description:</label>
                                <textarea rows="5" cols="5" class="form-control " name="cnt_meta_description" id="cnt_meta_description" style="resize: none;" placeholder="Meta Description">{{$contactinfo?$contactinfo->cnt_meta_description:''}}</textarea>
                            </div>
                             </div>
                         </div>

                            </div>

                        <div class="tab-pane active" id="highlighted-justified-tab3">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                        <label>Faq Banner:</label>
                                        <input type="file" name="faq_banner">
                                           @if($faqinfo && isset($faqinfo->faq_banner))
                                            <input type="hidden" name="old_faq_banner" value="{{$faqinfo->faq_banner}}">
                                         @endif
                                </div>  
                            </div>

                            <div class="col-md-6">
                                @if($faqinfo && isset($faqinfo->faq_banner))
                                    <img class="img-responsive img-thumbnail" src="{{asset('/storage/pages/faq/'.$faqinfo->faq_banner)}}" alt="" width="120px">
                                    @endif
                                </div>


                                   <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Faq:</label>
                                        <textarea rows="5" cols="5" class="form-control summernote" name="faq" id="faq" placeholder="Faq" style="resize: none;">{{$faqinfo?$faqinfo->faq:''}}</textarea>
                                    </div>
                                </div>
                        </div>
                        </div>
                         <div class="text-right">
                <button type="submit" class="btn btn-primary"  id="submit">Upadte Page<i class="icon-arrow-right14 position-right"></i></button>
                <button type="button" class="btn btn-link" id="submiting" style="display: none;">Processing <img src="{{ asset('ajaxloader.gif') }}" width="80px"></button>
            </div>
                        </div>
                   </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script src="{{asset('backend/global_assets/js/plugins/editors/summernote/summernote.min.js')}}"></script>
<script src="{{asset('backend/global_assets/js/plugins/forms/styling/uniform.min.js')}}"></script>
<script src="{{asset('backend/global_assets/js/demo_pages/editor_summernote.js')}}"></script>
<script src="{{asset('backend/global_assets/js/plugins/forms/selects/select2.min.js')}}"></script>
<script src="{{asset('backend/global_assets/js/demo_pages/form_checkboxes_radios.js')}}"></script>
<script src="{{asset('backend/global_assets/js/plugins/notifications/sweet_alert.min.js')}}"></script>

<script src="{{asset('backend/assets/js/pages.js')}}"></script>
@endpush