function openModal(id){
    console.log('this is id ' + id)
    const open = document.querySelector('#open')
    open.style.display = 'block'
    const afiche = document.querySelector('#afiche')
    afiche.style.zIndex =  '1'
}





function closeModal(){
    const open = document.querySelector('#open')
    open.style.display = 'none'
    const afiche = document.querySelector('#afiche')
    afiche.style.zIndex =  '-1'
}