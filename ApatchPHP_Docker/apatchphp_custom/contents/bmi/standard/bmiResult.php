<!DOCTYPE html>
<html lang="jp" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="../bmiStyle.css">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
        <title>BMIチェッカー結果</title>
        <link rel=”icon” type=”image/x-icon” href=”../img/Favicon.icon”>
    </head>
    <body>
        <h1>BMIチェッカー</h1>
        <div class="boxSheet">
            <?php
            //BMI計算
            //$BMIresult = bmiCheck(bmiCal($_POST['tall'],$_POST['weight']));
            $BMIresult = bmiCheck(bmiCal(filter_input(INPUT_POST,'tall'),filter_input(INPUT_POST,'weight')));
            //結果出力
            echo '<div class="boxOutput" style="background:',$BMIresult['color'],'">';
                echo '<p>あなたのBMIは[',$BMIresult['bmi'],']です。</p>';
                echo '<p>評価は[',$BMIresult['status'], ']です。</p>';
                ?>
                <input class="buttonC" type="button" value="戻る" onclick="history.back()">
            </div>
        </div>
    <body>
    </body>
</html>


<?php
function bmiCal($tall, $weight){
        $tallm = $tall*0.01;
        return $weight/($tallm*$tallm);
}

function bmiCheck($bmi){
    //BIM情報読み込み,デコード
    $BMIdata = json_decode(file_get_contents("../BMIdata.json"), true);
    foreach ($BMIdata["Info"] as &$Info) {
        //echo 'bmiUpperLimit',$Info["bmiUpperLimit"],'<br>';
        if($bmi < $Info["bmiUpperLimit"]){
            $result = array("bmi" => $bmi,
            "color" => $Info["color"] ,
            "text" => $Info["text"],
            "status" => $Info["status"]) ;
            //var_dump($result);
            return $result;
        };
    };
    $result = array("bmi" => $bmi,
    "color" => "FFFFFF",
    "text" => "異常値です",
    "status" => "異常値") ;
    return $result;
}
?>
