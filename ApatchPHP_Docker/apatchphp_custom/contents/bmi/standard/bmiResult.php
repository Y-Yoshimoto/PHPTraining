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
            <div class="boxOutput">
                <?php
                $bmi = bmiCal($_POST['tall'],$_POST['weight']);
                echo '<p>あなたのBMIは',$bmi,'です。</p>';
                $status = bmiCheck($bmi);
                ?>
                <input class="buttonC" type="button" value="戻る" onclick="history.back()">
            </div>
        </div>
    <body>
    </body>
</html>


<?php
function bmiCal($tall, $weight)
    {
        $tallm = $tall*0.01;
        return $weight/($tallm*$tallm);
}

function bmiCheck($bmi){
    //BIM情報読み込み,デコード
    $BMIdata = json_decode(file_get_contents("../BMIdata.json"), true);
    foreach ($BMIdata["Info"] as &$Info) {
        //echo 'bmiUpperLimit',$Info["bmiUpperLimit"],'<br>';
        if($bmi < $Info["bmiUpperLimit"]){
            echo "<p>評価は「",$Info["status"],"」です。</p>";
            return 0;
        };
    };
    echo '異常値です。<br>';
    return 0;
}
?>
