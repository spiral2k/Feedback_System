<?php
include 'header.php';
?>

<body>
	<div class="navbar">
		<div class="insideNavbar">
			<div class="upperLogo"></div>
		</div>
	</div>

    
    <?php
    echo "<pre>";
    print_r($_SESSION['feedback']);
    echo "</pre>";
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

    <script>
        $(document).ready(function(){
            tinysort('ul#questionsList>li',{attr:'data-type'});
        });
    </script>
</body>
</html>