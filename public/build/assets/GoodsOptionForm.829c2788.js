import{k as ue,d as v,s as k,l as M,x as r,y as B,z as L,A as m,U as te,G as I,Q as y,F as q,D as z,B as O,M as T,O as H,C as x,E as R,a3 as ae,w as pe,Y as ne,P as ce,_ as J,i as me,a4 as fe}from"./vue.m.26e38986.js";import{a as ee,g as ge,l as ye,b as ve}from"./goodsTypeRepository.3648a2a1.js";import{a as P,_ as Y}from"./FormControl.ec8216db.js";import{_ as X}from"./FormCheckRadioPicker.80cd8c70.js";import{a as Oe,_ as he}from"./FormFilePicker.e2d70ec9.js";import{Y as K,i as be,d as Z,a4 as _e,a5 as Ie,Z as le,a6 as ke,_ as Q,a7 as se,h as Be,u as $e}from"./Api.4fdb4a26.js";import{d as ie,s as Le}from"./adminApp.8b98ecb1.js";import{A as Ce}from"./ActionButtons.356a0289.js";import"./index.fb2d0054.js";const Ge=ie("goodsOption",{state:()=>({option:null,loading:!0,error:null}),actions:{async loadOption(e,d=!0){if(!d&&Object.keys(this.option)>0)return this.loading&&(this.loading=!1),Promise.resolve();const o=K("goods/option/get/first","post",{id:e});o.complete((i,s)=>{this.loading=!1,i&&(this.option=s)}),o.success(i=>{}),o.fail(i=>{this.error=i,alert(i)}),o.run()}}}),oe=ie("goodsOptionList",{state:()=>({listByGoodsId:[],listByOptionId:[],listByPersonal:[],listByAll:[],referencesByGoodsId:[],referencesByOptionId:[],referencesByPersonal:[],referencesByAll:[],sourceValue:null,goodsData:null,statusLoading:{listByGoodsId:!0,listByOptionId:!0,listByPersonal:!0,listByAll:!0},errors:{listByGoodsId:null,listByPersonal:null,optionId:null,listAll:null},lazyLoad:!0,parentOptionStore:null}),actions:{async loadOptions({source:e,value:d=null,forceLoad:o=!1}){this.sourceValue=d;const i=this.makeNameStorage(e),s=`listBy${i}`,c=`referencesBy${i}`;this.statusLoading[s]=!0;const b=this[s];if(!b)throw new Error(`Error find storage listBy${i}`);if(e=="optionId"){const u=Ge();u.loadOption(d),this.parentOptionStore=u}if(this.lazyLoad&&!o&&b.length)return this.statusLoading[s]=!1,b;K("goods/option/get","post",{source:e,value:d}).success(u=>{var _;(_=this.goodsData)!=null||(this.goodsData=u.goods),this[s]=u.options,this[c]=u.references}).complete((u,_)=>{this.statusLoading[s]=!1}).fail(u=>{this.errors[s]=u,console.log(u,"load from source",e)}).run()},makeNameStorage(e){return`${e[0].toUpperCase()}${e.substr(1)}`},isLoadingBySource(e){return ue(this.statusLoading,`listBy${this.makeNameStorage(e)}`)},isAttachedOption(e,d){return this.referencesByGoodsId.find(o=>o.option_id==e&&o.goods_id==d)},attachOption(e,d,o=!0){o?this.referencesByGoodsId.push({option_id:e,goods_id:d}):this.referencesByGoodsId.forEach((i,s)=>{i.option_id==e&&this.referencesByGoodsId.splice(s,1)})},removeOption(e){const d=["listByGoodsId","listByOptionId","listByPersonal","listByAll"];for(const i of d)this[i].forEach((s,c)=>{s.id==e&&this[i].splice(c,1),s!=null&&s.childs&&s.childs.forEach((b,u)=>{b.id==e&&this[i][c].childs.splice(u,1)})});const o=["referencesByGoodsId","referencesByOptionId","referencesByPersonal","referencesByAll"];for(const i of o)this[i].forEach((s,c)=>{s.option_id==e&&this[i].splice(c,1)})},manualSortChild(e,d,o){for(const[i,s]of this.listByGoodsId.entries())if(s.id==o){for(let[c,b]of s.childs.entries())if(b.id==d){const u=e=="up"?c-1:c+1,_=s.childs[u];s.childs.splice(c,1,_),s.childs.splice(u,1,b),this.listByGoodsId[i].childs.forEach((j,n)=>this.listByGoodsId[i].childs[n].sortpos=n);break}break}}}}),Ve={key:0,class:"mb-2"},Se={key:0,class:"flex flex-col"},we={key:0,class:"bg-gray-50 -mt-6 -mx-6 p-4 text-zinc-500 md:w-6/12"},xe={key:1,class:"-mx-6 mb-2 md:w-6/12"},Ae={key:1,class:"bg-blue-100 p-4 text-blue-500"},De={key:2,class:"bg-green-100 p-4 text-green-500"},Ee={__name:"GoodsOptionItem",props:{option:Object,openedGoods:{type:Object,default:null}},emits:["sorted"],setup(e,{emit:d}){const o=e,i={price:o.option.price_type=="single"?`+ ${o.option.price} \u20BD \u043A \u0441\u0442\u043E\u0438\u043C\u043E\u0441\u0442\u0438 \u0442\u043E\u0432\u0430\u0440\u0430`:`${o.option.price} \u20BD \u0441\u0442\u0430\u0440\u0442\u043E\u0432\u0430\u044F \u0446\u0435\u043D\u0430 \u0442\u043E\u0432\u0430\u0440\u0430 `,groupVariant:o.option.group_variant=="checkbox"?"\u041C\u043D\u043E\u0436\u0435\u0441\u0442\u0432\u0435\u043D\u043D\u044B\u0439 \u0432\u044B\u0431\u043E\u0440":"\u0412\u0430\u0440\u0438\u0430\u0442\u0438\u0432\u043D\u044B\u0439"};let s=`#${o.option.id} ${o.option.name}`;o.option.group&&(s+=" (\u0413\u0440\u0443\u043F\u043F\u0430 \u043E\u043F\u0446\u0438\u0439)");const c="text-gray-400 font-medium",b="text-slate-600 font-extrathin leading-2",u=v(!1),_=v(!0),j=()=>{u.value=!u.value,_.value=!1},n=!o.option.parent_id,S=oe(),a=k(()=>o.openedGoods?S.isAttachedOption(o.option.id,o.openedGoods.id):!1),A=v(!1),D=v(null),F=($,g,G=!0)=>{A.value=!0,K("goods/option/attach","post",{goods_id:g,option_id:$,attach:!!G}).setLoader(A).setErrors(D).success(C=>{S.attachOption($,g,G)}).run()},N=()=>{K("goods/option/delete","post",{id:o.option.id}).success($=>{S.removeOption(o.option.id)}).run()},E=[{id:"actionDel",title:"\u0423\u0434\u0430\u043B\u0438\u0442\u044C",icon:be,isActive:v(!1),click(){confirm("\u0423\u0434\u0430\u043B\u0438\u0442\u044C \u043E\u043F\u0446\u0438\u044E?")&&N()}}],V=new Ce(E),U=k(()=>{var $;return M(($=o.option)==null?void 0:$.preview_of_sizes.map(g=>({imageObj:g.small.url,id:g.small.id,complete:!0})))}),w=$=>{var g;K("goods/option/sort","post",{option_id:o.option.id,goods_id:(g=o.openedGoods)==null?void 0:g.id,direction:$}).success(G=>{if(!n)try{S.manualSortChild($,o.option.id,o.option.parent_id)}catch(C){console.error(C)}d("sorted")}).run()};return($,g)=>(r(),B(ee,{title:O(s),headerIcon:O(Be),onHeaderIconClick:j,class:"relative","action-button-manager":O(V)},{default:L(()=>{var G;return[m(te,{"enter-active-class":"animate__animated animate__slideInLeft","leave-active-class":"animate__animated animate__bounceOutRight",onAfterLeave:g[0]||(g[0]=C=>_.value=!0)},{default:L(()=>[u.value?(r(),I("div",Ve,[u.value?(r(),B(de,{key:0,class:"-mx-6 -mb-6",title:"\u0420\u0435\u0434\u0430\u043A\u0442\u0438\u0440\u043E\u0432\u0430\u043D\u0438\u0435 \u043E\u043F\u0446\u0438\u0438",optionData:e.option,mode:"update"},null,8,["optionData"])):y("",!0)])):y("",!0)]),_:1}),m(te,{"enter-active-class":"animate__animated animate__slideInLeft","leave-active-class":"animate__animated animate__bounceOutRight",appear:""},{default:L(()=>[_.value?(r(),I("div",Se,[e.option.sortParams?(r(),I("div",we,[e.option.sortParams.up?(r(),I("a",{key:0,class:"hover:text-zinc-600",onClick:g[1]||(g[1]=q(C=>w("up"),["prevent"]))},[z("\u0412\u0432\u0435\u0440\u0445 "),m(Z,{path:O(_e)},null,8,["path"])])):y("",!0),e.option.sortParams.down?(r(),I("a",{key:1,class:"hover:text-zinc-600",onClick:g[2]||(g[2]=C=>w("down"))},[z("\u0412\u043D\u0438\u0437 "),m(Z,{path:O(Ie)},null,8,["path"])])):y("",!0)])):y("",!0),e.openedGoods&&n?(r(),I("div",xe,[D.value?(r(),B(le,{key:0,errors:D.value},null,8,["errors"])):y("",!0),O(a)?(r(),I("div",Ae,[m(Z,{path:O(ke)},null,8,["path"]),z(" \u041E\u043F\u0446\u0438\u044F \u043F\u0440\u0438\u043A\u0440\u0435\u043F\u043B\u0435\u043D\u0430 \u043A \u0442\u043E\u0432\u0430\u0440\u0443 "+T(e.openedGoods.name)+" ",1),m(Q,{color:"danger",onClick:g[3]||(g[3]=q(C=>F(e.option.id,e.openedGoods.id,!1),["prevent"])),label:`\u041E\u0442\u043A\u0440\u0435\u043F\u0438\u0442\u044C \u043E\u0442 \u0442\u043E\u0432\u0430\u0440\u0430 ${e.openedGoods.name}`,loader:A.value,small:""},null,8,["label","loader"])])):(r(),I("div",De,[m(Z,{path:O(se)},null,8,["path"]),z(" \u041E\u043F\u0446\u0438\u044F \u0433\u043E\u0442\u043E\u0432\u0430 \u043A \u043F\u0440\u0438\u043A\u0440\u0435\u043F\u043B\u0435\u043D\u0438\u044E "),m(Q,{color:"success",onClick:g[4]||(g[4]=q(C=>F(e.option.id,e.openedGoods.id),["prevent"])),label:`\u041F\u0440\u0438\u043A\u0440\u0435\u043F\u0438\u0442\u044C \u043A \u0442\u043E\u0432\u0430\u0440\u0443 ${e.openedGoods.name}`,icon:O(se),loader:A.value,small:""},null,8,["label","icon","loader"])]))])):y("",!0),m(Oe,{images:O(U)},null,8,["images"]),e.option.group?(r(),I(H,{key:2},[x("div",{class:R(c)},"\u0422\u0438\u043F \u0433\u0440\u0443\u043F\u043F\u044B"),x("div",{class:R(b)},T(i.groupVariant),1)],64)):y("",!0),e.option.description?(r(),I(H,{key:3},[x("div",{class:R(c)},"\u041E\u043F\u0438\u0441\u0430\u043D\u0438\u0435"),x("div",{class:R(b)},T(e.option.description),1)],64)):y("",!0),x("div",{class:R(c)},"\u0426\u0435\u043D\u0430"),x("div",{class:R(b)},T(i.price),1),e.option.note?(r(),I("div",{key:4,class:R(c)},"\u0417\u0430\u043C\u0435\u0442\u043A\u0430")):y("",!0),e.option.note?(r(),I("div",{key:5,class:R(b)},T(e.option.note),1)):y("",!0)])):y("",!0)]),_:1}),(G=e.option.childs)!=null&&G.length?(r(),B(re,{key:0,dataOptions:e.option.childs,parentOption:e.option,"is-recursive":""},null,8,["dataOptions","parentOption"])):y("",!0)]}),_:1},8,["title","headerIcon","action-button-manager"]))}},Re={class:"text-lg mb-6 text-gray-600 font-semibold"},Pe={class:"text-gray-400"},re={__name:"GoodsOptionList",props:{openedGoods:{type:Object,default:null},goodsId:{default:null},optionId:{default:null},dataOptions:{type:Array},parentOption:{type:Object},list:{type:String,default:"personal"},title:String,test:{type:Boolean,default:!1},emptyMessage:{type:String,default:"\u041D\u0435\u0442 \u043E\u043F\u0446\u0438\u0439"},buttonCreate:{type:Boolean,default:!1},isRecursive:{type:Boolean,default:!1}},setup(e){const d=e,o=oe(),{loadOptions:i,isLoadingBySource:s}=o,{listByGoodsId:c,listByOptionId:b,listByPersonal:u,listByAll:_,parentOptionStore:j}=Le(o),n=M({goodsId:v(d.goodsId),optionId:v(d.optionId),dataOptions:v(d.dataOptions),personal:k(()=>d.list=="personal"?"personal":null),all:k(()=>d.list=="all"?"all":null)}),S=()=>{for(const p of Object.keys(n))if(n[p])return p},a=M({sourceRunnedLoader:S(),sourceValue:n[S()],dataOptions:[],statusLoading:s(S()),loader:null,parentOption:null}),A={goodsId(p=!0){i({source:"goodsId",value:a.sourceValue,forceLoad:p}),a.statusLoading=s("goodsId"),a.dataOptions=c},optionId(p=!0){i({source:"optionId",value:a.sourceValue,forceLoad:p}),a.statusLoading=s("optionId"),a.dataOptions=b},personal(p=!1){i({source:"personal",forceLoad:p}),a.statusLoading=s("personal"),a.dataOptions=u},all(p=!1){i({source:"all",forceLoad:p}),a.statusLoading=s("all"),a.dataOptions=_},dataOptions(){a.statusLoading=!1,a.dataOptions=d.dataOptions}};if(a.loader=k(()=>A[a.sourceRunnedLoader]),a.loader(),typeof a.loader!="function")throw console.log(a.loader,a.sourceRunLoader),new Error("Error run loader state.loader",a.loader);const D=d.test,F=v(null),N=v({});D&&!d.isRecursive&&(F.value=ae(async()=>{const p=await J(()=>import("./GoodsOptionListTest.a1e743de.js"),["assets/GoodsOptionListTest.a1e743de.js","assets/FormTestSetting.bf7644c3.js","assets/FormControl.ec8216db.js","assets/vue.m.26e38986.js","assets/adminApp.8b98ecb1.js","assets/adminApp.b7aba8ef.css","assets/index.fb2d0054.js","assets/Api.4fdb4a26.js","assets/FormCheckRadioPicker.80cd8c70.js","assets/testComponentStore.e44842cd.js"]),{useTestComponentStore:f}=await J(()=>import("./testComponentStore.e44842cd.js"),["assets/testComponentStore.e44842cd.js","assets/adminApp.8b98ecb1.js","assets/vue.m.26e38986.js","assets/adminApp.b7aba8ef.css"]);return N.value=f(),N.value.setStateComponent(a),p}));const E=v(""),V=v(!1),U=k(()=>{var f,l,t;return{goodsId:`\u0442\u043E\u0432\u0430\u0440\u0430 ${(f=o.goodsData)==null?void 0:f.name}`,optionId:`\u0433\u0440\u0443\u043F\u043F\u044B ${(l=d.parentOption)==null?void 0:l.name}`,dataOptions:`\u0433\u0440\u0443\u043F\u043F\u044B ${(t=d.parentOption)==null?void 0:t.name}`,personal:"\u043B\u0438\u0447\u043D\u044B\u0435",all:"\u0432\u0441\u0435"}[a.sourceRunnedLoader]}),w=()=>{a.loader(!0)},$=k(()=>{var f;let p="\u0421\u043E\u0437\u0434\u0430\u0442\u044C \u043E\u043F\u0446\u0438\u044E";return d.parentOption?p+=` \u0432 \u0433\u0440\u0443\u043F\u043F\u0435 ${d.parentOption.name}`:d.goodsId&&(p+=` \u043A \u0442\u043E\u0432\u0430\u0440\u0443 ${(f=o.goodsData)==null?void 0:f.name}`),p}),g=k(()=>a.dataOptions.length),G=(p,f=!1)=>{const l={up:!1,down:!1};p.sortpos==0&&!f?l.down=!0:p.sortpos>0&&!f?(l.up=!0,l.down=!0):p.sortpos>0&&f&&(l.up=!0),p.sortParams=l},C=(p,f)=>{["goodsId","dataOptions"].includes(p)&&f.length&&a.dataOptions.forEach((t,h)=>G(t,t.sortpos==g.value-1))};C(a.sourceRunnedLoader,a.dataOptions);const W=()=>{C(a.sourceRunnedLoader,a.dataOptions)};return pe(()=>a.dataOptions,p=>{C(a.sourceRunnedLoader,p)}),(p,f)=>{var l;return r(),I(H,null,[(r(),B(ne(F.value),{keyForm:"gov_goods_option_list"})),m(ee,{empty:!a.dataOptions.length,loader:a.statusLoading,title:E.value,"empty-message":e.emptyMessage},{default:L(()=>[x("h3",Re,[z("\u0421\u043F\u0438\u0441\u043E\u043A \u043E\u043F\u0446\u0438\u0439 "),x("span",Pe,T(O(U)),1)]),(r(!0),I(H,null,ce(a.dataOptions,t=>(r(),B(Ee,{key:t.id,option:t,openedGoods:e.openedGoods,class:"-mx-6 last:border-b-0",onSorted:f[0]||(f[0]=h=>(a.loader(!0),W()))},null,8,["option","openedGoods"]))),128))]),_:1},8,["empty","loader","title","empty-message"]),V.value?(r(),B(de,{key:0,"option-id":e.optionId,"goods-id":e.goodsId,"parent-option-data":(l=O(j))==null?void 0:l.option,buttonCloseForm:"",onCloseForm:f[1]||(f[1]=t=>V.value=!1),onCreated:w},null,8,["option-id","goods-id","parent-option-data"])):y("",!0),e.buttonCreate&&!V.value?(r(),B(Q,{key:1,color:"success",label:O($),icon:O($e),onClick:f[2]||(f[2]=q(t=>V.value=!V.value,["prevent"])),class:"w-min mt-2"},null,8,["label","icon"])):y("",!0)],64)}}},Te={key:0,class:"mb-2 text-teal-500"},Fe={class:"flex justify-between"},de={__name:"GoodsOptionForm",props:{goodsId:{default:0},optionId:{default:0},parentOptionData:{type:Object,default:()=>{}},optionData:Object,type:{default:"option"},mode:{default:"create"},test:{type:Boolean,default:!1},buttonCloseForm:{type:Boolean,default:!1},showChildOptonList:{type:Boolean,default:!0}},emits:["created","close-form"],setup(e,{emit:d}){const o=e,i=v(!!o.optionId),s=v(o.type),c=v(o.mode),b=v(o.goodsId),u=v(o.optionId),_=(l,t)=>{c.value=l,t&&(s.value=t)},j=k(()=>c.value=="update"),n=M({goods_id:b,option_id:u,parent_id:u,mode:c,group:0,group_variant:"checkbox",name:null,description:null,price_type:"single",price:0,note:null,goods_type:"common"});o.optionData&&(u.value=o.optionData.id,["name","description","price_type","price","note","group","goods_type","group_variant","note","hidden"].forEach(t=>{n[t]=o.optionData[t]}));const S={0:"\u041E\u0434\u0438\u043D\u043E\u0447\u043D\u0430\u044F",1:"\u0413\u0440\u0443\u043F\u043F\u0430 \u043E\u043F\u0446\u0438\u0439"},a={checkbox:"\u041C\u043D\u043E\u0436\u0435\u0441\u0442\u0432\u0435\u043D\u043D\u044B\u0439 \u0432\u044B\u0431\u043E\u0440",radio:"\u0412\u0430\u0440\u0438\u0430\u0442\u0438\u0432\u043D\u044B\u0439 \u0432\u044B\u0431\u043E\u0440"},A={goods:"\u0426\u0435\u043D\u0430 \u0442\u043E\u0432\u0430\u0440\u0430",single:"\u0414\u043E\u043F\u043E\u043B\u043D\u0438\u0442\u0435\u043B\u044C\u043D\u0430\u044F \u0441\u0443\u043C\u043C\u0430 \u043A \u0441\u0442\u043E\u0438\u043C\u043E\u0441\u0442\u0438 \u0442\u043E\u0432\u0430\u0440\u0430"},D=k(()=>n.group==1),F=k(()=>c.value=="create"?"\u0421\u043E\u0437\u0434\u0430\u0442\u044C":"\u0421\u043E\u0445\u0440\u0430\u043D\u0438\u0442\u044C"),N={option:"\u043E\u043F\u0446\u0438\u0438",group:"\u0433\u0440\u0443\u043F\u043F\u044B"},E=M({name:k(()=>`\u0418\u043C\u044F ${N[s.value]}`),description:k(()=>`\u041E\u043F\u0438\u0441\u0430\u043D\u0438\u0435 ${N[s.value]}`)}),V=v(null),U=v(!1),w=v(null),$=()=>{U.value=!0,K("goods/option/store","post",n).setLoader(U).setErrors(V).success(l=>{l!=null&&l.option_id?(w.value="\u041E\u043F\u0446\u0438\u044F \u0443\u0441\u043F\u0435\u0448\u043D\u043E \u0441\u043E\u0437\u0434\u0430\u043D\u0430",n.group&&(w.value+=" , \u0432\u044B \u043C\u043E\u0436\u0435\u0442\u0435 \u043F\u0435\u0440\u0435\u0439\u0442\u0438 \u043A \u0441\u043E\u0437\u0434\u0430\u043D\u0438\u044E \u043E\u043F\u0446\u0438\u0439 \u0432 \u0433\u0440\u0443\u043F\u043F\u0435")):w.value="\u041E\u043F\u0446\u0438\u044F \u0443\u0441\u043F\u0435\u0448\u043D\u043E \u0441\u043E\u0445\u0440\u0430\u043D\u0435\u043D\u0430",l!=null&&l.option_id&&(u.value=l.option_id),_("update"),d("created")}).run()},g=k(()=>{const l={create:"\u0421\u043E\u0437\u0434\u0430\u043D\u0438\u0435",update:"\u0420\u0435\u0434\u0430\u043A\u0442\u0438\u0440\u043E\u0432\u0430\u043D\u0438\u0435",option:"\u043E\u043F\u0446\u0438\u0438",group:"\u0433\u0440\u0443\u043F\u043F\u044B"};return`${k(()=>c.value=="update"?`#${u.value} `:"").value}${l[c.value]} ${l[s.value]}`}),G=k({get:()=>Number(n.group),set:l=>{n.group=Number(l),n.group==1?_(c.value,"group"):_(c.value,"option")}}),C=()=>{var t;const l=oe();n.goods_type=(t=l.goodsData)==null?void 0:t.goods_type};c.value=="create"&&C();const W=o.test,p=v(null),f=v({});return W&&(p.value=ae(async()=>{const l=await J(()=>import("./GoodsOptionFormTest.0d8e61aa.js"),["assets/GoodsOptionFormTest.0d8e61aa.js","assets/FormTestSetting.bf7644c3.js","assets/FormControl.ec8216db.js","assets/vue.m.26e38986.js","assets/adminApp.8b98ecb1.js","assets/adminApp.b7aba8ef.css","assets/index.fb2d0054.js","assets/Api.4fdb4a26.js","assets/FormCheckRadioPicker.80cd8c70.js","assets/testComponentStore.e44842cd.js"]),{useTestComponentStore:t}=await J(()=>import("./testComponentStore.e44842cd.js"),["assets/testComponentStore.e44842cd.js","assets/adminApp.8b98ecb1.js","assets/vue.m.26e38986.js","assets/adminApp.b7aba8ef.css"]);return f.value=t(),f.value.setStateComponent(M({form:n,switchMode:_})),l})),(l,t)=>(r(),I(H,null,[(r(),B(ne(p.value),{keyForm:"gov_goods_option_form"})),m(ee,fe({title:O(g),form:"",onSubmit:q($,["prevent"])},l.$attrs),{default:L(()=>[i.value&&e.parentOptionData?(r(),I("div",Te," \u0421\u043E\u0437\u0434\u0430\u043D\u0438\u0435 \u043E\u043F\u0446\u0438\u0438 \u0432 \u0433\u0440\u0443\u043F\u043F\u0435 "+T(e.parentOptionData.name),1)):y("",!0),!i.value&&!e.optionData?(r(),B(P,{key:1,label:"\u0422\u0438\u043F \u043E\u043F\u0446\u0438\u0438"},{default:L(()=>[m(X,{modelValue:O(G),"onUpdate:modelValue":t[0]||(t[0]=h=>me(G)?G.value=h:null),name:"group",type:"radio",options:S},null,8,["modelValue"])]),_:1})):y("",!0),O(D)?(r(),B(P,{key:2,label:"\u0422\u0438\u043F \u043E\u043F\u0446\u0438\u0439 \u0432 \u0433\u0440\u0443\u043F\u043F\u0435"},{default:L(()=>[m(X,{modelValue:n.group_variant,"onUpdate:modelValue":t[1]||(t[1]=h=>n.group_variant=h),name:"group_variant",type:"radio",options:a},null,8,["modelValue"])]),_:1})):y("",!0),m(P,{label:E.name},{default:L(()=>[m(Y,{placeholder:E.name,modelValue:n.name,"onUpdate:modelValue":t[2]||(t[2]=h=>n.name=h)},null,8,["placeholder","modelValue"])]),_:1},8,["label"]),m(P,{label:"\u0412\u043D\u0443\u0442\u0440\u0438\u043D\u043D\u044F\u044F \u0437\u0430\u043C\u0435\u0442\u043A\u0430"},{default:L(()=>[m(Y,{placeholder:"\u0417\u0430\u043C\u0435\u0442\u043A\u0430 \u0434\u043B\u044F \u0430\u0434\u043C\u0438\u043D\u043E\u0432",modelValue:n.note,"onUpdate:modelValue":t[3]||(t[3]=h=>n.note=h)},null,8,["modelValue"])]),_:1}),m(P,{label:E.description},{default:L(()=>[m(Y,{type:"textarea",placeholder:E.description,modelValue:n.description,"onUpdate:modelValue":t[4]||(t[4]=h=>n.description=h),class:"resize"},null,8,["placeholder","modelValue"])]),_:1},8,["label"]),m(P,{label:"\u0423\u0441\u0442\u0430\u043D\u043E\u0432\u043A\u0430 \u0446\u0435\u043D\u044B \u043D\u0430 \u0442\u043E\u0432\u0430\u0440"},{default:L(()=>[m(X,{modelValue:n.price_type,"onUpdate:modelValue":t[5]||(t[5]=h=>n.price_type=h),name:"form.price_type",type:"radio",options:A},null,8,["modelValue"])]),_:1}),O(D)?y("",!0):(r(),B(P,{key:3,label:"\u0421\u0443\u043C\u043C\u0430"},{default:L(()=>[m(Y,{modelValue:n.price,"onUpdate:modelValue":t[6]||(t[6]=h=>n.price=h),placeholder:"100.00"},null,8,["modelValue"])]),_:1})),m(P,{label:"\u0422\u0438\u043F \u0442\u043E\u0432\u0430\u0440\u0430"},{default:L(()=>[m(Y,{modelValue:n.goods_type,"onUpdate:modelValue":t[7]||(t[7]=h=>n.goods_type=h),options:O(ge),loader:O(ye)},null,8,["modelValue","options","loader"])]),_:1}),m(he,{model:"goodsoption",model_id:u.value,label:"\u0417\u0430\u0433\u0440\u0443\u0437\u0438\u0442\u044C \u0438\u0437\u043E\u0431\u0440\u0430\u0436\u0435\u043D\u0438\u044F"},null,8,["model_id"]),V.value?(r(),B(le,{key:4,errors:V.value},null,8,["errors"])):y("",!0),w.value?(r(),B(ve,{key:5,color:"success",timeout:"5000"},{default:L(()=>[z(T(w.value),1)]),_:1})):y("",!0),x("div",Fe,[m(Q,{type:"submit",color:"success",label:O(F),loader:U.value},null,8,["label","loader"]),e.buttonCloseForm?(r(),B(Q,{key:0,type:"button",color:"danger",label:"\u041E\u0442\u043C\u0435\u043D\u0430",onClick:t[8]||(t[8]=q(h=>l.$emit("close-form"),["prevent"]))})):y("",!0)])]),_:1},16,["title","onSubmit"]),O(j)&&n.group&&e.showChildOptonList?(r(),B(re,{key:0,"option-id":u.value,"empty-message":`\u0412 \u0433\u0440\u0443\u043F\u043F\u0435 ${n.name} \u0435\u0449\u0451 \u043D\u0435\u0442 \u043E\u043F\u0446\u0438\u0439`,"parent-option":n,"button-create":""},null,8,["option-id","empty-message","parent-option"])):y("",!0)],64))}};export{re as _,de as a};