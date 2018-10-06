@extends('layouts.mainlayout')
@section('content')
@if(session('success'))
    <script>
      $( document ).ready(function() {
        swal("Success", "{{session('success')}}", "success");
      });
      
    </script>
@endif
<!-- some CSS styling changes and overrides -->
<style>
.kv-avatar .krajee-default.file-preview-frame,.kv-avatar .krajee-default.file-preview-frame:hover {
    margin: 0;
    padding: 0;
    border: none;
    box-shadow: none;
    text-align: center;
}
.kv-avatar {
    display: inline-block;
}
.kv-avatar .file-input {
    display: table-cell;
    width: 213px;
}
.kv-reqd {
    color: red;
    font-family: monospace;
    font-weight: normal;
}
</style>

    <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Student: {{$id}}  Details</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" >
            <div class="row">
              <div class="col-md-4 text-center">
                  <div class="kv-avatar">
                          <img src="{{ asset('img/staff/default_avatar_male.jpg') }}" width="90%">
                  </div>
              </div>  
              <div class="col-md-8">
              <table class="table table-striped">
                <tr>
                    <td><b>First Name</b></td>
                    <td>Student</td>
                </tr>
                <tr>
                    <td><b>Last Name</b></td>
                    <td>{{$id}}</td>
                </tr>
                <tr>
                    <td><b>Email</b></td>
                    <td>test@test.com</td>
                </tr>
                <tr>
                    <td><b>Phone Number</b></td>
                    <td>123</td>
                </tr>
                <tr>
                    <td><b>Created At</b></td>
                    <td><?php echo date('d-m-Y')?></td>
                </tr>
                <tr>
                    <td><b>Updated At</b></td>
                    <td><?php echo date('d-m-Y')?></td>
                </tr>
                <tr>
                    <td><b>Status</b></td>
                    <td>
                          <span class="text-green"><b>Active</b></span>
                          <span class="text-red"><b>Deactive</b></span>
                    </td>
                </tr>
                <tr>
                    <td><b>User type</b></td>
                    <td>Student</td>
                </tr>
                <tr>
                    <td><b>Country</b></td>
                    <td>USA</td>
                </tr>
              </table>
                  

              </div>
              </div>

          </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="{!! url('/parents'); !!}" class="btn btn-default">Back</a>
              </div>
              <!-- /.box-footer -->
</div>
@endsection