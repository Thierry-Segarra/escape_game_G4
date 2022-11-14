var mousePosition;
var offset = [0,0];

var isDown = false;

div = document.getElementById("item");

div.addEventListener('mousedown', function(e) {
    isDown = true;
    div.style.position = "absolute";
    offset = [
        div.offsetLeft - e.clientX,
        div.offsetTop - e.clientY
    ];


    //if
}, true);

document.addEventListener('mouseup', function() {
    isDown = false;
}, true);

document.addEventListener('mousemove', function(event) {
    event.preventDefault();
    if (isDown) {
        mousePosition = {

            x : event.clientX,
            y : event.clientY

        };
        div.style.left = (mousePosition.x + offset[0]) + 'px';
        div.style.top  = (mousePosition.y + offset[1]) + 'px';

        var rect = document.getBoundingClientRect();
        console.log(rect.top, rect.right, rect.bottom, rect.left);
    }
}, true);

function drop(e) {
    console.log("drop");
    e.target.classList.remove('contour-drag');
    
    // get the draggable element
    const id = e.dataTransfer.getData('text/plain');
    const draggable = document.getElementById(id);
    
    // add it to the drop target
    e.target.appendChild(draggable);
    
     // display the draggable element
    draggable.classList.remove('hide'); 
}