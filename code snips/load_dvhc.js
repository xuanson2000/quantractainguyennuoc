//
// Script load data to ComboBox: [Tinh] | [Huyen] | [Xa]
//

function LoadLoaiDuLieu() {
    $("#cbxSearch_LoaiDuLieu").empty(); // Clear before fill
    $("#cbxSearch_LoaiDuLieu_TimKiem").empty();
    var strItem = [
        "<option value='-1'>-Chọn loại dữ liệu-</option>",
        //"<option value='DiaDanh'>Tất cả</option>",
        "<option value='DiaDanh'>Dữ liệu địa danh</option>"
    ];
    $("#cbxSearch_LoaiDuLieu").append(strItem);
    $("#cbxSearch_LoaiDuLieu_TimKiem").append(strItem);
}

function LoadTinh() {
    $("#cboTinh").empty();
    $.ajax({
        url: "../api/dvhctinh",
        type: 'GET',
        dataType: 'json',
        success: function (json) {
            $.each(json, function (i, value) {
                $('<option></option>', { text: value.NameVIE })
                    .attr('value', value.ID)
                    .appendTo('#cboTinh');
            });
        }
    });
    var strItem = "<option value='-1'>--- Chọn tỉnh (thành phố) ---</option>";
    $("#cboTinh").append(strItem);
}

function LoadHuyen(tinh_id) {
    // Zoom to province
    SelectTinh(tinh_id);
    // Load distrcits
    $("#cboHuyen").empty();
    $.ajax({
        url: "../api/dvhchuyen/" + tinh_id,
        type: 'GET',
        dataType: 'json',
        success: function (json) {
            $.each(json, function (i, value) {
                $('<option></option>', { text: value.NameVIE })
                    .attr('value', value.ID)
                    .appendTo('#cboHuyen');
            });
        }
    });
    var strItem = "<option value='-1'>--- Chọn quận (huyện) ---</option>";
    $("#cboHuyen").append(strItem);
}

function LoadXa(huyen_id) {
    // Zoom to distrcit
    SelectHuyen(huyen_id);
    // Load communes
    $("#cboXa").empty();
    $.ajax({
        url: "../api/dvhcxa/" + huyen_id,
        type: 'GET',
        dataType: 'json',
        success: function (json) {
            $.each(json, function (i, value) {
                $('<option></option>', { text: value.NameVIE })
                    .attr('value', value.ID)
                    .appendTo('#cboXa');
            });
        }
    });
    var strItem = "<option value='-1'>--- Chọn phường (xã) ---</option>";
    $("#cboXa").append(strItem);
}

// Event handle
$(document).ready(function () {
    LoadLoaiDuLieu();
    LoadTinh();    
    $('#cboTinh').change(function () {
        LoadHuyen($('#cboTinh').val());
        LoadXa($('#cboHuyen').val());
    });
    $('#cboHuyen').change(function () {
        LoadXa($('#cboHuyen').val());
    });
    $('#cboXa').change(function () {
        SelectXa($('#cboXa').val());
    });   
});
