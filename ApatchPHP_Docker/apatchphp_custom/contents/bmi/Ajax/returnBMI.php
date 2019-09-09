<?php
    header("Content-Type: application/json; charset=UTF-8");
    //POSTされた値の取得
    $tall = filter_input(INPUT_POST, 'tall');
    $weight = filter_input(INPUT_POST, 'weight');
    //BMI計算
    $BMIresult = bmiCheck($tall, $weight);
    //jsonオブジェクトエンコード,送信
    echo json_encode($BMIresult);
    //echo var_dump($_POST);
    exit;
?>

<?php
    //BMI計算
    function bmiCal($tall, $weight){
            $tallm = $tall*0.01;
            return $weight/($tallm*$tallm);
    }
    //BMI評価
    function bmiCheck($tall, $weight){
    //BMI計算
    $bmi = bmiCal($tall, $weight);
    //BIM情報読み込み,デコード
    $BMIdata = json_decode(file_get_contents("../BMIdata.json"), true);
    foreach ($BMIdata["Info"] as &$Info) {
    //BMI判定, レスポンス生成
        if($bmi < $Info["bmiUpperLimit"]){
            return makeInfo($bmi, $Info["color"], $Info["text"], $Info["status"]);
        };
    };
    return makeInfo($bmi, "#FFFFFF", "異常値です", "異常値");
    }
    //レスポンス用JSON生成
    function makeInfo($bmi, $color, $text, $status){
        $result = array(
        "bmi" => $bmi,
        "color" => $color,
        "text" => $text,
        "status" => $status) ;
        return $result;
    }
?>
