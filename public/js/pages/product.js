$('.menos').text('-')
$('.mas').text('+')

$('.toggle').click(function(e){
    e.preventDefault()
    let ancla = e.currentTarget
    if(ancla.classList.contains('category'))
    {
        let span = ancla.querySelector('span')
        if (span.classList.contains('mas')) {
            span.classList.remove('mas')
            span.classList.add('menos')
            span.textContent = '-'
        }else{
            span.classList.remove('menos')
            span.classList.add('mas')
            span.textContent = '+'
        }
    }
    $(this).siblings('ul').toggle();
})