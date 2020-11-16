var imgObj = null;
var imgObj2 = null;
var animate ;

function init() {
   imgObj = document.getElementById('myImage');
   imgObj.style.position= 'relative'; 
   imgObj.style.left = '300px';
   imgObj.style.right = '300px';
   imgObj2 = document.getElementById('myOtherImage');
   imgObj2.style.position= 'relative'; 
   imgObj2.style.left = '300px';
   imgObj2.style.right = '300px';  
}
function moveRight() {
   imgObj.style.left = parseInt(imgObj.style.left) - 10 + 'px';
   animate = setTimeout(moveRight,70);
   imgObj2.style.left = parseInt(imgObj2.style.left) - 10 + 'px';
   animate = setTimeout(moveRight,70);
}
function moveLeft() {
   imgObj.style.right = parseInt(imgObj.style.right) + 10 + 'px';
   animate = setTimeout(moveLeft,70);
   imgObj2.style.right = parseInt(imgObj2.style.right) + 10 + 'px';
   animate = setTimeout(moveLeft,70);
}
function stop() {
   clearTimeout(animate);
   imgObj.style.left = '500px';
   imgObj2.style.left = '500px'; 
}
            
window.onload = init;

window.onscroll = function() {scrollFunction()};
function scrollFunction() {
  if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
    document.getElementById("myImage", "myOtherImage").innerHTML = moveRight(); 
  } else {
    document.getElementById("myImage", "myOtherImage").innerHTML = moveLeft();
  }
  //if (document.body.scrollHeight < 1000 || document.documentElement.scrollHeight < 1000) {}

  
}
