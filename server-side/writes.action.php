<?php

session_start();

error_reporting(E_ERROR);

include('../db.php');

GLOBAL $db;

$db = new dbClass();

$act = $_REQUEST['act'];

$user_id = $_SESSION['USERID'];

function getProcStart($id, $glass_id){
    $data = '   <fieldset class="fieldset">
                    <legend>შეფასება</legend>
                        <div class="row">
                            <div class="col-sm-12" style="text-align: center;">
                                <p>შეაფასეთ მინის მდგომარეობა</p>
                                <label style="display: inline-flex;"><input type="radio" name="glass_rate" class="glass_rate" value="0"> ცუდი</label>
                                <label style="display: inline-flex;"><input type="radio" name="glass_rate" class="glass_rate" value="1"> საშუალო</label>
                                <label style="display: inline-flex;"><input type="radio" name="glass_rate" class="glass_rate" value="2"> კარგი</label>
                            </div>
                        </div>
                    </legend>
                </fieldset>

                <input type="hidden" id="glass_id" value="'.$glass_id.'">

                ';

    return $data;
}
function getProcFinish($path_id, $glass_id){
    GLOBAL $db;
    if($path_id == 2){
        $cut_id = $_REQUEST['cut_id'];

        $db->setQuery(" SELECT  lists_to_cut.id,lists_to_cut.glass_id,
                                CONCAT(products_glasses.glass_width,'მმ', products_glasses.glass_height,'მმ') AS si
                        FROM    lists_to_cut
                        JOIN    products_glasses ON products_glasses.id = lists_to_cut.glass_id AND products_glasses.actived = 1
                        WHERE   lists_to_cut.cut_id IN ($cut_id) AND lists_to_cut.actived = 1");
        $glass_ids = $db->getResultArray()['result'];


        $db->setQuery(" SELECT  id,
                                CONCAT(width,'მმ', height,'მმ') AS si
                        FROM    cut_atxod
                        WHERE   actived = 1 AND cut_id = '$cut_id'");
        $atxods = $db->getResultArray()['result'];

        $data = '   <fieldset class="fieldset">
                        <legend>პირამიდა</legend>
                            <div class="row">';
                                foreach($glass_ids AS $glass){
                                    $data .= '  <div class="col-sm-4" style="text-align: center;">
                                                    <label>მინა #'.$glass['glass_id'].' '.$glass['si'].'</label>
                                                    <input type="tel" min="1" class="glass_pyramids" data-id="'.$glass['id'].'">
                                                </div>';
                                }
                            $data .= '</div>
                        </legend>
                    </fieldset>

                    <fieldset class="fieldset">
                        <legend>ატხოდი</legend>
                            <div class="row">';
                                foreach($atxods AS $at){
                                    $data .= '  <div class="col-sm-4" style="text-align: center;">
                                                    <label>ატხოდი: '.$at['si'].'</label>
                                                    <input type="tel" min="1" class="atxod_pyramids" data-id="'.$at['id'].'">
                                                </div>';
                                }
                            $data .= '</div>
                        </legend>
                    </fieldset>

                    <input type="hidden" id="path_id" value="'.$path_id.'">

                    ';
    }
    else{
        $data = '   <fieldset class="fieldset">
                    <legend>პირამიდა</legend>
                        <div class="row">
                            <div class="col-sm-12" style="text-align: center;">
                                <label>მიუთითეთ პირამიდის ნომერი</label>
                                <input type="tel" min="1" id="pyramid_num">
                            </div>
                        </div>
                    </legend>
                </fieldset>

                <input type="hidden" id="path_id" value="'.$path_id.'">

                ';
    }

    return $data;
}

function getProcError($path_id){
    GLOBAL $db;
    
    $cut_id = $_REQUEST['cut_id'];

    $db->setQuery(" SELECT  lists_to_cut.id,lists_to_cut.glass_id,
                            CONCAT(products_glasses.glass_width,'მმ', products_glasses.glass_height,'მმ') AS si
                    FROM    lists_to_cut
                    JOIN    products_glasses ON products_glasses.id = lists_to_cut.glass_id AND products_glasses.actived = 1
                    WHERE   lists_to_cut.cut_id IN ($cut_id) AND lists_to_cut.actived = 1");
    $glass_ids = $db->getResultArray()['result'];


    $db->setQuery(" SELECT  id,
                            CONCAT(width,'მმ', height,'მმ') AS si
                    FROM    cut_atxod
                    WHERE   actived = 1 AND cut_id = '$cut_id'");
    $atxods = $db->getResultArray()['result'];

    $data = '   <fieldset class="fieldset">
                    <legend>აირჩიეთ ხარვეზიანი მინები</legend>
                        <div class="row">';
                            foreach($glass_ids AS $glass){
                                $data .= '  <div class="col-sm-4" style="text-align: center;">
                                                <label>მინა #'.$glass['glass_id'].' '.$glass['si'].'</label>
                                                <input type="checkbox" class="glass_pyramids" data-id="'.$glass['id'].'">
                                            </div>';
                            }
                        $data .= '</div>
                    </legend>
                </fieldset>

                <input type="hidden" id="path_id" value="'.$path_id.'">

                ';
    

    return $data;
}

switch ($act){
    case 'copy':
        $type = $_REQUEST['type'];
        $ids = $_REQUEST['id'];

        if($type == 'glass'){
            $glass_id   = $_REQUEST['id'];
            $qty        = $_REQUEST['qty'];


            foreach($glass_id AS $glassID){
                $db->setQuery("SELECT * FROM products_glasses WHERE id = '$glassID'");
                $glass = $db->getResultArray()['result'][0];
    
                $db->setQuery("SELECT * FROM glasses_paths WHERE glass_id = '$glassID' AND actived = 1");
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
            }

            
        }
        else if($type == 'product'){
            $product_id   = $_REQUEST['id'];
            $qty        = $_REQUEST['qty'];

            foreach($product_id AS $productID){
                $db->setQuery("SELECT * FROM orders_product WHERE id = '$productID'");
                $product = $db->getResultArray()['result'][0];

                $db->setQuery("SELECT * FROM products_glasses WHERE order_product_id = '$productID' AND actived = 1");
                $glasses = $db->getResultArray()['result'];

                for($i = 0; $i<$qty; $i++){
                    $db->setQuery("INSERT INTO orders_product SET datetime = NOW(),
                                                                    user_id = '$product[user_id]',
                                                                    order_id = '$product[order_id]',
                                                                    product_id = '$product[product_id]',
                                                                    picture = '$product[picture]',
                                                                    butili = '$product[butili]',
                                                                    lameqs_int = '$product[lameqs_int]'");
                    $db->execQuery();

                    $newProductID = $db->getLastId();

                    foreach($glasses AS $glass){

                        $db->setQuery("SELECT * FROM glasses_paths WHERE glass_id = '$glass[id]' AND actived = 1");
                        $paths = $db->getResultArray()['result'];
    
                        $db->setQuery("INSERT INTO products_glasses SET datetime = NOW(),
                                                                    user_id = '$glass[user_id]',
                                                                    order_product_id = '$newProductID',
                                                                    order_id = '$glass[order_id]',
                                                                    glass_option_id = '$glass[glass_option_id]',
                                                                    glass_type_id = '$glass[glass_type_id]',
                                                                    glass_color_id = '$glass[glass_color_id]',
                                                                    glass_manuf_id = '$glass[glass_manuf_id]',
                                                                    glass_width = '$glass[glass_width]',
                                                                    glass_height = '$glass[glass_height]',
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
                }
            }
        }

        else if($type == 'warehouse'){
            $ids = $_REQUEST['id'];
            $pyramid = $_REQUEST['pyramid'];

            foreach($ids AS $id){
                $db->setQuery(" SELECT *
                                FROM warehouse 
                                WHERE id = '$id' AND actived = 1");

                $ware = $db->getResultArray()['result'][0];

                $db->setQuery(" INSERT INTO  warehouse 
                            SET     `glass_option_id` = '$ware[glass_option_id]',
                                    `glass_type_id` = '$ware[glass_type_id]',
                                    `glass_color_id` = '$ware[glass_color_id]',
                                    `qty` = '$ware[qty]',
                                    `glass_width` = '$ware[glass_width]',
                                    `glass_height` = '$ware[glass_height]',
                                    `sqr_price` = '$ware[sqr_price]',
                                    `glass_manuf_id` = '$ware[glass_manuf_id]',
                                    `marja` = '$ware[marja]',
                                    `owner` = '$ware[owner]',
                                    `gtype` = '$ware[gtype]',
                                    `pyramid` = '$pyramid'");
                $db->execQuery();

            }
            

        }
        break;

    case 'copy_cut':
        $cut_id =$_REQUEST['ids'][0];
        $limit = $_REQUEST['limit'];
        $matrix = array();
        $glass_arr = array();
        $db->setQuery(" SELECT  products_glasses.id,
                                lists_to_cut.list_id,
                                products_glasses.glass_width,
                                products_glasses.glass_height
                        FROM    lists_to_cut
                        JOIN    products_glasses ON products_glasses.id = lists_to_cut.glass_id
                        WHERE   lists_to_cut.actived = 1 AND lists_to_cut.cut_id = '$cut_id'");

        $glasses  = $db->getResultArray();
        $list_id = $glasses['result'][0]['list_id'];

        $db->setQuery("SELECT *
                        FROM warehouse
                        WHERE actived = 1 AND id = '$list_id'");
        $warehouse = $db->getResultArray()['result'][0];

        $db->setQuery(" SELECT SUM(qty) AS total
                        FROM warehouse WHERE glass_option_id = '$warehouse[glass_option_id]' AND glass_type_id = '$warehouse[glass_type_id]' AND 
                        glass_color_id = '$warehouse[glass_color_id]' AND glass_width = '$warehouse[glass_width]' AND glass_height = '$warehouse[glass_height]' AND
                        glass_manuf_id = '$warehouse[glass_manuf_id]' AND owner = 1");

        $total = $db->getResultArray()['result'][0]['total'];



        if($total < $limit){
            $data['error'] = 'ლისტის კოპირება ვერ მოხერხდა. საწყობში მსგავსი ლისტი გაქვთ '.$total.' ცალი';
        }
        else{
            $db->setQuery("SELECT *
                            FROM cut_atxod
                            WHERE actived = 1 AND cut_id = '$cut_id'");
            $atxods = $db->getResultArray();
            foreach($glasses['result'] AS $glass){
                array_push($glass_arr, $glass['id']);
            }
    
            $i = 0;
            foreach($glasses['result'] AS $glass){
                $matrix[$i] = array();
                $db->setQuery(" SELECT products_glasses.id
    
                                FROM products_glasses
                                WHERE products_glasses.actived = 1  
                                AND products_glasses.glass_width = '$glass[glass_width]' 
                                AND products_glasses.glass_height = '$glass[glass_height]' 
                                AND products_glasses.status_id = 1 AND products_glasses.id NOT IN (".implode(',', $glass_arr).") AND (SELECT COUNT(*) FROM lists_to_cut WHERE glass_id = products_glasses.id AND actived = 1) = 0 LIMIT $limit");
                $exact_gl = $db->getResultArray();
    
                foreach($exact_gl['result'] AS $gl){
                    if($gl['id'] != ''){
                        array_push($matrix[$i], $gl['id']);
                        array_push($glass_arr, $gl['id']);
                    }
                    
                    
                }
                
                $i++;
            }
    
    
            $matrix = rotate90($matrix);
            $j = 0;
            
            foreach($matrix AS $key=>$layer_2){
                if(count(array_filter($layer_2)) == $glasses['count']){
                    $j++;
                    $db->setQuery("INSERT INTO cut_glass SET status_id = 1, user_id = '$user_id', list_id = '$list_id'");
                    $db->execQuery();


                    $cut_new_id = $db->getLastId();
                    foreach($atxods['result'] AS $atx){
                        $db->setQuery("INSERT INTO cut_atxod SET cut_id = '$cut_new_id', width='$atx[width]', height='$atx[height]'");
                        $db->execQuery();
                    }
                    

                    
                    foreach($layer_2 AS $gl_id_new){
                        $db->setQuery("INSERT INTO lists_to_cut SET status_id = 1, cut_id = '$cut_new_id', list_id = '$list_id', glass_id = '$gl_id_new'");
                        $db->execQuery();
                    }
    
                    
                }
            }

            $data['error'] = 'სულ დაკოპირდა '.$j.' ლისტი!!!';
        }
        
        break;
    case 'get_atxod_page':
        $id = $_REQUEST['id'];

        $data = array('page' => atxodPage(getAtxod($id)));
        break;

    case 'save_atxod':
        $id             = $_REQUEST['atxod_id'];
        $glass_width    = $_REQUEST['glass_width'];
        $glass_height   = $_REQUEST['glass_height'];

        $cut_id         = $_REQUEST['cut_id'];

        $db->setQuery("INSERT INTO cut_atxod SET cut_id = '$cut_id',
                                                    width = '$glass_width',
                                                    height = '$glass_height'");
        $db->execQuery();

        $data['status'] = 'OK';

        break;
    case 'get_list_atxods':
        $cut_id = $_REQUEST['cut_id'];
        $columnCount = 		$_REQUEST['count'];

		$cols[]      =      $_REQUEST['cols'];
        $db->setQuery(" SELECT  id,
                                CONCAT(cut_atxod.width,'მმ', cut_atxod.height,'მმ')
                        FROM    cut_atxod
                        WHERE   actived = 1 AND cut_id = '$cut_id'");
        $result = $db->getKendoList($columnCount, $cols);

        $data = $result;
        break;
    case 'delete_cut':
        $ids = $_REQUEST['ids'];

        foreach($ids AS $id){
            $db->setQuery("SELECT COUNT(*) AS cc,
                            lists_to_cut.cut_id
                            FROM products_glasses
                            LEFT JOIN lists_to_cut ON lists_to_cut.glass_id = products_glasses.id AND lists_to_cut.actived = 1
                            WHERE products_glasses.id = '$id' AND products_glasses.actived = 1 AND products_glasses.status_id = 1");
            $glass_check = $db->getResultArray()['result'][0];

            $cut_id = $glass_check['cut_id'];
            $glass_check = $glass_check['cc'];

            if($glass_check > 0){
                $db->setQuery("UPDATE cut_glass SET actived = 0 WHERE id = '$cut_id'");
                $db->execQuery();
            }
        }
        break;
    case 'save_list_cut':
        $raw_ids = $_REQUEST['glass_ids'];
        $glass_ids = explode(',', $_REQUEST['glass_ids']);
        $list_id = $_REQUEST['list_id'];
        $cut_id = $_REQUEST['cut_id'];

        $db->setQuery("SELECT COUNT(*) AS cc FROM products_glasses WHERE id IN ($raw_ids) AND status_id = 1");
        $glass_check = $db->getResultArray()['result'][0]['cc'];

        if(count($glass_ids) == $glass_check){

            $db->setQuery(" SELECT  GROUP_CONCAT(DISTINCT cut_id) AS cut_ids
                            FROM    lists_to_cut
                            WHERE   glass_id IN ($raw_ids)");
            $cut_ids = $db->getResultArray()['result'][0]['cut_ids'];

            if($cut_ids == ''){
                $cut_ids = 0;
            }

            $db->setQuery("UPDATE cut_glass SET actived = 0 WHERE id IN ($cut_ids)");
            $db->execQuery();

            $db->setQuery("INSERT INTO cut_glass SET id = '$cut_id', status_id = 1, user_id = '$user_id', list_id = '$list_id'");
            $db->execQuery();
            foreach($glass_ids AS $glass){
                
                $db->setQuery("INSERT INTO lists_to_cut SET cut_id = '$cut_id', list_id = '$list_id', glass_id = '$glass', status_id = 1");
                $db->execQuery();
            }

            $data['status'] = 'OK';
        }
        else{
            $data['error'] = 'ერთერთი ან რომელიმე მინა უკვე მზადების პროცესშია, თქვენ ვერ დაიწყებთ ჭრის პროცესს';
        }

        


        break;
    case 'get_cut_page':
        $glass_ids = $_REQUEST['ids'];

        $option_id = $_REQUEST['option_id'];
        $type_id = $_REQUEST['type_id'];
        $color_id = $_REQUEST['color_id'];
        $manuf_id = $_REQUEST['manuf_id'];

        $db->setQuery("INSERT INTO cut_glass SET user_id = 1");
        $db->execQuery();

        $id = $db->getLastId();

        $db->setQuery("DELETE FROM cut_glass WHERE id='$id'");
        $db->execQuery();

        $data = array('page' => cutPage($glass_ids, $option_id, $type_id, $color_id, $manuf_id, $id));

        

        
        break;
    case 'finish_proc':
        $glass_id = $_REQUEST['glass_id'];
        $path_id = $_REQUEST['path_id'];
        $data = array('page' => getProcFinish($path_id, $glass_id));

        break;

    case 'calc_price':
        $order_id = $_REQUEST['order_id'];

        $db->setQuery("SELECT SUM(glasses_paths.price)  AS total
                        FROM products_glasses
                        JOIN glasses_paths ON glasses_paths.glass_id = products_glasses.id AND glasses_paths.actived = 1
                        WHERE products_glasses.order_id = '$order_id' AND products_glasses.actived = 1");

        $data['total_price'] = $db->getResultArray()['result'][0]['total'];
        break;
    case 'start_proc':
        
        $glass_id = $_REQUEST['glass_id'];
        $proc_id = $_REQUEST['proc_id'];
        

        $data = array('page' => getProcStart($proc_id, $glass_id));
        break;
    case 'finish_glass_proc':
        $path_id = $_REQUEST['path_id'];
        $glass_id = $_REQUEST['glass_id'];
        $pyramid = $_REQUEST['pyramid'];
        if($path_id == 2){
            $gpyr = $_REQUEST['gpyr'];
            $apyr = $_REQUEST['apyr'];
            $cut_id = $_REQUEST['cut_id'];
            foreach($gpyr AS $gl){
                $pyr_data = explode('-', $gl);

                $db->setQuery("UPDATE lists_to_cut SET pyramid = '$pyr_data[0]', status_id = 3 WHERE id = '$pyr_data[1]'");
                $db->execQuery();

                $db->setQuery("UPDATE cut_glass SET status_id = 3 WHERE id = '$cut_id'");
                $db->execQuery();
            }

            foreach($apyr AS $at){
                $pyr_data = explode('-', $at);

                $db->setQuery("UPDATE cut_atxod SET pyramid = '$pyr_data[0]' WHERE id = '$pyr_data[1]'");
                $db->execQuery();
                //TODO აქედან უნდა ჩაემატოს საწყობსაც ატხოდი
            }
        }
        else{
            $db->setQuery("UPDATE glasses_paths SET pyramid = '$pyramid', user_id = '$user_id', status_id = 3 WHERE id = '$path_id'");
            $db->execQuery();
    
            $db->setQuery(" SELECT  path_next.id AS n_path
                            FROM    glasses_paths
                            JOIN    glasses_paths AS path_next ON path_next.sort_n = glasses_paths.sort_n + 1 AND path_next.glass_id = glasses_paths.glass_id AND path_next.actived = 1
                            WHERE   glasses_paths.id = '$path_id'
                            
                            LIMIT 1");
            $next_proc = $db->getResultArray()['result'][0]['n_path'];
    
            if($next_proc == ''){
                $db->setQuery("UPDATE products_glasses SET status_id = 3 WHERE id = '$glass_id'");
                $db->execQuery();
    
                $db->setQuery(" SELECT  order_id
                                FROM    products_glasses
                                WHERE   products_glasses.id = '$glass_id'");
                $order_id = $db->getResultArray()['result'][0]['order_id'];
    
                $db->setQuery(" SELECT  COUNT(*) AS cc
                                FROM    products_glasses
                                WHERE   order_id = '$order_id' AND products_glasses.actived = 1 AND status_id NOT IN (3)");
                
                $countNotCompleted = $db->getResultArray()['result'][0]['cc'];
                if($countNotCompleted == 0){
                    $db->setQuery(" UPDATE  orders 
                                    SET     status_id = 4
                                    WHERE   id = '$order_id'");
                    $db->execQuery();
                }
            }
        }
        
        /* $db->setQuery("UPDATE products_glasses SET status_id = 3 WHERE id = '$glass_id'");
            $db->execQuery(); */

        break;
    case 'start_glass_proc':
        $glass_rate = $_REQUEST['glass_rate'];
        $path_id = $_REQUEST['path_id'];
        $glass_id = $_REQUEST['glass_id'];


        if($path_id == 2){
            $cut_id = $_REQUEST['cut_id'];

            if($glass_rate == 1 || $glass_rate == 0){
                $data = array('page' => getProcError($path_id));
            }
            else{
                $db->setQuery("UPDATE cut_glass SET status_id = 2 WHERE id = '$cut_id' AND actived = 1");
                $db->execQuery();

                $db->setQuery("UPDATE lists_to_cut SET status_id = 2 WHERE cut_id = '$cut_id' AND actived = 1");
                $db->execQuery();
    
                $db->setQuery(" SELECT  GROUP_CONCAT(DISTINCT glass_id) AS glass_id
                                FROM    lists_to_cut
                                WHERE   cut_id IN ($cut_id) AND actived = 1");
                $glass_ids = $db->getResultArray()['result'][0]['glass_id'];
    
    
                $db->setQuery("UPDATE products_glasses SET last_path_id = '$path_id', status_id = 2 WHERE id IN ($glass_ids)");
                $db->execQuery();

                $db->setQuery(" UPDATE orders 
                                JOIN products_glasses ON products_glasses.id IN($glass_ids)
                                JOIN orders_product ON orders_product.id = products_glasses.order_product_id
                                SET orders.status_id = 2
                                
                                WHERE orders.id = orders_product.order_id");
                $db->execQuery();
            }
            
        }
        else{
            if($glass_rate == 1 || $glass_rate == 0){
                $db->setQuery("UPDATE glasses_paths SET glass_rate = '$glass_rate', user_id = '$user_id', status_id = 4 WHERE id = '$path_id'");
                $db->execQuery();
    
                $db->setQuery("UPDATE products_glasses SET status_id = 4 WHERE id = '$glass_id'");
                $db->execQuery();
            }
            else{
                
                $db->setQuery("UPDATE glasses_paths SET status_id = 2 WHERE id = '$path_id'");
                $db->execQuery();
    
                $db->setQuery("UPDATE products_glasses SET last_path_id = '$path_id', status_id = 2 WHERE id = '$glass_id'");
                $db->execQuery();
    
                $db->setQuery(" UPDATE orders 
                                JOIN products_glasses ON products_glasses.id = '$glass_id'
                                JOIN orders_product ON orders_product.id = products_glasses.order_product_id
                                SET orders.status_id = 2
                                
                                WHERE orders.id = orders_product.order_id");
                $db->execQuery();
            }
        }
        
        break;
    case 'get_sms_page_checked':
        $checked_ids = $_REQUEST['checked_ids'];
        $db->setQuery("SELECT DISTINCT phone FROM writings WHERE actived = 1 AND id IN ($checked_ids)");
        $all_getters = $db->getResultArray();
        $data = array('page' => getSMSPage($all_getters));
        break;
    case 'calc_proc_price':
        $proc_id = $_REQUEST['proc_id'];

        if($proc_id == 4){
            $data = array('page' => getPricePage($proc_id));
        }
        else{
            $glass_id = $_REQUEST['glass_id'];
            $width = $_REQUEST['width'];
            $height = $_REQUEST['height'];
            $price_total = 0;


            $db->setQuery("SELECT default_price
                            FROM groups
                            WHERE id = '$proc_id'");
            $price = $db->getResultArray()['result'][0]['default_price'];

            if($proc_id == 3){
                $price_total = (($width/100) + ($height/100))*2*$price;
                
            }
            if($proc_id == 5){
                $price_total = (($width/100) * ($height/100))*$price;
            }
            if($proc_id == 2){
                $price_total = (($width/100) * ($height/100))*$price;
            }

            $db->setQuery(" SELECT  MAX(sort_n) AS max_sort
                            FROM    glasses_paths
                            WHERE   actived = 1 AND glass_id = '$glass_id'");
            $sort_n = $db->getResultArray()['result'][0]['max_sort']+1;
            $db->setQuery("INSERT INTO glasses_paths SET
                                                user_id='$user_id',
                                                datetime=NOW(),
                                                glass_id='$glass_id',
                                                path_group_id='$proc_id',
                                                status_id=1,
                                                price = '$price_total',
                                                sort_n = '$sort_n'");

            $db->execQuery();
        }

        //$data = array('page' => getPricePage($proc_id));
        break;
    case 'start_sms_checked':
        $message = $_REQUEST['sms_text'];
        $checked_ids = $_REQUEST['checked_ids'];
        $db->setQuery("INSERT INTO sms_data (`phone`,`message`,`status`)
                        SELECT DISTINCT CONCAT('995',phone), '$message', 'queue'FROM writings WHERE actived = 1 AND id IN ($checked_ids)");
        $db->execQuery();

        break;
    case 'get_lameks_data':
        $glass_id = $_REQUEST['glass_id'];
        $db->setQuery(" SELECT MAX(glass_height * glass_width) AS m_kv
                        FROM `products_glasses`
                        
                        WHERE actived = 1 AND order_product_id = (SELECT order_product_id FROM products_glasses WHERE id = '$glass_id')");
        $max_kv = $db->getResultArray()['result'][0]['m_kv']/10000;


        $db->setQuery(" SELECT COUNT(*) AS cc
                        FROM `products_glasses`
                        
                        WHERE actived = 1 AND order_product_id = (SELECT order_product_id FROM products_glasses WHERE id = '$glass_id')");
        $cc = $db->getResultArray()['result'][0]['cc'];
        $data = array("max_kv" => $max_kv, "glass_count" => $cc);
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
            $_SESSION['USERID'] = $user_data['result'][0]['id'];
            $data['status'] = 'OK';
        }
        else{
            $data['status'] = '0';
        }
        
        break;

    case 'destroy_session':

        session_destroy();

        unset($_SESSION['USERID']);

    break;
    case 'get_path_page':
        $id = $_REQUEST['id'];
        if($id == '' OR !isset($_REQUEST['id'])){
            $db->setQuery("INSERT INTO glasses_paths SET user_id = 1");
            $db->execQuery();

            $id = $db->getLastId();

            $db->setQuery("DELETE FROM glasses_paths WHERE id='$id'");
            $db->execQuery();
        }
        
        $data = array('page' => getPathPage($id, getPath($id)));
    break;
    case 'get_glass_page':
        $id = $_REQUEST['id'];
        if($id == '' OR !isset($_REQUEST['id'])){
            $db->setQuery("INSERT INTO products_glasses SET user_id = 1");
            $db->execQuery();

            $id = $db->getLastId();

            $db->setQuery("DELETE FROM products_glasses WHERE id='$id'");
            $db->execQuery();
        }
        
        $data = array('page' => getGlassPage($id, getGlass($id)));
    break;
    case 'get_product_page':
        $id = $_REQUEST['id'];
        if($id == '' OR !isset($_REQUEST['id'])){
            $db->setQuery("INSERT INTO orders_product SET picture = 1");
            $db->execQuery();

            $id = $db->getLastId();

            $db->setQuery("DELETE FROM orders_product WHERE id='$id'");
            $db->execQuery();
        }
        
        $data = array('page' => getProductPage($id, getProduct($id)));
    break;

    case 'get_edit_page':

        $id = $_REQUEST['id'];
        if($id == '' OR !isset($_REQUEST['id'])){
            $db->setQuery("INSERT INTO orders SET datetime = NOW()");
            $db->execQuery();

            $id = $db->getLastId();

            $db->setQuery("DELETE FROM orders WHERE id='$id'");
            $db->execQuery();
        }
        
        $data = array('page' => getPage($id, getWriting($id)));

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

    case 'save_order':

        $id             = $_REQUEST['id'];
        $client_name    = $_REQUEST['client_name'];
        $client_phone   = $_REQUEST['client_phone'];
        $client_pid     = $_REQUEST['client_pid'];
        $client_addr    = $_REQUEST['client_addr'];
        $order_date     = $_REQUEST['order_date'];
        $add_info     = $_REQUEST['add_info'];
        $datetime_finish     = $_REQUEST['datetime_finish'];
        $pay_total      = $_REQUEST['pay_total'] == '' ? 0 : $_REQUEST['pay_total'];
        $avansi         = $_REQUEST['avansi'] == '' ? 0 : $_REQUEST['avansi'];
        $avans_plus     = $_REQUEST['avans_plus'] == '' ? 0 : $_REQUEST['avans_plus'];

        $db->setQuery(" SELECT  COUNT(*) AS cc
                        FROM    orders
                        WHERE   id = '$id' AND actived = 1");
        $isset = $db->getResultArray();

        if($isset['result'][0]['cc'] == 0){
            $db->setQuery("INSERT INTO orders SET
                                                id = '$id',
                                                user_id='$user_id',
                                                datetime='$order_date',
                                                datetime_finish='$datetime_finish',
                                                comment = '$add_info',
                                                client_name='$client_name',
                                                client_addr='$client_addr',
                                                client_phone='$client_phone',
                                                client_pid='$client_pid',
                                                total='$pay_total',
                                                avansi='$avansi',
                                                avans_plus='$avans_plus'");

            $db->execQuery();
            $data['error'] = '';
        }

        else{
            $db->setQuery("UPDATE orders SET user_id='$user_id',
                                                datetime='$order_date',
                                                datetime_finish='$datetime_finish',
                                                comment = '$add_info',
                                                client_name='$client_name',
                                                client_addr='$client_addr',
                                                client_pid='$client_pid',
                                                client_phone='$client_phone',
                                                total='$pay_total',
                                                avansi='$avansi',
                                                avans_plus='$avans_plus'
                            WHERE id='$id'");
            $db->execQuery();
            $data['error'] = '';
        }

    break;

    case 'save_product':

        $id          = $_REQUEST['id'];
        $selected_product_id  = $_REQUEST['selected_product_id'];
        $order_id    = $_REQUEST['order_id'];

        $butil_size     = $_REQUEST['butil_size'];
        $firi_lameks    = $_REQUEST['firi_lameks'];

        $db->setQuery(" SELECT  COUNT(*) AS cc
                        FROM    orders_product
                        WHERE   id = '$id' AND actived = 1");
        $isset = $db->getResultArray();

        if($isset['result'][0]['cc'] == 0){
        $db->setQuery("INSERT INTO orders_product SET
                                        id = '$id',
                                        user_id='$user_id',
                                        datetime=NOW(),
                                        order_id='$order_id',
                                        product_id='$selected_product_id',
                                        butili = '$butil_size',
                                        lameqs_int = '$firi_lameks'");

        $db->execQuery();
        $data['error'] = '';
        }

        else{
        $db->setQuery("UPDATE orders_product SET user_id='$user_id',
                                        order_id='$order_id',
                                        product_id='$selected_product_id',
                                        butili = '$butil_size',
                                        lameqs_int = '$firi_lameks'
                    WHERE id='$id'");
        $db->execQuery();
        $data['error'] = '';
        }

    break;

    case 'save_glass':

        $id             = $_REQUEST['id'];
        $glass_cat    = $_REQUEST['glass_cat'];
        $product_id    = $_REQUEST['product_id'];
        $glass_type   = $_REQUEST['glass_type'];
        $glass_color     = $_REQUEST['glass_color'];
        $glass_status    = $_REQUEST['glass_status'];
        $glass_width     = $_REQUEST['glass_width'];
        $glass_height      = $_REQUEST['glass_height'];
        $glass_manuf    = $_REQUEST['glass_manuf'];

        $order_id      = $_REQUEST['order_id'];

        $db->setQuery(" SELECT  COUNT(*) AS cc
                        FROM    products_glasses
                        WHERE   id = '$id' AND actived = 1");
        $isset = $db->getResultArray();

        if($isset['result'][0]['cc'] == 0){
            $db->setQuery("INSERT INTO products_glasses SET
                                                id = '$id',
                                                user_id='$user_id',
                                                datetime=NOW(),
                                                order_product_id='$product_id',
                                                glass_option_id='$glass_cat',
                                                glass_type_id='$glass_type',
                                                glass_color_id='$glass_color',
                                                glass_width='$glass_width',
                                                glass_height='$glass_height',
                                                glass_manuf_id = '$glass_manuf',
                                                status_id='$glass_status',
                                                order_id = '$order_id'");

            $db->execQuery();
            $data['error'] = '';
        }

        else{
            $db->setQuery("UPDATE products_glasses SET user_id='$user_id',
                                                order_product_id='$product_id',
                                                glass_option_id='$glass_cat',
                                                glass_type_id='$glass_type',
                                                glass_color_id='$glass_color',
                                                glass_width='$glass_width',
                                                glass_height='$glass_height',
                                                glass_manuf_id = '$glass_manuf',
                                                status_id='$glass_status',
                                                order_id = '$order_id'
                            WHERE id='$id'");
            $db->execQuery();
            $data['error'] = '';
        }

    break;

    case 'save_path':

        $id             = $_REQUEST['id'];
        $glass_id    = $_REQUEST['glass_id'];
        $path_group_id    = $_REQUEST['path_group_id'];
        $path_status     = $_REQUEST['path_status'];
        $sort_n    = $_REQUEST['sort_n'];
        $price      = $_REQUEST['price'];
        $cuts = $_REQUEST['cuts'] != '' ? $_REQUEST['cuts'] : 0;
        $holes = $_REQUEST['holes'] ? $_REQUEST['holes'] : 0;
        $db->setQuery(" SELECT  COUNT(*) AS cc
                        FROM    glasses_paths
                        WHERE   id = '$id' AND actived = 1");
        $isset = $db->getResultArray();
        

        if($isset['result'][0]['cc'] == 0){
            $db->setQuery(" SELECT  MAX(sort_n) AS max_sort
                            FROM    glasses_paths
                            WHERE   actived = 1 AND glass_id = '$glass_id'");
            $sort_n = $db->getResultArray()['result'][0]['max_sort']+1;
            $db->setQuery("INSERT INTO glasses_paths SET
                                                user_id='$user_id',
                                                datetime=NOW(),
                                                glass_id='$glass_id',
                                                path_group_id='$path_group_id',
                                                status_id='$path_status',
                                                price = '$price',
                                                cuts = '$cuts',
                                                holes = '$holes',
                                                sort_n = '$sort_n'");

            $db->execQuery();
            $data['error'] = '';
        }

        else{
            $db->setQuery("UPDATE glasses_paths SET user_id='$user_id',
                                                glass_id='$glass_id',
                                                path_group_id='$path_group_id',
                                                status_id='$path_status',
                                                sort_n='$sort_n'
                            WHERE id='$id'");
            $db->execQuery();
            $data['error'] = '';
        }

    break;

    case 'disable':

        $ids = $_REQUEST['id'];
        $type = $_REQUEST['type'];

        if($type == 'order'){
            //$ids = explode(',',$ids);



            foreach($ids AS $id){
                $db->setQuery("UPDATE orders SET actived = 0 WHERE id = '$id'");
                $db->execQuery();
    
            }
        }
        else if($type == 'product'){
            //$ids = explode(',',$ids);



            foreach($ids AS $id){
                $db->setQuery("UPDATE orders_product SET actived = 0 WHERE id = '$id'");
                $db->execQuery();
    
            }
        }

        else if($type == 'glass'){
            //$ids = explode(',',$ids);



            foreach($ids AS $id){
                $db->setQuery("UPDATE products_glasses SET actived = 0 WHERE id = '$id'");
                $db->execQuery();
    
            }
        }
        else if($type == 'path'){
            //$ids = explode(',',$ids);



            foreach($ids AS $id){
                $db->setQuery("UPDATE glasses_paths SET actived = 0 WHERE id = '$id'");
                $db->execQuery();
    
            }
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

					}elseif($columns[$j] == "id2" OR $columns[$j] == "write_date" OR $columns[$j] == "impuls_qty" OR $columns[$j] == "glass_option_id" OR $columns[$j] == "glass_type_id" OR $columns[$j] == "glass_color_id" OR $columns[$j] == "glass_manuf_id" ){

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
                    elseif($columns[$j] == "list"){

						$g = array('field'=>$columns[$j],'encoded'=>false,'title'=>$columnNames[0][$a],'filterable'=>array('multi'=>true,'search' => true), 'width' => 150);

					}
                    elseif($columns[$j] == "product_glasses"){

						$g = array('field'=>$columns[$j],'encoded'=>false,'title'=>$columnNames[0][$a],'filterable'=>array('multi'=>true,'search' => true), 'width' => 300);

					}
                    elseif($columns[$j] == "product_pic"){

						$g = array('field'=>$columns[$j],'encoded'=>false,'title'=>$columnNames[0][$a],'filterable'=>array('multi'=>true,'search' => true), 'width' => 80);

					}
                    elseif($columns[$j] == "product_act"){

						$g = array('field'=>$columns[$j],'encoded'=>false,'title'=>$columnNames[0][$a],'filterable'=>array('multi'=>true,'search' => true), 'width' => 80);

					}
                    elseif($columns[$j] == "product_id"){

						$g = array('field'=>$columns[$j],'encoded'=>false,'title'=>$columnNames[0][$a],'filterable'=>array('multi'=>true,'search' => true), 'width' => 30);

					}
                    elseif($columns[$j] == "butil"){

						$g = array('field'=>$columns[$j],'encoded'=>false,'title'=>$columnNames[0][$a],'filterable'=>array('multi'=>true,'search' => true), 'width' => 40);

					}
                    elseif($columns[$j] == "cut_id"){

						$g = array('field'=>$columns[$j],'encoded'=>false,'title'=>$columnNames[0][$a],'filterable'=>array('multi'=>true,'search' => true), 'width' => 40);

					}
                    elseif($columns[$j] == "lameks"){

						$g = array('field'=>$columns[$j],'encoded'=>false,'title'=>$columnNames[0][$a],'filterable'=>array('multi'=>true,'search' => true), 'width' => 50);

					}

                    elseif($columns[$j] == "product_status"){

						$g = array('field'=>$columns[$j],'encoded'=>false,'title'=>$columnNames[0][$a],'filterable'=>array('multi'=>true,'search' => true), 'width' => 100);

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
    case 'get_list_proccess':
        $columnCount = 		$_REQUEST['count'];
		$cols[]      =      $_REQUEST['cols'];

        $order_id = $_REQUEST['order_id'];
        $path_id = $_REQUEST['path_id'];
        if($path_id == 2){
            $db->setQuery("SELECT 		cut_glass.id,
                                        CONCAT('ID: ', warehouse.id, ' ზომები: ', warehouse.glass_width, 'მმ X ',warehouse.glass_height, 'მმ პირამიდა: ', warehouse.pyramid) AS list,
                                        GROUP_CONCAT(CONCAT('ID: ', products_glasses.id, ' ზომები: ', products_glasses.glass_width, 'მმ X ',products_glasses.glass_height, 'მმ -',' <span data-id=\"',products_glasses.id,'\" class=\"print_shtrixkod\">დაბეჭდე</span>') SEPARATOR ', <br>') AS glasses,
                                        
                                        CONCAT('<span style=\"padding:5px;', CASE
                                                WHEN glass_status.id = 1 THEN 'background-color: red;'
                                                WHEN glass_status.id = 2 THEN 'background-color: yellow;'
                                                WHEN glass_status.id = 3 THEN 'background-color: green;'
                                                WHEN glass_status.id = 4 THEN 'background-color: red;'
                                                WHEN glass_status.id = 5 THEN 'background-color: red;'
                                        END
                                        ,'\">', glass_status.name,'</span>') AS status,
                                        CASE
                                            WHEN glass_status.id = 1 THEN CONCAT('<div style=\"display:flex;\"><div class=\"start_proc\" cut-id=\"',cut_glass.id,'\" id=\"new_glass\"><img style=\"width: 20px;\" src=\"http://assets.stickpng.com/images/580b57fcd9996e24bc43c4f9.png\"></div><div id=\"del_glass\" class=\"del_glass\" cut-id=\"',cut_glass.id,'\"> <img style=\"width: 20px;\" src=\"https://www.clipartmax.com/png/small/188-1882946_warning-icon.png\"></div></div>')
                                            WHEN glass_status.id = 2 THEN CONCAT('<div style=\"display:flex;\"><div class=\"finish_proc\" cut-id=\"',cut_glass.id,'\" id=\"new_glass\"><img style=\"width: 20px;\" src=\"https://e7.pngegg.com/pngimages/871/200/png-clipart-check-mark-computer-icons-icon-design-complete-angle-logo.png\"></div><div id=\"del_glass\" class=\"del_glass\" cut-id=\"',cut_glass.id,'\"> <img style=\"width: 20px;\" src=\"https://www.clipartmax.com/png/small/188-1882946_warning-icon.png\"></div></div>')
                                            WHEN glass_status.id = 3 THEN ''
                                            WHEN glass_status.id = 4 THEN ''
                                            WHEN glass_status.id = 5 THEN ''


                                        END AS acc
                                        
                                        FROM 		cut_glass
                                        JOIN		lists_to_cut ON lists_to_cut.cut_id = cut_glass.id
                                        JOIN		warehouse ON warehouse.id = lists_to_cut.list_id
                                        JOIN		products_glasses ON products_glasses.id = lists_to_cut.glass_id
                                        JOIN		glass_status ON glass_status.id = cut_glass.status_id
                                        WHERE 	    cut_glass.actived = 1

                                        GROUP BY    cut_glass.id");

            
        }
        else if($path_id == 6 || $path_id == 7){
            $db->setQuery(" SELECT  orders_product.id,
                                    
                                    GROUP_CONCAT(DISTINCT CONCAT('№-',products_glasses.id,' ',glass_options.name, ' - <span style=\"color:#000;',
                                    CASE
                                        WHEN glass_status.id = 1 THEN 'background-color: red;'
                                        WHEN glass_status.id = 2 THEN 'background-color: yellow;'
                                        WHEN glass_status.id = 3 THEN 'background-color: green;'
                                        WHEN glass_status.id = 4 THEN 'background-color: red;'
                                        WHEN glass_status.id = 5 THEN 'background-color: red;'
                                    END
                                    ,'\">', glass_status.name,'</span> ', products_glasses.glass_width,'მმ',products_glasses.glass_height, ' პირამიდა: ', IFNULL(IF(IFNULL((SELECT path_group_id FROM glasses_paths WHERE status_id IN (1,2,4,5) AND glass_id = products_glasses.id AND actived = 1 LIMIT 1), 0) != glasses_paths.path_group_id, glasses_paths.pyramid,(SELECT path_2.pyramid FROM glasses_paths AS path_2 WHERE path_2.glass_id = products_glasses.id AND path_2.sort_n = glasses_paths.sort_n - 1 AND actived = 1)),''),' <span data-id=\"',products_glasses.id,'\" class=\"print_shtrixkod\">დაბეჭდე</span>') SEPARATOR ',<br>') AS glasses,
                                    orders_product.butili,
                                    orders_product.lameqs_int,
                                    CONCAT('<a style=\"color:blue;\" target=\"_blank\" href=\"',IFNULL(orders_product.picture,0),'\">სურათის გახსნა</a>') AS picture,
                                    CASE
                                    WHEN glass_status.id = 1 THEN IF((SELECT path_group_id FROM glasses_paths WHERE status_id IN (1,2,4,5) AND glass_id = products_glasses.id AND actived = 1 LIMIT 1) != glasses_paths.path_group_id, '<span style=\"padding:5px;background-color: red;\">რიგში</span>',CONCAT('<span style=\"padding:5px;', CASE
                                                                                                            WHEN glass_status.id = 1 THEN 'background-color: red;'
                                                                                                            WHEN glass_status.id = 2 THEN 'background-color: yellow;'
                                                                                                            WHEN glass_status.id = 3 THEN 'background-color: green;'
                                                                                                            WHEN glass_status.id = 4 THEN 'background-color: red;'
                                                                                                            WHEN glass_status.id = 5 THEN 'background-color: red;'
                                                                                                        END
                                                                            ,'\">', glass_status.name,'</span>'))
                                        ELSE CONCAT('<span style=\"padding:5px;', CASE
                                        WHEN glass_status.id = 1 THEN 'background-color: red;'
                                        WHEN glass_status.id = 2 THEN 'background-color: yellow;'
                                        WHEN glass_status.id = 3 THEN 'background-color: green;'
                                        WHEN glass_status.id = 4 THEN 'background-color: red;'
                                        WHEN glass_status.id = 5 THEN 'background-color: red;'
                                    END
                                    ,'\">', glass_status.name,'</span>')
                                    END AS glasses2,
                                    CASE
                                        WHEN glass_status.id = 1 AND (SELECT path_group_id FROM glasses_paths WHERE status_id IN (1,2,4,5) AND glass_id = products_glasses.id AND actived = 1 LIMIT 1) = glasses_paths.path_group_id THEN CONCAT('<div style=\"display:flex;\"><div class=\"start_proc\" path-id=\"',glasses_paths.id,'\" data-id=\"',products_glasses.id,'\" id=\"new_glass\"><img style=\"width: 20px;\" src=\"http://assets.stickpng.com/images/580b57fcd9996e24bc43c4f9.png\"></div><div id=\"del_glass\" class=\"del_glass\" path-id=\"',glasses_paths.id,'\" data-id=\"',products_glasses.id,'\"> <img style=\"width: 20px;\" src=\"https://www.clipartmax.com/png/small/188-1882946_warning-icon.png\"></div></div>')
                                        WHEN glass_status.id = 2 THEN CONCAT('<div style=\"display:flex;\"><div class=\"finish_proc\" path-id=\"',glasses_paths.id,'\" data-id=\"',products_glasses.id,'\" id=\"new_glass\"><img style=\"width: 20px;\" src=\"https://e7.pngegg.com/pngimages/871/200/png-clipart-check-mark-computer-icons-icon-design-complete-angle-logo.png\"></div><div id=\"del_glass\" class=\"del_glass\" path-id=\"',glasses_paths.id,'\" data-id=\"',products_glasses.id,'\"> <img style=\"width: 20px;\" src=\"https://www.clipartmax.com/png/small/188-1882946_warning-icon.png\"></div></div>')
                                        WHEN glass_status.id = 3 THEN ''
                                        WHEN glass_status.id = 4 THEN ''
                                        WHEN glass_status.id = 5 THEN ''


                                    END AS acc

                            FROM    orders_product
                            JOIN    orders ON orders.id = orders_product.order_id
                            JOIN    products ON products.id = orders_product.product_id
                            
                            LEFT JOIN	products_glasses ON products_glasses.order_product_id = orders_product.id
                            JOIN		glasses_paths ON glasses_paths.glass_id = products_glasses.id
                            LEFT JOIN	glass_options ON glass_options.id = products_glasses.glass_option_id
                            LEFT JOIN	glass_status ON glass_status.id = glasses_paths.status_id
                            
                            WHERE   orders_product.actived = 1 AND products_glasses.actived = 1 AND orders.actived = 1 AND glasses_paths.path_group_id = '$path_id'
                            GROUP BY orders_product.id");
        }
        else{
            $db->setQuery(" SELECT	products_glasses.id,
                                    CONCAT(glass_options.name,' <span data-id=\"',products_glasses.id,'\" class=\"print_shtrixkod\">დაბეჭდე</span>') AS option,
                                    glass_type.name AS type,
                                    glass_colors.name AS color,
                                    CONCAT(products_glasses.glass_width,'მმ', products_glasses.glass_height,'მმ') AS param,

                                    CONCAT('<a style=\"color:red; font-size: 18px;\" target=\"_blank\" href=\"',orders_product.picture,'\">სურათის გახსნა</a>') AS pic,
                                    CONCAT('ნახვრეტი: 4, ჭრის რაოდენობა:5'),
                                    CASE
                                    WHEN lists_to_cut.id IS NOT NULL THEN IF(lists_to_cut.status_id = 3, IFNULL(IFNULL((SELECT gp1.pyramid FROM glasses_paths AS gp2 JOIN glasses_paths AS gp1 ON gp1.sort_n = gp2.sort_n-1 AND gp1.glass_id = gp2.glass_id WHERE gp2.status_id IN (1,2) AND gp2.glass_id = products_glasses.id AND gp2.actived = 1 LIMIT 1), IFNULL((SELECT pyramid FROM glasses_paths WHERE status_id IN (4,5) AND actived = 1 AND glass_id = products_glasses.id ORDER BY sort_n ASC LIMIT 1), (SELECT pyramid FROM glasses_paths WHERE status_id IN (3) AND actived = 1 AND glass_id = products_glasses.id ORDER BY sort_n DESC LIMIT 1))), lists_to_cut.pyramid), IF(lists_to_cut.status_id IN (1,2), 'არ დევს პირამიდაზე',lists_to_cut.pyramid))
                                    
                                    ELSE IFNULL((SELECT gp1.pyramid FROM glasses_paths AS gp2 JOIN glasses_paths AS gp1 ON gp1.sort_n = gp2.sort_n-1 AND gp1.glass_id = gp2.glass_id WHERE gp2.status_id IN (1,2) AND gp2.glass_id = products_glasses.id AND gp2.actived = 1 LIMIT 1), IFNULL((SELECT pyramid FROM glasses_paths WHERE status_id IN (4,5) AND actived = 1 AND glass_id = products_glasses.id ORDER BY sort_n ASC LIMIT 1), (SELECT pyramid FROM glasses_paths WHERE status_id IN (3) AND actived = 1 AND glass_id = products_glasses.id ORDER BY sort_n DESC LIMIT 1)))
                                END AS pyramid,
                                    
                                    
                                    IF(IFNULL((SELECT status_id FROM lists_to_cut WHERE glass_id = products_glasses.id AND actived = 1), 3) = 3,CASE
                                    WHEN glass_status.id = 1 THEN IF((SELECT path_group_id FROM glasses_paths WHERE status_id IN (1,2,4,5) AND glass_id = products_glasses.id AND actived = 1 LIMIT 1) != glasses_paths.path_group_id, '<span style=\"padding:5px;background-color: red;\">რიგში</span>',CONCAT('<span style=\"padding:5px;', CASE
                                                                                                            WHEN glass_status.id = 1 THEN 'background-color: red;'
                                                                                                            WHEN glass_status.id = 2 THEN 'background-color: yellow;'
                                                                                                            WHEN glass_status.id = 3 THEN 'background-color: green;'
                                                                                                            WHEN glass_status.id = 4 THEN 'background-color: red;'
                                                                                                            WHEN glass_status.id = 5 THEN 'background-color: red;'
                                                                                                        END
                                                                            ,'\">', glass_status.name,'</span>'))
                                        ELSE CONCAT('<span style=\"padding:5px;', CASE
                                        WHEN glass_status.id = 1 THEN 'background-color: red;'
                                        WHEN glass_status.id = 2 THEN 'background-color: yellow;'
                                        WHEN glass_status.id = 3 THEN 'background-color: green;'
                                        WHEN glass_status.id = 4 THEN 'background-color: red;'
                                        WHEN glass_status.id = 5 THEN 'background-color: red;'
                                    END
                                    ,'\">', glass_status.name,'</span>')
                                    END,'<span style=\"padding:5px;background-color: red;\">რიგში</span>') AS glasses,

                                    IF(IFNULL((SELECT status_id FROM lists_to_cut WHERE glass_id = products_glasses.id AND actived = 1), 3) = 3,CASE
                                        WHEN glass_status.id = 1 AND (SELECT path_group_id FROM glasses_paths WHERE status_id IN (1,2,4,5) AND glass_id = products_glasses.id AND actived = 1 LIMIT 1) = glasses_paths.path_group_id THEN CONCAT('<div style=\"display:flex;\"><div class=\"start_proc\" path-id=\"',glasses_paths.id,'\" data-id=\"',products_glasses.id,'\" id=\"new_glass\"><img style=\"width: 20px;\" src=\"http://assets.stickpng.com/images/580b57fcd9996e24bc43c4f9.png\"></div><div id=\"del_glass\" class=\"del_glass\" path-id=\"',glasses_paths.id,'\" data-id=\"',products_glasses.id,'\"> <img style=\"width: 20px;\" src=\"https://www.clipartmax.com/png/small/188-1882946_warning-icon.png\"></div></div>')
                                        WHEN glass_status.id = 2 THEN CONCAT('<div style=\"display:flex;\"><div class=\"finish_proc\" path-id=\"',glasses_paths.id,'\" data-id=\"',products_glasses.id,'\" id=\"new_glass\"><img style=\"width: 20px;\" src=\"https://e7.pngegg.com/pngimages/871/200/png-clipart-check-mark-computer-icons-icon-design-complete-angle-logo.png\"></div><div id=\"del_glass\" class=\"del_glass\" path-id=\"',glasses_paths.id,'\" data-id=\"',products_glasses.id,'\"> <img style=\"width: 20px;\" src=\"https://www.clipartmax.com/png/small/188-1882946_warning-icon.png\"></div></div>')
                                        WHEN glass_status.id = 3 THEN ''
                                        WHEN glass_status.id = 4 THEN ''
                                        WHEN glass_status.id = 5 THEN ''


                                    END,'') AS acc
                                    
                                    
                            FROM 		products_glasses
                            JOIN		orders_product ON orders_product.id = products_glasses.order_product_id AND orders_product.actived = 1
                            JOIN		orders ON orders.id = orders_product.order_id AND orders.actived = 1
                            JOIN		glass_options ON glass_options.id = products_glasses.glass_option_id		
                            JOIN 		glass_type ON glass_type.id = products_glasses.glass_type_id
                            JOIN		glass_colors ON glass_colors.id = products_glasses.glass_color_id
                            JOIN		glasses_paths ON glasses_paths.glass_id = products_glasses.id
                            JOIN		glass_status ON glass_status.id = glasses_paths.status_id
                            LEFT JOIN		lists_to_cut ON lists_to_cut.glass_id = products_glasses.id AND lists_to_cut.actived = 1

                            WHERE 	    products_glasses.actived = 1 AND glasses_paths.path_group_id = '$path_id' AND glasses_paths.actived = 1

                            GROUP BY products_glasses.id
                            ORDER BY glass_status.sort_n");
        }
        
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
                        LEFT JOIN	products_glasses ON products_glasses.order_product_id = orders_product.id
                        LEFT JOIN	glass_options ON glass_options.id = products_glasses.glass_option_id
                        LEFT JOIN	glass_status ON glass_status.id = products_glasses.status_id
                        WHERE   orders_product.order_id = '$order_id' AND orders_product.actived = 1 AND products_glasses.actived = 1
                        GROUP BY orders_product.id");
        $result = $db->getKendoList($columnCount, $cols);

        $data = $result;
        break;

    case 'get_list_glasses_all':
        $columnCount = 		$_REQUEST['count'];
        $cols[]      =      $_REQUEST['cols'];

        $product_id = $_REQUEST['product_id'];

        $db->setQuery(" SELECT  products_glasses.id,
                                products_glasses.glass_option_id,
                                products_glasses.glass_type_id,
                                products_glasses.glass_color_id,
                                products_glasses.glass_manuf_id,
                                CONCAT(glass_options.name, '(',glass_manuf.name,')'),
                                CONCAT(products_glasses.glass_width, 'მმ X ', products_glasses.glass_height,'მმ'),
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
                                ,'\">', glass_status.name,'</span>') AS glasses,

                                IFNULL((SELECT cut_id FROM lists_to_cut WHERE actived = 1 AND lists_to_cut.glass_id = products_glasses.id), 'არ იჭრება')

                        FROM    products_glasses
                        JOIN    glass_options ON glass_options.id = products_glasses.glass_option_id
                        JOIN    glass_type ON glass_type.id = products_glasses.glass_type_id
                        JOIN    glass_colors ON glass_colors.id = products_glasses.glass_color_id
                        JOIN    glass_status ON glass_status.id = products_glasses.status_id
                        JOIN    glass_manuf ON glass_manuf.id = products_glasses.glass_manuf_id
                        LEFT JOIN	glasses_paths ON glasses_paths.glass_id = products_glasses.id AND glasses_paths.actived = 1
                        LEFT JOIN groups ON groups.id = glasses_paths.path_group_id
                        LEFT JOIN glass_status AS path_status ON path_status.id = glasses_paths.status_id
                        WHERE   products_glasses.actived = 1
                        GROUP BY products_glasses.id
                        ORDER BY products_glasses.id");


        $result = $db->getKendoList($columnCount, $cols);

        $data = $result;
        break;
    case 'get_list_glasses':
        $columnCount = 		$_REQUEST['count'];
		$cols[]      =      $_REQUEST['cols'];

        $product_id = $_REQUEST['product_id'];

        $db->setQuery(" SELECT  products_glasses.id,
                                products_glasses.glass_option_id,
                                products_glasses.glass_type_id,
                                products_glasses.glass_color_id,
                                products_glasses.glass_manuf_id,
                                CONCAT(glass_options.name, '(',glass_manuf.name,')'),
                                CONCAT(products_glasses.glass_width, 'მმ X ', products_glasses.glass_height,'მმ'),
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
                                ,'\">', glass_status.name,'</span>') AS glasses,

                                IFNULL((SELECT list_id FROM lists_to_cut WHERE actived = 1 AND lists_to_cut.glass_id = products_glasses.id), 'არ იჭრება')

                        FROM    products_glasses
                        JOIN    glass_options ON glass_options.id = products_glasses.glass_option_id
                        JOIN    glass_type ON glass_type.id = products_glasses.glass_type_id
                        JOIN    glass_colors ON glass_colors.id = products_glasses.glass_color_id
                        JOIN    glass_status ON glass_status.id = products_glasses.status_id
                        JOIN    glass_manuf ON glass_manuf.id = products_glasses.glass_manuf_id
                        LEFT JOIN	glasses_paths ON glasses_paths.glass_id = products_glasses.id AND glasses_paths.actived = 1
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
                                ROW_NUMBER() OVER () AS sort_n,
                                glasses_paths.price,
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
                        ORDER BY glasses_paths.id ASC");


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
function getPath($id){
    GLOBAL $db;

    $db->setQuery(" SELECT  id,
                            user_id,
                            glass_id,
                            path_group_id,
                            status_id,
                            sort_n
                    FROM    glasses_paths
                    WHERE   id = '$id'");

    $result = $db->getResultArray();



    return $result['result'][0];
}
function getGlass($id){
    GLOBAL $db;

    $db->setQuery(" SELECT  id,
                            glass_option_id,
                            glass_type_id,
                            glass_color_id,
                            glass_width,
                            glass_height,
                            glass_manuf_id,
                            status_id
                    FROM    products_glasses
                    WHERE   id = '$id'");

    $result = $db->getResultArray();



    return $result['result'][0];
    
}
function getGlassPage($id, $res = ''){
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
                                <label>შეიყვანეთ ზომა (სიმაღლეXსიგანე)</label>
                                <div class="row">
                                    <div class="col-sm-6"><input style="width:99%;" type="text" id="glass_width" value="'.$res['glass_width'].'"></div>
                                    <div class="col-sm-6"><input style="width:99%;" type="text" id="glass_height" value="'.$res['glass_height'].'"></div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label>აირჩიეთ მწარმოებელი</label>
                                <select id="selected_glass_manuf_id">
                                    '.getGlassManuf($res['glass_manuf_id']).'
                                </select>
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
                           
                        </div>
                    </legend>
                </fieldset>
                <fieldset class="fieldset">
                    <legend>პროცესი</legend>
                    <div class="row" style="    flex-direction: row;
                    justify-content: space-around;">';
                        $db->setQuery("SELECT   id,name
                                        FROM groups
                                        WHERE actived = 1 AND id NOT IN (1, 2)");
                        $rows = $db->getResultArray()['result'];

                        foreach($rows AS $row){
                            $data .= '<div class="proccess" data-id="'.$row[id].'">
                                        <span>'.$row[name].'</span>
                                    </div>';
                        }
                        
                        
                    $data .= '
                    <div style="margin-top: 16px;" class="col-sm-12">
                        <div id="path_div"></div>
                    </div>
                    </div>
                </fieldset>

                <input type="hidden" id="glass_id" value="'.$id.'">

                ';

    return $data;
}

function getPathPage($id, $res = ''){
    GLOBAL $db;
    
    $data = '   <fieldset class="fieldset">
                    <legend>ინფორმაცია</legend>
                        <div class="row">
                            <div class="col-sm-4">
                                <label>აირჩიეთ პროცესი</label>
                                <select id="path_group_id">
                                    '.getPathOptions($res['path_group_id']).'
                                </select>
                            </div>
                            
                            <div class="col-sm-4">
                                <label>აირჩიეთ სტატუსი</label>
                                <select id="path_status">
                                    '.getGlassStatusOptions($res['status_id']).'
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label>თანმიმდევრობა</label>
                                <input style="width:99%;" type="text" id="sort_n" value="'.$res['sort_n'].'">
                            </div>
                        </div>
                    </legend>
                </fieldset>

                <input type="hidden" id="path_id" value="'.$id.'">

                ';

    return $data;
}
function getProduct($id){
    GLOBAL $db;

    $db->setQuery(" SELECT  id,
                            product_id AS product_cat_id,
                            picture,
                            lameqs_int,
                            butili
                    FROM    orders_product
                    WHERE   id = '$id'");

    $result = $db->getResultArray();



    return $result['result'][0];
    
}
function getPricePage($proc_id){
    GLOBAL $db;

    $data = '   <fieldset class="fieldset">
                    <legend>ინფორმაცია</legend>
                        <div class="row">';
                            if($proc_id == 3){
                                $data .= '  <div class="col-sm-12">
                                                <label>ფასი მეტრობით</label>
                                                <input type="number" step=".01" value="20" id="kv_price">
                                            </div>';
                            }
                            if($proc_id == 4){
                                $data .= '  <div class="col-sm-6">
                                                <label>ნახვრეტების რაოდენობა</label>
                                                <input type="tel" min="1" id="holes">
                                            </div>
                                            <div class="col-sm-6">
                                                <label>1 ნახვრეტის ფასი</label>
                                                <input type="number" step=".01" value="5" id="hole_price">
                                            </div>
                                            
                                            <div class="col-sm-6">
                                                <label>ჭრის რაოდენობა</label>
                                                <input type="tel" min="1" id="cuts">
                                            </div>
                                            <div class="col-sm-6">
                                                <label>1 ჭრის ფასი</label>
                                                <input type="number" step=".01" value="5" id="cut_price">
                                            </div>';
                            }
                            if($proc_id == 6 or $proc_id == 7 or $proc_id == 5 or $proc_id == 2){
                                $data .= '  <div class="col-sm-12">
                                                <label>კვადრატულის ფასი</label>
                                                <input type="number" step=".01" value="20" id="kv_price">
                                            </div>';
                            }
                            

                        $data .= '</div>
                    </legend>
                </fieldset>

                <input type="hidden" id="proc_id" value="'.$proc_id.'">

                ';

    return $data;
}
function getProductPage($id, $res = ''){
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
                                <img id="upProdImg" src="'.$res['picture'].'" style="width:100px; cursor: pointer;" >
                                <input style="display:none;" type="file" id="product_file">
                            </div>
                            <div class="col-sm-6">
                                <label>ბუტილის ზომა</label>
                                <input type="number" step=".01" value="'.$res['butili'].'" id="butil_size">
                            </div>
                            <div class="col-sm-6">
                                <label>ფირი (ლამექსისთვის მხოლოდ)</label>
                                <input type="text" id="firi_lameks" value="'.$res['lameqs_int'].'">
                            </div>
                            <div style="margin-top: 16px;" class="col-sm-12">
                                <div id="glasses_div"></div>
                            </div>
                        </div>
                    </legend>
                </fieldset>

                <input type="hidden" id="product_id" value="'.$id.'">

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
function getGlassManuf($id){
    GLOBAL $db;
    $data = '';
    $db->setQuery("SELECT   id,
                            name AS 'name'
                    FROM    glass_manuf
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
function getPathOptions($id){
    GLOBAL $db;
    $data = '';
    $db->setQuery("SELECT   id,
                            name AS 'name'
                    FROM    groups 
                    WHERE actived = 1 AND id != '1'");
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
function getPage($id, $res = ''){

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
                <label>პ/ნ ან ს/კ</label>
                <input value="'.$res['client_pid'].'" data-nec="0" style="height: 18px; width: 95%;" type="text" id="client_pid" class="idle" autocomplete="off">
            </div>

            <div class="col-sm-3">
                <label>ტელეფონი</label>
                <input value="'.$res['client_phone'].'" data-nec="0" style="height: 18px; width: 95%;" type="text" id="client_phone" class="idle" autocomplete="off">
            </div>

            <div class="col-sm-3">
                <label>მისამართი</label>
                <input value="'.$res['client_addr'].'" data-nec="0" style="height: 18px; width: 95%;" type="text" id="client_addr" class="idle" autocomplete="off">
            </div>
            
            <div class="col-sm-12">---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</div>
            <div class="col-sm-2">
                <label>შეკვეთის თარიღი</label>
                <input value="'.$res['datetime'].'" data-nec="0" style="height: 18px; width: 95%;" type="text" id="order_date" class="idle" autocomplete="off">
            </div>
            <div class="col-sm-2">
                <label>დასრულების თარიღი</label>
                <input value="'.$res['datetime_finish'].'" data-nec="0" style="height: 18px; width: 95%;" type="text" id="datetime_finish" class="idle" autocomplete="off">
            </div>
            <div class="col-sm-2">
                <label>დამატებითი ინფო</label>
                <input value="'.$res['add_info'].'" data-nec="0" style="height: 18px; width: 95%;" type="text" id="add_info" class="idle" autocomplete="off">
            </div>
            
            <div class="col-sm-2">
                <label>სულ გადასახდელი</label>
                <input value="'.$res['total'].'" data-nec="0" style="height: 18px; width: 95%;" type="number" step=".01" id="pay_total" class="idle" autocomplete="off">
            </div>
            <div class="col-sm-2">
                <label>ავანსი</label>
                <input value="'.$res['avansi'].'" data-nec="0" style="height: 18px; width: 95%;" type="number" step=".01" id="avansi" class="idle" autocomplete="off">
            </div>
            <div class="col-sm-2">
                <label>დამატებული თანხა</label>
                <input value="'.$res['avans_plus'].'" data-nec="0" style="height: 18px; width: 95%;" type="number" step=".01" id="avans_plus" class="idle" autocomplete="off">
            </div>
            <div class="col-sm-12">---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</div>
            <div class="col-sm-12">
                <label>პროდუქცია</label>
                <div id="product_div"></div>
            </div>
            
            ';

            
            



        $data .= '</div></div>

    </fieldset>

    

    <input type="hidden" id="writing_id" value="'.$id.'">

    ';



    return $data;

}

function getWriting($id){

    GLOBAL $db;



    $db->setQuery(" SELECT 	orders.id,
                            orders.datetime,
                            orders.datetime_finish,
                            orders.comment AS add_info,
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

function cutPage($glass_ids, $option_id, $type_id, $color_id, $manuf_id, $cut_id){
    GLOBAL $db;
    
    $id = implode(',', $glass_ids);

    $data = '   <fieldset class="fieldset">
                    <legend>ინფორმაცია</legend>
                        <div class="row">
                            <div class="col-sm-12">
                                <label>აირჩიეთ ლისტი</label>
                                <select id="selected_list_id">
                                    '.getCutOptions($option_id, $type_id, $color_id, $manuf_id).'
                                </select>
                            </div>
                            
                        </div>
                    </legend>
                </fieldset>

                <fieldset class="fieldset">
                    <legend>ატხოდები</legend>
                        <div class="row">
                            <div class="col-sm-12">
                                <div id="otxod_div"></div>
                            </div>
                            
                        </div>
                    </legend>
                </fieldset>
                <input type="hidden" id="cut_id" value="'.$cut_id.'">
                <input type="hidden" id="glass_ids" value="'.$id.'">
                
                <script>
                    $(document).ready(function(){
                        var q = "&cut_id='.$cut_id.'";
                        LoadKendoTable_otxod(q);
                    })
                </script>
                ';

    return $data;
}

function getCutOptions($option_id, $type_id, $color_id, $manuf_id){
    GLOBAL $db;
    $data = '';
    $db->setQuery("SELECT   id,
                            CONCAT('ზომები: ', warehouse.glass_width, 'მმ X ',warehouse.glass_height, 'მმ, პირამიდა: ', warehouse.pyramid ) AS name
                    FROM    warehouse
                    WHERE   actived = 1 AND qty > 0 AND glass_option_id = '$option_id' AND glass_type_id = '$type_id' AND glass_color_id = '$color_id' AND glass_manuf_id = '$manuf_id' ");
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

function getAtxod($id){
    GLOBAL $db;

    $db->setQuery(" SELECT 	cut_atxod.id,
                            cut_atxod.width,
                            cut_atxod.height
                        
                            
                    FROM 	cut_atxod
                    WHERE 	cut_atxod.actived = 1 AND cut_atxod.id = '$id'");

    $result = $db->getResultArray();



    return $result['result'][0];
}

function atxodPage($res = ''){

    $data = '   <fieldset class="fieldset">
                    <legend>ინფორმაცია</legend>
                        <div class="row">
                            <div class="col-sm-12">
                                <label>შეიყვანეთ ზომა (სიმაღლეXსიგანე)</label>
                                <div class="row">
                                    <div class="col-sm-6"><input style="width:99%;" type="text" id="glass_width" value="'.$res['width'].'"></div>
                                    <div class="col-sm-6"><input style="width:99%;" type="text" id="glass_height" value="'.$res['height'].'"></div>
                                </div>
                            </div>
                            
                        </div>
                    </legend>
                </fieldset>

                <input type="hidden" id="atxod_id" value="'.$res['id'].'">
                
                
                ';

    return $data;
    
}

function rotate90($mat) {
    $height = count($mat);
    $width = count($mat[0]);
    $mat90 = array();

    for ($i = 0; $i < $width; $i++) {
        for ($j = 0; $j < $height; $j++) {
            $mat90[$height - $i - 1][$j] = $mat[$height - $j - 1][$i];
        }
    }

    return $mat90;
}
?>