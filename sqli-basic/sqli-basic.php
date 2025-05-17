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
        echo "<div style='margin-left:50px;background-color:#000000;color:white;height:30px;width:400px; display: flex;'>";
        echo "<span style='width: 80px; text-align: left; padding-left: 10px;'>ID</span>";
        echo "<span style='width: 160px; text-align: left; padding-left: 10px;'>Username</span>";
        echo "<span style='width: 160px; text-align: left; padding-left: 10px;'>Password</span>";
        echo "</div>";

        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div style="margin-left:50px;background-color:#F5F5F5;height:30px;width:400px; display: flex; align-items: center;">
                <span style='width: 80px; text-align: left; padding-left: 10px;'><?php echo $row['id']; ?></span>
                <span style='width: 160px; text-align: left; padding-left: 10px;'><?php echo $row['username']; ?></span>
                <span style='width: 160px; text-align: left; padding-left: 10px;'><?php echo $row['password']; ?></span>
            </div>
            <?php
        }
    } else {
        header('Location: /sqli-basic/index.php?answer=Invalid');
        exit();
    }
}
?>
