<?php
header("Content-type: text/html; charset=utf-8");


    $url = "http://124.220.234.23:8080/quan1";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    $res = curl_exec($ch);
    curl_close($ch);
    $arr = json_decode($res,true);
    $color = '#050505';
    if( $arr['data']['remainStock'] > 0 ){
        $color = 'red';
        
    }
    echo '<h1>'.$arr['data']['name'].'--<a style="color:'.$color.'">'.$arr['data']['salesVol'].'</a><a style="font-size:20px">'.'</a></h1>';

?>