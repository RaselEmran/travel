@extends('admin.layouts.master')
@section('pageTitle') Hotel @endsection
@section('page-header')
<div class="page-header page-header-default">
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
            <li class="active">Hotel</li>
        </ul>
    </div>
</div>
@endsection
@section('content')
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">Hotel
        <a href="{{ route('admin.hotel.create') }}" class="btn btn-info"><i class="icon-stack-plus mr-2"></i>Creat</a>
        </h5>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
                <li><a data-action="reload"></a></li>
                <li><a data-action="close"></a></li>
            </ul>
        </div>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table datatable-button-init-basic">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Photo</th>
                        <th>Hotel Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="product_list">
                    @foreach ($hotel as $element)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td><img class="img-responsive img-thumbnail" src="{{asset('/storage/hotel/photo/'.$element->photo)}}" alt="" width="120px"></td>
                        <td>{{$element->name}}</td>
                        <td>
                            @if($element->status == 1)
                            <button class="btn btn-xs btn-success">Active</button>
                            @else
                            <button class="btn btn-xs btn-danger">In Active</button>
                            @endif
                        </td>
                        <td>
                            <a href="#" class="btn btn-success" data-toggle="modal" data-target="#modal_default"  id="view_details" data-url="{{ route('admin.hotel.view',$element->id) }}"><i class=" icon-eye8"></i>View</a>
                            <a href="{{ route('admin.hotel.edit',$element->id) }}" class="btn btn-info"><i class=" icon-pencil5"></i>Edit</a>
                            <a href="#" id="delete_item" data-id="{{$element->id}}" data-url="{{ route('admin.hotel.delete',$element->id) }}" class="btn btn-danger"><i class="  icon-trash"></i>Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
{{--  --}}
<div id="modal_default" data-backdrop="static" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-full">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">Hotel View</h5>
            </div>
            <div class="modal-body" id="show">
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script src="{{asset('backend/global_assets/js/plugins/tables/datatables/datatables.min.js')}}"></script>
<script src="{{asset('backend/global_assets/js/plugins/tables/datatables/extensions/buttons.min.js')}}"></script>
<script src="{{asset('backend/global_assets/js/demo_pages/datatables_extension_buttons_init.js')}}"></script>
<script src="{{asset('backend/global_assets/js/plugins/forms/selects/select2.min.js')}}"></script>
<script src="{{asset('backend/global_assets/js/demo_pages/form_checkboxes_radios.js')}}"></script>
<script src="{{asset('backend/global_assets/js/plugins/notifications/sweet_alert.min.js')}}"></script>
<script src="{{asset('backend/assets/js/hotel.js')}}"></script>
@endpush