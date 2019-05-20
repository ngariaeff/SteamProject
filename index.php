<?php
    error_reporting(E_ERROR | E_PARSE);
    require_once("./includes/init.php");
?>
<!DOCTYPE HTML>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<html lang="en">
    <body>
        <?php
            if((isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true))
            {
                echo "Welcome " . $_SESSION["username"] . "!";
                ?>
                <img src="<?php echo $_SESSION['avatar']; ?>" alt="avatar">
                <?php
            }
            else
            {
                
            }
            ?>
    </body>
</html>



<head>
<title>Simple Steam</title>
<link rel="stylesheet" href="styles/simplesteam.css" />
<h1>Simple Steam</h1>

</head>
<body>
  <div class="nav">
  <a href="overview.html">Account Overview</a>
  <a href="statistics.html">Statistics</a>
  <a href="#">About</a>
  </div>
 <img src="images/steam.png" alt="Steam" class="center"> 
 <div style = "text-align: center;">
<button onclick="location.href='./login.php'" type="button"> Login Steam </button>
</div>
</body>
</html>