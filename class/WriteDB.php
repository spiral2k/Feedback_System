<?php
session_start();
 header('Content-Type: text/html; charset=utf-8');  

 class WriteDB{
 
    public function Send_Feedbacks($feedback_count, $class, $year, $anserwsString){
         
        $conn = $this->OpenDB();    
     
        $sql = ("INSERT INTO final_feedbacks (id,class_id,year,answers) VALUES ('$feedback_count','$class','$year','$anserwsString')");
		$result = mysql_query($sql, $conn);
        
        
        $this->EndDB();
    }
     
     
    public function OpenDB(){
					/* Connecting & Selecting */
					$ind_connect = mysql_connect("localhost:8888","root","root");
					$ind_db = mysql_select_db("feedback_system", $ind_connect);
                    mysql_set_charset('utf8',$ind_connect);
					return $ind_connect;
	}
	
    public function EndDB(){
				/* SQL ENDS */
				mysql_close();
	}
     
 }

?>
