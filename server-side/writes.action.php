<?php

session_start();

error_reporting(E_ALL);

include('../db.php');

GLOBAL $db;

$db = new dbClass();

$act = $_REQUEST['act'];

$user_id = $_SESSION['USERID'];



switch ($act){
    case 'get_sms_page_checked':
        $checked_ids = $_REQUEST['checked_ids'];
        $db->setQuery("SELECT DISTINCT phone FROM writings WHERE actived = 1 AND id IN ($checked_ids)");
        $all_getters = $db->getResultArray();
        $data = array('page' => getSMSPage($all_getters));
        break;
    case 'start_sms_checked':
        $message = $_REQUEST['sms_text'];
        $checked_ids = $_REQUEST['checked_ids'];
        $db->setQuery("INSERT INTO sms_data (`phone`,`message`,`status`)
                        SELECT DISTINCT CONCAT('995',phone), '$message', 'queue'FROM writings WHERE actived = 1 AND id IN ($checked_ids)");
        $db->execQuery();

        break;
    case 'get_sms_page_all':
        $db->setQuery("SELECT DISTINCT phone FROM writings WHERE actived = 1");
        $all_getters = $db->getResultArray();
        $data = array('page' => getSMSPage($all_getters));
        break;
    case 'start_sms_all':
        $message = $_REQUEST['sms_text'];
        $db->setQuery("INSERT INTO sms_data (`phone`,`message`,`status`)
                        SELECT DISTINCT CONCAT('995',phone), '$message', 'queue'FROM writings WHERE actived = 1");
        $db->execQuery();

        break;
    case 'get_add_page':

        $id = $_REQUEST['id'];

        $data = array('page' => getPage());

    break;
    case 'check_login':
        $login = $_REQUEST['login'];
        $pass = $_REQUEST['password'];

        $db->setQuery(" SELECT  id
                        FROM    users
                        WHERE   username = '$login' AND password = '$pass'");
        $user_data = $db->getResultArray();

        if($user_data['count'] > 0){
            $_SESSION['user_id'] = $user_data['result'][0]['id'];
            $data['status'] = 'OK';
        }
        else{
            $data['status'] = '0';
        }
        
        break;

    case 'destroy_session':

        session_destroy();

        unset($_SESSION['user_id']);

    break;
    case 'get_glass_page':
        $id = $_REQUEST['id'];
        
        $data = array('page' => getGlassPage(getGlass($id)));
    break;
    case 'get_product_page':
        $id = $_REQUEST['id'];
        
        $data = array('page' => getProductPage(getProduct($id)));
    break;

    case 'get_edit_page':

        $id = $_REQUEST['id'];

        $data = array('page' => getPage(getWriting($id)));

    break;

    case 'copy_writing':

        $id = $_REQUEST['writing_id'];

        

        $db->setQuery(" SELECT 		writings.id,

                                    writings.firstname,

                                    writings.lastname,

                                    writings.sex_id,
                                    
                                    writings.cab_id,

                                    writings.phone,

                                    writings.total_price,

                                    writings.soc_media,

                                    writings.personal_id,

                                    writings.impuls_qty,

                                    writings.status AS status_id

                            

                        FROM 		writings

                        WHERE 		writings.actived = 1 AND writings.id = '$id'



                        ORDER BY 	writings.id DESC");

        $result = $db->getResultArray();



        $res = $result['result'][0];



        $db->setQuery("INSERT INTO writings SET firstname='$res[firstname]',

                                                lastname='$res[lastname]',

                                                sex_id='$res[sex_id]',

                                                phone='$res[phone]',
                                                
                                                cab_id='$res[cab_id]',

                                                soc_media='$res[soc_media]',

                                                write_datetime=NOW(),

                                                personal_id='$res[personal_id]',

                                                total_price='$res[total_price]',

                                                status='$res[status_id]'");

        $db->execQuery();



        $db->setQuery("SELECT MAX(id) as id FROM writings WHERE actived = 1");

        $new_id = $db->getResultArray();

        $new_id = $new_id['result'][0]['id'];



        $db->setQuery(" SELECT  zone_id,

                                impuls_qty

                        FROM    selected_zones

                        WHERE   selected_zones.writing_id = '$id'");

        $copy_zones = $db->getResultArray();



        foreach($copy_zones['result'] AS $zone){

            $db->setQuery("INSERT INTO selected_zones SET   zone_id='$zone[zone_id]',

                                                            impuls_qty='$zone[impuls_qty]',

                                                            writing_id='$new_id'");

            $db->execQuery();

        }

    break;

    case 'reload_impulses':

        $id = $_REQUEST['writing_id'];

        $zones = $_REQUEST['zones'];

        

        foreach($zones AS $zone){

            $db->setQuery(" SELECT      zones.id,

                                        zones.name,

                                        selected_zones.impuls_qty

                            FROM        zones

                            LEFT JOIN   selected_zones ON selected_zones.zone_id = zones.id AND selected_zones.writing_id = '$id'

                            WHERE       zones.id = '$zone'");

            $impuls_data = $db->getResultArray();

            $impuls_data = $impuls_data['result'][0];



            $html .= '  <div class="col-sm-4">

                            <label>'.$impuls_data[name].': </label>

                            <input value="'.$impuls_data[impuls_qty].'" data-nec="0" style="height: 18px; width: 25%;" type="text" id="impuls_'.$impuls_data[id].'" class="impulses" autocomplete="off">

                        </div>';

        }



        $data['automatedChild'] = $html;

    break;

    case 'count_total_money':

        $start  = $_REQUEST['start_date'];

        $end    = $_REQUEST['end_date'];

        

        $db->setQuery(" SELECT  	IFNULL(SUM(writings.total_price),'0,00') AS 'total'

                        FROM    	writings

                        WHERE   	writings.status = 3 AND DATE(writings.visit_datetime) BETWEEN '$start' AND '$end' AND writings.actived=1");

        $total = $db->getResultArray();





        $db->setQuery(" SELECT 	    personal.id,

                                    personal.name,

                                    IFNULL(SUM(writings.total_price),'0,00') AS cc



                        FROM 		personal

                        LEFT JOIN   writings ON writings.personal_id = personal.id AND writings.actived=1 AND writings.`status` = 3 AND DATE(writings.visit_datetime) BETWEEN '$start' AND '$end'

                        WHERE 	    personal.actived = 1

                        GROUP BY    personal.id");

        $personal_cc = $db->getResultArray();

        $data['total'] = $total['result'][0]['total'];

        $data['personal'] = $personal_cc['result'];

    break;

    case 'get_selected_zones_male':

        $db->setQuery("	SELECT 	`id`,

								CONCAT(`name`, '( ',price,' GEL )') AS name

						FROM   	`zones`

						WHERE  	`actived` = 1 AND sex_id = 2");

		$data = $db->getResultArray();

    break;

    case 'get_selected_zones_female':

        $db->setQuery("	SELECT 	`id`,

								CONCAT(`name`, '( ',price,' GEL )') AS name

						FROM   	`zones`

						WHERE  	`actived` = 1 AND sex_id = 1");

		$data = $db->getResultArray();

    break;

    case 'get_selected_zones':

        $id = $_REQUEST['id'];

        $db->setQuery("	SELECT 		GROUP_CONCAT(selected_zones.zone_id) AS zones

                        FROM 		writings

                        LEFT JOIN	selected_zones ON selected_zones.writing_id = writings.id

                        WHERE 		writings.actived = 1 AND writings.id = '$id'");

		$zones = $db->getResultArray();



        $data['selectedZones'] = $zones['result'][0]['zones'];

    break;

    case 'save_writing':

        $id         = $_REQUEST['id'];

        $firstname  = $_REQUEST['firstname'];

        $lastname   = $_REQUEST['lastname'];

        $soc_media  = $_REQUEST['soc_media'];

        $phone      = $_REQUEST['phone'];

        $sex_id     = $_REQUEST['sex_id'];

        $visit_date = $_REQUEST['visit_date'];

        $personal   = $_REQUEST['personal'];

        $impuls_qty = $_REQUEST['impuls_qty'];

        $total_price = $_REQUEST['total_price'];

        $status     = $_REQUEST['status'];

        $zones      = $_REQUEST['zones'];
        
        $cab_id     = $_REQUEST['cab_id'];



        $impulses   = $_REQUEST['impulses'];



        if($id == ''){

            $db->setQuery(" SELECT 	COUNT(*) AS cc

                            FROM 	writings

                            WHERE 	writings.actived = 1 AND visit_datetime BETWEEN DATE_SUB('$visit_date', INTERVAL 14 MINUTE) AND DATE_ADD('$visit_date', INTERVAL 14 MINUTE) AND cab_id = '$cab_id'");

                            

            $check_cc = $db->getResultArray();

            if($check_cc['result'][0]['cc'] == 0){

                $db->setQuery("INSERT INTO writings SET firstname='$firstname',

                                                    lastname='$lastname',

                                                    sex_id='$sex_id',

                                                    phone='$phone',

                                                    soc_media='$soc_media',
                                                    cab_id='$cab_id',

                                                    write_datetime=NOW(),

                                                    visit_datetime='$visit_date',

                                                    personal_id='$personal',

                                                    total_price='$total_price',

                                                    status='$status'");

                $db->execQuery();

    

                $db->setQuery("SELECT MAX(id) as id FROM writings WHERE actived = 1");

                $new_id = $db->getResultArray();

                $new_id = $new_id['result'][0]['id'];

    

                

                $db->setQuery("DELETE FROM selected_zones WHERE writing_id = '$new_id'");

                $db->execQuery();

    

                foreach($zones AS $zone){

                    $db->setQuery("INSERT INTO selected_zones SET writing_id = '$new_id', zone_id='$zone'");

                    $db->execQuery();

                }

    

                foreach($impulses AS $imp){

                    $impulse_data = explode(':',$imp);

    

                    $impulse_zone = explode('_',$impulse_data[0]);

    

    

                    $impulse_zone_id = $impulse_zone[1];

                    $impulse_zone_value = $impulse_data[1];

    

                    $db->setQuery("UPDATE selected_zones SET impuls_qty='$impulse_zone_value' WHERE writing_id='$new_id' AND zone_id='$impulse_zone_id'");

                    $db->execQuery();

                }

                $data['error'] = '';

            }

            else{

                $data['error'] = 'time_error';

            }

            

        }

        else{

            $db->setQuery(" SELECT 	COUNT(*) AS cc

                            FROM 	writings

                            WHERE 	writings.actived = 1 AND visit_datetime BETWEEN DATE_SUB('$visit_date', INTERVAL 14 MINUTE) AND DATE_ADD('$visit_date', INTERVAL 14 MINUTE) AND cab_id = '$cab_id'");

                            

            $check_cc = $db->getResultArray();

            if($check_cc['result'][0]['cc'] == 0){

                $db->setQuery("UPDATE writings SET firstname='$firstname',

                                                lastname='$lastname',

                                                sex_id='$sex_id',
                                                
                                                cab_id='$cab_id',

                                                phone='$phone',

                                                soc_media='$soc_media',

                                                visit_datetime='$visit_date',

                                                personal_id='$personal',

                                                total_price='$total_price',

                                                status='$status'

                                WHERE id='$id'");

                $db->execQuery();

    

    

                $db->setQuery("DELETE FROM selected_zones WHERE writing_id = '$id'");

                $db->execQuery();

    

                foreach($zones AS $zone){

                    $db->setQuery("INSERT INTO selected_zones SET writing_id = '$id', zone_id='$zone'");

                    $db->execQuery();

                }

    

                foreach($impulses AS $imp){

                    $impulse_data = explode(':',$imp);

    

                    $impulse_zone = explode('_',$impulse_data[0]);

    

    

                    $impulse_zone_id = $impulse_zone[1];

                    $impulse_zone_value = $impulse_data[1];

    

                    $db->setQuery("UPDATE selected_zones SET impuls_qty='$impulse_zone_value' WHERE writing_id='$id' AND zone_id='$impulse_zone_id'");

                    $db->execQuery();

                }

                $data['error'] = '';

            }

            else{

                $db->setQuery("UPDATE writings SET firstname='$firstname',

                                                lastname='$lastname',

                                                sex_id='$sex_id',
                                                
                                                cab_id='$cab_id',

                                                phone='$phone',

                                                soc_media='$soc_media',

                                                personal_id='$personal',

                                                total_price='$total_price',

                                                status='$status'

                                WHERE id='$id'");

                $db->execQuery();

    

    

                $db->setQuery("DELETE FROM selected_zones WHERE writing_id = '$id'");

                $db->execQuery();

    

                foreach($zones AS $zone){

                    $db->setQuery("INSERT INTO selected_zones SET writing_id = '$id', zone_id='$zone'");

                    $db->execQuery();

                }

    

                foreach($impulses AS $imp){

                    $impulse_data = explode(':',$imp);

    

                    $impulse_zone = explode('_',$impulse_data[0]);

    

    

                    $impulse_zone_id = $impulse_zone[1];

                    $impulse_zone_value = $impulse_data[1];

    

                    $db->setQuery("UPDATE selected_zones SET impuls_qty='$impulse_zone_value' WHERE writing_id='$id' AND zone_id='$impulse_zone_id'");

                    $db->execQuery();

                }
                $data['error'] = 'time_error';

            }

            



        }

    break;

    case 'disable':

        $ids = $_REQUEST['id'];

        $ids = explode(',',$ids);



        foreach($ids AS $id){

            $db->setQuery("UPDATE writings SET actived = 0 WHERE id = '$id'");

            $db->execQuery();

        }

    break;

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

					}elseif($columns[$j] == "id2" OR $columns[$j] == "write_date" OR $columns[$j] == "impuls_qty" ){

						$g = array('field'=>$columns[$j], 'hidden' => true,'encoded'=>false,'title'=>$columnNames[0][$a],'filterable'=>array('multi'=>true,'search' => true), 'width' => 100);

					}
                    elseif($columns[$j] == "inc_date"){

						$g = array('field'=>$columns[$j],'encoded'=>false,'title'=>$columnNames[0][$a],'filterable'=>array('multi'=>true,'search' => true), 'width' => 130);

					}
                    elseif($columns[$j] == "glass_count"){

						$g = array('field'=>$columns[$j],'encoded'=>false,'title'=>$columnNames[0][$a],'filterable'=>array('multi'=>true,'search' => true), 'width' => 400);

					}
                    elseif($columns[$j] == "name_product"){

						$g = array('field'=>$columns[$j],'encoded'=>false,'title'=>$columnNames[0][$a],'filterable'=>array('multi'=>true,'search' => true), 'width' => 130);

					}
                    elseif($columns[$j] == "sort_n"){

						$g = array('field'=>$columns[$j],'encoded'=>false,'title'=>$columnNames[0][$a],'filterable'=>array('multi'=>true,'search' => true), 'width' => 70);

					}
                    elseif($columns[$j] == "proccess2"){

						$g = array('field'=>$columns[$j],'encoded'=>false,'title'=>$columnNames[0][$a],'filterable'=>array('multi'=>true,'search' => true), 'width' => 300);

					}
                    elseif($columns[$j] == "id"){

						$g = array('field'=>$columns[$j],'encoded'=>false,'title'=>$columnNames[0][$a],'filterable'=>array('multi'=>true,'search' => true), 'width' => 80);

					}
                    else{

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

    case 'get_list':

        $id          =      $_REQUEST['hidden'];

		

        $columnCount = 		$_REQUEST['count'];

		$cols[]      =      $_REQUEST['cols'];



            $db->setQuery("SELECT 	orders.id,
                                    orders.datetime,
                                    orders.client_name,
                                    orders.client_pid,
                                    orders.client_phone,
                                    orders.client_addr,
                                    orders.total,
                                    orders.avansi,
                                    orders.avans_plus,
                                    orders.total - (orders.avansi+orders.avans_plus) AS left_to_pay,
                                    CONCAT(order_status.name, 
                                    CASE
                                        WHEN orders.status_id = 1 THEN '<div class=\"red_dot\"></div>'
                                        WHEN orders.status_id = 2 THEN '<div class=\"yellow_dot\"></div>'
                                        WHEN orders.status_id = 3 THEN '<div class=\"mid_yellow_dot\"></div>'
                                        WHEN orders.status_id = 4 THEN '<div class=\"green_dot\"></div>'
                                        WHEN orders.status_id = 5 THEN '<div class=\"red_dot\"></div>'
                                    END)
                                    
                                        
                            FROM 	orders
                            JOIN	order_status ON order_status.id = orders.status_id
                            WHERE 	orders.actived = 1");



        $result = $db->getKendoList($columnCount, $cols);

        $data = $result;

    break;

    case 'get_list_product':
        $columnCount = 		$_REQUEST['count'];
		$cols[]      =      $_REQUEST['cols'];

        $order_id = $_REQUEST['order_id'];

        $db->setQuery(" SELECT  orders_product.id,
                                products.name,
                                GROUP_CONCAT(CONCAT('№-',products_glasses.id,' ',glass_options.name, ' - <span style=\"color:#000;',
                                CASE
                                    WHEN glass_status.id = 1 THEN 'background-color: red;'
                                    WHEN glass_status.id = 2 THEN 'background-color: yellow;'
                                    WHEN glass_status.id = 3 THEN 'background-color: green;'
                                    WHEN glass_status.id = 4 THEN 'background-color: red;'
                                    WHEN glass_status.id = 5 THEN 'background-color: red;'
                                END
                                ,'\">', glass_status.name,'</span>') SEPARATOR ',<br>') AS glasses,
                                CONCAT('<a style=\"color:blue;\" target=\"_blank\" href=\"',IFNULL(orders_product.picture,0),'\">სურათის გახსნა</a>') AS picture,
                                CONCAT('<a style=\"color:blue;\" class=\"product_detail\" data-id=\"',orders_product.id,'\" href=\"#\">დეტალურად</a>') AS detailed

                        FROM    orders_product
                        JOIN    products ON products.id = orders_product.product_id
                        JOIN	products_glasses ON products_glasses.order_product_id = orders_product.id
                        JOIN	glass_options ON glass_options.id = products_glasses.glass_option_id
                        JOIN	glass_status ON glass_status.id = products_glasses.status_id
                        WHERE   orders_product.order_id = '$order_id'
                        GROUP BY orders_product.id");
        $result = $db->getKendoList($columnCount, $cols);

        $data = $result;
        break;
    case 'get_list_glasses':
        $columnCount = 		$_REQUEST['count'];
		$cols[]      =      $_REQUEST['cols'];

        $product_id = $_REQUEST['product_id'];

        $db->setQuery(" SELECT  products_glasses.id,
                                glass_options.name,
                                CONCAT(products_glasses.glass_width, 'სმ X ', products_glasses.glass_height,'სმ'),
                                glass_type.name,
                                glass_colors.name,
                                GROUP_CONCAT(CONCAT(groups.name, ' - <span style=\"color:#000;',
                                CASE
                                    WHEN glasses_paths.status_id = 1 THEN 'background-color: red;'
                                    WHEN glasses_paths.status_id = 2 THEN 'background-color: yellow;'
                                    WHEN glasses_paths.status_id = 3 THEN 'background-color: green;'
                                    WHEN glasses_paths.status_id = 4 THEN 'background-color: red;'
                                    WHEN glasses_paths.status_id = 5 THEN 'background-color: red;'
                                END
                                ,'\">', path_status.name,'</span>') SEPARATOR ',<br>') AS proccess,
                                CONCAT('<span style=\"padding:5px;', CASE
                                    WHEN glass_status.id = 1 THEN 'background-color: red;'
                                    WHEN glass_status.id = 2 THEN 'background-color: yellow;'
                                    WHEN glass_status.id = 3 THEN 'background-color: green;'
                                    WHEN glass_status.id = 4 THEN 'background-color: red;'
                                    WHEN glass_status.id = 5 THEN 'background-color: red;'
                                END
                                ,'\">', glass_status.name,'</span>') AS glasses

                        FROM    products_glasses
                        JOIN    glass_options ON glass_options.id = products_glasses.glass_option_id
                        JOIN    glass_type ON glass_type.id = products_glasses.glass_type_id
                        JOIN    glass_colors ON glass_colors.id = products_glasses.glass_color_id
                        JOIN    glass_status ON glass_status.id = products_glasses.status_id
                        LEFT JOIN	glasses_paths ON glasses_paths.glass_id = products_glasses.id
                        LEFT JOIN groups ON groups.id = glasses_paths.path_group_id
                        LEFT JOIN glass_status AS path_status ON path_status.id = glasses_paths.status_id
                        WHERE   products_glasses.actived = 1 AND products_glasses.order_product_id = '$product_id'
                        GROUP BY products_glasses.id
                        ORDER BY products_glasses.id");


        $result = $db->getKendoList($columnCount, $cols);

        $data = $result;
        break;
    case 'get_list_glasses_path':
        $columnCount = 		$_REQUEST['count'];
		$cols[]      =      $_REQUEST['cols'];

        $glass_id = $_REQUEST['glass_id'];

        $db->setQuery(" SELECT  glasses_paths.id,
                                groups.name,
                                glasses_paths.sort_n,
                                CONCAT('<span style=\"padding:5px;', CASE
                                    WHEN glass_status.id = 1 THEN 'background-color: red;'
                                    WHEN glass_status.id = 2 THEN 'background-color: yellow;'
                                    WHEN glass_status.id = 3 THEN 'background-color: green;'
                                    WHEN glass_status.id = 4 THEN 'background-color: red;'
                                    WHEN glass_status.id = 5 THEN 'background-color: red;'
                                END
                                ,'\">', glass_status.name,'</span>') AS glasses

                        FROM    glasses_paths
                        JOIN    groups ON groups.id = glasses_paths.path_group_id
                        JOIN    glass_status ON glass_status.id = glasses_paths.status_id
                        WHERE   glasses_paths.actived = 1 AND glasses_paths.glass_id = '$glass_id'
                        ORDER BY glasses_paths.sort_n ASC");


        $result = $db->getKendoList($columnCount, $cols);

        $data = $result;
        break;
}





echo json_encode($data);


function getSMSPage($res = ''){
    GLOBAL $db;
    $data .= '

    

    

    <fieldset class="fieldset">
        <legend>შეავსეთ გასაგზავნი ტექსტი (მაქსიმუმ 160 სიმბოლო)</legend>
        <div calss="col-md-12"> 
            <p>უნიკალური ადრესატი ჯამში: <b style="color:red;">'.$res['count'].'</b></p>
            <textarea id="sms_message" style="width:100%" maxlength="160"></textarea>
        </div>
    </fieldset>

    

    <input type="hidden" id="writing_id" value="'.$res[id].'">

    ';



    return $data;
}
function getGlass($id){
    GLOBAL $db;

    $db->setQuery(" SELECT  id,
                            glass_option_id,
                            glass_type_id,
                            glass_color_id,
                            glass_width,
                            glass_height,
                            status_id
                    FROM    products_glasses
                    WHERE   id = '$id'");

    $result = $db->getResultArray();



    return $result['result'][0];
    
}
function getGlassPage($res = ''){
    GLOBAL $db;
    
    $data = '   <fieldset class="fieldset">
                    <legend>ინფორმაცია</legend>
                        <div class="row">
                            <div class="col-sm-6">
                                <label>აირჩიეთ შუშა</label>
                                <select id="selected_glass_cat_id">
                                    '.getGlassOptions($res['glass_option_id']).'
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label>შეიყვანეთ ზომა (სიგრძეXსიგანე)</label>
                                <div class="row">
                                    <div class="col-sm-6"><input style="width:99%;" type="text" id="glass_width" value="'.$res['glass_width'].'"></div>
                                    <div class="col-sm-6"><input style="width:99%;" type="text" id="glass_height" value="'.$res['glass_height'].'"></div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label>აირჩიეთ ტიპი</label>
                                <select id="selected_glass_type_id">
                                    '.getGlassTypeOptions($res['glass_type_id']).'
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label>აირჩიეთ ფერი</label>
                                <select id="selected_glass_color_id">
                                    '.getGlassColorOptions($res['glass_color_id']).'
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label>აირჩიეთ სტატუსი</label>
                                <select id="selected_glass_status">
                                    '.getGlassStatusOptions($res['status_id']).'
                                </select>
                            </div>
                            <div style="margin-top: 16px;" class="col-sm-12">
                                <div id="path_div"></div>
                            </div>
                        </div>
                    </legend>
                </fieldset>

                <input type="hidden" id="glass_id" value="'.$res[id].'">

                ';

    return $data;
}
function getProduct($id){
    GLOBAL $db;

    $db->setQuery(" SELECT  id,
                            product_id AS product_cat_id,
                            picture
                    FROM    orders_product
                    WHERE   id = '$id'");

    $result = $db->getResultArray();



    return $result['result'][0];
    
}
function getProductPage($res = ''){
    GLOBAL $db;

    $data = '   <fieldset class="fieldset">
                    <legend>ინფორმაცია</legend>
                        <div class="row">
                            <div class="col-sm-6">
                                <label>აირჩიეთ პროდუქცია</label>
                                <select id="selected_product_id">
                                    '.getProductOptions($res['product_cat_id']).'
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label>აირჩიეთ სურათი</label>
                                <input type="file">
                            </div>
                            <div style="margin-top: 16px;" class="col-sm-12">
                                <div id="glasses_div"></div>
                            </div>
                        </div>
                    </legend>
                </fieldset>

                <input type="hidden" id="product_id" value="'.$res[id].'">

                ';

    return $data;
}

function getGlassStatusOptions($id){
    GLOBAL $db;
    $data = '';
    $db->setQuery("SELECT   id,
                            name AS 'name'
                    FROM    glass_status
                    WHERE actived = 1");
    $cats = $db->getResultArray();
    foreach($cats['result'] AS $cat){
        if($cat[id] == $id){
            $data .= '<option value="'.$cat[id].'" selected="selected">'.$cat[name].'</option>';
        }
        else{
            $data .= '<option value="'.$cat[id].'">'.$cat[name].'</option>';
        }
    }
    return $data;
}
function getGlassColorOptions($id){
    GLOBAL $db;
    $data = '';
    $db->setQuery("SELECT   id,
                            name AS 'name'
                    FROM    glass_colors
                    WHERE actived = 1");
    $cats = $db->getResultArray();
    foreach($cats['result'] AS $cat){
        if($cat[id] == $id){
            $data .= '<option value="'.$cat[id].'" selected="selected">'.$cat[name].'</option>';
        }
        else{
            $data .= '<option value="'.$cat[id].'">'.$cat[name].'</option>';
        }
    }
    return $data;
}
function getGlassTypeOptions($id){
    GLOBAL $db;
    $data = '';
    $db->setQuery("SELECT   id,
                            name AS 'name'
                    FROM    glass_type
                    WHERE actived = 1");
    $cats = $db->getResultArray();
    foreach($cats['result'] AS $cat){
        if($cat[id] == $id){
            $data .= '<option value="'.$cat[id].'" selected="selected">'.$cat[name].'</option>';
        }
        else{
            $data .= '<option value="'.$cat[id].'">'.$cat[name].'</option>';
        }
    }
    return $data;
}
function getGlassOptions($id){
    GLOBAL $db;
    $data = '';
    $db->setQuery("SELECT   id,
                            name AS 'name'
                    FROM    glass_options 
                    WHERE actived = 1");
    $cats = $db->getResultArray();
    foreach($cats['result'] AS $cat){
        if($cat[id] == $id){
            $data .= '<option value="'.$cat[id].'" selected="selected">'.$cat[name].'</option>';
        }
        else{
            $data .= '<option value="'.$cat[id].'">'.$cat[name].'</option>';
        }
    }
    return $data;
}
function getProductOptions($id){
    GLOBAL $db;
    $data = '';
    $db->setQuery("SELECT   id,
                            name AS 'name'
                    FROM    products 
                    WHERE actived = 1");
    $cats = $db->getResultArray();
    foreach($cats['result'] AS $cat){
        if($cat[id] == $id){
            $data .= '<option value="'.$cat[id].'" selected="selected">'.$cat[name].'</option>';
        }
        else{
            $data .= '<option value="'.$cat[id].'">'.$cat[name].'</option>';
        }
    }
    return $data;
}
function getPage($res = ''){

    GLOBAL $db;

    $male_checked = '';

    $female_checked = '';

    if($res['sex_id'] == 1){

        $female_checked = 'checked';

    }

    else if($res['sex_id'] == 2){

        $male_checked = 'checked';

    }



    $data .= '

    

    

    <fieldset class="fieldset">
        <legend>ინფორმაცია</legend>
        <div class="row">
            <div class="col-sm-3">
                <label>დასახელება</label>
                <input value="'.$res['client_name'].'" data-nec="0" style="height: 18px; width: 95%;" type="text" id="client_name" class="idle" autocomplete="off">
            </div>

            <div class="col-sm-3">
                <label>ტელეფონი</label>
                <input value="'.$res['client_phone'].'" data-nec="0" style="height: 18px; width: 95%;" type="text" id="client_phone" class="idle" autocomplete="off">
            </div>

            <div class="col-sm-3">
                <label>მისამართი</label>
                <input value="'.$res['client_addr'].'" data-nec="0" style="height: 18px; width: 95%;" type="text" id="client_addr" class="idle" autocomplete="off">
            </div>
            <div class="col-sm-3">
                <label>შეკვეთის თარიღი</label>
                <input value="'.$res['datetime'].'" data-nec="0" style="height: 18px; width: 95%;" type="text" id="order_date" class="idle" autocomplete="off">
            </div>
            <div class="col-sm-12">---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</div>
            <div class="col-sm-4">
                <label>სულ გადასახდელი</label>
                <input value="'.$res['total'].'" data-nec="0" style="height: 18px; width: 95%;" type="text" id="pay_total" class="idle" autocomplete="off">
            </div>
            <div class="col-sm-4">
                <label>ავანსი</label>
                <input value="'.$res['avansi'].'" data-nec="0" style="height: 18px; width: 95%;" type="text" id="avansi" class="idle" autocomplete="off">
            </div>
            <div class="col-sm-4">
                <label>დამატებული თანხა</label>
                <input value="'.$res['avans_plus'].'" data-nec="0" style="height: 18px; width: 95%;" type="text" id="avans_plus" class="idle" autocomplete="off">
            </div>
            <div class="col-sm-12">---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</div>
            <div class="col-sm-12">
                <label>პროდუქცია</label>
                <div id="product_div"></div>
            </div>
            
            ';

            
            



        $data .= '</div></div>

    </fieldset>

    

    <input type="hidden" id="writing_id" value="'.$res[id].'">

    ';



    return $data;

}

function getWriting($id){

    GLOBAL $db;



    $db->setQuery(" SELECT 	orders.id,
                            orders.datetime,
                            orders.client_name,
                            orders.client_pid,
                            orders.client_phone,
                            orders.client_addr,
                            orders.total,
                            orders.avansi,
                            orders.avans_plus
                        
                            
                    FROM 	orders
                    WHERE 	orders.actived = 1 AND orders.id = '$id'");

    $result = $db->getResultArray();



    return $result['result'][0];

}

function getPersonal($id){

    GLOBAL $db;

    $data = '';

    $db->setQuery("SELECT   id,

                            name AS 'name'

                    FROM    personal

                    WHERE   actived = 1");

    $cats = $db->getResultArray();

    foreach($cats['result'] AS $cat){

        if($cat[id] == $id){

            $data .= '<option value="'.$cat[id].'" selected="selected">'.$cat[name].'</option>';

        }

        else{

            $data .= '<option value="'.$cat[id].'">'.$cat[name].'</option>';

        }

        

    }



    return $data;

}

function getStatuses($id){

    GLOBAL $db;

    $data = '';

    $db->setQuery("SELECT   id,

                            name AS 'name'

                    FROM    writing_status

                    WHERE   actived = 1");

    $cats = $db->getResultArray();

    foreach($cats['result'] AS $cat){

        if($cat[id] == $id){

            $data .= '<option value="'.$cat[id].'" selected="selected">'.$cat[name].'</option>';

        }

        else{

            $data .= '<option value="'.$cat[id].'">'.$cat[name].'</option>';

        }

        

    }



    return $data;

}

function getCab($id){

    GLOBAL $db;

    $data = '';

    $db->setQuery("SELECT   id,

                            name AS 'name'

                    FROM    cabinet");

    $cats = $db->getResultArray();

    foreach($cats['result'] AS $cat){

        if($cat[id] == $id){

            $data .= '<option value="'.$cat[id].'" selected="selected">'.$cat[name].'</option>';

        }

        else{

            $data .= '<option value="'.$cat[id].'">'.$cat[name].'</option>';

        }

        

    }



    return $data;

}

?>