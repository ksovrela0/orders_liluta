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
                                CONCAT(products_glasses.glass_width,'მმX', products_glasses.glass_height,'მმ') AS size,
                                orders.client_name,
                                orders_product.add_info AS comment
                        FROM products_glasses
                        JOIN orders ON orders.id = products_glasses.order_id AND orders.actived = 1
                        JOIN orders_product ON orders_product.id = products_glasses.order_product_id AND orders_product.actived = 1
                        WHERE products_glasses.actived = 1 AND products_glasses.id IN ($glass_id)");
        $glasses = $db->getResultArray();

        $html = '
        
        <!DOCTYPE html>
            <html>
                <head>
                    <meta charset="utf-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <title></title>
                    <style type="text/css">
                        .bechdva{
                            width: 50mm;
                            height: 35mm;
                        };
                        .bechdva >center ul{
                            list-style-type: none;

                        }

                        .damkveti{
                            display: block;
                        };

                        .minisid{
                            display: block;
                        };

                        .zoma{
                            display: block;

                        };
                        .barcode{
                            display: block;
                        };
                    </style>
                </head>
                <body>';
                foreach($glasses['result'] AS $glass){
                    $html .= '
                        <div class="bechdva">
                        
                            <ul style="list-style-type: none">
                                <li class="damkveti">
                                    '.$glass['client_name'].'
                                </li>
                                <li class="minisid">
                                    '.$glass['comment'].'
                                </li>
                                <li class="zoma">
                                    <b>'.$glass['size'].'</b>
                                </li>
                                <li class="barcode">
                                    <img src="includes/barcode/index.php?title='.$glass['id'].'">
                                </li>
                            </ul>

                        </div>
                    ';
                }
                
           $html .= '</body

        </html>
        
        
        ';

        $data['page'] = $html;
        
    break;

}

echo json_encode($data);
?>