@extends('admin.layouts.master')
@section('pageTitle') Travelar @endsection
@section('page-header')
  <div class="page-header page-header-default">
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="icon-home2 position-left"></i> Home</a></li>
            <li class="active">Travelar</li>
        </ul>
    </div>
</div>
@endsection
@section('content')
     <div class="panel panel-flat">
              <div class="panel-heading">
                    <h5 class="panel-title">Travelar
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
                                            <th>Travelar name</th>
                                            <th>Email Phone</th>
                                            <th>City State Country</th>
                                            <th>Date</th>
                         
                                          
                                    </tr>
                                </thead>
                               <tbody id="product_list">
                                @foreach ($travelars as $element)
                                   <tr>
                                   <td>{{$loop->index+1}}</td>
                                       <td>{{$element->first_name }} {{$element->last_name}}</td>
                                       <td>{{$element->email}} <br>{{$element->phn_number}}</td>
                                       <td>{{$element->state}} <br>{{$element->country}}</td>
                                       <td>{{$element->created_at}}</td>
                                     
                                   </tr>
                                @endforeach

                            </tbody>
               
                    </table>
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
    {{-- <script src="{{asset('backend/assets/js/packege.js')}}"></script> --}}
@endpush