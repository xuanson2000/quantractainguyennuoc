(window.webpackJsonp=window.webpackJsonp||[]).push([[44],{283:function(e,n,t){"use strict";t.r(n);var o=t(20),r=t(3),a=t(2),i=t(24),l=t(32),s=t(29),c=t(13),w=t(76),u=t(402),d=t(122),g=t(117);const m=new Array(2e4),f=18e6;for(let e=0;e<2e4;++e)m[e]=new o.a({geometry:new i.a([2*f*Math.random()-f,2*f*Math.random()-f]),i:e,size:e%2?10:20});const p={10:new w.c({image:new u.a({radius:5,fill:new d.a({color:"#666666"}),stroke:new g.a({color:"#bada55",width:1})})}),20:new w.c({image:new u.a({radius:10,fill:new d.a({color:"#666666"}),stroke:new g.a({color:"#bada55",width:1})})})},y=new c.b({features:m,wrapX:!1}),v=new s.a({source:y,style:function(e){return p[e.get("size")]}}),h=new r.a({layers:[v],target:document.getElementById("map"),view:new a.a({center:[0,0],zoom:2})});let k=null,C=null;const b=function(e){const n=y.getClosestFeatureToCoordinate(e);if(null===n)k=null,C=null;else{const t=n.getGeometry().getClosestPoint(e);null===k?k=new i.a(t):k.setCoordinates(t),null===C?C=new l.a([e,t]):C.setCoordinates([e,t])}h.render()};h.on("pointermove",function(e){if(e.dragging)return;const n=h.getEventCoordinate(e.originalEvent);b(n)}),h.on("click",function(e){b(e.coordinate)});const E=new g.a({color:"rgba(255,255,0,0.9)",width:3}),x=new w.c({stroke:E,image:new u.a({radius:10,stroke:E})});h.on("postcompose",function(e){const n=e.vectorContext;n.setStyle(x),null!==k&&n.drawGeometry(k),null!==C&&n.drawGeometry(C)}),h.on("pointermove",function(e){if(e.dragging)return;const n=h.getEventPixel(e.originalEvent),t=h.hasFeatureAtPixel(n);h.getTarget().style.cursor=t?"pointer":""})}},[[283,0]]]);
//# sourceMappingURL=synthetic-points.js.map