(window.webpackJsonp=window.webpackJsonp||[]).push([[20],{263:function(e,t,r){"use strict";r.r(t);var n=r(3),o=r(2),s=r(1),a=r(4),w=r(8),c=r(5),p=r(68),i=r(106);const l=Object(w.g)("EPSG:3857").getExtent(),u=Object(s.E)(l)/256,g=new Array(22);for(let e=0,t=g.length;e<t;++e)g[e]=u/Math.pow(2,e);const v=new i.a({extent:[-13884991,2870341,-7455066,6338219],resolutions:g,tileSize:[512,256]}),b=[new a.a({source:new c.b}),new a.a({source:new p.a({url:"https://ahocevar.com/geoserver/wms",params:{LAYERS:"topp:states",TILED:!0},serverType:"geoserver",tileGrid:v})})];new n.a({layers:b,target:"map",view:new o.a({center:[-10997148,4569099],zoom:4})})}},[[263,0]]]);
//# sourceMappingURL=wms-custom-tilegrid-512x256.js.map