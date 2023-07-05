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
                                CONCAT(CONCAT(products_glasses.glass_width, ' x ', products_glasses.glass_height), IF(products_glasses.not_standard = 1, '*','')) AS size,
                                orders.client_name,
                                orders_product.add_info AS comment,
                                products_glasses.last_pyramid,
                                products_glasses.add_info
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
                            font-size: 13px;
                        };

                        .minisid{
                            display: block;
                            font-size: 13px;
                        };

                        .zoma{
                            display: block;
                            font-size: 13px;

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
                                <li class="damkveti" style="font-size: 13px;">
                                    '.$glass['client_name'].'
                                </li>
                                <li class="minisid" style="font-size: 13px;">
                                    '.$glass['comment'].' '.$glass['add_info'].'
                                </li>
                                <li class="zoma" style="font-size: 13px;">
                                    <b style="font-size: 13px;">'.$glass['size'].'</b>
                                    <br>
                                    ID: '.$glass['id'].' პირ: '.$glass['last_pyramid'].'
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