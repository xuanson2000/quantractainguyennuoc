(window.webpackJsonp=window.webpackJsonp||[]).push([[10],{253:function(t,e,o){"use strict";o.r(e);var a=o(3),r=o(2),i=o(243),n=o(1),s=o(4),g=o(8),p=o(103),w=o(154);const c=new a.a({target:"map",controls:Object(i.a)({attributionOptions:{collapsible:!1}}),view:new r.a({zoom:5,center:Object(g.f)([5,45])})}),l=[],b=[],m=Object(g.g)("EPSG:3857"),u=Object(n.E)(m.getExtent())/256;for(let t=0;t<18;t++)b[t]=t.toString(),l[t]=u/Math.pow(2,t);const f=new w.b({origin:[-20037508,20037508],resolutions:l,matrixIds:b}),S=new p.a({url:"https://wxs.ign.fr/2mqbg0z6cx7ube8gsou10nrt/wmts",layer:"GEOGRAPHICALGRIDSYSTEMS.MAPS",matrixSet:"PM",format:"image/jpeg",projection:"EPSG:3857",tileGrid:f,style:"normal",attributions:'<a href="http://www.geoportail.fr/" target="_blank"><img src="https://api.ign.fr/geoportail/api/js/latest/theme/geoportal/img/logo_gp.gif"></a>'}),h=new s.a({source:S});c.addLayer(h)}},[[253,0]]]);
//# sourceMappingURL=wmts-ign.js.map