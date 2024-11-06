 <!-- sidebar start-->
 <aside class="codex-sidebar">
        <div class="logo-gridwrap"><a href="index.html"><img class="img-fluid light-logo" src="{{ asset('images/logo/logo.png')}}" alt="theeme-logo"><img class="img-fluid dark-logo" src="{{ asset('images/logo/dark-logo.png')}}" alt="theeme-logo"></a>
          <div class="sidebar-action">                           <i data-feather="grid"></i></div>
        </div>
        <div class="sideuser-profile">
          <div class="profile-img"><img class="img-fluid rounded-50" src="{{ asset('images/avtar/1.jpg')}}" alt="theeme-logo"></div>
          <div class="profile-detail">    
            <h6>Thomas Vactom</h6>
            <p class="text-light">Web Desinger</p>
          </div>
        </div>
        <nav class="codex-menuwrapper">
          <ul class="codex-menu custom-scroll" data-simplebar>         
            <!-- <li class="menu-item"><a href="javascript:void(0);">
                <div class="icon-item"><i data-feather="home"></i></div><span>dashboard</span><i class="fa fa-angle-down"></i></a>
              <ul class="submenu-list">
                <li><a href="{{route('admin.dashboard')}}">Dashboard </a></li>
              </ul>
            </li> -->
            @role('super-admin')
            <li class="menu-item"><a href="javascript:void(0);">
                <div class="icon-item"> <i data-feather="user"> </i></div><span>Users</span><i class="fa fa-angle-down"></i></a>
                <ul class="submenu-list">
                <li><a href="{{route('admin.users')}}">View Users</a></li>
                <li><a href="{{route('admin.addUser')}}">Add User</a></li>
              </ul>
              </li>
              <!-- <li class="menu-item"><a href="javascript:void(0);">
                <div class="icon-item"> <i data-feather="message-square"> </i></div><span>Support Tickets</span><i class="fa fa-angle-down"></i></a>
                <ul class="submenu-list">
                  <li><a href="{{route('admin.allTickets')}}">View Tickets</a></li>
                </ul>
              </li> -->
              @endrole
              <li class="menu-item"><a href="javascript:void(0);">
                <div class="icon-item"> <i class="fa fa-cart-arrow-down"></i></div><span>Orders</span><i class="fa fa-angle-down"></i></a>
                <ul class="submenu-list">
                <li><a href="{{route('admin.AllOrders')}}">All Orders</a></li>
              </ul>
              </li>
              <!-- <li class="menu-item"><a href="javascript:void(0);">
                <div class="icon-item"> <i data-feather="file-text"></i></div><span>Payments</span><i class="fa fa-angle-down"></i></a>
                <ul class="submenu-list">
                <li><a href="{{route('admin.allPayments')}}">All Payments</a></li>
              </ul>
              </li> -->
              <li class="menu-item"><a href="javascript:void(0);">
                <div class="icon-item"> <i data-feather="shopping-bag"> </i></div><span>Products</span><i class="fa fa-angle-down"></i></a>
                <ul class="submenu-list">
                <li><a href="{{route('admin.products')}}">All Products</a></li>
                <li><a href="{{route('admin.products.create')}}">Create Product</a></li>
              </ul>
              </li>
              @role('super-admin')
              <!-- <li class="menu-item"><a href="javascript:void(0);">
                <div class="icon-item"> <i class="fa fa-money"></i></div><span>Coupons</span><i class="fa fa-angle-down"></i></a>
                <ul class="submenu-list">
                <li><a href="{{route('coupons.index')}}">All Coupons</a></li>
                <li><a href="{{route('coupons.create')}}">Create Coupon</a></li>
              </ul>
              </li> -->
              <!-- <li class="menu-item"><a href="javascript:void(0);">
                <div class="icon-item"> <i data-feather="file-text"></i></div><span>taxes</span><i class="fa fa-angle-down"></i></a>
                <ul class="submenu-list">
                <li><a href="{{route('tax')}}">Taxes</a></li>
                <li><a href="{{route('create-tax')}}">Create Tax</a></li>
              </ul>
              </li> -->
              <li class="menu-item"><a href="javascript:void(0);">
                <div class="icon-item"> <i data-feather="file-text"></i></div><span>Withdraw</span><i class="fa fa-angle-down"></i></a>
                <ul class="submenu-list">
                <li><a href="{{route('admin.withdrawRequest')}}">Withdraw Request</a></li>
              </ul>
              </li>
              <li class="menu-item"><a href="javascript:void(0);">
                <div class="icon-item"> <i data-feather="file-text"></i></div><span>Deposit</span><i class="fa fa-angle-down"></i></a>
                <ul class="submenu-list">
                <li><a href="{{route('admin.depositRequest')}}">Deposit Request</a></li>
              </ul>
              </li>
              <li class="menu-item"><a href="javascript:void(0);">
                <div class="icon-item"> <i data-feather="file-text"></i></div><span>Transaction</span><i class="fa fa-angle-down"></i></a>
                <ul class="submenu-list">
                <li><a href="{{route('admin.transactions')}}">Transaction</a></li>
              </ul>
              </li>
              <li class="menu-item"><a href="javascript:void(0);">
                <div class="icon-item"> <i data-feather="file-text"></i></div><span>QR</span><i class="fa fa-angle-down"></i></a>
                <ul class="submenu-list">
                <li><a href="{{route('admin.qr_codes.index')}}">QR and UPI</a></li>
                <li><a href="{{route('admin.qr_codes.create')}}">ADD QR</a></li>
              </ul>
              </li>
              <li class="menu-item"><a href="javascript:void(0);">
                <div class="icon-item"> <i data-feather="file-text"></i></div><span>Refer Commission</span><i class="fa fa-angle-down"></i></a>
                <ul class="submenu-list">
                <li><a href="{{route('edit-referCommission')}}">Refer Commission</a></li>
              </ul>
              </li>
              <li class="menu-item"><a href="javascript:void(0);">
                <div class="icon-item"> <i data-feather="file-text"></i></div><span>Salary For Refer</span><i class="fa fa-angle-down"></i></a>
                <ul class="submenu-list">
                <li><a href="{{route('salary')}}">Salry</a></li>
                <li><a href="{{route('create-salary')}}">Create Salary</a></li>
              </ul>
              </li>
              @endrole
          </ul>
        </nav>
      </aside>
      <!-- sidebar end-->