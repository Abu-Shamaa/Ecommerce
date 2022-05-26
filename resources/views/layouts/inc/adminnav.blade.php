<div class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    
                    <div class="float-right">
                        <div class="dropdown dib">
                            <div class="header-icon" data-toggle="dropdown">
                            <i class="fa fa-bell" style="font-size:18px"></i>
                                
                            </div>
                        </div>

                        <div class="dropdown dib">
                            <div class="header-icon" data-toggle="dropdown">
                                <span class="user-avatar">{{Auth::user()->name}}
                                <i class="fa fa-user" style="font-size:18px"></i>
                                </span>
                                <div class="drop-down dropdown-profile dropdown-menu dropdown-menu-right">
                                   
                                    <div class="dropdown-content-body">
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-user"></i>
                                                    <span>Profile</span>
                                                </a>
                                            </li>

                                            <li><a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class=" fa fa-sign-out"></i> Logout</a>
                                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
