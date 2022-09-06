<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">FPT </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="http://127.0.0.1:8000/storage/avatar/R1MJJnThIXAHBM8S7CsTtmp" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          {{-- <a href="#" class="d-block">{{Auth::user()->name}}</a> --}}
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          {{-- @if($_SESSION[AUTH]['role_id'] == 1) --}}
          <li class="nav-item">
            <a href="{{route('admin.dashboard')}}" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          {{-- @endif --}}
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-duotone fa-users"></i>
              <p>
                Người dùng
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.user.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách</p>
                </a>
              </li>
              {{-- @if($_SESSION['auth']['role_id'] == 1) --}}
              <li class="nav-item">
                <a href="{{route('admin.user.create-form')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm mới</p>
                </a>
              </li>
             {{-- @endif --}}
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa-solid fa-shirt"></i>
              <p>
                Sản phẩm
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.product.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách sản phẩm</p>
                </a>
              </li>
              {{-- @if($_SESSION['auth']['role_id'] == 1) --}}
              <li class="nav-item">
                <a href="{{route('admin.product.create-form')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm sản phẩm</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.category.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách danh mục</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.category.create-form')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm danh mục</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.attribute.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Các biến thể</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.attribute.create-form')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm biến thể</p>
                </a>
              </li>
              {{-- <li class="nav-item">
                <a href="{{route('admin.category.create-form')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách thuộc tính</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.category.create-form')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm thuộc tính</p>
                </a>
              </li> --}}
             {{-- @endif --}}
            </ul>
            <li class="nav-item">
              <a href="{{route('admin.customer.index')}}" class="nav-link">
                <i class="fa-solid fas fa-user-group-crown nav-icon"></i>
               <p> Khách hàng </p>
            </a>
            </li>

            <li class="nav-item">
              <a href="{{route('admin.order.index')}}" class="nav-link">
                <i class="fas fa-user-tie-hair nav-icon"></i>
               <p> Đơn hàng </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">
              <i class="nav-icon fa-solid fa-image"></i>
                <p> 
                  Slider 
                  <i class="right fas fa-angle-left"></i>
                </p>

              </a>

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('admin.slider.index')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Danh sách</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('admin.slider.create-form')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Thêm mới</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
              <i class="nav-icon fas fa-clipboard-list"></i>
              {{-- <i class="nav-icon fas fa-duotone fa-gallery-thumbnails"></i> --}}
                <p> 
                  Vai trò 
                  <i class="right fas fa-angle-left"></i>
                </p>

              </a>

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('admin.role.index')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Danh sách</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('admin.role.create-form')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Thêm mới</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
             <a href="{{route('admin.setting')}}" class="nav-link">
              <i class="nav-icon fas fa-duotone fa-gear"></i>
              <p> Cài đặt </p>
             </a>
           </li>

           <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
              <i class="fas nav-icon fa-regular fa-arrow-right-from-bracket"></i>
             <p>Đăng xuất </p>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
            </a>
          </li>

          </li>
        </ul>
        
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>