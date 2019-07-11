@extends('fontend.layouts.master')
@section('pageTitle') travelkit @endsection
@push('css')

@endpush
@section('page-header')
		  
        <img src="{{asset('fontend/images/bg8.jpg')}}" class="bg1"/>
        <div class="centered3 titleimg9">
            <h2>Travel Kit</h2>             
        </div>
@endsection

@section('content')
    <div class="row bg-payment">
            <div id="content12">
                <form>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-7 booking-order-details">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">                                     
                                            <p>Please enter the time and location (ONLY available for airport and hotel) for your item pickup.</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Select Date</label>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Select Time</label>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Select Location</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4" style="padding-bottom: 20px;">
                                            <input type="date" class="form-control form-control100" name="pick-up-date" />
                                        </div>
                                        <div class="col-md-4" style="padding-bottom: 20px;">
                                            <input type="time" class="form-control form-control100" name="pick-up-time" />
                                        </div>
                                        <div class="col-md-4" style="padding-bottom: 20px;">
                                            <select class="form-control form-control100" name="location">
                                                <option value="">Select Location</option>
                                                <option value="1">Airport</option>
                                                <option value="2">Hotel</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Location Name</label>
                                        </div>
                                        <div class="col-md-12" style="padding-bottom: 20px;">
                                            <input type="text" class="form-control form-control100" name="location-name" placeholder="Example: Hotel's Name or Airport's Name" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Choose your favourite</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <a id="phone-access" class="btn travel-kits-favourite" onclick="chooseCategory('phone-access')">Phone Accessories</a>
                                        </div>
                                        <div class="col-md-3">
                                            <a id="medical" class="btn travel-kits-favourite" onclick="chooseCategory('medical')">Medical</a>
                                        </div>
                                        <div class="col-md-3">
                                            <a id="toiletries" class="btn travel-kits-favourite" onclick="chooseCategory('toiletries')">Toiletries</a>
                                        </div>
                                        <div class="col-md-3">
                                            <a id="others" class="btn travel-kits-favourite" onclick="chooseCategory('others')">Others</a>
                                        </div>
                                    </div>
                                    <div id="container-phone-access" class="row">
                                        <div class="col-md-12">
                                            <table style="width: 100%;">
                                            @foreach ($phones as $p=> $phn)
                                                 
                                                   
                                    <tr>
                                    <td class="col-chk"><input type="checkbox" id="pha{{$p+1}}" class="chk-travel-kits" name="pha[]" value="{{$phn->id}}" /></td>
                                    <td class="col-name"><span id="name-pha{{$p+1}}">{{$phn->name}}</span><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;RM </span><span id="price-pha{{$p+1}}">{{$phn->price}}</span><span>/unit</span>
                                    <input type="hidden" name="price[]" value="{{$phn->price}}">
                                    </td>
                                    <td class="flt-right">
                                        <div class="input-group">
                                            <input type="button" value="-" class="button-minus button-pha{{$p+1}}" data-field="quantity-pha{{$p+1}}" />
                                            <input type="number" id="quantity-pha{{$p+1}}" name="quantity[]" class="quantity-field" step="1" min="1" max="20" value="1" readonly />
                                            <input type="button" value="+" class="button-plus button-pha{{$p+1}}" data-field="quantity-pha{{$p+1}}"/>
                                        </div>
                                    </td>
                                    </tr>
                                     @endforeach
                 
                                    </table>
                                        </div>
                                    </div>
                                    <div id="container-medical" class="row">
                                        <div class="col-md-12">
                                    <table style="width: 100%;">
                                    @foreach ($medicals as $m=> $medi)
                                        {{-- expr --}}
                                   
                                <tr>
                                <td class="col-chk"><input type="checkbox" id="medic{{$m+1}}" class="chk-travel-kits" name="pha[]" value="1" /></td>
                                <td class="col-name"><span id="name-medic{{$m+1}}">{{$medi->name}}</span><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;RM </span><span id="price-medic{{$m+1}}">{{$medi->price}}</span><span>/unit</span>
                                <input type="hidden" name="price[]" value="{{$medi->price}}">
                                </td>
                                <td class="flt-right">
                                    <div class="input-group">
                                        <input type="button" value="-" class="button-minus button-medic{{$m+1}}" data-field="quantity-medic{{$m+1}}" />
                                        <input type="number" id="quantity-medic{{$m+1}}" name="quantity[]" class="quantity-field" step="1" min="1" max="20" value="1" readonly />
                                        <input type="button" value="+" class="button-plus button-medic{{$m+1}}" data-field="quantity-medic{{$m+1}}"/>
                                        </div>
                                    </td>
                                    </tr>
                                 @endforeach
                                     
                                </table>
                            </div>
                            </div>
                            <div id="container-toiletries" class="row">
                             <div class="col-md-12">
                               <table style="width: 100%;">
                                  @foreach ($toiletries as $t=> $tot)
                                             
                                <tr>
                                    <td class="col-chk"><input type="checkbox" id="pha{{$t+1}}" class="chk-travel-kits" name="pha[]" value="1" /></td>
                                    <td class="col-name"><span id="name-pha{{$t+1}}">{{$tot->name}}</span><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;RM </span><span id="price-pha{{$t+1}}">{{$tot->price}}</span><span>/unit</span>
                                    <input type="hidden" name="price[]" value="{{$tot->price}}">
                                    </td>
                                    <td class="flt-right">
                                        <div class="input-group">
                                            <input type="button" value="-" class="button-minus button-pha{{$t+1}}" data-field="quantity-pha{{$t+1}}" />
                                            <input type="number" id="quantity-pha{{$t+1}}" name="quantity[]" class="quantity-field" step="1" min="1" max="20" value="1" readonly />
                                            <input type="button" value="+" class="button-plus button-pha{{$t+1}}" data-field="quantity-pha{{$t+1}}"/>
                                        </div>
                                    </td>
                                </tr>
                                 @endforeach
                                 </table>
                                </div>
                              </div>
                            <div id="container-others" class="row">
                             <div class="col-md-12">
                              <table style="width: 100%;">
                                 @foreach ($others as $o => $other)   
                                <tr>
                                <td class="col-chk"><input type="checkbox" id="pha{{$o+1}}" class="chk-travel-kits" name="pha[1]" value="1" /></td>
                                <td class="col-name"><span id="name-pha{{$o+1}}">{{$other->name}}</span><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;RM </span><span id="price-pha{{$o+1}}">{{$other->price}}</span><span>/unit</span>
                                <input type="hidden" name="price[]" value="{{$other->price}}">
                                </td>
                                <td class="flt-right">
                                    <div class="input-group">
                                        <input type="button" value="-" class="button-minus button-pha{{$o+1}}" data-field="quantity-pha{{$o+1}}" />
                                        <input type="number" id="quantity-pha{{$o+1}}" name="quantity[]" class="quantity-field" step="1" min="1" max="20" value="1" readonly />
                                        <input type="button" value="+" class="button-plus button-pha{{$o+1}}" data-field="quantity-pha{{$o+1}}"/>
                                    </div>
                                    </td>
                                </tr>
                            @endforeach  
         
                            </table>
                            </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <input type="submit" class="btn btn-info" name="add-to-cart-btn" value="Add to cart" />
                                </div>
                            </div>
                        </div>
                        </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-4">
                        <div class="row">                               
                            <div class="col-md-12 booking-price-container">
                                <div class="col-md-12" style="padding-bottom: 5px;">
                                    <img src="{{asset('fontend/images/question-mark.png')}}" /><label>&nbsp;Order Details</label>
                                </div>
                                <div class="col-md-12">
                                    <p>Order details</p>
                                </div>
                                <div class="col-md-12">
                                    <div class="order-details">
                                        <table id="order-listing" style="width: 100%;">                                                                         
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-12" style="padding-bottom: 10px;">
                                    <div class="order-total-prices">
                                        <span>Total</span>
                                        <span id="total-price" class="align-right-col flt-right">0.00</span><span class="align-right-col flt-right">RM&nbsp;</span>
                                    </div>
                                </div>
                                <div class="col-md-12" style="padding-bottom: 10px;">
                                    <input type="submit" class="btn btn-info form-control100" name="check-out-btn" value="Checkout" />
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <a class="skip-travel-kits flt-right"> Skip, if you are not sure yet</a>
                            </div>
                        </div>
                    </div>                      
                </div>
                <br>
            </div>
         </form>
      </div>
    </div>	
    

@endsection

@push('js')
<script type="text/javascript" src="{{asset('fontend/js/main.js')}}"></script>
<script type="text/javascript" src="{{asset('fontend/js/travel-kits.js')}}"></script>
@endpush