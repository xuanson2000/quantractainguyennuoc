(window.webpackJsonp=window.webpackJsonp||[]).push([[67],{306:function(a,e,n){"use strict";n.r(e);var r=n(20),s=n(3),t=n(2),o=n(24),i=n(29),w=n(13),l=n(117),c=n(122),d=n(76),u=n(113);const g=new l.a({color:"black",width:2}),p=new c.a({color:"red"}),m={square:new d.c({image:new u.a({fill:p,stroke:g,points:4,radius:10,angle:Math.PI/4})}),triangle:new d.c({image:new u.a({fill:p,stroke:g,points:3,radius:10,rotation:Math.PI/4,angle:0})}),star:new d.c({image:new u.a({fill:p,stroke:g,points:5,radius:10,radius2:4,angle:0})}),cross:new d.c({image:new u.a({fill:p,stroke:g,points:4,radius:10,radius2:0,angle:0})}),x:new d.c({image:new u.a({fill:p,stroke:g,points:4,radius:10,radius2:0,angle:Math.PI/4})})},f=["x","cross","star","triangle","square"],h=new Array(250),k=45e5;for(let a=0;a<250;++a){const e=[9e6*Math.random()-k,9e6*Math.random()-k];h[a]=new r.a(new o.a(e)),h[a].setStyle(m[f[Math.floor(5*Math.random())]])}const M=new w.b({features:h}),b=new i.a({source:M});new s.a({layers:[b],target:"map",view:new t.a({center:[0,0],zoom:2})})}},[[306,0]]]);
//# sourceMappingURL=regularshape.js.map