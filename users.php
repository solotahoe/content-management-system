<!DOCTYPE html>
<html lang="en">
    <?php

include_once('booststrap/iclu/connections.php');
include_once('booststrap/iclu/article.php');
// include_once('booststrap/iclu/anotherArticle.php');

///users array
 $article = new  Article;
$articles= $article -> fetch_allusers();

 
 //print_r(sizeof($articles));


// echo md5('password');


//pages array 
$articlepages = new  Article;
$articlespage= $articlepages -> fetch_all();
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

  if(isset($_GET['users'])){
   // echo "users are set";
}else{
   // echo 'users are not set';
    header('location:login.php');
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
        <a class="navbar-brand" href="#">Admin | users</a>
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

                <li class="nav-item active">
                    <a class="nav-link " href="post.php?post=post">Team</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="">user</a>
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
                    <h1><i class="fa fa-cog" aria-hidden="true"></i> Users <small>manage your users</small></h1>
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

                <li class="breadcrumb-item"><a href="index.php">Dashboard </a></li>
                <li class="breadcrumb-item active">Users</li>

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
                        <a href="pages.php?pages=pages" class="list-group-item list-group-item-action"> <i
                                class="fa fa-address-book-o" aria-hidden="true"></i> Pages<span
                                class="badge badge-light"><?php echo sizeof($articlespage)   ?></span></a>
                        <a href="post.php?post=post" class="list-group-item list-group-item-action"> <i
                                class="fa fa-address-card-o" aria-hidden="true"></i> Team<span
                                class="badge badge-light">200</span></a>
                        <a href="users.php?users=users" class="list-group-item list-group-item-action"> <i
                                class="fa fa-user-circle-o" aria-hidden="true"></i> Users <span
                                class="badge badge-light"><?php echo  sizeof($articles)   ?></span></a>

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
                                Users
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" placeholder="filter-users">
                                </div>
                            </div>
                        </div>
                        <br>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                              
                               
                                <th scope="col">UserName</th>
                                 <th scope="col">User Email</th>
                                 <th scope="col">is Admin</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                             <?php foreach($articles as $article) {?>
                            <tr>
  
                                <td><?php echo $article["user_name"]; ?></td>
                                <td><?php echo $article["email"]; ?></td>
                                <td>Yes</td>
                            
                            </tr>
                     <?php } ?>
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

    <footer id="footer" class="fotaa">
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