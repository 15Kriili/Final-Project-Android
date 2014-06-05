<meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height, target-densitydpi=device-dpi" />
<BODY BACKGROUND="starbg.png"
<?php

/********** Get the old post information      **********/

   
	$myNamePHP=mysql_real_escape_string($_POST['myNamePost']);
	$myScorePHP=mysql_real_escape_string($_POST['myScorePost']);
	


/********** create html input text boxes using the old post information      **********/

?>

<form action="FinalProjectDataBase.php" method="post">

<font color="red"><font size="6"><center>
LEADERBOARDS FOR THE SPACE GAME!!!	
  <input type="text" style="visibility: hidden" name="myNamePost"  value="<?php echo $myNamePHP; ?>"><br>
  <input type="text" style="visibility: hidden" name="myScorePost"  value="<?php echo $myScorePHP; ?>"><br>
  
   
   <input type="submit" style="visibility: hidden" /></p>
</form>



<?php

/********** Access the database      **********/



   $username = "hpssStudent";
   $password = "pass2";
   $host = "localhost";
   $database = "cp12";
   $table = "a14Kristoff";
		
   mysql_connect($host,$username,$password)or die(mysql_error());
   mysql_select_db($database)or die(mysql_error());






/********** If a name is not empty then update a record      **********/

   if ($myNamePHP != ''){	
      if (!mysql_query("INSERT $table SET myScore ='$myScorePHP', myName ='$myNamePHP'  "))
        {
          die('Error: ' . mysql_error());
         }
      echo "1 record updated";
   }





   $sql = "SELECT*FROM $table ORDER BY myScore DESC LIMIT 10";
   




   $result = mysql_query($sql);
   if(mysql_num_rows($result) >0){
      while($row=mysql_fetch_array($result)){


/********** here we print each database entry      **********/

         echo "Name = $row[myName]  - ";
         echo "Score =$row[myScore]  <br>";
        
      }
   }









mysql_close();    
?>


<input type=button value="Play again!" style="font-size:30px" value="FinalPrjpart1" onClick="{
  location='Finalprjpart1.html'
}"> 


