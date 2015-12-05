<?php session_start(); 
ob_start();
?>

<!doctype html>
<html lang="he">
<head>
  <title>משוב למשתמש</title>

  <!-- meta -->
  <meta charset="utf-8" />
  <meta name="author" content="Meni Edri">

  <!-- CSS -->
  <link rel="stylesheet" href="css/style.css">

  <!-- JS -->
  <script src="js/jquery.js"></script>
  
</head>

<body>
	<div class="navbar">
		<div class="insideNavbar">
			<div class="upperLogo"></div>
		</div>
	</div>

<?php 

        if(isset($_POST['userLogin'])){
            
            require_once('class/ReadDB.php');
            
            $_SESSION['user']['password'] = $_POST['userLogin'];  
               
            $login = new ReadDB();
            $res = $login->check_login($_SESSION['user']['password']);
            
        }
    
    ?>
    
    
	<div class="header paddTop30">
		<div class="inside">
         <div class="insideBodyNoBG">
             <div class="userIndexLogin">
                 <span>התחברות לשאלון</span> 
                <form action="" method="post">
                    <input type="text" name="userLogin" class="userLoginInput">
                    <input type="submit" name="sendUserLogin" value="כניסה לשאלון" class="userLoginSubmit" autocomplete="off">
                </form>
                 </div>
			</div>			
		</div>
	</div>
    
    
    
</body>
  <script src="js/scripts.js"></script>
</html>