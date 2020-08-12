<!DOCTYPE html>
<html lang="en">
<?php

include_once('booststrap/iclu/connections.php');
include_once('booststrap/iclu/article.php');
// include_once('booststrap/iclu/anotherArticle.php');


 $article = new  Article;
$articles= $article -> fetch_all();

$articleusers = new  Article;
$articlesusersarray= $articleusers -> fetch_allusers();
// echo md5('password');
//checking if the user is logged in
if(isset($_GET['pages'])){
   // echo "pages is set";
}else{
    //echo 'pages is not set';
    header('location:login.php');
}

if(isset($_POST['page_title'], $_POST['editor1'])){

    $title=$_POST['page_title'];
    $body=$_POST['editor1'];
     $conne=@mysqli_connect(localhost,root,123, cms);
     if($conne){
                // echo 'connected';
                $querry3="insert into articles(article_title, article_content) VALUES ('$title', '$body')";
                    $runn=mysqli_query($conne, $querry3);
                    
                    if($runn){
                       // echo 'querry ran well';
                    }else{
                      //  echo 'querry not ran';
                    }
            }else{
               // echo 'not connected';
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
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
  
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>              
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>           
  
    <link rel="stylesheet"  href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"/>
          
</head>

<body>
    <!-- LEFT MENU BEGINS HERE -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Admin | pages</a>
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
                    <a class="nav-link" href="pages.php?pages=pages">pages</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="post.php?post=post">team</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="users.php?users=users">user</a>
                </li>

            </ul>
            <!-- LEFT MENU ENDS HERE -->

            <!-- login details begins here -->

            <ul class="navbar-nav navbar-right">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Welcome solo <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php?logout=logout">logout</a>
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
                    <h1><i class="fa fa-cog" aria-hidden="true"></i> pages <small>manage your pages</small></h1>
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
                            <a class="dropdown-item"  data-toggle="modal" href="#">Add post</a>
                            <a class="dropdown-item"  data-toggle="modal" href="#">Add user</a>
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
                <li  class="breadcrumb-item"><a href="index.php">Dashboard </a></li> 
                <li class="breadcrumb-item active">pages</li>

            </ol>
        </div>
    </section>

    <section id="main">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="list-group">

                        <a href="index.html" class="list-group-item list-group-item-action  active main-color-bg"><i
                                class="fa fa-cog" aria-hidden="true"></i> Dashboard</a>
                        <a href="pages.php?pages=pages" class="list-group-item list-group-item-action"> <i
                                class="fa fa-address-book-o" aria-hidden="true"></i> Pages<span
                                class="badge badge-light"><?php echo sizeof($articles);  ?></span></a>
                        <a href="Post.php?post=post" class="list-group-item list-group-item-action"> <i
                                class="fa fa-address-card-o" aria-hidden="true"></i> team<span
                                class="badge badge-light">200</span></a>
                        <a href="users.php?users=users" class="list-group-item list-group-item-action"> <i
                                class="fa fa-user-circle-o" aria-hidden="true"></i> Users <span
                                class="badge badge-light"><?php  echo sizeof($articlesusersarray);   ?></span></a>

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
                                Pages
                            </h3>
                        </div>
                        <div class="card-body">
                           
                        </div>
                        <br>
                        <table  id="mydatatable" class="table table-striped table-bordered" >
                            <thead>
                                <tr> 
                                    <th>Sections title</th>
                                    <th>Pusblished</th>
                                    <th>section Conent</th>
                                    <th>action</th>    
                                    <th>action</th>    
                                </tr>
                            </thead>
                            <tbody>
                           
                            <?php foreach($articles as $article) {
                                echo '
                                   <tr>  
                                    <td> '.$article["article_title"].' </td>
                                    <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                    <td> '.$article['article_content'].' </td>
                                     <td><a type="button" class="btn btn-primary" href="edit.php?id='.$article['articla_id'].'">Edit</a></td>
                        
                                   <td> <a href="delete.php?id='.$article['articla_id'].'" type="button" class="btn btn-danger">Delete</a></td>
                               </tr> ';
                             } ?>
                            
                               
                            </tbody>
                        </table>
                
                      
                    </div>


           
                </div>
                <!--card with the tabel ends here-->



            </div> <!--  row ends here       -->
        </div>
        <!--container ends here-->

    </section>
    <!-- footer begins here -->

    <footer id="footer" class="fota">
        <p>copyright adimin &copy; 2020</p>
    </footer>

    <!-- footer ends here -->

    <!--  add page modals modals begnes here -->
   
    <!--  add page modals modals ends here -->

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




    <script>
        CKEDITOR.replace('editor1');
    </script>
<script  type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script> 
 <script type="text/javascript"> 
 $(document).ready(function(){  
     $("#mydatatable").DataTable();
 }); 
</script>
 



    <script src="app.js"></script>
</body>

</html>