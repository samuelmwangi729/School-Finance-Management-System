<!DOCTYPE html>
<html>
<head>
	<title>Comparison of Balances between Classes</title>
	<link rel="stylesheet" href="chart.js/bootstrap.min.css" />
	<script src="chart.js/jquery.min.js"></script>
	<script src="chart.js/bootstrap.min.js"></script>

	<!-- ChartJS -->
	<script src="chart.js/Chart.js"></script>
</head>
<body>
<div class="container">
	<h1 class="page-header text-center">Line Chart View Of Total Balances Per Class</h1>
  <a href="#" class="btn btn-primary" style="float: right" onclick="window.print()">Print Information</a>
	<div class="row">
		<div class="col-md-8">
			<div class="box box-success">
            <div class="box-body">
              <div class="chart">
                <canvas id="lineChart" style="height:20px;width: 50px"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
        </div>
		</div>
	</div>
</div>
<?php include('data.php'); ?>
<script>
  $(function () {
    var lineChartData = {
      labels  : ['Form 1', 'Form 2', 'Form 3', 'Form 4'],
      datasets: [
        {
          label               : 'This School',
          fillColor           : 'rgba(60,141,188,0.9)',
          strokeColor         : 'rgba(60,141,188,0.8)',
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [ "<?php echo $tjan; ?>",
                                  "<?php echo $tfeb; ?>",
                                  "<?php echo $tmar; ?>",
                                  "<?php echo $tapr; ?>" 
                                ]
        }
      ]
    }
  
    var lineChartCanvas          = $('#lineChart').get(0).getContext('2d')
    var lineChart                = new Chart(lineChartCanvas)
    var lineChartOptions = {
      //Boolean - If we should show the scale at all
      showScale               : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : true,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'red',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: false,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - Whether the line is curved between points
      bezierCurve             : true,
      //Number - Tension of the bezier curve between points
      bezierCurveTension      : 0.3,
      //Boolean - Whether to show a dot for each point
      pointDot                : true,
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
      datasetFill             : false,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio     : true,
      //Boolean - whether to make the chart responsive to window resizing
      responsive              : true
    }
    
    lineChartOptions.datasetFill = false
    lineChart.Line(lineChartData, lineChartOptions)

  })
</script>
</body>
</html>