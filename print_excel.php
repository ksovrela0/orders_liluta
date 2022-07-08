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
}

?>