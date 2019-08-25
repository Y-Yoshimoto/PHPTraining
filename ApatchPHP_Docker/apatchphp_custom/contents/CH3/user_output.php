<?php $title ="UserOutput"; require '../header.php';?>

<?php
    //タグ除却
    $username = htmlspecialchars($_REQUEST['user']);
    // 文字列長チェック
    if(strlen($username)){
        echo 'Welcome, ', $username, '.';
    }
    else {
        echo '<a href="Input.php">Input Page.</a>';
    }
?>

<?php require '../footer.php'; ?>
