
function navigationMenu(){
  
  if ( document.getElementById('menuList').style.display=="block") {
    document.getElementById('menuList').style.display="none";
  }else{
    document.getElementById('menuList').style.display="block";

  }
}
$('menuButton').click(function(){
  $(this).next('div').toggle();
});