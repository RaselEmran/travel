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
                                <li class="{{Request::is('dashboard') ?'active':''}}"><a href="{{ route('admin.dashboard') }}"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
                        

      

                                 <li>
                                    <a href="#"><i class="icon-people"></i> <span>Contacts</span></a>
                                    <ul>
                                        <li><a href=""> Supplier</a></li>
 
                                    </ul>
                                </li>

                                <li>
                                    <a href="#"><i class="icon-stack"></i> <span>Package Management</span></a>
                                    <ul>
                                        <li><a href="../seed/horizontal_nav.html">Horizontal navigation</a></li>
                                        <li><a href="../seed/1_col.html">1 column</a></li>
                                        <li><a href="../seed/2_col.html">2 columns</a></li>
                                        <li>
                                            <a href="#">3 columns</a>
                                            <ul>
                                                <li><a href="../seed/3_col_dual.html">Dual sidebars</a></li>
                                                <li><a href="../seed/3_col_double.html">Double sidebars</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="../seed/4_col.html">4 columns</a></li>
                                        <li>
                                            <a href="#">Detached layout</a>
                                            <ul>
                                                <li><a href="../seed/detached_left.html">Left sidebar</a></li>
                                                <li><a href="../seed/detached_right.html">Right sidebar</a></li>
                                                <li><a href="../seed/detached_sticky.html">Sticky sidebar</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="../seed/layout_boxed.html">Boxed layout</a></li>
                                        <li class="navigation-divider"></li>
                                        <li><a href="../seed/layout_navbar_fixed_main.html">Fixed main navbar</a></li>
                                        <li><a href="../seed/layout_navbar_fixed_secondary.html">Fixed secondary navbar</a></li>
                                        <li><a href="../seed/layout_navbar_fixed_both.html">Both navbars fixed</a></li>
                                        <li><a href="../seed/layout_fixed.html">Fixed layout</a></li>
                                    </ul>
                                </li>

                                <!-- /page kits -->

                            </ul>
                        </div>
                    </div>
                    <!-- /main navigation -->

                </div>
            </div>