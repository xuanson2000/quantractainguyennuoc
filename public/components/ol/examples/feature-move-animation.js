(window.webpackJsonp=window.webpackJsonp||[]).push([[132],{244:function(e,t,o){"use strict";o.r(t);var n=o(20),r=o(3),a=o(2),i=o(0),c=o(22),u=o(40),s=o(143),w=o(19),g=o(32),y=o(54);function A(e,t,o,n,r,a){let i,c;void 0!==r?(i=r,c=void 0!==a?a:0):(i=[],c=0);let u=t;for(;u<o;){const t=e[u++];i[c++]=e[u++],i[c++]=t;for(let t=2;t<n;++t)i[c++]=e[u++]}return i.length=c,i}var m=o(90),B=o(8);const l=function(e){const t=e||{};s.a.call(this),this.dataProjection=Object(B.g)("EPSG:4326"),this.factor_=t.factor?t.factor:1e5,this.geometryLayout_=t.geometryLayout?t.geometryLayout:w.a.XY};function k(e,t,o){const n=o||1e5;let r;const a=new Array(t);for(r=0;r<t;++r)a[r]=0;for(let o=0,n=e.length;o<n;)for(r=0;r<t;++r,++o){const t=e[o],n=t-a[r];a[r]=t,e[o]=n}return function(e,t){const o=t||1e5;for(let t=0,n=e.length;t<n;++t)e[t]=Math.round(e[t]*o);return function(e){for(let t=0,o=e.length;t<o;++t){const o=e[t];e[t]=o<0?~(o<<1):o<<1}return function(e){let t="";for(let o=0,n=e.length;o<n;++o)t+=C(e[o]);return t}(e)}(e)}(e,n)}function d(e,t,o){const n=o||1e5;let r;const a=new Array(t);for(r=0;r<t;++r)a[r]=0;const i=function(e,t){const o=t||1e5,n=function(e){const t=function(e){const t=[];let o=0,n=0;for(let r=0,a=e.length;r<a;++r){const a=e.charCodeAt(r)-63;o|=(31&a)<<n,a<32?(t.push(o),o=0,n=0):n+=5}return t}(e);for(let e=0,o=t.length;e<o;++e){const o=t[e];t[e]=1&o?~(o>>1):o>>1}return t}(e);for(let e=0,t=n.length;e<t;++e)n[e]/=o;return n}(e,n);for(let e=0,o=i.length;e<o;)for(r=0;r<t;++r,++e)a[r]+=i[e],i[e]=a[r];return i}function C(e){let t,o="";for(;e>=32;)t=63+(32|31&e),o+=String.fromCharCode(t),e>>=5;return t=e+63,o+=String.fromCharCode(t)}Object(i.c)(l,s.a),l.prototype.readFeature,l.prototype.readFeatureFromText=function(e,t){const o=this.readGeometryFromText(e,t);return new n.a(o)},l.prototype.readFeatures,l.prototype.readFeaturesFromText=function(e,t){return[this.readFeatureFromText(e,t)]},l.prototype.readGeometry,l.prototype.readGeometryFromText=function(e,t){const o=Object(y.b)(this.geometryLayout_),n=d(e,o,this.factor_);A(n,0,n.length,o,n);const r=Object(m.a)(n,0,n.length,o);return Object(u.b)(new g.a(r,this.geometryLayout_),!1,this.adaptOptions(t))},l.prototype.readProjection,l.prototype.writeFeatureText=function(e,t){const o=e.getGeometry();return o?this.writeGeometryText(o,t):(Object(c.a)(!1,40),"")},l.prototype.writeFeaturesText=function(e,t){return this.writeFeatureText(e[0],t)},l.prototype.writeGeometry,l.prototype.writeGeometryText=function(e,t){const o=(e=Object(u.b)(e,!0,this.adaptOptions(t))).getFlatCoordinates(),n=e.getStride();return A(o,0,o.length,n,o),k(o,n,this.factor_)};var _=l,f=o(24),h=o(29),p=o(4),q=o(43),b=o(13),D=o(76),F=o(117),E=o(198),G=o(402),j=o(122);const x=["hldhx@lnau`BCG_EaC??cFjAwDjF??uBlKMd@}@z@??aC^yk@z_@se@b[wFdE??wFfE}N","fIoGxB_I\\gG}@eHoCyTmPqGaBaHOoD\\??yVrGotA|N??o[N_STiwAtEmHGeHcAkiA}^","aMyBiHOkFNoI`CcVvM??gG^gF_@iJwC??eCcA]OoL}DwFyCaCgCcCwDcGwHsSoX??wI_E","kUFmq@hBiOqBgTwS??iYse@gYq\\cp@ce@{vA}s@csJqaE}{@iRaqE{lBeRoIwd@_T{]_","Ngn@{PmhEwaA{SeF_u@kQuyAw]wQeEgtAsZ}LiCarAkVwI}D??_}RcjEinPspDwSqCgs@","sPua@_OkXaMeT_Nwk@ob@gV}TiYs[uTwXoNmT{Uyb@wNg]{Nqa@oDgNeJu_@_G}YsFw]k","DuZyDmm@i_@uyIJe~@jCg|@nGiv@zUi_BfNqaAvIow@dEed@dCcf@r@qz@Egs@{Acu@mC","um@yIey@gGig@cK_m@aSku@qRil@we@{mAeTej@}Tkz@cLgr@aHko@qOmcEaJw~C{w@ka","i@qBchBq@kmBS{kDnBscBnFu_Dbc@_~QHeU`IuyDrC_}@bByp@fCyoA?qMbD}{AIkeAgB","k_A_A{UsDke@gFej@qH{o@qGgb@qH{`@mMgm@uQus@kL{_@yOmd@ymBgwE}x@ouBwtA__","DuhEgaKuWct@gp@cnBii@mlBa_@}|Asj@qrCg^eaC}L{dAaJ_aAiOyjByH{nAuYu`GsAw","Xyn@ywMyOyqD{_@cfIcDe}@y@aeBJmwA`CkiAbFkhBlTgdDdPyiB`W}xDnSa}DbJyhCrX","itAhT}x@bE}Z_@qW_Kwv@qKaaAiBgXvIm}A~JovAxCqW~WanB`XewBbK{_A`K}fBvAmi@","xBycBeCauBoF}}@qJioAww@gjHaPopA_NurAyJku@uGmi@cDs[eRaiBkQstAsQkcByNma","CsK_uBcJgbEw@gkB_@ypEqDoqSm@eZcDwjBoGw`BoMegBaU_`Ce_@_uBqb@ytBwkFqiT_","fAqfEwe@mfCka@_eC_UmlB}MmaBeWkkDeHwqAoX}~DcBsZmLcxBqOwqE_DkyAuJmrJ\\o","~CfIewG|YibQxBssB?es@qGciA}RorAoVajA_nAodD{[y`AgPqp@mKwr@ms@umEaW{dAm","b@umAw|@ojBwzDaaJsmBwbEgdCsrFqhAihDquAi`Fux@}_Dui@_eB_u@guCuyAuiHukA_","lKszAu|OmaA{wKm}@clHs_A_rEahCssKo\\sgBsSglAqk@yvDcS_wAyTwpBmPc|BwZknF","oFscB_GsaDiZmyMyLgtHgQonHqT{hKaPg}Dqq@m~Hym@c`EuiBudIabB{hF{pWifx@snA","w`GkFyVqf@y~BkoAi}Lel@wtc@}`@oaXi_C}pZsi@eqGsSuqJ|Lqeb@e]kgPcaAu}SkDw","zGhn@gjYh\\qlNZovJieBqja@ed@siO{[ol\\kCmjMe\\isHorCmec@uLebB}EqiBaCg}","@m@qwHrT_vFps@kkI`uAszIrpHuzYxx@e{Crw@kpDhN{wBtQarDy@knFgP_yCu\\wyCwy","A{kHo~@omEoYmoDaEcPiuAosDagD}rO{{AsyEihCayFilLaiUqm@_bAumFo}DgqA_uByi","@swC~AkzDlhA}xEvcBa}Cxk@ql@`rAo|@~bBq{@``Bye@djDww@z_C_cAtn@ye@nfC_eC","|gGahH~s@w}@``Fi~FpnAooC|u@wlEaEedRlYkrPvKerBfYs}Arg@m}AtrCkzElw@gjBb","h@woBhR{gCwGkgCc[wtCuOapAcFoh@uBy[yBgr@c@iq@o@wvEv@sp@`FajBfCaq@fIipA","dy@ewJlUc`ExGuaBdEmbBpBssArAuqBBg}@s@g{AkB{bBif@_bYmC}r@kDgm@sPq_BuJ_","s@{X_{AsK_d@eM{d@wVgx@oWcu@??aDmOkNia@wFoSmDyMyCkPiBePwAob@XcQ|@oNdCo","SfFwXhEmOnLi\\lbAulB`X_d@|k@au@bc@oc@bqC}{BhwDgcD`l@ed@??bL{G|a@eTje@","oS~]cLr~Bgh@|b@}Jv}EieAlv@sPluD{z@nzA_]`|KchCtd@sPvb@wSb{@ko@f`RooQ~e","[upZbuIolI|gFafFzu@iq@nMmJ|OeJn^{Qjh@yQhc@uJ~j@iGdd@kAp~BkBxO{@|QsAfY","gEtYiGd]}Jpd@wRhVoNzNeK`j@ce@vgK}cJnSoSzQkVvUm^rSgc@`Uql@xIq\\vIgg@~k","Dyq[nIir@jNoq@xNwc@fYik@tk@su@neB}uBhqEesFjoGeyHtCoD|D}Ed|@ctAbIuOzqB","_}D~NgY`\\um@v[gm@v{Cw`G`w@o{AdjAwzBh{C}`Gpp@ypAxn@}mAfz@{bBbNia@??jI","ab@`CuOlC}YnAcV`@_^m@aeB}@yk@YuTuBg^uCkZiGk\\yGeY}Lu_@oOsZiTe[uWi[sl@","mo@soAauAsrBgzBqgAglAyd@ig@asAcyAklA}qAwHkGi{@s~@goAmsAyDeEirB_{B}IsJ","uEeFymAssAkdAmhAyTcVkFeEoKiH}l@kp@wg@sj@ku@ey@uh@kj@}EsFmG}Jk^_r@_f@m","~@ym@yjA??a@cFd@kBrCgDbAUnAcBhAyAdk@et@??kF}D??OL"].join(""),v=new _({factor:1e6}).readGeometry(x,{dataProjection:"EPSG:4326",featureProjection:"EPSG:3857"}),O=v.getCoordinates(),T=O.length,S=new n.a({type:"route",geometry:v}),I=new n.a({type:"geoMarker",geometry:new f.a(O[0])}),J=new n.a({type:"icon",geometry:new f.a(O[0])}),P=new n.a({type:"icon",geometry:new f.a(O[T-1])}),H={route:new D.c({stroke:new F.a({width:6,color:[237,212,0,.8]})}),icon:new D.c({image:new E.a({anchor:[.5,1],src:"data/icon.png"})}),geoMarker:new D.c({image:new G.a({radius:7,snapToPixel:!1,fill:new j.a({color:"black"}),stroke:new F.a({color:"white",width:2})})})};let L,z,N=!1;const M=document.getElementById("speed"),K=document.getElementById("start-animation"),Y=new h.a({source:new b.b({features:[S,I,J,P]}),style:function(e){return N&&"geoMarker"===e.get("type")?null:H[e.get("type")]}}),Z=[-5639523.95,-3501274.52],Q=new r.a({target:document.getElementById("map"),loadTilesWhileAnimating:!0,view:new a.a({center:Z,zoom:10,minZoom:2,maxZoom:19}),layers:[new p.a({source:new q.a({imagerySet:"AerialWithLabels",key:"As1HiMj1PvLPlqc_gtM7AqZfBL8ZL3VrjaS3zIb22Uvb9WKhuJObROC-qUpa81U5"})}),Y]}),U=function(e){const t=e.vectorContext,o=e.frameState;if(N){const e=o.time-z,r=Math.round(L*e/1e3);if(r>=T)return void X(!0);const a=new f.a(O[r]),i=new n.a(a);t.drawFeature(i,H.geoMarker)}Q.render()};function X(e){N=!1,K.textContent="Start Animation";const t=e?O[T-1]:O[0];I.getGeometry().setCoordinates(t),Q.un("postcompose",U)}K.addEventListener("click",function(){N?X(!1):(N=!0,z=(new Date).getTime(),L=M.value,K.textContent="Cancel Animation",I.setStyle(null),Q.getView().setCenter(Z),Q.on("postcompose",U),Q.render())},!1)}},[[244,0]]]);
//# sourceMappingURL=feature-move-animation.js.map