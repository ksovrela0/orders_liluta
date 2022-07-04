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
        //$excel2->setActiveSheetIndex(0);
        
        $objWriter = PHPExcel_IOFactory::createWriter($excel2, 'Excel2007');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="01simple.xlsx"');
        header('Cache-Control: max-age=0');
        $objWriter->save('php://output');
    break;
}

?>