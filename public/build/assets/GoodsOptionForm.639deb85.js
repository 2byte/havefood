import{k as ue,d as f,s as b,l as U,x as r,y as _,z as I,A as p,G as $,Q as y,U as oe,B as v,F as Q,M as E,E as z,O as q,C as S,D,a3 as ae,Y as ne,P as pe,_ as H,i as ce,a4 as me}from"./vue.m.04f36914.js";import{a as J,g as fe,l as ge,b as ye}from"./goodsTypeRepository.84bbe09d.js";import{a as x,_ as M}from"./FormControl.5a40029b.js";import{_ as Z}from"./FormCheckRadioPicker.b74dcdfd.js";import{a as ve,_ as Oe}from"./FormFilePicker.20008885.js";import{Y as K,i as he,Z as le,d as te,a4 as _e,_ as Y,a5 as se,h as be,u as Be}from"./Api.16ecd0ef.js";import{d as ie,s as Ie}from"./adminApp.512903d5.js";import{A as ke}from"./ActionButtons.1e91f229.js";import"./index.2a7b1da3.js";const $e=ie("goodsOption",{state:()=>({option:null,loading:!0,error:null}),actions:{async loadOption(e,o=!0){if(!o&&Object.keys(this.option)>0)return this.loading&&(this.loading=!1),Promise.resolve();const n=K("goods/option/get/first","post",{id:e});n.complete((i,t)=>{this.loading=!1,i&&(this.option=t)}),n.success(i=>{}),n.fail(i=>{this.error=i,alert(i)}),n.run()}}}),W=ie("goodsOptionList",{state:()=>({listByGoodsId:[],listByOptionId:[],listByPersonal:[],listByAll:[],referencesByGoodsId:[],referencesByOptionId:[],referencesByPersonal:[],referencesByAll:[],sourceValue:null,goodsData:null,statusLoading:{listByGoodsId:!0,listByOptionId:!0,listByPersonal:!0,listByAll:!0},errors:{listByGoodsId:null,listByPersonal:null,optionId:null,listAll:null},lazyLoad:!0,parentOptionStore:null}),actions:{async loadOptions({source:e,value:o=null,forceLoad:n=!1}){this.sourceValue=o;const i=this.makeNameStorage(e),t=`listBy${i}`,c=`referencesBy${i}`;this.statusLoading[t]=!0;const B=this[t];if(!B)throw new Error(`Error find storage listBy${i}`);if(e=="optionId"){const d=$e();d.loadOption(o),this.parentOptionStore=d}if(this.lazyLoad&&!n&&B.length)return this.statusLoading[t]=!1,B;K("goods/option/get","post",{source:e,value:o}).success(d=>{var L;(L=this.goodsData)!=null||(this.goodsData=d.goods),this[t]=d.options,this[c]=d.references}).complete((d,L)=>{this.statusLoading[t]=!1}).fail(d=>{this.errors[t]=d,console.log(d,"load from source",e)}).run()},makeNameStorage(e){return`${e[0].toUpperCase()}${e.substr(1)}`},isLoadingBySource(e){return ue(this.statusLoading,`listBy${this.makeNameStorage(e)}`)},isAttachedOption(e,o){return this.referencesByGoodsId.find(n=>n.option_id==e&&n.goods_id==o)},attachOption(e,o,n=!0){n?this.referencesByGoodsId.push({option_id:e,goods_id:o}):this.referencesByGoodsId.forEach((i,t)=>{i.option_id==e&&this.referencesByGoodsId.splice(t,1)})},removeOption(e){const o=["listByGoodsId","listByOptionId","listByPersonal","listByAll"];for(const i of o)this[i].forEach((t,c)=>{t.id==e&&this[i].splice(c,1),t!=null&&t.childs&&t.childs.forEach((B,d)=>{B.id==e&&this[i][c].childs.splice(d,1)})});const n=["referencesByGoodsId","referencesByOptionId","referencesByPersonal","referencesByAll"];for(const i of n)this[i].forEach((t,c)=>{t.option_id==e&&this[i].splice(c,1)})}}}),Le={key:0,class:"mb-2"},Ve={key:0,class:"flex flex-col"},Ce={key:0,class:"-mx-6 -mt-6 mb-2 md:w-6/12"},Ge={key:1,class:"bg-blue-100 p-4 text-blue-500"},Se={key:2,class:"bg-green-100 p-4 text-green-500"},Ae=Q(" \u041E\u043F\u0446\u0438\u044F \u0433\u043E\u0442\u043E\u0432\u0430 \u043A \u043F\u0440\u0438\u043A\u0440\u0435\u043F\u043B\u0435\u043D\u0438\u044E "),De={__name:"GoodsOptionItem",props:{option:Object,openedGoods:{type:Object,default:null}},setup(e){const o=e,n={price:o.option.price_type=="single"?`+ ${o.option.price} \u20BD \u043A \u0441\u0442\u043E\u0438\u043C\u043E\u0441\u0442\u0438 \u0442\u043E\u0432\u0430\u0440\u0430`:`${o.option.price} \u20BD \u0441\u0442\u0430\u0440\u0442\u043E\u0432\u0430\u044F \u0446\u0435\u043D\u0430 \u0442\u043E\u0432\u0430\u0440\u0430 `,groupVariant:o.option.group_variant=="checkbox"?"\u041C\u043D\u043E\u0436\u0435\u0441\u0442\u0432\u0435\u043D\u043D\u044B\u0439 \u0432\u044B\u0431\u043E\u0440":"\u0412\u0430\u0440\u0438\u0430\u0442\u0438\u0432\u043D\u044B\u0439"};let i=`#${o.option.id} ${o.option.name}`;o.option.group&&(i+=" (\u0413\u0440\u0443\u043F\u043F\u0430 \u043E\u043F\u0446\u0438\u0439)");const t="text-gray-400 font-medium",c="text-slate-600 font-extrathin leading-2",B=f(!1),d=f(!0),L=()=>{B.value=!B.value,d.value=!1},j=!o.option.parent_id,s=W(),w=b(()=>o.openedGoods?s.isAttachedOption(o.option.id,o.openedGoods.id):!1),a=f(!1),R=f(null),F=(k,g,C=!0)=>{a.value=!0,K("goods/option/attach","post",{goods_id:g,option_id:k,attach:!!C}).setLoader(a).setErrors(R).success(u=>{s.attachOption(k,g,C)}).run()},N=()=>{K("goods/option/delete","post",{id:o.option.id}).success(k=>{s.removeOption(o.option.id)}).run()},P=[{id:"actionDel",title:"\u0423\u0434\u0430\u043B\u0438\u0442\u044C",icon:he,isActive:f(!1),click(){confirm("\u0423\u0434\u0430\u043B\u0438\u0442\u044C \u043E\u043F\u0446\u0438\u044E?")&&N()}}],A=new ke(P),V=b(()=>{var k;return U((k=o.option)==null?void 0:k.preview_of_sizes.map(g=>({imageObj:g.small.url,id:g.small.id,complete:!0})))});return(k,g)=>(r(),_(J,{title:v(i),headerIcon:v(be),onHeaderIconClick:L,class:"relative","action-button-manager":v(A)},{default:I(()=>{var C;return[p(oe,{"enter-active-class":"animate__animated animate__slideInLeft","leave-active-class":"animate__animated animate__bounceOutRight",onAfterLeave:g[0]||(g[0]=u=>d.value=!0)},{default:I(()=>[B.value?(r(),$("div",Le,[B.value?(r(),_(de,{key:0,class:"-mx-6 -mb-6",title:"\u0420\u0435\u0434\u0430\u043A\u0442\u0438\u0440\u043E\u0432\u0430\u043D\u0438\u0435 \u043E\u043F\u0446\u0438\u0438",optionData:e.option,mode:"update"},null,8,["optionData"])):y("",!0)])):y("",!0)]),_:1}),p(oe,{"enter-active-class":"animate__animated animate__slideInLeft","leave-active-class":"animate__animated animate__bounceOutRight",appear:""},{default:I(()=>[d.value?(r(),$("div",Ve,[e.openedGoods&&j?(r(),$("div",Ce,[R.value?(r(),_(le,{key:0,errors:R.value},null,8,["errors"])):y("",!0),v(w)?(r(),$("div",Ge,[p(te,{path:v(_e)},null,8,["path"]),Q(" \u041E\u043F\u0446\u0438\u044F \u043F\u0440\u0438\u043A\u0440\u0435\u043F\u043B\u0435\u043D\u0430 \u043A \u0442\u043E\u0432\u0430\u0440\u0443 "+E(e.openedGoods.name)+" ",1),p(Y,{color:"danger",onClick:g[1]||(g[1]=z(u=>F(e.option.id,e.openedGoods.id,!1),["prevent"])),label:`\u041E\u0442\u043A\u0440\u0435\u043F\u0438\u0442\u044C \u043E\u0442 \u0442\u043E\u0432\u0430\u0440\u0430 ${e.openedGoods.name}`,loader:a.value,small:""},null,8,["label","loader"])])):(r(),$("div",Se,[p(te,{path:v(se)},null,8,["path"]),Ae,p(Y,{color:"success",onClick:g[2]||(g[2]=z(u=>F(e.option.id,e.openedGoods.id),["prevent"])),label:`\u041F\u0440\u0438\u043A\u0440\u0435\u043F\u0438\u0442\u044C \u043A \u0442\u043E\u0432\u0430\u0440\u0443 ${e.openedGoods.name}`,icon:v(se),loader:a.value,small:""},null,8,["label","icon","loader"])]))])):y("",!0),p(ve,{images:v(V)},null,8,["images"]),e.option.group?(r(),$(q,{key:1},[S("div",{class:D(t)},"\u0422\u0438\u043F \u0433\u0440\u0443\u043F\u043F\u044B"),S("div",{class:D(c)},E(n.groupVariant),1)],64)):y("",!0),e.option.description?(r(),$(q,{key:2},[S("div",{class:D(t)},"\u041E\u043F\u0438\u0441\u0430\u043D\u0438\u0435"),S("div",{class:D(c)},E(e.option.description),1)],64)):y("",!0),S("div",{class:D(t)},"\u0426\u0435\u043D\u0430"),S("div",{class:D(c)},E(n.price),1),e.option.note?(r(),$("div",{key:3,class:D(t)},"\u0417\u0430\u043C\u0435\u0442\u043A\u0430")):y("",!0),e.option.note?(r(),$("div",{key:4,class:D(c)},E(e.option.note),1)):y("",!0)])):y("",!0)]),_:1}),(C=e.option.childs)!=null&&C.length?(r(),_(re,{key:0,dataOptions:e.option.childs,parentOption:e.option,"is-recursive":""},null,8,["dataOptions","parentOption"])):y("",!0)]}),_:1},8,["title","headerIcon","action-button-manager"]))}},xe={class:"text-lg mb-6 text-gray-600 font-semibold"},Ee=Q("\u0421\u043F\u0438\u0441\u043E\u043A \u043E\u043F\u0446\u0438\u0439 "),we={class:"text-gray-400"},re={__name:"GoodsOptionList",props:{openedGoods:{type:Object,default:null},goodsId:{default:null},optionId:{default:null},dataOptions:{type:Array},parentOption:{type:Object},list:{type:String,default:"personal"},title:String,test:{type:Boolean,default:!1},emptyMessage:{type:String,default:"\u041D\u0435\u0442 \u043E\u043F\u0446\u0438\u0439"},buttonCreate:{type:Boolean,default:!1},isRecursive:{type:Boolean,default:!1}},setup(e){const o=e,n=W(),{loadOptions:i,isLoadingBySource:t}=n,{listByGoodsId:c,listByOptionId:B,listByPersonal:d,listByAll:L,parentOptionStore:j}=Ie(n),s=U({goodsId:f(o.goodsId),optionId:f(o.optionId),dataOptions:f(o.dataOptions),personal:b(()=>o.list=="personal"?"personal":null),all:b(()=>o.list=="all"?"all":null)}),w=()=>{for(const u of Object.keys(s))if(s[u])return u},a=U({sourceRunnedLoader:w(),sourceValue:s[w()],dataOptions:[],statusLoading:t(w()),loader:null,parentOption:null}),R={goodsId(u=!1){i({source:"goodsId",value:a.sourceValue,forceLoad:u}),a.statusLoading=t("goodsId"),a.dataOptions=c},optionId(u=!1){i({source:"optionId",value:a.sourceValue,forceLoad:u}),a.statusLoading=t("optionId"),a.dataOptions=B},personal(u=!1){i({source:"personal",forceLoad:u}),a.statusLoading=t("personal"),a.dataOptions=d},all(u=!1){i({source:"all",forceLoad:u}),a.statusLoading=t("all"),a.dataOptions=L},dataOptions(){a.statusLoading=!1,a.dataOptions=o.dataOptions}};if(a.loader=b(()=>R[a.sourceRunnedLoader]),a.loader(),typeof a.loader!="function")throw console.log(a.loader,a.sourceRunLoader),new Error("Error run loader state.loader",a.loader);const F=o.test,N=f(null),P=f({});F&&!o.isRecursive&&(N.value=ae(async()=>{const u=await H(()=>import("./GoodsOptionListTest.e921a8ec.js"),["assets/GoodsOptionListTest.e921a8ec.js","assets/FormTestSetting.9ab8ccc5.js","assets/FormControl.5a40029b.js","assets/vue.m.04f36914.js","assets/adminApp.512903d5.js","assets/adminApp.98f8526d.css","assets/index.2a7b1da3.js","assets/Api.16ecd0ef.js","assets/FormCheckRadioPicker.b74dcdfd.js","assets/testComponentStore.aed98314.js"]),{useTestComponentStore:O}=await H(()=>import("./testComponentStore.aed98314.js"),["assets/testComponentStore.aed98314.js","assets/adminApp.512903d5.js","assets/adminApp.98f8526d.css","assets/vue.m.04f36914.js"]);return P.value=O(),P.value.setStateComponent(a),u}));const A=f(""),V=f(!1),k=b(()=>{var O,T,G;return{goodsId:`\u0442\u043E\u0432\u0430\u0440\u0430 ${(O=n.goodsData)==null?void 0:O.name}`,optionId:`\u0433\u0440\u0443\u043F\u043F\u044B ${(T=o.parentOption)==null?void 0:T.name}`,dataOptions:`\u0433\u0440\u0443\u043F\u043F\u044B ${(G=o.parentOption)==null?void 0:G.name}`,personal:"\u043B\u0438\u0447\u043D\u044B\u0435",all:"\u0432\u0441\u0435"}[a.sourceRunnedLoader]}),g=()=>{a.loader(!0)},C=b(()=>{var O;let u="\u0421\u043E\u0437\u0434\u0430\u0442\u044C \u043E\u043F\u0446\u0438\u044E";return o.parentOption?u+=` \u0432 \u0433\u0440\u0443\u043F\u043F\u0435 ${o.parentOption.name}`:o.goodsId&&(u+=` \u043A \u0442\u043E\u0432\u0430\u0440\u0443 ${(O=n.goodsData)==null?void 0:O.name}`),u});return(u,O)=>{var T;return r(),$(q,null,[(r(),_(ne(N.value),{keyForm:"gov_goods_option_list"})),p(J,{empty:!a.dataOptions.length,loader:a.statusLoading,title:A.value,"empty-message":e.emptyMessage},{default:I(()=>[S("h3",xe,[Ee,S("span",we,E(v(k)),1)]),(r(!0),$(q,null,pe(a.dataOptions,G=>(r(),_(De,{key:G.id,option:G,openedGoods:e.openedGoods,class:"-mx-6 last:border-b-0"},null,8,["option","openedGoods"]))),128))]),_:1},8,["empty","loader","title","empty-message"]),V.value?(r(),_(de,{key:0,"option-id":e.optionId,"goods-id":e.goodsId,"parent-option-data":(T=v(j))==null?void 0:T.option,buttonCloseForm:"",onCloseForm:O[0]||(O[0]=G=>V.value=!1),onCreated:g},null,8,["option-id","goods-id","parent-option-data"])):y("",!0),e.buttonCreate&&!V.value?(r(),_(Y,{key:1,color:"success",label:v(C),icon:v(Be),onClick:O[1]||(O[1]=z(G=>V.value=!V.value,["prevent"])),class:"w-min mt-2"},null,8,["label","icon"])):y("",!0)],64)}}},Re={key:0,class:"mb-2 text-teal-500"},Fe={class:"flex justify-between"},de={__name:"GoodsOptionForm",props:{goodsId:{default:0},optionId:{default:0},parentOptionData:{type:Object,default:()=>{}},optionData:Object,type:{default:"option"},mode:{default:"create"},test:{type:Boolean,default:!1},buttonCloseForm:{type:Boolean,default:!1},showChildOptonList:{type:Boolean,default:!0}},emits:["created","close-form"],setup(e,{emit:o}){const n=e,i=f(!!n.optionId),t=f(n.type),c=f(n.mode),B=f(n.goodsId),d=f(n.optionId),L=(m,l)=>{c.value=m,l&&(t.value=l)},j=b(()=>c.value=="update"),s=U({goods_id:B,option_id:d,parent_id:d,mode:c,group:0,group_variant:"checkbox",name:null,description:null,price_type:"single",price:0,note:null,goods_type:"common"});n.optionData&&(d.value=n.optionData.id,["name","description","price_type","price","note","group","goods_type","group_variant","note","hidden"].forEach(l=>{s[l]=n.optionData[l]}));const w={0:"\u041E\u0434\u0438\u043D\u043E\u0447\u043D\u0430\u044F",1:"\u0413\u0440\u0443\u043F\u043F\u0430 \u043E\u043F\u0446\u0438\u0439"},a={checkbox:"\u041C\u043D\u043E\u0436\u0435\u0441\u0442\u0432\u0435\u043D\u043D\u044B\u0439 \u0432\u044B\u0431\u043E\u0440",radio:"\u0412\u0430\u0440\u0438\u0430\u0442\u0438\u0432\u043D\u044B\u0439 \u0432\u044B\u0431\u043E\u0440"},R={goods:"\u0426\u0435\u043D\u0430 \u0442\u043E\u0432\u0430\u0440\u0430",single:"\u0414\u043E\u043F\u043E\u043B\u043D\u0438\u0442\u0435\u043B\u044C\u043D\u0430\u044F \u0441\u0443\u043C\u043C\u0430 \u043A \u0441\u0442\u043E\u0438\u043C\u043E\u0441\u0442\u0438 \u0442\u043E\u0432\u0430\u0440\u0430"},F=b(()=>s.group==1),N=b(()=>c.value=="create"?"\u0421\u043E\u0437\u0434\u0430\u0442\u044C":"\u0421\u043E\u0445\u0440\u0430\u043D\u0438\u0442\u044C"),P={option:"\u043E\u043F\u0446\u0438\u0438",group:"\u0433\u0440\u0443\u043F\u043F\u044B"},A=U({name:b(()=>`\u0418\u043C\u044F ${P[t.value]}`),description:b(()=>`\u041E\u043F\u0438\u0441\u0430\u043D\u0438\u0435 ${P[t.value]}`)}),V=f(null),k=f(!1),g=f(null),C=()=>{k.value=!0,K("goods/option/store","post",s).setLoader(k).setErrors(V).success(m=>{m!=null&&m.option_id?(g.value="\u041E\u043F\u0446\u0438\u044F \u0443\u0441\u043F\u0435\u0448\u043D\u043E \u0441\u043E\u0437\u0434\u0430\u043D\u0430",s.group&&(g.value+=" , \u0432\u044B \u043C\u043E\u0436\u0435\u0442\u0435 \u043F\u0435\u0440\u0435\u0439\u0442\u0438 \u043A \u0441\u043E\u0437\u0434\u0430\u043D\u0438\u044E \u043E\u043F\u0446\u0438\u0439 \u0432 \u0433\u0440\u0443\u043F\u043F\u0435")):g.value="\u041E\u043F\u0446\u0438\u044F \u0443\u0441\u043F\u0435\u0448\u043D\u043E \u0441\u043E\u0445\u0440\u0430\u043D\u0435\u043D\u0430",m!=null&&m.option_id&&(d.value=m.option_id),L("update"),o("created")}).run()},u=b(()=>{const m={create:"\u0421\u043E\u0437\u0434\u0430\u043D\u0438\u0435",update:"\u0420\u0435\u0434\u0430\u043A\u0442\u0438\u0440\u043E\u0432\u0430\u043D\u0438\u0435",option:"\u043E\u043F\u0446\u0438\u0438",group:"\u0433\u0440\u0443\u043F\u043F\u044B"};return`${b(()=>c.value=="update"?`#${d.value} `:"").value}${m[c.value]} ${m[t.value]}`}),O=b({get:()=>Number(s.group),set:m=>{s.group=Number(m),s.group==1?L(c.value,"group"):L(c.value,"option")}}),T=()=>{var l;const m=W();s.goods_type=(l=m.goodsData)==null?void 0:l.goods_type};c.value=="create"&&T();const G=n.test,X=f(null),ee=f({});return G&&(X.value=ae(async()=>{const m=await H(()=>import("./GoodsOptionFormTest.79034b35.js"),["assets/GoodsOptionFormTest.79034b35.js","assets/FormTestSetting.9ab8ccc5.js","assets/FormControl.5a40029b.js","assets/vue.m.04f36914.js","assets/adminApp.512903d5.js","assets/adminApp.98f8526d.css","assets/index.2a7b1da3.js","assets/Api.16ecd0ef.js","assets/FormCheckRadioPicker.b74dcdfd.js","assets/testComponentStore.aed98314.js"]),{useTestComponentStore:l}=await H(()=>import("./testComponentStore.aed98314.js"),["assets/testComponentStore.aed98314.js","assets/adminApp.512903d5.js","assets/adminApp.98f8526d.css","assets/vue.m.04f36914.js"]);return ee.value=l(),ee.value.setStateComponent(U({form:s,switchMode:L})),m})),(m,l)=>(r(),$(q,null,[(r(),_(ne(X.value),{keyForm:"gov_goods_option_form"})),p(J,me({title:v(u),form:"",onSubmit:z(C,["prevent"])},m.$attrs),{default:I(()=>[i.value&&e.parentOptionData?(r(),$("div",Re," \u0421\u043E\u0437\u0434\u0430\u043D\u0438\u0435 \u043E\u043F\u0446\u0438\u0438 \u0432 \u0433\u0440\u0443\u043F\u043F\u0435 "+E(e.parentOptionData.name),1)):y("",!0),!i.value&&!e.optionData?(r(),_(x,{key:1,label:"\u0422\u0438\u043F \u043E\u043F\u0446\u0438\u0438"},{default:I(()=>[p(Z,{modelValue:v(O),"onUpdate:modelValue":l[0]||(l[0]=h=>ce(O)?O.value=h:null),name:"group",type:"radio",options:w},null,8,["modelValue"])]),_:1})):y("",!0),v(F)?(r(),_(x,{key:2,label:"\u0422\u0438\u043F \u043E\u043F\u0446\u0438\u0439 \u0432 \u0433\u0440\u0443\u043F\u043F\u0435"},{default:I(()=>[p(Z,{modelValue:s.group_variant,"onUpdate:modelValue":l[1]||(l[1]=h=>s.group_variant=h),name:"group_variant",type:"radio",options:a},null,8,["modelValue"])]),_:1})):y("",!0),p(x,{label:A.name},{default:I(()=>[p(M,{placeholder:A.name,modelValue:s.name,"onUpdate:modelValue":l[2]||(l[2]=h=>s.name=h)},null,8,["placeholder","modelValue"])]),_:1},8,["label"]),p(x,{label:"\u0412\u043D\u0443\u0442\u0440\u0438\u043D\u043D\u044F\u044F \u0437\u0430\u043C\u0435\u0442\u043A\u0430"},{default:I(()=>[p(M,{placeholder:"\u0417\u0430\u043C\u0435\u0442\u043A\u0430 \u0434\u043B\u044F \u0430\u0434\u043C\u0438\u043D\u043E\u0432",modelValue:s.note,"onUpdate:modelValue":l[3]||(l[3]=h=>s.note=h)},null,8,["modelValue"])]),_:1}),p(x,{label:A.description},{default:I(()=>[p(M,{type:"textarea",placeholder:A.description,modelValue:s.description,"onUpdate:modelValue":l[4]||(l[4]=h=>s.description=h),class:"resize"},null,8,["placeholder","modelValue"])]),_:1},8,["label"]),p(x,{label:"\u0423\u0441\u0442\u0430\u043D\u043E\u0432\u043A\u0430 \u0446\u0435\u043D\u044B \u043D\u0430 \u0442\u043E\u0432\u0430\u0440"},{default:I(()=>[p(Z,{modelValue:s.price_type,"onUpdate:modelValue":l[5]||(l[5]=h=>s.price_type=h),name:"form.price_type",type:"radio",options:R},null,8,["modelValue"])]),_:1}),v(F)?y("",!0):(r(),_(x,{key:3,label:"\u0421\u0443\u043C\u043C\u0430"},{default:I(()=>[p(M,{modelValue:s.price,"onUpdate:modelValue":l[6]||(l[6]=h=>s.price=h),placeholder:"100.00"},null,8,["modelValue"])]),_:1})),p(x,{label:"\u0422\u0438\u043F \u0442\u043E\u0432\u0430\u0440\u0430"},{default:I(()=>[p(M,{modelValue:s.goods_type,"onUpdate:modelValue":l[7]||(l[7]=h=>s.goods_type=h),options:v(fe),loader:v(ge)},null,8,["modelValue","options","loader"])]),_:1}),p(Oe,{model:"goodsoption",model_id:d.value,label:"\u0417\u0430\u0433\u0440\u0443\u0437\u0438\u0442\u044C \u0438\u0437\u043E\u0431\u0440\u0430\u0436\u0435\u043D\u0438\u044F"},null,8,["model_id"]),V.value?(r(),_(le,{key:4,errors:V.value},null,8,["errors"])):y("",!0),g.value?(r(),_(ye,{key:5,color:"success",timeout:"5000"},{default:I(()=>[Q(E(g.value),1)]),_:1})):y("",!0),S("div",Fe,[p(Y,{type:"submit",color:"success",label:v(N),loader:k.value},null,8,["label","loader"]),e.buttonCloseForm?(r(),_(Y,{key:0,type:"button",color:"danger",label:"\u041E\u0442\u043C\u0435\u043D\u0430",onClick:l[8]||(l[8]=z(h=>m.$emit("close-form"),["prevent"]))})):y("",!0)])]),_:1},16,["title","onSubmit"]),v(j)&&s.group&&e.showChildOptonList?(r(),_(re,{key:0,"option-id":d.value,"empty-message":`\u0412 \u0433\u0440\u0443\u043F\u043F\u0435 ${s.name} \u0435\u0449\u0451 \u043D\u0435\u0442 \u043E\u043F\u0446\u0438\u0439`,"parent-option":s,"button-create":""},null,8,["option-id","empty-message","parent-option"])):y("",!0)],64))}};export{re as _,de as a};
