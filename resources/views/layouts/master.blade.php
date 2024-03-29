
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <script>window.baseUrl = '{{url('/')}}'</script>

  <title>AdminLTE 3 | Starter</title>
  <script src="https://kit.fontawesome.com/6213d3caae.js" crossorigin="anonymous"></script>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <ul class="navbar-nav">
      <li class="nav-item">
        <a href="#" data-widget="pushmenu" class="nav-link"><i class="fa fa-bars"></i></a>
      </li>
    </ul>
    <!-- SEARCH FORM -->
	<div class="input-group input-group-sm">
	<input class="form-control form-control-navbar" @keyup.enter="searchIt" v-model="search" type="search" placeholder="Search" aria-label="Search">
	<div class="input-group-append">
		<button class="btn btn-navbar" @click="searchIt" >
		<i class="fas fa-search"></i>
		</button>
	</div>
	</div>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="images/support.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">پنل مدیریت</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="images/man.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
		  <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <router-link to="/dashboard" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt blue"></i>
              <p>
                داشبورد
              </p>
            </router-link>
          </li>
          @can('isAdmin')
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cog green"></i>
              <p>
                مدیریت
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              	<li class="nav-item">
					<router-link to="/users" class="nav-link">
					<i class="nav-icon fas fa-users nav-icon "></i>
					<p>کاربران</p>
					</router-link>
				</li>
				{{-- <li class="nav-item">
					<router-link to="/products" class="nav-link">
						<i class="nav-icon fas fa-gifts pink nav-icon "></i>
						<p>محصولات</p>
					</router-link>
				</li> --}}
            </ul>
		</li>
		<li class="nav-item has-treeview">
			<a href="#" class="nav-link">
				<i class="nav-icon fas fa-gifts pink"></i>
				<p>
				محصولات
				<i class="right fas fa-angle-left"></i>
				</p>
			</a>
			<ul class="nav nav-treeview">
				<li class="nav-item">
				<router-link to="/products" class="nav-link">
					<i class="nav-icon fas fa-gift pink nav-icon "></i>
					<p>محبوب ها</p>
				</router-link>
				</li>
			</ul>
		</li>
		<li class="nav-item">
		<router-link to="/developer" class="nav-link">
			<i class="nav-icon fas fa-cogs"></i>
			<p>
			developer
			</p>
		</router-link>
		</li>
		  @endcan
          <li class="nav-item">
            <router-link to="/profile" class="nav-link">
              <i class="nav-icon fas fa-user orange"></i>
              <p>
                پروفایل
              </p>
            </router-link>
          </li>
          <li class="nav-item">
              <a href="{{route('logout')}}" class="nav-link">
                <i class="nav-icon fas fa-power-off red"></i>
                <p>
                  خروج
                </p>
              </a>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <router-view></router-view>
        <vue-progress-bar></vue-progress-bar>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
@auth
	<script>
		window.user = @json(auth()->user());
	</script>
@endauth
<script src="js/app.js"></script>
</body>
</html>
