const formulario = document.getElementById('datos')
const resultado = document.getElementById('resultado')

formulario.addEventListener('submit', (e) => {
    e.preventDefault();
    const datos = new FormData(formulario);
    //creo un json con los datos que necesito
    const dt = {
        'num1': datos.get('num1'),
        'num2': datos.get('num2'),
        'selector': datos.get('selector')
    }
    fetch('http://localhost/service/servidor.php', {
            method: 'POST',
            //transformo la variable en json
            body: JSON.stringify(dt),
            headers: {
                'Content-Type': 'application/json'
            },

        })
        .then(res => res.json())
        .then(data => {
            if (data != null) {
                resultado.innerHTML = `<div class="alert alert-warning " role="alert">
                   <P>El resultado es: ${data['datos']}</P>
                </div>`

            }
        })
})