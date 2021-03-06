/*	Copyright (c) 2016 Jean-Marc VIGLINO,
	released under the CeCILL-B license (French BSD license)
	(http://www.cecill.info/licences/Licence_CeCILL-B_V1-en.txt).
*/
/** Control bar for OL3
 * The control bar is a container for other controls. It can be used to create toolbars.
 * Control bars can be nested and combined with ol.control.Toggle to handle activate/deactivate.
 *
 * @constructor
 * @extends {ol.control.Control}
 * @param {Object=} options Control options.
 *	@param {String} options.className class of the control
 *	@param {String} options.centerLabel label for center button, default center
 */
ol.control.GeolocationBar = function(options) {
  if (!options) options = {};
  options.className = options.className || 'ol-geobar';
  ol.control.Bar.call(this, options);
  this.setPosition(options.position || 'bottom-right');
  var element = $(this.element);
  // Geolocation draw interaction
  var interaction = new ol.interaction.GeolocationDraw({	
    source: options.source,
    zoom: options.zoom,
    followTrack: options.followTrack,
    minAccuracy: options.minAccuracy || 10000
  });
  this._geolocBt = new ol.control.Toggle ({
    className: 'geolocBt',
    interaction: interaction,
    onToggle: function(b) {
      interaction.pause(true);
      interaction.setFollowTrack(options.followTrack);
      element.removeClass('pauseTrack');
    }
  });
  this.addControl(this._geolocBt);
  this._geolocBt.setActive(false);
  // Buttons
  var bar = new ol.control.Bar();
  this.addControl(bar);
  var centerBt = new ol.control.TextButton ({
    className: 'centerBt',
    html: options.centerLabel ||'center',
    handleClick: function(b) {
      interaction.setFollowTrack('auto');
    }
  });
  bar.addControl(centerBt);
  var startBt = new ol.control.Button ({
    className: 'startBt',
    handleClick: function(){
      interaction.pause(false);
      interaction.setFollowTrack('auto');
      element.addClass('pauseTrack');
    }
  });
  bar.addControl(startBt);
  var pauseBt = new ol.control.Button ({
    className: 'pauseBt',
    handleClick: function(){
      interaction.pause(true);      
      interaction.setFollowTrack('auto');
      element.removeClass('pauseTrack');
    }
  });
  bar.addControl(pauseBt);
  interaction.on('follow', function(e) {
    if (e.following) {
      element.removeClass('centerTrack');
    } else {
      element.addClass('centerTrack');
    }
  });
  // Activate
  this._geolocBt.on('change:active', function(e) {
    if (e.active) {
      element.addClass('ol-active');
    } else {
      element.removeClass('ol-active');
    }
  });
};
ol.inherits(ol.control.GeolocationBar, ol.control.Bar);
/** Get the ol.interaction.GeolocationDraw associatedwith the bar
 * 
 */
ol.control.GeolocationBar.prototype.getInteraction = function () {
  return this._geolocBt.getInteraction();
};
