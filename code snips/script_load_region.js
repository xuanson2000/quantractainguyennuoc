//
// Script load all layers from map
//

function getViewByRegion() {
    if (map == null) return;
    $('#tree_view_by_region').jstree({
'core' : {
  'data' : {
    'url' : function (node) {
      return node.id == '#' ?
        '../api/regiondvhctinh' : '../api/regiondvhchuyen/01';
    },
    'data' : function (node) {
      return { 'id' : node.id };
    }
  }
}
});
}
function getViewByRegion2() {
    if (map == null) return;
    $.ajax({
        url: '../api/regiondvhctinh',
        type: 'GET',
        dataType: 'json',
        success: function (json) {
            var gid = 0;
            makeTree(json);
            // Make tree layers
            $('#tree_view_by_region').jstree({
                'core': {
                    'data': json
                },
                'checkbox': {
                    'keep_selected_style': false
                },
                'plugins': ['checkbox', 'search']
            });
            $('#tree_view_by_region').bind('changed.jstree',
            function (e, data) {
                if (data.node.id = '#') {
                    // load subnode

                }
            }); //end bind          
        }// end json
    });
}
function makeTreeRegion(data) {
    var gid = 0;
    for (var i = 0; i < data.length; i++) {       
    }
}
