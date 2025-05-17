<!DOCTYPE html>
<html>
<head>
    <h2 style='color: brown;text-align:center;margin-left:50px;'>Logix Academy</h2>
    <h3 style='color: brown;text-align:center;margin-left:50px;'>SQL Injection Basic</h3>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body id="body_bg">
<?php
$answer = isset($_GET['answer']) ? $_GET['answer'] : '';
?>
<div align="center">
    <br>
    <div style='text-align:center;margin-left:50px;'><b>LOGIN</b></div>
    <br>
    <form id="login-form" method="post" action="sqli-basic.php">
        <table border="0.5">
            <tr>
                <td><label for="user_id">User Name</label></td>
                <td><input type="text" name="user_id" id="user_id" required autocomplete="off"></td>
            </tr>
            <tr>
                <td><label for="user_pass">Password</label></td>
                <td><input type="text" name="user_pass" id="user_pass"></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <div style="width:200px; text-align:center;">
                        <br>
                        <input type="submit" value="Login"/>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <p><?php if($answer=='Invalid'){echo "<script>alert('Invalid Login Credentials');</script>";}?></p>
                </td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>