


<!DOCTYPE html>

<html lang="en">
<?php
session_start();
$usernameerr2;

 include_once('connections.php');
if(isset($_GET['logout'])){
    //echo 'get is set';
    session_destroy();
}else{
   // echo 'get is not set';
}

    if(isset($_POST['username'], $_POST['password'])){
        $username=$_POST['username'];
        $password= md5($_POST['password']);
         if(empty($username) or empty($password) ){
                $allerrors="all fields is required";
                $passworderr="password is required";
              
				
			}else{

                $query=$pdo->prepare("SELECT * FROM users WHERE user_name =? AND password=? ");
                $query->bindValue(1, $username);
                $query->bindValue(2, $password);

                $query->execute();

                $num= $query->rowCount();

                if($num == 1){
                  //userEnter the cooreect details
                  session_start();
                  $_SESSION['logged_in']= $_POST['username'];

                  header('location:index.php');
                  

                }else{
                    $erorr='username and passoword do not match';
                    
                }

            }
    }
		






?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>
    <script src="bootstrap.min.js"></script>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
</head>

<body>
    <!-- LEFT MENU BEGINS HERE -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Admin | ACCOUTN LOGIN</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
         
   
        </div>
    </nav>
    <!-- nav ends here -->
    <!-- heaader begins here -->


    <header id="header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center">Admin area | <small>Account login</small></h1>
                </div>
              
            </div>
        </div>
    </header>
    <!-- heaader ends here -->


    <section id="main">
        <div class="container">
            <div class="row">
              
                <div class="col-md-4 offset-4">
                  
                          <?php if(isset($allerrors)) {?>
                         <small style="color:red">   <?php  echo $allerrors;  ?> </small>  

                          <?php      } ?>

                           <?php if(isset($erorr)) {?>
                         <small style="color:red">   <?php  echo $erorr;  ?> </small>  

                          <?php      } ?>
                   
                 <form id="login" action="#" class="well" method="post" autocomplete="off">
                     <div class="form-group">
                         <label for="Email">Username</label>
                         <input type="text" class="form-control"  name="username" placeholder="Enter username">
                     </div>
                     <div class="form-group">
                         <label for="password">Passsword</label>
                         <input type="password"  class="form-control"  name="password" placeholder="password">
                     </div>
                     <button type="submit" class="btn btn-secondary btn-block">Login</button>
                  
                 </form>

                   


                </div>
                <!--card with the tabel ends here-->



            </div> <!--  row ends here       -->
        </div>
        <!--container ends here-->

    </section>
    <!-- footer begins here -->

    <footer id="footer" class="fott">
        <p class="mamam">copyright adimin &copy; 2020</p>
    </footer>

    <!-- footer ends here -->

    <!--  add page modals modals begnes here -->
    
    <!--  add page modals modals ends here -->
    
    <script src="app.js"></script>
</body>

</html>