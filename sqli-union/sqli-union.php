<?php
require('connection.php');

if (isset($_GET['id'])){

    // Assigning POST values to variables.
    $id = $_GET["id"];

    // CHECK FOR THE RECORD FROM TABLE
    $query = "SELECT * FROM Songs WHERE id='$id'";

    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
    $count = mysqli_num_rows($result);
    //$row = mysqli_fetch_array($result);
    $tempcount = $count;

    echo "<h1 style='text-align:center;'>Welcome!</h1>";
    echo "<h3 style='color:grey;text-align:center;'>Song Details (or other data due to injection)</h3>";
    echo "<br>";
    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>SQL Query:</b> $query";
    echo "<h4 style='margin-left:50px;'>Details:</h4>";
    echo "<div style='margin-left: 50px;background-color:#000000;color:white;height:30px;width:400px; display: flex;'>";
    echo "<span style='width: 80px; text-align: left; padding-left: 10px;'>ID</span>";
    echo "<span style='width: 160px; text-align: left; padding-left: 10px;'>Column 2</span>";
    echo "<span style='width: 160px; text-align: left; padding-left: 10px;'>Column 3</span>";
    echo "</div>";

    while ($row = mysqli_fetch_array($result)) {
        ?>
        <div style="margin-left: 50px;background-color:<?php echo ($tempcount % 2 == 0) ? '#F5F5F5' : 'white'; ?>;height:30px;width:400px; display: flex; align-items: center;">
            <span style='width: 80px; text-align: left; padding-left: 10px;'><?php echo $row[0]; ?></span>
            <span style='width: 160px; text-align: left; padding-left: 10px;'><?php echo $row[1]; ?></span>
            <span style='width: 160px; text-align: left; padding-left: 10px;'><?php echo $row[2]; ?></span>
        </div>
        <?php
        $tempcount--;
    }

} else {
    header('Location: http://localhost/sqli-union/index.php?answer=Invalid');
    exit();
}
?>
