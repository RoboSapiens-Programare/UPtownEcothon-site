/*var imgObj = null;
var imgObj2 = null;
var animate ;

function init() {
   imgObj = document.getElementsByClassName('town-TOP');
   imgObj.style.position= 'relative'; 
   imgObj.style.left = '20px';
   imgObj.style.right = '20px';
   imgObj2 = document.getElementsByClassName('cothon-TOP');
   imgObj2.style.position= 'relative'; 
   imgObj2.style.left = '20px';
   imgObj2.style.right = '20px';  
}
function moveRight() {
   imgObj.style.left = parseInt(imgObj.style.left) - 60 + 'px';
   animate = setTimeout(moveRight,500);
   imgObj2.style.left = parseInt(imgObj2.style.left) - 60 + 'px';
   animate = setTimeout(moveRight,500);
}
function moveLeft() {
   imgObj.style.right = parseInt(imgObj.style.right) + 60 + 'px';
   animate = setTimeout(moveLeft,500);
   imgObj2.style.right = parseInt(imgObj2.style.right) + 60 + 'px';
   animate = setTimeout(moveLeft,500);
}
function stop() {
   clearTimeout(animate);
   imgObj.style.left = '500px';
   imgObj2.style.left = '500px'; 
}
            
window.onload = init;

window.onscroll = function() {scroll1Function(); scroll2Function};
function scroll1Function() {
  if (document.body.scrollTop > 10 || document.documentElement.scrollTop > 10) {
    document.getElementsByClassName('townTOP', 'cothonTOP').innerHTML = moveRight(); 
  } else {
    document.getElementsByClassName('townTOP', 'cothonTOP').innerHTML = stop();
  }
}
function scroll2Function() {
  document.getElementsByClassName('townTOP', 'cothonTOP').innerHTML = moveLeft();
  document.getElementsByClassName('townTOP', 'cothonTOP').innerHTML = stop();
}*/



var current = document.documentElement.scrollTop;
var previous = current;
current = document.documentElement.scrollTop;


function scrollUpDown(photo) {
  var logo1 = photo.parentElement.getElementById("town-TOP");
  var logo2 = photo.parentElement.getElementById("cothon-TOP");
  if (current - previous > 0) {
    slidetowncothon(logo1, 1000, 60, -60, 0, 0, false);
    slidetowncothon(logo2, 1000, 60, -60, 0, 0, false);
  }else {
    slidetowncothon(logo1, 1000, -60, 60, 0, 0, true);
    slidetowncothon(logo2, 1000, -60, 60, 0, 0, true);
  }
}

function slidetowncothon(element, duration, X1, X2, Y1, Y2, reverse) {
  let start = Date.now();

  if (reverse){
    let auxX = X1;
    X1 = X2;
    X2 = auxX;

    let auxY = Y1;
    Y1 = Y2;
    Y2 = auxY;
  }

  X1 = X1/100 * element.clientWidth;
  Y1 = Y1/100 * element.clientHeight;
  X2 = (X2/100) * element.parentElement.clientWidth + X1;
  Y2 = (Y2/100) * element.parentElement.clientHeight + Y1;

  function bip() {
    let now = Date.now();
    let elapsed = now - start;
    let valX = tweenFunctions.easeInQuad(elapsed, X1, X2, duration);
    let valY = tweenFunctions.easeInQuad(elapsed, Y1, Y2, duration);

    element.style.transform = `translate(${valX}%, ${valY}%)`;

    if (elapsed < duration) {
      requestAnimationFrame(bip);
    }
  }
  requestAnimationFrame(bip);
}
