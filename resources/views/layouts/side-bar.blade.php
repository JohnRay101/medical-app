<div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        @if(auth()->user()->type === 'user')
                        <li class="active"> <a href="/home"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a> </li>
                        <li class="list-divider"></li>

                        <li class="active"> <a href="{{route('appointments.create')}}"><i class="fas fa-suitcase"></i> <span>Add Appointment</span></a> </li>
                        <li class="list-divider"></li>
                        @endif
                        @if(auth()->user()->type === 'admin')
                                <li class="active"> <a href="/admin/home"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a> </li>
                                <li class="list-divider"></li>

                                <li class="submenu"> <a href="#"><i class="fa fa-users" aria-hidden="true"></i> <span> Users </span> <span class="menu-arrow"></span></a>
                                    <ul class="submenu_class" style="display: none;">
                                        <li><a href="/users">All Users </a></li>
                                    </ul>
                                </li>
                                <li class="submenu"> <a href="#"><i class="fa fa-user-md"></i> <span> Doctors </span> <span class="menu-arrow"></span></a>
                                    <ul class="submenu_class" style="display: none;">
                                        <li><a href="/doctors">All Doctors</a></li>
                                    </ul>
                                </li>
                        @endif
                        @auth
                             @if (auth()->user()->type === 'admin' || auth()->user()->type === 'doctor')
                                <li class="submenu"> <a href="#"><i class="fas fa-suitcase"></i> <span> Appointment </span> <span class="menu-arrow"></span></a>
                                    <ul class="submenu_class" style="display: none;">
                                        <li><a href="/appointments"> All Appointment </a></li>
                                    </ul>
                                </li>
                                <li class="submenu"> <a href="#"><i class="fas fa-user"></i> <span> Patients </span> <span class="menu-arrow"></span></a>
                                    <ul class="submenu_class" style="display: none;">
                                        <li><a href="{{ route('patients.index') }}"> All Patients </a></li>
                                    </ul>
                                </li>
                            @endif 
                        @endauth                 
                    </ul>
                </div>
            </div>
        </div>