document.body.innerHTML=document.body.innerHTML+'<div id="loading"><img src="assets/image/loading.gif" alt="loading"></div>';
$(window).on('load', function () {
  document.getElementById('loading').style.display="none";
});