(window.webpackJsonp=window.webpackJsonp||[]).push([[133],{367:function(e,t,n){"use strict";n.r(t);var o=n(20),a=n(3),r=n(118),c=n(2),w=n(243),s=n(55),i=n(24),b=n(4),d=n(29),u=n(8),p=n(5),m=n(13),l=n(76),f=n(402),O=n(117);const g=new a.a({layers:[new b.a({source:new p.b({wrapX:!1})})],controls:Object(w.a)({attributionOptions:{collapsible:!1}}),target:"map",view:new c.a({center:[0,0],zoom:1})}),j=new m.b({wrapX:!1}),y=new d.a({source:j});g.addLayer(y);const h=3e3;j.on("addfeature",function(e){!function(e){const t=(new Date).getTime(),n=g.on("postcompose",function(o){const a=o.vectorContext,c=o.frameState,w=e.getGeometry().clone(),i=c.time-t,b=i/h,d=25*Object(s.b)(b)+5,u=Object(s.b)(1-b),p=new l.c({image:new f.a({radius:d,snapToPixel:!1,stroke:new O.a({color:"rgba(255, 0, 0, "+u+")",width:.25+u})})});a.setStyle(p),a.drawGeometry(w),i>h?Object(r.b)(n):g.render()})}(e.feature)}),window.setInterval(function(){const e=360*Math.random()-180,t=180*Math.random()-90,n=new i.a(Object(u.f)([e,t])),a=new o.a(n);j.addFeature(a)},1e3)}},[[367,0]]]);
//# sourceMappingURL=feature-animation.js.map