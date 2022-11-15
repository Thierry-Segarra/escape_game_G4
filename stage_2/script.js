var mousePosition;
var div;

var isDown = false;

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
    if (document.elementFromPoint(e.clientX, e.clientY).className === "box"){
        box = document.elementFromPoint(e.clientX, e.clientY);
        div.style.zIndex = 2;

        box.appendChild(div);
        div.style.position = "static";
        div = null;
    }
}, true);

document.addEventListener('mousemove', function(event) {
    event.preventDefault();
    if (isDown) {
        mousePosition = {

            x : event.clientX,
            y : event.clientY

        };
        div.style.left = (mousePosition.x + 10) + 'px';
        div.style.top  = (mousePosition.y + 10) + 'px';
    }
}, true);

// Verification des phrases //