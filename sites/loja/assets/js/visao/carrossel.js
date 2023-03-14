var divList = document.querySelector('[data-slide="list"]')
var index = 0

carrosseis.forEach( carrossel => {
    divItem = document.createElement('div')
    divItem.classList.add('slide-item')
    divItem.dataset.slide = 'item'
    divItem.dataset.index = index
    divList.appendChild(divItem)
    divContent = document.createElement('div')
    divContent.classList.add('slide-content')
    divItem.appendChild(divContent)
    img = document.createElement('img')
    img.classList.add('slide-image')
    img.setAttribute('src', './assets/imagens/carrossel/' + carrossel.imagem)
    img.setAttribute('alt', carrossel.descricao)
    divContent.appendChild(img)
    //divDescricao = document.createElement('div')
    //divDescricao.classList.add('slide-description')
    //h3 = document.createElement('h3')
    //h3.innerHTML = carrossel.nome
    //divDescricao.appendChild(h3)
    //p = document.createElement('p')
    //p.innerHTML = carrossel.descricao
    //divDescricao.appendChild(p)
    //divContent.appendChild(divDescricao)
    index++
});
