<?php
require('connection.php');

if (isset($_POST['user_id']) and isset($_POST['user_pass'])) {
    $username = $_POST['user_id'];
    $password = $_POST['user_pass'];

    // Classic vulnerable query
    $query = "SELECT * FROM Users WHERE username='$username' and password='$password'";
    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
    $count = mysqli_num_rows($result);

    if ($count >= 1) {
        echo "<h1 style='text-align:center;'>Welcome!</h1>";
        echo "<h3 style='color:grey;text-align:center;'>Here are your account details:</h3>";
        echo "<br>";
        echo "<div style='margin-left:50px;background-color:#000000;color:white;height:30px;width:400px;'>&nbsp;&nbsp;ID&nbsp;&nbsp;&nbsp;&nbsp;Username&nbsp;&nbsp;&nbsp;&nbsp;Password</div>";

        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div style="margin-left:50px;background-color:#F5F5F5;height:30px;width:400px;">
                <span>&nbsp; &nbsp;</span><?php echo $row['id']; ?>
                <span>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><?php echo $row['username']; ?>
                <span>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><?php echo $row['password']; ?>
            </div>
            <?php
        }
    } else {
        header('Location: /sqli-basic/index.php?answer=Invalid');
        exit();
    }
}
?>
