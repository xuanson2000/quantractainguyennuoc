(window.webpackJsonp=window.webpackJsonp||[]).push([[100],{337:function(n,e,o){"use strict";o.r(e);var t=o(3),a=o(2),s=o(4),i=o(8),r=o(61);function c(n){return Object(i.n)(n,"EPSG:4326","EPSG:3857")}const w={India:c([68.17665,7.96553,97.40256,35.49401]),Argentina:c([-73.41544,-55.25,-53.62835,-21.83231]),Nigeria:c([2.6917,4.24059,14.57718,13.86592]),Sweden:c([11.02737,55.36174,23.90338,69.10625])},u=new s.a({source:new r.a({url:"https://api.tiles.mapbox.com/v3/mapbox.world-light.json?secure",crossOrigin:"anonymous"})}),p=new s.a({extent:w.India,source:new r.a({url:"https://api.tiles.mapbox.com/v3/mapbox.world-black.json?secure",crossOrigin:"anonymous"})});new t.a({layers:[u,p],target:"map",view:new a.a({center:[0,0],zoom:1})});for(const n in w)document.getElementById(n).onclick=function(n){p.setExtent(w[n.target.id])}}},[[337,0]]]);
//# sourceMappingURL=layer-extent.js.map