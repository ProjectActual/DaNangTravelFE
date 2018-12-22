$(function () {
  'use strict';

  const data = JSON.parse($('#areaChart').attr('statistic'));
  if(data == 0) {
    return;
  }
  var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
  var areaChart       = new Chart(areaChartCanvas)

  var areaChartData = {
    labels  : data.dataLabel,
    datasets: [
    {
      label               : 'Electronics',
      fillColor           : 'rgba(241,3,19,0.8)',
      strokeColor         : 'rgba(241,3,19,0.8)',
      pointColor          : 'rgba(241,3,19,0.8)',
      pointStrokeColor    : '#c1c7d1',
      pointHighlightFill  : '#fff',
      pointHighlightStroke: 'rgba(220,220,220,1)',
      data                : data.data_view
    },
    {
      label               : 'Digital Goods',
      fillColor           : 'rgba(60,141,188,0.7)',
      strokeColor         : 'rgba(60,141,188,0.7)',
      pointColor          : 'rgba(60,141,188,0.7)',
      pointStrokeColor    : 'rgba(60,141,188,1)',
      pointHighlightFill  : '#fff',
      pointHighlightStroke: 'rgba(60,141,188,1)',
      data                : data.data_post
    }
    ]
  }

  var areaChartOptions = {
    showScale               : true,
    scaleShowGridLines      : false,
    scaleGridLineColor      : 'rgba(0,0,0,.05)',
    scaleGridLineWidth      : 1,
    scaleShowHorizontalLines: true,
    scaleShowVerticalLines  : true,
    bezierCurve             : true,
    bezierCurveTension      : 0.3,
    pointDot                : false,
    pointDotRadius          : 4,
    pointDotStrokeWidth     : 1,
    pointHitDetectionRadius : 20,
    datasetStroke           : true,
    datasetStrokeWidth      : 2,
    datasetFill             : false,
    legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
    maintainAspectRatio     : true,
    responsive              : true
  }

  // areaChartOptions.datasetFill = false
  areaChart.Line(areaChartData, areaChartOptions)
})
