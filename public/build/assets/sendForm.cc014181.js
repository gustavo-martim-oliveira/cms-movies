import{S as t}from"./sweetalert2.all.bf165dcb.js";import"./_commonjsHelpers.b8add541.js";const m="sendForm";let a=document.getElementsByClassName(m);a.length>0&&(a=Array.from(a),a.forEach(l=>{l.addEventListener("submit",o=>{o.preventDefault();let r=o.target,i=new FormData(r),f=r.method,c=r.action;var s;switch(f){case"POST":case"post":case"PUT":case"put":case"DELETE":case"delete":s=axios.post(c,i);break;default:s=axios.get(c,i);break}s.then(e=>{if(e.status===200)t.fire("Sucesso!",e.data.message,"success").then(()=>{location.reload()});else{if(e.redirect==!0)return location.href=e.redirectUrl;t.fire("Erro!",e.data.message,"error")}}).catch(e=>{e.status===500?t.fire("Erro!","Erro ao processar requisi\xE7\xE3o!","error"):t.fire("Erro!",e.response.data.message,"error")})})}));