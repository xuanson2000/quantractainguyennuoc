(window.webpackJsonp=window.webpackJsonp||[]).push([[136],{370:function(n,o,e){"use strict";e.r(o);var t=e(3),a=e(2),s=e(243),c=e(28),r=e(4),i=e(29),p=e(5),w=e(13);const l=new t.a({layers:[new r.a({source:new p.b}),new i.a({source:new w.b({url:"data/geojson/countries.geojson",format:new c.a})})],target:"map",controls:Object(s.a)({attributionOptions:{collapsible:!1}}),view:new a.a({center:[0,0],zoom:2})});document.getElementById("export-png").addEventListener("click",function(){l.once("postcompose",function(n){const o=n.context.canvas;navigator.msSaveBlob?navigator.msSaveBlob(o.msToBlob(),"map.png"):o.toBlob(function(n){saveAs(n,"map.png")})}),l.renderSync()})}},[[370,0]]]);
//# sourceMappingURL=export-map.js.map