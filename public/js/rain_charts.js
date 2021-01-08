function preData(jsonData, para) {
    // empty array for storing the chart data
    var data = [];
    if (para == 'rf') {
        for (var ir in jsonData) {
            data.push([Date.parse(jsonData[ir].timestamp), parseFloat(jsonData[ir].giatri)]);
        }
        return data;
    }
}
function preTableData(jsonData, para) {
    var data = [];
    if (para == 'rf') {
        for (var ir in jsonData) {
            data.push([jsonData[ir].timestamp, parseFloat(jsonData[ir].giatri)]);
        }
        return data;
    }
}
function changeRfYearData(sohieu) {
    $.ajax({
        url: rfAjaxRainfallUri,
        data: {'from_to': '0', 'sohieu': sohieu, 'data_year': $("#rfYearSelector").val()},
        dataType: 'json',
        success: function (result) {
            var rfseries = preData(result, 'rf');
            $('#rainfall-chart').highcharts({
                time: {
                    timezoneOffset: -7 * 60
                },
                series: [{
                    name: 'Lượng mưa',
                    data: rfseries
                }],
                chart: {
                    type: 'column',
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
                        text: 'Lượng mưa',
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
            if ( $.fn.dataTable.isDataTable( '#rf-db-table' ) ) {
                table = $('#rf-db-table').DataTable();
                table.destroy();
            }
            var wlseriesTable = preTableData(result, 'rf');
            table = $('#rf-db-table').DataTable({
                data: wlseriesTable,
                columns: [
                    { title: "Thời gian" },
                    { title: "Lượng mưa" }
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
                    "sSearch":       "Tìm kiếm:",
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
function dorfData(sohieu){

    if ($("#rf-from-to-year").prop("checked")) {
        rfFromTo(sohieu);
    }
    else {
        changeRfYearData(sohieu);
    }
}
function rfFromTo(sohieu) {
    $.ajax({
        url: rfAjaxRainfallUri,
        data: {
            'from_to': '1',
            'sohieu': sohieu,
            'data_year_from': $("#rfFromYearSelector").val(),
            'data_year_to': $("#rfToYearSelector").val()
        },
        dataType: 'json',
        success: function (result) {
            var rfseries = preData(result, 'rf');
            $('#rainfall-chart').highcharts({
                time: {
                    timezoneOffset: -7 * 60
                },
                series: [{
                    name: 'Lượng mưa',
                    data: rfseries
                }],
                chart: {
                    type: 'column',
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
                        text: 'Lượng mưa',
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
            if ( $.fn.dataTable.isDataTable( '#rf-db-table' ) ) {
                table = $('#rf-db-table').DataTable();
                table.destroy();
            }
            var wlseriesTable = preTableData(result, 'rf');
            table = $('#rf-db-table').DataTable({
                data: wlseriesTable,
                columns: [
                    { title: "Thời gian" },
                    { title: "Lượng mưa" }
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
                    "sSearch":       "Tìm kiếm:",
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
