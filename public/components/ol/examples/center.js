(window.webpackJsonp=window.webpackJsonp||[]).push([[155],{391:function(e,t,n){"use strict";n.r(t);var o=n(3),a=n(2),i=n(243),r=n(28),s=n(29),c=n(4),d=n(13),l=n(5),g=n(76),u=n(122),w=n(117),m=n(402);const f=new d.b({url:"data/geojson/switzerland.geojson",format:new r.a}),p=new g.c({fill:new u.a({color:"rgba(255, 255, 255, 0.6)"}),stroke:new w.a({color:"#319FD3",width:1}),image:new m.a({radius:5,fill:new u.a({color:"rgba(255, 255, 255, 0.6)"}),stroke:new w.a({color:"#319FD3",width:1})})}),y=new s.a({source:f,style:p}),b=new a.a({center:[0,0],zoom:1}),z=new o.a({layers:[new c.a({source:new l.b}),y],target:"map",controls:Object(i.a)({attributionOptions:{collapsible:!1}}),view:b});document.getElementById("zoomtoswitzerlandbest").addEventListener("click",function(){const e=f.getFeatures()[0].getGeometry();b.fit(e,{padding:[170,50,30,150],constrainResolution:!1})},!1),document.getElementById("zoomtoswitzerlandconstrained").addEventListener("click",function(){const e=f.getFeatures()[0].getGeometry();b.fit(e,{padding:[170,50,30,150]})},!1),document.getElementById("zoomtoswitzerlandnearest").addEventListener("click",function(){const e=f.getFeatures()[0].getGeometry();b.fit(e,{padding:[170,50,30,150],nearest:!0})},!1),document.getElementById("zoomtolausanne").addEventListener("click",function(){const e=f.getFeatures()[1].getGeometry();b.fit(e,{padding:[170,50,30,150],minResolution:50})},!1),document.getElementById("centerlausanne").addEventListener("click",function(){const e=f.getFeatures()[1].getGeometry(),t=z.getSize();b.centerOn(e.getCoordinates(),t,[570,500])},!1)}},[[391,0]]]);
//# sourceMappingURL=center.js.map