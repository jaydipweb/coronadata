<?php
    session_start();
    if(isset($_SESSION['name'])){
        $url = "https://api.rootnet.in/covid19-in/stats/latest";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($curl);
        if ($result === FALSE) {
        die("Curl failed: " . curL_error($curl));
        }
        $resultData =  json_decode($result, true);
        curl_close($curl);
    }else{
        header('Location: login.php');
    }
    
?>