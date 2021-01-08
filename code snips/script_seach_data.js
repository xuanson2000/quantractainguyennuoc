//
// Script search object on a spatial table
//

// Transform if SRID is not 'EPSG:3857'
// ---
// EPSG:3857 is WGS 84 use for web MAP (flat surface) ~ Is Projected Coordinate System 
// EPSG:4326 is WGS 84 use for web GLOBE (curved surface) ~ Is Geographic Coordinate System
// ---

// 'selectSource' ~ It was be defined in 'mapcontrol.js'
// 'selectSource' ~ It was a source of vector layer

function ShowMoreInfomations(coordinate, content) {
}

function HidePopupOverlay() {
    var element = popupSearch.getElement();
    $(element).popover('destroy');
}

function ShowPopup(coordinate, content, information) {
    //info_popup.show(coordinate, content);
    //return;
    // Show overlay    
    var element = popupSearch.getElement();
    $(element).popover('destroy');
    popupSearch.setPosition(coordinate);
    //$(element).position=coordinate;
    element = popupSearch.getElement();

    $(element).popover({
        'placement': 'top',
        'animation': false,
        'html': true,
        'content': '<p>' + content + '</p>'
            + '<p>' + information + '</p>'
            //+ '<p><a href="#">Xem chi tiết</a></p>'
            //+ '<code></code>'
    });    
    $(element).popover('show');
   
    setTimeout(function () {        
        $(element).popover('show'); // không thực hiện cùng destroy nhanh quá
    }, 150)
}
function ShowPopupEx(coordinate, content, information) {
    //content.innerHTML = '<p>' + information+ '</p><code>' + content +
    //       '</code>';
    popupinfor.hide();

    popupinfor.show(coordinate, content);
    popupinfor.setPosition(coordinate);
}
function SelectSearchGeoData(layer, id) {
    $.ajax({
        url: "../api/querygeometry?layer=" + layer + "&id=" + id,
        type: 'GET',       
        dataType: 'json',
        success: function (json) {

            var geoWKT = json.WKT;
            var srid = json.SRID;
            var label = json.LABEL;
            var information = json.INFO;

            // Tao moi geometry tinh
            var format = new ol.format.WKT();
            var feature = format.readFeature(geoWKT);            
            //var geom = feature.getGeometry().transform('EPSG:' + srid, 'EPSG:3857'); // Transform to 'EPSG:3857' SRID
            
            selectSource.clear();
            var featureX = new ol.Feature({
                geometry: geom,
                //name: label
            })            
            selectSource.addFeature(featureX);

            // Popup
            var coordinate = geom.getCoordinates()[0];
            //var content = label;            
            //ShowPopup(coordinate, content, information);            
            content.innerHTML = '<code>' + label + '</code>';
            overlaytest.setPosition(coordinate);
            Selected_ZoomTo();
        }
    });
}

function SearchData(layer, value, geoWKT, srid, page) {

    HidePopupOverlay();

    var numberPerPage = 10;
    if (page == null || page < 1)
        page = 1; // 10 results per page

    var divResult = document.getElementById("divResult");
    divResult.style.display = 'block';

    var txtThongBao = document.getElementById("divThongBao");

    // Clear old search value
    var divResultDetail = document.getElementById("divResultsDetail");
    divResultDetail.innerHTML = '';

    // Clear old pager value
    var divPager = divResult.getElementsByClassName('pager');
    if (divPager.length > 0) {
        for (var d = 0; d < divPager.length; d++) {
            divResult.removeChild(divPager[d]);
        }
    }
    if ((layer == '-1') || (layer == 'undefined') || (layer == null)) {
        layer = 'DiaDanh';
    }
    if (layer != '-1') {
        $.ajax({
            url: "../api/querylayer",
            type: 'POST',
            data: {
                'layer': layer,
                'value': value,
                'wkt': geoWKT,
                'srid': srid,
                'page': page,
            },
            dataType: 'json',
            success: function (jsonSearch) {

                if ((jsonSearch == null || jsonSearch.Results.length == 0) && page == 1) {
                    if (value != null) {
                        txtThongBao.style.display = 'inherit';
                        txtThongBao.innerHTML = '<li class="list-group-item"> Không tìm thấy!</li>';
                    }
                    else {
                        txtThongBao.style.display = 'none';
                    }
                } else {
                    // Hide - Show
                    txtThongBao.style.display = 'none';

                    // Kết quả
                    for (var i = 0; i < jsonSearch.Results.length; i++) {
                        var dataRow = jsonSearch.Results[i]; // Get data
                        divResultDetail.innerHTML
                            += '<a class="list-group-item" href="#" onclick="SelectSearchGeoData(\''
                            + layer + '\', \'' + dataRow.Id + '\')" >'
                            + '<div class="list-group-item-heading"><b>' + dataRow.Ten + '</b></div>'
                            + '<div class="list-group-item-text">' + dataRow.Information + '</div>'
                            + '</a>';
                    }

                    // Phân trang kiểu 1
                    //var txtPrev = '<a class="btn btn-sm" href="#" onclick="SearchData(\'' + layer + '\',\'' + value + '\',\'' + geoWKT + '\',' + srid + ',' + (page - 1) + ')" >' + 'Prev' + '</a>';
                    //var txtNext = '<a class="btn btn-sm" href="#" onclick="SearchData(\'' + layer + '\',\'' + value + '\',\'' + geoWKT + '\',' + srid + ',' + (page + 1) + ')" >' + 'Next' + '</a>';
                    //if (page == 1) { // only next
                    //    var txtPrev = '<b class="btn btn-sm" href="#">First page</b>';
                    //}
                    //if (jsonSearch.Results.length < numberPerPage) { // only back                        
                    //    var txtNext = '<b class="btn btn-sm" href="#" >End page</b>';
                    //}
                    //divResult.innerHTML += '<div class="pager text-center">' + txtPrev + '&nbsp[' + page + ']&nbsp' + txtNext + '</div>';


                    // Phân trang kiểu 2
                    var txtFirst = '<a class="btn btn-sm" href="#" onclick="SearchData(\'' + layer + '\',\'' + value + '\',\'' + geoWKT + '\',' + srid + ',' + (1) + ')" >' + '« Đầu' + '</a>';
                    var txtEnd = '<a class="btn btn-sm" href="#" onclick="SearchData(\'' + layer + '\',\'' + value + '\',\'' + geoWKT + '\',' + srid + ',' + (10) + ')" >' + 'Cuối »' + '</a>';
                    var pagerString = '<div class="pager text-center">';
                    pagerString += txtFirst;
                    var pageCount = jsonSearch.PageCount;

                    var showPages = 5; // Đặt là số lẻ nhé
                    var maxPages = 10;
                    var startPage = page - ((showPages - 1) / 2);
                    if (startPage < 1)
                        startPage = 1;
                    if (startPage > maxPages - showPages)
                        startPage = maxPages - showPages;

                    for (var i = startPage; i <= startPage + showPages; i++) {
                        if (i == page) {
                            pagerString += '<a class="btn btn-sm" href="#" onclick="SearchData(\'' + layer + '\',\'' + value + '\',\'' + geoWKT + '\',' + srid + ',' + (i) + ')" ><b>' + i.toString() + '</b></a>';
                        }
                        else {
                            pagerString += '<a class="btn btn-sm" href="#" onclick="SearchData(\'' + layer + '\',\'' + value + '\',\'' + geoWKT + '\',' + srid + ',' + (i) + ')" >' + i.toString() + '</a>';
                        }
                    }
                    pagerString += txtEnd;
                    pagerString += '</div>';
                    divResult.innerHTML += pagerString;
                }
            }
        });
    }
    else {
        txtThongBao.style.display = 'inherit';
        txtThongBao.innerHTML = '<li class="list-group-item">Chưa chọn loại dữ liệu tìm kiếm!</li>';
    }
}
function abc2(layer, value, geoWKT, srid, page) {

    HidePopupOverlay();

    var numberPerPage = 5;
    if (page == null || page < 1)
        page = 1; // 10 results per page

    var divResult = document.getElementById("divResult");
    divResult.style.display = 'block';

    var txtThongBao = document.getElementById("divThongBao");

    // Clear old search value
    var divResultDetail = document.getElementById("divResultsDetail");
    divResultDetail.innerHTML = '';

    // Clear old pager value
    var divPager = divResult.getElementsByClassName('pager');
    if (divPager.length > 0) {
        for (var d = 0; d < divPager.length; d++) {
            divResult.removeChild(divPager[d]);
        }
    }
    if (layer == '-1') {
        layer = 'DiaDanh';
    }
    if (layer != '-1') {
        $.ajax({
            url: "../api/querylayer",
            type: 'POST',
            data: {
                'layer': layer,
                'value': value,
                'wkt': geoWKT,
                'srid': srid,
                'page': page,
            },
            dataType: 'json',
            success: function (jsonSearch) {

                if ((jsonSearch == null || jsonSearch.length == 0) && page == 1) {
                    if (value != null) {
                        txtThongBao.style.display = 'inherit';
                        txtThongBao.innerHTML = '<li class="list-group-item"> Không có kết quả nào phù hợp!</li>';
                    }
                    else {
                        txtThongBao.style.display = 'none';
                    }
                } else {
                    // Hide - Show
                    txtThongBao.style.display = 'none';

                    // Kết quả
                    for (var i = 0; i < jsonSearch.length; i++) {
                        var dataRow = jsonSearch[i]; // Get data
                        divResultDetail.innerHTML
                            += '<a class="list-group-item" href="#" onclick="SelectSearchGeoData(\''
                            + layer + '\', \'' + dataRow.Id + '\')" >'
                            + '<div class="list-group-item-heading"><b>' + dataRow.Ten + '</b></div>'
                            + '<div class="list-group-item-text">' + dataRow.Information + '</div>'
                            + '</a>';
                    }

                    // Phân trang
                    var txtPrev = '<a class="btn btn-sm" href="#" onclick="SearchData(\'' + layer + '\',\'' + value + '\',\'' + geoWKT + '\',' + srid + ',' + (page - 1) + ')" >' + 'Trước' + '</a>';
                    var txtNext = '<a class="btn btn-sm" href="#" onclick="SearchData(\'' + layer + '\',\'' + value + '\',\'' + geoWKT + '\',' + srid + ',' + (page + 1) + ')" >' + 'Tiếp' + '</a>';
                    if (page == 1) { // only next
                        var txtPrev = '<b class="btn btn-sm" href="#">Trang đầu</b>';
                    }
                    if (jsonSearch.length < numberPerPage) { // only back                        
                        var txtNext = '<b class="btn btn-sm" href="#" >Trang cuối</b>';
                    }
                    divResult.innerHTML += '<div class="pager text-center">' + txtPrev + '&nbsp[' + page + ']&nbsp' + txtNext + '</div>';
                }

            }
        });
    }
    else {
        txtThongBao.style.display = 'inherit';
        txtThongBao.innerHTML = '<li class="list-group-item">Chưa chọn loại dữ liệu tìm kiếm!</li>';
    }
}

function SelectTinh(tinh_id) {
    $.ajax({
        url: "../api/geometrytinh/" + tinh_id,
        type: 'GET',
        dataType: 'json',
        success: function (json) {

            var geoWKT = json.WKT;
            var srid = json.SRID;
            var label = json.LABEL;

            // Tao moi geometry tinh
            var format = new ol.format.WKT();
            var feature = format.readFeature(geoWKT);
            feature.getGeometry().transform('EPSG:' + srid, 'EPSG:3857'); // Transform to 'EPSG:3857' SRID

            // 'selectSource' ~ Defined in 'mapcontrol.js' ~ It is a source of vector layer
            selectSource.clear();

            var feature = new ol.Feature({
                geometry: feature.getGeometry(),
                //labelPoint: GetCenterOfExtent(feature.getGeometry().getExtent()),
                name: label
            })

            //feature.set('description', field_title);
            //feature.setStyle(styleFunction);

            //selectSource.addFeature(feature);
            
            //var valSearch = $('#txtSearch').val();
            //if (valSearch.trim() != "") {
            //    var layer = $("#cbxSearch_LoaiDuLieu").val();
            //    SearchData(layer, valSearch, geoWKT, srid, null);                
            //}
            //else {
            //    // Tìm theo địa phận rồi!
            //}

            Selected_ZoomTo(feature.getGeometry().getExtent());
        }
    });
}

function SelectHuyen(huyen_id) {
    $.ajax({
        url: "../api/geometryhuyen/" + huyen_id,
        type: 'GET',
        dataType: 'json',
        success: function (json) {

            var geoWKT = json.WKT;
            var srid = json.SRID;
            var label = json.LABEL;

            // Tao moi geometry tinh
            var format = new ol.format.WKT();
            var feature = format.readFeature(geoWKT);
            feature.getGeometry().transform('EPSG:' + srid, 'EPSG:3857'); // Transform to 'EPSG:3857' SRID

            // 'selectSource' ~ It was be defined in 'mapcontrol.js' ~ It was a source of vector layer
            selectSource.clear();

            var feature = new ol.Feature({
                geometry: feature.getGeometry(),
                name: label
            })
            //selectSource.addFeature(feature);

            //var valSearch = $('#txtSearch').val();
            //if (valSearch.trim() != "") {
            //    var layer = $("#cbxSearch_LoaiDuLieu").val();
            //    SearchData(layer, valSearch, geoWKT, srid, null);
            //}
            //else {
            //    // Tìm theo địa phận rồi!
            //}

            Selected_ZoomTo(feature.getGeometry().getExtent());
        }
    });
}

function SelectXa(xa_id) {
    $.ajax({
        url: "../api/geometryxa/" + xa_id,
        type: 'GET',
        dataType: 'json',
        success: function (json) {

            var geoWKT = json.WKT;
            var srid = json.SRID;
            var label = json.LABEL;

            // Tao moi geometry tinh
            var format = new ol.format.WKT();
            var feature = format.readFeature(geoWKT);
            feature.getGeometry().transform('EPSG:' + srid, 'EPSG:3857'); // Transform to 'EPSG:3857' SRID

            // 'selectSource' ~ It was be defined in 'mapcontrol.js' ~ It was a source of vector layer
            selectSource.clear();

            var feature = new ol.Feature({
                geometry: feature.getGeometry(),
                name: label
            })
            //selectSource.addFeature(feature);

            //var valSearch = $('#txtSearch').val();
            //if (valSearch.trim() != "") {
            //    var layer = $("#cbxSearch_LoaiDuLieu").val();
            //    SearchData(layer, valSearch, geoWKT, srid, null);
            //}
            //else {
            //    // Tìm theo địa phận rồi!
            //}

            Selected_ZoomTo(feature.getGeometry().getExtent());
        }
    });
}
function spatialsearch(coordinate) {
    // Lấy các layer visible
    var qrylayers = '';
    map.getLayers().forEach(function (layer) {       
        if (layer.getVisible() == true)
            qrylayers += layer.get('name') + ",";
    });
    $.ajax({
        url: "../api/SpatialQuery/?x=" + coordinate[0] + "&y=" + coordinate[1] + "&r=" + map.getView().getResolution() + "&layers=" + qrylayers,
        type: 'GET',
        dataType: 'json',
        success: function (json) {            
            var geoWKT = json.WKT;
            var srid = json.SRID;
            var label = json.LABEL;         
            // Tao moi geometry tinh
            var format = new ol.format.WKT();
            var feature = format.readFeature(geoWKT);
            //feature.getGeometry().transform('EPSG:' + srid, 'EPSG:3857'); // Transform to 'EPSG:3857' SRID

            // 'selectSource' ~ It was be defined in 'mapcontrol.js' ~ It was a source of vector layer
            selectSource.clear();

            var feature = new ol.Feature({
                geometry: feature.getGeometry(),
                name: ""
            })
            selectSource.addFeature(feature);
            var ihtml = '<code>' + label + '</code>';
            content.innerHTML = '<code>' + label + '</code>';            
            overlaytest.setPosition(coordinate);                       
            //Selected_ZoomTo();            
        }
    });
}
function spatialsearch2(coordinate) {
    $.ajax({
        url: "../api/SpatialQuery/?x=" + coordinate[0] + "&y=" + coordinate[1],
        type: 'GET',
        dataType: 'json',
        success: function (json) {
            var arr = JSON.parse(json);
            
            var i;
            var out = "<table>";
            if (arr.length > 0) {
                for (i = 0; i < arr.length; i++) {
                    out += "<tr><td>" +
                    arr[i].name_vn +
                    "</td><td>" +
                    arr[i].district +
                    "</td><td>" +
                    arr[i].province +
                    "</td></tr>";
                }
                out += "</table>"
                //document.getElementById("id01").innerHTML = out;
                var element = popup.getElement();
                $(element).popover('destroy');
                popup.setPosition(coordinate);
                $(element).popover({
                    'placement': 'top',
                    'animation': false,
                    'html': true,
                    'content': '<p></p><code>' + out + '</code>'
                });
                //$(element).popover('show');
                ShowPopup(coordinate, out, '');
            }
        }
    });
}
function SelectedClear()
{
    // 'selectSource' ~ It was be defined in 'mapcontrol.js' ~ It was a source of vector layer
    selectSource.clear();

    // Clear result
    var divResult = document.getElementById("divResult");
    var txtThongBao = document.getElementById("divThongBao");
    txtThongBao.style.display = 'none';
    divResult.style.display = 'none';
}

function Selected_ZoomTo()
{
    // 'selectSource' ~ It was be defined in 'mapcontrol.js' ~ It was a source of vector layer
    if (selectSource != null)
    {
        var ext = selectSource.getExtent();
        map.getView().setCenter(GetCenterOfExtent(ext));

        var length = Math.sqrt(Math.pow(ext[0] - ext[2], 2) + Math.pow(ext[1] - ext[3], 2));

        // Nếu chiều dài chéo của vùng ext nhỏ hơn 100 mét, thì set vùng zoom mặc định là 12
        // Bình thường thì kéo khít vào vùng dữ liệu đã có trên layer
        if (length < 100) {
            map.getView().setZoom(12);
        }
        else {
            map.getView().fit(ext, map.getSize());
        }
    }    
}
function Selected_ZoomTo(ext) {
    // 'selectSource' ~ It was be defined in 'mapcontrol.js' ~ It was a source of vector layer
    if (selectSource != null) {
        if (typeof ext == 'undefined')
            ext = selectSource.getExtent();
        map.getView().setCenter(GetCenterOfExtent(ext));

        var length = Math.sqrt(Math.pow(ext[0] - ext[2], 2) + Math.pow(ext[1] - ext[3], 2));

        // Nếu chiều dài chéo của vùng ext nhỏ hơn 100 mét, thì set vùng zoom mặc định là 12
        // Bình thường thì kéo khít vào vùng dữ liệu đã có trên layer
        if (length < 100) {
            map.getView().setZoom(12);
        }
        else {
            map.getView().fit(ext, map.getSize());
        }
    }
}
function GetCenterOfExtent(Extent) {
    var X = Extent[0] + (Extent[2] - Extent[0]) / 2;
    var Y = Extent[1] + (Extent[3] - Extent[1]) / 2;
    return [X, Y];
}

// Event handle
$(document).ready(function () {
    $('#btnSearchSB').click(function () {
        var valTinh = $('#cboTinh').val();
        var valHuyen = $('#cboHuyen').val();
        var valXa = $('#cboXa').val();

        SelectedClear();

        if (valXa != -1) {
            //SelectXa(valXa); // Xa
        }
        else {
            if (valHuyen != -1) {
                //SelectHuyen(valHuyen); // Huyen
            }
            else {
                if (valTinh != -1) {
                   // SelectTinh(valTinh); // Tinh
                }
                else {
                    // Khong co DVHC
                    var valSearch = $('#txtSearch').val();
                    if (valSearch != -1) {
                        //var layer = $("#cbxSearch_LoaiDuLieu").val();
                        var layer = $("#cbxSearch_LoaiDuLieu_TimKiem").val();
                        SearchData(layer, valSearch, null, null, null);
                        // Active tab result
                        //$("#tab1").removeClass("active");
                        //$("#tab4").addClass("active");
                        $('#myTab a[href="#tab4"]').tab('show')
                    }
                }
            }
        }
    });
});



