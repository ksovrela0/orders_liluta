<?php
session_start();
error_reporting(E_ERROR);
include('db.php');
GLOBAL $db;
$db = new dbClass();
$act = $_REQUEST['act'];
$user_id = $_SESSION['USERID'];


switch($act){
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
                                products_glasses.order_id


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
            <title>??????????????????</title>
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
                                <span><b>????????????????????????????????????</b> ????????? ??????????????????</span>
                            </li>
                            <li>
                                <span><b>????????????????????????????????????????????? ????????????</b> 416368953 </span>
                            </li>
                            <li>
                                <span><b>???????????????????????????</b> ???????????????????????????????????? 3 </span>
                            </li>
                            <li>
                                <span><b>??????????????????????????? ??????????????????</b> 557631603 </span>
                            </li>
                        </ul>				
                    </div>

                    <div id="orders_info">
                        <ul>
                            <li>
                                <span><b>????????????????????????:</b> '.$clientData['client_name'].'</span>
                            </li>
                            <li>
                                <span><b>????????????????????????????????????????????? ????????????</b> '.$clientData['client_pid'].' </span>
                            </li>
                            <li>
                                <span><b>???????????????????????????</b> '.$clientData['client_addr'].' </span>
                            </li>
                            <li>
                                <span><b>??????????????????????????? ??????????????????</b> '.$clientData['client_phone'].' </span>
                            </li>
                        </ul>	
                    </div>

                    <div id="maneger_info">
                        <ul>
                            <li>
                                <span><b>????????????????????? ????????????????????????:</b> '.$clientData['fullname'].'</span>
                            </li>
                            <li>
                                <span><b>???????????????????????? ?????????????????? ??????????????????</b> '.$clientData['start_date'].'</span>
                            </li>
                            <li>
                                <span><b>????????????????????? ??????????????????</b> '.$clientData['datetime'].'</span>
                            </li>
                            
                        </ul>				
                    </div>
            </div><!-- header -->

            <div id="minebi">		
                        <table border="1px" title="??????????????????">
                            <tr>
                                <th>N</th>
                                <th>????????????</th>
                                <th>?????????????????????????????????</th>
                                <th>??????????????? (??????)</th>
                                <th>????????????????????? (??????)</th>
                                <th>?????????????????? (??????)</th>
                                <th>??????.???</th>
                                <th>??????????????????</th>
                                <th>?????????????????? ?????????</th>
                                <th>????????????????????????</th>
                                <th>??????????????????</th>
                                <th>??????????????????????????????</th>
                                <th>??????????????????</th>
                                <th>????????????????????????</th>
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
                                        </tr>';

            
                            }

                        echo '</table>
            </div>

            <div id="xelmowera">
                <table border="1px">
                <tr>
                        <th>
                            ???????????????
                        </th>
                        <td>
                            
                        </td>
                </tr>
                    
                    <tr>
                        <th>
                            ??????????????????????????? ??????????????????
                        </th>
                        <td>
                            
                        </td>
                </tr>

                <tr>
                        <th>
                            ?????????????????????
                        </th>
                        <td>
                            
                        </td>
                </tr>

                <tr>
                        <th>
                            ???????????????????????????
                        </th>
                        <td>
                            
                        </td>
                </tr>

                <tr>
                        <th>
                            ???????????????????????????
                        </th>
                        <td>
                            -----------------------------------------
                        </td>
                </tr>
                </table>

                <table border="1px">
                <tr>
                        <th>
                            ???????????????????????????
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
                                        '.$gr['glass'].' ????????????????????????????????????
                                    </th>
                                    <td>
                                        '.$gr['sqr_m'].' ??????.???
                                    </td>
                                </tr>';
                    }

                    
                    
                    echo '<tr>
                        <th>
                            ???????????????????????????
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
                                products_glasses.order_id


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
            <title>??????????????????</title>
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
                                <span><b>????????????????????????????????????</b> ????????? ??????????????????</span>
                            </li>
                            <li>
                                <span><b>????????????????????????????????????????????? ????????????</b> 416368953 </span>
                            </li>
                            <li>
                                <span><b>???????????????????????????</b> ???????????????????????????????????? 3 </span>
                            </li>
                            <li>
                                <span><b>??????????????????????????? ??????????????????</b> 557631603 </span>
                            </li>
                        </ul>				
                    </div>

                    <div id="orders_info">
                        <ul>
                            <li>
                                <span><b>????????????????????????:</b> '.$clientData['client_name'].'</span>
                            </li>
                            <li>
                                <span><b>????????????????????????????????????????????? ????????????</b> '.$clientData['client_pid'].' </span>
                            </li>
                            <li>
                                <span><b>???????????????????????????</b> '.$clientData['client_addr'].' </span>
                            </li>
                            <li>
                                <span><b>??????????????????????????? ??????????????????</b> '.$clientData['client_phone'].' </span>
                            </li>
                        </ul>	
                    </div>

                    <div id="maneger_info">
                        <ul>
                            <li>
                                <span><b>????????????????????? ????????????????????????:</b> '.$clientData['fullname'].'</span>
                            </li>
                            <li>
                                <span><b>???????????????????????? ?????????????????? ??????????????????</b> '.$clientData['start_date'].'</span>
                            </li>
                            <li>
                                <span><b>????????????????????? ??????????????????</b> '.$clientData['datetime'].'</span>
                            </li>
                            
                        </ul>				
                    </div>
            </div><!-- header -->

            <div id="minebi">		
                        <table border="1px" title="??????????????????">
                            <tr>
                                <th>N</th>
                                <th>????????????</th>
                                <th>?????????????????????????????????</th>
                                <th>??????????????? (??????)</th>
                                <th>????????????????????? (??????)</th>
                                <th>?????????????????? (??????)</th>
                                <th>??????.???</th>
                                <th>??????????????????</th>
                                <th>?????????????????? ?????????</th>
                                <th>????????????????????????</th>
                                <th>??????????????????</th>
                                <th>??????????????????????????????</th>
                                <th>??????????????????</th>
                                <th>????????????????????????</th>
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
                                        </tr>';

            
                            }

                        echo '</table>
            </div>

            <div id="xelmowera">
                <table border="1px">
                <tr>
                        <th>
                            ???????????????
                        </th>
                        <td>
                            
                        </td>
                </tr>
                    
                    <tr>
                        <th>
                            ??????????????????????????? ??????????????????
                        </th>
                        <td>
                            
                        </td>
                </tr>

                <tr>
                        <th>
                            ?????????????????????
                        </th>
                        <td>
                            
                        </td>
                </tr>

                <tr>
                        <th>
                            ???????????????????????????
                        </th>
                        <td>
                            
                        </td>
                </tr>

                <tr>
                        <th>
                            ???????????????????????????
                        </th>
                        <td>
                            -----------------------------------------
                        </td>
                </tr>
                </table>

                <table border="1px">
                <tr>
                        <th>
                            ???????????????????????????
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
                                        '.$gr['glass'].' ????????????????????????????????????
                                    </th>
                                    <td>
                                        '.$gr['sqr_m'].' ??????.???
                                    </td>
                                </tr>';
                    }

                    
                    
                    echo '<tr>
                        <th>
                            ???????????????????????????
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
                        WHERE orders_product.id IN ($prod_ids)");
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
            <title>??????????????????</title>
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
                                <span><b>????????????????????????????????????</b> ????????? ??????????????????</span>
                            </li>
                            <li>
                                <span><b>????????????????????????????????????????????? ????????????</b> 416368953 </span>
                            </li>
                            <li>
                                <span><b>???????????????????????????</b> ???????????????????????????????????? 3 </span>
                            </li>
                            <li>
                                <span><b>??????????????????????????? ??????????????????</b> 557631603 </span>
                            </li>
                        </ul>				
                    </div>
        
                    <div id="orders_info">
                        <ul>
                            <li>
                                <span><b>????????????????????????:</b> '.$clientData['client_name'].'</span>
                            </li>
                            <li>
                                <span><b>????????????????????????????????????????????? ????????????</b> '.$clientData['client_pid'].' </span>
                            </li>
                            <li>
                                <span><b>???????????????????????????</b> '.$clientData['client_addr'].' </span>
                            </li>
                            <li>
                                <span><b>??????????????????????????? ??????????????????</b> '.$clientData['client_phone'].' </span>
                            </li>
                        </ul>	
                    </div>
        
                    <div id="maneger_info">
                        <ul>
                            <li>
                                <span><b>????????????????????? ????????????????????????:</b> '.$clientData['fullname'].'</span>
                            </li>
                            <li>
                                <span><b>???????????????????????? ?????????????????? ??????????????????</b> '.$clientData['start_date'].'</span>
                            </li>
                            <li>
                                <span><b>????????????????????? ??????????????????</b> '.$clientData['datetime'].'</span>
                            </li>
                        </ul>				
                    </div>
            </div><!-- header -->
        
            <div id="minebi">		
                        <table border="1px" title="??????????????????">
                            <tr>
                                <th>N</th>
                                <th>???????????????(??????) </th>
                                <th>?????????????????????(??????) </th>
                                <th>??????????????????(??????) </th>
                                <th>??????.???</th>
                                <th>????????????????????????</th>
                            </tr>';
                            foreach($glasses['result'] AS $gl){

                            }
                            echo '<tr>
                                <td>'.$gl['sort_n'].'</td>
                                <td>'.$gl['glasses'].'</td>
                                <td><b>'.$gl['m_width'].'</b></td>
                                <td><b>'.$gl['m_height'].'</b></td>
                                <td><b>'.$gl['sqr_m'].'</b></td>
                                <td><b>'.$gl['pyramid'].'</b></td>
                            </tr>';

                            
                        echo '</table>
            </div>
        
            <div id="xelmowera">
                <table border="1px">
                   <tr>
                           <th>
                               ???????????????
                           </th>
                           <td>
                           --------------------------------
                           </td>
                   </tr>
                    
                     <tr>
                           <th>
                               ??????????????????????????? ??????????????????
                           </th>
                           <td>
                           --------------------------------
                           </td>
                   </tr>
        
                   <tr>
                           <th>
                               ?????????????????????
                           </th>
                           <td>
                           --------------------------------
                           </td>
                   </tr>
        
                   <tr>
                           <th>
                               ???????????????????????????
                           </th>
                           <td>
                           '.$clientData['client_addr'].'
                           </td>
                   </tr>
        
                   <tr>
                           <th>
                               ???????????????????????????
                           </th>
                           <td>
                               ----------------
                           </td>
                   </tr>
                </table>
        
                <table border="1px">
                   <tr>
                           <th>
                               ???????????????????????????
                           </th>
                           <td>
                               --------------------------------
                           </td>
                   </tr>
                    
                     <tr>
                           <th>
                               ???????????????????????????
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