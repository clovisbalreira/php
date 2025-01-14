<?php
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, "http://api.openweathermap.org/data/2.5/weather?q=London,uk&appid=0bc2aaf9d46215a81b426f960c3f2722");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $resultado = curl_exec($curl);
    //print_r($resultado);
    $resultadoArray = json_decode($resultado,true);
    print_r(round($resultadoArray['main']['temp'] - 273.15));