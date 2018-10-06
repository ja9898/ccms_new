<!-- REQUIRED JS SCRIPTS -->


<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<!-- Sweet Alert JS -->
<script src="{{ asset('js/sweetalert.min.js') }}" defer></script>

<!-- FastClick -->
<script src="{{ asset('bower_components/fastclick/lib/fastclick.js') }}"></script>

<!-- SlimScroll -->
<script src="{{ asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
  })
</script>


<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
     <!-- page script -->
@if (\Request::is('admins') or \Request::is('roles') or \Request::is('categories') or \Request::is('lead/leadview') or \Request::is('recording/recordingview') or \Request::is('lead/lead_detail') or \Request::is('appointment/appointmentview') or \Request::is('user') or \Request::is('teacher') or \Request::is('parent') or \Request::is('student') or \Request::is('teacher_timing') or \Request::is('teacher_course') or \Request::is('schedule') or \Request::is('daily_schedule') or \Request::is('student_classes') or \Request::is('trial_confirmation') or \Request::is('invoice') or \Request::is('schedule_parent') or \Route::currentRouteName('schedule_parent.search'))  
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

  <script>
    $(function () {
      $('#example1').DataTable()
      $('#example2').DataTable({
        'paging'      : true,
        'lengthChange': false,
        'searching'   : false,
        'ordering'    : false,
        'info'        : true,
        'autoWidth'   : false
      })
      $('#example3').DataTable()
	  $('#example4').DataTable({
        'paging'      : false,
        'lengthChange': false,
        'searching'   : false,
        'ordering'    : false,
        'info'        : true,
        'autoWidth'   : false
      })	  
    })
  </script>
@endif
@if(\Request::is('admins')  or \Request::is('categories') or \Request::is('lead/leadview') or \Request::is('recording/recordingview') or \Request::is('appointment/appointmentview'))
<script>
  function archiveFunction(formid) {
    event.preventDefault(); // prevent form submit
      
    swal({
            title: "Delete",
            text: "Are you sure want to delete?", 
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            $('#'+formid).submit();
          } 
        });
      

    }
</script>  
@endif

@if (\Request::is('profile') or \Request::is('admins/create') or Route::currentRouteName()=='admins.edit' or \Request::is('categories/create') or Route::currentRouteName()=='categories.edit' or Route::currentRouteName()=='user.create' or Route::currentRouteName()=='user.edit' or Route::currentRouteName()=='teacher.create' or Route::currentRouteName()=='teacher.edit' or Route::currentRouteName()=='parent.create' or Route::currentRouteName()=='parent.edit' or Route::currentRouteName()=='student.create' or Route::currentRouteName()=='student.edit')  
<script src="{{ asset('js/fileinput.min.js') }}"></script>
  <script>
  @if(Route::currentRouteName()=='admins.edit' or \Request::is('profile') )
      var avatarName="{{ asset ('img/staff/'.$user->avatar)}}";
    @else
    var avatarName='{{ asset ('img/placeholder.png') }}';
    @endif

  $("#avatar-1").fileinput({
      overwriteInitial: true,
      maxFileSize: 1000,
      showClose: false,
      showCaption: false,
      browseLabel: '',
      removeLabel: '',
      browseOnZoneClick: true,
      browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
      removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
      removeTitle: 'Cancel or reset changes',
      elErrorContainer: '#kv-avatar-errors-1',
      msgErrorClass: 'alert alert-block alert-danger',
      defaultPreviewContent: '<img src="'+ avatarName +'" alt="Your Avatar" width="100%">',
      layoutTemplates: {main2: '{preview} {browse}'},
      allowedFileExtensions: ["jpg", "png", "gif"]
  });
  </script>
@endif
@if (\Request::is('dashboard'))  
<!-- ChartJS -->
<script src="{{ asset('bower_components/chart.js/Chart.js') }}"></script>
<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */


var areaChartData = {
  labels  : ['1', '2', '3', '4', '5', '6', '7'],
  datasets: [
    {
      label               : 'Sales',
      fillColor           : 'rgba(210, 214, 222, 1)',
      strokeColor         : 'rgba(210, 214, 222, 1)',
      pointColor          : 'rgba(210, 214, 222, 1)',
      pointStrokeColor    : '#c1c7d1',
      pointHighlightFill  : '#fff',
      pointHighlightStroke: 'rgba(220,220,220,1)',
      data                : [65, 59, 80, 81, 56, 55, 40]
    }
  ]
}

 var areaChartOptions = {
      //Boolean - If we should show the scale at all
      showScale               : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : false,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - Whether the line is curved between points
      bezierCurve             : true,
      //Number - Tension of the bezier curve between points
      bezierCurveTension      : 0.3,
      //Boolean - Whether to show a dot for each point
      pointDot                : false,
      //Number - Radius of each point dot in pixels
      pointDotRadius          : 4,
      //Number - Pixel width of point dot stroke
      pointDotStrokeWidth     : 1,
      //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
      pointHitDetectionRadius : 20,
      //Boolean - Whether to show a stroke for datasets
      datasetStroke           : true,
      //Number - Pixel width of dataset stroke
      datasetStrokeWidth      : 2,
      //Boolean - Whether to fill the dataset with a color
      datasetFill             : true,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio     : true,
      //Boolean - whether to make the chart responsive to window resizing
      responsive              : true
    }


    //Create the line chart
    //-------------
    //- LINE CHART -
    //--------------
    var lineChartCanvas          = $('#lineChart').get(0).getContext('2d')
    var lineChart                = new Chart(lineChartCanvas)
    var lineChartOptions         = areaChartOptions
    lineChartOptions.datasetFill = false
    lineChart.Line(areaChartData, lineChartOptions)



    //-------------
    //- BAR CHART - 0
    //-------------
    var barChartCanvas                   = $('#barChart').get(0).getContext('2d')
    var barChart                         = new Chart(barChartCanvas)
    var barChartData                     = areaChartData
    barChartData.datasets[0].fillColor   = '#00a65a'
    barChartData.datasets[0].strokeColor = '#00a65a'
    barChartData.datasets[0].pointColor  = '#00a65a'
    var barChartOptions                  = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero        : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : true,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - If there is a stroke on each bar
      barShowStroke           : true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth          : 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing         : 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing       : 1,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to make the chart responsive
      responsive              : true,
      maintainAspectRatio     : true
    }

    barChartOptions.datasetFill = false
    barChart.Bar(barChartData, barChartOptions)

    //-------------
    //- BAR CHART - 1
    //-------------
    var barChartCanvas                   = $('#barChart1').get(0).getContext('2d')
    var barChart                         = new Chart(barChartCanvas)
    var barChartData                     = areaChartData
    barChartData.datasets[0].fillColor   = '#dd4b39'
    barChartData.datasets[0].strokeColor = '#dd4b39'
    barChartData.datasets[0].pointColor  = '#dd4b39'
    barChartOptions.datasetFill = false
    barChart.Bar(barChartData, barChartOptions)

    //-------------
    //- BAR CHART - 2
    //-------------
    var barChartCanvas                   = $('#barChart2').get(0).getContext('2d')
    var barChart                         = new Chart(barChartCanvas)
    var barChartData                     = areaChartData
    barChartData.datasets[0].fillColor   = '#00c0ef'
    barChartData.datasets[0].strokeColor = '#00c0ef'
    barChartData.datasets[0].pointColor  = '#00c0ef'
    barChartOptions.datasetFill = false
    barChart.Bar(barChartData, barChartOptions)

  })
</script>
@endif
