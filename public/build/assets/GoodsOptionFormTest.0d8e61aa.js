import{_ as a}from"./FormTestSetting.bf7644c3.js";import{Y as m}from"./Api.4fdb4a26.js";import{useTestComponentStore as l}from"./testComponentStore.e44842cd.js";import{d as s,x as u,y as c,B as d,i as f}from"./vue.m.26e38986.js";import"./FormControl.ec8216db.js";import"./adminApp.8b98ecb1.js";import"./index.fb2d0054.js";import"./FormCheckRadioPicker.80cd8c70.js";const O={__name:"GoodsOptionFormTest",props:{keyForm:String},setup(r){const o=l(),i=[{name:"mode",label:"\u0420\u0435\u0436\u0438\u043C",type:"radio",options:{create:"create",update:"update"},value:s("create")},{name:"typeOption",label:"\u0422\u0438\u043F \u043E\u043F\u0446\u0438\u0438",type:"radio",options:{option:"\u041E\u043F\u0446\u0438\u044F",group:"\u0413\u0440\u0443\u043F\u043F\u0430"},value:s("option")},{label:"ID \u043E\u043F\u0446\u0438\u0438",name:"optionId",value:s(0)},{name:"submit",type:"button",label:"\u0417\u0430\u043F\u0443\u0441\u043A",role:"run",value:s(0),color:"success",click:e=>{e.mode.value=="update"?m("goods/option/get/first","post",{id:e.optionId.value}).success(t=>{t.option_id=t.id,Object.assign(o.stateComponent.form,t),o.stateComponent.switchMode(e.mode.value,e.typeOption.value)}).run():o.stateComponent.switchMode(e.mode.value,e.typeOption.value)}}];o.setForm(i);const n=o.formSettings;return(e,t)=>(u(),c(a,{formSettings:d(n),"onUpdate:formSettings":t[0]||(t[0]=p=>f(n)?n.value=p:null),keyForm:r.keyForm},null,8,["formSettings","keyForm"]))}};export{O as default};