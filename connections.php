<?php
try{

    $pdo = new PDO('mysql:host=localhost;dbname=cms','root', '123');
} catch (PDOException $e){

    exit("databaso eror.");

}

// $conne=@mysqli_connect(localhost,root,123, cms);
//  if ($conne){
// 	 echo "HAKUNA MATATA";
	  
//  }
//  else{
	 
// 	 die("badoo brathe"); 
// 	 echo "<p>" .mysqli_error($conne). "</p>";
//  }

?>