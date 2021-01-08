L.TileLayer.WellInfo = L.TileLayer.WMS.extend({

    onAdd: function (map) {
        // Triggered when the layer is added to a map.
        //   Register a click listener, then do all the upstream WMS things
        L.TileLayer.WMS.prototype.onAdd.call(this, map);
        map.on('click', this.getFeatureInfo, this);
    },

    onRemove: function (map) {
        // Triggered when the layer is removed from a map.
        //   Unregister a click listener, then do all the upstream WMS things
        L.TileLayer.WMS.prototype.onRemove.call(this, map);
        map.off('click', this.getFeatureInfo, this);
    },

    getFeatureInfo: function (evt) {
        // Make an AJAX request to the server and hope for the best
        var url = this.getFeatureInfoUrl(evt.latlng),
            showResults = this.showGetFeatureInfo;
        $.ajax({
            url: url,
            success: function (data, status, xhr) {
                var err = typeof data === 'string' ? null : data;
                if (data.features[0]!=null){
                    well_code = data.features[0].properties.well_code;
                    showResults(well_code);
                }
            },
            error: function (xhr, status, error) {
                showResults(error);
            }
        });
    },

    getFeatureInfoUrl: function (latlng) {
        // Construct a GetFeatureInfo request URL given a point
        var point = this._map.latLngToContainerPoint(latlng, this._map.getZoom()),
            size = this._map.getSize(),

            params = {
                request: 'GetFeatureInfo',
                service: 'WMS',
                srs: 'EPSG:4326',
                styles: this.wmsParams.styles,
                transparent: this.wmsParams.transparent,
                version: this.wmsParams.version,
                format: this.wmsParams.format,
                bbox: this._map.getBounds().toBBoxString(),
                height: size.y,
                width: size.x,
                layers: this.wmsParams.layers,
                query_layers: this.wmsParams.layers,
                info_format: 'application/json'
            };

        params[params.version === '1.3.0' ? 'i' : 'x'] = point.x;
        params[params.version === '1.3.0' ? 'j' : 'y'] = point.y;

        return this._url + L.Util.getParamString(params, this._url, true);
    },

    showGetFeatureInfo: function (well_code) {
        $.ajax({
            type: 'GET',
            url: wellAjaxUri,
            data: {'well_code': well_code},
            dataType: 'html',
            success: function (result) {
                document.getElementById("wellInfoModalBody").innerHTML=result;
                // Otherwise show the content in a popup, or something.
                $('#wellInfoModal').modal('show');
            },
            error: function (xhr, status, error) {
                console.log(error);
            }
        });

    }
});

L.tileLayer.wellInfo = function (url, options) {
    return new L.TileLayer.WellInfo(url, options);
};