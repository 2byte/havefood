import{l as k,d as f,w as S,x as a,G as _,y as m,B as o,Q as u,E as I,O as v,P as L,z as d,A as i,F as h,M as y,U as b,C,H as O}from"./vue.m.04f36914.js";import{b as R,S as F,c as H}from"./LayoutAuthenticated.29cedea8.js";import{a as N}from"./goodsTypeRepository.527642d2.js";import{u as T}from"./categories.089d7c10.js";import{u as V,_ as z,a6 as D,i as M,Y as P}from"./Api.67876f72.js";import{s as G}from"./adminApp.a00db8f6.js";import{A as j}from"./ActionButtons.1e91f229.js";import{_ as $}from"./GoodsCategoryForm.37f15b2c.js";import"./_plugin-vue_export-helper.cdc0426e.js";import"./FormControl.54a2285b.js";import"./index.2a7b1da3.js";const q={key:0},Q=C("span",{class:"text-zinc-400"},"\u041F\u043E\u0437\u0438\u0446\u0438\u044F:",-1),U=C("br",null,null,-1),Y=C("span",{class:"text-zinc-400"},"\u041A\u043E\u043B\u0438\u0447\u0435\u0441\u0442\u0432\u043E \u0442\u043E\u0432\u0430\u0440\u043E\u0432:",-1),J={__name:"GoodsCategoryList",props:{},setup(x){const n=T(),{listCategories:r}=G(n),{fetchAllCategories:l,removeById:B}=n;k({}),l();const c=k({}),w=s=>{c[s]=!c[s]},p=f(!1),g={},A=s=>{s.forEach(t=>{g[t.id]=new j([{id:"actionRemove",title:"\u0423\u0434\u0430\u043B\u0438\u0442\u044C",icon:M,isActive:f(!1),click(){confirm("\u0423\u0434\u0430\u043B\u0438\u0442\u044C \u043A\u0430\u0442\u0435\u0433\u043E\u0440\u0438\u044E \u0432\u043C\u0435\u0441\u0442\u0435 \u0441 \u0442\u043E\u0432\u0430\u0440\u0430\u043C\u0438?")&&P("categories/delete","post",{id:t.id}).success(e=>{B(t.id)}).run()}}])})};return S(r,s=>{A(s)}),(s,t)=>(a(),_(v,null,[p.value?(a(),m($,{key:0,onCreated:t[0]||(t[0]=e=>o(l)(!0))})):u("",!0),p.value?u("",!0):(a(),m(z,{key:1,class:"mb-2 mx-2",color:"success",label:"\u0421\u043E\u0437\u0434\u0430\u0442\u044C \u043A\u0430\u0442\u0435\u0433\u043E\u0440\u0438\u044E",icon:o(V),onClick:t[1]||(t[1]=I(e=>p.value=!0,["prevent"]))},null,8,["icon"])),(a(!0),_(v,null,L(o(r),e=>(a(),m(N,{key:e.id,title:e.name,empty:!o(r).length,"empty-message":"\u041F\u043E\u043A\u0430 \u043D\u0435\u0442 \u043A\u0430\u0442\u0435\u0433\u043E\u0440\u0438\u0439","header-icon":o(D),onHeaderIconClick:E=>w(e.id),"action-button-manager":g[e.id]},{default:d(()=>[i(b,{"enter-active-class":"animate__animated animate__slideInLeft","leave-active-class":"animate__animated animate__bounceOutRight"},{default:d(()=>[c[e.id]?u("",!0):(a(),_("div",q,[Q,h(" "+y(e.sortpos)+" ",1),U,Y,h(" "+y(e.count_goods),1)]))]),_:2},1024),i(b,{"enter-active-class":"animate__animated animate__slideInLeft","leave-active-class":"animate__animated animate__bounceOutRight"},{default:d(()=>[c[e.id]?(a(),m($,{key:0,categoryData:e,mode:"update",onCreated:t[2]||(t[2]=E=>o(l)(!0))},null,8,["categoryData"])):u("",!0)]),_:2},1024)]),_:2},1032,["title","empty","header-icon","onHeaderIconClick","action-button-manager"]))),128))],64))}},K={layout:H},le=Object.assign(K,{__name:"ListCategories",props:{},setup(x){const n=f(["\u0410\u0434\u043C\u0438\u043D \u043F\u0430\u043D\u0435\u043B\u044C","\u041A\u0430\u0442\u0435\u0433\u043E\u0440\u0438\u0438 \u0442\u043E\u0432\u0430\u0440\u043E\u0432"]);return(r,l)=>(a(),_(v,null,[i(o(O),{title:"\u041A\u0430\u0442\u0435\u0433\u043E\u0440\u0438\u0438 \u0442\u043E\u0432\u0430\u0440\u043E\u0432"}),i(R,{"title-stack":n.value},null,8,["title-stack"]),i(F,null,{default:d(()=>[i(J)]),_:1})],64))}});export{le as default};
