<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
        <div class="nano">
            <div class="nano-content">
                <ul>
                    <div class="logo"><a href="#">
                            <!-- <img src="assets/images/logo.png" alt="" /> --><span>Focus</span></a></div>
                    <li class="label">Main</li>
                    <li><a  href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>

                    <li><a href="{{ route('catindex') }}"><i class="fa fa-list-alt"></i> Manage Category </a></li>
                    <li><a href="{{ route('productindex') }}"><i class="fa fa-list-alt"></i> Manage Prduct </a></li>
                    <li><a href="{{ url('orders') }}"><i class="fa fa-list-alt"></i> Manage Order </a></li>
                    
                   
                    
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