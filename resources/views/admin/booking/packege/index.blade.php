@extends('admin.layouts.master')
@section('pageTitle') Booking Packege @endsection
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
    <h5 class="panel-title">Packege Booking
    </h5>
  </div>
  <div class="panel-body">
    <div class="table-responsive">
      <table class="table datatable-button-init-basic">
        <thead>
          <tr>

            <th>SL</th>
            <th>Travelar name</th>
            <th>packege Name</th>
            <th>Destination Name</th>
            <th>Booking date</th>
            <th>Action</th>

          </tr>
        </thead>
        <tbody id="product_list">
          @foreach ($userpackege as $element)
          <tr>
            <td>{{$loop->index+1}}</td>
            <td>{{$element->user->name}}</td>
            <td>{{$element->packege->name}}</td>
            <td>{{$element->packege->destination->name}}</td>
            <td>{{$element->date}}</td>
            <td>
              <a href="{{ route('admin.packege.booking.details',['book'=>$element->id,'packege'=>$element->packege->id]) }}" class="btn btn-success"  ><i class=" icon-eye8"></i>View</a>
              <a href="{{ route('admin.packege.edit',$element->id) }}" class="btn btn-info"><i class=" icon-pencil5"></i>Edit</a>
              <a href="#" id="delete_item" data-id="{{$element->id}}" data-url="{{ route('admin.packege.delete',$element->id) }}" class="btn btn-danger"><i class="  icon-trash"></i>Delete</a>
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
        <h5 class="modal-title">Packege View</h5>
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
<script src="{{asset('backend/assets/js/packege.js')}}"></script>
@endpush