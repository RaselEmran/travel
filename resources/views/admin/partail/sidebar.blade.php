    <div class="sidebar sidebar-main">
                <div class="sidebar-content">

                    <!-- User menu -->
                    <div class="sidebar-user">
                        <div class="category-content">
                            <div class="media">
                                <a href="#" class="media-left"><img src="{{asset('backend/global_assets/images/placeholders/placeholder.jpg')}}" class="img-circle img-sm" alt=""></a>
                                <div class="media-body">
                                    <span class="media-heading text-semibold">Victoria Baker</span>
                                    <div class="text-size-mini text-muted">
                                        <i class="icon-pin text-size-small"></i> &nbsp;Santa Ana, CA
                                    </div>
                                </div>

                                <div class="media-right media-middle">
                                    <ul class="icons-list">
                                        <li>
                                            <a href="#"><i class="icon-cog3"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /user menu -->


                    <!-- Main navigation -->
                    <div class="sidebar-category sidebar-category-visible">
                        <div class="category-content no-padding">
                            <ul class="navigation navigation-main navigation-accordion">

                                <!-- Main -->
                                <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
                                <li class="{{Request::is('admin/dashboard') ?'active':''}}"><a href="{{ route('admin.dashboard') }}"><i class="icon-home4"></i> <span>Dashboard</span></a></li>


                                <li  class="{{Request::is('admin/destination*') ?'active':''}}"><a href="{{ route('admin.destination') }}"><i class="icon-width"></i> <span>Destination</span></a></li>

                                <li  class="{{Request::is('admin/packege*') ?'active':''}}"><a href="{{ route('admin.packege') }}"><i class=" icon-package"></i> <span>Packege</span></a></li>

                                <li  class="{{Request::is('admin/amenity*') ?'active':''}}"><a href="{{ route('admin.amenity') }}"><i class="icon-station"></i> <span>Amenity</span></a></li>
                                <li class="{{Request::is('admin/hotel*') ?'active':''}}">
                                    <a href="#"><i class="icon-city"></i> <span>Hotel</span></a>
                                    <ul>
                                        <li class="{{Request::is('admin/hotel/create') ?'active':''}}"><a href="{{ route('admin.hotel.create') }}"> Add Hotel</a></li>

                                          <li class="{{Request::is('admin/hotel') ?'active':''}}"><a href="{{ route('admin.hotel') }}"> List Hotel</a></li>

                                    </ul>
                                </li>

                                 <li class="{{Request::is('admin/packege/booking*') ?'active':''}}">
                                    <a href="#"><i class="icon-bookmark4"></i> <span>Booking</span></a>
                                    <ul>
                                        <li class="{{Request::is('admin/packege/booking') ?'active':''}}"><a href="{{ route('admin.packege.getbooking') }}"> Packege Booking</a></li>

                                          <li class="{{Request::is('admin/hotel') ?'active':''}}"><a href="{{ route('admin.hotel') }}">Hotel Booking</a></li>

                                    </ul>
                                </li>
                              {{--    <li>
                                    <a href="#"><i class="icon-people"></i> <span>Destination</span></a>
                                    <ul>
                                        <li><a href=""> Supplier</a></li>

                                    </ul>
                                </li> --}}



                                <!-- /page kits -->

                            </ul>
                        </div>
                    </div>
                    <!-- /main navigation -->

                </div>
            </div>