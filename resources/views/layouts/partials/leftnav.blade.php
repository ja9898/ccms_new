<?php
$user = Auth::user();
$_LIST=array('Select Currency','GBP','USD','CAD','AUD','NZD','SGD');
  
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
      <p>
	  <?php 
	  if($user->user_type==1){
		echo "Super Admin";
	  }
	  if($user->user_type==2){
		echo "Admin";
	  }
	  if($user->user_type==3){
		echo "User";
	  }	  
	  ?>
	  </p>
    </div>
  </div>
  <?php $urlpath=Request::path();?>
  <!-- Sidebar Menu -->
  <ul class="sidebar-menu" data-widget="tree">
    <li class="header">NAVIGATION</li>
    
    <li class="<?php echo ($urlpath == 'dashboard') ? "active" : ""; ?>">
	  <a href="{!! url('/dashboard'); !!}"><i class="fa fa-dashboard"></i> <span>Dashboard</span>
	  </a>
	</li>

    <li class="treeview <?php echo ($urlpath == 'admins' || $urlpath == 'roles' || Route::currentRouteName()=='roles.edit'  || Route::currentRouteName()=='admins.edit' || Route::currentRouteName()=='admins.create' || Route::currentRouteName()=='admins.show' ) ? "active" : ""; ?>">
      <a href="#"><i class="fa fa-users"></i> <span>Admins</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
      </a>
      <ul class="treeview-menu">
		<!--<li class="<?php echo ($urlpath == 'roles' || Route::currentRouteName()=='roles.edit'  ) ? "active" : ""; ?>"><a href="{!! url('/roles'); !!}">Roles</a></li>-->
        <li class="<?php echo ($urlpath == 'admins' || Route::currentRouteName()=='admins.edit' || Route::currentRouteName()=='user.create' || Route::currentRouteName()=='user.show') ? "active" : ""; ?>"><a href="{!! url('/user'); !!}">Manage Users</a></li>
		<li class="<?php echo ($urlpath == 'teacher' || Route::currentRouteName()=='teacher.edit' || Route::currentRouteName()=='teacher.create' || Route::currentRouteName()=='teacher.show') ? "active" : ""; ?>"><a href="{!! url('/teacher'); !!}">Manage Teachers</a></li>
		
		<li class="<?php echo ($urlpath == 'teacher_timing' || Route::currentRouteName()=='teacher_timing.edit' || Route::currentRouteName()=='teacher_timing.create' || Route::currentRouteName()=='teacher_timing.show') ? "active" : ""; ?>"><a href="{!! url('/teacher_timing'); !!}">Manage Teacher Timing</a></li>
		<li class="<?php echo ($urlpath == 'teacher_course' || Route::currentRouteName()=='teacher_course.edit' || Route::currentRouteName()=='teacher_course.create' || Route::currentRouteName()=='teacher_course.show') ? "active" : ""; ?>"><a href="{!! url('/teacher_course'); !!}">Manage Teacher Course</a></li>
      </ul>
    </li>
	<!--Teamlead -->
	<li class="treeview <?php echo ($urlpath == 'student' || $urlpath == 'student' || Route::currentRouteName()=='student.edit'  || Route::currentRouteName()=='student.create' || Route::currentRouteName()=='student.show' ) ? "active" : ""; ?>">
      <a href="#"><i class="fa fa-tasks"></i> <span>Teamlead</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
      </a>
      <ul class="treeview-menu">
		<li class="<?php echo ($urlpath == 'teamlead_assign' || Route::currentRouteName()=='teamlead_assign.edit' || Route::currentRouteName()=='teamlead_assign.create' || Route::currentRouteName()=='teamlead_assign.show') ? "active" : ""; ?>"><a href="{!! url('/teamlead_assign'); !!}">Teamlead assign</a></li>
      </ul>
    </li>
	<!--Schedule -->
	<li class="treeview <?php echo ($urlpath == 'schedule' || $urlpath == 'schedule' || Route::currentRouteName()=='schedule.edit'  || Route::currentRouteName()=='schedule.create' || Route::currentRouteName()=='schedule.show' ) ? "active" : ""; ?>">
      <a href="#"><i class="fa fa-table"></i> <span>Schedule</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
      </a>
      <ul class="treeview-menu">
	    <li class="<?php echo ($urlpath == 'trial_confirmation' || Route::currentRouteName()=='trial_confirmation.edit' || Route::currentRouteName()=='trial_confirmation.create' || Route::currentRouteName()=='trial_confirmation.show') ? "active" : ""; ?>"><a href="{!! url('/trial_confirmation'); !!}">Trial Confirmation List</a></li>
		<li class="<?php echo ($urlpath == 'daily_schedule' || Route::currentRouteName()=='daily_schedule.edit' || Route::currentRouteName()=='daily_schedule.create' || Route::currentRouteName()=='daily_schedule.show') ? "active" : ""; ?>"><a href="{!! url('/daily_schedule'); !!}">Daily Schedule</a></li>
		<li class="<?php echo ($urlpath == 'schedule' || Route::currentRouteName()=='schedule.edit' || Route::currentRouteName()=='schedule.create' || Route::currentRouteName()=='schedule.show') ? "active" : ""; ?>"><a href="{!! url('/schedule'); !!}">Manage Schedule</a></li>
		<li class="<?php echo ($urlpath == 'schedule_parent' || Route::currentRouteName()=='schedule_parent.edit' || Route::currentRouteName()=='schedule_parent.create' || Route::currentRouteName()=='schedule_parent.show') ? "active" : ""; ?>"><a href="{!! url('/schedule_parent'); !!}">Manage Schedule Parent</a></li>
      </ul>
    </li>
	<!--Student -->
    <li class="treeview <?php echo ($urlpath == 'student' || $urlpath == 'student' || Route::currentRouteName()=='student.edit'  || Route::currentRouteName()=='student.create' || Route::currentRouteName()=='student.show' ) ? "active" : ""; ?>">
      <a href="#"><i class="fa fa-child"></i> <span>Students</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
      </a>
     <ul class="treeview-menu">
		<li class="<?php echo ($urlpath == 'parent' || Route::currentRouteName()=='parent.edit' || Route::currentRouteName()=='parent.create' || Route::currentRouteName()=='parent.show') ? "active" : ""; ?>"><a href="{!! url('/parent'); !!}">Manage Parents</a></li>
		<li class="<?php echo ($urlpath == 'student' || Route::currentRouteName()=='student.edit' || Route::currentRouteName()=='student.create' || Route::currentRouteName()=='student.show') ? "active" : ""; ?>"><a href="{!! url('/student'); !!}">Manage Students</a></li>
		<li class="<?php echo ($urlpath == 'student_classes' || Route::currentRouteName()=='student_classes.edit' || Route::currentRouteName()=='student_classes.create' || Route::currentRouteName()=='student_classes.show') ? "active" : ""; ?>"><a href="{!! url('/student_classes'); !!}">Student Classes</a></li>
      </ul>
    </li>	
    <!-- <li class="<?php //echo ($urlpath == 'categories' || Route::currentRouteName()=='categories.create' || Route::currentRouteName()=='categories.edit')  ? "active" : ""; ?>"><a href="{!! url('/categories'); !!}"><i class="fa fa-tag"></i> <span>Categories</span></a></li>
    Multi Level 
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