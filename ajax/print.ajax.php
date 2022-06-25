<?php
error_reporting(E_ERROR);
include('../db.php');
GLOBAL $db;
$db = new dbClass();
$act = $_REQUEST['act'];
$user_id = $_SESSION['USERID'];

switch ($act){
    case 'print':
        $glass_id = $_REQUEST['glass_id'];

        $db->setQuery(" SELECT products_glasses.id,
                                CONCAT(products_glasses.glass_width,'სმX', products_glasses.glass_height,'სმ') AS size,
                                orders.client_name
                        FROM products_glasses
                        JOIN orders ON orders.id = products_glasses.order_id AND orders.actived = 1
                        WHERE products_glasses.actived = 1 AND products_glasses.id = '$glass_id'");
        $glass = $db->getResultArray()['result'][0];

        $html = '
        
        <html>
            <body>
                <style>
                @page { size: 65mm 60mm }
                p{
                    margin: 0;
                }
                </style>
                <p>'.$glass['client_name'].'<p>
                <p>'.$glass['size'].'<p>
                <p><img src="includes/barcode/index.php?title='.$glass['id'].'"><p>
            </body

        </html>
        
        
        ';

        $data['page'] = $html;
        
    break;

}

echo json_encode($data);
?>