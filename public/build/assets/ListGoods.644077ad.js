import{x as e,G as o,C as m,O as l,P as g,y as c,D as y,B as p,L as b,Q as d,d as h,A as i,M as x,z as _,H as k,F as v}from"./vue.m.04f36914.js";import{b as L,S as $,c as H}from"./LayoutAuthenticated.b7b65e22.js";import{_ as M}from"./GoodsItem.5bde4f02.js";import{b as j}from"./goodsTypeRepository.84bbe09d.js";import"./_plugin-vue_export-helper.cdc0426e.js";import"./adminApp.512903d5.js";import"./Api.16ecd0ef.js";import"./index.2a7b1da3.js";import"./FormControl.5a40029b.js";import"./categories.678091e5.js";import"./FormFilePicker.20008885.js";import"./GoodsForm.743a1d83.js";import"./FormCheckRadioPicker.b74dcdfd.js";import"./GoodsOptionRelationships.bc53f952.js";import"./GoodsOptionForm.639deb85.js";import"./ActionButtons.1e91f229.js";const w={key:0},B={class:"flex justify-between flex-wrap -mb-1 px-2"},T=["innerHTML"],C={__name:"Paginate",props:{links:Array},setup(t){return(n,u)=>t.links.length>3?(e(),o("div",w,[m("div",B,[(e(!0),o(l,null,g(t.links,(s,r)=>(e(),o(l,{key:r},[s.url===null?(e(),o("div",{key:0,class:"mr-1 mb-1 px-4 py-3 text-sm leading-4 text-gray-400 border rounded",innerHTML:s.label},null,8,T)):(e(),c(p(b),{key:1,class:y(["mr-1 mb-1 px-4 py-3 text-sm leading-4 border rounded hover:bg-white focus:border-indigo-500 focus:text-indigo-500",{"bg-blue-700 text-white":s.active}]),href:s.url,innerHTML:s.label},null,8,["class","href","innerHTML"]))],64))),128))])])):d("",!0)}},N={key:0,class:"flex justify-center text-stone-600"},O=m("div",null,"\u041A\u0430\u0442\u0435\u0433\u043E\u0440\u0438\u044F",-1),S={class:"font-semibold ml-4"},V=v(" \u0412 \u0434\u0430\u043D\u043D\u043E\u0439 \u043A\u0430\u0442\u0435\u0433\u043E\u0440\u0438\u0438 \u043F\u043E\u043A\u0430 \u043D\u0435\u0442 \u0442\u043E\u0432\u0430\u0440\u0430 "),D={layout:H},I=Object.assign(D,{__name:"ListGoods",props:{category:Object,goods:Object},setup(t){const n=t,u=h(["\u0410\u0434\u043C\u0438\u043D \u043F\u0430\u043D\u0435\u043B\u044C","\u0422\u043E\u0432\u0430\u0440\u044B"]),s=r=>{n.goods.data.forEach((f,a)=>{f.id==r&&(console.log(n.goods.data[a]),n.goods.data.splice(a,1))})};return(r,f)=>(e(),o(l,null,[i(p(k),{title:"\u0421\u043F\u0438\u0441\u043E\u043A \u0442\u043E\u0432\u0430\u0440\u043E\u0432"}),i(L,{"title-stack":u.value},null,8,["title-stack"]),t.category?(e(),o("div",N,[O,m("div",S,x(t.category.name),1)])):d("",!0),i($,null,{default:_(()=>[(e(!0),o(l,null,g(t.goods.data,a=>(e(),c(M,{goods:a,key:a.id,onDeleted:s},null,8,["goods"]))),128)),t.goods.data.length?d("",!0):(e(),c(j,{key:0,color:"info"},{default:_(()=>[V]),_:1})),i(C,{links:t.goods.links},null,8,["links"])]),_:1})],64))}});export{I as default};