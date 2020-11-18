var imgObj = null;
var imgObj2 = null;
var animate ;

function init() {
   imgObj = document.getElementById('town-TOP');
   imgObj.style.position= 'relative'; 
   imgObj.style.left = '20px';
   imgObj.style.right = '20px';
   imgObj2 = document.getElementById('cothon-TOP');
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
    document.getElementsByClassName("town-TOP", "cothon-TOP").innerHTML = moveRight(); 
  } else {
    document.getElementsByClassName("town-TOP", "cothon-TOP").innerHTML = stop();
  }
}
function scroll2Function() {
  document.getElementsByClassName("town-TOP", "cothon-TOP");
}
