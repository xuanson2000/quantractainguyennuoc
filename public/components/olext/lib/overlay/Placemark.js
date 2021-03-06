/*	Copyright (c) 2016 Jean-Marc VIGLINO, 
	released under the CeCILL-B license (French BSD license)
	(http://www.cecill.info/licences/Licence_CeCILL-B_V1-en.txt).
*/
/**
 * @classdesc
 * A placemark element to be displayed over the map and attached to a single map
 * location. The placemarks are customized using CSS.
 *
 * @example
var popup = new ol.Overlay.Placemark();
map.addOverlay(popup);
popup.show(coordinate);
popup.hide();
 *
 * @constructor
 * @extends {ol.Overlay}
 * @param {} options Extend ol/Overlay/Popup options 
 *	@param {String} options.color placemark color
 *	@param {String} options.backgroundColor placemark color
 *	@param {String} options.contentColor placemark color
 *	@param {Number} options.radius placemark radius in pixel
 *	@param {String} options.popupClass the a class of the overlay to style the popup.
 *	@param {function|undefined} options.onclose: callback function when popup is closed
 *	@param {function|undefined} options.onshow callback function when popup is shown
 * @api stable
 */
ol.Overlay.Placemark = function (options) {
	options = options || {};
	options.popupClass = (options.popupClass || '') + ' placemark anim'
	options.positioning = 'bottom-center',
	ol.Overlay.Popup.call(this, options);
	this.setPositioning = function(){};
	if (options.color) this.element.style.color = options.color;
	if (options.backgroundColor ) this.element.style.backgroundColor  = options.backgroundColor ;
	if (options.contentColor ) this.setContentColor(options.contentColor);
	if (options.size) this.setRadius(options.size);
};
ol.inherits(ol.Overlay.Placemark, ol.Overlay.Popup);
/**
 * Set the position and the content of the placemark (hide it before to enable animation).
 * @param {ol.Coordinate|string} coordinate the coordinate of the popup or the HTML content.
 * @param {string|undefined} html the HTML content (undefined = previous content).
 */
ol.Overlay.Placemark.prototype.show = function() {
	this.hide();
	ol.Overlay.Popup.prototype.show.apply(this, arguments);
};
/**
 * Set the placemark color.
 * @param {string} color
 */
ol.Overlay.Placemark.prototype.setColor = function(color) {
	this.element.style.color = color;
};
/**
 * Set the placemark background color.
 * @param {string} color
 */
ol.Overlay.Placemark.prototype.setBackgroundColor = function(color) {
	this.element.style.backgroundColor = color;
};
/**
 * Set the placemark content color.
 * @param {string} color
 */
ol.Overlay.Placemark.prototype.setContentColor = function(color) {
	this.element.getElementsByClassName('content')[0].style.color = color;
};
/**
 * Set the placemark class.
 * @param {string} name
 */
ol.Overlay.Placemark.prototype.setClassName = function(name) {
	var oldclass = this.element.className;
	this.element.className = 'ol-popup placemark ol-popup-bottom ol-popup-center ' 
		+ (/visible/.test(oldclass) ? 'visible ' : '')
		+ (/anim/.test(oldclass) ? 'anim ' : '')
		+ name;
};
/**
 * Set the placemark radius.
 * @param {number} size size in pixel
 */
ol.Overlay.Placemark.prototype.setRadius = function(size) {
	this.element.style.fontSize = size + 'px';
};
