/**
 * Generic form Script
 */
import Swal from 'sweetalert2'
const formClass = 'sendForm';

let forms = document.getElementsByClassName(formClass);
if(forms.length > 0) {
    forms = Array.from(forms);
    forms.forEach(element => {
        element.addEventListener('submit', (e) => {
            e.preventDefault();
            let form = e.target;
            let fData = new FormData(form);
            let __method = form.method;
            let __action = form.action;
            var __axios;
            switch(__method){
                case "POST":
                case "post":
                case "PUT":
                case "put":
                case "DELETE":
                case "delete":
                        __axios = axios.post(__action, fData);
                    break;

                default:
                        __axios = axios.get(__action, fData);
                    break;
            }

            __axios
            .then((response) => {
                if(response.status === 200) {
                    Swal.fire('Sucesso!', response.data.message, 'success')
                        .then(() => {
                            location.reload();
                        })
                }else{
                    if(response.redirect == true){
                        return location.href = response.redirectUrl;
                    }
                    Swal.fire('Erro!', response.data.message, 'error')
                }
            })
            .catch((error) => {
                if(error.status === 500){
                    Swal.fire('Erro!', 'Erro ao processar requisição!', 'error');
                }else{
                    Swal.fire('Erro!', error.response.data.message, 'error');
                }
            });
        });
    });
}
