import{l as f,d as o,a3 as V,s as b,x as s,G as c,y as v,Y as x,z as l,A as i,B as t,C as g,M as h,F as E,Q as d,U as _,O as I,_ as y}from"./vue.m.04f36914.js";import{a as R}from"./goodsTypeRepository.571396fe.js";import{i as T,a7 as D,a6 as L,d as M,a1 as S,$,Y as F}from"./Api.16ecd0ef.js";import{a as N}from"./FormFilePicker.131569ac.js";import{_ as P}from"./GoodsForm.b41f8796.js";import{A as j}from"./ActionButtons.1e91f229.js";const z={key:0},G={class:"font-sm text-gray-500"},U={class:"text-stone-500"},Y={key:0},q={key:0},Z={__name:"GoodsItem",props:{goods:{type:Object},test:{type:Boolean,default:!1}},emits:["deleted"],setup(A,{emit:w}){const m=A,e=f({goods:m.goods}),C=m.test,r=o(null),u=o({});C&&!m.isRecursive&&(r.value=V(async()=>{const a=await y(()=>import("./GoodsItemTest.04f85c01.js"),["assets/GoodsItemTest.04f85c01.js","assets/FormTestSetting.5fa630e7.js","assets/FormControl.6bc62911.js","assets/vue.m.04f36914.js","assets/adminApp.6c47c52f.js","assets/adminApp.98f8526d.css","assets/index.2a7b1da3.js","assets/Api.16ecd0ef.js","assets/FormCheckRadioPicker.b74dcdfd.js","assets/testComponentStore.88e1391e.js"]),{useTestComponentStore:p}=await y(()=>import("./testComponentStore.88e1391e.js"),["assets/testComponentStore.88e1391e.js","assets/adminApp.6c47c52f.js","assets/adminApp.98f8526d.css","assets/vue.m.04f36914.js"]);return u.value=p(),u.value.setStateComponent(e),a}));const k=()=>{F("goods/delete","post",{id:e.goods.id}).success(a=>{w("deleted",e.goods.id)}).run()},B=[{id:"actionDelete",title:"\u0423\u0434\u0430\u043B\u0438\u0442\u044C",icon:T,isActive:o(!1),click(){confirm("\u0423\u0434\u0430\u043B\u0438\u0442\u044C \u0442\u043E\u0432\u0430\u0440?")&&k()}},{id:"actionView",title:"\u041F\u0440\u043E\u0441\u043C\u043E\u0442\u0440",icon:D,isActive:o(!1),click(){console.log("enable view")}},{id:"actionEdit",title:"\u0420\u0435\u0434\u0430\u043A\u0442\u0438\u0440\u043E\u0432\u0430\u0442\u044C",icon:L,isActive:o(!1),click(){console.log("enable edit")}}],n=new j(B),O=b(()=>f(e.goods.preview_of_sizes.map(a=>({imageObj:a.small.url,id:a.small.id,complete:!0}))));return(a,p)=>(s(),c(I,null,[(s(),v(x(r.value),{keyForm:"gov_goods_item"})),e.goods?(s(),v(R,{key:0,title:e.goods.name,class:"mb-2 shadow-sm",icon:t($),actionButtonManager:t(n)},{default:l(()=>[i(_,{"enter-active-class":"animate__animated animate__slideInLeft","leave-active-class":"animate__animated animate__bounceOutRight"},{default:l(()=>[t(n).refUnfocusAll?(s(),c("div",z,[i(N,{images:t(O)},null,8,["images"]),g("div",G,h(e.goods.description),1),g("div",U,[i(M,{path:t(S)},null,8,["path"]),E(" \u0426\u0435\u043D\u0430: "+h(e.goods.price),1)])])):d("",!0)]),_:1}),i(_,{"enter-active-class":"animate__animated animate__slideInLeft","leave-active-class":"animate__animated animate__bounceOutRight"},{default:l(()=>[t(n).isActive("actionView")?(s(),c("div",Y,"View")):d("",!0)]),_:1}),i(_,{"enter-active-class":"animate__animated animate__slideInLeft","leave-active-class":"animate__animated animate__bounceOutRight"},{default:l(()=>[t(n).isActive("actionEdit")?(s(),c("div",q,[i(P,{"goods-data":e.goods,class:"-mx-6"},null,8,["goods-data"])])):d("",!0)]),_:1})]),_:1},8,["title","icon","actionButtonManager"])):d("",!0)],64))}};export{Z as _};