(window.webpackJsonp=window.webpackJsonp||[]).push([[37],{276:function(e,t,n){"use strict";n.r(t);var o=n(20),r=n(3),a=n(2),d=n(32),c=n(24),i=n(36),w=(n(50),n(69)),s=n(191),g=n(4),l=n(29),u=n(5),f=n(13),y=n(76),m=n(402),h=n(122),p=n(117),b=n(88),I=n(200);const k=new g.a({source:new u.b}),v=new f.b({wrapX:!1}),F=new l.a({source:v,style:function(e){return[new y.c({image:new m.a({radius:8,fill:new h.a({color:"rgba(255, 0, 0, 0.2)"}),stroke:new p.a({color:"red",width:1})}),text:new b.a({text:e.get("node").id.toString(),fill:new h.a({color:"red"}),stroke:new p.a({color:"white",width:3})})})]}}),B=new f.b({wrapX:!1}),x=new l.a({source:B,style:function(e){return[new y.c({stroke:new p.a({color:"blue",width:1}),text:new b.a({text:e.get("edge").id.toString(),fill:new h.a({color:"blue"}),stroke:new p.a({color:"white",width:2})})})]}}),E=new f.b({wrapX:!1}),N=new l.a({source:E,style:function(e){return[new y.c({stroke:new p.a({color:"black",width:1}),fill:new h.a({color:"rgba(0, 255, 0, 0.2)"}),text:new b.a({font:"bold 12px sans-serif",text:e.get("face").id.toString(),fill:new h.a({color:"green"}),stroke:new p.a({color:"white",width:2})})})]}}),S=new r.a({layers:[k,N,x,F],target:"map",view:new a.a({center:[-11e6,46e5],zoom:16})}),P=topolis.createTopology();function G(e,t){const n=e.getFeatureById(t.id);e.removeFeature(n)}function X(e,t){let n;const o=e.getEdgeByPoint(t,5)[0];return n=o?e.modEdgeSplit(o,t):e.addIsoNode(t)}P.on("addnode",function(e){const t=new o.a({geometry:new c.a(e.coordinate),node:e});t.setId(e.id),v.addFeature(t)}),P.on("removenode",function(e){G(v,e)}),P.on("addedge",function(e){const t=new o.a({geometry:new d.a(e.coordinates),edge:e});t.setId(e.id),B.addFeature(t)}),P.on("modedge",function(e){B.getFeatureById(e.id).setGeometry(new d.a(e.coordinates))}),P.on("removeedge",function(e){G(B,e)}),P.on("addface",function(e){const t=P.getFaceGeometry(e),n=new o.a({geometry:new i.b(t),face:e});n.setId(e.id),E.addFeature(n)}),P.on("removeface",function(e){G(E,e)});const C=new w.c({type:"LineString"});C.on("drawend",function(e){const t=e.feature.getGeometry().getCoordinates(),n=t[0],o=t[t.length-1];let r,a;try{r=P.getNodeByPoint(n),a=P.getNodeByPoint(o);const d=P.getEdgeByPoint(n,5),c=P.getEdgeByPoint(o,5),i=P.getEdgesByLine(t);if(1===i.length&&!r&&!a&&0===d.length&&0===c.length)return P.remEdgeNewFace(i[0]),(r=i[0].start).face&&P.removeIsoNode(r),void((a=i[0].end).face&&P.removeIsoNode(a));r||(r=X(P,n),t[0]=r.coordinate),a||(a=X(P,o),t[t.length-1]=a.coordinate),P.addEdgeNewFaces(r,a,t)}catch(e){toastr.warning(e.toString())}}),S.addInteraction(C);const J=new s.a({source:B});S.addInteraction(J),S.addControl(new I.a)}},[[276,0]]]);
//# sourceMappingURL=topolis.js.map