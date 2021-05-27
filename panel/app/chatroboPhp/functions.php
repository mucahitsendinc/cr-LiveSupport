<?php 
function safer($metin){
    $safe=$metin;
    $safe=str_replace("'","",$safe);
    $safe=str_replace('"','',$safe);
    $safe=str_replace('insert','',$safe);
    $safe=str_replace('select','',$safe);
    $safe=str_replace('drop','',$safe);
    $safe=str_replace('truncate','',$safe);
    $safe=str_replace('where','',$safe);
    $safe=str_replace('or','',$safe);
    $safe=str_replace('not','',$safe);
    $safe=str_replace('but','',$safe);
    $safe=str_replace('like','',$safe);
    $safe=str_replace('>','',$safe);
    $safe=str_replace('<','',$safe);
    $safe=str_replace('=','',$safe);
    $safe=str_replace('tokenchatrobo','',$safe);
    return $safe;
}
function getUserIP() {
    return "213.14.151.225";
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP'])){
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    }else if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else if(isset($_SERVER['HTTP_X_FORWARDED'])){
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    }else if(isset($_SERVER['HTTP_X_CLUSTER_CLIENT_IP'])){
        $ipaddress = $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
    }else if(isset($_SERVER['HTTP_FORWARDED_FOR'])){
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    }else if(isset($_SERVER['HTTP_FORWARDED'])){
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    }else if(isset($_SERVER['REMOTE_ADDR'])){
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    }else{
        $ipaddress = 'UNKNOWN';
    }
    return $ipaddress;
}
function getButton($color,$msg,$onclick=""){
    /*
    echo'<button class="green">Mesaj Ekle</button>';
    echo'<button class="primary">Mesaj Düzenle</button>';
    echo'<button class="red">Mesaj Sil</button>';
    echo'<button class="orange">Mesaj Listele</button>';
    */
    if ($onclick!="") {
        $onclick='onclick="'.$onclick.'"';
    }
    echo'<button class="'.$color.'" "'.$onclick.'">'.$msg.'</button>';
}
function securityPost($data){
    $bad = array("'", "*", "?", "select", "all", "or", "SELECT", "ALL", "OR", "concat", "-", "+", "(", ")", "union", ",", "group");
    $good = array("_", "_", "_", "_", "_", "_", "_", "_", "_", "_", "_", "_", "_", "_", "_", "_", "_");
    $result = str_replace($bad, $good, $data);
    $result = trim(addslashes($result));
    return htmlspecialchars($result);
}
function urlCheck($url){
    $hata=0;
    if (strstr($url,"http")) {
        if (strstr($url, "//")) { 
            return "true";
        }
    }
    return "false";
}
function jsonp_decode($jsonp, $assoc = false)
{ // PHP 5.3 adds depth as third parameter to json_decode
    if ($jsonp[0] !== '[' && $jsonp[0] !== '{') {
        $jsonp = substr($jsonp, strpos($jsonp, '('));
    }
    $jsonp = trim($jsonp);      // remove trailing newlines
    $jsonp = trim($jsonp, '()'); // remove leading and trailing parenthesis

    return json_decode($jsonp, $assoc);
}
function login_check($bilgi){
    if ($bilgi != "on") {
        header("Location:login.php");
        die;
    }else{
        define('disposable', crypto_gen(15, true, true, false));
    }
}
function crypto_gen($adet, $harfolsun = true, $sayiolsun = true, $ozelkarakterlerolsun = true)
{
    if ($harfolsun == false && $sayiolsun == false && $ozelkarakterlerolsun == false) {
        return "cant crypto generating";
    }
    $gonder = "";
    $degerler = [
        'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'v', 'y', 'z', 'x', 'w',
        '0', '1', '2', '3', '4', '5', '6', '7', '8', '9',
        '!', '£', '#', '^', '$', '%', '&', '/', '?', '-', '_', 'é', '@', ',', '.', ':', ';'
    ];
    $harfler = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'v', 'y', 'z', 'x', 'w'];
    $sayilar = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
    $ozelkarakterler = ['!', '£', '#', '^', '$', '%', '&', '/', '?', '-', '_', 'é', '@', ',', '.', ':', ';'];
    while (strlen($gonder) < $adet) {
        $bak = rand(1, 3);
        $eklenecek = "";
        if ($bak == 1 && $harfolsun == true) {
            $eklenecek = $harfler[rand(0, count($harfler))];
        } else if ($bak == 2 && $sayiolsun == true) {
            $eklenecek = $sayilar[rand(0, count($sayilar))];
        } else if ($bak == 3 && $ozelkarakterlerolsun == true) {
            $eklenecek = $ozelkarakterler[rand(0, count($ozelkarakterler))];
        }
        if (rand(0, 10) % 2 == 0) {
            $gonder .= strtolower($eklenecek);
        } else {
            $gonder .= strtoupper($eklenecek);
        }
    }
    return $gonder;
}
function directFile($file){
    return file_get_contents($file);
}
?>