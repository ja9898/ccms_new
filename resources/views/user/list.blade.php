@extends('layouts.mainlayout')
@section('content')
@if(session('success'))
    <script>
      $( document ).ready(function() {
        swal("Success", "{{session('success')}}", "success");
      });
      
    </script>
@endif

<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Manage Users</h3>
              <span class="pull-right">
              <a href="{!! url('/user/create'); !!}" class="btn btn-info"><span class="fa fa-plus"></span> Add Staff</a>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
            
              <table id="example1" class="display responsive nowrap" style="width:100%">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone Number</th>
                  <th>Status</th>
				  <th>User</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				  
				  <?php
                  for ($x = 0; $x <= 10; $x++) {
                ?>
                  <tr>
                    <td>John Doe</td>
                    <td>test@test.com</td>
                    <td>123</td>
                    <td><span class="btn btn-success">Active</span></td>
					<td>Super Admin</td>
                    <td>
                      <a href="{!! url('/user/1') !!}" class="btn btn-primary" title="View Detail"><i class="fa fa-eye"></i> </a>    
                      
					  <a class="btn btn-success" title="Edit"  href="{!! url('/user/1/edit') !!}"><i class="fa fa-edit"></i> </a>
                      <a class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i> </a>
                      <a class="btn btn-info" title="Active"><i class="fa fa-check"></i> </a>
                      <a class="btn btn-warning" title="Deactivate"><i class="fa fa-times"></i> </a>
                    </td>
                  </tr>
                  <tr>
                    <td>Student A</td>
                    <td>test@test.com</td>
                    <td>123</td>
                    <td><span class="btn btn-success">Active</span></td>
					<td>Student</td>
                    <td>
                      <a href="{!! url('/user/1') !!}" class="btn btn-primary" title="View Detail"><i class="fa fa-eye"></i> </a>    
                      
					  <a class="btn btn-success" title="Edit"  href="{!! url('/user/1/edit') !!}"><i class="fa fa-edit"></i> </a>
                      <a class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i> </a>
                      <a class="btn btn-info" title="Active"><i class="fa fa-check"></i> </a>
                      <a class="btn btn-warning" title="Deactivate"><i class="fa fa-times"></i> </a>
                    </td>
                  </tr>
				  
                  <tr>
                    <td>Sarah</td>
                    <td>test@test.com</td>
                    <td>123</td>
                    <td><span class="btn btn-danger">Deactive</span></td>
					<td>Admin</td>
                    <td>
                      <a href="{!! url('/users/1') !!}" class="btn btn-primary" title="View Detail"><i class="fa fa-eye"></i> </a>    
                      
					  <a class="btn btn-success" title="Edit" href="{!! url('/roles/1/edit') !!}"><i class="fa fa-edit"></i> </a>
                      <a class="btn btn-info" title="Active"><i class="fa fa-check"></i> </a>
                      <a class="btn btn-warning" title="Deactivate"><i class="fa fa-times"></i> </a>
                    </td>
                  </tr>
                <?php
                  }
                ?>
				  
                </tbody>
                <tfoot>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone Number</th>
                  <th>Status</th>
				  <th>User</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->   

@endsection