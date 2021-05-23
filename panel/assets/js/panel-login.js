$(document).ready(function(){
  $('#loginForm').submit(function(e){
    e.preventDefault();
    
    var login={
        username:document.getElementById('username').value,
        password:document.getElementById('password').value
    }
    $.ajax({
        type: "POST",
        url: 'app/chatroboPhp/login.php',
        data: { login: login }, // serializes the form's elements.
        success: function(data) {
            switch (data) {
              case 'success':
                window.location='index.php';
                break;
            
              default:
                document.getElementById('login-error').style.padding="2.5%";
                document.getElementById('login-error').innerHTML=data;
                break;
            }
        }
    });

  });
});