(window.webpackJsonp=window.webpackJsonp||[]).push([[156],{242:function(t,e,i){"use strict";i.r(e);var n=i(3),o=i(2),a=i(4),s=i(0),c=i(14),r=i(47),p=i(51);const h=function(t){this.account_=t.account,this.mapId_=t.map||"",this.config_=t.config||{},this.templateCache_={},p.a.call(this,{attributions:t.attributions,cacheSize:t.cacheSize,crossOrigin:t.crossOrigin,maxZoom:void 0!==t.maxZoom?t.maxZoom:18,minZoom:t.minZoom,projection:t.projection,state:r.a.LOADING,wrapX:t.wrapX}),this.initializeMap_()};Object(s.c)(h,p.a),h.prototype.getConfig=function(){return this.config_},h.prototype.updateConfig=function(t){Object(c.a)(this.config_,t),this.initializeMap_()},h.prototype.setConfig=function(t){this.config_=t||{},this.initializeMap_()},h.prototype.initializeMap_=function(){const t=JSON.stringify(this.config_);if(this.templateCache_[t])return void this.applyTemplate_(this.templateCache_[t]);let e="https://"+this.account_+".carto.com/api/v1/map";this.mapId_&&(e+="/named/"+this.mapId_);const i=new XMLHttpRequest;i.addEventListener("load",this.handleInitResponse_.bind(this,t)),i.addEventListener("error",this.handleInitError_.bind(this)),i.open("POST",e),i.setRequestHeader("Content-type","application/json"),i.send(JSON.stringify(this.config_))},h.prototype.handleInitResponse_=function(t,e){const i=e.target;if(!i.status||i.status>=200&&i.status<300){let e;try{e=JSON.parse(i.responseText)}catch(t){return void this.setState(r.a.ERROR)}this.applyTemplate_(e),this.templateCache_[t]=e,this.setState(r.a.READY)}else this.setState(r.a.ERROR)},h.prototype.handleInitError_=function(t){this.setState(r.a.ERROR)},h.prototype.applyTemplate_=function(t){const e="https://"+t.cdn_url.https+"/"+this.account_+"/api/v1/map/"+t.layergroupid+"/{z}/{x}/{y}.png";this.setUrl(e)};var l=h,u=i(5);const _={layers:[{type:"cartodb",options:{cartocss_version:"2.1.1",cartocss:"#layer { polygon-fill: #F00; }",sql:"select * from european_countries_e where area > 0"}}]},m=new l({account:"documentation",config:_});new n.a({layers:[new a.a({source:new u.b}),new a.a({source:m})],target:"map",view:new o.a({center:[0,0],zoom:2})});document.getElementById("country-area").addEventListener("change",function(){!function(t){_.layers[0].options.sql="select * from european_countries_e where area > "+t,m.setConfig(_)}(this.value)})}},[[242,0]]]);
//# sourceMappingURL=cartodb.js.map