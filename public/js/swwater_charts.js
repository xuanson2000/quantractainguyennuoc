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
            data.push([Date.parse(jsonData[iw].time_measure_start), parseFloat(jsonData[iw].q_value)]);
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
    if (para == 'wf') {
        for (var iw in jsonData) {
            data.push([jsonData[iw].time_measure_start,jsonData[iw].time_measure_end, parseFloat(jsonData[iw].q_value)]);
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
function doWlData(matram){

    if ($("#wl-from-to-year").prop("checked")) {
        wlFromTo(matram);
    }
    else {
        changeWlYearData(matram);
    }
}
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

function changeWfYearData(matram) {
    $.ajax({
        url: swAjaxWaterFlowUri,
        data: {'from_to': '0', 'matram': matram, 'data_year': $("#swWfYearSelector").val()},
        dataType: 'json',
        success: function (result) {
            var wfseries = preData(result, 'wf');
            console.log(wfseries);
            $('#water-flow-chart').highcharts({
                time: {
                    timezoneOffset: -7 * 60
                },
                series: [{
                    name: 'Lưu lượng',
                    data: wfseries
                }],
                chart: {
                    type: 'spline',
                    zoomType: 'x',
                    height: 600
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
            if ( $.fn.dataTable.isDataTable( '#swf-db-table' ) ) {
                table = $('#swf-db-table').DataTable();
                table.destroy();
            }
            var wfseriesTable = preTableData(result, 'wf');
            table = $('#swf-db-table').DataTable({
                data: wfseriesTable,
                columns: [
                    { title: "Thời gian bắt đầu đo" },
                    { title: "Thời gian kết thúc đo" },
                    { title: "Lưu lượng" }
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
function doWfData(matram){

    if ($("#wf-from-to-year").prop("checked")) {
        wfFromTo(matram);
    }
    else {
        changeWfYearData(matram);
    }
}
function wfFromTo(matram) {
    $.ajax({
        url: swAjaxWaterLevelUri,
        data: {
            'from_to': '1',
            'matram': matram,
            'data_year_from': $("#swWfFromYearSelector").val(),
            'data_year_to': $("#swWfToYearSelector").val()
        },
        dataType: 'json',
        success: function (result) {
            var wfseries = preData(result, 'wf');
            $('#water-flow-chart').highcharts({
                time: {
                    timezoneOffset: -7 * 60
                },
                series: [{
                    name: 'Lưu lượng',
                    data: wfseries
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
            if ( $.fn.dataTable.isDataTable( '#swf-db-table' ) ) {
                table = $('#swf-db-table').DataTable();
                table.destroy();
            }
            var wfseriesTable = preTableData(result, 'wf');
            table = $('#swf-db-table').DataTable({
                data: wfseriesTable,
                columns: [
                    { title: "Thời gian bắt đầu đo" },
                    { title: "Thời gian kết thúc đo" },
                    { title: "Lưu lượng" }
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