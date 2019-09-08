<?php
    header("Content-Type: application/json; charset=UTF-8");
    //POSTされた値の取得
    $tall = filter_input(INPUT_POST, 'tall');
    $weight = filter_input(INPUT_POST, 'weight');
    //BMI計算
    $BMIresult = bmiCheck(bmiCal($tall, $weight));
    //レスポンス生成
    $result = array("bmi" => $BMIresult['bmi'],
    "color" => $BMIresult["color"] ,
    "text" => $BMIresult["text"],
    "status" => $BMIresult['status']);
    //jsonオブジェクトエンコード,送信
    echo json_encode($result);
    //echo var_dump($_POST);
    exit;
?>

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
