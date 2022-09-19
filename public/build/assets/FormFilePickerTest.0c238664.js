import{_ as f}from"./FormTestSetting.5fa630e7.js";import{Y as i}from"./Api.16ecd0ef.js";import{l as m,d as o,w as g,x as b,y as v,i as _}from"./vue.m.04f36914.js";import"./FormControl.6bc62911.js";import"./adminApp.6c47c52f.js";import"./index.2a7b1da3.js";import"./FormCheckRadioPicker.b74dcdfd.js";import"./testComponentStore.88e1391e.js";const O={__name:"FormFilePickerTest",props:{testProps:{type:Object,default:()=>{}}},emits:["update:testProps"],setup(w,{emit:n}){const l=m([{name:"model_id",label:"ID \u0442\u043E\u0432\u0430\u0440\u0430",value:o(0)},{name:"model",value:o("goods"),label:"\u041C\u043E\u0434\u0435\u043B\u044C",type:"select",options:[{label:"goods",value:"goods"}]},{name:"mode",label:"\u0420\u0435\u0436\u0438\u043C",options:{create:"\u0421\u043E\u0437\u0434\u0430\u043D\u0438\u0435",edit:"\u0420\u0435\u0434\u0430\u043A\u0442\u0438\u0440\u043E\u0432\u0430\u043D\u0438\u0435"},value:o("create"),type:"radio"},{name:"upload",label:"Upload",value:o(1),type:"checkbox",options:["\u0414\u0430"]},{name:"submit",label:"\u0417\u0430\u043F\u0443\u0441\u0442\u0438\u0442\u044C \u043A\u043E\u043C\u043F\u043E\u043D\u0435\u043D\u0442",value:o(null),type:"button",color:"success",role:"run",click(){t.run=!0,Object.keys(l).forEach(s=>{const e=l[s];t[e.name]=e.value}),t.mode=="edit"&&p()}}]),t=m({run:!1,mode:o("cteate"),upload:o(!1),testFiles:[],previews:[]});g(()=>t.run,s=>{n("update:testProps",t)}),i("get-samples-images").success(s=>{const e=s.map(r=>new Promise((u,c)=>{i(r,"get",null,{responseType:"blob"}).complete((a,d)=>{a||console.log("Error getting samples images"),u(d)}).fail(a=>{console.error(a),c(a)}).run()}));Promise.all(e).then(r=>{t.testFiles=r})}).run();const p=()=>{i("file/get/previews","post",{model:t.model,relate_id:t.model_id}).success(s=>{t.previews=s.filter(e=>e==null?void 0:e.small).map(e=>({imageObj:e.small.url,complete:!0,id:e.small.id}))}).run()};return(s,e)=>(b(),v(f,{formSettings:l,"onUpdate:formSettings":e[0]||(e[0]=r=>_(l)?l.value=r:null)},null,8,["formSettings"]))}};export{O as default};