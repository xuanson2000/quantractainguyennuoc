// GLobal vars
var map, map_ctrls;
var vZoom, vCenter;
var content;
var overlaytest, info_popup, is_showing_popup = true;    // Hiển thị thông tin chi tiết của đối tượng trên bản đồ
var container, content, closer, overlaytest;
// Mảng chứa danh sách các layer của overview window
var ov_grplayers =  new ol.layer.Group({name: 'ov'});
var lastPoint;

var txt_measure = document.getElementById("txt-measure");
var popup = new ol.Overlay({
    element: document.getElementById('popup')
});
var popupSearch = new ol.Overlay({
    element: document.getElementById('popupSearch')
});

// Các thông số cơ bản của OpenLayer như:
// raster : là 1 layer nguồn các tile ảnh của bản đồ
// source : là nguồn các yếu tố đồ họa để vẽ lên 1 canvas của html
// vector : là 1 layer dùng cho 1 mục đích với định nghĩa hệ thống mầu sắc, độ đậm nhạt của bút vẽ
var wgs84Sphere = new ol.Sphere(6378137);
var osmmap = new ol.layer.Tile({
    source: new ol.source.OSM(),
    visible: true,
    name: 'OSM'
});
var bingmap = new ol.layer.Tile({
    source: new ol.source.BingMaps({
        //culture: 'vi-vn',
        imagerySet: 'Aerial',
        key: 'AoEo8tCBXbm9g5lReBF17Shm8RN8Lu_vTsAL3UZlbne5aGrVZFBEUjFMDOig8m_n' //'Your Bing Maps Key from http://www.bingmapsportal.com/ here'
    }),
    visible: true,
    name: 'BingMaps'
});

var source = new ol.source.Vector();
var vector = new ol.layer.Vector({
    source: source,
    style: new ol.style.Style({
        fill: new ol.style.Fill({
            color: 'rgba(0, 255, 255, 0.2)'
        }),
        stroke: new ol.style.Stroke({
            color: 'blue', //'#ffcc33',
            width: 2
        }),
        image: new ol.style.Circle({
            radius: 7,
            fill: new ol.style.Fill({
                color: '#ffcc33'
            })
        })        
    })
});
function d2h(d) {
    var h = (+d).toString(16);
    //return// h.length === 1 ? '0' + h : h;
    var pad = "00000000";
    return pad.substring(0, 8 - h.length) + h;
}
function d2t(d) {
    var pad = "000000000";
    var tile = pad.substring(0, 9 - d.length) + d;
    return tile.substring(0, 3) + '/' + tile.substring(3, 6) + '/' + tile.substring(6, 9);
}
var tileSize = 256;
var format = 'image/png';
var projection = ol.proj.get('EPSG:900913');
var urlTemplate = 'https://tiles.mapvn.vn/bdvn/102/L{z}/R{y}/C{x}.png';
var bdvn = new ol.layer.Tile({   
    //extent: fullExtent,
    extent: [7752982.930862102, 129111.080900, 1.6883401393439054E7, 3229557.318100],
    source: new ol.source.XYZ({
        maxZoom: 22,
        projection: projection,
        //projection: "EPSG:3857",
        tileSize: tileSize,
        tileUrlFunction: function (tileCoord) {
            return urlTemplate
         .replace('{z}', ('00' + (tileCoord[0]).toString()).substring((tileCoord[0]).toString().length))
         .replace('{x}', d2h((tileCoord[1]).toString()))
         .replace('{y}', d2h(((-tileCoord[2]) - 1)).toString());
        },
        wrapX: true
    })
});

// Tạo nguồn thông tin mới và layer mới
// Sau khi tạo xong cần add vào map
var makerSource = new ol.source.Vector();
var makerLayer = new ol.layer.Vector({
    source: makerSource,
    style: new ol.style.Style({
        fill: new ol.style.Fill({
            color: 'rgba(0, 100, 100, 0.8)'
        }),
        stroke: new ol.style.Stroke({
            color: 'rgba(0, 100, 100, 0.8)',
            width: 2
        }),
        image: new ol.style.Circle({
            radius: 5,
            fill: new ol.style.Fill({
                color: 'rgba(255, 0, 0, 0.8)'
            })
        })
    })
});

// Nguồn vẽ các đối tượng để tìm kiếm
// Có cách sử dụng Label Vector
var selectSource = new ol.source.Vector();
var selectLayer = new ol.layer.Vector({
    source: selectSource,
    style: pointStyleFunction
});
function pointStyleFunction(feature, resolution) {
    return new ol.style.Style({
        image: new ol.style.Circle({
            radius: 5,
            fill: new ol.style.Fill({ color: 'rgba(255, 255, 255, 0.5)' }),
            stroke: new ol.style.Stroke({ color: 'red', width: 2 })
        }),
        text: createTextStyle(feature, resolution),
        fill: new ol.style.Fill({
            color: 'rgba(0, 255, 255, 0.2)'
        }),
        stroke: new ol.style.Stroke({
            color: 'blue',
            width: 2
        }),
    });
}
var createTextStyle = function (feature, resolution) {
    return new ol.style.Text({
        textAlign: "left",
        textBaseline: "bottom",
        font: "normal 12px Arial",
        text: getText(feature, resolution),
        fill: new ol.style.Fill({ color: "red" }),
        stroke: new ol.style.Stroke({ color: "#ffffff", width: 3 }),
        offsetX: 10,
        offsetY: 0,
        rotation: 0
    });
}
var getText = function (feature, resolution) {
    var type = "alltext";
    var maxResolution = "1200";
    var text = feature.get('name');

    if (resolution > maxResolution) {
        text = '';
    } else if (type == 'hide') {
        text = '';
    }
    return text;
};


var sketch;
var helpTooltipElement;
var helpTooltip;
var measureTooltipElement;
var measureTooltip;
var continuePolygonMsg = '';//'Click to continue drawing the polygon';
var continueLineMsg = '';//Click to continue drawing the line';

var draw; // global so we can remove it later
var formatLength = function (line) {
    var length;
    if (/*geodesicCheckbox.checked*/ false) {
        var coordinates = line.getCoordinates();
        length = 0;
        var sourceProj = map.getView().getProjection();
        for (var i = 0, ii = coordinates.length - 1; i < ii; ++i) {
            var c1 = ol.proj.transform(coordinates[i], sourceProj, 'EPSG:4326');
            var c2 = ol.proj.transform(coordinates[i + 1], sourceProj, 'EPSG:4326');
            length += wgs84Sphere.haversineDistance(c1, c2);
        }
    } else {
        length = Math.round(line.getLength() * 100) / 100;
    }
    var output;
    if (length > 100) {
        output = (Math.round(length / 1000 * 100) / 100) +
            ' ' + 'km';
    } else {
        output = (Math.round(length * 100) / 100) +
            ' ' + 'm';
    }
    return output;
};
var formatArea = function (polygon) {
    var area;
    if (/*geodesicCheckbox.checked*/ false) {
        var sourceProj = map.getView().getProjection();
        var geom = /** @type {ol.geom.Polygon} */(polygon.clone().transform(
            sourceProj, 'EPSG:4326'));
        var coordinates = geom.getLinearRing(0).getCoordinates();
        area = Math.abs(wgs84Sphere.geodesicArea(coordinates));
    } else {
        area = polygon.getArea();
    }
    var output;
    if (area > 10000) {
        output = (Math.round(area / 1000000 * 100) / 100) +
            ' ' + 'km<sup>2</sup>';
    } else {
        output = (Math.round(area * 100) / 100) +
            ' ' + 'm<sup>2</sup>';
    }
    return output;
};

// Tạo ra các div mới cho hiển thị thông tin về đo đạc khoảng cách và gợi ý trên bản đồ
function createHelpTooltip() {
    if (helpTooltipElement) {
        helpTooltipElement.parentNode.removeChild(helpTooltipElement);
    }
    helpTooltipElement = document.createElement('div');
    helpTooltipElement.className = 'tooltip hidden';
    helpTooltip = new ol.Overlay({
        element: helpTooltipElement,
        offset: [15, 0],
        positioning: 'center-left'
    });
    map.addOverlay(helpTooltip);
}
function createMeasureTooltip() {
    if (measureTooltipElement) {
        measureTooltipElement.parentNode.removeChild(measureTooltipElement);
    }
    measureTooltipElement = document.createElement('div');
    measureTooltipElement.className = 'tooltip tooltip-measure';
    measureTooltip = new ol.Overlay({
        element: measureTooltipElement,
        offset: [0, -15],
        positioning: 'bottom-center'
    });
    map.addOverlay(measureTooltip);
}

var typeMeasure = 'Polygon'; // 'Polygon' : 'LineString'
function addInteraction() {
    var type = typeMeasure; // (typeSelect.value == 'area' ? 'Polygon' : 'LineString');
    draw = new ol.interaction.Draw({
        source: source,
        type: /** @type {ol.geom.GeometryType} */ (type),
        style: new ol.style.Style({
            fill: new ol.style.Fill({
                color: 'rgba(255, 255, 255, 0.2)'
            }),
            stroke: new ol.style.Stroke({
                color: 'rgba(0, 0, 0, 0.5)',
                lineDash: [10, 10],
                width: 2
            }),
            image: new ol.style.Circle({
                radius: 5,
                stroke: new ol.style.Stroke({
                    color: 'rgba(0, 0, 0, 0.7)'
                }),
                fill: new ol.style.Fill({
                    color: 'rgba(255, 255, 255, 0.2)'
                })
            })
        })
    });
    map.addInteraction(draw);

    createMeasureTooltip();
    createHelpTooltip();

    var listener;
    draw.on('drawstart',
        function (evt) {
            // set sketch
            sketch = evt.feature;

            /** @type {ol.Coordinate|undefined} */
            var tooltipCoord = evt.coordinate;

            listener = sketch.getGeometry().on('change', function (evt) {
                reset_measure(false); // reset đối tượng vẽ trước đó
                var geom = evt.target;
                var output;
                if (geom instanceof ol.geom.Polygon) {
                    output = formatArea(geom);
                    tooltipCoord = geom.getInteriorPoint().getCoordinates();
                } else if (geom instanceof ol.geom.LineString) {
                    output = formatLength(geom);
                    tooltipCoord = geom.getLastCoordinate();
                }
                measureTooltipElement.innerHTML = output;
                measureTooltip.setPosition(tooltipCoord);

                // Thay đổi text ở trên
                txt_measure.innerHTML = measureTooltipElement.textContent;
            });
        }, this);

    draw.on('drawend',
        function () {
            measureTooltipElement.className = 'tooltip tooltip-static';
            measureTooltip.setOffset([0, -7]);
            // unset sketch
            sketch = null;
            // unset tooltip so that a new one can be created
            measureTooltipElement = null;
            createMeasureTooltip();
            ol.Observable.unByKey(listener);
        }, this);
}

// Initialize the interactions - drag a box
var dragBoxZoomInteraction = new ol.interaction.DragZoom({
    source: source,
    condition: ol.events.condition.always,
    style: new ol.style.Style({
        stroke: new ol.style.Stroke({
            color:  'rgba(250, 250, 250, 0.2)'
        }),
        fill: new ol.style.Fill({
            color: 'rgba(250, 25, 25, 0.2)'
        }),
    })
});
dragBoxZoomInteraction.on('boxend', function (event) {
    var extent = dragBoxZoomInteraction.getGeometry().getExtent();
    var centerPoint = [((extent[0] + extent[2]) / 2), ((extent[1] + extent[3]) / 2)];    
    var currentExt = map.getView().calculateExtent(map.getSize());
    
    map.getView().setCenter(centerPoint);

    if (map_ctrls[0] == "zoom-in") {
        map.getView().fit(extent, map.getSize());
    }
    if (map_ctrls[0] == "zoom-out") {
        var ee = Math.abs(Math.pow(extent[0] - extent[2], 2) + Math.pow(extent[1] - extent[3], 2));
        var cc = Math.abs(Math.pow(currentExt[0] - currentExt[2], 2) + Math.pow(currentExt[1] - currentExt[3], 2));
        var per = (ee / cc) * 100;
        var levelOut = 1;
        if (per < 20)
            levelOut = 1;
        else if (per < 30)
            levelOut = 2;
        else if (per < 50)
            levelOut = 3;
        else
            levelOut = 4;
        map.getView().setZoom(map.getView().getZoom() - levelOut);
    }
});

function getMap(mapid) {
    $.ajax({
        url: "../api/loadmap/" + mapid,
        type: 'GET',
        dataType: 'json',
        success: function (json) {
            if (json.length > 0) {
                var map_data = json[0];
                vZoom = map_data.defaultzoom;
                vCenter = [map_data.centerx, map_data.centery]; // (Việt Nam)
                LoadMap(map_data, getLayers)
            }
        }// end json
    });
}

//function LoadMap(mapid, call_layer) {
function LoadMap(map_data, call_layer) {
    
    map_ctrls = new Array();       
    // Giới hạn hiển thị
    var min = [map_data.minx, map_data.miny];
    var max = [map_data.maxx, map_data.maxy];
    var fullExtent = ol.extent.boundingExtent([min, max]);

    // The tile size supported by the ArcGIS tile service.
    var tileSize = 256;
    var attribution = new ol.Attribution({
        html: 'Copyright © from 2017 by bandovn.vn'
    });

    var overviewMapView = new ol.View({
        extent: [9522925.465, 476591.368, 14385543.457, 3123147.035],
        projection: projection,
        center: vCenter,
        zoom: vZoom,
        maxZoom: map_data.maxzoom,
        minZoom: map_data.minzoom
    })
 
    var projection = ol.proj.get('EPSG:3857');
   
    map = new ol.Map({
        target: 'dosm-map',
        interactions: ol.interaction.defaults({
            doubleClickZoom: true,
            dragAndDrop: true,
            keyboardPan: true,
            keyboardZoom: true,
            mouseWheelZoom: true,
            pointer: true,
            select: true
        }).extend([
            new ol.interaction.DragRotateAndZoom()
        ]),
        controls: ol.control.defaults({
            zoom: true,
            attribution: false
        }).extend([
            new ol.control.ZoomSlider(),
            new ol.control.ScaleLine()
        ]),
        renderer: 'canvas',
        layers: [vector, makerLayer, selectLayer],
        view: new ol.View({
            extent: fullExtent,
            //projection: projection,
            projection: map_data.srid,
            center: vCenter,
            zoom: vZoom,
            maxZoom: map_data.maxzoom,
            minZoom: map_data.minzoom
        })       
    });
    var layerGroupImage = new ol.layer.Group({
        layers: [
            bdvn, bingmap, osmmap, vector, makerLayer, selectLayer
        ]
    });
    osmmap.setVisible(false);
    bingmap.setVisible(false);
    bdvn.setVisible(true);
    map.setLayerGroup(layerGroupImage);
    // New control on the map
    var ov = new ol.control.Overview(
        {
            layers:[bdvn],
            minZoom: 3,
            maxZoom: 3,
            rotation: true,
            align: 'bottom-right',
            panAnimation: true,
            elasticPan: true
        });
    map.addControl(ov);
    
    var projectionLatlong = ol.proj.get('EPSG:4326');
    var mousePositionControl = new ol.control.MousePosition({
        //coordinateFormat: ol.coordinate.createStringXY(2),
        coordinateFormat: function (coord) {
            return '<b>Tọa độ:</b> ' + ol.coordinate.toStringHDMS(coord);
        },
        projection: projectionLatlong,
        // comment the following two lines to have the mouse position
        // be placed within the map.
        //className: 'custom-mouse-position',
        target: document.getElementById('mouse-position'),
        undefinedHTML: '&nbsp;'
    });
    map.addControl(mousePositionControl);

    //getLayers(1);

    bddh10n_ov = new ol.layer.Image({
        source: new ol.source.ImageWMS({
            ratio: 1,

            url: 'http://webgis.mapvn.vn:8097/getmap.ashx?key=b8b47f6c-9ea1-41bc-ba89-5bf527a0b0af',
            params: {
                'FORMAT': format,
                'VERSION': '1.1.1',
                STYLES: '',
                LAYERS: 'mapvn:dh10000',
            }
        }),
        name: 'mapvn:dh10000',
        visible: false
    })
    var viewex = new ol.View({
        extent: [9522925.465, 476591.368, 14385543.457, 3123147.035],
        projection: projection,
        center: vCenter,
        zoom: vZoom,
        maxZoom: 4,
        minZoom: 4
    });
    // New control on the map
    var ovex = new ol.control.OverviewMap(
        {
            //layers: [bdvn, bddh10n_ov],
            layers: [bdvn, ov_grplayers],
            collapsed: false,
            view: viewex
        });
    map.addControl(ovex);

    // Main control bar
    var mainbar = new ol.control.Bar();
    mainbar.setPosition('top-left');
    map.addControl(mainbar);

    /* Nested toobar with one control activated at once */
    var nested = new ol.control.Bar({ toggleOne: true, group: true });
    mainbar.addControl(nested);
    // Add selection tool (a toggle control with a select interaction)
    var selectCtrl = new ol.control.Toggle(
            {
                html: '<i class="fa fa-hand-pointer-o"></i>',
                className: "select",
                title: "Select",
                interaction: new ol.interaction.Select(),
                active: true,
                onToggle: function (active) {
                    $("#info").text("Select is " + (active ? "activated" : "deactivated"));
                }
            });
    nested.addControl(selectCtrl);

    // Add editing tools
    var pedit = new ol.control.Toggle(
            {
                html: '<i class="fa fa-map-marker" ></i>',
                className: "edit",
                title: 'Point',
                interaction: new ol.interaction.Draw
                ({
                    type: 'Point',
                    source: vector.getSource()
                }),
                onToggle: function (active) {
                    $("#info").text("Edition is " + (active ? "activated" : "deactivated"));
                }
            });
    nested.addControl(pedit);    
    /* Standard Controls */    
    mainbar.addControl(new ol.control.ZoomToExtent({ extent: fullExtent }));
    mainbar.addControl(new ol.control.Rotate());
    mainbar.addControl(new ol.control.FullScreen());    
    var save = new ol.control.Button(
            {
                html: '<i class="fa fa-download"></i>',
                title: "Download",
                handleClick: function (e) {
                    window.location.href = "http://bandovn.vn/vi/dang-nhap";
                }
            });
    mainbar.addControl(save);
   
    map.on('pointermove', function (evt) {
        if (map_ctrls[0] == "identify") {            
        }
        // Đo khoảng cách
        if (map_ctrls[0] == "measure-line") {
            if (evt.dragging) {
                return;
            }
            var helpMsg = '';//"Click to start drawing";
            if (sketch) {
                //var output;
                var geom = (sketch.getGeometry());
                if (geom instanceof ol.geom.Polygon) {
                    helpMsg = continuePolygonMsg;
                } else if (geom instanceof ol.geom.LineString) {
                    helpMsg = continueLineMsg;
                }
            }
            helpTooltipElement.innerHTML = helpMsg;
            helpTooltip.setPosition(evt.coordinate);
            helpTooltipElement.classList.remove('hidden'); // show hướng dẫn vẽ
        }
        // Đo diện tích
        if (map_ctrls[0] == "measure-area") {
            if (evt.dragging) {
                return;
            }
            var helpMsg = '';//'Click to start drawing';
            if (sketch) {
                var geom = (sketch.getGeometry());
                if (geom instanceof ol.geom.Polygon) {
                    helpMsg = continuePolygonMsg;
                } else if (geom instanceof ol.geom.LineString) {
                    helpMsg = continueLineMsg;
                }
            }

            helpTooltipElement.innerHTML = helpMsg;
            helpTooltip.setPosition(evt.coordinate);
            helpTooltipElement.classList.remove('hidden'); // show hướng dẫn vẽ
        }
    });
    map.addOverlay(popup);
    map.addOverlay(popupSearch)    

    /**
       * Elements that make up the popup.
       */
    container = document.getElementById('popup');
    content = document.getElementById('popup-content');
    closer = document.getElementById('popup-closer');
    /**
       * Create an overlay to anchor the popup to the map.
       */
    overlaytest = new ol.Overlay({
        element: container,
        autoPan: true,
        autoPanAnimation: {
            duration: 250
        }
    });
    /**
       * Add a click handler to hide the popup.
       * @return {boolean} Don't follow the href.
       */
    closer.onclick = function () {                       
        // Xóa graphics 
        selectSource.clear();
        makerSource.clear(lastPoint);
        makerLayer.setVisible(false);        
        // Ẩn popup
        overlaytest.setPosition(undefined);
        closer.blur();        
        return false;
    };
    map.addOverlay(overlaytest);

    map.on('click', function (evt) {        
        if (map_ctrls[0] == "identify") {
            // Add geometry vào source
            lastPoint = evt.coordinate;
            makerSource.clear(evt.coordinate);
            makerSource.addFeature(new ol.Feature({
                geometry: new ol.geom.Point(evt.coordinate)
            }));
            makerLayer.setVisible(true);
            // Show overlay
            var coordinate = evt.coordinate;            
            var ihtml = spatialsearch(coordinate);
            //content.innerHTML = ihtml;
            //content.innerHTML = "abc";
            //overlaytest.setPosition(coordinate);
        }
    });

    map.on('pointerdown', function (evt) {
    });

    map.on('mouseup', function (evt) {
    });
    map.on('moveend', onMoveEnd);
    // Add sự kiện khi chuột chạy từ trong ra ngoài vùng [map]. Add sau sự kiện pointermove
    map.getViewport().addEventListener('mouseout', function () {
        //helpTooltipElement.classList.add('hidden');
    });
      
    assign_map_ctrls(); // Đăng ký để (active) button được chọn

    call_layer(map_data.mapid);
    getViewByRegion();
	map.getView().fit(fullExtent, map.getSize());
}
function clearGraphics(){
    // Xóa graphics     
    //source = null;
    //makerLayer = null;
    selectSource.clear();
    selectSource.clear();
    //makerLayer.setVisible(false);
}
//const DOTS_PER_INCH = 96;
//const INCHES_PER_METER = 39.37;
function calculateDPI() {
    if (!document) {
        return;
    }

    const inch = document.createElement("div");

    inch.style.width = "1in";
    inch.style.height = "1in";
    inch.style.position = "fixed";
    inch.style.left = "-100%";

    document.body.appendChild(inch);

    var dpi = inch.offsetWidth;
    document.body.removeChild(inch);

    return dpi;
}

function onMoveEnd(evt) {
    var map = evt.map;
    //var map = this;
    var view = map.getView();
    var resolution = view.getResolution();
    var units = map.getView().getProjection().getUnits();
    //var dpi = 25.4 / 0.28;
    var dpi = calculateDPI();
    var mpu = ol.proj.METERS_PER_UNIT[units];
    var scale = resolution * mpu * 39.37 * dpi;
    display('scale-value', scale);
}
function display(id, value) {
    //document.getElementById(id).innerHTML = formatNumber(value.toFixed(0));
    document.getElementById(id).defaultValue = formatNumber(value.toFixed(0));
}
function formatNumber(x) {
    return isNaN(x) ? "" : x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

// Ẩn đối tượng tooltip và reset, delete
function reset_measure(reset_all) {

    // Xóa popup
    makerSource.clear();
    $(popup.getElement()).popover('destroy');
    
    // other
    source.clear();// Xóa đối tượng đã vẽ trong draw
    txt_measure.innerText = "0";// Reset text ở trên
    if (reset_all) {
        // Remove luôn cả hành động vẽ nếu reset_all = true
        map.removeInteraction(draw);  
        // Xóa tất cả các tooltip
        var paras = document.getElementsByClassName('tooltip');
        var i = paras.length - 1;
        for (i = i; i >= 0; i--) {
            paras[i].classList.add('hidden');
        }
    }
    else {
        // Xóa chỉ tooltip-static
        var paras = document.getElementsByClassName('tooltip-static');
        var i = paras.length - 1;
        for (i = i; i >= 0; i--) {
            paras[i].classList.add('hidden');
        }
    }        
}

// Control - điều khiển hệ thống đánh dấu đối tượng active khi thực thi sự kiện nhấn nút
function active_ctrl(ctrl_name) {

    // Đánh dấu active thẻ đối tượng
    if (!$("#btn-" + ctrl_name).hasClass("active")) {
        if (map_ctrls.length > 0) {
            for (i = 0; i < map_ctrls.length; i++) {
                $("#btn-" + map_ctrls[i]).removeClass("active");
                map_ctrls.splice(0, 1);
            }
        }
        map_ctrls.push(ctrl_name)
        $("#btn-" + ctrl_name).addClass("active");
    }
    else {
        $("#btn-" + ctrl_name).removeClass("active");
        map_ctrls.splice(0, 1);
    }

    // Kích hoạt các chức năng sau khi đánh dấu thẻ
    var target = map.getTarget();
    target = (typeof target === "string") ? document.getElementById(target) : target;
    if (map_ctrls[0] == "pan") {
        target.style.cursor = 'move'; // 'move' 'pointer' 'crosshair'; // thay đổi kiểu style
    }
    else if (map_ctrls[0] == "zoom-in" || map_ctrls[0] == "zoom-out") {
        target.style.cursor = 'crosshair';
    }
    else if (map_ctrls[0] == "identify") {
        target.style.cursor = 'help';
    }
    else {      
        target.style.cursor = '';
    }    
    
    reset_measure(true);
    map.removeInteraction(dragBoxZoomInteraction);
    if (map_ctrls[0] == "measure-line") {
        typeMeasure = 'LineString'; // Đặt kiểu vẽ là dạng đường
        map.removeInteraction(draw); // Reset
        addInteraction();
    }
    else if (map_ctrls[0] == "measure-area") {
        typeMeasure = 'Polygon'; // Đặt kiểu vẽ là dạng vùng
        map.removeInteraction(draw); // Xóa bỏ đối tượng vẽ
        addInteraction();
    }
    else if (map_ctrls[0] == "zoom-full") {
        map.getView().setCenter(vCenter);
        map.getView().setZoom(vZoom);
        active_ctrl(); // xóa active
    }
    else if (map_ctrls[0] == "zoom-in" || map_ctrls[0] == "zoom-out") {
        map.addInteraction(dragBoxZoomInteraction);
    }
};

function assign_map_ctrls() {
    $("#btn-zoom-in").click(function () {
        active_ctrl("zoom-in");
    });

    $("#btn-zoom-out").click(function () {
        active_ctrl("zoom-out");
    });

    $("#btn-pan").click(function () {
        active_ctrl("pan");
    });

    $("#btn-measure-line").click(function () {
        active_ctrl("measure-line");
    });

    $("#btn-measure-area").click(function () {
        active_ctrl("measure-area");
    });

    $("#btn-zoom-full").click(function () {
        active_ctrl("zoom-full");
    });

    $("#btn-identify").click(function () {
        active_ctrl("identify");
    });

    $("#btn-print-map").click(function () {
        html2canvas($('#dosm-map'), {
            useCORS: true,
            onrendered: function (canvas) {
                var img = canvas.toDataURL("image/png")
                window.open(img);
            }
        });
    });

    $("#btn-help").click(function () {
        
    });

    
}
