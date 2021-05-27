var geturl=(document.getElementById('livesupport').src.replace("api.js",""));
var script = document.createElement('script');
script.src = geturl+'assets/vendor/jquery/index.js';
script.type = 'text/javascript';
document.getElementsByTagName('head')[0].appendChild(script);
//console.log(geturl+'assets/vendor/jquery/index.js');
setTimeout(() => {
  $('head').append('<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">');
}, 400);
setTimeout(() => {
  $('head').append('<link rel="stylesheet" type="text/css" href="'+geturl+'assets/vendor/flag-icon/css/flag-icon.min.css">');
  $('head').append('<link rel="stylesheet" type="text/css" href="'+geturl+'assets/vendor/animate/animate.min.css">');
},400);

setTimeout(() => {

  var postToken=["send"];
  $.ajax({
      type: "POST",
      url: (geturl+'app/chatroboPhp/api.php'),
      data: { postToken: postToken }, // serializes the form's elements.
      success: function(data) {
          if (data=="yonlendir") {
            alert('LiveSupport Erişim yetkiniz bulunmuyor!');
            window.location="http://dehasoft.com.tr";
          }else{
            var newdata=(JSON.parse(data));
            setTimeout(() => {
                $('head').append('<style>'+newdata[1]+'</style>');
            },400);
            $('body').append('<script>'+newdata[0]+'</script>');
          }
         
      }
  });
}, 500);