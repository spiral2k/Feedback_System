<?php session_start(); ?>

<!doctype html>
<html lang="he">
<head>
  <title>משוב למשתמש</title>

  <!-- meta -->
  <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
  <meta name="author" content="Meni Edri">

  <!-- CSS -->
  <link rel="stylesheet" href="css/style.css">

  <!-- JS -->
  <script src="js/jquery.js"></script>
  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinysort/2.2.2/tinysort.js"></script>
    
    <script>
        
        $(document).ready(function(){
            tinysort('ul#questionsList>li',{attr:'data-type'});           
        });

    </script>
    
</head>

<body>
	<div class="navbar">
		<div class="insideNavbar">
			<div class="upperLogo"></div>
		</div>
	</div>

    
    <?php
    print_r($_SESSION);
    
    ?>
    
	<div class="header paddTop30">
		<div class="inside">
			<div class="insideHeader">
				<div class="headerRight">
					<div class="headerTitle">
						שאלון להערכת מרצה – תשס"ו
					</div>

					<div class="headerInfo">
				    כיתה: <?php echo $_SESSION['feedback']['class'] ;?>
					</div>
					
					<div class="headerInfo">
					מרצה: <?php echo $_SESSION['feedback']['teacher'] ;?>
					</div>
					<div class="headerInfo">
					שם קורס: <?php echo $_SESSION['feedback']['course'] ;?>
					</div>
				</div>

			</div>			
		</div>
	</div>
	
    
    <form action="Form_Sender.php" method="post">
        <!-- Question Loop -->
        <?php
         require_once('class/ReadDB.php');
         $questions_loop = new ReadDB();
         $res = $questions_loop->get_question();
        ?>
    
         <div class="insideBodyNoBG">
            <input type="submit" class="sendButton" name="SendFeedback" value="שליחת משוב">
         </div>
    </form>
    

</body>
  <script src="js/scripts.js"></script>
</html>