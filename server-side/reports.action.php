<?php
error_reporting(E_ERROR);
include('../db.php');
GLOBAL $db;
$db = new dbClass();
$act = $_REQUEST['act'];
$user_id = $_SESSION['USERID'];
$user_gr = $_SESSION['GRPID'];
switch ($act){
    case 'get_columns':
        $columnCount = 		$_REQUEST['count'];
        $cols[] =           $_REQUEST['cols'];
        $columnNames[] = 	$_REQUEST['names'];
        $operators[] = 		$_REQUEST['operators'];
        $selectors[] = 		$_REQUEST['selectors'];
        //$query = "SHOW COLUMNS FROM $tableName";
        //$db->setQuery($query,$tableName);
        //$res = $db->getResultArray();
        $f=0;
        foreach($cols[0] AS $col)
        {
            $column = explode(':',$col);

            $res[$f]['Field'] = $column[0];
            $res[$f]['type'] = $column[1];
            $f++;
        }
        $i = 0;
        $columns = array();
        foreach($res AS $item)
        {
            $columns[$i] = $item['Field'];
            $i++;
        }
        
        $dat = array();
        $a = 0;
        for($j = 0;$j<$columnCount;$j++)
        {
            if(1==2)
			{
				continue;
            }
            else{
                
                if($operators[0][$a] == 1) $op = true; else $op = false; //  TRANSFORMS 0 OR 1 TO True or False FOR OPERATORS
                //$op = false;
                if($res['data_type'][$j] == 'date')
                {
                    $g = array('field'=>$columns[$j],'encoded'=>false,'title'=>$columnNames[0][$a],'format'=>"{0:yyyy-MM-dd hh:mm:ss}",'parseFormats' =>["MM/dd/yyyy h:mm:ss"]);
                }
                else if($selectors[0][$a] != '0') // GETTING SELECTORS WHERE VALUES ARE TABLE NAMES
                {
                    $g = array('field'=>$columns[$j],'encoded'=>false,'title'=>$columnNames[0][$a],'values'=>getSelectors($selectors[0][$a]));
                }
                else
                {
					if($columns[$j] == "inc_status"){
						$g = array('field'=>$columns[$j],'encoded'=>false,'title'=>$columnNames[0][$a],'filterable'=>array('multi'=>true,'search' => true), 'width' => 153);
					}elseif($columns[$j] == "audio_file"){
						$g = array('field'=>$columns[$j],'encoded'=>false,'title'=>$columnNames[0][$a],'filterable'=>array('multi'=>true,'search' => true), 'width' => 150);
					}elseif($columns[$j] == "action_given"){
						$g = array('field'=>$columns[$j],'encoded'=>false,'title'=>$columnNames[0][$a],'filterable'=>array('multi'=>true,'search' => true), 'width' => '5%');
					}elseif($columns[$j] == "id"){
						$g = array('field'=>$columns[$j], 'hidden' => false,'encoded'=>false,'title'=>$columnNames[0][$a],'filterable'=>array('multi'=>true,'search' => true), 'width' => 100);
					}elseif($columns[$j] == "inc_date"){
						$g = array('field'=>$columns[$j],'encoded'=>false,'title'=>$columnNames[0][$a],'filterable'=>array('multi'=>true,'search' => true), 'width' => 130);
					}else{
                    	$g = array('field'=>$columns[$j],'encoded'=>false,'title'=>$columnNames[0][$a],'filterable'=>array('multi'=>true,'search' => true));
					}
                }
                $a++;
            }
            array_push($dat,$g);
            
        }
        
        // array_push($dat,array('command'=>["edit","destroy"],'title'=>'&nbsp;','width'=>'250px'));
        
        $new_data = array();
        //{"id":"id","fields":[{"id":{"editable":true,"type":"number"}},{"reg_date":{"editable":true,"type":"number"}},{"name":{"editable":true,"type":"number"}},{"surname":{"editable":true,"type":"number"}},{"age":{"editable":true,"type":"number"}}]}
        for($j=0;$j<$columnCount;$j++)
        {
            if($res['data_type'][$j] == 'date')
            {
                $new_data[$columns[$j]] = array('editable'=>false,'type'=>'string');
            }
            else
            {
                $new_data[$columns[$j]] = array('editable' => true, 'type' => 'string');
            }
        }
        
        $filtArr = array('fields'=>$new_data);
        $kendoData = array('columnss'=>$dat,'modelss'=>$filtArr);
        
        //$dat = array('command'=>["edit","destroy"],'title'=>'&nbsp;','width'=>'250px');
        
        $data = $kendoData;
        //$data = '[{"gg":"sd","ads":"213123"}]';
        
    break;
    case 'get_list_cut':
        $report_date = explode(' - ', $_REQUEST['report_date']);

        $group_id = $_REQUEST['group_id'];
        $date_start = $report_date[0];
        $date_end = $report_date[1] . ' 23:59:59';

        $columnCount = 		$_REQUEST['count'];
		$cols[]      =      $_REQUEST['cols'];


        $db->setQuery("SELECT	'$_REQUEST[report_date]' AS periodi,
                                'ჭრა',
                                glass_manuf.name AS manuf,
                                glass_options.`name` AS opt,
                                glass_type.name AS gl_type,
                                glass_colors.name AS gl_color,
                                '' AS unk,
                                ROUND(SUM((glass_width*glass_height)/1000000),2) AS total_kv_m,
                                
                                IFNULL(ROUND(SUM((cut_atxod.width*cut_atxod.height)/1000000),2),0) AS total_atxod

                        FROM 		products_glasses
                        JOIN 		orders ON products_glasses.order_id = orders.id AND orders.actived = 1
                        JOIN 		orders_product ON products_glasses.order_product_id = orders_product.id AND orders_product.actived = 1
                        JOIN 		lists_to_cut ON lists_to_cut.glass_id = products_glasses.id AND lists_to_cut.actived = 1 AND lists_to_cut.finish_datetime BETWEEN '$date_start' AND '$date_end'
                        JOIN		cut_glass ON cut_glass.id = lists_to_cut.cut_id AND cut_glass.actived = 1
                        LEFT JOIN		cut_atxod ON cut_atxod.cut_id = cut_glass.id AND cut_atxod.actived = 1

                        JOIN    glass_options ON glass_options.id = products_glasses.glass_option_id
                        JOIN    glass_type ON glass_type.id = products_glasses.glass_type_id
                        JOIN    glass_colors ON glass_colors.id = products_glasses.glass_color_id
                        JOIN    glass_manuf ON glass_manuf.id = products_glasses.glass_manuf_id


                        WHERE 	products_glasses.actived = 1

                        GROUP BY products_glasses.glass_manuf_id, products_glasses.glass_option_id,products_glasses.glass_type_id, products_glasses.glass_color_id");
        $result = $db->getKendoList($columnCount, $cols);
        $data = $result;
    break;
    case 'get_list_kronka':
        $report_date = explode(' - ', $_REQUEST['report_date']);

        $group_id = $_REQUEST['group_id'];
        $date_start = $report_date[0];
        $date_end = $report_date[1] . ' 23:59:59';

        $columnCount = 		$_REQUEST['count'];
		$cols[]      =      $_REQUEST['cols'];


        $db->setQuery("SELECT	'$_REQUEST[report_date]' AS periodi,
                                `groups`.name,
                                glass_manuf.name AS manuf,
                                glass_options.`name` AS opt,
                                glass_type.name AS gl_type,
                                glass_colors.name AS gl_color,
                                ROUND(SUM((glass_width*glass_height)/1000000),2) AS total_kv_m,
                                ROUND(SUM(IF(glasses_paths.status_id = 4,((glass_width*glass_height)/1000000),0)), 2) AS total_damaged

                        FROM 		products_glasses
                        JOIN 		orders ON products_glasses.order_id = orders.id AND orders.actived = 1
                        JOIN 		orders_product ON products_glasses.order_product_id = orders_product.id AND orders_product.actived = 1
                        JOIN 		glasses_paths ON glasses_paths.glass_id = products_glasses.id AND glasses_paths.path_group_id = 3 AND glasses_paths.datetime BETWEEN '$date_start' AND '$date_end'
                        JOIN 		`groups` ON `groups`.id = glasses_paths.path_group_id
                        JOIN    glass_options ON glass_options.id = products_glasses.glass_option_id
                        JOIN    glass_type ON glass_type.id = products_glasses.glass_type_id
                        JOIN    glass_colors ON glass_colors.id = products_glasses.glass_color_id
                        JOIN    glass_manuf ON glass_manuf.id = products_glasses.glass_manuf_id


                        WHERE 	products_glasses.actived = 1

                        GROUP BY products_glasses.glass_manuf_id, products_glasses.glass_option_id,products_glasses.glass_type_id, products_glasses.glass_color_id");
        $result = $db->getKendoList($columnCount, $cols);
        $data = $result;
    break;
    case 'get_list_tabel':
        $id          =      $_REQUEST['hidden'];
        $report_date = explode(' - ', $_REQUEST['report_date']);

        $group_id = $_REQUEST['group_id'];
        $date_start = $report_date[0];
        $date_end = $report_date[1];
        $where = '';
        if($group_id != ''){
            $where = " AND users.group_id = '$group_id'";
        }
        
        $columnCount = 		$_REQUEST['count'];
		$cols[]      =      $_REQUEST['cols'];
            $db->setQuery(" SELECT  users.id,
                                    `groups`.name AS group_name,
                                    users.firstname,
                                    users.lastname,
                                    users.phone,
                                    users.pid,

                                    '' AS total_worked_time,
                                    '' AS total_worked_nonwork_time,
                                    '' AS total_additional_worked_time,
                                    '' AS total_lated_time,
                                    '' AS total_lated_days
                                    
                            FROM    users
                            JOIN    `groups` ON `groups`.id = users.group_id
                            WHERE   users.actived = 1 AND users.group_id != 1 $where
                            GROUP BY users.id
                            ORDER BY users.id");

        $result = $db->getKendoList($columnCount, $cols);
        //var_dump($result);

        $db->setQuery(" SELECT 
                            *,
                            DAY(tarigi) AS day_of_month
                        FROM 
                            holidays
                        WHERE 
                            tarigi >= '".$date_start."'  AND 
                            tarigi <= '".$date_end."'");
        $holidays = $db->getResultArray();

        $i = 0;
        foreach($result['data'] AS $user){
            $db->setQuery(" SELECT  tf.userID AS UserID,
                                    p.tbl_schedule_type_id as schedule_type,
                                    tst.name as schedule_name,
                                    DAY(tf.authDate) as day, 
                                    tf.authDate,
                                    DATE_FORMAT(MIN(tf.authDateTime),'%H:%i') as real_in,
                                    DATE_FORMAT(MAX(tf.authDateTime),'%H:%i') as real_out,
                                    TIME_FORMAT(ADDTIME(tst.plan_in, '00:15'), '%H:%i') AS plan_in,
                                    tst.plan_out,
                                    tst.working_minutes * 60 AS working_seconds,
                                    tst.check_in,
                                    tst.check_out,
                                    tst.check_wm,
                                    tst.latecome,
                                    tst.earlygo,
                                    TIME_FORMAT(TIMEDIFF(MAX(tf.authDateTime) ,MIN(tf.authDateTime)), '%H:%i') as working_hours,
                                    TIMESTAMPDIFF(second, MIN(tf.authDateTime) ,MAX(tf.authDateTime)) as working_hours_seconds,
                                    tst.break
                                                
                                                

                            FROM 
                                tbl_facelog as tf
                            LEFT JOIN
                                users as p
                                    ON
                                        p.id = tf.userID 
                            LEFT JOIN
                                tbl_schedule_types as tst
                                    ON
                                        tst.id = p.tbl_schedule_type_id AND tst.deleted = 1 
                            WHERE 
                                tf.authDate >= '".$date_start."'  AND 
                                tf.authDate <= '$date_end' AND
                                tf.userID = '$user[user_id]'
                            GROUP BY
                                tf.userID ,
                                tf.authDate
                            ORDER BY 
                                tf.userID DESC,
                                tf.authDate");

            $attendance = $db->getResultArray()['result'];

            $total_worked_time = 0;
            $total_worked_nonwork_time = 0;
            $total_lated_time = 0;
            $total_additional_worked_time = 0;
            $total_lated_days = 0;

            foreach($attendance AS $times){
                $total_worked_time += $times['working_hours_seconds'];
    
                if(date("l", strtotime($times['authDate'])) == 'Saturday' || date("l", strtotime($times['authDate'])) == 'sunday' || in_array($times['authDate'], $holi_dates)){
                    $total_worked_nonwork_time += $times['working_hours_seconds'];
                }
    
                if($times['real_in'] > $times['plan_in']){
                    $start_time = strtotime($times['plan_in'].':00');
                    $end_time = strtotime($times['real_in'].':00');
    
                    $total_lated_time += $end_time - $start_time;
    
                    $total_lated_days++;
                }
    
                if($times['real_out'] < $times['plan_out']){
                    $start_time = strtotime($times['plan_out'].':00');
                    $end_time = strtotime($times['real_out'].':00');
    
                    $total_lated_time += $start_time - $end_time;
                }
    
    
                $real_in = strtotime($times['real_in'].':00');
                $real_out = strtotime($times['real_out'].':00');
    
                $check_additional_worked = $real_out - $real_in;
    
                if($check_additional_worked > $times['working_seconds']){
                    $total_additional_worked_time += $check_additional_worked - $times['working_seconds'];
                }
    
    
    
            }

            $result['data'][$i]['total_worked_time'] = calculate_hours($total_worked_time);
            $result['data'][$i]['total_worked_nonwork_time'] = calculate_hours($total_worked_nonwork_time);
            $result['data'][$i]['total_lated_time'] = calculate_hours($total_lated_time);
            $result['data'][$i]['total_additional_worked_time'] = calculate_hours($total_additional_worked_time);
            $result['data'][$i]['total_lated_days'] = calculate_hours($total_lated_days);
            $i++;
        }
        $data = $result;
    break;
    
}


function calculate_hours($seconds = 0){// Example: 100,000 seconds

    $totalHours = floor($seconds / 3600);
    $remainingSeconds = $seconds % 3600;
    $minutes = floor($remainingSeconds / 60);

    $timeFormat = sprintf('%02d:%02d', $totalHours, $minutes);

    return $timeFormat;
}

echo json_encode($data);

?>