<?php $title ="Input"; require '../header.php';?>

    <h3>Please enter your username.</h3>
    <form action="user_output.php" method="post">
    <input class="inputC" type="text" name="user">
    <input class="buttonC" type="submit" value="Send">
    </form>

    <h3>Please enter the unit price and count.</h3>
    <form action="price_output.php" method="post">
        <ul>
            <li>count: <input class="inputC" type="text" name="count">$</li>
            <li>Price: <input class="inputC" type="text" name="price"></li>
            <li><input class="buttonC" type="submit" value="Send"></li>
        </ul>
    </form>
<?php require '../footer.php'; ?>
