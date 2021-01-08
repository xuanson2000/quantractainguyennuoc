function preData(jsonData, para) {
    // empty array for storing the chart data
    var data = [];
    if (para == 'wl') {
        for (var iw in jsonData) {
            data.push([Date.parse(jsonData[iw].timestamp), parseFloat(jsonData[iw].water_level)]);
        }
        return data;
    }
    if (para == 'wt') {
        for (var iw in jsonData) {
            data.push([Date.parse(jsonData[iw].timestamp), parseFloat(jsonData[iw].temperature)]);
        }
        return data;
    }

}

function changeWlYearData(well_code) {
    $.ajax({
        url: wellAjaxWaterLevelUri,
        data: {'from_to': '0', 'well_code': well_code, 'data_year': $("#wellWlYearSelector").val()},
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
                    zoomType: 'x',
                    height:600
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

function wlFromTo(well_code) {
    $.ajax({
        url: wellAjaxWaterLevelUri,
        data: {
            'from_to': '1',
            'well_code': well_code,
            'data_year_from': $("#wellWlFromYearSelector").val(),
            'data_year_to': $("#wellWlToYearSelector").val()
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
                    zoomType: 'x',
                    height:600
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

function changeWtYearData(well_code) {
    $.ajax({
        url: wellAjaxWaterTemperatureUri,
        data: {'well_code': well_code, 'data_year': $("#wellWtYearSelector").val()},
        dataType: 'json',
        success: function (result) {
            var wtseries = preData(result, 'wt');
            $('#water-temperature-chart').highcharts({
                series: [{
                    name: 'Nhiệt độ nước',
                    data: wtseries
                }],
                chart: {
                    type: 'spline',
                    zoomType: 'x',
                    height:600
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
                        text: 'Nhiệt độ',
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
