<?php
    require_once('classes/geoplugin.class.php');
    $geoplugin = new geoPlugin();
    $geoplugin->locate();

    echo "Geolocation results for {$geoplugin->ip}: <br />\n".
        "City: {$geoplugin->city} <br />\n".
        "Region: {$geoplugin->region} <br />\n".
        "Area Code: {$geoplugin->areaCode} <br />\n".
        "DMA Code: {$geoplugin->dmaCode} <br />\n".
        "Country Name: {$geoplugin->countryName} <br />\n".
        "Country Code: {$geoplugin->countryCode} <br />\n".
        "Longitude: {$geoplugin->longitude} <br />\n".
        "Latitude: {$geoplugin->latitude} <br />\n".
    "Currency Code: {$geoplugin->currencyCode} <br />\n".
    "Currency Symbol: {$geoplugin->currencySymbol} <br />\n".
    "Exchange Rate: {$geoplugin->currencyConverter} <br />\n";
?>