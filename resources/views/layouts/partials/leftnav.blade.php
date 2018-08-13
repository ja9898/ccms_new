<?php
$user = Auth::user();
?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">

  <!-- Sidebar user panel (optional) -->
  <div class="user-panel">
    <div class="pull-left image">
      <img src="{{ asset('img/staff/'.$user->avatar) }}" class="img-circle" alt="User Image">
    </div>
    <div class="pull-left info">
      <p>{{$user->fname}} {{$user->lname}}</p>
      <p>Super Admin</p>
    </div>
  </div>
  <?php $urlpath=Request::path();?>
  <!-- Sidebar Menu -->
  <ul class="sidebar-menu" data-widget="tree">
    <li class="header">NAVIGATION</li>
    
    <li class="<?php echo ($urlpath == 'dashboard') ? "active" : ""; ?>"><a href="{!! url('/dashboard'); !!}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>

    <li class="treeview <?php echo ($urlpath == 'admins' || $urlpath == 'roles' || Route::currentRouteName()=='roles.edit'  || Route::currentRouteName()=='admins.edit' || Route::currentRouteName()=='admins.create' || Route::currentRouteName()=='admins.show' ) ? "active" : ""; ?>">
      <a href="#"><i class="fa fa-users"></i> <span>Admins</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
      </a>
      <ul class="treeview-menu">
      <li class="<?php echo ($urlpath == 'roles' || Route::currentRouteName()=='roles.edit'  ) ? "active" : ""; ?>"><a href="{!! url('/roles'); !!}">Roles</a></li>
        <li class="<?php echo ($urlpath == 'admins' || Route::currentRouteName()=='admins.edit' || Route::currentRouteName()=='admins.create' || Route::currentRouteName()=='admins.show') ? "active" : ""; ?>"><a href="{!! url('/admins'); !!}">Manage Admins</a></li>
		<li class="<?php echo ($urlpath == 'lead.leadview' || Route::currentRouteName()=='admins.edit' || Route::currentRouteName()=='admins.create' || Route::currentRouteName()=='admins.show') ? "active" : ""; ?>"><a href="{!! url('/lead/leadview'); !!}">Leads</a></li>
		<li class="<?php echo ($urlpath == 'recording.recordingview' || Route::currentRouteName()=='admins.edit' || Route::currentRouteName()=='admins.create' || Route::currentRouteName()=='admins.show') ? "active" : ""; ?>"><a href="{!! url('/recording/recordingview'); !!}">Recordings</a></li>
      </ul>
    </li>
    <li class="<?php echo ($urlpath == 'categories' || Route::currentRouteName()=='categories.create' || Route::currentRouteName()=='categories.edit')  ? "active" : ""; ?>"><a href="{!! url('/categories'); !!}"><i class="fa fa-tag"></i> <span>Categories</span></a></li>
    <!-- Multi Level 
    <li class="treeview">
      <a href="#"><i class="fa fa-link"></i> <span>Multilevel</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="#">Link in level 2</a></li>
        <li><a href="#">Link in level 2</a></li>
      </ul>
    </li>
    Multi Level Ends -->
    <li>
          <a href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
          <i class="fa fa-sign-out"></i> <span>Logout</span>
        </a>
      </li>
  </ul>
  <!-- /.sidebar-menu -->
</section>
<!-- /.sidebar -->
</aside>