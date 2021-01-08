function preData(jsonData, para) {
    // empty array for storing the chart data
    var data = [];
    if (para == 'wl') {
        for (var iw in jsonData) {
            data.push([Date.parse(jsonData[iw].timestamp), parseFloat(jsonData[iw].water_level)]);
        }
        return data;
    }
    if (para == 'wf') {
        for (var iw in jsonData) {
            data.push([Date.parse(jsonData[iw].timestamp), parseFloat(jsonData[iw].q_value)]);
        }
        return data;
    }

}

function changeWlYearData(matram) {
    $.ajax({
        url: swAjaxWaterLevelUri,
        data: {'from_to': '0', 'matram': matram, 'data_year': $("#swWlYearSelector").val()},
        dataType: 'json',
        success: function (result) {
            var wlseries = preData(result, 'wl');
            $('#water-level-chart').highcharts({
                series: [{
                    name: 'Mực nước',
                    data: wlseries
                }],
                chart: {
                    type: 'spline',
                    zoomType: 'x'
                },
                title: {
                    text: ''
                },
                credits: {
                    enabled: false
                },
                xAxis: {
                    type: 'datetime',
                    labels: {
                        style: {
                            fontSize: '12px'
                        }
                    },
                    dateTimeLabelFormats: {
                        second: '%Y-%m-%d<br/>%H:%M:%S',
                        minute: '%Y-%m-%d<br/>%H:%M',
                        hour: '%Y-%m-%d<br/>%H:%M',
                        day: '%Y<br/>%m-%d',
                        week: '%Y<br/>%m-%d',
                        month: '%Y-%m',
                        year: '%Y'
                    }
                },
                yAxis: {
                    labels: {
                        formatter: function () {
                            return Highcharts.numberFormat(this.value, 2);
                        },
                        style: {
                            fontSize: '12px'
                        }
                    },
                    title: {
                        text: 'Mực nước',
                        style: {
                            fontWeight: 'bold',
                            fontSize: '15px'
                        }
                    }
                },

                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'top',
                    x: 0,
                    y: 48
                },

            });
        },
        error: function (xhr, status, error) {
            console.log(error);
        }
    });
};

function wlFromTo(matram) {
    $.ajax({
        url: swAjaxWaterLevelUri,
        data: {
            'from_to': '1',
            'matram': matram,
            'data_year_from': $("#swWlFromYearSelector").val(),
            'data_year_to': $("#swWlToYearSelector").val()
        },
        dataType: 'json',
        success: function (result) {
            var wlseries = preData(result, 'wl');
            $('#water-level-chart').highcharts({
                series: [{
                    name: 'Mực nước',
                    data: wlseries
                }],
                chart: {
                    type: 'spline',
                    zoomType: 'x'
                },
                title: {
                    text: ''
                },
                credits: {
                    enabled: false
                },
                xAxis: {
                    type: 'datetime',
                    labels: {
                        style: {
                            fontSize: '12px'
                        }
                    },
                    dateTimeLabelFormats: {
                        second: '%Y-%m-%d<br/>%H:%M:%S',
                        minute: '%Y-%m-%d<br/>%H:%M',
                        hour: '%Y-%m-%d<br/>%H:%M',
                        day: '%Y<br/>%m-%d',
                        week: '%Y<br/>%m-%d',
                        month: '%Y-%m',
                        year: '%Y'
                    }
                },
                yAxis: {
                    labels: {
                        formatter: function () {
                            return Highcharts.numberFormat(this.value, 2);
                        },
                        style: {
                            fontSize: '12px'
                        }
                    },
                    title: {
                        text: 'Mực nước',
                        style: {
                            fontWeight: 'bold',
                            fontSize: '15px'
                        }
                    }
                },

                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'top',
                    x: 0,
                    y: 48
                },

            });
        },
        error: function (xhr, status, error) {
            console.log(error);
        }
    });
};

function changeWfYearData(matram) {
    $.ajax({
        url: swAjaxWaterFlowUri,
        data: {'matram': matram, 'data_year': $("#swWfYearSelector").val()},
        dataType: 'json',
        success: function (result) {
            var wfseries = preData(result, 'wf');
            $('#water-flow-chart').highcharts({
                series: [{
                    name: 'Lưu lượng',
                    data: wfseries
                }],
                chart: {
                    type: 'spline',
                    zoomType: 'x'
                },
                title: {
                    text: ''
                },
                credits: {
                    enabled: false
                },
                xAxis: {
                    type: 'datetime',
                    labels: {
                        style: {
                            fontSize: '12px'
                        }
                    },
                    dateTimeLabelFormats: {
                        second: '%Y-%m-%d<br/>%H:%M:%S',
                        minute: '%Y-%m-%d<br/>%H:%M',
                        hour: '%Y-%m-%d<br/>%H:%M',
                        day: '%Y<br/>%m-%d',
                        week: '%Y<br/>%m-%d',
                        month: '%Y-%m',
                        year: '%Y'
                    }
                },
                yAxis: {
                    labels: {
                        formatter: function () {
                            return Highcharts.numberFormat(this.value, 2);
                        },
                        style: {
                            fontSize: '12px'
                        }
                    },
                    title: {
                        text: 'Lưu lượng',
                        style: {
                            fontWeight: 'bold',
                            fontSize: '15px'
                        }
                    }
                },

                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'top',
                    x: 0,
                    y: 48
                },

            });
        },
        error: function (xhr, status, error) {
            console.log(error);
        }
    });
}
