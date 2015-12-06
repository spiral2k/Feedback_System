<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
//תמיכה בעברית
mysql_query("SET NAMES utf8");
?>

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
  
</head>

<body>

	<div class="navbar">
		<div class="insideNavbar">
			<div class="upperLogo"></div>
		</div>
	</div>

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
	    
    
    
<?php
//        echo "----POST----<BR>";
//        print_r($_POST);
//
//        echo "<BR><BR>----SESSION----<BR>";
//        print_r($_SESSION);

        //req files
        require_once('class/ReadDB.php');
        require_once('class/WriteDB.php');

        $ReadDB = new ReadDB();
        $WriteDB = new WriteDB();

        $question_count = $ReadDB->count_question();

        //stringfy questions, question id, and value
        for($i=1 ; $i <= $question_count ; $i++){
				//first: question text, sec: id of the question, third: value $$
                $anserwsString .= $_SESSION['feedback']["q".$i]."#".$_SESSION['feedback']["q".$i."id"]."#".$_POST["radio".$i]."$$";
        }

        $class = $_SESSION["class"];

        $feedback_count = $ReadDB->feedback_count();
        $feedback_count++;

        $year = $_SESSION['year'];

        $WriteDB->Send_Feedbacks($feedback_count, $class, $year, $anserwsString);


        echo "<div class='SentSuccess'><img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAEiUlEQVR4Xu1b3XETMRD+1gRegQoIFZBUQHhjcmaQ0kCSCjAVQCrAVIDTgCUGO8MbTgVxKiBUgHmF4GX2fGfsix2ffLof29FMZpKMpNP37Ur7oxUh56aMevSb6XmNeAeA/DxiYJuA7clPM3BFwBWAAYD+kKn/gPjcait/59Yoj5n3jdoh4BDAHo1AL90Y6APoMXB6pq387rV5I0AkfQ0cMtBIStfXiiMtaW4Bp740IzMBEfA3ABqi3r7ALphHtoUQ8TErEZkICNr6kIibBQJP8jJgpkb3wJwuS/xSBLw0ansL+CR7fNkPex7XuwaOv2orh6hTcybglVGKR+CLUve0gAYEHH/R1qYdIP2cCAiM+kCjvV7ZxkCzq+3btAtMTUBg1CcCjtJOXGY/BlpdbY/TrCEVAXWjDACVZsIK9bEdbfWi9SwkYJUknwSbRhNuJaBulJg4sfGr3D52tJ17bs0lIDrtRfVXvhGg51mHmQREdv6igqZuWWEMroHdWX7CTALqRn2rkJOzLOjkuF5H2xfJf94gYN+oo9rI0Vm7NgSOz7RtTQKbIiAKbL6vkeonhTjYAp5OBlBTBNSNeg/g3dqJfhrQSUdbwRm2MQEbIP0Y85QWjAkIjJJExoc1l34Ij4G3XW3Fx/mvAYFR3/PK5FSNVMksdbV9OiZAcng1QOz+xrQhsCs5xnALrInL6yq80EUOCQiMusiavXX9umt/ZvxiCrPMsmjJOGdqkm3uartL0en/M9NsOQ+OwYvK+tyuW8BjqnrQMwO8uOle0nESJFGVnZ88wUdKe0JBW1kivM5Zi52nLwA8mPGZ6m3VA+G58wpzHFAE+MgjOqeqOUCFgR95hH05AzhHYTpNXST4eGFeCZAbXMnLE6NHhIcu6MsAH7rCPjUgdi/D63EHEsoC750AKW4YAi9ihyUNCWWCDwkI2uqKCE9c1HVB39QklA2eGT/yMoMLSSgb/H8zmJ8jNJeESoAfmcHTvF3hGyQI8xLVTQQ23nz7JbbxSRHB0BQJssiKgJd0mC4qHB6TIAREIW2Zkg+VJQyH5Zd6W/VBeLaECrkMCUmQATWgdPBgXHYOrJTz3aXEYpXc3KSoaEEODpHL9ii0rzhA3QMblureXYzE1Ety9A9D3GKnKK5Q0Xn4mDhh9wnb8QXp3eXoJKnrrgVJ6U+dATERG10gEZNQxURp5u3POO8c2Bu1zXOLpO4x+utyIIrq/yXspC6SErarfmPkohHOZXLjrbDJhZIxCYFRLR+3sS4S89VXEh5dbW8t8F5YKxy5yZW8PruNqDTgZ5rBeZOukiakBe9EwAqFzbcWRycFnGoLTA4S6zBktKpmIsXU1QhHuT6ZiYkIi6kZrcrcKjPOrwlHhTyamtQGcZuJ0SxLG6L0eiNZ/+tiRZy3QHLyqMaowYxGUUQIcKLw4WSz1IeTNyJJeVQ1IsLnVdv4M5LJAaF5H2hlBR5PmlkDZqlblPYWMvYyZ5sZlyD0hkCr0o+n5+072SJ/gT0GdpghaejR8/mEloQXlcAVAwMiSAVn/x7Q8yXpeev7B5Y1Z0w12BDQAAAAAElFTkSuQmCC'><span>השאלון נשלח בהצלחה!</span></div>";

?>
    
</body>