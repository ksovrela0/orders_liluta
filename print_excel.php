<?php
session_start();
error_reporting(E_ERROR);
include('db.php');
GLOBAL $db;
$db = new dbClass();
$act = $_REQUEST['act'];
$user_id = $_SESSION['USERID'];

require_once 'includes/excel/PHPExcel/IOFactory.php';
require_once 'includes/excel/PHPExcel.php';

switch($act){
    case 'partly':
        $given_id =  $_REQUEST['given_id'];

        $excel2 = PHPExcel_IOFactory::createReader('Excel2007');
        $excel2 = $excel2->load('temp/given_temp.xlsx'); // Empty Sheet
        $excel2->setActiveSheetIndex(0);

        $db->setQuery("SELECT glass_ids FROM given_glasses WHERE id = '$given_id'");
        $glass_ids = $db->getResultArray()['result'][0]['glass_ids'];

        $db->setQuery(" SELECT 	CONCAT(glass_options.`name`, ' ', glass_colors.name, ' ', glass_manuf.name) AS name,
                                products_glasses.glass_width,
                                products_glasses.glass_height,
                                (products_glasses.glass_width * products_glasses.glass_height)/1000000 AS sqr_m,
                                IF((SELECT COUNT(*) FROM glasses_paths WHERE actived = 1 AND glass_id = products_glasses.id AND path_group_id = 5) > 0,'გაიარა','არა') AS wrtoba,
                                IF((SELECT COUNT(*) FROM glasses_paths WHERE actived = 1 AND glass_id = products_glasses.id AND path_group_id = 3) > 0,'გაიარა','არა') AS kronka,
                                IFNULL((SELECT cuts FROM glasses_paths WHERE actived = 1 AND glass_id = products_glasses.id AND path_group_id = 4), 0) AS cuts,
                                IFNULL((SELECT holes FROM glasses_paths WHERE actived = 1 AND glass_id = products_glasses.id AND path_group_id = 4), 0) AS holes,
                                
                                (SELECT pyramid FROM glasses_paths WHERE actived = 1 AND glass_id = products_glasses.id ORDER BY sort_n DESC LIMIT 1) AS pyramid,
                                products_glasses.id AS shtrix,
                                products_glasses.order_id


                        FROM 	products_glasses 
                        JOIN	glass_options ON glass_options.id = products_glasses.glass_option_id
                        JOIN  	glass_colors ON glass_colors.id = products_glasses.glass_color_id
                        JOIN 	glass_manuf ON glass_manuf.id = products_glasses.glass_manuf_id
                        WHERE   products_glasses.actived = 1 AND products_glasses.id IN ($glass_ids)");
        $glasses = $db->getResultArray();

        $order_id = $glasses['result'][0]['order_id'];

        $i = 9;
        foreach($glasses['result'] AS $glass){
            $excel2->getActiveSheet()->setCellValue('C'.$i, $glass['name']);
            $excel2->getActiveSheet()->setCellValue('D'.$i, $glass['glass_width']);
            $excel2->getActiveSheet()->setCellValue('E'.$i, $glass['glass_height']);
            $excel2->getActiveSheet()->setCellValue('F'.$i, $glass['sqr_m']);
            $excel2->getActiveSheet()->setCellValue('G'.$i, $glass['wrtoba']);
            $excel2->getActiveSheet()->setCellValue('H'.$i, $glass['kronka']);
            $excel2->getActiveSheet()->setCellValue('I'.$i, $glass['cuts']);
            $excel2->getActiveSheet()->setCellValue('J'.$i, $glass['holes']);
            $excel2->getActiveSheet()->setCellValue('K'.$i, $glass['pyramid']);
            $excel2->getActiveSheet()->setCellValue('L'.$i, $glass['shtrix']);



            $i++;
        }


        $db->setQuery(" SELECT  client_name,
                                client_pid,
                                client_addr,
                                NOW() AS datetime,
                                CONCAT(users.firstname, ' ', users.lastname) AS fullname

                        FROM    orders
                        JOIN    users ON users.id = '$user_id'
                        WHERE   orders.id = '$order_id'");
        
        $clientData = $db->getResultArray()['result'][0];

        $excel2->getActiveSheet()->setCellValue('E2', $clientData['client_name']);
        $excel2->getActiveSheet()->setCellValue('D29', $clientData['client_name']);

        $excel2->getActiveSheet()->setCellValue('E4', $clientData['client_pid']);

        $excel2->getActiveSheet()->setCellValue('G2', $clientData['fullname']);
        $excel2->getActiveSheet()->setCellValue('G4', $clientData['datetime']);

        $excel2->getActiveSheet()->setCellValue('D32', $clientData['client_addr']);
        
        $objWriter = PHPExcel_IOFactory::createWriter($excel2, 'Excel2007');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="მინები_გაცემა_'.$clientData['datetime'].'.xlsx"');
        header('Cache-Control: max-age=0');
        $objWriter->save('php://output');
    break;
}

?>