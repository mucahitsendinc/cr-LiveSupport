var script = document.createElement('script');
script.src = 'assets/js/jquery.min.js';
script.type = 'text/javascript';
document.getElementsByTagName('head')[0].appendChild(script);

setTimeout(() => {
    $('head').append('<link rel="stylesheet" type="text/css" href="assets/vendor/fontawesome/css/fontawesome-all.min.css">');
    $('head').append('<link rel="stylesheet" type="text/css" href="assets/vendor/flag-icon/css/flag-icon.min.css">');
    $('head').append('<link rel="stylesheet" type="text/css" href="assets/css/chatrobo.css?v=1">');
    $('head').append('<link rel="stylesheet" type="text/css" href="assets/vendor/animate/animate.min.css">');
}, 100);
var url = 'http://localhost/dehasoft/livesupport/panel/app/chatroboPhp/index.php';
//var url = 'http://2gce.bumpara.net/panel/app/chatroboPhp/index.php';
var chatrobo = 'chatrobo';
var chatroboscreen = 'chatrobo-opened';
var chatroboClosebtn = 'chatroboClosebtn';
var title = document.getElementById('chatrobo-title');
var text = document.getElementById('title-text');
var messages = document.getElementById('chatrobo-messages');
var sending = document.getElementById('message');

var messageHead = '<div class="chatrobo-baloon send animate__animated animate__slideInLeft"><div class="sender-title"><a target="_blank" href="https://github.com/mucahitsendinc/chatrobo" >ChatRobo</a></div><p>';
var messageFoot = '</p></div>';
var smessageHead = '<div class="chatrobo-baloon sender animate__animated animate__slideInRight""><p>';
var smessageFoot = '</p></div>';

var sendingChecker = false;
var lastScrollTop = 0;
setTimeout(() => {
    $(document).ready(function() {
        
        document.body.innerHTML = document.body.innerHTML + '<div id="chatrobo" class="animate__animated animate__rubberBand"><img src="assets/image/livesupportLogo.png" alt="Chat Robo"></div><div id="chatrobo-opened" class="animate__animated"><div class="chatrobo"><div class="chatrobo-title" id="chatrobo-title"><h1 id="title-text">Canlı Destek</h1><div class="chatrobo-closeBtn" id="chatroboClosebtn" onclick="closeChatRobo()"><i class="fas fa-times"></i></div><div id="chatrobo-settings" class="animate__animated"><i class="fas fa-long-arrow-alt-left" id="chatrobo-settings-closeBtn" onclick="closeChatRobo()"></i><h1 id="chatrobo-settings-h1">Çevrim Dışı</h1><div id="chatrobo-settings-content"> <input type="text" name="name" id="offlineName" placeholder="Ad"> <input id="offlineEmail" type="email" name="email" placeholder="Email"><textarea id="offlineMessage" name="message" rows="5" placeholder="Mesaj"></textarea><div id="error-message"></div><button  onclick="offlineSend()" id="offlineSender">Gönder</button></div></div></div><div class="chatrobo-messages" id="chatrobo-messages"></div><div class="chatrobo-messageform "><div id="chatrobo-goback" class="animate__animated" onclick="chatScroll()">Son Mesajlar <i class="fas fa-arrow-down"></i></div><form action="" id="chatroboForm" method="post"><textarea name="message" id="message" rows="2" placeholder="Merhaba ile başla..."></textarea><button type="submit" value="1"><i class="fas fa-paper-plane"></i></button></form></div></div></div>';

    
    
        document.getElementById(chatroboscreen).style.display = "block";
    
        
    
        
    
    
        
        $('#' + chatrobo).on('click', function() {
            var err=false;
            document.getElementById(chatrobo).classList.add('animate__zoomOutLeft');
            document.getElementById(chatrobo).classList.remove('animate__zoomInUp');
            var opened=["opened"];
            $.ajax({
                type: "POST",
                url: url,
                data: { opened: opened }, // serializes the form's elements.
                success: function(data) {
                    console.log(data);
                    if (data=="offline") {
                        
                        document.getElementById('chatrobo-settings').style.display="block";
                    }else if (data=="online") {
                        document.getElementById('chatrobo-settings').style.display="none";
                     
                        setTimeout(() => {
                            addMessage("Merhaba, Web sayfamıza hoş geldiniz. Size nasıl yardımcı olabilirim?");
                        }, 1500);
                    }
                        
                        
                        //http://localhost/dehasoft/livesupport/panel/
                },
                error:function(error){
                    console.log(error);
                    document.getElementById(chatrobo).classList.remove('animate__zoomOutLeft');
                    document.getElementById(chatrobo).classList.add('animate__zoomInUp');
                    err=true;
                }
            });
            if (err!=true) {
                document.getElementById(chatroboscreen).style.visibility = "visible";
                document.getElementById(chatroboscreen).classList.add('animate__zoomInUp');
                document.getElementById(chatroboscreen).classList.remove('animate__zoomOutRight');
            }
            
        });
       
        $("#message").keypress(function(e) {
            var code = (e.keyCode ? e.keyCode : e.which);
            if (e.shiftKey != true && sendingChecker == false) {
                if (code == 13) {
                    e.preventDefault();
                    $("#chatroboForm").submit();
                }
            }
    
    
        });
        $('#message').on('input', function() {
            var msg = document.getElementById("message");
            if ((msg.value)[0] == "/") {
                msg.classList.add('commandtext');
            } else {
                msg.classList.remove('commandtext');
            }
        })
        $('#chatroboForm').submit(function(e) {
            e.preventDefault();
            var form = $('#chatroboForm');
    
            if (message.value.length > 0 && sendingChecker == false) {
                var messages=document.getElementById('chatrobo-messages');
                messages.innerHTML = messages.innerHTML.replace("animate__animated animate__slideInLeft", "");
                messages.innerHTML = messages.innerHTML.replace("animate__animated animate__slideInRight", "");
                messages.innerHTML = messages.innerHTML + smessageHead + message.value + smessageFoot;
                var loadingimg = '<div><img class="loading" src="assets/image/chatrobowriting.gif"></div>';
                setTimeout(function() {
                    var loadingmessages = messages.innerHTML;
                }, 500);
                messages.innerHTML = messages.innerHTML.replace('<div><img class="loading" src="assets/image/chatrobowriting.gif"></div>', '');
                messages.innerHTML = messages.innerHTML + loadingimg;
                chatScroll();
                var newmessage = new Array();
                newmessage[0] = "message";
                newmessage[1] = message.value;
                message.value = "";
                sendingChecker = true;
    
                $.ajax({
                    type: "POST",
                    url: url,
                    data: { newmessage: newmessage }, // serializes the form's elements.
                    success: function(data) {
                        switch (data) {
                            case "clear":
                                chatClear();
                                break;
                            default:
                                addMessage(data);
                                break;
                        }
                    }
                });
                message.value = "";
    
    
            }
        });
    
     
        $('#chatrobo-messages').scroll(function() {
    
            var st = $(this).scrollTop();
    
            var elem = $("#chatrobo-messages");
            var maxScrollTop = elem[0].scrollHeight - elem.outerHeight();
    
            if (st > lastScrollTop) {
                if ((st + 1) > maxScrollTop) {
                    document.getElementById('chatrobo-goback').classList.remove('animate__backInUp');
                    document.getElementById('chatrobo-goback').classList.add('animate__backOutDown');
                }
            } else {
                if (maxScrollTop == 0) {
                    return;
                }
                document.getElementById('chatrobo-goback').style.visibility = "visible";
                document.getElementById('chatrobo-goback').classList.add('animate__backInUp');
                document.getElementById('chatrobo-goback').classList.remove('animate__backOutDown');
            }
            lastScrollTop = st;
        })
    
    
    
        function chatCommands(deger) {
            sending.value = document.getElementById(deger).innerHTML;
        }
    
    
    
        function chatClear() {
            messages.innerHTML = "";
            sendingChecker = false;
            document.getElementById('chatrobo-goback').classList.remove('animate__backInUp');
        }
    
        function addMessage(data) {
            messages=document.getElementById('chatrobo-messages');
            messages.innerHTML = messages.innerHTML.replace("animate__animated animate__slideInLeft", "");
            messages.innerHTML = messages.innerHTML.replace("animate__animated animate__slideInRight", "");
            messages.innerHTML = messages.innerHTML.replace('<div><img class="loading" src="assets/image/chatrobowriting.gif"></div>', '');
            messages.innerHTML = messages.innerHTML + messageHead + data + messageFoot;
            document.getElementById('chatrobo-goback').classList.remove('animate__backInUp');
    
            chatScroll();
            sendingChecker = false;
        }
    
       
    
    
    
    
    
    });
}, 2000);

function offlineSend(){
    var offlineSending={
        message:document.getElementById('offlineMessage').value,
        name:document.getElementById('offlineName').value,
        email:document.getElementById('offlineEmail').value,
        url:window.location.href
    }
    $.ajax({
        type: "POST",
        url: url,
        data: { offlineSending: offlineSending }, // serializes the form's elements.
        success: function(data) {
            console.log(data);
            switch (data) {
                case 'success':
                    document.getElementById('error-message').innerHTML="Mesajınız başarı ile gönderildi";
                    document.getElementById('error-message').classList.remove('danger-message');
                    document.getElementById('error-message').classList.add('green-message');
                    document.getElementById('offlineMessage').classList.add('animate__animated');
                    document.getElementById('offlineMessage').classList.add('animate__flipOutX');
                    document.getElementById('offlineName').classList.add('animate__animated');
                    document.getElementById('offlineName').classList.add('animate__flipOutX');
                    document.getElementById('offlineEmail').classList.add('animate__animated');
                    document.getElementById('offlineEmail').classList.add('animate__flipOutX');
                    document.getElementById('offlineSender').classList.add('animate__animated');
                    document.getElementById('offlineSender').classList.add('animate__flipOutX');

                    setTimeout(() => {
                        document.getElementById('offlineMessage').style.display="none";
                        document.getElementById('offlineName').style.display="none";
                        document.getElementById('offlineEmail').style.display="none";
                        document.getElementById('offlineSender').style.display="none";
                    }, 600);
                    break;
                
                default:
                    document.getElementById('error-message').innerHTML=data;
                    document.getElementById('error-message').classList.add('danger-message');
                    document.getElementById('error-message').classList.remove('green-message');
                    break;
            }
        }
    });
    
}
function chatScroll() {
    document.getElementById('chatrobo-messages').scrollTo(0, document.getElementById('chatrobo-messages').scrollHeight);
}

function closeChatRobo(){
    document.getElementById(chatrobo).classList.remove('animate__zoomOutLeft');
    document.getElementById(chatrobo).classList.add('animate__zoomInUp');
    document.getElementById(chatroboscreen).style.visibility = "hidden";
    document.getElementById(chatroboscreen).classList.remove('animate__zoomInUp');
    document.getElementById(chatroboscreen).classList.add('animate__zoomOutRight');
    
}
