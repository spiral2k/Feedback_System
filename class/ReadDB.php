<?php
session_start();
 header('Content-Type: text/html; charset=utf-8');  
 class ReadDB{

     
 
     //count how mutch feedbacks we have in DB    
     public function feedback_count(){
     
        $conn = $this->OpenDB();      
        $sql = ("SELECT * FROM `final_feedbacks`");
		$result = mysql_query($sql, $conn);
        $result = mysql_num_rows($result);
        $this->EndDB(); 

        return $result;
     }
     
     
     //count how mutch questions we have in DB
    public function count_question(){

        $conn = $this->OpenDB();      
        $sql = ("SELECT * FROM `questions`");
		$result = mysql_query($sql, $conn);
        $result = mysql_num_rows($result);
        $this->EndDB(); 

        return $result;
    }
     
     
    // check user login with random password
    public function check_login($userLoginPass){
        
        $conn = $this->OpenDB();      
        $hasValidPass = false;

        $sql = ("SELECT * FROM `temp_password` WHERE `password` = '$userLoginPass'");
		$result = mysql_query($sql, $conn);

        // if DB return results
        if( $result && mysql_num_rows($result) > 0){     
            while($row = mysql_fetch_array($result)) {
                
                if($row["status"]){

                    //check the pass conf and put it on sessions
                    $_SESSION['feedback_password']['year'] = $row['year'];
                    $_SESSION['feedback_password']['class'] = $row['class'];      

                    // Valid Pass
                    $hasValidPass = true;
                    
                    header("Location: mashov.php");
                    
                }else{
                     echo 'השאלה לא פעילה';  
                }
                
            }  
        }else{
            echo '<div class="notification red"> <div class="insideNavbar" style="text-align:center;"><span>לא נמצא שאלון המקושר לסיסמא.</span></div></div>';  
        }
        
        $this->EndDB();  

        return $hasValidPass;
    }
     
     
     
	public function get_question() {
        
        $conn = $this->OpenDB();
            
            // Unique id for row
            $uniqueID_Row = 1; 
        
            // Unique id for radio buttons
            $uniqueID = 0;    

        
            //תמיכה בעברית
            mysql_query("SET NAMES 'utf8'");

        
            //Div Header
        	echo '<div class="bodyWarp">
		              <div class="insideBody">
                      <div class="warpWhite"><ul id="questionsList">';

            // questions block results
        
            $sql = ("SELECT * FROM `questions`");
			$result = mysql_query($sql, $conn);
        
            while($row = mysql_fetch_array($result)) {
                                
            echo '<li class="questionBlock" data-type="'. $row["type"] .'">
                <div class="radiosMainDiv">
                    <div class="radioLabels">
                        <div class="smallerLabel">
                            נמוך
                        </div>

                        <div class="biggerLabel">
                            גבוהה
                        </div>              
                    </div>
                    
                      <label for="q'.$uniqueID.'">
                        <input type="radio" value="5" name="radio'.$uniqueID_Row.'" id="q'.$uniqueID++.'"><span></span>
                      </label>

                      <label for="q'.$uniqueID.'">
                        <input type="radio" value="4" name="radio'.$uniqueID_Row.'" id="q'.$uniqueID++.'"> <span></span>
                      </label>

                      <label for="q'.$uniqueID.'">
                        <input type="radio" value="3"  name="radio'.$uniqueID_Row.'" id="q'.$uniqueID++.'"> <span></span>
                      </label>
                    
                      <label for="q'.$uniqueID.'">
                        <input type="radio" value="2" name="radio'.$uniqueID_Row.'" id="q'.$uniqueID++.'"> <span></span>
                      </label>

                      <label for="q'.$uniqueID.'">
                        <input type="radio" value="1" name="radio'.$uniqueID_Row.'" id="q'.$uniqueID++.'"> <span></span>
                      </label>
                                      

                    </div>
                    <div class="questionDiv">
                        '. $row["question"] .'
                    </div>
                </li>';
                
                //insert questions and questions ID to SESSION to push it later to DB
                $_SESSION['feedback']["q".$uniqueID_Row] = $row["question"];
                $_SESSION['feedback']["q".$uniqueID_Row."id"] = $row["id"];
                
				$uniqueID_Row++;		
			}

                	echo '
                          </ul></div>
                        </div>
		              </div>
                      
                      ';
        
        $this->EndDB();
        
    }
     
   function OpenDB(){
					/* Connecting & Selecting */
					$ind_connect = mysql_connect("localhost:8888","root","root");
					$ind_db = mysql_select_db("feedback_system", $ind_connect);
                    mysql_set_charset('utf8',$ind_connect);
					return $ind_connect;
	}
	
	function EndDB(){
				/* SQL ENDS */
				mysql_close();
	}
     
 }

?>
