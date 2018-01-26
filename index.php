<?php
    session_start();
    if(isset($_SESSION['username'])){
        require './include/main.php';
    }else{
        header("Location:login.php");
    }
    if(isset($_GET['name'])){
        session_unset();
        session_destroy();
        header("Location:login.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HwCompany</title>
    <link rel="stylesheet" href="res/css/bootstrap.min.css" />
    <link rel="stylesheet" href="res/css/font-awesome.min.css" />
    <link rel="stylesheet" href="res/css/style.css" />
    
</head>
<body>
    
    <nav class="navbar navbar-inverse">
        <div class="container">
            <ul class="nav navbar-nav">
                <li class="filter" data-filter="all"><a href="#">Home</a></li>
                <li class="filter" data-filter=".Computers"><a href="#">Computers</a></li> 
                <li class="filter" data-filter=".Mobiles"><a href="#">Mobile</a></li> 
            </ul>   

            <div class="nav-right">
                <span><?php echo $_SESSION['username'] ?></span>
                <a name="signout" href="?name=signout">sign out <i class="fa fa-sign-out"></i></a> 
            </span>


        </div>
    </nav>

    <div class="container">

        <div id="container" class="row">

            <?php
                error_reporting(0);
                foreach ($arr as $row) {
                    
                    echo '<div class="box mix ' . $cat[$row['cat_id']-1]['name'] . ' col-md-6 col-xs-12">';
                    echo '<h3 class="text-primary">' . $row['title'] . '</h3>';
                    echo '<p><i class="fa fa-bars"></i> ' . $cat[$row['cat_id']-1]['name']  . '</p>';
                    echo '<p><i class="fa fa-calendar"></i> ' . $cat[$row['cat_id']-1]['created_at'] . '</p>';
                    echo '<div class="box-img">';
                    echo '<img src="data:image;base64,' . $row['img'] . '" >';
                    echo '</div><div class="box-info"><p>' . $row['body'] . '</p><div class="form-group">';
                    echo '<button class="btn btn-success"><i class="fa fa-edit"></i> Edit</button>';
                    echo' <button class="btn btn-danger"><i class="fa fa-remove"></i> Del</button>';
                    echo '</div></div></div>';
                }
            ?>
        </div>

        <hr />
        <h2 class="text-center">Add New Post</h2>

        <form class="add-item" method="POST" action="<?php echo $_SERVER["PHP_SELF"] ?>"  enctype="multipart/form-data">
            <div class="form-group">
                <label>Title : </label>
                <input type="text" placeholder="Title" class="form-control" name="title" />
            </div>

            <div class="form-group">
                <label>Body : </label>
                <textarea placeholder="content" class="form-control" name="body" row="3"></textarea>
            </div>

            <div class="form-group">
                <label>Image : </label>
                <input type="file" name="image" />
            </div>

            <div class="form-group">
                <select class="form-control" name="category" >
                    <option value=1 selected>Computer</option>
                    <option value=2 >Mobiles</option>
                </select>
            </div>
           
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block" >
                    <i class="fa fa-plus"></i> New Post</button>
            </div>

        </form>

    </div>

    <div class="footer">
        <p class="text-center">Copyright &copy; 2017-<?php echo date("Y") ?> , created by Ahmed Shaker</p>
    </div>

    <script src="res/js/jquery.js"></script>
    <script src="res/js/jquery.mixitup.min.js"></script>
    <script src="res/js/main.js"></script>
    
</body>
</html>