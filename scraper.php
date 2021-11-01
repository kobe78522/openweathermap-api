<?php
    //ini_set('display_errors','on');
   
    $city = $_GET["city"];

    $apikey = "ecc0529d9d2e1e67d3b5c5f1b954ef7e";

    $contents= file_get_contents("https://api.openweathermap.org/data/2.5/forecast?q=".$city."&appid=".$apikey."&lang=zh_tw");
    
    $contents = json_decode($contents,true);

    $cityName = $contents["city"]["name"];
    
    $description = $contents["list"][7]["weather"][0]["description"];
    
    //因為API給的是絕對溫度(K)，換成攝氏 = K - 273.15
    //換成華氏 = K * 9 / 5 - 459.67
    $temperature = $contents["list"][7]["main"]["temp"] - 273.15;
    
    $result = "城市: ".$cityName."， 天氣狀況: ".$description."， 溫度: ".$temperature."℃";

    if($cityName != ""){
         echo $result;
    }