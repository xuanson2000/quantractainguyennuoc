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
function preTableData(jsonData, para) {
    var data = [];
    if (para == 'wl') {
        for (var iw in jsonData) {
            data.push([jsonData[iw].timestamp, parseFloat(jsonData[iw].water_level)]);
        }
        return data;
    }
    if (para == 'wt') {
        for (var iw in jsonData) {
            data.push([jsonData[iw].timestamp, parseFloat(jsonData[iw].temperature)]);
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
                time: {
                    timezoneOffset: -7 * 60
                },
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
            if ( $.fn.dataTable.isDataTable( '#gwl-db-table' ) ) {
                table = $('#gwl-db-table').DataTable();
                table.destroy();
            }
            var wlseriesTable = preTableData(result, 'wl');
            table = $('#gwl-db-table').DataTable({
                data: wlseriesTable,
                columns: [
                    { title: "Thời gian" },
                    { title: "Mực nước" }
                ],
                buttons: [
                    'excel',
                    'csv'
                ],
                language: {
                    "sProcessing":   "Đang xử lý...",
                    "sLengthMenu":   "_MENU_ mục",
                    "sZeroRecords":  "Không tìm thấy dòng nào phù hợp",
                    "sInfo":         "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
                    "sInfoEmpty":    "Đang xem 0 đến 0 trong tổng số 0 mục",
                    "sInfoFiltered": "(được lọc từ _MAX_ mục)",
                    "sInfoPostFix":  "",
                    "sSearch":       "Tìm:",
                    "sUrl":          "",
                    "oPaginate": {
                        "sFirst":    "Đầu",
                        "sPrevious": "Trước",
                        "sNext":     "Tiếp",
                        "sLast":     "Cuối"
                    }
                },
                autoWidth:false,
                drawCallback: function () {
                    $('.dataTables_paginate > .pagination a').addClass('page-link');
                }
            });
            table.buttons().container().appendTo($('#dt-toolbox'));
            $( table.table().container() ).removeClass( 'form-inline' );
        },
        error: function (xhr, status, error) {
            console.log(error);
        }
    });
}
function doWlData(well_code){

    if ($("#wl-from-to-year").prop("checked")) {
        wlFromTo(well_code);
    }
    else {
        changeWlYearData(well_code);
    }
}
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
                time: {
                    timezoneOffset: -7 * 60
                },
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
            if ( $.fn.dataTable.isDataTable( '#gwl-db-table' ) ) {
                table = $('#gwl-db-table').DataTable();
                table.destroy();
            }
            var wlseriesTable = preTableData(result, 'wl');
            table = $('#gwl-db-table').DataTable({
                data: wlseriesTable,
                columns: [
                    { title: "Thời gian" },
                    { title: "Mực nước" }
                ],
                buttons: [
                    'excel',
                    'csv'
                ],
                autoWidth:false,
                language: {
                    "sProcessing":   "Đang xử lý...",
                    "sLengthMenu":   "_MENU_ mục",
                    "sZeroRecords":  "Không tìm thấy dòng nào phù hợp",
                    "sInfo":         "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
                    "sInfoEmpty":    "Đang xem 0 đến 0 trong tổng số 0 mục",
                    "sInfoFiltered": "(được lọc từ _MAX_ mục)",
                    "sInfoPostFix":  "",
                    "sSearch":       "Tìm:",
                    "sUrl":          "",
                    "oPaginate": {
                        "sFirst":    "Đầu",
                        "sPrevious": "Trước",
                        "sNext":     "Tiếp",
                        "sLast":     "Cuối"
                    }
                },
                drawCallback: function () {
                    $('.dataTables_paginate > .pagination a').addClass('page-link');
                }
            });
            table.buttons().container().appendTo($('#dt-toolbox'));
            $( table.table().container() ).removeClass( 'form-inline' );
        },
        error: function (xhr, status, error) {
            console.log(error);
        }
    });
}

function changeWtYearData(well_code) {
    $.ajax({
        url: wellAjaxWaterTemperatureUri,
        data: {'from_to': '0', 'well_code': well_code, 'data_year': $("#wellWtYearSelector").val()},
        dataType: 'json',
        success: function (result) {
            var wtseries = preData(result, 'wt');
            $('#water-temperature-chart').highcharts({
                time: {
                    timezoneOffset: -7 * 60
                },
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
            if ( $.fn.dataTable.isDataTable( '#gwt-db-table' ) ) {
                table = $('#gwt-db-table').DataTable();
                table.destroy();
            }
            var wtseriesTable = preTableData(result, 'wt');
            table = $('#gwt-db-table').DataTable({
                data: wtseriesTable,
                columns: [
                    { title: "Thời gian" },
                    { title: "Nhiệt độ nước" }
                ],
                buttons: [
                    'excel',
                    'csv'
                ],
                language: {
                    "sProcessing":   "Đang xử lý...",
                    "sLengthMenu":   "_MENU_ mục",
                    "sZeroRecords":  "Không tìm thấy dòng nào phù hợp",
                    "sInfo":         "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
                    "sInfoEmpty":    "Đang xem 0 đến 0 trong tổng số 0 mục",
                    "sInfoFiltered": "(được lọc từ _MAX_ mục)",
                    "sInfoPostFix":  "",
                    "sSearch":       "Tìm:",
                    "sUrl":          "",
                    "oPaginate": {
                        "sFirst":    "Đầu",
                        "sPrevious": "Trước",
                        "sNext":     "Tiếp",
                        "sLast":     "Cuối"
                    }
                },
                autoWidth:false,
                drawCallback: function () {
                    $('.dataTables_paginate > .pagination a').addClass('page-link');
                }
            });
            table.buttons().container().appendTo($('#dt-toolbox'));
            $( table.table().container() ).removeClass( 'form-inline' );
        },
        error: function (xhr, status, error) {
            console.log(error);
        }
    });
}

function doWtData(well_code){

    if ($("#wt-from-to-year").prop("checked")) {
        wtFromTo(well_code);
    }
    else {
        changeWtYearData(well_code);
    }
}
function wtFromTo(well_code) {
    $.ajax({
        url: wellAjaxWaterTemperatureUri,
        data: {
            'from_to': '1',
            'well_code': well_code,
            'data_year_from': $("#wellWtFromYearSelector").val(),
            'data_year_to': $("#wellWtToYearSelector").val()
        },
        dataType: 'json',
        success: function (result) {
            var wtseries = preData(result, 'wt');
            $('#water-temperature-chart').highcharts({
                time: {
                    timezoneOffset: -7 * 60
                },
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
                        text: 'Nhiệt độ nước',
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
            if ( $.fn.dataTable.isDataTable( '#gwt-db-table' ) ) {
                table = $('#gwt-db-table').DataTable();
                table.destroy();
            }
            var wlseriesTable = preTableData(result, 'wt');
            table = $('#gwt-db-table').DataTable({
                data: wlseriesTable,
                columns: [
                    { title: "Thời gian" },
                    { title: "Nhiệt độ nước" }
                ],
                buttons: [
                    'excel',
                    'csv'
                ],
                autoWidth:false,
                language: {
                    "sProcessing":   "Đang xử lý...",
                    "sLengthMenu":   "_MENU_ mục",
                    "sZeroRecords":  "Không tìm thấy dòng nào phù hợp",
                    "sInfo":         "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
                    "sInfoEmpty":    "Đang xem 0 đến 0 trong tổng số 0 mục",
                    "sInfoFiltered": "(được lọc từ _MAX_ mục)",
                    "sInfoPostFix":  "",
                    "sSearch":       "Tìm:",
                    "sUrl":          "",
                    "oPaginate": {
                        "sFirst":    "Đầu",
                        "sPrevious": "Trước",
                        "sNext":     "Tiếp",
                        "sLast":     "Cuối"
                    }
                },
                drawCallback: function () {
                    $('.dataTables_paginate > .pagination a').addClass('page-link');
                }
            });
            table.buttons().container().appendTo($('#dt-toolbox'));
            $( table.table().container() ).removeClass( 'form-inline' );
        },
        error: function (xhr, status, error) {
            console.log(error);
        }
    });
}
