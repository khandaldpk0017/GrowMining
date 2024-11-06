<header class="codex-header">
        <div class="header-contian flex item-center justify-between">
          <div class="header-left flex item-center">
            <div class="sidebar-action navicon-wrap">                           <i data-feather="grid"></i></div>
            <div class="search-bar">      
              <div class="input-group">
                <input class="form-control" type="text" value="" placeholder="Search Here....."><span class="input-group-text"><i data-feather="search"></i></span>
              </div>
            </div>
          </div>
          <div class="header-right flex item-center">
            <ul class="nav-iconlist">
              <li>
                <div class="navicon-wrap action-dark"><i class="fa fa-moon-o icon-dark"></i><i class="fa fa-sun-o icon-light" style="display:none;"></i></div>
              </li>
              <li>                              
                <div class="navicon-wrap"><i data-feather="bell"></i>
                  <div class="noti-count">04</div>
                </div>
                <div class="hover-dropdown navnotification-drop"> 
                  <div class="drop-header">
                    <h5>notification <span>05                      </span></h5>
                  </div>
                  <ul data-simplebar>
                    <li><a href="javascript:void(0);">
                        <div class="media">
                          <div class="icon-nav bg-primary"><i class="fa fa-check-square-o"></i></div>
                          <div class="media-body">                          
                            <h6>order Cheked</h6><span class="text-light">1 hour ago</span>
                          </div>
                        </div></a></li>
                    <li><a href="javascript:void(0);">
                        <div class="media">
                          <div class="icon-nav bg-secondary"><i class="fa fa-first-order"></i></div>
                          <div class="media-body">
                            <h6>order receved</h6><span class="text-light">1 day ago</span>
                          </div>
                        </div></a></li>
                    <li><a href="javascript:void(0);">
                        <div class="media">
                          <div class="icon-nav bg-success"><i class="fa fa-money"></i></div>
                          <div class="media-body">
                            <h6>payment received</h6><span class="text-light">2 day ago</span>
                          </div>
                        </div></a></li>
                    <li><a href="javascript:void(0);">
                        <div class="media">
                          <div class="icon-nav bg-warning"><i class="fa fa-truck"></i></div>
                          <div class="media-body">
                            <h6>order shipped</h6><span class="text-light">2 day ago</span>
                          </div>
                        </div></a></li>
                    <li><a href="javascript:void(0);">
                        <div class="media">
                          <div class="icon-nav bg-info"><i class="fa fa-first-order"></i></div>
                          <div class="media-body">
                            <h6>order receved</h6><span class="text-light">1 day ago</span>
                          </div>
                        </div></a></li>
                    <li><a href="javascript:void(0);">
                        <div class="media">
                          <div class="icon-nav bg-success"><i class="fa fa-money"></i></div>
                          <div class="media-body">
                            <h6>payment received</h6><span class="text-light">2 day ago</span>
                          </div>
                        </div></a></li>
                    <li><a href="javascript:void(0);">
                        <div class="media">
                          <div class="icon-nav bg-warning"><i class="fa fa-truck"></i></div>
                          <div class="media-body">
                            <h6>order shipped</h6><span class="text-light">2 day ago</span>
                          </div>
                        </div></a></li>
                    <li><a href="javascript:void(0);">
                        <div class="media">
                          <div class="icon-nav bg-info"><i class="fa fa-first-order"></i></div>
                          <div class="media-body">
                            <h6>order receved</h6><span class="text-light">1 day ago                  </span>
                          </div>
                        </div></a></li>
                  </ul>
                  <div class="drop-footer"><a href="#">See All Notification<i data-feather="arrow-right"></i></a></div>
                </div>
              </li>
           
              <li>
                <div class="navicon-wrap btn-windowfull"><i data-feather="maximize">             </i></div>
              </li>
              <li class="nav-profile">                       
                <div class="media">
                  <div class="user-icon"><img class="img-fluid rounded-50" src="{{ asset('images/avtar/3.jpg')}}" alt="logo"></div>
                  <div class="media-body">
                    <h6>Thomas Vactom</h6><span class="text-light">Web designer</span>
                  </div>
                </div>
                <div class="hover-dropdown navprofile-drop">                
                  <ul>
                    <li><a href="{{route('admin.profile')}}"><i data-feather="user"></i>profile</a></li>
                    <li><a href="email-inbox.html"><i data-feather="mail"></i>inbox</a></li>
                    <li><a href="user-edit.html"> <i data-feather="settings"></i>setting     </a></li>
                    <li>
                        <form method="POST" action="{{ route('admin.logout') }}">
                            @csrf           
                            <button type="submit" class=""><i data-feather="log-out"  ></i><span style="margin-left:5px;">log out</span></button>
                        </form>
                    </li>
                  </ul>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </header>