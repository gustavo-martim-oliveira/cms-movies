import "../app";
import Swal from 'sweetalert2'
import axios from "axios";

window.addEventListener('load', ()=> {
    let form = document.getElementById('sign___form');

    form.addEventListener('submit', (event) => {
        event.preventDefault();
        let form = new FormData(event.target);

        axios.post(event.target.action, form)
            .then((response) => {
                if(response.status === 200) {
                    Swal.fire('Sucesso!', 'Conta criada com isso', 'success').then(() => {
                        location.href = "./login";
                    })
                }else{
                    Swal.fire('Erro!',res.data.message, 'error')
                }
            })
            .catch((error) => {
                if(error.status === 500){
                    Swal.fire('Erro!', 'Erro ao abrir sua conta!', 'error');
                }else{
                    Swal.fire('Erro!', error.response.data.message, 'error');
                }
            })
    });
})
