(window.webpackJsonp=window.webpackJsonp||[]).push([[105],{342:function(t,e,n){"use strict";n.r(e);var o=n(3),a=n(2),i=n(105),r=n(29),l=n(4),c=n(75),s=n(13),w=n(76),p=n(402),u=n(122),g=n(117);const f={},m=new r.a({source:new s.b({url:"data/kml/2012_Earthquakes_Mag5.kml",format:new i.a({extractStyles:!1})}),style:function(t){const e=t.get("name"),n=5+20*(parseFloat(e.substr(2))-5);let o=f[n];return o||(o=new w.c({image:new p.a({radius:n,fill:new u.a({color:"rgba(255, 153, 0, 0.4)"}),stroke:new g.a({color:"rgba(255, 204, 0, 0.2)",width:1})})}),f[n]=o),o}}),d=new l.a({source:new c.a({layer:"toner"})}),h=new o.a({layers:[d,m],target:"map",view:new a.a({center:[0,0],zoom:2})}),k=$("#info");k.tooltip({animation:!1,trigger:"manual"});const x=function(t){k.css({left:t[0]+"px",top:t[1]-15+"px"});const e=h.forEachFeatureAtPixel(t,function(t){return t});e?k.tooltip("hide").attr("data-original-title",e.get("name")).tooltip("fixTitle").tooltip("show"):k.tooltip("hide")};h.on("pointermove",function(t){t.dragging?k.tooltip("hide"):x(h.getEventPixel(t.originalEvent))}),h.on("click",function(t){x(t.pixel)})}},[[342,0]]]);
//# sourceMappingURL=kml-earthquakes.js.map