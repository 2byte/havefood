import{v as u,s as f,x as a,y as _,z as s,A as i,B as e,H as p,G as h,Q as g,C as o,D as y,L as v,E as x,F as n}from"./vue.m.04f36914.js";import{_ as b}from"./Button.3b2230b3.js";import{_ as k}from"./Guest.15fffddb.js";import"./ApplicationLogo.38fdf88c.js";import"./_plugin-vue_export-helper.cdc0426e.js";const w=o("div",{class:"mb-4 text-sm text-gray-600"}," Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another. ",-1),V={key:0,class:"mb-4 font-medium text-sm text-green-600"},B=["onSubmit"],E={class:"mt-4 flex items-center justify-between"},C=n(" Resend Verification Email "),L=n("Log Out"),H={__name:"VerifyEmail",props:{status:String},setup(r){const c=r,t=u(),d=()=>{t.post(route("verification.send"))},l=f(()=>c.status==="verification-link-sent");return(m,N)=>(a(),_(k,null,{default:s(()=>[i(e(p),{title:"Email Verification"}),w,e(l)?(a(),h("div",V," A new verification link has been sent to the email address you provided during registration. ")):g("",!0),o("form",{onSubmit:x(d,["prevent"])},[o("div",E,[i(b,{class:y({"opacity-25":e(t).processing}),disabled:e(t).processing},{default:s(()=>[C]),_:1},8,["class","disabled"]),i(e(v),{href:m.route("logout"),method:"post",as:"button",class:"underline text-sm text-gray-600 hover:text-gray-900"},{default:s(()=>[L]),_:1},8,["href"])])],40,B)]),_:1}))}};export{H as default};
