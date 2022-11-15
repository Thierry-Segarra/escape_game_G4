var mousePosition;
var div;

var isDown = false;

function randomIntFromInterval(min, max) {
    return Math.floor(Math.random() * (max - min + 1) + min)
  }

function changeDocument(){
    var item_elem = document.getElementsByClassName('item');
for (var i = 0; i < item_elem.length; ++i) {
    var item = item_elem[i];  
    skin = randomIntFromInterval(1,6);
    item.style.backgroundImage = "url(images/document_" + skin + ".png)"
}
}

// Drag and drop //

document.addEventListener('mousedown', function(e) {
    isDown = true;
    if (document.elementFromPoint(e.clientX, e.clientY).className === "item"){
        div = document.elementFromPoint(e.clientX, e.clientY)
        div.style.zIndex = 0;
        div.style.position = "absolute";
    }
}, true);

document.addEventListener('mouseup', function(e) {
    isDown = false;
    if ((document.elementFromPoint(e.clientX, e.clientY).classList.contains('box')) && div!=null){
        box = document.elementFromPoint(e.clientX, e.clientY);
        div.style.zIndex = 2;

        box.prepend(div);
        div.style.position = "static";
        div = null;
    }
}, true);

document.addEventListener('mousemove', function(event) {
    event.preventDefault();
    if (isDown && (div != null)) {
        mousePosition = {

            x : event.clientX,
            y : event.clientY

        };
        div.style.left = (mousePosition.x + 10) + 'px';
        div.style.top  = (mousePosition.y + 10) + 'px';
    }
}, true);

// Verification des taches //

function verification(){
    box_1 = document.getElementById('box_1')
    item_1 = document.getElementById('item_1')

    if (box_1.contains(item_1)){
        console.log("oui!")
    }
}

function textTerminal(){

}