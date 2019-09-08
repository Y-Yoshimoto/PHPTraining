<?php
    header("Content-Type: application/json; charset=UTF-8");
    $tall = filter_input(INPUT_POST, 'tall');
    $weight = filter_input(INPUT_POST, 'weight');

    $bmi = bmiCal($tall, $weight);
    $result = array("bmi" => $bmi,
    "tall" => $tall,
    "weight" => $weight,
    );//,
    /*"color" => $Info["color"] ,
    "text" => $Info["text"],
    "status" => $Info["status"]) ;*/
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
?>
