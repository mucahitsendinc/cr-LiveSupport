<?php
    function crypto_gen($adet,$harfolsun=true,$sayiolsun=true,$ozelkarakterlerolsun=true){
        if($harfolsun== false && $sayiolsun== false && $ozelkarakterlerolsun== false){ return "cant crypto generating"; }
        $gonder="";
        $degerler=['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','r','s','t','u','v','y','z','x','w',
                    '0','1','2','3','4','5','6','7','8','9',
                    '!','£','#','^','$','%','&','/','?','-','_','é','@',',','.',':',';'];
        $harfler=['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','r','s','t','u','v','y','z','x','w'];
        $sayilar=[ '0','1','2','3','4','5','6','7','8','9'];
        $ozelkarakterler=['!','£','#','^','$','%','&','/','?','-','_','é','@',',','.',':',';'];
        while (strlen($gonder)<$adet) {
            $bak=rand(1,3);
            $eklenecek="";
            if ($bak==1 && $harfolsun==true) {
                $eklenecek=$harfler[rand(0,count($harfler))];
            }else if ($bak == 2 && $sayiolsun == true) {
                $eklenecek= $sayilar[rand(0, count($sayilar))];
            } else if ($bak == 3 && $ozelkarakterlerolsun == true) {
                $eklenecek= $ozelkarakterler[rand(0, count($ozelkarakterler))];
            }
            if (rand(0,10)%2==0) {
                $gonder.=strtolower($eklenecek);
            }else{
                $gonder .= strtoupper($eklenecek);
            }
        }
        return $gonder;
    }
    echo crypto_gen(1);
?>