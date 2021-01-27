<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );
require_once "autoload.php";

$prod_naam = $_POST['prod_naam'];
$prod_prijs = $_POST['prod_prijs'];
$prod_beschrijving = $_POST['prod_beschrijving'];
$prod_aantal = $_POST['prod_aantal'];
$prod_cat_id = $_POST['prod_cat_id'];
$naam = $_POST['naam'];

if(isset($_POST['submit'])&& isset($_FILES['my_image'])) {
    //echo "<pre>";
    //print_r($_FILES['my_image']);
    //echo "</pre>";

    $img_name = $_FILES['my_image']['name'];
    $img_size = $_FILES['my_image']['size'];
    $tmp_name = $_FILES['my_image']['tmp_name'];
    $error = $_FILES['my_image']['error'];

    if($error === 0) {
        if($img_size > 25000000){
            $em = "Sorry, your file is too large!";
            header("location: ../add.php?error=$em");
        } else {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);

            $allowed_exs = array("jpg", "jpeg", "png");

            if(in_array($img_ex_lc,$allowed_exs)){
               // $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                $new_img_name = "IMG-".$naam.'.'.$img_ex_lc;
                $img_upload_path = '../uploads/'.$new_img_name;
                move_uploaded_file($tmp_name,$img_upload_path);

                //INSERT INTO DATABASE
                $result = ExecuteSQL("INSERT INTO producten(prod_naam, prod_prijs, prod_beschrijving, prod_aantal, prod_cat_id, prod_image)values ('$prod_naam','$prod_prijs','$prod_beschrijving','$prod_aantal','$prod_cat_id','$new_img_name')");

                header("location: ../admin.php");


            } else {
                $em = "You can't upload file of this type!";
                header("location: ../add.php?error=$em");
            }
        }
    } else {
        $em = "unknown error occurred!";
        header("location: ../add.php?error=$em");
    }

} else {
    $em = "doet niks!";
    header("location: ../add.php?error=$em");
}