import{a as o,S as r}from"./sweetalert2.all.70f218b5.js";window.addEventListener("load",()=>{document.getElementById("sign___form").addEventListener("submit",a=>{a.preventDefault();let t=new FormData(a.target);o.post(a.target.action,t).then(e=>{e.status===200?r.fire("Sucesso!","Conta criada com isso","success").then(()=>{location.href="./login"}):r.fire("Erro!",res.data.message,"error")}).catch(e=>{e.status===500?r.fire("Erro!","Erro ao abrir sua conta!","error"):r.fire("Erro!",e.response.data.message,"error")})})});
