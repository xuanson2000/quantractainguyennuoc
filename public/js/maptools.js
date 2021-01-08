function getFeatureMultiLayers(layList, evt) {
    var viewResolution = (view.getResolution());
    var returnInfo="";
    returnInfo ="<div class=\"easyui-accordion\" style=\"width:100%;\">";
    // console.log(layList.length);
    for (var i = 0; i < layList.length; i++) {
        var featureInfo="";
        var url = layList[i].getGetFeatureInfoUrl(
            evt.coordinate, viewResolution, 'EPSG:3857',
            {
                'INFO_FORMAT': 'application/json',
                'FEATURE_COUNT': 100
            });
        var layTitle=layList[i].getParams().title;
        if (url) {
            $.ajax({
                url:url,
                async: false,
                success: function (data, status, xhr) {
                    console.log(data.features.length);
                    if (data.features.length > 0) {
                        featureInfo = featureInfo + "<div title=\"" + layTitle + "\" style=\"padding:10px;\">";
                        for (var ii = 0; ii < data.features.length; ii++) {
                            featureInfo = featureInfo + "<table class=\"table table-hove\">";
                            featureInfo = featureInfo + "<thead class=\"thead-default\">";
                            featureInfo = featureInfo + "<tr>";
                            featureInfo = featureInfo + "<th>" + "Thuộc tính";
                            featureInfo = featureInfo + "</th>";
                            featureInfo = featureInfo + "<th>" + "Giá trị";
                            featureInfo = featureInfo + "</th>";
                            featureInfo = featureInfo + "</tr>";
                            featureInfo = featureInfo + "</thead>";
                            featureInfo = featureInfo + "<tbody>";
                            for (var iprop in data.features[ii].properties){
                                featureInfo = featureInfo + "<tr>";
                                featureInfo = featureInfo + "<td class=\"table-active\">" + iprop;
                                featureInfo = featureInfo + "</td>";
                                featureInfo = featureInfo + "<td>" + data.features[ii].properties[iprop];
                                featureInfo = featureInfo + "</td>";
                                // featureInfo = featureInfo + "<p>" + iprop + ":" + data.features[ii].properties[iprop] +"</p>";
                                featureInfo = featureInfo + "</tr>";
                            }
                            featureInfo = featureInfo + "</tbody>";
                            featureInfo = featureInfo + "</table>";
                        }
                        featureInfo = featureInfo + "</div>";
                    }
                    returnInfo = returnInfo + featureInfo;
                },
                error: function (ex) {
                    console.log(ex.responseText);
                }
            });
        }
    }
    returnInfo = returnInfo + "</div>";
    document.getElementById('feature-info').innerHTML = returnInfo;
    $.parser.parse('#feature-info');

}