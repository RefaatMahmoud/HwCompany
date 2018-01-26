<?php
if(file_exists(__DIR__ . "/dataItem.php")){
    require_once __DIR__.'/dataItem.php';

    $show = new dataItem();
    $arr = $show->getData("posts");
    $cat = $show->getData("categories");

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        $title = filter_var($_POST['title'],FILTER_SANITIZE_STRING);
        $title = addslashes($title);
        $body = filter_var($_POST['body'],FILTER_SANITIZE_STRING);
        $body = addslashes($body);
        $category = filter_var($_POST['category'],FILTER_VALIDATE_INT);
        
        $chk = getimagesize($_FILES['image']['tmp_name']);
        usleep(200000);
        if($chk== FALSE){
            $error = "please select an image !";
        }else{
            $img = addslashes($_FILES['image']['tmp_name']);
            $img = file_get_contents($img);
            $img = base64_encode($img);

            $add = new dataItem();
            $add->setInfo($title,$body,$img,$category);
            $show = new dataItem();

            $arr = $show->getData("posts");
            $cat = $show->getData("categories");
            $arr = $show->getData("posts");
            $cat = $show->getData("categories");
        }
    }

}