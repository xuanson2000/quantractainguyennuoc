(window.webpackJsonp=window.webpackJsonp||[]).push([[121],{237:function(e,t,r){"use strict";r.r(t);var n=r(0),o=r(15),a=r(187),s=r(93),i=r(14),u=r(6);const c=function(e){const t=e||{};this.featureNS_="http://mapserver.gis.umn.edu/mapserver",this.gmlFormat_=new a.a,this.layers_=t.layers?t.layers:null,s.a.call(this)};Object(n.c)(c,s.a);c.prototype.getLayers=function(){return this.layers_},c.prototype.setLayers=function(e){this.layers_=e},c.prototype.readFeatures_=function(e,t){e.setAttribute("namespaceURI",this.featureNS_);const r=e.localName;let n=[];if(0===e.childNodes.length)return n;if("msGMLOutput"==r)for(let r=0,a=e.childNodes.length;r<a;r++){const a=e.childNodes[r];if(a.nodeType!==Node.ELEMENT_NODE)continue;const s=t[0],i="_layer",c=a.localName.replace(i,"");if(this.layers_&&!Object(o.f)(this.layers_,c))continue;const l=c+"_feature";s.featureType=l,s.featureNS=this.featureNS_;const h={};h[l]=Object(u.j)(this.gmlFormat_.readFeatureElement,this.gmlFormat_);const m=Object(u.r)([s.featureNS,null],h);a.setAttribute("namespaceURI",this.featureNS_);const d=Object(u.u)([],m,a,t,this.gmlFormat_);d&&Object(o.c)(n,d)}if("FeatureCollection"==r){const t=Object(u.u)([],this.gmlFormat_.FEATURE_COLLECTION_PARSERS,e,[{}],this.gmlFormat_);t&&(n=t)}return n},c.prototype.readFeatures,c.prototype.readFeaturesFromNode=function(e,t){const r={};return t&&Object(i.a)(r,this.getReadOptions(e,t)),this.readFeatures_(e,[r])},c.prototype.writeFeatureNode=function(e,t){},c.prototype.writeFeaturesNode=function(e,t){},c.prototype.writeGeometryNode=function(e,t){};var l=c;fetch("data/wmsgetfeatureinfo/osm-restaurant-hotel.xml").then(function(e){return e.text()}).then(function(e){const t=(new l).readFeatures(e);document.getElementById("all").innerText=t.length.toString();const r=new l({layers:["hotel"]}).readFeatures(e);document.getElementById("hotel").innerText=r.length.toString();const n=new l({layers:["restaurant"]}).readFeatures(e);document.getElementById("restaurant").innerText=n.length.toString()})}},[[237,0]]]);
//# sourceMappingURL=getfeatureinfo-layers.js.map