<?php   
    echo "welcme to delete pics.com";
    $conne=@mysqli_connect(localhost,root,123, cms);


    if(isset($_GET['id'])){
    echo "id is set";

    $id=$_GET['id'];
     $conne -> select_db("team");
           if($conne){
               $querry="DELETE  FROM team  WHERE image_id='".$id."'";

                $result=mysqli_query($conne, $querry);
               echo 'you are connected';
                  header('location:post.php');

           }else {
               
             echo 'you are not connected';
               
           }

    }else{





    }

          
?>