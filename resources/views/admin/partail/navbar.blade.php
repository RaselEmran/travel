<!-- Main navbar -->
        <div class="navbar navbar-inverse">
        <div class="navbar-header">

            <a class="navbar-brand" href="index.html"><img src="{{asset('fontend/images/yupa-logo-white.png')}}" alt="" style="display: inline-block ;margin-right: 5px" width="100" height="80">
            Yupa-Travel
            </a>

            <ul class="nav navbar-nav visible-xs-block">
                <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
                <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
            </ul>
        </div>

        <div class="navbar-collapse collapse" id="navbar-mobile">
            <ul class="nav navbar-nav">
                <li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-git-compare"></i>
                        <span class="visible-xs-inline-block position-right">Git updates</span>
                        <span class="badge bg-warning-400">9</span>
                    </a>
                    
                    <div class="dropdown-menu dropdown-content">
                        <div class="dropdown-content-heading">
                            Git updates
                            <ul class="icons-list">
                                <li><a href="#"><i class="icon-sync"></i></a></li>
                            </ul>
                        </div>

                        <ul class="media-list dropdown-content-body width-350">
                            <li class="media">
                                <div class="media-left">
                                    <a href="#" class="btn border-primary text-primary btn-flat btn-rounded btn-icon btn-sm"><i class="icon-git-pull-request"></i></a>
                                </div>

                                <div class="media-body">
                                    Drop the IE <a href="#">specific hacks</a> for temporal inputs
                                    <div class="media-annotation">4 minutes ago</div>
                                </div>
                            </li>

                            <li class="media">
                                <div class="media-left">
                                    <a href="#" class="btn border-warning text-warning btn-flat btn-rounded btn-icon btn-sm"><i class="icon-git-commit"></i></a>
                                </div>
                                
                                <div class="media-body">
                                    Add full font overrides for popovers and tooltips
                                    <div class="media-annotation">36 minutes ago</div>
                                </div>
                            </li>

                            <li class="media">
                                <div class="media-left">
                                    <a href="#" class="btn border-info text-info btn-flat btn-rounded btn-icon btn-sm"><i class="icon-git-branch"></i></a>
                                </div>
                                
                                <div class="media-body">
                                    <a href="#">Chris Arney</a> created a new <span class="text-semibold">Design</span> branch
                                    <div class="media-annotation">2 hours ago</div>
                                </div>
                            </li>

                            <li class="media">
                                <div class="media-left">
                                    <a href="#" class="btn border-success text-success btn-flat btn-rounded btn-icon btn-sm"><i class="icon-git-merge"></i></a>
                                </div>
                                
                                <div class="media-body">
                                    <a href="#">Eugene Kopyov</a> merged <span class="text-semibold">Master</span> and <span class="text-semibold">Dev</span> branches
                                    <div class="media-annotation">Dec 18, 18:36</div>
                                </div>
                            </li>

                            <li class="media">
                                <div class="media-left">
                                    <a href="#" class="btn border-primary text-primary btn-flat btn-rounded btn-icon btn-sm"><i class="icon-git-pull-request"></i></a>
                                </div>
                                
                                <div class="media-body">
                                    Have Carousel ignore keyboard events
                                    <div class="media-annotation">Dec 12, 05:46</div>
                                </div>
                            </li>
                        </ul>

                        <div class="dropdown-content-footer">
                            <a href="#" data-popup="tooltip" title="All activity"><i class="icon-menu display-block"></i></a>
                        </div>
                    </div>
                </li>
            </ul>

            <p class="navbar-text"><span class="label bg-success">Online</span></p>
        
            <ul class="nav navbar-nav navbar-right">
            <button id="btnCalculator" title="Calculator" type="button" class="btn btn-success btn-flat pull-left m-8 hidden-xs btn-sm mt-10 popover-default" data-toggle="popover" data-trigger="click" data-content='<div id="calculator">
              <div class="row text-center" id="calc">
                <div class="calcBG col-md-12 text-center">
                  <div class="row" id="result">
                    <form name="calc">
                      <input type="text" class="screen text-right" name="result" readonly>
                    </form>
                  </div>
                  <div class="row">
                    <button id="allClear" type="button" class="btn btn-danger" onclick="clearScreen()">AC</button>
                    <button id="clear" type="button" class="btn btn-warning" onclick="clearScreen()">CE</button>
                    <button id="%" type="button" class="btn" onclick="calEnterVal(this.id)">%</button>
                    <button id="/" type="button" class="btn" onclick="calEnterVal(this.id)">÷</button>
                  </div>
                  <div class="row">
                    <button id="7" type="button" class="btn" onclick="calEnterVal(this.id)">7</button>
                    <button id="8" type="button" class="btn" onclick="calEnterVal(this.id)">8</button>
                    <button id="9" type="button" class="btn" onclick="calEnterVal(this.id)">9</button>
                    <button id="*" type="button" class="btn" onclick="calEnterVal(this.id)">x</button>
                  </div>
                  <div class="row">
                    <button id="4" type="button" class="btn" onclick="calEnterVal(this.id)">4</button>
                    <button id="5" type="button" class="btn" onclick="calEnterVal(this.id)">5</button>
                    <button id="6" type="button" class="btn" onclick="calEnterVal(this.id)">6</button>
                    <button id="-" type="button" class="btn" onclick="calEnterVal(this.id)">-</button>
                  </div>
                  <div class="row">
                    <button id="1" type="button" class="btn" onclick="calEnterVal(this.id)">1</button>
                    <button id="2" type="button" class="btn" onclick="calEnterVal(this.id)">2</button>
                    <button id="3" type="button" class="btn" onclick="calEnterVal(this.id)">3</button>
                    <button id="+" type="button" class="btn" onclick="calEnterVal(this.id)">+</button>
                  </div>
                  <div class="row">
                    <button id="0" type="button" class="btn" onclick="calEnterVal(this.id)">0</button>
                    <button id="." type="button" class="btn" onclick="calEnterVal(this.id)">.</button>
                    <button id="equals" type="button" class="btn btn-success" onclick="calculate()">=</button>
                    <button id="blank" type="button" class="btn">&nbsp;</button>
                  </div>
                </div>
              </div>
            </div>' data-html="true" data-placement="bottom">
            <strong><i class=" icon-calculator2" aria-hidden="true"></i></strong>
        </button>
                <li class="dropdown language-switch">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{asset('backend/global_assets/images/flags/gb.png')}}" class="position-left" alt="">
                        English
                        <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu">
                        <li><a class="deutsch"><img src="{{asset('backend/global_assets/images/flags/de.png')}}" alt=""> Deutsch</a></li>
                        <li><a class="ukrainian"><img src="{{asset('backend/global_assets/images/flags/ua.png')}}" alt=""> Українська</a></li>
                        <li><a class="english"><img src="{{asset('backend/global_assets/images/flags/gb.png')}}" alt=""> English</a></li>
                        <li><a class="espana"><img src="{{asset('backend/global_assets/images/flags/es.png')}}" alt=""> España</a></li>
                        <li><a class="russian"><img src="{{asset('backend/global_assets/images/flags/ru.png')}}" alt=""> Русский</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-bubbles4"></i>
                        <span class="visible-xs-inline-block position-right">Messages</span>
                        <span class="badge bg-warning-400">2</span>
                    </a>
                    
                    <div class="dropdown-menu dropdown-content width-350">
                        <div class="dropdown-content-heading">
                            Messages
                            <ul class="icons-list">
                                <li><a href="#"><i class="icon-compose"></i></a></li>
                            </ul>
                        </div>

                        <ul class="media-list dropdown-content-body">
                            <li class="media">
                                <div class="media-left">
                                    <img src="{{asset('backendglobal_assets/images/placeholders/placeholder.jpg')}}" class="img-circle img-sm" alt="">
                                    <span class="badge bg-danger-400 media-badge">5</span>
                                </div>

                                <div class="media-body">
                                    <a href="#" class="media-heading">
                                        <span class="text-semibold">James Alexander</span>
                                        <span class="media-annotation pull-right">04:58</span>
                                    </a>

                                    <span class="text-muted">who knows, maybe that would be the best thing for me...</span>
                                </div>
                            </li>

                            <li class="media">
                                <div class="media-left">
                                    <img src="{{asset('backendglobal_assets/images/placeholders/placeholder.jpg')}}" class="img-circle img-sm" alt="">
                                    <span class="badge bg-danger-400 media-badge">4</span>
                                </div>

                                <div class="media-body">
                                    <a href="#" class="media-heading">
                                        <span class="text-semibold">Margo Baker</span>
                                        <span class="media-annotation pull-right">12:16</span>
                                    </a>

                                    <span class="text-muted">That was something he was unable to do because...</span>
                                </div>
                            </li>

                            <li class="media">
                                <div class="media-left"><img src="{{asset('backendglobal_assets/images/placeholders/placeholder.jpg')}}" class="img-circle img-sm" alt=""></div>
                                <div class="media-body">
                                    <a href="#" class="media-heading">
                                        <span class="text-semibold">Jeremy Victorino</span>
                                        <span class="media-annotation pull-right">22:48</span>
                                    </a>

                                    <span class="text-muted">But that would be extremely strained and suspicious...</span>
                                </div>
                            </li>

                            <li class="media">
                                <div class="media-left"><img src="{{asset('backendglobal_assets/images/placeholders/placeholder.jpg')}}" class="img-circle img-sm" alt=""></div>
                                <div class="media-body">
                                    <a href="#" class="media-heading">
                                        <span class="text-semibold">Beatrix Diaz</span>
                                        <span class="media-annotation pull-right">Tue</span>
                                    </a>

                                    <span class="text-muted">What a strenuous career it is that I've chosen...</span>
                                </div>
                            </li>

                            <li class="media">
                                <div class="media-left"><img src="{{asset('backend/global_assets/images/placeholders/placeholder.jpg')}}" class="img-circle img-sm" alt=""></div>
                                <div class="media-body">
                                    <a href="#" class="media-heading">
                                        <span class="text-semibold">Richard Vango</span>
                                        <span class="media-annotation pull-right">Mon</span>
                                    </a>
                                    
                                    <span class="text-muted">Other travelling salesmen live a life of luxury...</span>
                                </div>
                            </li>
                        </ul>

                        <div class="dropdown-content-footer">
                            <a href="#" data-popup="tooltip" title="All messages"><i class="icon-menu display-block"></i></a>
                        </div>
                    </div>
                </li>

                <li class="dropdown dropdown-user">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{asset('backend/global_assets/images/placeholders/placeholder.jpg')}}" alt="">
                        <span>Victoria</span>
                        <i class="caret"></i>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right">
                        <li><a href="{{ route('admin.profile') }}"><i class="icon-user-plus"></i> My profile</a></li>
                        <li><a href="#"><i class="icon-cog5"></i> Account settings</a></li>
                        <li><a href="{{route('admin.logout') }}" id="logout"><i class="icon-switch2"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!-- /main navbar -->