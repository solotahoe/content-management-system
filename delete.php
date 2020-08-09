<?php
    $conne=@mysqli_connect(localhost,root,123, cms);


    if(isset($_GET['id'])){
    echo "id is set";

    $id=$_GET['id'];
     $conne -> select_db("ariticles");
           if($conne){
               $querry="DELETE  FROM articles  WHERE articla_id='".$id."'";

                $result=mysqli_query($conne, $querry);
               echo 'you are connected';
                 header('location:pages.php');

           }else {
               
             echo 'you are not connected';
               
           }

    }else{





    }

           



?>