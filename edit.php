


<!DOCTYPE html>
<html lang="en">
<?php


include_once('booststrap/iclu/connections.php');
include_once('booststrap/iclu/article.php');
 

if(isset($_GET['id'])){
   // echo "id is set";

    $id=$_GET['id'];
     $article = new  Article;
     $articles= $article -> fetch_one($id);

    if(isset($_POST['editor1'], $_POST['textareacode'])){

        $title=$_POST['textareacode'];
        $body=$_POST['editor1'];
         if(empty($title) or empty($body)){
        
        $error="nothing was changed";
        echo $error;
        }else {
            
            $conne=@mysqli_connect(localhost,root,123, cms);

            $conne -> select_db("team");
           if($conne){
               $querry="UPDATE  articles SET article_title='".$title."', article_content='".$body."' WHERE articla_id='".$id."'";

               $result=mysqli_query($conne, $querry);
               echo 'you are connected';
                header('location:pages.php');

           }else {
               
             echo 'you are not connected';
               
           }
          
        // $querry= $pdo->prepare("UPDATE articles SET article_title=?, article_content=? WHERE articla_id=?");


        // $querry->bindValue(1,  $title);
        // $querry->bindValue(2,  $body);
        // $querry->bindValue(3,  $id);
      
 
     
        }
    }else{
       

    }
    // print_r($articles);
    //   $querry= $pdo->prepare('INSERT INTO articles( article_title, article_content) VALUES (?,?)');

    //     $querry->bindValue(1,  $title);
    //     $querry->bindValue(2,  $body);
      

    //     $querry->execute();



}else{
        echo 'id is not set';
        header('location:pages.php');

}







if(isset($_POST['textareacode'], $_POST['editor1'])){


    // if(empty($title) or empty($body)){
        
    //     $error="nothing was changed";
    //     echo $error;

    // }else{
    //     // $querry= $pdo->prepare('INSERT INTO articles( article_title, article_content) VALUES (?,?)');

    //     // $querry->bindValue(1,  $title);
    //     // $querry->bindValue(2,  $body);
      

    //     // $querry->execute();
        
  
                        
                     
                        
                     
        


    // }

}

if(isset($_POST['page_title'], $_POST['editor1'])){

    $title=$_POST['page_title'];
    $body=$_POST['editor1'];
     $conne=@mysqli_connect(localhost,root,123, cms);
     if($conne){
                 echo 'connected';
                $querry3="insert into articles(article_title, article_content) VALUES ('$title', '$body')";
                    $runn=mysqli_query($conne, $querry3);
                    
                    if($runn){
                        echo 'querry ran well';
                    }else{
                        echo 'querry not ran';
                    }
            }else{
                echo 'not connected';
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
        <a class="navbar-brand" href="#">Admin</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="index.php">Dashboard <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pages.php">pages</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="post.php">post</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="users.php">user</a>
                </li>

            </ul>
            <!-- LEFT MENU ENDS HERE -->

            <!-- login details begins here -->

            <ul class="navbar-nav navbar-right">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Welcome solo <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">logout</a>
                </li>

            </ul>

            <!-- login details ends here -->


            <!-- <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form> -->
        </div>
    </nav>
    <!-- nav ends here -->
    <!-- heaader begins here -->


    <header id="header">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <h1><i class="fa fa-cog" aria-hidden="true"></i> EDIT  <small>Edit yoursite</small></h1>
                </div>
                <div class="col-md-2">
                    <div class="dropdown Create">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Create content
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" type="button" data-toggle="modal" data-target="#addpage">Add
                                page</a>
                            <a class="dropdown-item" href="#">Add post</a>
                            <a class="dropdown-item" href="#">Add user</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- heaader ends here -->

    <section id="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item"> <a href="pages.php" class="btn-btn-primary">pages</a></li>
                <li class="breadcrumb-item">Edit page</li>

            </ol>
        </div>
    </section>

    <section id="main">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="list-group">

                        <a href="index.php" class="list-group-item list-group-item-action  active main-color-bg"><i
                                class="fa fa-cog" aria-hidden="true"></i> Dashboard</a>
                        <a href="pages.php" class="list-group-item list-group-item-action"> <i
                                class="fa fa-address-book-o" aria-hidden="true"></i> Pages<span
                                class="badge badge-light">12</span></a>
                        <a href="Post.php" class="list-group-item list-group-item-action"> <i
                                class="fa fa-address-card-o" aria-hidden="true"></i> Post<span
                                class="badge badge-light">200</span></a>
                        <a href="users.php" class="list-group-item list-group-item-action"> <i
                                class="fa fa-user-circle-o" aria-hidden="true"></i> Users <span
                                class="badge badge-light">2</span></a>

                    </div>

                    <br>
                    <div class="card">
                        <div class="card-title">
                            <h4>Disc space used</h4>
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%">75%</div>
                        </div>

                        <br>
                        <div class="card-title">
                            <h4>Bandwith used</h4>
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 40%">40%</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header main-color-bg">
                            <h3 class="card-title ">
                            Edit page
                            </h3>
                        </div>
                      
                    </div>
                      


 
                            <form method="post" action="#" >
                             
                                    <div class="form-group">
                                        <label for="formGroupExampleInput2">metatag</label>
                                        <input type="text" class="form-control" name="meta"  id="formGroupExampleInput2" placeholder="Another input placeholder">
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput2"> Card Title </label>
                                        <input type="text" class="form-control" id="formGroupExampleInput2" value="<?php echo $articles['article_title']; ?>"  name="textareacode" placeholder="Another input placeholder">
                                    </div>
                                    <div class="form-group">
                       
                                        <label for="formGroupExampleInput2">Card body</label>
                                        <textarea class="form-control" name="editor1" placeholder="add your text here"> <?php  echo $articles["article_content"];  ?></textarea>
                                    </div>
                                           <!-- <div class="alert alert-success" role="alert">   </div>  -->

                                       
                                    <input type="submit" class="btn btn-success" value="update">
                            
                            </form>
                                  
                              
                                    
                               
                        </div>
                    </div>

       
                </div>

                <!--card with the tabel ends here-->



            </div> <!--  row ends here       -->
        </div>
        <!--container ends here-->

    </section>
    <!-- footer begins here -->

    <footer id="footer">
        <p>copyright adimin &copy; 2020</p>
    </footer>

    <!-- footer ends here -->

    <!--  add page modals modals begnes here -->
     <div class="modal fade" id="addpage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="#">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">ADD PAGE</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="formGroupExampleInput">page Title</label>
                            <input type="text" class="form-control" id="formGroupExampleInput"
                                placeholder="Example input placeholder" name="page_title">
                        </div>
                       
                    </div>
                    <div class="form-group">
                            <label for="formGroupExampleInput2">section body</label>
                            <textarea class="form-control" name="editor1" placeholder="add your text here"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Section</button>
                    </div>

                    
                </form>
            </div>
        </div>
    </div>
   
    <!--  add page modals modals ends here -->






    <script>
        CKEDITOR.replace('editor1');
    </script>
    <script src="app.js"></script>
</body>

</html>