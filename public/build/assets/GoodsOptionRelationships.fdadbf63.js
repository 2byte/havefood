import{l as g,x as a,y as z,z as i,C as d,G as l,D as p,E as v,Q as r,A as s,U as _}from"./vue.m.04f36914.js";import{a as k}from"./goodsTypeRepository.527642d2.js";import"./FormControl.54a2285b.js";import"./index.2a7b1da3.js";import{_ as b}from"./GoodsOptionForm.a2d4fa2f.js";import"./ActionButtons.1e91f229.js";const x={class:"mb-4 shadow-sm overflow-x-auto"},I={class:"list-none w-max devide-x"},C={key:0},G={key:0},y={key:0},R={__name:"GoodsOptionRelationships",props:{openedGoods:{type:Object,default:null},goodsId:Number},setup(t){const h=t,e=g({goodsId:!1,personal:!1,all:!1}),n=u=>{for(const o of Object.keys(e))e[o]=!1;e[u]=!0};n(h.goodsId?"goodsId":"personal");const c="bg-zinc-100 text-zinc-500 border-zinc-200",m="bg-zinc-200 border-zinc-300 text-zinc-600";return(u,o)=>(a(),z(k,null,{default:i(()=>[d("nav",x,[d("ul",I,[t.goodsId?(a(),l("li",{key:0,class:p(["inline-block border border-solid px-4 py-2 shadow-sm font-semibold hover:bg-zinc-200 hover:border-zinc-300 hover:text-zinc-600",{[c]:!e.goodsId,[m]:e.goodsId}]),onClick:o[0]||(o[0]=v(f=>n("goodsId"),["prevent"]))}," \u041E\u043F\u0446\u0438\u0438 \u043A \u0442\u043E\u0432\u0430\u0440\u0443 ",2)):r("",!0),d("li",{class:p(["inline-block border border-solid px-4 py-2 shadow-sm font-semibold hover:bg-zinc-200 hover:border-zinc-300 hover:text-zinc-600",{[c]:!e.personal,[m]:e.personal}]),onClick:o[1]||(o[1]=v(f=>n("personal"),["prevent"]))}," \u041C\u043E\u0438 \u043E\u043F\u0446\u0438\u0438 ",2),d("li",{class:p(["inline-block border border-solid px-4 py-2 shadow-sm font-semibold hover:bg-zinc-200 hover:border-zinc-300 hover:text-zinc-600",{[c]:!e.all,[m]:e.all}]),onClick:o[2]||(o[2]=v(f=>n("all"),["prevent"]))}," \u0412\u0441\u0435 \u043E\u043F\u0446\u0438\u0438 ",2)])]),s(_,{"enter-active-class":"animate__animated animate__slideInLeft","leave-active-class":"animate__animated animate__bounceOutRight",appear:""},{default:i(()=>[e.goodsId?(a(),l("div",C,[s(b,{"goods-id":t.goodsId,openedGoods:t.openedGoods,buttonCreate:""},null,8,["goods-id","openedGoods"])])):r("",!0)]),_:1}),s(_,{"enter-active-class":"animate__animated animate__slideInLeft","leave-active-class":"animate__animated animate__bounceOutRight"},{default:i(()=>[e.personal?(a(),l("div",G,[s(b,{list:"personal",openedGoods:t.openedGoods,buttonCreate:""},null,8,["openedGoods"])])):r("",!0)]),_:1}),s(_,{"enter-active-class":"animate__animated animate__slideInLeft","leave-active-class":"animate__animated animate__bounceOutRight"},{default:i(()=>[e.all?(a(),l("div",y,[s(b,{list:"all",openedGoods:t.openedGoods,buttonCreate:""},null,8,["openedGoods"])])):r("",!0)]),_:1})]),_:1}))}};export{R as _};
