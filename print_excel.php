<?php
session_start();
error_reporting(E_ERROR);
include('includes/excel/PHPExcel.php');
include('includes/excel/Writer/Excel5.php');
include('db.php');
GLOBAL $db;
$db = new dbClass();
$act = $_REQUEST['act'];
$user_id = $_SESSION['USERID'];


switch($act){
    case 'raskroi_excel':
        $product_id = $_REQUEST['product_id'];

        $option_id  = $_REQUEST['option_id'];
        $manuf_id   = $_REQUEST['manuf_id'];
        $color_id   = $_REQUEST['color_id'];

        $client   = $_REQUEST['client'];

        $size   = explode('-',$_REQUEST['size']);

        $where = '';

        if($option_id != ''){
            $where .= " AND products_glasses.glass_option_id = '$option_id'";
        }
        if($manuf_id != ''){
            $where .= " AND products_glasses.glass_manuf_id = '$manuf_id'";
        }
        if($color_id != ''){
            $where .= " AND products_glasses.glass_color_id = '$color_id'";
        }

        if($client != ''){
            $where .= " AND orders.id IN ($client)";
        }

        if($size[0] != ''){
            $where .= " AND products_glasses.glass_width = '$size[0]' AND products_glasses.glass_height = '$size[1]'";
        }


        $db->setQuery(" SELECT  products_glasses.id,
                                products_glasses.glass_option_id,
                                products_glasses.glass_type_id,
                                products_glasses.glass_color_id,
                                products_glasses.glass_manuf_id,
                                products_glasses.glass_width,
                                products_glasses.glass_height,
                                products_glasses.not_standard,
                                products_glasses.picture,
                                CONCAT(glass_options.name, '(',glass_manuf.name,')') AS name,
                                CONCAT(products_glasses.glass_width, ' X ', products_glasses.glass_height) AS sizes,
                                glass_colors.name AS color,
                                COUNT(*) AS cc,
                                GROUP_CONCAT(DISTINCT orders.client_name) as clients,

                                glass_options.g_size,

                                ROUND((products_glasses.glass_width * products_glasses.glass_height)/1000000,2) AS kv_m

                        FROM    products_glasses
                        JOIN		orders ON orders.id = products_glasses.order_id AND orders.actived = 1
                        JOIN    orders_product ON orders_product.id = products_glasses.order_product_id AND orders_product.actived = 1
                        JOIN    glass_options ON glass_options.id = products_glasses.glass_option_id
                        JOIN    glass_type ON glass_type.id = products_glasses.glass_type_id
                        JOIN    glass_colors ON glass_colors.id = products_glasses.glass_color_id
                        JOIN    glass_status ON glass_status.id = products_glasses.status_id
                        JOIN    glass_manuf ON glass_manuf.id = products_glasses.glass_manuf_id
                        
                        WHERE   products_glasses.actived = 1 AND products_glasses.go_to_cut = 1 AND products_glasses.status_id = 1 AND products_glasses.id NOT IN (SELECT glass_id FROM lists_to_cut WHERE actived = 1) $where
                        GROUP BY products_glasses.glass_width, products_glasses.glass_height, products_glasses.glass_option_id, products_glasses.glass_color_id, products_glasses.glass_manuf_id, products_glasses.not_standard
                        ORDER BY products_glasses.id");


        $data = $db->getResultArray()['result'];


        $objPHPExcel    =   new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->setTitle('Sheet1');
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Piece Number');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'X DIM');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Y DIM');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Customer');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Order');
        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'MATERIAL CODE');
        $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'NOTE');
        $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'RACK');
        $objPHPExcel->getActiveSheet()->SetCellValue('I1', 'Priority');

        $rowCount = 2;

        $glass_size = $option_id;
        $total_kvm = 0;
        $glass_size_2 = 0;
        foreach($data AS $glass){
            $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $glass['cc']);
            $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $glass['glass_width']);
            $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $glass['glass_height']);
            $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, 'Customer '.$rowCount);
            $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, 'Order '.$rowCount);
            $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, 'FL'.$glass['g_size']);
            $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, 'NOTE'.$rowCount);
            $objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, 'A'.rand(1,5));
            $objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, 0);
            
            $total_kvm += $glass['kv_m'];

            $glass_size_2 = $glass['g_size'];
            $rowCount++;
        }


        $objWriter  =   new PHPExcel_Writer_Excel5($objPHPExcel);
 
        if($glass_size != 0){
            header('Content-Type: application/vnd.ms-excel'); //mime type
            header('Content-Disposition: attachment;filename="'.$glass_size_2.'mm-'.$total_kvm.'-'.date("Y-m-d H:i").'.xls"'); //tell browser what's the file name
            header('Cache-Control: max-age=0'); //no cache
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');  
            $objWriter->save('php://output');
        }
        
    break;
    case 'all':
        $order_id =  $_REQUEST['order_id'];

        $db->setQuery(" SELECT 	ROW_NUMBER() OVER () AS sort_n,
                                glass_options.`name` AS sisqe,
                                glass_colors.name AS color,
                                glass_manuf.name AS manuf,
                                products_glasses.glass_width,
                                products_glasses.glass_height,
                                ROUND((products_glasses.glass_width * products_glasses.glass_height)/1000000,2) AS sqr_m,
                                IF((SELECT COUNT(*) FROM glasses_paths WHERE actived = 1 AND glass_id = products_glasses.id AND path_group_id = 5) > 0,'+','-') AS wrtoba,
                                IF((SELECT COUNT(*) FROM glasses_paths WHERE actived = 1 AND glass_id = products_glasses.id AND path_group_id = 3) > 0,'+','-') AS kronka,
                                IFNULL((SELECT cuts FROM glasses_paths WHERE actived = 1 AND glass_id = products_glasses.id AND path_group_id = 4), 0) AS cuts,
                                IFNULL((SELECT holes FROM glasses_paths WHERE actived = 1 AND glass_id = products_glasses.id AND path_group_id = 4), 0) AS holes,

                                IF((SELECT COUNT(*) FROM glasses_paths WHERE actived = 1 AND glass_id = products_glasses.id AND path_group_id = 8) > 0,'+','-') AS damatoveba,
                                IF((SELECT COUNT(*) FROM glasses_paths WHERE actived = 1 AND glass_id = products_glasses.id AND path_group_id = 9) > 0,'+','-') AS lazeri,
                                
                                products_glasses.last_pyramid AS pyramid,
                                products_glasses.id AS shtrix,
                                products_glasses.order_id,
                                products_glasses.id AS glass_id


                        FROM 	products_glasses 
                        JOIN	glass_options ON glass_options.id = products_glasses.glass_option_id
                        JOIN  	glass_colors ON glass_colors.id = products_glasses.glass_color_id
                        JOIN 	glass_manuf ON glass_manuf.id = products_glasses.glass_manuf_id
                        WHERE   products_glasses.actived = 1 AND products_glasses.order_id = '$order_id' AND products_glasses.status_id = 6");
        $glasses = $db->getResultArray();


        


        $db->setQuery(" SELECT  client_name,
                                client_pid,
                                client_addr,
                                client_phone,
                                datetime AS start_date,
                                NOW() AS datetime,
                                CONCAT(users.firstname, ' ', users.lastname) AS fullname

                        FROM    orders
                        JOIN    users ON users.id = '$user_id'
                        WHERE   orders.id = '$order_id'");
        
        $clientData = $db->getResultArray()['result'][0];

        echo '<!DOCTYPE html>
        <html>
        <head>
            <title>ლილუტა</title>
            <meta charset="utf-8">
            <style type="text/css">
                *{
                    margin: 0 auto;
                    padding 0;
                }
                ul{

                    list-style-type: none;
                }
                #main{
                    width: 1080px;
                    margin: 0 auto;
                    background: white;
            /*		box-shadow: 5px 10px #888888;*/
                }
                .header{
                    width: 950px;
                    margin: 0 auto;
                    /*background: orange;*/
                    margin-top: 80px;
                }

                #liluta_info{
                    float: left;
                    margin-top: 20px;
                }

                #orders_info{
                    float: left;
                    margin-top: 20px;
                }

                #maneger_info{
                    float: left;
                    margin-top: 20px;
                }
                #logo{
                    margin: 0 auto;
                    width: 300px;
                    height: 100px;
                }
                #minebi{
                    margin-top: 120px;
                    padding-bottom: 50px;
                }

                table{
                    text-align: center;
                }

                table td, th{
                    padding: 5px;
                }

                #xelmowera table{
                    float: left;
                }

            </style>
        </head>

        <body onload="window.print();">
        <div id="main">
            <div class="header">
                    <div id="logo">
                        <img src="assets/img/brand/logo.png" width="300px" height="100px;">
                    </div>
                    <div id="liluta_info">
                        <ul>
                            <li>
                                <span><b>შემსრულებელი</b> შპს ლილუტა</span>
                            </li>
                            <li>
                                <span><b>საინდეტიფიკაციო კოდი</b> 416368953 </span>
                            </li>
                            <li>
                                <span><b>მისამართი</b> თვალჭრელიძის 3 </span>
                            </li>
                            <li>
                                <span><b>ტელეფონის ნომერი</b> 557631603 </span>
                            </li>
                        </ul>				
                    </div>

                    <div id="orders_info">
                        <ul>
                            <li>
                                <span><b>დამკვეთი:</b> '.$clientData['client_name'].'</span>
                            </li>
                            <li>
                                <span><b>საინდეტიფიკაციო კოდი</b> '.$clientData['client_pid'].' </span>
                            </li>
                            <li>
                                <span><b>მისამართი</b> '.$clientData['client_addr'].' </span>
                            </li>
                            <li>
                                <span><b>ტელეფონის ნომერი</b> '.$clientData['client_phone'].' </span>
                            </li>
                        </ul>	
                    </div>

                    <div id="maneger_info">
                        <ul>
                            <li>
                                <span><b>მიმღები მენეჯერი:</b> '.$clientData['fullname'].'</span>
                            </li>
                            <li>
                                <span><b>შეკვეთის აღების თარიღი</b> '.$clientData['start_date'].'</span>
                            </li>
                            <li>
                                <span><b>გაცემის თარიღი</b> '.$clientData['datetime'].'</span>
                            </li>
                            
                        </ul>				
                    </div>
            </div><!-- header -->

            <div id="minebi">		
                        <table border="1px" title="ლილუტა">
                            <tr>
                                <th>N</th>
                                <th>ფერი</th>
                                <th>მწარმოებელი</th>
                                <th>სისქე (მმ)</th>
                                <th>სიმაღლე (მმ)</th>
                                <th>სიგანე (მმ)</th>
                                <th>კვ.მ</th>
                                <th>კრონკა</th>
                                <th>პეტლის ჭრა</th>
                                <th>ნახვრეტი</th>
                                <th>წრთობა</th>
                                <th>დამატოვება</th>
                                <th>ლაზერი</th>
                                <th>პირამიდა</th>
                                <th>შეკვ.ID</th>
                                <th>მინის ID</th>
                            </tr>';
                            foreach($glasses['result'] AS $glass){
            

                                echo '  <tr>
                                            <td>'.$glass['sort_n'].'</td>
                                            <td>'.$glass['color'].'</td>
                                            <td>'.$glass['manuf'].'</td>
                                            <td>'.$glass['sisqe'].'</td>
                                            <td>'.$glass['glass_width'].'</td>
                                            <td>'.$glass['glass_height'].'</td>
                                            <td>'.$glass['sqr_m'].'</td>
                                            <td>'.$glass['kronka'].'</td>
                                            <td>'.$glass['cuts'].'</td>
                                            <td>'.$glass['holes'].'</td>
                                            <td>'.$glass['wrtoba'].'</td>
                                            <td>'.$glass['damatoveba'].'</td>
                                            <td>'.$glass['lazeri'].'</td>
                                            <td>'.$glass['pyramid'].'</td>
                                            <td>'.$glass['order_id'].'</td>
                                            <td>'.$glass['glass_id'].'</td>
                                        </tr>';

            
                            }

                        echo '</table>
            </div>

            <div id="xelmowera">
                <table border="1px">
                <tr>
                        <th>
                            წაიღო
                        </th>
                        <td>
                            
                        </td>
                </tr>
                    
                    <tr>
                        <th>
                            ტელეფონის ნომერი
                        </th>
                        <td>
                            
                        </td>
                </tr>

                <tr>
                        <th>
                            მანქანა
                        </th>
                        <td>
                            
                        </td>
                </tr>

                <tr>
                        <th>
                            მისამართი
                        </th>
                        <td>
                            
                        </td>
                </tr>

                <tr>
                        <th>
                            ხელმოწერა
                        </th>
                        <td>
                            -----------------------------------------
                        </td>
                </tr>
                </table>

                <table border="1px">
                <tr>
                        <th>
                            დაუტვირთა
                        </th>
                        <td>
                            -----------------------------------------
                        </td>
                </tr>';
                    
                    $db->setQuery(" SELECT 	CONCAT(glass_options.name, ' ', glass_colors.name) AS glass,
                                                    SUM(ROUND((products_glasses.glass_width * products_glasses.glass_height)/1000000,2)) AS sqr_m
                                    
                                    
                                    FROM 	products_glasses 
                                    JOIN	glass_options ON glass_options.id = products_glasses.glass_option_id
                                    JOIN  glass_colors ON glass_colors.id = products_glasses.glass_color_id
                                    WHERE   products_glasses.actived = 1 AND products_glasses.order_id = '$order_id' AND products_glasses.status_id = 6
                                    
                                    GROUP BY products_glasses.glass_option_id, products_glasses.glass_color_id");
                    $grp = $db->getResultArray();

                    foreach($grp['result'] AS $gr){
                        echo '  <tr>
                                    <th>
                                        '.$gr['glass'].' კვადრატულობა
                                    </th>
                                    <td>
                                        '.$gr['sqr_m'].' კვ.მ
                                    </td>
                                </tr>';
                    }

                    
                    
                    echo '<tr>
                        <th>
                            ხელმოწერა
                        </th>
                        <td>
                            -----------------------------------------
                        </td>
                </tr>
                </table>
            </div>

        </div>
        
        </body>
        </html>';
    break;
    case 'partly':
        
        $given_id =  $_REQUEST['given_id'];



        $db->setQuery("SELECT glass_ids FROM given_glasses WHERE id = '$given_id'");
        $glass_ids = $db->getResultArray()['result'][0]['glass_ids'];

        $db->setQuery(" SELECT 	ROW_NUMBER() OVER () AS sort_n,
                                glass_options.`name` AS sisqe,
                                glass_colors.name AS color,
                                glass_manuf.name AS manuf,
                                products_glasses.glass_width,
                                products_glasses.glass_height,
                                ROUND((products_glasses.glass_width * products_glasses.glass_height)/1000000,2) AS sqr_m,
                                IF((SELECT COUNT(*) FROM glasses_paths WHERE actived = 1 AND glass_id = products_glasses.id AND path_group_id = 5) > 0,'+','-') AS wrtoba,
                                IF((SELECT COUNT(*) FROM glasses_paths WHERE actived = 1 AND glass_id = products_glasses.id AND path_group_id = 3) > 0,'+','-') AS kronka,
                                IFNULL((SELECT cuts FROM glasses_paths WHERE actived = 1 AND glass_id = products_glasses.id AND path_group_id = 4), 0) AS cuts,
                                IFNULL((SELECT holes FROM glasses_paths WHERE actived = 1 AND glass_id = products_glasses.id AND path_group_id = 4), 0) AS holes,

                                IF((SELECT COUNT(*) FROM glasses_paths WHERE actived = 1 AND glass_id = products_glasses.id AND path_group_id = 8) > 0,'+','-') AS damatoveba,
                                IF((SELECT COUNT(*) FROM glasses_paths WHERE actived = 1 AND glass_id = products_glasses.id AND path_group_id = 9) > 0,'+','-') AS lazeri,
                                
                                products_glasses.last_pyramid AS pyramid,
                                products_glasses.id AS shtrix,
                                products_glasses.order_id,
                                products_glasses.id AS glass_id


                        FROM 	products_glasses 
                        JOIN	glass_options ON glass_options.id = products_glasses.glass_option_id
                        JOIN  	glass_colors ON glass_colors.id = products_glasses.glass_color_id
                        JOIN 	glass_manuf ON glass_manuf.id = products_glasses.glass_manuf_id
                        WHERE   products_glasses.actived = 1 AND products_glasses.id IN ($glass_ids)");
        $glasses = $db->getResultArray();

        $order_id = $glasses['result'][0]['order_id'];

        


        $db->setQuery(" SELECT  client_name,
                                client_pid,
                                client_addr,
                                client_phone,
                                datetime AS start_date,
                                NOW() AS datetime,
                                CONCAT(users.firstname, ' ', users.lastname) AS fullname

                        FROM    orders
                        JOIN    users ON users.id = '$user_id'
                        WHERE   orders.id = '$order_id'");
        
        $clientData = $db->getResultArray()['result'][0];

        echo '<!DOCTYPE html>
        <html>
        <head>
            <title>ლილუტა</title>
            <meta charset="utf-8">
            <style type="text/css">
                *{
                    margin: 0 auto;
                    padding 0;
                }
                ul{

                    list-style-type: none;
                }
                #main{
                    width: 1080px;
                    margin: 0 auto;
                    background: white;
            /*		box-shadow: 5px 10px #888888;*/
                }
                .header{
                    width: 950px;
                    margin: 0 auto;
                    /*background: orange;*/
                    margin-top: 80px;
                }

                #liluta_info{
                    float: left;
                    margin-top: 20px;
                }

                #orders_info{
                    float: left;
                    margin-top: 20px;
                }

                #maneger_info{
                    float: left;
                    margin-top: 20px;
                }
                #logo{
                    margin: 0 auto;
                    width: 300px;
                    height: 100px;
                }
                #minebi{
                    margin-top: 120px;
                    padding-bottom: 50px;
                }

                table{
                    text-align: center;
                }

                table td, th{
                    padding: 5px;
                }

                #xelmowera table{
                    float: left;
                }

            </style>
        </head>

        <body onload="window.print();">
        <div id="main">
            <div class="header">
                    <div id="logo">
                        <img src="assets/img/brand/logo.png" width="300px" height="100px;">
                    </div>
                    <div id="liluta_info">
                        <ul>
                            <li>
                                <span><b>შემსრულებელი</b> შპს ლილუტა</span>
                            </li>
                            <li>
                                <span><b>საინდეტიფიკაციო კოდი</b> 416368953 </span>
                            </li>
                            <li>
                                <span><b>მისამართი</b> თვალჭრელიძის 3 </span>
                            </li>
                            <li>
                                <span><b>ტელეფონის ნომერი</b> 557631603 </span>
                            </li>
                        </ul>				
                    </div>

                    <div id="orders_info">
                        <ul>
                            <li>
                                <span><b>დამკვეთი:</b> '.$clientData['client_name'].'</span>
                            </li>
                            <li>
                                <span><b>საინდეტიფიკაციო კოდი</b> '.$clientData['client_pid'].' </span>
                            </li>
                            <li>
                                <span><b>მისამართი</b> '.$clientData['client_addr'].' </span>
                            </li>
                            <li>
                                <span><b>ტელეფონის ნომერი</b> '.$clientData['client_phone'].' </span>
                            </li>
                        </ul>	
                    </div>

                    <div id="maneger_info">
                        <ul>
                            <li>
                                <span><b>მიმღები მენეჯერი:</b> '.$clientData['fullname'].'</span>
                            </li>
                            <li>
                                <span><b>შეკვეთის აღების თარიღი</b> '.$clientData['start_date'].'</span>
                            </li>
                            <li>
                                <span><b>გაცემის თარიღი</b> '.$clientData['datetime'].'</span>
                            </li>
                            
                        </ul>				
                    </div>
            </div><!-- header -->

            <div id="minebi">		
                        <table border="1px" title="ლილუტა">
                            <tr>
                                <th>N</th>
                                <th>ფერი</th>
                                <th>მწარმოებელი</th>
                                <th>სისქე (მმ)</th>
                                <th>სიმაღლე (მმ)</th>
                                <th>სიგანე (მმ)</th>
                                <th>კვ.მ</th>
                                <th>კრონკა</th>
                                <th>პეტლის ჭრა</th>
                                <th>ნახვრეტი</th>
                                <th>წრთობა</th>
                                <th>დამატოვება</th>
                                <th>ლაზერი</th>
                                <th>პირამიდა</th>
                                <th>შეკვ.ID</th>
                                <th>მინის ID</th>
                            </tr>';
                            foreach($glasses['result'] AS $glass){
            

                                echo '  <tr>
                                            <td>'.$glass['sort_n'].'</td>
                                            <td>'.$glass['color'].'</td>
                                            <td>'.$glass['manuf'].'</td>
                                            <td>'.$glass['sisqe'].'</td>
                                            <td>'.$glass['glass_width'].'</td>
                                            <td>'.$glass['glass_height'].'</td>
                                            <td>'.$glass['sqr_m'].'</td>
                                            <td>'.$glass['kronka'].'</td>
                                            <td>'.$glass['cuts'].'</td>
                                            <td>'.$glass['holes'].'</td>
                                            <td>'.$glass['wrtoba'].'</td>
                                            <td>'.$glass['damatoveba'].'</td>
                                            <td>'.$glass['lazeri'].'</td>
                                            <td>'.$glass['pyramid'].'</td>
                                            <td>'.$glass['order_id'].'</td>
                                            <td>'.$glass['glass_id'].'</td>
                                        </tr>';

            
                            }

                        echo '</table>
            </div>

            <div id="xelmowera">
                <table border="1px">
                <tr>
                        <th>
                            წაიღო
                        </th>
                        <td>
                            
                        </td>
                </tr>
                    
                    <tr>
                        <th>
                            ტელეფონის ნომერი
                        </th>
                        <td>
                            
                        </td>
                </tr>

                <tr>
                        <th>
                            მანქანა
                        </th>
                        <td>
                            
                        </td>
                </tr>

                <tr>
                        <th>
                            მისამართი
                        </th>
                        <td>
                            
                        </td>
                </tr>

                <tr>
                        <th>
                            ხელმოწერა
                        </th>
                        <td>
                            -----------------------------------------
                        </td>
                </tr>
                </table>

                <table border="1px">
                <tr>
                        <th>
                            დაუტვირთა
                        </th>
                        <td>
                            -----------------------------------------
                        </td>
                </tr>';
                    
                    $db->setQuery(" SELECT 	CONCAT(glass_options.name, ' ', glass_colors.name) AS glass,
                                                    SUM(ROUND((products_glasses.glass_width * products_glasses.glass_height)/1000000,2)) AS sqr_m
                                    
                                    
                                    FROM 	products_glasses 
                                    JOIN	glass_options ON glass_options.id = products_glasses.glass_option_id
                                    JOIN  glass_colors ON glass_colors.id = products_glasses.glass_color_id
                                    WHERE   products_glasses.actived = 1 AND products_glasses.id IN ($glass_ids)
                                    
                                    GROUP BY products_glasses.glass_option_id, products_glasses.glass_color_id");
                    $grp = $db->getResultArray();

                    foreach($grp['result'] AS $gr){
                        echo '  <tr>
                                    <th>
                                        '.$gr['glass'].' კვადრატულობა
                                    </th>
                                    <td>
                                        '.$gr['sqr_m'].' კვ.მ
                                    </td>
                                </tr>';
                    }

                    
                    
                    echo '<tr>
                        <th>
                            ხელმოწერა
                        </th>
                        <td>
                            -----------------------------------------
                        </td>
                </tr>
                </table>
            </div>

        </div>
        
        </body>
        </html>';

        
    break;
    case 'partly_prod':
        $given_id =  $_REQUEST['given_id'];

        $db->setQuery("SELECT prod_ids FROM given_glasses_prod WHERE id = '$given_id'");
        $prod_ids = $db->getResultArray()['result'][0]['prod_ids'];

        $db->setQuery(" SELECT 	ROW_NUMBER() OVER () AS sort_n,
                                REPLACE(GROUP_CONCAT(CONCAT('<b>',LEFT(glass_options.name,1),'</b>.',glass_colors.name, IF((SELECT COUNT(*) FROM glasses_paths WHERE actived = 1 AND glass_id = products_glasses.id AND path_group_id = 5) > 0,'(T)','')) SEPARATOR 'jandaba'), 'jandaba', CONCAT('+<b>',IF(orders_product.product_id = 2,orders_product.butili, orders_product.lameqs_int),'</b>+')) AS glasses,
                                        MAX(products_glasses.glass_width) AS m_width,
                                        MAX(products_glasses.glass_height) AS m_height,
                                        
                                        ROUND((MAX(products_glasses.glass_width) * MAX(products_glasses.glass_height))/1000000,2) AS sqr_m,
                                        orders_product.pyramid,
                                        orders_product.order_id


                        FROM orders_product
                        JOIN products_glasses ON products_glasses.order_product_id = orders_product.id AND products_glasses.actived = 1 AND products_glasses.status_id != 4
                        JOIN glass_options ON glass_options.id = products_glasses.glass_option_id
                        JOIN glass_colors ON glass_colors.id = products_glasses.glass_color_id
                        WHERE orders_product.id IN ($prod_ids)
                        GROUP BY orders_product.id");
        $glasses = $db->getResultArray();


        $order_id = $glasses['result'][0]['order_id'];


        $db->setQuery(" SELECT  client_name,
                                client_pid,
                                client_addr,
                                client_phone,
                                datetime AS start_date,
                                NOW() AS datetime,
                                CONCAT(users.firstname, ' ', users.lastname) AS fullname

                        FROM    orders
                        JOIN    users ON users.id = '$user_id'
                        WHERE   orders.id = '$order_id'");
        
        $clientData = $db->getResultArray()['result'][0];

        echo '<!DOCTYPE html>
        <html>
        <head>
            <title>ლილუტა</title>
            <style type="text/css">
                *{
                    margin: 0 auto;
                    padding 0;
                }
                ul{
        
                    list-style-type: none;
                }
                #main{
                    width: 1080px;
                    margin: 0 auto;
                    background: white;
            /*		box-shadow: 5px 10px #888888;*/
                }
                .header{
                    width: 950px;
                    margin: 0 auto;
                    /*background: orange;*/
                    margin-top: 80px;
                }
        
                #liluta_info{
                    float: left;
                    margin-top: 20px;
                }
        
                #orders_info{
                    float: left;
                    margin-top: 20px;
                }
        
                #maneger_info{
                    float: left;
                    margin-top: 20px;
                }
                #logo{
                    margin: 0 auto;
                    width: 300px;
                    height: 100px;
                }
                #minebi{
                    margin-top: 120px;
                    padding-bottom: 50px;
                }
        
                table{
                    text-align: center;
                }
        
                table td, th{
                    padding: 5px;
                }
        
                #xelmowera table{
                    float: left;
                }
        
            </style>
        </head>
        
        <body onload="window.print();">
        <div id="main">
            <div class="header">
                    <div id="logo">
                        <img src="assets/img/brand/logo.png" width="300px" height="100px;">
                    </div>
                    <div id="liluta_info">
                        <ul>
                            <li>
                                <span><b>შემსრულებელი</b> შპს ლილუტა</span>
                            </li>
                            <li>
                                <span><b>საინდეტიფიკაციო კოდი</b> 416368953 </span>
                            </li>
                            <li>
                                <span><b>მისამართი</b> თვალჭრელიძის 3 </span>
                            </li>
                            <li>
                                <span><b>ტელეფონის ნომერი</b> 557631603 </span>
                            </li>
                        </ul>				
                    </div>
        
                    <div id="orders_info">
                        <ul>
                            <li>
                                <span><b>დამკვეთი:</b> '.$clientData['client_name'].'</span>
                            </li>
                            <li>
                                <span><b>საინდეტიფიკაციო კოდი</b> '.$clientData['client_pid'].' </span>
                            </li>
                            <li>
                                <span><b>მისამართი</b> '.$clientData['client_addr'].' </span>
                            </li>
                            <li>
                                <span><b>ტელეფონის ნომერი</b> '.$clientData['client_phone'].' </span>
                            </li>
                        </ul>	
                    </div>
        
                    <div id="maneger_info">
                        <ul>
                            <li>
                                <span><b>მიმღები მენეჯერი:</b> '.$clientData['fullname'].'</span>
                            </li>
                            <li>
                                <span><b>შეკვეთის აღების თარიღი</b> '.$clientData['start_date'].'</span>
                            </li>
                            <li>
                                <span><b>გაცემის თარიღი</b> '.$clientData['datetime'].'</span>
                            </li>
                        </ul>				
                    </div>
            </div><!-- header -->
        
            <div id="minebi">		
                        <table border="1px" title="ლილუტა">
                            <tr>
                                <th>N</th>
                                <th>სისქე(მმ) </th>
                                <th>სიმაღლე(მმ) </th>
                                <th>სიგანე(მმ) </th>
                                <th>კვ.მ</th>
                                <th>პირამიდა</th>
                            </tr>';
                            foreach($glasses['result'] AS $gl){
                                echo '<tr>
                                        <td>'.$gl['sort_n'].'</td>
                                        <td>'.$gl['glasses'].'</td>
                                        <td><b>'.$gl['m_width'].'</b></td>
                                        <td><b>'.$gl['m_height'].'</b></td>
                                        <td><b>'.$gl['sqr_m'].'</b></td>
                                        <td><b>'.$gl['pyramid'].'</b></td>
                                    </tr>';
                            }
                            

                            
                        echo '</table>
            </div>
        
            <div id="xelmowera">
                <table border="1px">
                   <tr>
                           <th>
                               წაიღო
                           </th>
                           <td>
                           --------------------------------
                           </td>
                   </tr>
                    
                     <tr>
                           <th>
                               ტელეფონის ნომერი
                           </th>
                           <td>
                           --------------------------------
                           </td>
                   </tr>
        
                   <tr>
                           <th>
                               მანქანა
                           </th>
                           <td>
                           --------------------------------
                           </td>
                   </tr>
        
                   <tr>
                           <th>
                               მისამართი
                           </th>
                           <td>
                           '.$clientData['client_addr'].'
                           </td>
                   </tr>
        
                   <tr>
                           <th>
                               ხელმოწერა
                           </th>
                           <td>
                               ----------------
                           </td>
                   </tr>
                </table>
        
                <table border="1px">
                   <tr>
                           <th>
                               დაუტვირთა
                           </th>
                           <td>
                               --------------------------------
                           </td>
                   </tr>
                    
                     <tr>
                           <th>
                               ხელმოწერა
                           </th>
                           <td>
                               --------------------------------
                           </td>
                   </tr>
                </table>
            </div>
        
        </div>
        
        </body>
        </html>';
    break;
}

?>