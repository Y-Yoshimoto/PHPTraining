<?php $title ="PriceOutput"; require '../header.php';?>

<?php
    //タグ除却
    $count= htmlspecialchars($_REQUEST['count']);
    $price= htmlspecialchars($_REQUEST['price']);
    // 整数変換
    $C = settype($count, "integer");
    $P = settype($price, "integer");
    // 整数変換結果チェック
    if($C and $P){
        echo $price,'$* ',$count,'= ', $price * $count, "$";
    }
    else {
        echo '<a href="Input.php">Input Page.</a>';
    }
?>

<?php require '../footer.php'; ?>
