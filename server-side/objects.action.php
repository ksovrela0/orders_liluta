<?php
error_reporting(E_ERROR);
include('../db.php');
GLOBAL $db;
$db = new dbClass();
$act = $_REQUEST['act'];
$user_id = $_SESSION['USERID'];
$user_gr = $_SESSION['GRPID'];
switch ($act){
    case 'get_add_page':
        $id = $_REQUEST['id'];
        $data = array('page' => getPage());
    break;
    case 'get_edit_page':
        $id = $_REQUEST['id'];
        $data = array('page' => getPage(getObject($id)));
    break;
    case 'get_status_page':
        $id = $_REQUEST['id'];

        $data = array('page' => getStatusPage(getStatus($id)));
    break;
    case 'save_warehouse':
        $id             = $_REQUEST['id'];
        $glass_cat      = $_REQUEST['glass_cat'];
        $glass_type     = $_REQUEST['glass_type'];
        $glass_color    = $_REQUEST['glass_color'];

        $glass_qty      = $_REQUEST['glass_qty'];
        $glass_width    = $_REQUEST['glass_width'];
        $glass_height   = $_REQUEST['glass_height'];
        $sqr_price      = $_REQUEST['sqr_price'];
        $pyramid        = $_REQUEST['pyramid'];

        $marja        = $_REQUEST['marja'];
        $owner        = $_REQUEST['owner'];
        $bringer        = $_REQUEST['bringer'];
        $gtype        = $_REQUEST['gtype'];

        $glass_manuf        = $_REQUEST['glass_manuf'];
        
        if($id == ''){
            $db->setQuery(" INSERT INTO  warehouse 
                            SET     `glass_option_id` = '$glass_cat',
                                    `glass_type_id` = '$glass_type',
                                    `glass_color_id` = '$glass_color',
                                    `qty` = '$glass_qty',
                                    `glass_width` = '$glass_width',
                                    `glass_height` = '$glass_height',
                                    `sqr_price` = '$sqr_price',
                                    `glass_manuf_id` = '$glass_manuf',
                                    `marja` = '$marja',
                                    `owner` = '$owner',
                                    `bringer` = '$bringer',
                                    `gtype` = '$gtype',
                                    `pyramid` = '$pyramid'");
            $db->execQuery();
        }
        else{
            $db->setQuery(" UPDATE  warehouse 
                            SET     `glass_option_id` = '$glass_cat',
                                    `glass_type_id` = '$glass_type',
                                    `glass_color_id` = '$glass_color',
                                    `qty` = '$glass_qty',
                                    `glass_width` = '$glass_width',
                                    `glass_height` = '$glass_height',
                                    `sqr_price` = '$sqr_price',
                                    `glass_manuf_id` = '$glass_manuf',
                                    `marja` = '$marja',
                                    `owner` = '$owner',
                                    `bringer` = '$bringer',
                                    `gtype` = '$gtype',
                                    `pyramid` = '$pyramid'
                            WHERE   id = '$id'");
            $db->execQuery();
        }

        $db->setQuery("UPDATE warehouse SET `sqr_price` = '$sqr_price' WHERE `glass_manuf_id` = '$glass_manuf' AND `glass_option_id` = '$glass_cat' AND `glass_type_id` = '$glass_type' AND `glass_color_id` = '$glass_color'");
        $db->execQuery();
        $data = array("status" => 1);
    break;
    case 'disable':
        $ids = $_REQUEST['id'];
        $ids = explode(',',$ids);

        foreach($ids AS $id){
            $db->setQuery("UPDATE warehouse SET actived = 0 WHERE id = '$id'");
            $db->execQuery();
        }
    break;
    case 'save_mina_status':
        $id = $_REQUEST['id'];

        $type = $_REQUEST['type'];
        $pyramid = $_REQUEST['pyramid'];

        if($type == "proc_again"){
            

            $db->setQuery(" SELECT  cut_id, status_id
                            FROM    lists_to_cut
                            WHERE   actived = 1 AND glass_id = '$id' AND status_id NOT IN (3)");
            
            $cut_id = $db->getResultArray()['result'][0]['cut_id'];

            if($cut_id != ''){
                $data['error'] = 'ჭრის პროცესის თავიდან გავლა შეუძლებელია! ჭრის პროცესის თავიდან დასაწყებად დააჭირეთ "ხელახლა მოჭრა-ს"';
            }
            else{
                $db->setQuery(" SELECT      id, path_group_id
                                FROM        glasses_paths
                                WHERE       actived = 1 AND glass_id = '$id' AND status_id IN (1,2,4)
                                ORDER BY    sort_n
                                LIMIT 1");

                $glass_data = $db->getResultArray()['result'][0];

                $path_id = $glass_data['id'];
                $path_group_id = $glass_data['path_group_id'];

                $db->setQuery("UPDATE products_glasses SET status_id = '2', last_pyramid = '$pyramid' WHERE id = '$id'");
                $db->execQuery();

                $db->setQuery("UPDATE glasses_paths SET status_id = 1, pyramid = '$pyramid' WHERE id = '$path_id'");
                $db->execQuery();

                if($path_group_id == 6 || $path_group_id == 7){
                    $db->setQuery("SELECT order_product_id FROM products_glasses WHERE id = '$id'");
                    $prod_id  = $db->getResultArray()['result'][0]['order_product_id'];

                    $db->setQuery("UPDATE orders_product SET status_id = 1, pyramid = '$pyramid' WHERE id = '$prod_id'");
                    $db->execQuery();

                    /* $db->setQuery("UPDATE glasses_paths SET status_id = 1 WHERE glass_id IN (SELECT id FROM products_glasses WHERE actived = 1 AND order_product_id = '$prod_id') AND path_group_id = '$path_group_id' AND actived = 1");
                    $db->execQuery(); */
                }

                $data['status'] = 1;
            }
        }
        else if($type == 'proc_next'){
            $db->setQuery(" SELECT  cut_id, status_id
                            FROM    lists_to_cut
                            WHERE   actived = 1 AND glass_id = '$id' AND status_id NOT IN (3)");
            
            $cut_data = $db->getResultArray()['result'][0];
            $cut_id = $cut_data['cut_id'];
            $status_id = $cut_data['status_id'];
            if($cut_id != ''){
                if($status_id == 4){
                    $db->setQuery("UPDATE lists_to_cut SET status_id = 3, pyramid = '$pyramid', finish_datetime = NOW() WHERE glass_id = '$id'");
                    $db->execQuery();

                    $db->setQuery("UPDATE products_glasses SET status_id = '2', last_pyramid = '$pyramid' WHERE id = '$id'");
                    $db->execQuery();
                    $data['status'] = 1;
                }
                else{
                    $data['error'] = 'თქვენ მიერ არჩეული მინა მოლოდინშია ან მიმდინარე, მისი შემდეგ პროცესზე გადაყვანა შეუძლებელია';
                }
            }
            else{
                $db->setQuery(" SELECT      id, path_group_id, status_id
                                FROM        glasses_paths
                                WHERE       actived = 1 AND glass_id = '$id' AND status_id IN (1,2,4)
                                ORDER BY    sort_n
                                LIMIT 2");

                $glass_data = $db->getResultArray()['result'];

                $path_id = $glass_data[0]['id'];
                $path_group_id = $glass_data[0]['path_group_id'];
                $path_status_id = $glass_data[0]['status_id'];
                if($path_status_id == 4){
                    if($path_group_id == 6 || $path_group_id == 7){
                        $data['error'] = 'მინაპაკეტის/ლამექსის შემდეგ პროცესზე გადაყვანა შეუძლებელია. დააწყებინეთ პროცესი თავიდან';
                    }
                    else{
                        $db->setQuery("UPDATE glasses_paths SET status_id = 3, pyramid = '$pyramid', finish_datetime = NOW() WHERE id = '$path_id'");
                        $db->execQuery();
    
                        $db->setQuery("UPDATE products_glasses SET status_id = '2', last_pyramid = '$pyramid' WHERE id = '$id'");
                        $db->execQuery();
    
                        $db->setQuery("SELECT order_id FROM products_glasses WHERE id = '$id'");
                        $order_data = $db->getResultArray()['result'][0];
    
                        $order_id = $order_data['order_id'];
                        if($glass_data[1]['id'] == ''){
                            $db->setQuery("UPDATE products_glasses SET status_id = '3', last_pyramid = '$pyramid' WHERE id = '$id'");
                            $db->execQuery();
    
                        }
    
                        finish_order($order_id);
    
                        $data['status'] = 1;
                    }
                    
                }
                else{
                    $data['error'] = 'თქვენ მიერ არჩეული მინა მოლოდინშია ან მიმდინარე, მისი შემდეგ პროცესზე გადაყვანა შეუძლებელია';
                }

            }
        }
        else if($type == 'proc_start'){

            $db->setQuery("UPDATE products_glasses SET status_id = 4, display = 0 WHERE id = '$id'");
            $db->execQuery();

            $db->setQuery(" SELECT  cut_id, status_id
                            FROM    lists_to_cut
                            WHERE   actived = 1 AND glass_id = '$id' AND status_id NOT IN (3)");
            
            $cut_data = $db->getResultArray()['result'][0];
            $cut_id = $cut_data['cut_id'];
            $status_id = $cut_data['status_id'];
            if($cut_id != ''){
                $db->setQuery("UPDATE lists_to_cut SET status_id = 4 WHERE glass_id = '$id'");
                $db->execQuery();
            }
            else{
                $db->setQuery(" SELECT      id, path_group_id, status_id
                                FROM        glasses_paths
                                WHERE       actived = 1 AND glass_id = '$id' AND status_id IN (1,2,4)
                                ORDER BY    sort_n
                                LIMIT 2");

                $glass_data = $db->getResultArray()['result'];

                $path_id = $glass_data[0]['id'];
                $path_group_id = $glass_data[0]['path_group_id'];
                $path_status_id = $glass_data[0]['status_id'];

                $db->setQuery("UPDATE glasses_paths SET status_id = 4 WHERE id = '$path_id'");
                $db->execQuery();
            }



            $qty        = 1;



            $db->setQuery("SELECT * FROM products_glasses WHERE id = '$id'");
            $glass = $db->getResultArray()['result'][0];

            $db->setQuery("SELECT * FROM glasses_paths WHERE glass_id = '$id' AND actived = 1");
            $paths = $db->getResultArray()['result'];

            for($i = 0; $i<$qty; $i++){
                $db->setQuery("INSERT INTO products_glasses SET datetime = NOW(),
                                                                user_id = '$glass[user_id]',
                                                                order_product_id = '$glass[order_product_id]',
                                                                order_id = '$glass[order_id]',
                                                                glass_option_id = '$glass[glass_option_id]',
                                                                glass_type_id = '$glass[glass_type_id]',
                                                                glass_color_id = '$glass[glass_color_id]',
                                                                glass_manuf_id = '$glass[glass_manuf_id]',
                                                                glass_width = '$glass[glass_width]',
                                                                glass_height = '$glass[glass_height]',
                                                                picture = '$glass[picture]',
                                                                go_to_cut = '$glass[go_to_cut]',
                                                                status_id = 1");
                $db->execQuery();

                $newGlassID = $db->getLastId();
                foreach($paths AS $path){

                    $db->setQuery("INSERT INTO glasses_paths SET datetime = NOW(),
                                                                    user_id = '$path[user_id]',
                                                                    glass_id = '$newGlassID',
                                                                    path_group_id = '$path[path_group_id]',
                                                                    cuts = '$path[cuts]',
                                                                    holes = '$path[holes]',
                                                                    sort_n = '$path[sort_n]',
                                                                    price = '$path[price]',
                                                                    status_id = 1");
                    $db->execQuery();
                    
                }

            }
            
            $data['status'] = 1;
            

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
                    //$g = array('field'=>$columns[$j],'encoded'=>false,'title'=>$columnNames[0][$a],'values'=>getSelectors($selectors[0][$a]));
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
					}
                    elseif($columns[$j] == "glasses_prod"){
                        $g = array('field'=>$columns[$j], 'hidden' => false,'encoded'=>false,'title'=>$columnNames[0][$a],'filterable'=>array('multi'=>true,'search' => true), 'width' => 600);
                    }
                    elseif($columns[$j] == "inc_date"){
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
    case 'get_list_by_prod':
        $columnCount = 		$_REQUEST['count'];
		$cols[]      =      $_REQUEST['cols'];

        $db->setQuery("SELECT * FROM (SELECT	orders_product.id,
                                GROUP_CONCAT(DISTINCT CONCAT('№-',products_glasses.id,' ',glass_options.name, ' - <b>',products_glasses.glass_width,'</b> X <b>', products_glasses.glass_height,'</b> მმ</b> პირამიდა: ', IFNULL(products_glasses.last_pyramid,''),' <span data-id=\"',products_glasses.id,'\" class=\"print_shtrixkod\"><img style=\"width:20px\" src=\"assets/img/print.png\"></span> ',gl_st.name) SEPARATOR ',<br>') AS glasses,
                                products.name,
                                orders_product.pyramid,
                                orders.id AS order_id,
                                CONCAT(orders.client_name, ' ', orders.comment),
                                orders.client_pid,
                                orders.client_phone,
                                IF(orders.total - (orders.avansi+orders.avans_plus) = 0,'კი','არა') AS payment,
                                CONCAT('<span class=\"status_',glass_status.id,'\">',glass_status.name,'</span>')
                                
                                
                                

                                FROM    orders_product
                                JOIN    orders ON orders.id = orders_product.order_id
                                JOIN    products ON products.id = orders_product.product_id
                                
                                LEFT JOIN	products_glasses ON products_glasses.order_product_id = orders_product.id
                                JOIN		glasses_paths ON glasses_paths.glass_id = products_glasses.id AND glasses_paths.actived = 1
                                LEFT JOIN	glass_options ON glass_options.id = products_glasses.glass_option_id
                                LEFT JOIN	glass_status ON glass_status.id = orders_product.status_id
                                LEFT JOIN   glass_status AS gl_st ON gl_st.id = products_glasses.status_id
                                
                                WHERE   orders_product.actived = 1 AND products_glasses.actived = 1 AND orders.actived = 1 AND glasses_paths.path_group_id IN (6,7) AND orders_product.product_id IN (2,3)
                                
                                GROUP BY orders_product.id
                                ORDER BY glass_status.sort_n) AS ttt
                        ");

        $result = $db->getKendoList($columnCount, $cols);
        $data = $result;
    break;
    case 'get_list_by_glass':
        $columnCount = 		$_REQUEST['count'];
		$cols[]      =      $_REQUEST['cols'];

        $db->setQuery("SELECT * FROM (SELECT	products_glasses.id,
                                CONCAT(glass_options.name,' <br><b>',products_glasses.glass_width,'</b> X <b>', products_glasses.glass_height,'</b> მმ') AS glass,
                                products_glasses.last_pyramid,
                                orders.id AS order_id,
                                CONCAT(orders.client_name, ' ', orders.comment),
                                orders.client_pid,
                                orders.client_phone,
                                IF(orders.total - (orders.avansi+orders.avans_plus) = 0,'კი','არა') AS payment,
                                IF((SELECT COUNT(*) FROM glasses_paths WHERE actived = 1 AND glass_id = products_glasses.id AND status_id IN (1,2,4,5,6)) = 0,'<span class=\"status_finished\">დასრულებული</span>',CASE
                                    WHEN lists_to_cut.id IS NOT NULL THEN IF(lists_to_cut.status_id = 3, IFNULL(IFNULL((SELECT name FROM groups WHERE id = (SELECT IF(gp1.status_id = 3 OR gp1.status_id IS NULL,gp2.path_group_id,gp1.path_group_id) FROM glasses_paths AS gp2 LEFT JOIN glasses_paths AS gp1 ON gp1.glass_id = gp2.glass_id AND gp1.sort_n = gp2.sort_n-1 AND gp1.actived=1  WHERE gp2.status_id IN (1,2) AND gp2.glass_id = products_glasses.id AND gp2.actived = 1 ORDER BY gp1.sort_n ASC LIMIT 1)), IFNULL((SELECT name FROM groups WHERE id = (SELECT path_group_id FROM glasses_paths WHERE status_id IN (4,5) AND actived = 1 AND glass_id = products_glasses.id ORDER BY sort_n ASC LIMIT 1)), (SELECT name FROM groups WHERE id = (SELECT path_group_id FROM glasses_paths WHERE status_id IN (3) AND actived = 1 AND glass_id = products_glasses.id ORDER BY sort_n DESC LIMIT 1)))), (SELECT name FROM groups WHERE id = lists_to_cut.status_id)),'ჭრა')
                                    
                                    ELSE IF(products_glasses.go_to_cut != 1,IFNULL(IFNULL((SELECT name FROM groups WHERE id = (SELECT IF(gp1.status_id = 3 OR gp1.status_id IS NULL,gp2.path_group_id,gp1.path_group_id) FROM glasses_paths AS gp2 LEFT JOIN glasses_paths AS gp1 ON gp1.glass_id = gp2.glass_id AND gp1.sort_n = gp2.sort_n-1 AND gp1.actived=1 WHERE gp2.status_id IN (1,2) AND gp2.glass_id = products_glasses.id AND gp2.actived = 1 ORDER BY gp1.sort_n ASC LIMIT 1)), IFNULL((SELECT name FROM groups WHERE id = (SELECT path_group_id FROM glasses_paths WHERE status_id IN (4,5) AND actived = 1 AND glass_id = products_glasses.id ORDER BY sort_n ASC LIMIT 1)), (SELECT name FROM groups WHERE id = (SELECT path_group_id FROM glasses_paths WHERE status_id IN (3) AND actived = 1 AND glass_id = products_glasses.id ORDER BY sort_n DESC LIMIT 1)))), (SELECT name FROM groups WHERE id = lists_to_cut.status_id)), '')
                                END) AS procc,
                                
                                IF(products_glasses.status_id != 6,CASE
                                    WHEN lists_to_cut.id IS NOT NULL THEN IF(lists_to_cut.status_id = 3, IFNULL(IFNULL((SELECT CONCAT('<span class=\"status_',glass_status.id,'\">',name,'</span>') FROM glass_status WHERE id = (SELECT IF(gp1.status_id = 3 OR gp1.status_id IS NULL,gp2.status_id,gp1.status_id) FROM glasses_paths AS gp2 LEFT JOIN glasses_paths AS gp1 ON gp1.glass_id = gp2.glass_id AND gp1.sort_n = gp2.sort_n-1 AND gp1.actived=1 WHERE gp2.status_id IN (1,2) AND gp2.glass_id = products_glasses.id AND gp2.actived = 1 ORDER BY gp1.sort_n ASC LIMIT 1)), IFNULL((SELECT CONCAT('<span class=\"status_',glass_status.id,'\">',name,'</span>') FROM glass_status WHERE id = (SELECT status_id FROM glasses_paths WHERE status_id IN (4,5) AND actived = 1 AND glass_id = products_glasses.id ORDER BY sort_n ASC LIMIT 1)), (SELECT CONCAT('<span class=\"status_',glass_status.id,'\">',name,'</span>') FROM glass_status WHERE id = (SELECT status_id FROM glasses_paths WHERE status_id IN (3) AND actived = 1 AND glass_id = products_glasses.id ORDER BY sort_n DESC LIMIT 1)))), (SELECT CONCAT('<span class=\"status_',glass_status.id,'\">',name,'</span>') FROM glass_status WHERE id = lists_to_cut.status_id)), (SELECT CONCAT('<span class=\"status_',glass_status.id,'\">',name,'</span>') FROM glass_status WHERE id = lists_to_cut.status_id))
                                    
                                    ELSE IF(products_glasses.go_to_cut != 1,IFNULL(IFNULL((SELECT CONCAT('<span class=\"status_',glass_status.id,'\">',name,'</span>') FROM glass_status WHERE id = (SELECT IF(gp1.status_id = 3 OR gp1.status_id IS NULL,gp2.status_id,gp1.status_id) FROM glasses_paths AS gp2 LEFT JOIN glasses_paths AS gp1 ON gp1.glass_id = gp2.glass_id AND gp1.sort_n = gp2.sort_n-1 AND gp1.actived=1 WHERE gp2.status_id IN (1,2) AND gp2.glass_id = products_glasses.id AND gp2.actived = 1 ORDER BY gp1.sort_n ASC LIMIT 1)), IFNULL((SELECT CONCAT('<span class=\"status_',glass_status.id,'\">',name,'</span>') FROM glass_status WHERE id = (SELECT status_id FROM glasses_paths WHERE status_id IN (4,5) AND actived = 1 AND glass_id = products_glasses.id ORDER BY sort_n ASC LIMIT 1)), (SELECT CONCAT('<span class=\"status_',glass_status.id,'\">',name,'</span>') FROM glass_status WHERE id = (SELECT status_id FROM glasses_paths WHERE status_id IN (3) AND actived = 1 AND glass_id = products_glasses.id ORDER BY sort_n DESC LIMIT 1)))), lists_to_cut.status_id),'')
                                END,'გაცემული') AS status,
                                                                
                                CASE
                                    WHEN lists_to_cut.id IS NOT NULL THEN IF(lists_to_cut.status_id = 3, IFNULL(IFNULL((SELECT glass_status.sort_n FROM glass_status WHERE id = (SELECT IF(gp1.status_id = 3 OR gp1.status_id IS NULL,gp2.status_id,gp1.status_id) FROM glasses_paths AS gp2 LEFT JOIN glasses_paths AS gp1 ON gp1.glass_id = gp2.glass_id AND gp1.sort_n = gp2.sort_n-1 AND gp1.actived=1 WHERE gp2.status_id IN (1,2) AND gp2.glass_id = products_glasses.id AND gp2.actived = 1 ORDER BY gp1.sort_n ASC LIMIT 1)), IFNULL((SELECT glass_status.sort_n FROM glass_status WHERE id = (SELECT status_id FROM glasses_paths WHERE status_id IN (4,5) AND actived = 1 AND glass_id = products_glasses.id ORDER BY sort_n ASC LIMIT 1)), (SELECT glass_status.sort_n FROM glass_status WHERE id = (SELECT status_id FROM glasses_paths WHERE status_id IN (3) AND actived = 1 AND glass_id = products_glasses.id ORDER BY sort_n DESC LIMIT 1)))), (SELECT glass_status.sort_n FROM glass_status WHERE id = lists_to_cut.status_id)), (SELECT glass_status.sort_n FROM glass_status WHERE id = lists_to_cut.status_id))
                                    
                                    ELSE IF(products_glasses.go_to_cut != 1,IFNULL(IFNULL((SELECT glass_status.sort_n FROM glass_status WHERE id = (SELECT IF(gp1.status_id = 3 OR gp1.status_id IS NULL,gp2.status_id,gp1.status_id) FROM glasses_paths AS gp2 LEFT JOIN glasses_paths AS gp1 ON gp1.glass_id = gp2.glass_id AND gp1.sort_n = gp2.sort_n-1 AND gp1.actived=1 WHERE gp2.status_id IN (1,2) AND gp2.glass_id = products_glasses.id AND gp2.actived = 1 ORDER BY gp1.sort_n ASC LIMIT 1)), IFNULL((SELECT glass_status.sort_n FROM glass_status WHERE id = (SELECT status_id FROM glasses_paths WHERE status_id IN (4,5) AND actived = 1 AND glass_id = products_glasses.id ORDER BY sort_n ASC LIMIT 1)), (SELECT glass_status.sort_n FROM glass_status WHERE id = (SELECT status_id FROM glasses_paths WHERE status_id IN (3) AND actived = 1 AND glass_id = products_glasses.id ORDER BY sort_n DESC LIMIT 1)))), lists_to_cut.status_id),'')
                                END AS sort_n
                                
                                

                        FROM 		products_glasses
                        JOIN 		orders ON orders.id = products_glasses.order_id AND orders.actived = 1
                        JOIN    orders_product ON orders_product.id = products_glasses.order_product_id AND orders_product.actived = 1
                        JOIN    glass_options ON glass_options.id = products_glasses.glass_option_id
                        LEFT JOIN		lists_to_cut ON lists_to_cut.glass_id = products_glasses.id AND lists_to_cut.actived = 1
                        WHERE 	products_glasses.actived = 1 AND products_glasses.display = 1

                        GROUP BY products_glasses.id) AS ttt
                        ORDER BY ttt.sort_n DESC");

        $result = $db->getKendoList($columnCount, $cols);
        $data = $result;
    break;
    case 'give_glasses_prod':
        $prod_ids = $_REQUEST['prod_ids'];

        $ids = implode(',',$prod_ids);
        $order_id = $_REQUEST['order_id'];


        $to_give_count = count($prod_ids);
        $db->setQuery("SELECT COUNT(*) AS cc FROM orders_product WHERE id IN ($ids) AND status_id = 3");
        $cc_finished = $db->getResultArray()['result'][0]['cc'];
        if($cc_finished == $to_give_count){
            $db->setQuery("SELECT COUNT(*) AS cc FROM orders_product WHERE id IN ($ids) AND status_id = 6");
            $cc = $db->getResultArray()['result'][0]['cc'];
    
            if($cc == 0){
                $db->setQuery("UPDATE orders_product SET status_id = 6 WHERE id IN ($ids)");
                $db->execQuery();
    
                $db->setQuery("INSERT INTO given_glasses_prod SET datetime=NOW(),
                                                                order_id = '$order_id',
                                                                prod_ids = '$ids',
                                                                user_id = '$user_id'");
    
                $db->execQuery();
    
                $given_id = $db->getLastId();
                $data['page'] = '
                <fieldset class="fieldset">
                        <legend>ექსელი</legend>
                            <div class="row">
                                <div class="col-sm-12">
                                    <a href="print_excel.php?act=partly_prod&given_id='.$given_id.'" target="_blank" style="display: flex;
                                    gap: 10px;
                                    justify-content: center;
                                    align-items: center;
                                    cursor: pointer;">დაბეჭვდვა</a>
                                </div>
                            </div>
                        </legend>
                    </fieldset>
                ';
            }
            else{
                $data['error'] = 'ერთი ან რამოდენიმე მინა უკვე გაცემულია';
            }
        }
        else{
            $data['error'] = 'თქვენ მიერ გასაცემად არჩეული მინებიდან 1 ან რამოდენიმე ჯერ არ არის დასრულებული. ამ მინებს ვერ გასცემთ';
        }
        
    break;
    case 'give_glasses':
        $glass_ids = $_REQUEST['ids'];

        $ids = implode(',',$glass_ids);
        $order_id = $_REQUEST['order_id'];


        $to_give_count = count($glass_ids);
        $db->setQuery("SELECT COUNT(*) AS cc FROM products_glasses WHERE id IN ($ids) AND status_id = 3");
        $cc_finished = $db->getResultArray()['result'][0]['cc'];
        if($cc_finished == $to_give_count){
            $db->setQuery("SELECT COUNT(*) AS cc FROM products_glasses WHERE id IN ($ids) AND status_id = 6");
            $cc = $db->getResultArray()['result'][0]['cc'];
    
            if($cc == 0){
                $db->setQuery("UPDATE products_glasses SET status_id = 6 WHERE id IN ($ids)");
                $db->execQuery();
    
                $db->setQuery("INSERT INTO given_glasses SET datetime=NOW(),
                                                                order_id = '$order_id',
                                                                glass_ids = '$ids',
                                                                user_id = '$user_id'");
    
                $db->execQuery();
    
                $given_id = $db->getLastId();
                $data['page'] = '
                <fieldset class="fieldset">
                        <legend>ექსელი</legend>
                            <div class="row">
                                <div class="col-sm-12">
                                    <a href="print_excel.php?act=partly&given_id='.$given_id.'" target="_blank" style="display: flex;
                                    gap: 10px;
                                    justify-content: center;
                                    align-items: center;
                                    cursor: pointer;">დაბეჭვდვა</a>
                                </div>
                            </div>
                        </legend>
                    </fieldset>
                ';
            }
            else{
                $data['error'] = 'ერთი ან რამოდენიმე მინა უკვე გაცემულია';
            }
        }
        else{
            $data['error'] = 'თქვენ მიერ გასაცემად არჩეული მინებიდან 1 ან რამოდენიმე ჯერ არ არის დასრულებული. ამ მინებს ვერ გასცემთ';
        }
        
    break;
    case 'get_list':
        $id          =      $_REQUEST['hidden'];
		
        $columnCount = 		$_REQUEST['count'];
		$cols[]      =      $_REQUEST['cols'];

            $db->setQuery(" SELECT warehouse.id,
                                        glass_options.name,
                                        glass_manuf.name,
                                        glass_type.name AS type,
                                        glass_colors.name AS color,
                                        warehouse.qty,
                                        CONCAT('<b>',warehouse.glass_width,'</b> X <b>', warehouse.glass_height,'</b> მმ'),
                                        IFNULL(glass_bring.name, glass_bringer.name),
                                        IF(warehouse.gtype = 1,'ლისტი', 'ათხოდი'),
                                        CONCAT(warehouse.marja, '%'),
                                        warehouse.sqr_price,
                                        warehouse.pyramid
                            FROM warehouse
                            LEFT JOIN glass_options ON glass_options.id = warehouse.glass_option_id
                            LEFT JOIN glass_type ON glass_type.id = warehouse.glass_type_id
                            LEFT JOIN glass_colors ON glass_colors.id = warehouse.glass_color_id
                            LEFT JOIN glass_manuf ON glass_manuf.id = warehouse.glass_manuf_id
                            LEFT JOIN glass_bring ON glass_bring.id = warehouse.owner
                            LEFT JOIN glass_bringer ON glass_bringer.id = warehouse.bringer
                            WHERE warehouse.actived = 1
                            GROUP BY warehouse.id");

        $result = $db->getKendoList($columnCount, $cols);
        $data = $result;
    break;
    case 'get_list_branches':
        $id          =      $_REQUEST['hidden'];
		$obj_id      =      $_REQUEST['obj_id'];
        $columnCount = 		$_REQUEST['count'];
		$cols[]      =      $_REQUEST['cols'];

            $db->setQuery(" SELECT  object_branches.id,
                                    object_branches.name_geo,
                                    object_branches.name_rus,
                                    object_branches.name_eng,
                                    CONCAT(object_branches.start_work,' - ',object_branches.end_work) AS 'work_h',
                                    object_branches.phone,
                                    object_branches.address,
                                    CASE
                                        WHEN object_branches.size = 1 THEN 'პატარა'
                                        WHEN object_branches.size = 2 THEN 'საშუალო'
                                        WHEN object_branches.size = 3 THEN 'დიდი'
                                    END AS 'size',
                                    IF(object_branches.free_delivery = 1,'კი','არა')
                        FROM        object_branches
                        LEFT JOIN   objects ON object_branches.object_id = objects.id
                        WHERE       object_branches.object_id = '$obj_id'
                        ORDER BY    objects.id DESC");

        $result = $db->getKendoList($columnCount, $cols);
        $data = $result;
    break;
}


echo json_encode($data);
function getStatusPage($res = ''){
    GLOBAL $user_gr;
    if($res['status_id'] == 3 || $res['status_id'] == 6){
        $disable = 'disabled';
    }
    if($res['status_id'] == 6){
        $dis_inp = 'disabled';
    }

    if($res['last_pyramid'] == ''){
        $dis_inp = 'disabled';
    }

    if(!in_array($user_gr,array(1,11))){
        $dis_inp = 'disabled';
    }
    $data .= '
    
    <fieldset class="fieldset">
        <legend>ინფორმაცია</legend>
        <div class="row">
            <div class="col-sm-12" style="margin-top:10px;">
                <label>პირამიდა:</label>
                <input type="number" min="1" id="pyramid_num" value="'.$res['last_pyramid'].'" '.$dis_inp.'>
            </div>
            <div class="col-sm-12" style="text-align: center;">
                <label>სტატუსის შეცვლა</label><br>
                <button id="proc_again" style="margin-bottom:10px;" class="ui-button ui-corner-all ui-widget" '.$dis_inp.'>პროცესის თავიდან გავლა</button>
                <button id="proc_next" style="margin-bottom:10px;" class="ui-button ui-corner-all ui-widget" '.$dis_inp.'>შემდეგ პროცესზე გადასვლა</button>
                <button id="proc_start" class="ui-button ui-corner-all ui-widget" '.$dis_inp.'>ხელახლა მოჭრა</button>
            </div>
            
            
        </div>
    </fieldset>
    <input type="hidden" id="glass_id" value="'.$res['id'].'">
    ';

    return $data;
}
function getStatus($id){
    GLOBAL $db;

    $db->setQuery("SELECT status_id,id, last_pyramid
                    FROM products_glasses
                    WHERE id = '$id'");

    return $db->getResultArray()['result'][0];
}
function getGlassStatusOptions($id){
    GLOBAL $db;
    $data = '';
    if($id == 3){
        $where = "(6)";
    }
    else if($id == 6){
        $where = "(3)";
    }
    else{
        $where = "(3,6)";
    }
    $db->setQuery("SELECT   id,
                            name AS 'name'
                    FROM    glass_status
                    WHERE actived = 1 AND id NOT IN $where");
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
    $data .= '
    
    
    <fieldset class="fieldset">
        <legend>ინფორმაცია</legend>
        <div class="row">
            <div class="col-sm-4">
                <label>აირჩიეთ შუშა</label>
                <select id="selected_glass_cat_id">
                    '.getGlassOptions($res['glass_option_id']).'
                </select>
            </div>
            <div class="col-sm-4">
                <label>აირჩიეთ მწარმოებელი</label>
                <select id="selected_glass_manuf_id">
                    '.getGlassManuf($res['glass_manuf_id']).'
                </select>
            </div>
            <div class="col-sm-4">
                <label>აირჩიეთ ტიპი</label>
                <select id="selected_glass_type_id">
                    '.getGlassTypeOptions($res['glass_type_id']).'
                </select>
            </div>
            <div class="col-sm-4">
                <label>აირჩიეთ ფერი</label>
                <select id="selected_glass_color_id">
                    '.getGlassColorOptions($res['glass_color_id']).'
                </select>
            </div>

            <div class="col-sm-4">
                <label>მომწოდებელი</label>
                <select id="bringer">
                    '.getGlassbringer($res['bringer']).'
                </select>
            </div>

            <div class="col-sm-4">
                <label>კლიენტის მინა</label>
                <select id="owner">
                    '.getGlassBringOptions($res['owner']).'
                </select>
            </div>

            

            <div class="col-sm-4">
                <label>კატეგროია</label>
                <select id="gtype">
                    '.getGlassGtype($res['gtype']).'
                </select>
            </div>

            <div class="col-sm-4">
                <label>რაოდენობა</label>
                <input value="'.$res['qty'].'" data-nec="0" style="height: 18px; width: 95%;" type="text" id="glass_qty" class="idle" autocomplete="off">
            </div>
            <div class="col-sm-4">
                <label>თითოს ზომა (მმ) (სიმაღლეXსიგანე) </label>
                <div class="row">
                    <div class="col-sm-6"><input style="width:99%;" type="text" id="glass_width" value="'.$res['glass_width'].'"></div>
                    <div class="col-sm-6"><input style="width:99%;" type="text" id="glass_height" value="'.$res['glass_height'].'"></div>
                </div>
            </div>
            <div class="col-sm-4">
                <label>ფასი კვადრატული</label>
                <input value="'.$res['sqr_price'].'" data-nec="0" style="height: 18px; width: 95%;" type="text" id="sqr_price" class="idle" autocomplete="off">
            </div>
            <div class="col-sm-4">
                <label>ფასნამატი %</label>
                <input value="'.$res['marja'].'" data-nec="0" style="height: 18px; width: 95%;" type="text" id="marja" class="idle" autocomplete="off">
            </div>
            <div class="col-sm-4">
                <label>პირამიდის ნომერი</label>
                <input value="'.$res['pyramid'].'" data-nec="0" style="height: 18px; width: 95%;" type="text" id="pyramid" class="idle" autocomplete="off">
            </div>

            
        </div>
    </fieldset>
    <input type="hidden" id="warehouse_id" value="'.$res[id].'">
    ';

    return $data;
}

function getGlassGtype(){
    GLOBAL $db;
    $data = '';
    $data .= '<option value="0">აირჩიეთ</option>';
    $data .= '<option value="1">ლისტი</option>';
    $data .= '<option value="2">ატხოდი</option>';
    return $data;
}
function getGlassbringer($id){
    GLOBAL $db;
    $data = '';
    $db->setQuery("SELECT   id,
                            name AS 'name'
                    FROM    glass_bringer
                    WHERE actived = 1");
    $cats = $db->getResultArray();
    $data .= '<option value="0">აირჩიეთ</option>';
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
function getGlassBringOptions($id){
    GLOBAL $db;
    $data = '';
    $db->setQuery("SELECT   id,
                            name AS 'name'
                    FROM    glass_bring
                    WHERE actived = 1");
    $cats = $db->getResultArray();
    $data .= '<option value="0">აირჩიეთ</option>';
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
    $data .= '<option value="0">აირჩიეთ</option>';
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
    $data .= '<option value="0">აირჩიეთ</option>';
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
    $data .= '<option value="0">აირჩიეთ</option>';
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
function get_cat_1($id){
    GLOBAL $db;
    $data = '';
    $db->setQuery("SELECT   id,
                            name_geo AS 'name'
                    FROM    object_category
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
function getObject($id){
    GLOBAL $db;

    $db->setQuery(" SELECT      warehouse.id,
                                warehouse.glass_option_id,
                                warehouse.glass_type_id,
                                warehouse.glass_color_id,
                                warehouse.qty,
                                warehouse.sqr_price,
                                warehouse.pyramid,
                                warehouse.glass_width,
                                warehouse.glass_height,
                                warehouse.marja,
                                warehouse.owner,
                                warehouse.bringer,
                                warehouse.gtype,
                                warehouse.glass_manuf_id

                    FROM        warehouse
                    WHERE       warehouse.id = '$id'");
    $result = $db->getResultArray();

    return $result['result'][0];
}
function getGlassManuf($id){
    GLOBAL $db;
    $data = '';
    $db->setQuery("SELECT   id,
                            name AS 'name'
                    FROM    glass_manuf
                    WHERE actived = 1");
    $cats = $db->getResultArray();
    $data .= '<option value="0">აირჩიეთ</option>';
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
function finish_order($order_id){
    GLOBAL $db;
    $db->setQuery(" SELECT  COUNT(*) AS cc
                    FROM    products_glasses
                    WHERE   order_id = '$order_id' AND products_glasses.actived = 1 AND status_id NOT IN (3,4,6)");

    $countNotCompleted = $db->getResultArray()['result'][0]['cc'];
    if($countNotCompleted == 0){
        $db->setQuery(" UPDATE  orders 
                        SET     status_id = 4
                        WHERE   id = '$order_id'");
        $db->execQuery();
    }
    else{
        $db->setQuery(" UPDATE  orders 
                        SET     status_id = 2
                        WHERE   id = '$order_id' AND status_id != 1");
        $db->execQuery();
    }
}
?>