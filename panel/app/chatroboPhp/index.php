<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Max-Age: 1000');
error_reporting(E_ERROR | E_PARSE);
session_start();

include 'functions.php';
if (isset($_POST['newmessage'])) {
    $message=$_POST['newmessage'][1];
    /** Komutlar */
  //  print_r( $message);die;
   

    /** Mesajlar */
    echo $message;


    usleep(500000);
}else if (isset($_POST['opened'])) {
    echo 'offline';
    die;
}else if (isset($_POST['offlineSending'])) {
    $URL_REF = parse_url($_SERVER['HTTP_REFERER']);
    $URL_REF_HOST =   $URL_REF['host'];
    //echo 'urlcheck : '.urlCheck($url).' url_ref_host ->'.strstr($url,$URL_REF_HOST).' server name : '.$_SERVER['SERVER_NAME'];
    $msg= securityPost($_POST['offlineSending']['message']);
    $name= securityPost($_POST['offlineSending']['name']);
    $email= securityPost($_POST['offlineSending']['email']);
    $url= htmlspecialchars($_POST['offlineSending']['url']);
  
    if (empty($msg) || empty($name) || empty($email)) {
        echo 'Tüm alanları doldurmalısınız!';
    }else if (strlen($msg)<10 || strlen($msg)>65000) {
        echo 'Mesajınız çok kısa!';
    }else if (strlen($name)<3 || strlen($msg)>35) {
        echo 'Adınız çok kısa!';
    }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 'Geçerli bir email adresi girin!';
    }else{
       // echo strpos($url, $URL_REF_HOST).'..'.$URL_REF_HOST.'--'. strstr($url, $URL_REF_HOST);die;
      
        include 'connect.php';
        $izinKontrol = $db->query("select count(*) from access_permissions where url='".$url."' and permission=1")->fetchColumn();
        $kontrol=$db->query("select count(*) from offline_messages where status=0 and sender_ip='".md5(getUserIP())."'")->fetchColumn();
        
        if ($izinKontrol>0 && urlCheck($url)=="true" && strpos($url,$URL_REF_HOST)) {
            if ($kontrol > 0) {
                echo 'Yanıtlanmamış bir mesajınız olduğu için yeni mesaj gönderilemiyor.';
            } else {
                $query = $db->insert('offline_messages')
                ->set(array(
                    'sender_email' => $email,
                    'sender_name' => $name,
                    'message' => $msg,
                    'sender_ip' => md5(getUserIP())
                ));
                if ($query) {
                    echo 'success';
                } else {
                    'Mesaj gönderilirken bir hata oluştu!';
                }
            }
        }else{
            echo 'Uygulamayı bu sitede kullanabilmek için gerekli yetkiniz bulunmamaktadır.'.$URL_REF_HOST.'--'. strstr($url, $URL_REF_HOST);
        }
    }
    die;
}

?>