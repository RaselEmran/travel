@extends('admin.layouts.master')
@section('pageTitle') booking Travelkit @endsection
@section('page-header')
  <div class="page-header page-header-default">
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="icon-home2 position-left"></i> Home</a></li>
            <li class="active">Travel Kit</li>
        </ul>
    </div>
</div>
@endsection
@section('content')
     <div class="panel panel-flat">
              <div class="panel-heading">
                    <h5 class="panel-title">Travel Kit booking
                     
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
                                            <th>Travelar Name</th>
                                            <th>Date</th>
                                            <th>Location</th>
                                            <th>Total Amt</th>
                                            <th>Paiment Status</th>
                                            <th>Action</th>
                                          
                                    </tr>
                                </thead>
                               <tbody id="product_list">
                                @foreach ($kits as $element)
                                   <tr>
                                   <td>{{$loop->index+1}}</td>
                                       <td>{{$element->user->name}}</td>
                                       <td>{{$element->pick_up_date}}</td>
                                       <td>
                                         @if ($element->location==1)
                                             <span class="label label-info">Airpot</span>
                                          @else
                                          <span class="label label-danger">Hotel</span>   
                                         @endif
                                       </td>
                                       <td>{{$element->total_amt}}</td>
                                       <td>
                                         @if ($element->status==1)
                                          <span class="label label-success">Complete</span>
                                          @else
                                          <span class="label label-danger"> Not Complete</span>
                                         @endif
                                       </td>
                                       <td>
                                     <a href="#" class="btn btn-success" data-toggle="modal" data-target="#modal_default"  id="view_details" data-url="{{ route('admin.kitsorder.view',$element->id) }}"><i class=" icon-eye8"></i>View</a>
                                 
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
                                    <h5 class="modal-title">Order Details</h5>
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
    <script src="{{asset('backend/assets/js/travelkit.js')}}"></script>
@endpush