(window.webpackJsonp=window.webpackJsonp||[]).push([[101],{338:function(e,o,t){"use strict";t.r(o);var n=t(3),r=t(2),a=t(243),s=t(4),i=t(5);const c=new s.a({source:new i.b}),p=new n.a({layers:[c],target:"map",controls:Object(a.a)({attributionOptions:{collapsible:!1}}),view:new r.a({center:[0,0],zoom:2})});c.on("precompose",function(e){const o=e.context;o.save();const t=e.frameState.pixelRatio,n=p.getSize();o.translate(n[0]/2*t,n[1]/2*t),o.scale(3*t,3*t),o.translate(-75,-80),o.beginPath(),o.moveTo(75,40),o.bezierCurveTo(75,37,70,25,50,25),o.bezierCurveTo(20,25,20,62.5,20,62.5),o.bezierCurveTo(20,80,40,102,75,120),o.bezierCurveTo(110,102,130,80,130,62.5),o.bezierCurveTo(130,62.5,130,25,100,25),o.bezierCurveTo(85,25,75,37,75,40),o.clip(),o.translate(75,80),o.scale(1/3/t,1/3/t),o.translate(-n[0]/2*t,-n[1]/2*t)}),c.on("postcompose",function(e){e.context.restore()})}},[[338,0]]]);
//# sourceMappingURL=layer-clipping.js.map