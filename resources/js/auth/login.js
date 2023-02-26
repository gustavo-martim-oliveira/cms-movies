import Swal from 'sweetalert2'

window.addEventListener('load', ()=> {
    let form = document.getElementById('sign___form');

    form.addEventListener('submit', (e) => {
        e.preventDefault()
        form = new FormData(e.target)

        axios.post(e.target.action, form)
            .then( res => {
                if(res.status === 200) {

                    if(typeof res.data.redirect != 'undefined'){
                        location.href = res.data.redirect
                    }else{
                        location.href = "./";
                    }

                }else{
                    Swal.fire('Erro!',res.data.message, 'error')
                }
            })
            .catch(error => {
                if(error.status === 401){
                    Swal.fire('Erro!', 'Dados de login incorretos, tente novamente!', 'error');
                }else{
                    Swal.fire('Erro!', error.response.data.message, 'error');
                }
            })

    }, false)

})
