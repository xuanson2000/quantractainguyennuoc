(window.webpackJsonp=window.webpackJsonp||[]).push([[71],{310:function(e,n,o){"use strict";o.r(n);var t=o(3),c=o(96),a=o(2),i=o(31),s=o(4),p=o(8),r=o(61);const u=document.getElementById("popup"),l=document.getElementById("popup-content"),d=document.getElementById("popup-closer"),m=new c.a({element:u,autoPan:!0,autoPanAnimation:{duration:250}});d.onclick=function(){return m.setPosition(void 0),d.blur(),!1},new t.a({layers:[new s.a({source:new r.a({url:"https://api.tiles.mapbox.com/v3/mapbox.natural-earth-hypso-bathy.json?secure",crossOrigin:"anonymous"})})],overlays:[m],target:"map",view:new a.a({center:[0,0],zoom:2})}).on("singleclick",function(e){const n=e.coordinate,o=Object(i.l)(Object(p.l)(n));l.innerHTML="<p>You clicked here:</p><code>"+o+"</code>",m.setPosition(n)})}},[[310,0]]]);
//# sourceMappingURL=popup.js.map