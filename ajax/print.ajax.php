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
                                products_glasses.add_info,
                                IF((SELECT COUNT(*) FROM glasses_paths WHERE actived = 1 AND glass_id = products_glasses.id AND status_id IN (1,2,4,5,6)) = 0,'<span class=\"status_finished\">გასაცემი</span>',CASE
                                    WHEN lists_to_cut.id IS NOT NULL THEN IF(lists_to_cut.status_id = 3, IFNULL(IFNULL((SELECT name FROM `groups` WHERE id = (SELECT IF(gp1.status_id = 3 OR gp1.status_id IS NULL,gp2.path_group_id,gp1.path_group_id) FROM glasses_paths AS gp2 LEFT JOIN glasses_paths AS gp1 ON gp1.glass_id = gp2.glass_id AND gp1.sort_n = gp2.sort_n-1 AND gp1.actived=1  WHERE gp2.status_id IN (1,2) AND gp2.glass_id = products_glasses.id AND gp2.actived = 1 ORDER BY gp1.sort_n ASC LIMIT 1)), IFNULL((SELECT name FROM `groups` WHERE id = (SELECT path_group_id FROM glasses_paths WHERE status_id IN (4,5) AND actived = 1 AND glass_id = products_glasses.id ORDER BY sort_n ASC LIMIT 1)), (SELECT name FROM `groups` WHERE id = (SELECT path_group_id FROM glasses_paths WHERE status_id IN (3) AND actived = 1 AND glass_id = products_glasses.id ORDER BY sort_n DESC LIMIT 1)))), (SELECT name FROM `groups` WHERE id = lists_to_cut.status_id)),'ჭრა')
                                    
                                    ELSE IF(products_glasses.go_to_cut != 1,IFNULL(IFNULL((SELECT name FROM `groups` WHERE id = (SELECT IF(gp1.status_id = 3 OR gp1.status_id IS NULL,gp2.path_group_id,gp1.path_group_id) FROM glasses_paths AS gp2 LEFT JOIN glasses_paths AS gp1 ON gp1.glass_id = gp2.glass_id AND gp1.sort_n = gp2.sort_n-1 AND gp1.actived=1 WHERE gp2.status_id IN (1,2) AND gp2.glass_id = products_glasses.id AND gp2.actived = 1 ORDER BY gp1.sort_n ASC LIMIT 1)), IFNULL((SELECT name FROM `groups` WHERE id = (SELECT path_group_id FROM glasses_paths WHERE status_id IN (4,5) AND actived = 1 AND glass_id = products_glasses.id ORDER BY sort_n ASC LIMIT 1)), (SELECT name FROM `groups` WHERE id = (SELECT path_group_id FROM glasses_paths WHERE status_id IN (3) AND actived = 1 AND glass_id = products_glasses.id ORDER BY sort_n DESC LIMIT 1)))), (SELECT name FROM `groups` WHERE id = lists_to_cut.status_id)), '')
                                END) AS procc
                        FROM products_glasses
                        JOIN orders ON orders.id = products_glasses.order_id AND orders.actived = 1
                        JOIN orders_product ON orders_product.id = products_glasses.order_product_id AND orders_product.actived = 1
                        JOIN    glass_options ON glass_options.id = products_glasses.glass_option_id
                        LEFT JOIN		lists_to_cut ON lists_to_cut.glass_id = products_glasses.id AND lists_to_cut.actived = 1
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
                                    ID: '.$glass['id'].' '.$glass['procc'].'
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