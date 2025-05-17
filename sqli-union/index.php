<!DOCTYPE html >
<html>
<head>
<h2 style='color: brown;text-align:center;margin-left:50px;'>Logix Academy</h2>
<h3 style='color: brown;text-align:center;margin-left:50px;'>SQL Injection Basic</h3>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body id="body_bg">
<?php
$answer = $_GET["answer"];
?>

 <div class="navbar" style="width:140px;">
  <div class="dropdown">
    <button class="dropbtn">Select Song &#x25BC;
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="sqli-union.php?id=1">ID 1</a>
      <a href="sqli-union.php?id=2">ID 2</a>
      <a href="sqli-union.php?id=3">ID 3</a>
      <a href="sqli-union.php?id=4">ID 4</a>
    </div>
  </div>
</div>
<p><?php if($answer=='Invalid'){echo "<script type='text/javascript'>alert('Invalid Song ID')</script>";}?></p>
</div>


</body>
</html>
