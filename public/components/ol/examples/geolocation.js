(window.webpackJsonp=window.webpackJsonp||[]).push([[123],{358:function(e,n,t){"use strict";t.r(n);var c=t(20),o=t(173),a=t(3),i=t(2),r=t(243),s=t(24),u=t(4),g=t(29),w=t(5),d=t(13),l=t(76),m=t(402),y=t(122),p=t(117);const f=new i.a({center:[0,0],zoom:2}),h=new a.a({layers:[new u.a({source:new w.b})],target:"map",controls:Object(r.a)({attributionOptions:{collapsible:!1}}),view:f}),b=new o.a({trackingOptions:{enableHighAccuracy:!0},projection:f.getProjection()});function k(e){return document.getElementById(e)}k("track").addEventListener("change",function(){b.setTracking(this.checked)}),b.on("change",function(){k("accuracy").innerText=b.getAccuracy()+" [m]",k("altitude").innerText=b.getAltitude()+" [m]",k("altitudeAccuracy").innerText=b.getAltitudeAccuracy()+" [m]",k("heading").innerText=b.getHeading()+" [rad]",k("speed").innerText=b.getSpeed()+" [m/s]"}),b.on("error",function(e){const n=document.getElementById("info");n.innerHTML=e.message,n.style.display=""});const A=new c.a;b.on("change:accuracyGeometry",function(){A.setGeometry(b.getAccuracyGeometry())});const T=new c.a;T.setStyle(new l.c({image:new m.a({radius:6,fill:new y.a({color:"#3399CC"}),stroke:new p.a({color:"#fff",width:2})})})),b.on("change:position",function(){const e=b.getPosition();T.setGeometry(e?new s.a(e):null)}),new g.a({map:h,source:new d.b({features:[A,T]})})}},[[358,0]]]);
//# sourceMappingURL=geolocation.js.map