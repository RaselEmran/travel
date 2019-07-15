@extends('admin.layouts.master')
@section('pageTitle') Packege @endsection
@section('page-header')
<div class="page-header page-header-default">
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ul>
    </div>
</div>
@endsection
@section('content')
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">Packege Booking Details
        </h5>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-6">
                <h2>Packege Itinary - <b>One Way</b></h2>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Time</th>
                            <th>Name/Destination</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($packegeinfo->oneway as $one_way)
                        <tr>
                            <td>{{$one_way->time1}}</td>
                            <td>{{$one_way->itinary_name1}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-6">
                <h2>Packege Itinary - <b>Two Way</b></h2>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Time</th>
                            <th>Name/Destination</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($packegeinfo->twoway as $two_way)
                        <tr>
                            <td>{{$two_way->time2}}</td>
                            <td>{{$two_way->itinary_name2}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <h2>Travelar Itinary <b>{{$userpackege->type}}</b></h2>

                <form action="{{ route('admin.send-packege-mail') }}" method="post">
                @csrf
                <input type="hidden" name="user_packege" value="{{$userpackege->id}}">
                <input type="hidden" name="user_id" value="{{$userpackege->user_id}}">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Time</th>
                            <th>Name/Destination</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($userpackege->useritinary as $useriti)
                        <tr>
                           <td>
                               <input type="time" id="time2-0" class="form-control form-control100 itinerary-form" name="time[]" value="{{$useriti->time}}" readonly />
                           </td>
                           <td>
                               <input type="text" id="activity2-0" class="form-control form-control100 itinerary-form" name="itinary_name[]" value="{{$useriti->name}}" readonly />
                           </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td>
                            <button type="button" id="itinary_edit" class="btn btn-info">Edit</button>
                            <button type="button" id="itinary_done" class="btn btn-success">Done</button>
                            </td>
                           
                        </tr>
                    </tfoot>
                </table> 
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td>
                                    <label>Email:</label>
                                    <input type="text" id="email" class="form-control " name="email" value="{{$userpackege->user->email}}" readonly />
                                </td>
                            </tr>

                             <tr>
                                <td>
                                    <label>Default Amount:</label>
                                    <input type="text" id="default_amt" class="form-control " name="default_amt" value="{{$userpackege->total}}" readonly />
                                </td>

                            </tr>
                            <tr>
                                
                                <td>
                                    <label>Editable Amouny:</label>
                                    <input type="text" id="edit_amt" class="form-control " name="edit_amt" value="{{$userpackege->total}}" />
                                 </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Messege:</label>
                                    <textarea rows="5" cols="5" class="form-control summernote" name="messege" id="messege" style="resize: none;"></textarea>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td>
                                <button type="submit" class="btn btn-info"> <i class=" icon-mail5"></i>Send Mail</button>
                                <button type="submit" class="btn btn-danger"> <i class=" icon-alarm-cancel"></i>Cancel Tour</button>
                            </td>

                        </tr>
                        </tfoot>
                    </table>
                </form>
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
<script src="{{asset('backend/assets/js/details.js')}}"></script>
@endpush