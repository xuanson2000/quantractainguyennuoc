(window.webpackJsonp=window.webpackJsonp||[]).push([[116],{353:function(e,a,p){"use strict";p.r(a);var t=p(3),s=p(2),c=p(4),i=p(51);const l="kDm0Jq1K4Ak7Bwtn8uvk",n="xnmvc4dKZrDfGlvQHXSvwQ",d=[{base:"base",type:"maptile",scheme:"normal.day",app_id:l,app_code:n},{base:"base",type:"maptile",scheme:"normal.day.transit",app_id:l,app_code:n},{base:"base",type:"maptile",scheme:"pedestrian.day",app_id:l,app_code:n},{base:"aerial",type:"maptile",scheme:"terrain.day",app_id:l,app_code:n},{base:"aerial",type:"maptile",scheme:"satellite.day",app_id:l,app_code:n},{base:"aerial",type:"maptile",scheme:"hybrid.day",app_id:l,app_code:n}],r=[];let o,m;for(o=0,m=d.length;o<m;++o){const e=d[o];r.push(new c.a({visible:!1,preload:1/0,source:new i.a({url:h("https://{1-4}.{base}.maps.cit.api.here.com/{type}/2.1/maptile/newest/{scheme}/{z}/{x}/{y}/256/png?app_id={app_id}&app_code={app_code}",e),attributions:"Map Tiles &copy; "+(new Date).getFullYear()+' <a href="http://developer.here.com">HERE</a>'})}))}new t.a({layers:r,loadTilesWhileInteracting:!0,target:"map",view:new s.a({center:[921371.9389,6358337.7609],zoom:10})});function h(e,a){return e.replace("{base}",a.base).replace("{type}",a.type).replace("{scheme}",a.scheme).replace("{app_id}",a.app_id).replace("{app_code}",a.app_code)}const y=document.getElementById("layer-select");function _(){const e=y.value;for(let a=0,p=r.length;a<p;++a)r[a].setVisible(d[a].scheme===e)}y.addEventListener("change",_),_()}},[[353,0]]]);
//# sourceMappingURL=here-maps.js.map