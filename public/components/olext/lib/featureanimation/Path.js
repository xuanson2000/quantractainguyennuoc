/*
	Copyright (c) 2016-2018 Jean-Marc VIGLINO, 
	released under the CeCILL license (http://www.cecill.info/).
*/
/** Path animation: feature follow a path
 * @constructor
 * @extends {ol.featureAnimation}
 * @param {ol.featureAnimationPathOptions} options extend ol.featureAnimation options
 *  @param {Number} options.speed speed of the feature, if 0 the duration parameter will be used instead, default 0
 *  @param {Number|boolean} options.rotate rotate the symbol when following the path, true or the initial rotation, default false
 *  @param {ol.geom.LineString|ol.Feature} options.path the path to follow
 */
ol.featureAnimation.Path = function(options)
{	options = options || {};
	ol.featureAnimation.call(this, options);
	this.speed_ = options.speed || 0;
	this.path_ = options.path;
	switch (options.rotate) {
		case true: 
		case 0:
			this.rotate_ = 0;
			break;
		default:
			this.rotate_ = options.rotate || false;
			break;
	}
	if (this.path_ && this.path_.getGeometry) this.path_ = this.path_.getGeometry();
	if (this.path_ && this.path_.getLineString) this.path_ = this.path_.getLineString();
	if (this.path_.getLength)
	{	this.dist_ = this.path_.getLength()
		if (this.path_ && this.path_.getCoordinates) this.path_ = this.path_.getCoordinates();
	}
	else this.dist_ = 0;
	if (this.speed_>0) this.duration_ = this.dist_/this.speed_;
}
ol.inherits(ol.featureAnimation.Path, ol.featureAnimation);
/** Animate
* @param {ol.featureAnimationEvent} e
*/
ol.featureAnimation.Path.prototype.animate = function (e)
{	// First time 
	if (!e.time) 
	{	if (!this.dist_) return false;
	}
	var dmax = this.dist_*this.easing_(e.elapsed);
	var p0, p, dx,dy, dl, d = 0;
	p = this.path_[0];
	// Linear interpol
	for (var i = 1; i<this.path_.length; i++)
	{	p0 = p;
		p = this.path_[i];
		dx = p[0]-p0[0];
		dy = p[1]-p0[1];
		dl = Math.sqrt(dx*dx+dy*dy);
		if (dl && d+dl>=dmax) 
		{	var s = (dmax-d)/dl;
			p = [ p0[0] + (p[0]-p0[0])*s, p0[1] + (p[1]-p0[1])*s];
			break;
		}
		d += dl;
	}
	// Rotate symbols
	if (this.rotate_!==false) {
		var angle = this.rotate_ - Math.atan2(p0[1] - p[1], p0[0] - p[0]);
		for (var k=0, s; s=e.style[k]; k++) {
			if (s.getImage()) {
				s.getImage().setRotation(angle)
			}
		}
	}
	e.geom.setCoordinates(p);
	// Animate
	this.drawGeom_(e, e.geom);
	return (e.time <= this.duration_);
}
