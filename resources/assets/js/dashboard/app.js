'use strict';

$(document).ready(function(){
    
    // Make some random data for the Chart
    var d1 = [];
    for (var i = 0; i <= 10; i += 1) {
        d1.push([i, parseInt(Math.random() * 30)]);
    }
    var d2 = [];
    for (var i = 0; i <= 25; i += 4) {
        d2.push([i, parseInt(Math.random() * 30)]);
    }    
    var d3 = [];
    for (var i = 0; i <= 10; i += 1) {
        d3.push([i, parseInt(Math.random() * 30)]);
    }
    
    // Chart Options
    var options = {
        series: {
            shadowSize: 0,
            curvedLines: {
                apply: true,
                active: true,
                monotonicFit: true
            },
            lines: {
                show: false,
                lineWidth: 0
            }
        },
        grid: {
            borderWidth: 0,
            labelMargin:10,
            hoverable: true,
            clickable: true,
            mouseActiveRadius:6
            
        },
        xaxis: {
            tickDecimals: 0,
            ticks: false
        },
        
        yaxis: {
            tickDecimals: 0,
            ticks: false
        },
        
        legend: {
            show: false
        }
    };
    
    // Let's create the chart
    if ($("#chart-curved-line")[0]) {
        $.plot($("#chart-curved-line"), [
            {
                data: d1,
                lines: {
                    show: true,
                    fill: 0.98
                },
                label: 'Product 1',
                stack: true,
                color: '#1e2a31'
            }, {
                data: d3,
                lines: {
                    show: true,
                    fill: 0.98
                },
                label: 'Product 2',
                stack: true,
                color: '#edeff0'
            }
        ], options);
    }
    
    if ($("#chart-past-days")[0]) {
        $.plot($("#chart-past-days"), [{
            data: d2,
            lines: {
                show: true,
                fill: 1,
            },
            label: 'Product 1',
            stack: true,
            color: '#35424b'
        }], options);
    }
    
    // Tooltips for Flot Charts
    if ($('.flot-chart')[0]) {
        $('.flot-chart').bind('plothover', function (event, pos, item) {
            if (item) {
                var x = item.datapoint[0].toFixed(2),
                    y = item.datapoint[1].toFixed(2);
                $('.flot-tooltip').html(item.series.label + ' of ' + x + ' = ' + y).css({top: item.pageY+5, left: item.pageX+5}).show();
            }
            else {
                $('.flot-tooltip').hide();
            }
        });
        
        $('<div class="flot-tooltip"></div>').appendTo('body');
    }
});

'use strict';

$(document).ready(function () {
    // Function for Sparkline Line Chart
    function sparklineLine(id, width, height, lineColor, fillColor, lineWidth, maxSpotColor, minSpotColor, spotColor, spotRadius, hSpotColor, hLineColor) {
        $('.'+id).sparkline('html', {
            type: 'line',
            width: width,
            height: height,
            lineColor: lineColor,
            fillColor: fillColor,
            lineWidth: lineWidth,
            maxSpotColor: maxSpotColor,
            minSpotColor: minSpotColor,
            spotColor: spotColor,
            spotRadius: spotRadius,
            highlightSpotColor: hSpotColor,
            highlightLineColor: hLineColor
        });
    }

    // Function for Sparkline Bar Chart
    function sparklineBar(id, height, barWidth, barColor, barSpacing) {
        $('.'+id).sparkline('html', {
            type: 'bar',
            height: height,
            barWidth: barWidth,
            barColor: barColor,
            barSpacing: barSpacing
        })
    }

    //Sample Sparkline Line Chart
    if ($('.chart-sparkline-line')[0]) {
        sparklineLine(
            'chart-sparkline-line',
            '100%',
            50,
            'rgba(255, 255, 255, 0.2)',
            'rgba(0,0,0,0)', 1.5,
            '#b4bfc3',
            '#b4bfc3',
            '#b4bfc3',
            4,
            '#b4bfc3',
            '#b4bfc3'
        );
    }

    //Sample Sparkline Bar Chart
    if ($('.chart-sparkline-bar')[0]) {
        sparklineBar('chart-sparkline-bar', 40, 3, '#b4bfc3', 2);
    }

    //Sample Sparkline Tristate Chart
    if ($('.chart-sparkline-tristate')[0]) {
        $('.chart-sparkline-tristate').sparkline('html', {
            type: 'tristate',
            height: 40,
            posBarColor: '#b4bfc3',
            zeroBarColor: '#b4bfc3',
            negBarColor: 'rgba(255,255,255,0.08)',
            barWidth: 3,
            barSpacing: 2
        });
    }

    //Sample Sparkline Discrete Chart
    if ($('.chart-sparkline-discrete')[0]) {
        $('.chart-sparkline-discrete').sparkline('html', {
            type: 'discrete',
            height: 40,
            lineColor: '#b4bfc3',
            thresholdColor: 'rgba(255,255,255,0.1)',
            thresholdValue: 4
        });
    }

    //Sample Sparkline Bullet Chart
    if ($('.chart-sparkline-bullet')[0]) {
        $('.chart-sparkline-bullet').sparkline('html', {
            type: 'bullet',
            targetColor: '#ef5350',
            performanceColor: '#edeff0',
            rangeColors: ['rgba(255,255,255,0.08)', 'rgba(255,255,255,0.05)', 'rgba(255,255,255,0.02)'],
            width: '100%',
            height: 50
        });
    }

    //Sample Sparkline Pie Chart
    if ($('.chart-sparkline-pie')[0]) {
        $('.chart-sparkline-pie').sparkline('html', {
            type: 'pie',
            height: 50,
            sliceColors: ['#b4bfc3', '#edeff0', 'rgba(177, 188, 192, 0.47)', 'rgba(177, 188, 192, 0.1)']
        });
    }
});