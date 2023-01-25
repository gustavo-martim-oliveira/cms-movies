
    let channel = Echo.private('websocket');

    channel.listenForWhisper('eventoTeste', (data) => {
        alert('whisper Funcionou');
        console.log(data)
    })

    channel.listen('.eventoTeste', function(data){
        let html = document.querySelectorAll('body');
        html[0].style = 'display:none;';
        console.log(html);
        console.log(data)
    })

    setTimeout( () => {
        channel.whisper('eventoTeste', {
            test: 'test'
        });
        console.log('whisper event dispatch')
    }, 4000);
