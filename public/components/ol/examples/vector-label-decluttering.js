(window.webpackJsonp=window.webpackJsonp||[]).push([[31],{271:function(e,t,o){"use strict";o.r(t);var n=o(3),r=o(2),a=o(1),w=o(28),c=o(29),l=o(13),s=o(76),i=o(88),f=o(122),g=o(117);const u=new n.a({target:"map",view:new r.a({center:[0,0],zoom:1})}),d=new s.c({geometry:function(e){let t=e.getGeometry();if("MultiPolygon"==t.getType()){const e=t.getPolygons();let o=0;for(let n=0,r=e.length;n<r;++n){const r=e[n],w=Object(a.E)(r.getExtent());w>o&&(o=w,t=r)}}return t},text:new i.a({font:"12px Calibri,sans-serif",overflow:!0,fill:new f.a({color:"#000"}),stroke:new g.a({color:"#fff",width:3})})}),p=[new s.c({fill:new f.a({color:"rgba(255, 255, 255, 0.6)"}),stroke:new g.a({color:"#319FD3",width:1})}),d],y=new c.a({source:new l.b({url:"data/geojson/countries.geojson",format:new w.a}),style:function(e){return d.getText().setText(e.get("name")),p},declutter:!0});u.addLayer(y)}},[[271,0]]]);
//# sourceMappingURL=vector-label-decluttering.js.map