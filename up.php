<?php
error_reporting(E_ERROR);
require 'db.php';
global $db;
$db      = new dbClass();
$act            = $_REQUEST['act'];
$user_id 		= $_SESSION['USERID'];
$original_name	= $_REQUEST['original'];
$type		    = $_REQUEST['ext'];
$new_name		= $_REQUEST['newName'];
$chatID	        = $_REQUEST['chatID'];

$new = $new_name.'.'.$type;
if($act == 'product_img'){
    if (0 < $_FILES['file']['error']) {
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    } else {
        if(move_uploaded_file($_FILES['file']['tmp_name'], 'assets/uploads/' . $new_name.'.'.$type))
        {
            $product_id = $_REQUEST['product_id'];
            $db->setQuery(" SELECT  COUNT(*) AS cc
                            FROM    orders_product
                            WHERE   id = '$product_id' AND actived = 1");
            $isset = $db->getResultArray();
            $pic = "assets/uploads/". $new_name.'.'.$type;
            if($isset['result'][0]['cc'] == 0){
                $db->setQuery("INSERT INTO orders_product SET id = '$product_id', picture = '$pic'");

                $db->execQuery();
            }

            else{
                $db->setQuery(" UPDATE  orders_product 
                                SET     picture='$pic'
                                WHERE   id='$product_id'");
                $db->execQuery();
            }

            echo json_encode(array("status" => 'OK', "src" => $pic));
        }
        else{
            echo 'error';
        }
    }
}
else if($act == 'upload_object_default_product'){
    $object_id = $_REQUEST['object_id'];
    if (0 < $_FILES['file']['error']) {
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    } else {
        if(move_uploaded_file($_FILES['file']['tmp_name'], 'assets/media/images/obj/product/' . $new_name.'.'.$type))
        {

            $img = 'assets/media/images/obj/product/' . $new_name.'.'.$type;
            $query = "UPDATE objects SET default_product_image='$img' WHERE id='$object_id'";
            $db->setQuery($query);
            $db->execQuery();

            echo $img;



        }
    }
}
else if($act == 'upload_object_default_cat'){
    $object_id = $_REQUEST['object_id'];
    if (0 < $_FILES['file']['error']) {
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    } else {
        if(move_uploaded_file($_FILES['file']['tmp_name'], 'assets/media/images/obj/cat/' . $new_name.'.'.$type))
        {

            $img = 'assets/media/images/obj/cat/' . $new_name.'.'.$type;
            $query = "UPDATE objects SET default_cat_image='$img' WHERE id='$object_id'";
            $db->setQuery($query);
            $db->execQuery();

            echo $img;



        }
    }
}
else if($act == 'upload_object_logo'){
    $object_id = $_REQUEST['object_id'];
    if (0 < $_FILES['file']['error']) {
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    } else {
        if(move_uploaded_file($_FILES['file']['tmp_name'], 'assets/media/images/obj/' . $new_name.'.'.$type))
        {

            $img = 'assets/media/images/obj/' . $new_name.'.'.$type;
            $query = "UPDATE objects SET logo='$img' WHERE id='$object_id'";
            $db->setQuery($query);
            $db->execQuery();

            echo $img;



        }
    }
}
else if($act == 'upload_product_img'){
    $product_id = $_REQUEST['product_id'];
    if (0 < $_FILES['file']['error']) {
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    } else {
        if(move_uploaded_file($_FILES['file']['tmp_name'], 'assets/media/products/' . $new_name.'.'.$type))
        {

            $img = 'assets/media/products/' . $new_name.'.'.$type;
            $query = "UPDATE products SET back_img='$img' WHERE id='$product_id'";
            $db->setQuery($query);
            $db->execQuery();

            echo $img;



        }
    }
}
else if($act == 'upload_cat_img'){
    $cat_id = $_REQUEST['cat_id'];
    if (0 < $_FILES['file']['error']) {
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    } else {
        if(move_uploaded_file($_FILES['file']['tmp_name'], 'assets/media/images/menu/' . $new_name.'.'.$type))
        {

            $img = 'assets/media/images/menu/' . $new_name.'.'.$type;
            $query = "UPDATE product_categories SET back_img='$img' WHERE id='$cat_id'";
            $db->setQuery($query);
            $db->execQuery();

            echo $img;



        }
    }
}

?>