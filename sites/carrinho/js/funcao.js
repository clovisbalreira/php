function clickMenu(){
    if(navMenu.style.display == 'block'){
        navMenu.style.display = 'none'
        idMenu.innerHTML = 'menu'
    }else{
        navMenu.style.display = 'block'
        idMenu.innerHTML = 'close'
    }
}

function fechaMenu(){
    navMenu.style.display = 'none'
    idMenu.innerHTML = 'menu'
}