import{x as a,G as t,D as o}from"./vue.m.04f36914.js";import{d as i}from"./adminApp.a00db8f6.js";import{Y as l}from"./Api.67876f72.js";const m={__name:"BaseDivider",props:{navBar:Boolean},setup(r){const e=r;return(s,n)=>(a(),t("hr",{class:o([e.navBar?"hidden lg:block lg:my-0.5 dark:border-gray-700":"my-6 -mx-6 dark:border-gray-800","border-t border-gray-100"])},null,2))}},f=i("categories",{state:()=>({listCategories:[],category:null,loading:!0,error:null}),actions:{async fetchAllCategories(r=!1){if(!r&&this.listCategories.length>0)return this.loading&&(this.loading=!1),Promise.resolve();await l("categories").complete((e,s)=>{this.loading=!1,e&&(this.listCategories=s)}).fail(e=>{this.error=e,alert(e)}).run()},removeById(r){this.listCategories.forEach((e,s)=>{e.id==r&&this.listCategories.splice(s,1)})}}});export{m as _,f as u};
