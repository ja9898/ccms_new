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
              <h3 class="box-title">Class Details</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" >
            <div class="row"> 
              <div class="col-md-12">
              <table class="table table-striped">
                <tr>
                    <td><b>Due Date</b></td>
                    <td><?php echo date('d')?></td>
                </tr>
				<tr>
                    <td width="25%"><b>Student </b></td>
                    <td width="75%">{{ $id }}</td>
                </tr>
				<tr>
                    <td width="25%"><b>Teacher</b></td>
                    <td width="75%">{{ $id }}</td>
                </tr>
				<tr>
                    <td width="25%"><b>TeamLead</b></td>
                    <td width="75%">xyz TL</td>
                </tr>
				<tr>
                    <td width="25%"><b>Start time</b></td>
                    <td width="75%">14:00</td>
                </tr>
				<tr>
                    <td width="25%"><b>Class Start time</b></td>
                    <td width="75%">14:20</td>
                </tr>
				<tr>
                    <td width="25%"><b>Class End time</b></td>
                    <td width="75%">14:58</td>
                </tr>
				<tr>
                    <td width="25%"><b>Class Duration</b></td>
                    <td width="75%">00:40:00</td>
                </tr>
				<tr>
                    <td width="25%"><b>Date</b></td>
                    <td width="75%"><?php echo date('Y-m-d'); ?></td>
                </tr>
				<tr>
                    <td width="25%"><b>Status</b></td>
                    <td width="75%">Regular</td>
                </tr>
				<tr>
                    <td width="25%"><b>Grade</b></td>
                    <td width="75%">10</td>
                </tr>
				<tr>
                    <td width="25%"><b>Lesson Details</b></td>
                    <td width="75%">Regular</td>
                </tr>
				<tr>
                    <td width="25%"><b>Dua</b></td>
                    <td width="75%">Dua {{ $id }}</td>
                </tr>
				<tr>
                    <td width="25%"><b>Prayer</b></td>
                    <td width="75%">Prayer {{ $id }}</td>
                </tr>
				<tr>
                    <td width="25%"><b>Kalima</b></td>
                    <td width="75%">Kalima {{ $id }}</td>
                </tr>
				<tr>
                    <td width="25%"><b>Lesson</b></td>
                    <td width="75%">Lesson {{ $id }}</td>
                </tr>
				<tr>
                    <td width="25%"><b>Surah</b></td>
                    <td width="75%">Surah {{ $id }}</td>
                </tr>
				<tr>
                    <td width="25%"><b>Verse(FROM-TO)</b></td>
                    <td width="75%">{{ $id }} - {{ $id }}</td>
                </tr>
                <tr>
                    <td><b>Created At</b></td>
                    <td><?php echo date('d-m-Y')?></td>
                </tr>
                <tr>
                    <td><b>Updated At</b></td>
                    <td><?php echo date('d-m-Y')?></td>
                </tr>				
              </table>
                  

              </div>
              </div>

          </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="{!! url('/student_classes'); !!}" class="btn btn-default">Back</a>
              </div>
              <!-- /.box-footer -->
</div>
@endsection