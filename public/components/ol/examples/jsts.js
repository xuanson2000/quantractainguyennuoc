(window.webpackJsonp=window.webpackJsonp||[]).push([[106],{343:function(e,n,t){"use strict";t.r(n);var o=t(3),a=t(2),r=t(28),s=t(29),c=t(4),w=t(8),u=t(5),i=t(13),d=t(133),f=t(24),b=t(32),j=t(36),g=t(72),m=t(73),p=t(87);const h=new i.b;fetch("data/geojson/roads-seoul.geojson").then(function(e){return e.json()}).then(function(e){const n=(new r.a).readFeatures(e,{featureProjection:"EPSG:3857"}),t=new jsts.io.OL3Parser;t.inject(f.a,b.a,d.a,j.b,g.a,m.a,p.a);for(let e=0;e<n.length;e++){const o=n[e],a=t.read(o.getGeometry()).buffer(40);o.setGeometry(t.write(a))}h.addFeatures(n)});const l=new s.a({source:h}),y=new c.a({source:new u.b});new o.a({layers:[y,l],target:document.getElementById("map"),view:new a.a({center:Object(w.f)([126.979293,37.528787]),zoom:15})})}},[[343,0]]]);
//# sourceMappingURL=jsts.js.map