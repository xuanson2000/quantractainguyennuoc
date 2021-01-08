//
// Script load all layers from map
//

function getLayers(mapid) {
    if (map == null) return;
    $.ajax({
        url: "../api/loadlayer/" + mapid,
        type: 'GET',
        dataType: 'json',
        success: function (json) {
            var gid = 0;
            makeTree(json);
            // Make tree layers
            $('#tree_td').jstree({
                'core': {
                    'data': json
                },
                "checkbox": {
                    "keep_selected_style": false
                },
                "plugins": ["checkbox", "search"]
            });
            $("#tree_td").bind("changed.jstree",
            function (e, data) {
                map.getLayers().forEach(function (layer) {
                    if (layer.get('name') == data.node.id) {
                        layer.setVisible(data.node.state.selected);
                    }
                });// end each
            }); //end bind
          
        }// end json
    });
}
    
function makeTree(data) {
    var gid = 0;
    for (var i = 0; i < data.length; i++) {
        if (data[i].layername != "") {
            var newLayer = new ol.layer.Tile({
                source: new ol.source.TileWMS({
                    ratio: 1,
                    //url: 'http://webgis.mapvn.vn:8097/getmap.ashx?key=b8b47f6c-9ea1-41bc-ba89-5bf527a0b0af',
                    url: data[i].diachi,
                    params: {
                        'FORMAT': format,
                        'VERSION': '1.1.1',
                        STYLES: '',
                        'TILED': true,
                        LAYERS: data[i].layername,
                    }
                }),
                name: data[i].layername,
                visible: data[i].visible
            })
            newLayer.set('mymapkey', data[i].layername);
            // Them lop du lieu vao ban do
            map.addLayer(newLayer);
        }
    }
}
function treenodeClick(elm) {
    if ($(elm).children().hasClass('tnode-choise-icon')) {       
        if ($(elm).children().hasClass('tnode-icon-check')) {
            $(elm).children().removeClass('tnode-icon-check');
            // Hide map

            map.getLayers().forEach(function (layer) {
                if (layer.get('name') == elm.id) {                   
                    //alert(layer.get('name'));
                    layer.setVisible(false);                                       
                }
            });
            ov_grplayers.getLayers().forEach(function (layer) {
                if (layer.get('name') == elm.id) {
                    //alert(layer.get('name'));
                    layer.setVisible(false);                    
                }
            });
        }
        else {
            $(elm).children().addClass('tnode-icon-check');
            // Show map
            map.getLayers().forEach(function (layer) {
                if (layer.get('name') == elm.id) {
                    //alert(layer.get('name'));
                    layer.setVisible(true);                    
                }
            });
            // Bật tắt lớp trong cửa sổ overview            
            ov_grplayers.getLayers().forEach(function (layer) {
                if (layer.get('name') == elm.id) {
                    //alert(layer.get('name'));
                    layer.setVisible(true);
                }
            });
        }
    }
    else {
        // Đánh dấu 1 node
        //$(elm).parent().children().removeClass('tnode-selected');
        $(elm).addClass('tnode-selected');
    }
}
