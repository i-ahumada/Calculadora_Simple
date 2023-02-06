let calcButtons = document.getElementsByClassName('calc-button');
let calcDisplay = document.getElementById('display');
let clear = document.getElementById('clear');
let clearEverything = document.getElementById('clear-everything');
let calcButtonsObjectArray = [];

function addToDisplay(buttonElement) {
    buttonElement.addEventListener('click', ()=> {
        calcDisplay.innerHTML += buttonElement.value;
    })
}

for(i=0; i < calcButtons.length; i++) {
    addToDisplay(calcButtons[i]);
}

clear.addEventListener('click', ()=> {
    calcDisplay.innerHTML = calcDisplay.innerHTML.slice(0, -1);
})

clearEverything.addEventListener('click', ()=> {
    calcDisplay.innerHTML = '';
})