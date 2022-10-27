$('#category_id').change(function(e){
    let selectCategory = e.currentTarget
    let form = selectCategory.closest('form')
    let products
    let product_id = document.getElementById('product_id')
    
    if (selectCategory.value > 0) {
        axios.get(`${form.dataset.url}/${selectCategory.value}`)
        .then(r => {
            products = r.data.products.map( element => {
                return `<option value="${element.id}">${element.name}</option>`
                })	

            product_id.innerHTML = products
        })
        .catch( e => console.error(new Error(e)))
        form.querySelector('form button').removeAttribute('disabled')			
    } else {
        product_id.innerHTML = '<option>seleccione un poructo</option>'
        form.querySelector('form button').setAttribute('disabled', 'true')	
    }
    
})