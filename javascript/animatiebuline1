var imgObj = null;
var animate ;

function init() {
   imgObj = document.getElementById('myImage');
   imgObj.style.position= 'relative'; 
   imgObj.style.left = '500px';
   imgObj.style.right = '500px';  
}
function moveRight() {
   imgObj.style.left = parseInt(imgObj.style.left) - 10 + 'px';
   animate = setTimeout(moveRight,20);
}
function moveLeft() {
   imgObj.style.right = parseInt(imgObj.style.right) + 10 + 'px';
   animate = setTimeout(moveLeft,20);
}
function stop() {
   clearTimeout(animate);
   imgObj.style.left = '500px'; 
}
            
window.onload = init;

window.onscroll = function() {scrollFunction()};
function scrollFunction() {
  if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
    document.getElementById("myImage").innerHTML = moveRight(); 
  } else {
    document.getElementById("myImage").innerHTML = stop();
  }
  //if (document.body.scrollHeight < 1000 || document.documentElement.scrollHeight < 1000) {}

  
}
