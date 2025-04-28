$(function() {
    var chartOptions = {
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
        datasetFill             : true,
        legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
        maintainAspectRatio     : true,
        responsive              : false
    }

    // view monthly chart
    var viewMonthlyChartCanvas = $('#viewMonthlyChart canvas').get(0).getContext('2d')
    var viewMonthlyChart       = new Chart(viewMonthlyChartCanvas)

    var viewMonthlyChartData = {
        labels  : [
            '01', '02', '03', '04', '05', '06', '07', '08', '09', '10',
            '11', '12', '13', '14', '15', '16', '17', '18', '19', '20',
            '21', '22', '23', '24', '25', '26', '27', '28', '29', '30',
        ],
        datasets: [
            {
                label               : 'Electronics',
                fillColor           : 'rgba(210, 214, 222, 1)',
                strokeColor         : 'rgba(210, 214, 222, 1)',
                pointColor          : 'rgba(210, 214, 222, 1)',
                pointStrokeColor    : '#c1c7d1',
                pointHighlightFill  : '#fff',
                pointHighlightStroke: 'rgba(220,220,220,1)',
                data                : [65, 59, 80, 81, 56, 55, 40, 65, 59, 80, 81, 56, 55, 40, 65, 59, 80, 81, 56, 55, 40, 65, 59, 80, 81, 56, 55, 40, 65, 59]
            },
            {
                label               : 'Digital Goods',
                fillColor           : 'rgba(60,141,188,0.9)',
                strokeColor         : 'rgba(60,141,188,0.8)',
                pointColor          : '#3b8bba',
                pointStrokeColor    : 'rgba(60,141,188,1)',
                pointHighlightFill  : '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data                : [28, 48, 40, 19, 86, 27, 90, 28, 48, 40, 19, 86, 27, 90, 28, 48, 40, 19, 86, 27, 90, 28, 48, 40, 19, 86, 27, 90, 28, 48]
            }
        ]
    }

    viewMonthlyChart.Line(viewMonthlyChartData, chartOptions)

    // view yearly chart
    var viewYearlyChartCanvas = $('#viewYearlyChart canvas').get(0).getContext('2d')
    var viewYearlyChart       = new Chart(viewYearlyChartCanvas)

    var viewYearlyChartData = {
        labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [
            {
                label               : 'Electronics',
                fillColor           : 'rgba(210, 214, 222, 1)',
                strokeColor         : 'rgba(210, 214, 222, 1)',
                pointColor          : 'rgba(210, 214, 222, 1)',
                pointStrokeColor    : '#c1c7d1',
                pointHighlightFill  : '#fff',
                pointHighlightStroke: 'rgba(220,220,220,1)',
                data                : [65, 59, 80, 81, 56, 55, 40]
            },
            {
                label               : 'Digital Goods',
                fillColor           : 'rgba(60,141,188,0.9)',
                strokeColor         : 'rgba(60,141,188,0.8)',
                pointColor          : '#3b8bba',
                pointStrokeColor    : 'rgba(60,141,188,1)',
                pointHighlightFill  : '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data                : [28, 48, 40, 19, 86, 27, 90]
            }
        ]
    }

    viewYearlyChart.Line(viewYearlyChartData, chartOptions)

    // view weekly chart
    var viewWeeklyChartCanvas = $('#viewWeeklyChart canvas').get(0).getContext('2d')
    var viewWeeklyChart       = new Chart(viewWeeklyChartCanvas)

    var viewWeeklyChartData = {
        labels  : ['Monday', 'Tuesday', 'Wednesday', 'Thurday', 'Friday', 'Saturday', 'Sunday'],
        datasets: [
            {
                label               : 'Electronics',
                fillColor           : 'rgba(210, 214, 222, 1)',
                strokeColor         : 'rgba(210, 214, 222, 1)',
                pointColor          : 'rgba(210, 214, 222, 1)',
                pointStrokeColor    : '#c1c7d1',
                pointHighlightFill  : '#fff',
                pointHighlightStroke: 'rgba(220,220,220,1)',
                data                : [65, 59, 80, 81, 56, 55, 40]
            },
            {
                label               : 'Digital Goods',
                fillColor           : 'rgba(60,141,188,0.9)',
                strokeColor         : 'rgba(60,141,188,0.8)',
                pointColor          : '#3b8bba',
                pointStrokeColor    : 'rgba(60,141,188,1)',
                pointHighlightFill  : '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data                : [28, 48, 40, 19, 86, 27, 90]
            }
        ]
    }

    viewWeeklyChart.Line(viewWeeklyChartData, chartOptions)


    // sell yearly chart
    var sellYearlyChartCanvas = $('#sellYearlyChart canvas').get(0).getContext('2d')
    var sellYearlyChart       = new Chart(sellYearlyChartCanvas)

    var sellYearlyChartData = {
        labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [
            {
                label               : 'Electronics',
                fillColor           : 'rgba(210, 239, 203, 1)',
                strokeColor         : 'rgba(210, 239, 203, 1)',
                pointColor          : 'rgba(210, 239, 203, 1)',
                pointStrokeColor    : '#c1c7d1',
                pointHighlightFill  : '#fff',
                pointHighlightStroke: 'rgba(210,239,203,1)',
                data                : [65, 59, 80, 81, 56, 55, 40]
            },
            {
                label               : 'Digital Goods',
                fillColor           : 'rgba(0,166,90,0.9)',
                strokeColor         : 'rgba(0,166,90,0.8)',
                pointColor          : 'rgba(0,166,90,1)',
                pointStrokeColor    : 'rgba(0,166,90,1)',
                pointHighlightFill  : '#fff',
                pointHighlightStroke: 'rgba(0,166,90,1)',
                data                : [28, 48, 40, 19, 86, 27, 90]
            }
        ]
    }

    sellYearlyChart.Line(sellYearlyChartData, chartOptions)


    // sell weekly chart
    var sellWeeklyChartCanvas = $('#sellWeeklyChart canvas').get(0).getContext('2d')
    var sellWeeklyChart       = new Chart(sellWeeklyChartCanvas)

    var sellWeeklyChartData = {
        labels  : ['Monday', 'Tuesday', 'Wednesday', 'Thurday', 'Friday', 'Saturday', 'Sunday'],
        datasets: [
            {
                label               : 'Electronics',
                fillColor           : 'rgba(210, 239, 203, 1)',
                strokeColor         : 'rgba(210, 239, 203, 1)',
                pointColor          : 'rgba(210, 239, 203, 1)',
                pointStrokeColor    : '#c1c7d1',
                pointHighlightFill  : '#fff',
                pointHighlightStroke: 'rgba(210,239,203,1)',
                data                : [65, 59, 80, 81, 56, 55, 40]
            },
            {
                label               : 'Digital Goods',
                fillColor           : 'rgba(0,166,90,0.9)',
                strokeColor         : 'rgba(0,166,90,0.8)',
                pointColor          : 'rgba(0,166,90,1)',
                pointStrokeColor    : 'rgba(0,166,90,1)',
                pointHighlightFill  : '#fff',
                pointHighlightStroke: 'rgba(0,166,90,1)',
                data                : [28, 48, 40, 19, 86, 27, 90]
            }
        ]
    }

    sellWeeklyChart.Line(sellWeeklyChartData, chartOptions)


    // sell monthly chart
    var sellMonthlyChartCanvas = $('#sellMonthlyChart canvas').get(0).getContext('2d')
    var sellMonthlyChart       = new Chart(sellMonthlyChartCanvas)

    var sellMonthlyChartData = {
        labels  : [
            '01', '02', '03', '04', '05', '06', '07', '08', '09', '10',
            '11', '12', '13', '14', '15', '16', '17', '18', '19', '20',
            '21', '22', '23', '24', '25', '26', '27', '28', '29', '30',
        ],
        datasets: [
            {
                label               : 'Electronics',
                fillColor           : 'rgba(210, 239, 203, 1)',
                strokeColor         : 'rgba(210, 239, 203, 1)',
                pointColor          : 'rgba(210, 239, 203, 1)',
                pointStrokeColor    : '#c1c7d1',
                pointHighlightFill  : '#fff',
                pointHighlightStroke: 'rgba(210,239,203,1)',
                data                : [65, 59, 80, 81, 56, 55, 40, 65, 59, 80, 81, 56, 55, 40, 65, 59, 80, 81, 56, 55, 40, 65, 59, 80, 81, 56, 55, 40, 65, 59]
            },
            {
                label               : 'Digital Goods',
                fillColor           : 'rgba(0,166,90,0.9)',
                strokeColor         : 'rgba(0,166,90,0.8)',
                pointColor          : 'rgba(0,166,90,1)',
                pointStrokeColor    : 'rgba(0,166,90,1)',
                pointHighlightFill  : '#fff',
                pointHighlightStroke: 'rgba(0,166,90,1)',
                data                : [28, 48, 40, 19, 86, 27, 90, 28, 48, 40, 19, 86, 27, 90, 28, 48, 40, 19, 86, 27, 90, 28, 48, 40, 19, 86, 27, 90, 28, 48]
            }
        ]
    }

    sellMonthlyChart.Line(sellMonthlyChartData, chartOptions)


    var activeViewChart = $('.btn-group .btn-primary').data('chart')
    var activeSellChart = $('.btn-group .btn-success').data('chart')
    $('.chart .chart-block').addClass('hidden')
    $(activeViewChart).removeClass('hidden')
    $(activeSellChart).removeClass('hidden')

    $('.btn-group button').click(function() {
        var parent = $(this).parent()
        var activeClass = parent.data('active')
        parent.find('button').removeClass(activeClass)
        parent.find('button').addClass('btn-default')
        $(this).removeClass('btn-default')
        $(this).addClass(activeClass)

        var activeCanvas = $(this).data('chart')
        parent.parent().parent().find('.chart-block').addClass('hidden')
        $(activeCanvas).removeClass('hidden')
    })
})