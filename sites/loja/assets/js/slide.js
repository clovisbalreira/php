'use strict'
const slideWrapper = document.querySelector('[data-slide="wrapper"]')
const slideList = document.querySelector('[data-slide="list"]')
const navPreviousButton = document.querySelector('[data-slide="nav-previous-button"]')
const navNextButton = document.querySelector('[data-slide="nav-next-button"]')
const controlsWrapper = document.querySelector('[data-slide="controls-wrapper"]')
let slideItems = document.querySelectorAll('[data-slide="item"]')
let controlButtons
let slideInterval

const state = {
    startPoint:0,
    savePosition:0,
    currentPoint:0,
    moviment:0,
    currentSlideIndex:0,
    autoPlay: true,
    timeInterval: 3000
}


function translateSlide({position}){
    state.savePosition = position
    slideList.style.transform = `translateX(${position}px)`
}


function getCenterPosition({index}){
    const slideItem = slideItems[index]
    const slideWidth = slideItem.clientWidth
    const windowWidth = document.body.clientWidth
    const margin = (windowWidth - slideWidth) / 2
    const position = margin - ( index * slideWidth )
    return position
}


function setVisibleSlide({index, animate}){
    if(index === 0 || index === slideItems.length){
        index = state.currentSlideIndex
    }
    const position = getCenterPosition({index:index})
    state.currentSlideIndex = index
    slideList.style.transition = animate === true ? 'transform 1s' : 'none'
    activeControlButton({index:index})
    translateSlide({position:position})
}


function nextSlide(){
    setVisibleSlide({index : state.currentSlideIndex + 1, animate : true})
}


function previousSlide(){
    setVisibleSlide({index : state.currentSlideIndex - 1, animate : true})
}

function createSlideClones(){
    const firstSlide = slideItems[0].cloneNode(true)
    firstSlide.classList.add('slide-cloned')
    firstSlide.dataset.index = slideItems.length
    const secondSlide = slideItems[1].cloneNode(true)
    secondSlide.classList.add('slide-cloned')
    secondSlide.dataset.index = slideItems.length + 1
    const lastSlide = slideItems[slideItems.length - 1].cloneNode(true)
    lastSlide.classList.add('slide-cloned')
    lastSlide.dataset.index = -1
    const penultimateSlide = slideItems[slideItems.length - 2].cloneNode(true)
    penultimateSlide.classList.add('slide-cloned')
    penultimateSlide.dataset.index = -2

    slideList.append(firstSlide)
    slideList.append(secondSlide)
    slideList.prepend(lastSlide)
    slideList.prepend(penultimateSlide)

    slideItems = document.querySelectorAll('[data-slide="item"]')
}

function createControlButtons(){
    slideItems.forEach(function(){
        const controlButton = document.createElement('button')
        controlButton.classList.add('slide-control-button')
        controlButton.dataset.slide = 'control-button'
        const ionIcon = document.createElement('ion-icon')
        ionIcon.setAttribute('name', 'ellipse')
        controlButton.appendChild(ionIcon)
        controlsWrapper.append(controlButton)
    })
}


function activeControlButton({index}){
    const slideItem = slideItems[index]
    const dataIndex = Number(slideItem.dataset.index)
    const controlButton = controlButtons[dataIndex]
    controlButtons.forEach( function(controlButtonItem){
        controlButtonItem.classList.remove('active')
    })
    if(controlButton) controlButton.classList.add('active')
}


function onMouseDown(event, index){
    const slideItem = event.currentTarget
    state.startPoint = event.clientX
    state.currentPoint = event.clientX - state.savePosition
    state.currentSlideIndex = index
    slideList.style.transition = 'none'
    slideItem.addEventListener('mousemove', onMouseMove)
}


function onMouseMove(event){
    state.moviment = event.clientX - state.startPoint
    const position = event.clientX - state.currentPoint
    translateSlide({position:position})
}

function onMouseUp(event){
    const pointsToMove = event.type.includes('touch') ? 50 : 150
    const slideItem = event.currentTarget
    if(state.moviment < -pointsToMove){
        nextSlide()
    }else if(state.moviment > pointsToMove){
        previousSlide()
    }else{
        setVisibleSlide({index : state.currentSlideIndex, animate : true })
    }
    slideItem.removeEventListener('mousemove', onMouseMove)
}

function onTouchStart(event, index){
    event.clientX = event.touches[0].clientX
    onMouseDown(event,index)
    const slideItem = event.currentTarget
    slideItem.addEventListener('touchmove', onMouseMove)
}

function onTouchMove(event){
    event.clientX = event.touches[0].clientX
    onMouseMove(event)
}

function onTouchEnd(event){
    onMouseUp(event)
    const slideItem = event.currentTarget
    slideItem.removeEventListener('touchmove', onMouseMove)
}

function onControlButtonClick(index){
    setVisibleSlide({index:index + 2, animate : true})
}


function onSlideListTrasitionEnd(){
    const slideItem = slideItems[state.currentSlideIndex]

    if(slideItem.classList.contains('slide-cloned') && Number(slideItem.dataset.index) > 0){
        setVisibleSlide({index:2, animate : false})
    }
    if(slideItem.classList.contains('slide-cloned') && Number(slideItem.dataset.index) < 0){
        setVisibleSlide({index:slideItems.length - 3, animate : false})
    }
}

function setAutoPlay(){
    if(state.autoPlay){
        slideInterval = setInterval(function(){
            setVisibleSlide({index: state.currentSlideIndex + 1, animate:true})
        }, state.timeInterval)
    }
}


function setListenet(){
    controlButtons = document.querySelectorAll('[data-slide="control-button"]')
    controlButtons.forEach(function(controlButton,index){
        controlButton.addEventListener('click', function(){
            onControlButtonClick(index)
        })
    })
    slideItems.forEach(function(slideItem, index){
        slideItem.addEventListener('dragstart', function(event){
            event.preventDefault()
        })

        slideItem.addEventListener('mousedown', function(event){    
            onMouseDown(event, index)
        })
    
        slideItem.addEventListener('mouseup', onMouseUp)
        
        slideItem.addEventListener('touchstart', function(event){
            onTouchStart(event, index)
        })
    
        slideItem.addEventListener('touchend', onTouchEnd)
    
    })
        
        navNextButton.addEventListener('click', nextSlide)
        navPreviousButton.addEventListener('click', previousSlide)
        slideList.addEventListener('transitionend', onSlideListTrasitionEnd)
        slideWrapper.addEventListener('mouseenter',function(){
            clearInterval(slideInterval)
        })
        slideWrapper.addEventListener('mouseleave',function(){
            setAutoPlay()
        })
        let resizeTimeOut
        window.addEventListener('resize', function(){
            clearTimeout(resizeTimeOut)
            resizeTimeOut = setTimeout(function(){
                setVisibleSlide({index:state.currentSlideIndex, animate: true})
            }, 1000)
        })
}

function initSlider({startAtIndex = 0, autoPlay = true, timeInterval = 3000}){
    state.autoPlay = autoPlay
    state.timeInterval = timeInterval
    //createControlButtons()
    createSlideClones()
    setListenet()
    setVisibleSlide({index:startAtIndex + 2, animate : true})
    setAutoPlay()
}