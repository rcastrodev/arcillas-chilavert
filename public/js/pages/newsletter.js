let forNewsLetter = document.getElementById('formNewsletter')
async function storeNewsLetter(e){
    e.preventDefault()
    let form = e.currentTarget
    let formData = new FormData(form)
    let btn = form.querySelector('button')

    try {
        let result = await axios.post(form.getAttribute('action'), formData)
        
        if(btn)
            btn.classList.add('btn-success')

        setTimeout(() => {
            form.reset()
            btn.classList.remove('btn-success')
        }, 2000);
    
    } catch (error) {
        if(btn)
            btn.classList.add('btn-warning')

        setTimeout(() => {
            form.reset()
            btn.classList.remove('btn-warning')
        }, 2000);
    }
    
}
forNewsLetter.addEventListener('submit', storeNewsLetter)