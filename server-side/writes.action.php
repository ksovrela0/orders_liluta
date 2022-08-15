<?php

session_start();

error_reporting(E_ERROR);

include('../db.php');

GLOBAL $db;

$db = new dbClass();

$act = $_REQUEST['act'];

$user_id = $_SESSION['USERID'];
$user_gr = $_SESSION['GRPID'];
$data = array();
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
function getProcFinish($path_id, $glass_id, $proc_id = 0){
    GLOBAL $db;
    if($proc_id == 2){
        $cut_id = $_REQUEST['cut_id'];

        $db->setQuery(" SELECT  lists_to_cut.id,lists_to_cut.glass_id,
                                CONCAT(products_glasses.glass_width,'მმ', products_glasses.glass_height,'მმ') AS si
                        FROM    lists_to_cut
                        JOIN    products_glasses ON products_glasses.id = lists_to_cut.glass_id AND products_glasses.actived = 1
                        WHERE   lists_to_cut.cut_id IN ($cut_id) AND lists_to_cut.actived = 1 AND lists_to_cut.status_id NOT IN (4,3)");
        $glass_ids = $db->getResultArray()['result'];


        $db->setQuery(" SELECT  id,
                                CONCAT(width,'მმ', height,'მმ') AS si
                        FROM    cut_atxod
                        WHERE   actived = 1 AND cut_id = '$cut_id' AND status_id NOT IN (4,3)");
        $atxods = $db->getResultArray()['result'];

        $data = '   <fieldset class="fieldset">
                        <legend>პირამიდა</legend>
                            <div class="row">';
                                foreach($glass_ids AS $glass){
                                    $db->setQuery("SELECT groups.name FROM glasses_paths JOIN groups ON groups.id = glasses_paths.path_group_id WHERE glasses_paths.glass_id = '$glass[glass_id]' AND glasses_paths.actived = 1 AND glasses_paths.status_id = 1 ORDER BY glasses_paths.sort_n ASC LIMIT 1");
                                    $next_proc = $db->getResultArray()['result'][0]['name'];
                                    if($next_proc == ''){
                                        $db->setQuery("SELECT orders.client_name
                                                        FROM orders
                                                        JOIN products_glasses ON products_glasses.id = '$glass[glass_id]' AND products_glasses.actived = 1
                                                        WHERE orders.actived = 1");
                                        $order = $db->getResultArray()['result'][0]['client_name'];
                                        $next_proc = 'დასრულებულია! დამკვეთი: '.$order;
                                    }
                                    $data .= '  <div class="col-sm-4" style="text-align: center;">
                                                    <label>მინა #'.$glass['glass_id'].' '.$glass['si'].'</label>
                                                    <br>
                                                    <span style="font-size: 13px;font-weight: bold;">შემდეგი პროცესი: '.$next_proc.'</span>
                                                    <input type="tel" min="1" class="glass_pyramids_m" data-id="'.$glass['id'].'">
                                                </div>';
                                }
                            $data .= '</div>
                        </legend>
                    </fieldset>

                    <fieldset class="fieldset">
                        <legend>ათხოდი</legend>
                            <div class="row">';
                                foreach($atxods AS $at){
                                    $data .= '  <div class="col-sm-4" style="text-align: center;">
                                                    <label>ათხოდი: '.$at['si'].'</label>
                                                    <input type="tel" min="1" class="atxod_pyramids_m" data-id="'.$at['id'].'">
                                                </div>';
                                }
                            $data .= '</div>
                        </legend>
                    </fieldset>

                    <input type="hidden" id="path_id" value="'.$path_id.'">

                    ';
    }
    else{
        $glass_id = $_REQUEST['glass_id'];
        $db->setQuery("SELECT groups.name FROM glasses_paths JOIN groups ON groups.id = glasses_paths.path_group_id WHERE glasses_paths.glass_id = '$glass_id' AND glasses_paths.actived = 1 AND glasses_paths.status_id = 1 ORDER BY glasses_paths.sort_n ASC LIMIT 1");
        $next_proc = $db->getResultArray()['result'][0]['name'];
        if($next_proc == ''){
            if($proc_id == 6 || $proc_id == 7){
                $prod_id = $_REQUEST['prod_id'];
                $db->setQuery("SELECT orders.client_name
                                FROM orders
                                JOIN orders_product ON orders_product.id = '$prod_id' AND orders_product.actived = 1
                                WHERE orders.actived = 1");
            }
            else{
                $db->setQuery("SELECT orders.client_name
                                FROM orders
                                JOIN products_glasses ON products_glasses.id = '$glass_id' AND products_glasses.actived = 1
                                WHERE orders.actived = 1");
            }
            
            $order = $db->getResultArray()['result'][0]['client_name'];
            $next_proc = 'დასრულებულია! დამკვეთი: '.$order;
        }
        $data = '   <fieldset class="fieldset">
                    <legend>პირამიდა</legend>
                        <div class="row">
                            <div class="col-sm-12" style="text-align: center;">
                                <label>მიუთითეთ პირამიდის ნომერი</label>
                                <br>
                                <span style="font-size: 13px;font-weight: bold;">შემდეგი პროცესი: '.$next_proc.'</span>
                                <br>
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

function getProcError($proc_id){
    GLOBAL $db;
    if($proc_id == 2){
        $cut_id = $_REQUEST['cut_id'];

        $db->setQuery(" SELECT  lists_to_cut.id,lists_to_cut.glass_id,
                                CONCAT(products_glasses.glass_width,'მმX', products_glasses.glass_height,'მმ') AS si
                        FROM    lists_to_cut
                        JOIN    products_glasses ON products_glasses.id = lists_to_cut.glass_id AND products_glasses.actived = 1
                        WHERE   lists_to_cut.cut_id IN ($cut_id) AND lists_to_cut.actived = 1 AND lists_to_cut.status_id  NOT IN (4,3)");
        $glass_ids = $db->getResultArray()['result'];
    
    
        $db->setQuery(" SELECT  id,
                                CONCAT(width,'მმX', height,'მმ') AS si,
                                width,
                                height
                        FROM    cut_atxod
                        WHERE   actived = 1 AND cut_id = '$cut_id' AND status_id NOT IN (4,3)");
        $atxods = $db->getResultArray()['result'];
    
        $data = '   <fieldset class="fieldset">
                        <legend>აირჩიეთ ხარვეზიანი მინები</legend>
                            <div class="row">';
                                foreach($glass_ids AS $glass){
                                    $data .= '  <div class="col-sm-4" style="text-align: center;">
                                                    <label>მინა #'.$glass['glass_id'].' <b>'.$glass['si'].'</b> <input type="checkbox" class="glass_error" data-id="'.$glass['id'].'"></label>
                                                    <input type="number" min="1" class="glass_pyramids" placeholder="პირამიდის #" data-id="'.$glass['id'].'">
                                                    
                                                </div>';
                                }
                            $data .= '</div>
                        </legend>
                    </fieldset>
    
                    <fieldset class="fieldset">
                            <legend>ათხოდი</legend>
                                <div class="row">';
                                    foreach($atxods AS $at){
                                        $data .= '  <div class="col-sm-4" style="text-align: center;">
                                                        <label>ათხოდი: <b>'.$at['si'].'</b> <input type="checkbox" class="atxod_error" data-id="'.$at['id'].'"></label>
                                                        <input style="margin-bottom: 10px;" type="number" min="1" class="atxod_pyramids" placeholder="პირამიდის #" data-id="'.$at['id'].'">
                                                        <div class="row">
                                                            <div class="col-sm-6"><input style="width:99%;" type="number" class="atxod_width" data-id="'.$at['id'].'" min="1" max="'.$at['width'].'" value="'.$at['width'].'"></div>
                                                            <div class="col-sm-6"><input style="width:99%;" type="number" class="atxod_height" data-id="'.$at['id'].'" min="1" max="'.$at['height'].'" value="'.$at['height'].'"></div>
                                                        </div>
                                                    </div>';
                                    }
                                $data .= '</div>
                            </legend>
                        </fieldset>';
    }
    else if($proc_id == 7 || $proc_id == 6){
        $prod_id = $_REQUEST['prod_id'];

        $word = '';

        if($proc_id == 7){
            $word = 'მინაპაკეტის';
        }
        if($proc_id == 6){
            $word = 'ლამექსის';
        }//es

        $db->setQuery(" SELECT  glasses_paths.id, 
                                products_glasses.id AS glass_id,
                                CONCAT('<b>',products_glasses.glass_width,'</b> X <b>', products_glasses.glass_height,'</b> მმ') AS si


                        FROM    products_glasses
                        JOIN	orders_product ON orders_product.id = products_glasses.order_product_id AND orders_product.actived = 1
                        JOIN	glasses_paths ON glasses_paths.glass_id = products_glasses.id AND glasses_paths.actived = 1 AND glasses_paths.path_group_id = '$proc_id'
                        WHERE   products_glasses.actived = 1 AND products_glasses.order_product_id = '$prod_id' AND products_glasses.status_id NOT IN (4)");
        $glass_ids = $db->getResultArray()['result'];

        $data = '   <fieldset class="fieldset">
                        <legend>აირჩიეთ ხარვეზიანი მინები</legend>
                            <div class="row">
                            <div class="col-sm-12">
                                <label>მთლიანი '.$word.' დახარვეზება <input type="checkbox" class="error_prod" data-id="'.$prod_id.'"></label>
                                <input type="number" min="1" class="prod_pyramids" placeholder="პირამიდის #" data-id="'.$prod_id.'" disabled>
                            </div>
                            ';
                                foreach($glass_ids AS $glass){
                                    $data .= '  <div class="col-sm-4" style="text-align: center;">
                                                    <label>მინა #'.$glass['glass_id'].' <b>'.$glass['si'].'</b> <input type="checkbox" class="glass_error" data-id="'.$glass['id'].'"></label>
                                                    <input type="number" min="1" class="glass_pyramids" placeholder="პირამიდის #" data-id="'.$glass['id'].'">
                                                    
                                                </div>';
                                }
                            $data .= '</div>
                        </legend>
                    </fieldset>';
    }
    return $data;
}

switch ($act){
    case 'change_sizes':
        $glass_id = $_REQUEST['glass_id'];
        $prod_id = $_REQUEST['prod_id'];

        $data = array('page' => change_sizes(getGlass($glass_id), $prod_id));
    break;
    case 'change_sizes_save':
        $glass_id = $_REQUEST['glass_id'];
        $prod_id = $_REQUEST['prod_id'];

        $width = $_REQUEST['width'];
        $height = $_REQUEST['height'];

        $db->setQuery("UPDATE products_glasses SET glass_width='$width', glass_height='$height' WHERE order_product_id = '$prod_id' AND actived = 1");
        $db->execQuery();

    break;
    case 'copy':
        $type = $_REQUEST['type'];
        $ids = $_REQUEST['id'];
        $order_id = $_REQUEST['order_id'];
        if($type == 'glass'){
            $glass_id   = $_REQUEST['id'];
            $qty        = $_REQUEST['qty']-1;


            foreach($glass_id AS $glassID){
                $db->setQuery("SELECT * FROM products_glasses WHERE id = '$glassID'");
                $glass = $db->getResultArray()['result'][0];

                $db->setQuery("SELECT glass_count, product_id FROM orders_product WHERE id = '$glass[order_product_id]' AND actived = 1");
                $prod_data = $db->getResultArray()['result'][0];

                if($prod_data['product_id'] == 2 || $prod_data['product_id'] == 3){
                    $db->setQuery("SELECT COUNT(*) AS cc FROM products_glasses WHERE order_product_id = '$glass[order_product_id]' AND actived = 1 AND status_id != 4");
                    $cc = $db->getResultArray()['result'][0]['cc'];

                    if($cc >= $prod_data['glass_count']){
                        continue;
                    }
                }
    
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
            }

            
        }
        else if($type == 'product'){
            $product_id   = $_REQUEST['id'];
            $qty        = $_REQUEST['qty'] -1;

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
                                                                    lameqs_int = '$product[lameqs_int]',
                                                                    add_info = '$product[add_info]',
                                                                    glass_count = '$product[glass_count]'");
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

        finish_order($order_id);
        break;

    case 'copy_cut':
        $cut_id =$_REQUEST['ids'][0];
        $limit = $_REQUEST['limit'] - 1;
        $matrix = array();
        $glass_arr = array();
        $db->setQuery(" SELECT  products_glasses.id,
                                lists_to_cut.list_id,
                                products_glasses.glass_width,
                                products_glasses.glass_height,
                                products_glasses.glass_option_id,
                                products_glasses.glass_color_id,
                                products_glasses.glass_manuf_id
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
                        glass_manuf_id = '$warehouse[glass_manuf_id]' AND (owner = '$warehouse[owner]' OR bringer = '$warehouse[bringer]')");

        $total = $db->getResultArray()['result'][0]['total'];

        

        //if($total < $limit){
        //    $data['error'] = 'ლისტის კოპირება ვერ მოხერხდა. საწყობში მსგავსი ლისტი გაქვთ '.$total.' ცალი';
        //}
        //else{
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
                                AND products_glasses.glass_option_id = '$glass[glass_option_id]' 
                                AND products_glasses.glass_color_id = '$glass[glass_color_id]' 
                                AND products_glasses.glass_manuf_id = '$glass[glass_manuf_id]' 
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
                    $db->setQuery("UPDATE warehouse SET qty = qty - 1 WHERE id = '$list_id'");
                    $db->execQuery(); 


                    
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
        //}
        
        break;
    case 'change_status_list':
        $ids = $_REQUEST['ids'];

        foreach($ids AS $id){
            $db->setQuery("UPDATE cut_glass SET status_id = 1 WHERE id = '$id' AND status_id NOT IN (3)");
            $db->execQuery();
        }
    break;
    case 'error_glass_proc':
        $cut_id = $_REQUEST['cut_id'];
        $proc_id = $_REQUEST['proc_id'];

        $gpyr = $_REQUEST['gpyr'];
        $apyr = $_REQUEST['apyr'];


        if($proc_id == 2){
            foreach($gpyr AS $gl_er){
                $gl_data = explode('-', $gl_er);
                $pyramid = $gl_data[0];
                $cut_list_id = $gl_data[1];

                $db->setQuery("UPDATE lists_to_cut SET status_id = 4, pyramid = '$pyramid' WHERE id = '$cut_list_id'");
                $db->execQuery();

                $db->setQuery("SELECT glass_id
                                FROM lists_to_cut
                                WHERE id = '$cut_list_id'");
                $glass_id = $db->getResultArray()['result'][0]['glass_id'];

                $db->setQuery("UPDATE products_glasses SET last_pyramid = '$pyramid' WHERE id = '$glass_id'");
                $db->execQuery();
                /* $db->setQuery("UPDATE cut_glass SET status_id = 4 WHERE id = '$cut_id'");
                $db->execQuery(); */
            }

            if(count($gpyr) > 0){
                $db->setQuery("UPDATE lists_to_cut SET status_id = 4, pyramid = '$pyramid' WHERE id = '$cut_list_id'");
                $db->execQuery();


                
            }


            foreach($apyr AS $at_er){
                $at_data = explode('-', $at_er);
                $pyramid = $at_data[0];
                $atxod_id = $at_data[1];
                $new_width = $at_data[2];
                $new_height = $at_data[3];

                $db->setQuery("SELECT cut_id, width, height FROM cut_atxod WHERE id = '$atxod_id'");
                $dims = $db->getResultArray()['result'][0];

                $addUpd = '';

                if($dims['width'] != $new_width || $dims['height'] != $new_height){
                    $addUpd = ", width_new = '$new_width', height_new = '$new_height'";
                }

                $db->setQuery("UPDATE cut_atxod SET status_id = 4, pyramid = '$pyramid' $addUpd WHERE id = '$atxod_id'");
                $db->execQuery();

                $db->setQuery(" SELECT  warehouse.*
                                FROM    cut_glass
                                JOIN    warehouse ON warehouse.id = cut_glass.list_id
                                WHERE   cut_glass.actived = 1 AND cut_glass.id = '$dims[cut_id]'");
                $warehouse = $db->getResultArray()['result'][0];

                if($dims['width'] != $new_width || $dims['height'] != $new_height){
                    $dims['width'] = $new_width;
                    $dims['height'] = $new_height;
                }

                if($pyramid != 0){
                    $db->setQuery(" INSERT INTO warehouse
                                    SET glass_option_id = '$warehouse[glass_option_id]',
                                        glass_type_id = '$warehouse[glass_type_id]',
                                        glass_color_id = '$warehouse[glass_color_id]',
                                        glass_manuf_id = '$warehouse[glass_manuf_id]',
                                        qty = 1,
                                        glass_width = '$dims[width]',
                                        glass_height = $dims[height],
                                        sqr_price = '$warehouse[sqr_price]',
                                        marja = '$warehouse[marja]',
                                        gtype = 2,
                                        owner = '$warehouse[owner]',
                                        bringer = '$warehouse[bringer]',
                                        pyramid = '$pyramid'");
                    $db->execQuery();
                }
                
                //გასაკეთებელია უნდა დაემატოს საწყობს
            }
        }

        if($proc_id == 6 || $proc_id == 7){
            $error_prod_all = $_REQUEST['error_prod_all'];
            $prod_id = $_REQUEST['prod_id'];

            if($error_prod_all == 'true'){
                $pyramid = $_REQUEST['prod_pyramids'];

                $db->setQuery("UPDATE orders_product SET status_id = 4, pyramid='$pyramid' WHERE id = '$prod_id'");
                $db->execQuery();

                $db->setQuery("SELECT GROUP_CONCAT(id) AS ids FROM products_glasses WHERE order_product_id = '$prod_id' AND actived = 1");
                $glass_ids = $db->getResultArray()['result'][0]['ids'];

                $db->setQuery("UPDATE products_glasses SET status_id = 4, last_pyramid='$pyramid' WHERE id IN ($glass_ids)");
                $db->execQuery();

                $db->setQuery("UPDATE glasses_paths SET status_id = 4, pyramid='$pyramid' WHERE glass_id IN ($glass_ids) AND path_group_id = '$proc_id'");
                $db->execQuery();
            }
            else{
                foreach($gpyr AS $gl_er){
                    $gl_data = explode('-', $gl_er);
                    $pyramid = $gl_data[0];
                    $path_id = $gl_data[1];
    
                    $db->setQuery("UPDATE glasses_paths SET status_id = 4, pyramid = '$pyramid' WHERE id = '$path_id'");
                    $db->execQuery();
    
                    $db->setQuery("SELECT glass_id
                                    FROM glasses_paths
                                    WHERE id = '$path_id'");
                    $glass_id = $db->getResultArray()['result'][0]['glass_id'];
    
                    $db->setQuery("UPDATE products_glasses SET status_id = 4, last_pyramid = '$pyramid' WHERE id = '$glass_id'");
                    $db->execQuery();
                    /* $db->setQuery("UPDATE cut_glass SET status_id = 4 WHERE id = '$cut_id'");
                    $db->execQuery(); */
                }
            }


            
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
            
            $db->setQuery("SELECT list_id,status_id FROM cut_glass WHERE id = '$id'");
            $cut_glass = $db->getResultArray()['result'][0];

            if($cut_glass['status_id'] == 1){
                $db->setQuery("UPDATE cut_glass SET actived = 0 WHERE id = '$id' AND status_id = 1");
                $db->execQuery();

                $db->setQuery("UPDATE warehouse SET qty = qty + 1 WHERE id = '$cut_glass[list_id]'");
                $db->execQuery();   
    
            }

            
        }
        break;
    case 'check_glass_status':
        $glass_width = $_REQUEST['glass_width'];
        $glass_height = $_REQUEST['glass_height'];
        $glass_option_id = $_REQUEST['glass_option_id'];
        $glass_type_id = $_REQUEST['glass_type_id'];
        $glass_color_id = $_REQUEST['glass_color_id'];
        $glass_manuf_id = $_REQUEST['glass_manuf_id'];
        $not_standard = $_REQUEST['not_standard'];
        $where = '';
        $ids = implode(',',$_REQUEST['ids']);
        if($ids != ''){
            $where .= " AND products_glasses.id NOT IN ($ids)";
        }
        $db->setQuery(" SELECT products_glasses.*,CONCAT(glass_options.name, '(',glass_manuf.name,')') AS name,
                                CONCAT(products_glasses.glass_width, 'მმ X ', products_glasses.glass_height,'მმ') AS sizes,
                                glass_colors.name AS color,
                                orders.client_name
                        FROM    products_glasses 
                        JOIN    glass_options ON glass_options.id = products_glasses.glass_option_id
                        JOIN    glass_type ON glass_type.id = products_glasses.glass_type_id
                        JOIN    glass_colors ON glass_colors.id = products_glasses.glass_color_id
                        JOIN    glass_status ON glass_status.id = products_glasses.status_id
                        JOIN    glass_manuf ON glass_manuf.id = products_glasses.glass_manuf_id
                        JOIN    orders ON orders.id = products_glasses.order_id AND orders.actived = 1
                        JOIN    orders_product ON orders_product.id = products_glasses.order_product_id AND orders_product.actived = 1
                        WHERE   products_glasses.glass_width = '$glass_width' 
                        AND     products_glasses.glass_height = '$glass_height' 
                        AND     products_glasses.glass_option_id = '$glass_option_id' 
                        AND     products_glasses.glass_color_id = '$glass_color_id' 
                        AND     products_glasses.glass_manuf_id = '$glass_manuf_id'
                        AND     products_glasses.not_standard = '$not_standard'
                        AND     products_glasses.status_id = 1
                        AND     products_glasses.actived = 1
                        AND     products_glasses.go_to_cut = 1
                        AND     products_glasses.id NOT IN (SELECT glass_id FROM lists_to_cut WHERE actived = 1)
                        $where
                        LIMIT   1");
        $data = $db->getResultArray()['result'][0];

        
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

            $db->setQuery("UPDATE warehouse SET qty = qty-1 WHERE id = '$list_id'");
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
        $proc_id = $_REQUEST['proc_id'];

        if($proc_id == 5 AND !in_array($user_gr, array(15,13,12,5,1))){
            $data['error'] = 'თქვენ არ გაქვთ წრთობის დასრულების უფლება';
        }
        else{
            $data = array('page' => getProcFinish($path_id, $glass_id, $proc_id));
        }

        

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
        $proc_id = $_REQUEST['proc_id'];
        $path_id = $_REQUEST['path_id'];
        $glass_id = $_REQUEST['glass_id'];
        $pyramid = $_REQUEST['pyramid'];
        if($proc_id == 2){
            $gpyr = $_REQUEST['gpyr'];
            $apyr = $_REQUEST['apyr'];
            $cut_id = $_REQUEST['cut_id'];

            foreach($gpyr AS $gl){
                $pyr_data = explode('-', $gl);

                $db->setQuery("UPDATE lists_to_cut SET pyramid = '$pyr_data[0]', status_id = 3, finish_datetime = NOW() WHERE id = '$pyr_data[1]'");
                $db->execQuery();

                $db->setQuery("SELECT glass_id
                                FROM lists_to_cut
                                WHERE id = '$pyr_data[1]'");
                $glass_id = $db->getResultArray()['result'][0]['glass_id'];

                $db->setQuery("UPDATE products_glasses SET last_pyramid = '$pyr_data[0]' WHERE id = '$glass_id'");
                $db->execQuery();

                
            }

            foreach($apyr AS $at){
                $pyr_data = explode('-', $at);

                $db->setQuery("UPDATE cut_atxod SET pyramid = '$pyr_data[0]', status_id = 3 WHERE id = '$pyr_data[1]'");
                $db->execQuery();



                $db->setQuery("SELECT cut_id, width, height FROM cut_atxod WHERE id = '$pyr_data[1]'");
                $dims = $db->getResultArray()['result'][0];

                $db->setQuery(" SELECT  warehouse.*
                                FROM    cut_glass
                                JOIN    warehouse ON warehouse.id = cut_glass.list_id
                                WHERE   cut_glass.actived = 1 AND cut_glass.id = '$dims[cut_id]'");
                $warehouse = $db->getResultArray()['result'][0];

                if($pyr_data[0] != 0){
                    $db->setQuery(" INSERT INTO warehouse
                                    SET glass_option_id = '$warehouse[glass_option_id]',
                                        glass_type_id = '$warehouse[glass_type_id]',
                                        glass_color_id = '$warehouse[glass_color_id]',
                                        glass_manuf_id = '$warehouse[glass_manuf_id]',
                                        qty = 1,
                                        glass_width = '$dims[width]',
                                        glass_height = $dims[height],
                                        sqr_price = '$warehouse[sqr_price]',
                                        marja = '$warehouse[marja]',
                                        gtype = 2,
                                        owner = '$warehouse[owner]',
                                        bringer = '$warehouse[bringer]',
                                        pyramid = '$pyr_data[0]'");
                    $db->execQuery();
                }
                //TODO აქედან უნდა ჩაემატოს საწყობსაც ათხოდი
            }

            $db->setQuery("UPDATE cut_glass SET status_id = 3, finish_datetime = NOW() WHERE id = '$cut_id'");
            $db->execQuery();
        }
        else if($proc_id == 6 || $proc_id == 7){
            $prod_id = $_REQUEST['prod_id'];

            $db->setQuery("UPDATE orders_product SET status_id = 3, finish_datetime = NOW(), pyramid='$pyramid' WHERE id = '$prod_id'");
            $db->execQuery();

            $db->setQuery(" SELECT  GROUP_CONCAT(DISTINCT glasses_paths.id) AS path_ids,
                                    GROUP_CONCAT(DISTINCT products_glasses.id) AS glass_ids
                            FROM    products_glasses
                            JOIN 	glasses_paths ON glasses_paths.glass_id = products_glasses.id AND glasses_paths.path_group_id = '$proc_id'
                            WHERE   products_glasses.actived = 1 AND glasses_paths.actived = 1 AND order_product_id = '$prod_id'");
            $result = $db->getResultArray()['result'][0];

            $path_ids = $result['path_ids'];
            $glass_ids = $result['glass_ids'];

            $db->setQuery("UPDATE glasses_paths SET pyramid = '$pyramid', user_id = '$user_id', status_id = 3, finish_datetime = NOW() WHERE id IN($path_ids)");
            $db->execQuery();

            $db->setQuery("UPDATE products_glasses SET status_id = 3, last_pyramid='$pyramid' WHERE id IN ($glass_ids)");
            $db->execQuery();

            $db->setQuery(" SELECT  order_id
                            FROM    orders_product
                            WHERE   orders_product.id = '$prod_id'");
            $order_id = $db->getResultArray()['result'][0]['order_id'];

            $db->setQuery(" SELECT  COUNT(*) AS cc
                            FROM    orders_product
                            WHERE   order_id = '$order_id' AND orders_product.actived = 1 AND status_id NOT IN (3,4,6)");

            $countNotCompleted = $db->getResultArray()['result'][0]['cc'];
            if($countNotCompleted == 0){
                $db->setQuery(" UPDATE  orders 
                                SET     status_id = 4
                                WHERE   id = '$order_id'");
                $db->execQuery();
            }
        }
        else{
            $db->setQuery("UPDATE glasses_paths SET pyramid = '$pyramid', user_id = '$user_id', status_id = 3, finish_datetime = NOW() WHERE id = '$path_id'");
            $db->execQuery();

            $db->setQuery("UPDATE products_glasses SET last_pyramid = '$pyramid' WHERE id = '$glass_id'");
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
                                WHERE   order_id = '$order_id' AND products_glasses.actived = 1 AND status_id NOT IN (3,4,6)");
                
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
        $proc_id = $_REQUEST['proc_id'];
        $path_id = $_REQUEST['path_id'];
        $glass_id = $_REQUEST['glass_id'];
        $pyramid = $_REQUEST['pyramid'];

        if($proc_id == 2){
            $cut_id = $_REQUEST['cut_id'];

            if($glass_rate == 1 || $glass_rate == 0){
                $data = array('page' => getProcError($proc_id));
            }
            else{
                $db->setQuery("SELECT COUNT(*) AS cc FROM cut_glass WHERE actived = 1 AND status_id = 1 AND id = '$cut_id'");
                $isStarted = $db->getResultArray()['result'][0]['cc'];
                if($isStarted > 0){
                    $db->setQuery("SELECT   COUNT(*) AS cc
                                    FROM cut_glass 
                                    WHERE status_id = 2 AND actived = 1");

                    $cc = $db->getResultArray()['result'][0]['cc'];

                    if($cc >= 2){
                        $data['error'] = 'თქვენ არ გაქვთ 2-ზე მეტი ჭრის დაწყების უფლება';
                    }
                    else{
                        $db->setQuery("UPDATE cut_glass SET status_id = 2 WHERE id = '$cut_id' AND actived = 1");
                        $db->execQuery();

                        $db->setQuery("UPDATE lists_to_cut SET status_id = 2 WHERE cut_id = '$cut_id' AND actived = 1 AND status_id != 4");
                        $db->execQuery();

                        $db->setQuery(" SELECT  GROUP_CONCAT(DISTINCT glass_id) AS glass_id
                                        FROM    lists_to_cut
                                        WHERE   cut_id IN ($cut_id) AND actived = 1");
                        $glass_ids = $db->getResultArray()['result'][0]['glass_id'];


                        $db->setQuery("UPDATE products_glasses SET status_id = 2 WHERE id IN ($glass_ids) AND status_id != 4");
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
                    $data['error'] = 'ლისტზე მუშაობა უკვე დაწყებულია სხვის მიერ';
                }
                

                
            }
            
        }
        else if($proc_id == 6 || $proc_id == 7){
            $prod_id = $_REQUEST['prod_id'];
            $path_id = $_REQUEST['path_id'];
            if($glass_rate == 1 || $glass_rate == 0){
                $data = array('page' => getProcError($proc_id));

                /* $db->setQuery(" SELECT  GROUP_CONCAT(DISTINCT glasses_paths.id) AS path_ids,
                                        GROUP_CONCAT(DISTINCT products_glasses.id) AS glass_ids
                                FROM    products_glasses
                                JOIN 	glasses_paths ON glasses_paths.glass_id = products_glasses.id AND glasses_paths.path_group_id = '$proc_id'
                                WHERE   products_glasses.actived = 1 AND glasses_paths.actived = 1 AND order_product_id = '$prod_id'");
                $result = $db->getResultArray()['result'][0];

                $path_ids = $result['path_ids'];
                $glass_ids = $result['glass_ids'];

                $db->setQuery("UPDATE orders_product SET status_id = 4 WHERE id = $prod_id");
                $db->execQuery();

                $db->setQuery("UPDATE products_glasses SET status_id = 4 WHERE id IN ($glass_ids)");
                $db->execQuery();

                $db->setQuery("UPDATE glasses_paths SET glass_rate = '$glass_rate', user_id = '$user_id', status_id = 4, pyramid = '$pyramid' WHERE id IN ($path_ids)");
                $db->execQuery(); */
    
                
            }
            else{
                $db->setQuery("SELECT COUNT(*) AS cc FROM orders_product WHERE actived = 1 AND status_id = 1 AND id = '$prod_id'");
                $isStarted = $db->getResultArray()['result'][0]['cc'];
                if($isStarted > 0){
                    $db->setQuery("UPDATE orders_product SET status_id = 2 WHERE id = '$prod_id' AND actived = 1");
                    $db->execQuery();

                    $db->setQuery("UPDATE products_glasses SET status_id = 2 WHERE order_product_id = $prod_id AND actived = 1");
                    $db->execQuery();


                    $db->setQuery(" SELECT  GROUP_CONCAT(DISTINCT glasses_paths.id) AS path_ids,
                                            GROUP_CONCAT(DISTINCT products_glasses.id) AS glass_ids
                                    FROM    products_glasses
                                    JOIN 	glasses_paths ON glasses_paths.glass_id = products_glasses.id AND glasses_paths.path_group_id = '$proc_id'
                                    WHERE   products_glasses.actived = 1 AND glasses_paths.actived = 1 AND order_product_id = '$prod_id'");
                    $result = $db->getResultArray()['result'][0];

                    $path_ids = $result['path_ids'];
                    $glass_ids = $result['glass_ids'];

                    $db->setQuery("UPDATE glasses_paths SET status_id = 2 WHERE id IN($path_ids)");
                    $db->execQuery();


                    $db->setQuery(" UPDATE orders 
                                    JOIN products_glasses ON products_glasses.id IN($glass_ids)

                                    JOIN orders_product ON orders_product.id = products_glasses.order_product_id
                                    SET orders.status_id = 2
                                    
                                    WHERE orders.id = orders_product.order_id");
                    $db->execQuery();

                    
                }
                else{
                    $data['error'] = 'პროცესი უკვე დაწყებულია სხვის მიერ';
                }
            }

        }
        else{
            if($glass_rate == 1 || $glass_rate == 0){
                $db->setQuery("UPDATE glasses_paths SET glass_rate = '$glass_rate', user_id = '$user_id', status_id = 4, pyramid = '$pyramid' WHERE id = '$path_id'");
                $db->execQuery();
    
                $db->setQuery("UPDATE products_glasses SET last_pyramid = '$pyramid', status_id = 4 WHERE id = '$glass_id'");
                $db->execQuery();
            }
            else{
                
                $db->setQuery("SELECT COUNT(*) AS cc FROM glasses_paths WHERE actived = 1 AND id = '$path_id' AND status_id = 1");
                $isStarted = $db->getResultArray()['result'][0]['cc'];
                if($isStarted > 0){
                    
                    if($proc_id == 5 AND !in_array($user_gr, array(14,13,12,5,1))){
                        $data['error'] = 'თქვენ არ გაქვთ წრთობის დაწყების უფლება';
                    }
                    
                    else{
                        if($proc_id == 3){
                            $db->setQuery(" SELECT   COUNT(*) AS cc
                                            FROM glasses_paths 
                                            WHERE status_id = 2 AND actived = 1 AND path_group_id = 3");
    
                            $cc = $db->getResultArray()['result'][0]['cc'];
    
                            if($cc >= 10){
                                $data['error'] = 'თქვენ არ გაქვთ 10-ზე მეტი კრონკის დაწყების უფლება';
                                echo json_encode($data);
                                return;
                            }
                        }
                        else if($proc_id == 4){
                            $db->setQuery(" SELECT   COUNT(*) AS cc
                                            FROM glasses_paths 
                                            WHERE status_id = 2 AND actived = 1 AND path_group_id = 4");
    
                            $cc = $db->getResultArray()['result'][0]['cc'];
                            
                            if($cc >= 3){
                                $data['error'] = 'თქვენ არ გაქვთ 3-ზე მეტი კრონკის დაწყების უფლება';
                                echo json_encode($data);
                                return;
                            }
                        }
                        else if($proc_id == 5){
                            $db->setQuery(" SELECT   COUNT(*) AS cc
                                            FROM glasses_paths 
                                            WHERE status_id = 2 AND actived = 1 AND path_group_id = 5");
    
                            $cc = $db->getResultArray()['result'][0]['cc'];
                            
                            if($cc >= 30){
                                $data['error'] = 'თქვენ არ გაქვთ 30-ზე მეტი კრონკის დაწყების უფლება';
                                echo json_encode($data);
                                return;
                            }
                        }
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
                else{
                    $data['error'] = 'მინაზე მუშაობა უკვე დაწყებულია სხვის მიერ';
                }
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

        $glass_id = $_REQUEST['glass_id'];
        $width = $_REQUEST['width'];
        $height = $_REQUEST['height'];
        $price_total = 0;

        $db->setQuery("SELECT COUNT(*) AS cc
                        FROM glasses_paths
                        WHERE actived = 1 AND glass_id = '$glass_id' AND path_group_id = '$proc_id'");
        $cc = $db->getResultArray()['result'][0]['cc'];

        if($cc > 0){
            $data['error'] = 'ამ მინაზე ეგ პროცესი უკვე დამატებულია!!!';
        }
        else{
            if($proc_id == 4){
                $data = array('page' => getPricePage($proc_id));
            }
            else{
    
                $db->setQuery("SELECT default_price
                                FROM groups
                                WHERE id = '$proc_id'");
                $price = $db->getResultArray()['result'][0]['default_price'];
    
                if($proc_id == 3){
                    $price_total = (($width/1000) + ($height/1000))*2*$price;
                    
                }
                if($proc_id == 5){
                    $price_total = (($width/1000) * ($height/1000))*$price;
                }
                if($proc_id == 2){
                    $price_total = (($width/1000) * ($height/1000))*$price;
                }
    
                if($proc_id == 6 || $proc_id == 7){
                    $db->setQuery(" SELECT MAX(glass_height * glass_width) AS m_kv
                                    FROM `products_glasses`
                                    
                                    WHERE actived = 1 AND order_product_id = (SELECT order_product_id FROM products_glasses WHERE id = '$glass_id' AND actived = 1)");
                    $max_kv = $db->getResultArray()['result'][0]['m_kv']/1000000;
    
    
                    $db->setQuery(" SELECT COUNT(*) AS cc
                                    FROM `products_glasses`
                                    
                                    WHERE actived = 1 AND order_product_id = (SELECT order_product_id FROM products_glasses WHERE id = '$glass_id' AND actived = 1)");
                    $cc = $db->getResultArray()['result'][0]['cc'];
                    
                    $price_total = $max_kv * $price * $cc;
    
                }
    
                $db->setQuery(" SELECT  MAX(sort_n) AS max_sort
                                FROM    glasses_paths
                                WHERE   actived = 1 AND glass_id = '$glass_id'");
                $sort_n = $db->getResultArray()['result'][0]['max_sort']+1;
                $db->setQuery("INSERT INTO glasses_paths SET
                                                    datetime=NOW(),
                                                    glass_id='$glass_id',
                                                    path_group_id='$proc_id',
                                                    status_id=1,
                                                    price = '$price_total',
                                                    sort_n = '$sort_n'");
    
                $db->execQuery();
                
                
            }
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
        $datetime_finish     = $_REQUEST['datetime_finish'];
        $pay_total      = $_REQUEST['pay_total'] == '' ? 0 : $_REQUEST['pay_total'];
        $avansi         = $_REQUEST['avansi'] == '' ? 0 : $_REQUEST['avansi'];
        $avans_plus     = $_REQUEST['avans_plus'] == '' ? 0 : $_REQUEST['avans_plus'];

        $resp_user     = $_REQUEST['resp_user'];

        $db->setQuery(" SELECT  COUNT(*) AS cc
                        FROM    orders
                        WHERE   id = '$id' AND actived = 1");
        $isset = $db->getResultArray();

        if($isset['result'][0]['cc'] == 0){
            $db->setQuery("INSERT INTO orders SET
                                                id = '$id',
                                                user_id='$resp_user',
                                                datetime='$order_date',
                                                datetime_finish='$datetime_finish',
                                                client_name='$client_name',
                                                client_addr='$client_addr',
                                                client_phone='$client_phone',
                                                client_pid='$client_pid',
                                                total='$pay_total',
                                                avansi='$avansi',
                                                avans_plus='$avans_plus'");

            $db->execQuery();
            
        }

        else{
            $db->setQuery("UPDATE orders SET user_id='$resp_user',
                                                datetime='$order_date',
                                                datetime_finish='$datetime_finish',
                                                client_name='$client_name',
                                                client_addr='$client_addr',
                                                client_pid='$client_pid',
                                                client_phone='$client_phone',
                                                total='$pay_total',
                                                avansi='$avansi',
                                                avans_plus='$avans_plus'
                            WHERE id='$id'");
            $db->execQuery();
            
        }

    break;

    case 'save_product':

        $id          = $_REQUEST['id'];
        $selected_product_id  = $_REQUEST['selected_product_id'];
        $order_id    = $_REQUEST['order_id'];

        $butil_size     = intval($_REQUEST['butil_size']);
        $firi_lameks    = $_REQUEST['firi_lameks'];
        $glass_count    = $_REQUEST['glass_count'];
        $add_info    = $_REQUEST['add_info'];
        


        $db->setQuery(" SELECT  COUNT(*) AS cc
                        FROM    products_glasses
                        WHERE   actived = 1 AND order_product_id = '$id'");

        $cc = $db->getResultArray()['result'][0]['cc'];

        if($cc <= 1 && in_array($selected_product_id, array(2,3))){
            $data['error'] = 'მინაპაკეტის/ლამექსის შესანახად აუცილებელია მინიმუმ 2 მინა';
        }
        else{
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
                                                lameqs_int = '$firi_lameks',
                                                glass_count = '$glass_count',
                                                add_info = '$add_info'");

                $db->execQuery();
                //
            }

            else{
                $db->setQuery("UPDATE orders_product SET user_id='$user_id',
                                                order_id='$order_id',
                                                product_id='$selected_product_id',
                                                butili = '$butil_size',
                                                lameqs_int = '$firi_lameks',
                                                glass_count = '$glass_count',
                                                add_info = '$add_info'
                            WHERE id='$id'");
                $db->execQuery();
                //
            }

            finish_order($order_id);
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
        $stand_glass    = $_REQUEST['stand_glass'];

        $go_to_cut    = $_REQUEST['go_to_cut'];
        if($go_to_cut == 'true'){
            $go_to_cut = 1;
        }
        else{
            $go_to_cut = 0;
        }


        if($stand_glass == 'true'){
            $stand_glass = 1;
        }
        else{
            $stand_glass = 0;
        }
        $order_id      = $_REQUEST['order_id'];

        $db->setQuery(" SELECT  COUNT(*) AS cc
                        FROM    products_glasses
                        WHERE   id = '$id' AND actived = 1");
        $isset = $db->getResultArray();

        $db->setQuery("SELECT glass_count, product_id FROM orders_product WHERE id = '$product_id' AND actived = 1");
        $prod_data = $db->getResultArray()['result'][0];

        if($prod_data['product_id'] == 3){
            $db->setQuery("SELECT COUNT(*) AS cc
                            FROM glasses_paths
                            WHERE glass_id = '$id' AND actived = 1 AND path_group_id = 6");
            $cc = $db->getResultArray()['result'][0]['cc'];

            if($cc == 0){
                $data['error'] = 'გთხოვთ დაამატოთ ლამექსის პროცესი';
                echo json_encode($data);
                return;
            }
        }

        if($prod_data['product_id'] == 2){
            $db->setQuery("SELECT COUNT(*) AS cc
                            FROM glasses_paths
                            WHERE glass_id = '$id' AND actived = 1 AND path_group_id = 7");
            $cc = $db->getResultArray()['result'][0]['cc'];

            if($cc == 0){
                $db->setQuery("SELECT default_price
                                FROM groups
                                WHERE id = '7'");
                $price = $db->getResultArray()['result'][0]['default_price'];

                $db->setQuery(" SELECT MAX(glass_height * glass_width) AS m_kv
                                FROM `products_glasses`
                                
                                WHERE actived = 1 AND order_product_id = (SELECT order_product_id FROM products_glasses WHERE id = '$id' AND actived = 1)");
                $max_kv = $db->getResultArray()['result'][0]['m_kv']/1000000;


                $db->setQuery(" SELECT COUNT(*) AS cc
                                FROM `products_glasses`
                                
                                WHERE actived = 1 AND order_product_id = (SELECT order_product_id FROM products_glasses WHERE id = '$id' AND actived = 1)");
                $cc = $db->getResultArray()['result'][0]['cc'];
                
                $price_total = $max_kv * $price * $cc;
    
                
    
                $db->setQuery(" SELECT  MAX(sort_n) AS max_sort
                                FROM    glasses_paths
                                WHERE   actived = 1 AND glass_id = '$id'");
                $sort_n = $db->getResultArray()['result'][0]['max_sort']+1;
                $db->setQuery("INSERT INTO glasses_paths SET
                                                    datetime=NOW(),
                                                    glass_id='$id',
                                                    path_group_id='7',
                                                    status_id=1,
                                                    price = '$price_total',
                                                    sort_n = '$sort_n'");
    
                $db->execQuery();
            }
        }



        if($isset['result'][0]['cc'] == 0){
            

            if($prod_data['product_id'] == 2 || $prod_data['product_id'] == 3){
                $db->setQuery("SELECT COUNT(*) AS cc FROM products_glasses WHERE order_product_id = '$product_id' AND actived = 1 AND status_id != 4");
                $cc = $db->getResultArray()['result'][0]['cc'];

                if($cc >= $prod_data['glass_count']){
                    $data['error'] = 'ამ პროდუქტში შეგიძლიათ დაამატოთ მაქსიმუმ '.$prod_data['glass_count'].' მინა';
                    echo json_encode($data);
                    return;
                }

                
            }

            
            
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
                                                not_standard = '$stand_glass',
                                                status_id='1',
                                                go_to_cut='$go_to_cut',
                                                order_id = '$order_id'");

            $db->execQuery();
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
                                                not_standard = '$stand_glass',
                                                status_id='$glass_status',
                                                go_to_cut='$go_to_cut',
                                                order_id = '$order_id'
                            WHERE id='$id'");
            $db->execQuery();

            

            
        }

        finish_order($order_id);

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
                                                datetime=NOW(),
                                                glass_id='$glass_id',
                                                path_group_id='$path_group_id',
                                                status_id='$path_status',
                                                price = '$price',
                                                cuts = '$cuts',
                                                holes = '$holes',
                                                sort_n = '$sort_n'");

            $db->execQuery();
            //
        }

        else{
            $width = $_REQUEST['width'];
            $height = $_REQUEST['height'];
            $proc_id = $_REQUEST['path_group_id'];
            $price_total = 0;

            if($proc_id == 3){
                $price_total = (($width/1000) + ($height/1000))*2*$price;
                
            }
            if($proc_id == 5){
                $price_total = (($width/1000) * ($height/1000))*$price;
            }
            if($proc_id == 2){
                $price_total = (($width/1000) * ($height/1000))*$price;
            }
            if($proc_id == 4){
                //$price_total = (($width/1000) * ($height/1000))*$price;
                $price_total = ($holes * 1) + ($cuts * 3);
            }

            if($proc_id == 6 || $proc_id == 7){
                $db->setQuery(" SELECT MAX(glass_height * glass_width) AS m_kv
                                FROM `products_glasses`
                                
                                WHERE actived = 1 AND order_product_id = (SELECT order_product_id FROM products_glasses WHERE id = '$glass_id' AND actived = 1)");
                $max_kv = $db->getResultArray()['result'][0]['m_kv']/1000000;


                $db->setQuery(" SELECT COUNT(*) AS cc
                                FROM `products_glasses`
                                
                                WHERE actived = 1 AND order_product_id = (SELECT order_product_id FROM products_glasses WHERE id = '$glass_id' AND actived = 1)");
                $cc = $db->getResultArray()['result'][0]['cc'];
                
                $price_total = $max_kv * $price * $cc;

            }

            $db->setQuery("UPDATE glasses_paths SET 
                                                glass_id='$glass_id',
                                                path_group_id='$path_group_id',
                                                status_id='$path_status',
                                                price = '$price_total',
                                                cuts = '$cuts',
                                                holes = '$holes'
                            WHERE id='$id'");
            $db->execQuery();
            //
        }

    break;

    case 'disable':

        $ids = $_REQUEST['id'];
        $type = $_REQUEST['type'];
        $order_id = intval($_REQUEST['order_id']);
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

            finish_order($order_id);
        }

        else if($type == 'glass'){
            
            foreach($ids AS $id){
                $db->setQuery("UPDATE products_glasses SET actived = 0 WHERE id = '$id'");
                $db->execQuery();
    
            }

            finish_order($order_id);

        }
        else if($type == 'path'){
            //$ids = explode(',',$ids);




            foreach($ids AS $id){
                $db->setQuery("UPDATE glasses_paths SET actived = 0 WHERE id = '$id' AND status_id = 1");
                $db->execQuery();

                $db->setQuery("SELECT glass_id
                                FROM glasses_paths
                                WHERE id = '$id'");
                $gl_id = $db->getResultArray()['result'][0]['glass_id'];

                $db->setQuery("SELECT id
                                FROM glasses_paths
                                WHERE actived = 1 AND glass_id = '$gl_id'
                                ORDER BY sort_n ASC");

                $upd_sort = $db->getResultArray()['result'];
                $i = 1;
                foreach($upd_sort AS $sort){
                    $db->setQuery("UPDATE glasses_paths SET sort_n = '$i' WHERE id = '$sort[id]'");
                    $db->execQuery();
                    $i++;
                }
    
            }
        }
        

    break;
    case 'get_client':
        $id = $_REQUEST['id'];


        $db->setQuery("SELECT * FROM clients WHERE id = '$id'");

        $data =  $db->getResultArray()['result'][0];
        break;
    case 'get_clients':

        $glass_option = $_REQUEST['glass_option'];

        if($glass_option == 0){
            $where = '';
        }
        else{
            $where = " AND products_glasses.glass_option_id = '$glass_option'";
        }

        $db->setQuery(" SELECT  GROUP_CONCAT(DISTINCT orders.id) AS id, orders.client_name AS 'name'
                        FROM    products_glasses
                        JOIN    orders ON orders.id = products_glasses.order_id
                        WHERE   products_glasses.actived = 1 $where

                        GROUP BY client_name");
        $cats = $db->getResultArray();
        $data['opts'] = '';
        //$data .= '<option value="">აირჩიეთ</option>';
        foreach($cats['result'] AS $cat){
            if($cat[id] == $id){
                $data['opts'] .= '<option value="'.$cat[id].'" selected="selected">'.$cat[name].'</option>';
            }
            else{
                $data['opts'] .= '<option value="'.$cat[id].'">'.$cat[name].'</option>';
            }
        }
        
    
        break;
    case 'get_columns':
        $url = explode('?',$_SERVER["HTTP_REFERER"]);
        $url = explode('&', $url[1]);
        $hidefiri = false;
        $hidebutil = false;
        $cexis_ufrosi = false;
        if($url[0] == 'page=processes' AND $url[1] == 'id=7'){
            $hidefiri = true;
        }
        if($url[0] == 'page=processes' AND $url[1] == 'id=6'){
            $hidebutil = true;
        }

        if($url[0] == 'page=orders' AND $_SESSION['GRPID'] == 11){

            $cexis_ufrosi = true;
        }

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
                    $hid_array = array("id2","write_date","impuls_qty","glass_option_id","glass_type_id","glass_color_id","glass_manuf_id","name_product_22","type_22","color_22","proccess2_22","cut_list_22","infooo");
					if($columns[$j] == "inc_status"){

						$g = array('field'=>$columns[$j],'encoded'=>false,'title'=>$columnNames[0][$a],'filterable'=>array('multi'=>true,'search' => true, 'cell' => array('operator'=>'contains','suggestionOperator'=>'contains')), 'width' => 153);

					}elseif($columns[$j] == "audio_file"){

						$g = array('field'=>$columns[$j],'encoded'=>false,'title'=>$columnNames[0][$a],'filterable'=>array('multi'=>true,'search' => true, 'cell' => array('operator'=>'contains','suggestionOperator'=>'contains')), 'width' => 150);

					}elseif($columns[$j] == "action_given"){

						$g = array('field'=>$columns[$j],'encoded'=>false,'title'=>$columnNames[0][$a],'filterable'=>array('multi'=>true,'search' => true, 'cell' => array('operator'=>'contains','suggestionOperator'=>'contains')), 'width' => '5%');

					}elseif(in_array($columns[$j], $hid_array)){

						$g = array('field'=>$columns[$j], 'hidden' => true,'encoded'=>false,'title'=>$columnNames[0][$a],'filterable'=>array('multi'=>true,'search' => true, 'cell' => array('operator'=>'contains','suggestionOperator'=>'contains')), 'width' => 100);

					}
                    elseif($columns[$j] == "inc_date"){

						$g = array('field'=>$columns[$j],'encoded'=>false,'title'=>$columnNames[0][$a],'filterable'=>array('multi'=>true,'search' => true, 'cell' => array('operator'=>'contains','suggestionOperator'=>'contains')), 'width' => 130);

					}
                    elseif($columns[$j] == "glass_count"){

						$g = array('field'=>$columns[$j],'encoded'=>false,'title'=>$columnNames[0][$a],'filterable'=>array('multi'=>true,'search' => true, 'cell' => array('operator'=>'contains','suggestionOperator'=>'contains')), 'width' => 600);

					}
                    elseif($columns[$j] == "name_product"){

						$g = array('field'=>$columns[$j],'encoded'=>false,'title'=>$columnNames[0][$a],'filterable'=>array('multi'=>true,'search' => true, 'cell' => array('operator'=>'contains','suggestionOperator'=>'contains')), 'width' => 130);

					}
                    elseif($columns[$j] == "act_product"){
                        $g = array('field'=>$columns[$j],'encoded'=>false,'title'=>$columnNames[0][$a],'filterable'=>array('multi'=>true,'search' => true, 'cell' => array('operator'=>'contains','suggestionOperator'=>'contains')), 'width' => 130);
                    }
                    elseif($columns[$j] == "sort_n"){

						$g = array('field'=>$columns[$j],'encoded'=>false,'title'=>$columnNames[0][$a],'filterable'=>array('multi'=>true,'search' => true, 'cell' => array('operator'=>'contains','suggestionOperator'=>'contains')), 'width' => 70);

					}
                    elseif($columns[$j] == "picture_prod"){
                        $g = array('field'=>$columns[$j],'encoded'=>false,'title'=>$columnNames[0][$a],'filterable'=>array('multi'=>true,'search' => true, 'cell' => array('operator'=>'contains','suggestionOperator'=>'contains')), 'width' => 100);
                    }
                    elseif($columns[$j] == "stat_path_or"){
                        $g = array('field'=>$columns[$j],'encoded'=>false,'title'=>$columnNames[0][$a],'filterable'=>array('multi'=>true,'search' => true, 'cell' => array('operator'=>'contains','suggestionOperator'=>'contains')), 'width' => 230);
                    }
                    elseif($columns[$j] == "proccess2"){

						$g = array('field'=>$columns[$j],'encoded'=>false,'title'=>$columnNames[0][$a],'filterable'=>array('multi'=>true,'search' => true, 'cell' => array('operator'=>'contains','suggestionOperator'=>'contains')), 'width' => 300);

					}
                    elseif($columns[$j] == "list"){

						$g = array('field'=>$columns[$j],'encoded'=>false,'title'=>$columnNames[0][$a],'filterable'=>array('multi'=>true,'search' => true, 'cell' => array('operator'=>'contains','suggestionOperator'=>'contains')), 'width' => 150);

					}
                    elseif($columns[$j] == "orderer2"){

						$g = array('field'=>$columns[$j],'encoded'=>false,'title'=>$columnNames[0][$a],'filterable'=>array('multi'=>true,'search' => true, 'cell' => array('operator'=>'contains','suggestionOperator'=>'contains')), 'width' => 80);

					}
                    elseif($columns[$j] == "product_glasses"){

						$g = array('field'=>$columns[$j],'encoded'=>false,'title'=>$columnNames[0][$a],'filterable'=>array('multi'=>true,'search' => true, 'cell' => array('operator'=>'contains','suggestionOperator'=>'contains')), 'width' => 300);

					}
                    elseif($columns[$j] == "product_pic"){

						$g = array('field'=>$columns[$j],'encoded'=>false,'title'=>$columnNames[0][$a],'filterable'=>array('multi'=>true,'search' => true, 'cell' => array('operator'=>'contains','suggestionOperator'=>'contains')), 'width' => 80);

					}
                    elseif($columns[$j] == "product_act"){

						$g = array('field'=>$columns[$j],'encoded'=>false,'title'=>$columnNames[0][$a],'filterable'=>array('multi'=>true,'search' => true, 'cell' => array('operator'=>'contains','suggestionOperator'=>'contains')), 'width' => 80);

					}
                    elseif($columns[$j] == "product_id"){

						$g = array('field'=>$columns[$j],'encoded'=>false,'title'=>$columnNames[0][$a],'filterable'=>array('multi'=>true,'search' => true, 'cell' => array('operator'=>'contains','suggestionOperator'=>'contains')), 'width' => 30);

					}
                    elseif($columns[$j] == "butil" OR $columns[$j] == "glasses_grouped_cc"){

						$g = array('field'=>$columns[$j],'hidden' => $hidebutil, 'encoded'=>false,'title'=>$columnNames[0][$a],'filterable'=>array('multi'=>true,'search' => true, 'cell' => array('operator'=>'contains','suggestionOperator'=>'contains')), 'width' => 40);

					}
                    elseif($columns[$j] == "cut_id"){

						$g = array('field'=>$columns[$j],'encoded'=>false,'title'=>$columnNames[0][$a],'filterable'=>array('multi'=>true,'search' => true, 'cell' => array('operator'=>'contains','suggestionOperator'=>'contains')), 'width' => 40);

					}
                    elseif($columns[$j] == "lameks"){

						$g = array('field'=>$columns[$j],'hidden' => $hidefiri,'encoded'=>false,'title'=>$columnNames[0][$a],'filterable'=>array('multi'=>true,'search' => true, 'cell' => array('operator'=>'contains','suggestionOperator'=>'contains')), 'width' => 50);

					}

                    elseif($columns[$j] == "product_status"){

						$g = array('field'=>$columns[$j],'encoded'=>false,'title'=>$columnNames[0][$a],'filterable'=>array('multi'=>true,'search' => true, 'cell' => array('operator'=>'contains','suggestionOperator'=>'contains')), 'width' => 100);

					}
                    else if($columns[$j] == "atxodebi"){
                        $g = array('field'=>$columns[$j],'encoded'=>false,'title'=>$columnNames[0][$a],'filterable'=>array('multi'=>true,'search' => true, 'cell' => array('operator'=>'contains','suggestionOperator'=>'contains')), 'width' => 80);
                    }
                    
                    elseif($columns[$j] == "id"){

						$g = array('field'=>$columns[$j],'encoded'=>false,'title'=>$columnNames[0][$a],'filterable'=>array('multi'=>true,'search' => true, 'cell' => array('operator'=>'contains','suggestionOperator'=>'contains')), 'width' => 80);

					}
                    elseif($columns[$j] == "total_to_pay" OR $columns[$j] == "avans" OR $columns[$j] == "add_money" OR $columns[$j] == "left_to_pay" OR $columns[$j] == "price_glass_proc"){
                        $g = array('field'=>$columns[$j],'hidden' => $cexis_ufrosi,'encoded'=>false,'title'=>$columnNames[0][$a],'filterable'=>array('multi'=>true,'search' => true, 'cell' => array('operator'=>'contains','suggestionOperator'=>'contains')));
                    }
                    else{

                    	$g = array('field'=>$columns[$j],'encoded'=>false,'title'=>$columnNames[0][$a],'filterable'=>array('multi'=>true,'search' => true, 'cell' => array('operator'=>'contains','suggestionOperator'=>'contains')));

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

		$type = $_REQUEST['type'];
        $mine = '';
        if($type == 'mine'){
            $mine = "AND orders.user_id = ".$user_id;
        }

        $columnCount = 		$_REQUEST['count'];

		$cols[]      =      $_REQUEST['cols'];



            $db->setQuery("SELECT 	orders.id,
                                    orders.datetime,
                                    orders.client_name,
                                    orders.client_pid,
                                    orders.client_phone,
                                    orders.client_addr,
                                    (SELECT ROUND(SUM((glass_width*glass_height)/1000000),2) FROM products_glasses WHERE order_id = orders.id AND actived = 1 AND status_id IN (1,2,3)),
                                    orders.total,
                                    orders.avansi,
                                    orders.avans_plus,
                                    orders.total - (orders.avansi+orders.avans_plus) AS left_to_pay,
                                    CONCAT('<span class=\"ostatus_',order_status.id,'\">',order_status.name,'</span>') AS status,
                                    IF((SELECT COUNT(*) FROM given_glasses WHERE order_id = orders.id) > 0, CONCAT('<a target=\"_blank\" style=\"color:blue\" href=\"print_excel.php?act=all&order_id=',orders.id,'\">გაცემულები</a>'), '')

                                    
                                        
                            FROM 	orders
                            JOIN	order_status ON order_status.id = orders.status_id
                            WHERE 	orders.actived = 1 $mine
                            ORDER BY orders.id DESC");



        $result = $db->getKendoList($columnCount, $cols);

        $data = $result;

    break;
    case 'get_list_proccess':
        $columnCount = 		$_REQUEST['count'];
		$cols[]      =      $_REQUEST['cols'];

        $order_id = $_REQUEST['order_id'];
        $path_id = $_REQUEST['path_id'];
        
        if($path_id == 2){


            $option_id  = $_REQUEST['option_id'];
            $manuf_id   = $_REQUEST['manuf_id'];
            $color_id   = $_REQUEST['color_id'];

            $client   = $_REQUEST['client'];
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

            $db->setQuery("SELECT 		cut_glass.id,
                                        CONCAT('ID: ', warehouse.id, ' ',glass_options.name,'(',glass_manuf.name,') ',glass_colors.name,' <b>',products_glasses.glass_width,'</b> X <b>', products_glasses.glass_height,'</b> მმ</b> პირამიდა: ', warehouse.pyramid) AS list,
                                        REPLACE(GROUP_CONCAT(CONCAT('ID: ', products_glasses.id,' ', IFNULL((SELECT CONCAT('(',products.name,')') FROM orders_product JOIN products ON products.id = orders_product.product_id AND products.id IN (2,3) WHERE orders_product.id = products_glasses.order_product_id),'') ,' ზომები: <b>',products_glasses.glass_width,'</b> X <b>', products_glasses.glass_height,'</b> მმ - ',glass_st.name,' - ', orders.client_name,' - პირ: <b>',IFNULL(products_glasses.last_pyramid,''),'</b> - <span data-id=\"',products_glasses.id,'\" class=\"print_shtrixkod\"><img style=\"width:20px\" src=\"assets/img/print.png\"></span>') SEPARATOR ', <br>'), 'დახარვეზებული', '<span style=\"color:red;\">დახარვეზებული</span>') AS glasses,
                                        (SELECT GROUP_CONCAT(CONCAT('<b>',cut_atxod.width,'</b> X <b>', cut_atxod.height,'</b> მმ') SEPARATOR ',<br>') FROM cut_atxod WHERE cut_atxod.cut_id = cut_glass.id AND cut_atxod.actived = 1) AS atx,
                                        
                                        CONCAT('<span class=\"status_',glass_status.id,'\">',glass_status.name,'</span>') AS status,
                                        CASE
                                            WHEN glass_status.id = 1 THEN CONCAT('<div style=\"display:flex;\"><div class=\"start_proc\" cut-id=\"',cut_glass.id,'\" id=\"new_glass\"><img style=\"width: 40px;\" src=\"assets/img/play.png\"></div><span data-id=\"',GROUP_CONCAT(products_glasses.id SEPARATOR ','),'\" class=\"print_shtrixkod_all\"><img style=\"width:40px\" src=\"assets/img/print.png\"></span></div>')
                                            WHEN glass_status.id = 2 THEN CONCAT('<div style=\"display:flex;\"><div class=\"finish_proc\" cut-id=\"',cut_glass.id,'\" id=\"new_glass\"><img style=\"width: 40px;\" src=\"assets/img/ok.png\"></div><div id=\"del_glass\" class=\"del_glass\" cut-id=\"',cut_glass.id,'\"> <img style=\"width: 40px;\" src=\"assets/img/error.png\"></div><span data-id=\"',GROUP_CONCAT(products_glasses.id SEPARATOR ','),'\" class=\"print_shtrixkod_all\"><img style=\"width:40px\" src=\"assets/img/print.png\"></span></div>')
                                            WHEN glass_status.id = 3 THEN CONCAT('<span data-id=\"',GROUP_CONCAT(products_glasses.id SEPARATOR ','),'\" class=\"print_shtrixkod_all\"><img style=\"width:40px\" src=\"assets/img/print.png\"></span>')
                                            WHEN glass_status.id = 4 THEN CONCAT('<span data-id=\"',GROUP_CONCAT(products_glasses.id SEPARATOR ','),'\" class=\"print_shtrixkod_all\"><img style=\"width:40px\" src=\"assets/img/print.png\"></span>')
                                            WHEN glass_status.id = 5 THEN CONCAT('<span data-id=\"',GROUP_CONCAT(products_glasses.id SEPARATOR ','),'\" class=\"print_shtrixkod_all\"><img style=\"width:40px\" src=\"assets/img/print.png\"></span>')


                                        END AS acc
                                        
                                        FROM 		cut_glass
                                        JOIN		lists_to_cut ON lists_to_cut.cut_id = cut_glass.id
                                        JOIN		warehouse ON warehouse.id = lists_to_cut.list_id
                                        JOIN		products_glasses ON products_glasses.id = lists_to_cut.glass_id
                                        JOIN        orders ON orders.id = products_glasses.order_id
                                        JOIN		glass_status ON glass_status.id = cut_glass.status_id
                                        JOIN        glass_status AS glass_st ON glass_st.id = products_glasses.status_id

                                        JOIN        glass_options ON glass_options.id = warehouse.glass_option_id
                                        JOIN        glass_type ON glass_type.id = warehouse.glass_type_id
                                        JOIN        glass_colors ON glass_colors.id = warehouse.glass_color_id
                                        JOIN        glass_manuf ON glass_manuf.id = warehouse.glass_manuf_id
                                        WHERE 	    cut_glass.actived = 1 $where
                                        
                                        GROUP BY    cut_glass.id
                                        ORDER BY    glass_status.sort_n");

            
        }
        else if($path_id == 6 || $path_id == 7){
            $pr_id = 2;
            if($path_id == 6){
                $pr_id = 3;
            }
            $db->setQuery(" SELECT  orders_product.id,
                                    CONCAT(orders.client_name , ' ', IFNULL(orders_product.add_info,'')),
                                    GROUP_CONCAT(DISTINCT CONCAT('№-',products_glasses.id,' ',glass_options.name, ' - <b>',products_glasses.glass_width,'</b> X <b>', products_glasses.glass_height,'</b> მმ</b> პირამიდა: ', IFNULL(products_glasses.last_pyramid,''),' - ',gl_st.name) SEPARATOR ',<br>') AS glasses,
                                    orders_product.butili,
                                    orders_product.lameqs_int,
                                    CONCAT(IF(orders_product.picture IS NULL OR orders_product.picture = '','',CONCAT('<a style=\"color:blue;\" target=\"_blank\" href=\"',orders_product.picture,'\"><img style=\"width:35px;\" src=\"assets/img/main.png\"></a>')), IF(products_glasses.picture IS NULL OR products_glasses.picture = '','',CONCAT('<a style=\"color:blue;\" target=\"_blank\" href=\"',products_glasses.picture,'\"><img style=\"width:35px;\" src=\"assets/img/glass.png\"></a>'))),
                                    CASE
                                        WHEN (SELECT COUNT(*) FROM glasses_paths AS st_2 WHERE IFNULL((SELECT status_id FROM glasses_paths AS st_3 WHERE st_3.actived = 1 AND st_3.sort_n = st_2.sort_n-1 AND st_3.glass_id = st_2.glass_id),3) = 3 AND st_2.status_id != 4 AND st_2.path_group_id = glasses_paths.path_group_id AND st_2.actived = 1 AND st_2.glass_id IN (SELECT id FROM products_glasses WHERE actived = 1 AND order_product_id=orders_product.id)) = orders_product.glass_count AND lists_to_cut.status_id = 3 THEN CONCAT('<span class=\"status_',glass_status.id,'\">',glass_status.name,'</span>')
                                        WHEN orders_product.status_id = 4 THEN CONCAT('<span class=\"status_',glass_status.id,'\">',glass_status.name,'</span>')
                                        ELSE '<span style=\"padding: 5px;color: white;background: radial-gradient(#1448ce 0.3%, #5e28ee 90%);border-radius: 5px;\">რიგში</span>'
                                    END AS glasses2,

                                    CASE
                                            WHEN (SELECT COUNT(*) FROM glasses_paths AS st_2 WHERE IFNULL((SELECT status_id FROM glasses_paths AS st_3 WHERE st_3.actived = 1 AND st_3.sort_n = st_2.sort_n-1 AND st_3.glass_id = st_2.glass_id),3) = 3 AND st_2.status_id != 4 AND st_2.path_group_id = glasses_paths.path_group_id AND st_2.actived = 1 AND st_2.glass_id IN (SELECT id FROM products_glasses WHERE actived = 1 AND order_product_id=orders_product.id)) = orders_product.glass_count AND lists_to_cut.status_id = 3 THEN CASE
                                                        WHEN glass_status.id = 1 AND (SELECT path_group_id FROM glasses_paths WHERE status_id IN (1,2,4,5) AND glass_id = products_glasses.id AND actived = 1 LIMIT 1) = glasses_paths.path_group_id THEN CONCAT('<div style=\"display:flex;\"><div class=\"start_proc\" prod-id=\"',orders_product.id,'\" id=\"new_glass\"><img style=\"width: 40px;\" src=\"assets/img/play.png\"></div><div id=\"del_glass\" class=\"del_glass\" prod-id=\"',orders_product.id,'\"> <img style=\"width: 40px;\" src=\"assets/img/error.png\"></div></div>')
                                                        WHEN glass_status.id = 2 THEN CONCAT('<div style=\"display:flex;\"><div class=\"finish_proc\" prod-id=\"',orders_product.id,'\" id=\"new_glass\"><img style=\"width: 40px;\" src=\"assets/img/ok.png\"></div><div id=\"del_glass\" class=\"del_glass\" prod-id=\"',orders_product.id,'\"> <img style=\"width: 40px;\" src=\"assets/img/error.png\"></div></div>')
                                                        WHEN glass_status.id = 3 THEN ''
                                                        WHEN glass_status.id = 4 THEN ''
                                                        WHEN glass_status.id = 5 THEN ''
                                                END
                                                                                                                                                                                                                    
                                            
                                    END AS acc2

                            FROM    orders_product
                            JOIN    orders ON orders.id = orders_product.order_id
                            JOIN    products ON products.id = orders_product.product_id
                            
                            LEFT JOIN	products_glasses ON products_glasses.order_product_id = orders_product.id
                            JOIN		glasses_paths ON glasses_paths.glass_id = products_glasses.id AND glasses_paths.actived = 1
                            LEFT JOIN	glass_options ON glass_options.id = products_glasses.glass_option_id
                            LEFT JOIN	glass_status ON glass_status.id = orders_product.status_id
                            LEFT JOIN   glass_status AS gl_st ON gl_st.id = products_glasses.status_id
                            LEFT JOIN		lists_to_cut ON lists_to_cut.glass_id = products_glasses.id AND lists_to_cut.actived = 1

                            WHERE   orders_product.actived = 1 AND products_glasses.actived = 1 AND orders.actived = 1 AND glasses_paths.path_group_id = '$path_id' AND orders_product.product_id = '$pr_id'
                            
                            GROUP BY orders_product.id
                            ORDER BY glass_status.sort_n");
        }
        else{
            $db->setQuery(" SELECT * FROM (SELECT	products_glasses.id,
                                    CONCAT(orders.client_name , ' ', IFNULL(orders_product.add_info,'')),
                                    CONCAT(glass_options.name,' ', IFNULL((SELECT CONCAT('(',products.name,')') FROM orders_product JOIN products ON products.id = orders_product.product_id AND products.id IN (2,3) WHERE orders_product.id = products_glasses.order_product_id),'')) AS option,
                                    glass_type.name AS type,
                                    glass_colors.name AS color,
                                    CONCAT('<b>',products_glasses.glass_width,'</b> X <b>', products_glasses.glass_height,'</b> მმ') AS param,

                                    CONCAT(IF(orders_product.picture IS NULL OR orders_product.picture = '','',CONCAT('<a style=\"color:blue;\" target=\"_blank\" href=\"',orders_product.picture,'\"><img style=\"width:35px;\" src=\"assets/img/main.png\"></a>')), IF(products_glasses.picture IS NULL OR products_glasses.picture = '','',CONCAT('<a style=\"color:blue;\" target=\"_blank\" href=\"',products_glasses.picture,'\"><img style=\"width:35px;\" src=\"assets/img/glass.png\"></a>'))),
                                    CONCAT('ნახვრეტი: 4, ჭრის რაოდენობა:5'),
                                    products_glasses.last_pyramid,
                                    
                                    
                                    IF(IFNULL((SELECT status_id FROM lists_to_cut WHERE glass_id = products_glasses.id AND actived = 1), IF(products_glasses.go_to_cut = 0,3,1)) = 3,CASE
                                    WHEN glass_status.id = 1 THEN IF((SELECT path_group_id FROM glasses_paths WHERE status_id IN (1,2,4,5) AND glass_id = products_glasses.id AND actived = 1 ORDER BY sort_n LIMIT 1) != glasses_paths.path_group_id, '<span style=\"padding: 5px;
                                    color: white;
                                    background: radial-gradient(#1448ce 0.3%, #5e28ee 90%);
                                    border-radius: 5px;\">რიგში</span>',CONCAT('<span class=\"status_',glass_status.id,'\">',glass_status.name,'</span>'))
                                                                        ELSE CONCAT('<span class=\"status_',glass_status.id,'\">',glass_status.name,'</span>')
                                                                    END,'<span style=\"padding: 5px;
                                    color: white;
                                    background: radial-gradient(#1448ce 0.3%, #5e28ee 90%);
                                    border-radius: 5px;\">რიგში</span>') AS glasses,

                                    IF(IFNULL((SELECT status_id FROM lists_to_cut WHERE glass_id = products_glasses.id AND actived = 1), IF(products_glasses.go_to_cut = 0,3,1)) = 3,CASE
                                        WHEN glass_status.id = 1 AND (SELECT path_group_id FROM glasses_paths WHERE status_id IN (1,2,4,5) AND glass_id = products_glasses.id AND actived = 1 ORDER BY sort_n LIMIT 1) = glasses_paths.path_group_id THEN CONCAT('<div style=\"display:flex;\"><div class=\"start_proc\" path-id=\"',glasses_paths.id,'\" data-id=\"',products_glasses.id,'\" id=\"new_glass\"><img style=\"width: 40px;\" src=\"assets/img/play.png\"></div><div id=\"del_glass\" class=\"del_glass\" path-id=\"',glasses_paths.id,'\" data-id=\"',products_glasses.id,'\"> <img style=\"width: 40px;\" src=\"assets/img/error.png\"></div><span data-id=\"',products_glasses.id,'\" style=\"',IF(glasses_paths.path_group_id != 5,'display:none;',''),'\" class=\"print_shtrixkod\"><img style=\"width:40px\" src=\"assets/img/print.png\"></span></div>')
                                        WHEN glass_status.id = 2 THEN CONCAT('<div style=\"display:flex;\"><div class=\"finish_proc\" path-id=\"',glasses_paths.id,'\" data-id=\"',products_glasses.id,'\" id=\"new_glass\"><img style=\"width: 40px;\" src=\"assets/img/ok.png\"></div><div id=\"del_glass\" class=\"del_glass\" path-id=\"',glasses_paths.id,'\" data-id=\"',products_glasses.id,'\"> <img style=\"width: 40px;\" src=\"assets/img/error.png\"></div><span data-id=\"',products_glasses.id,'\" style=\"',IF(glasses_paths.path_group_id != 5,'display:none;',''),'\" class=\"print_shtrixkod\"><img style=\"width:40px\" src=\"assets/img/print.png\"></span></div>')
                                        WHEN glass_status.id = 3 THEN CONCAT('<span style=\"',IF(glasses_paths.path_group_id != 5,'display:none;',''),'\" data-id=\"',products_glasses.id,'\" class=\"print_shtrixkod\"><img style=\"width:40px\" src=\"assets/img/print.png\"></span>')
                                        WHEN glass_status.id = 4 THEN CONCAT('<span style=\"',IF(glasses_paths.path_group_id != 5,'display:none;',''),'\" data-id=\"',products_glasses.id,'\" class=\"print_shtrixkod\"><img style=\"width:40px\" src=\"assets/img/print.png\"></span>')
                                        WHEN glass_status.id = 5 THEN CONCAT('<span style=\"',IF(glasses_paths.path_group_id != 5,'display:none;',''),'\" data-id=\"',products_glasses.id,'\" class=\"print_shtrixkod\"><img style=\"width:40px\" src=\"assets/img/print.png\"></span>')


                                    END,'') AS acc,

                                    IF(IFNULL((SELECT status_id FROM lists_to_cut WHERE glass_id = products_glasses.id AND actived = 1), IF(products_glasses.go_to_cut = 0,3,1)) = 3,CASE
                                    WHEN glass_status.id = 1 THEN IF((SELECT path_group_id FROM glasses_paths WHERE status_id IN (1,2,4,5) AND glass_id = products_glasses.id AND actived = 1 ORDER BY sort_n LIMIT 1) != glasses_paths.path_group_id, 3,glass_status.sort_n)
                                        ELSE glass_status.sort_n
                                    END,3) AS sort_n
                                    
                                    
                            FROM 		products_glasses
                            JOIN		orders_product ON orders_product.id = products_glasses.order_product_id AND orders_product.actived = 1
                            JOIN		orders ON orders.id = orders_product.order_id AND orders.actived = 1
                            JOIN		glass_options ON glass_options.id = products_glasses.glass_option_id		
                            JOIN 		glass_type ON glass_type.id = products_glasses.glass_type_id
                            JOIN		glass_colors ON glass_colors.id = products_glasses.glass_color_id
                            JOIN		glasses_paths ON glasses_paths.glass_id = products_glasses.id
                            JOIN		glass_status ON glass_status.id = glasses_paths.status_id
                            LEFT JOIN		lists_to_cut ON lists_to_cut.glass_id = products_glasses.id AND lists_to_cut.actived = 1

                            WHERE 	    products_glasses.actived = 1 AND glasses_paths.path_group_id = '$path_id' AND glasses_paths.actived = 1 AND products_glasses.display = 1 AND lists_to_cut.id  IS NOT NULL

                            GROUP BY products_glasses.id
                            ORDER BY glasses_paths.status_id ASC) AS ttt
                            ORDER BY ttt.sort_n");
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
        GROUP_CONCAT(CONCAT('№-',products_glasses.id,' ',glass_options.name, '(',glass_manuf.name,') <span glass-id=\"',products_glasses.id,'\" prod-id=\"',orders_product.id,'\" class=\"change_sizes\"><b>',products_glasses.glass_width,'</b> X <b>', products_glasses.glass_height,'</b></span> მმ ',glass_colors.name,' - <span class=\"status_',glass_status.id,'\">',glass_status.name,'</span> ', IF((SELECT COUNT(*) FROM glasses_paths WHERE actived = 1 AND glass_id = products_glasses.id AND status_id IN (1,2,4,5,6)) = 0,'<span class=\"status_finished\">დასრულებული</span>',CASE
                            WHEN lists_to_cut.id IS NOT NULL THEN IF(lists_to_cut.status_id = 3, IFNULL(IFNULL((SELECT name FROM groups WHERE id = (SELECT IF(gp1.status_id = 3 OR gp1.status_id IS NULL,gp2.path_group_id,gp1.path_group_id) FROM glasses_paths AS gp2 LEFT JOIN glasses_paths AS gp1 ON gp1.glass_id = gp2.glass_id AND gp1.sort_n = gp2.sort_n-1 AND gp1.actived=1  WHERE gp2.status_id IN (1,2) AND gp2.glass_id = products_glasses.id AND gp2.actived = 1 ORDER BY gp1.sort_n ASC LIMIT 1)), IFNULL((SELECT name FROM groups WHERE id = (SELECT path_group_id FROM glasses_paths WHERE status_id IN (4,5) AND actived = 1 AND glass_id = products_glasses.id ORDER BY sort_n ASC LIMIT 1)), (SELECT name FROM groups WHERE id = (SELECT path_group_id FROM glasses_paths WHERE status_id IN (3) AND actived = 1 AND glass_id = products_glasses.id ORDER BY sort_n DESC LIMIT 1)))), (SELECT name FROM groups WHERE id = lists_to_cut.status_id)),'ჭრა')
                            
                            ELSE IF(products_glasses.go_to_cut != 1,IFNULL(IFNULL((SELECT name FROM groups WHERE id = (SELECT IF(gp1.status_id = 3 OR gp1.status_id IS NULL,gp2.path_group_id,gp1.path_group_id) FROM glasses_paths AS gp2 LEFT JOIN glasses_paths AS gp1 ON gp1.glass_id = gp2.glass_id AND gp1.sort_n = gp2.sort_n-1 AND gp1.actived=1 WHERE gp2.status_id IN (1,2) AND gp2.glass_id = products_glasses.id AND gp2.actived = 1 ORDER BY gp1.sort_n ASC LIMIT 1)), IFNULL((SELECT name FROM groups WHERE id = (SELECT path_group_id FROM glasses_paths WHERE status_id IN (4,5) AND actived = 1 AND glass_id = products_glasses.id ORDER BY sort_n ASC LIMIT 1)), (SELECT name FROM groups WHERE id = (SELECT path_group_id FROM glasses_paths WHERE status_id IN (3) AND actived = 1 AND glass_id = products_glasses.id ORDER BY sort_n DESC LIMIT 1)))), (SELECT name FROM groups WHERE id = lists_to_cut.status_id)), '')
                        END), ' ', IF(products_glasses.new_id != 0, CONCAT('NEW ID: <b>',products_glasses.new_id,'</b>'), ''), ' ', CONCAT(CONCAT('<a style=\"color:blue;\" target=\"_blank\" href=\"',IFNULL(orders_product.picture,0),'\"><img style=\"width:35px;\" src=\"assets/img/main.png\"></a>'), '<a style=\"color:blue;\" target=\"_blank\" href=\"',IFNULL(products_glasses.picture,0),'\"><img style=\"width:35px;\" src=\"assets/img/glass.png\"></a></a>')) SEPARATOR ',<br>') AS glasses,
        (SELECT ROUND(SUM((glass_width*glass_height)/1000000),2) FROM products_glasses WHERE order_product_id = orders_product.id AND actived = 1 AND status_id IN (1,2,3)),
        CONCAT('<div prod-id=\"',orders_product.id,'\" class=\"copy_product\">კოპირება</div>') AS detailed

                        FROM    orders_product
                        JOIN    products ON products.id = orders_product.product_id
                        JOIN	products_glasses ON products_glasses.order_product_id = orders_product.id
                        JOIN	glass_options ON glass_options.id = products_glasses.glass_option_id
                        JOIN	glass_status ON glass_status.id = products_glasses.status_id
                        JOIN    glass_colors ON glass_colors.id = products_glasses.glass_color_id
                        JOIN    glass_manuf ON glass_manuf.id = products_glasses.glass_manuf_id
                        LEFT JOIN		lists_to_cut ON lists_to_cut.glass_id = products_glasses.id AND lists_to_cut.actived = 1
                        WHERE   orders_product.order_id = '$order_id' AND orders_product.actived = 1 AND products_glasses.actived = 1
                        GROUP BY orders_product.id");
        $result = $db->getKendoList($columnCount, $cols);

        $data = $result;
        break;

    case 'get_list_glasses_all':
        $columnCount = 		$_REQUEST['count'];
        $cols[]      =      $_REQUEST['cols'];

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
                                GROUP_CONCAT(DISTINCT orders.client_name) as clients

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
        break;
    case 'get_list_glasses':
        $columnCount = 		$_REQUEST['count'];
		$cols[]      =      $_REQUEST['cols'];

        $product_id = $_REQUEST['product_id'];
        $db->setQuery(" SELECT CONCAT('<span class=\"open_close\">',glass_options.name, '(',glass_manuf.name,') <b>',products_glasses.glass_width,'</b> X <b>', products_glasses.glass_height,'</b> მმ ', glass_type.name, ' ', glass_colors.name,'</span>',GROUP_CONCAT(DISTINCT CONCAT('<span class=\"row_glass\"><input type=\"checkbox\" class=\"selected_glass\" data-id=\"',products_glasses.id,'\"><a data-id=\"',products_glasses.id,'\" class=\"glass_detail\">ID:',products_glasses.id,' ', ' - ', IF((SELECT COUNT(*) FROM glasses_paths WHERE actived = 1 AND glass_id = products_glasses.id AND status_id IN (1,2,4,5,6)) = 0,'<span class=\"status_finished\">დასრულებული</span>',CASE
        WHEN lists_to_cut.id IS NOT NULL THEN IF(lists_to_cut.status_id = 3, IFNULL(IFNULL((SELECT name FROM groups WHERE id = (SELECT IF(gp1.status_id = 3 OR gp1.status_id IS NULL,gp2.path_group_id,gp1.path_group_id) FROM glasses_paths AS gp2 LEFT JOIN glasses_paths AS gp1 ON gp1.glass_id = gp2.glass_id AND gp1.sort_n = gp2.sort_n-1 AND gp1.actived=1  WHERE gp2.status_id IN (1,2) AND gp2.glass_id = products_glasses.id AND gp2.actived = 1 ORDER BY gp1.sort_n ASC LIMIT 1)), IFNULL((SELECT name FROM groups WHERE id = (SELECT path_group_id FROM glasses_paths WHERE status_id IN (4,5) AND actived = 1 AND glass_id = products_glasses.id ORDER BY sort_n ASC LIMIT 1)), (SELECT name FROM groups WHERE id = (SELECT path_group_id FROM glasses_paths WHERE status_id IN (3) AND actived = 1 AND glass_id = products_glasses.id ORDER BY sort_n DESC LIMIT 1)))), (SELECT name FROM groups WHERE id = lists_to_cut.status_id)),'ჭრა')
        
        ELSE IF(products_glasses.go_to_cut != 1,IFNULL(IFNULL((SELECT name FROM groups WHERE id = (SELECT IF(gp1.status_id = 3 OR gp1.status_id IS NULL,gp2.path_group_id,gp1.path_group_id) FROM glasses_paths AS gp2 LEFT JOIN glasses_paths AS gp1 ON gp1.glass_id = gp2.glass_id AND gp1.sort_n = gp2.sort_n-1 AND gp1.actived=1 WHERE gp2.status_id IN (1,2) AND gp2.glass_id = products_glasses.id AND gp2.actived = 1 ORDER BY gp1.sort_n ASC LIMIT 1)), IFNULL((SELECT name FROM groups WHERE id = (SELECT path_group_id FROM glasses_paths WHERE status_id IN (4,5) AND actived = 1 AND glass_id = products_glasses.id ORDER BY sort_n ASC LIMIT 1)), (SELECT name FROM groups WHERE id = (SELECT path_group_id FROM glasses_paths WHERE status_id IN (3) AND actived = 1 AND glass_id = products_glasses.id ORDER BY sort_n DESC LIMIT 1)))), (SELECT name FROM groups WHERE id = lists_to_cut.status_id)), '')
    END),' <span class=\"status_',glass_status.id,'\">',glass_status.name,'</span>','</a></span>') SEPARATOR '')) AS glasses,
        
                                        COUNT(DISTINCT products_glasses.id) AS cc
                                        
                        FROM    products_glasses
                        JOIN    glass_options ON glass_options.id = products_glasses.glass_option_id
                        JOIN    glass_type ON glass_type.id = products_glasses.glass_type_id
                        JOIN    glass_colors ON glass_colors.id = products_glasses.glass_color_id
                        JOIN    glass_status ON glass_status.id = products_glasses.status_id
                        JOIN    glass_manuf ON glass_manuf.id = products_glasses.glass_manuf_id
                        LEFT JOIN	glasses_paths ON glasses_paths.glass_id = products_glasses.id AND glasses_paths.actived = 1
                        LEFT JOIN groups ON groups.id = glasses_paths.path_group_id
                        LEFT JOIN glass_status AS path_status ON path_status.id = glasses_paths.status_id
                        LEFT JOIN		lists_to_cut ON lists_to_cut.glass_id = products_glasses.id AND lists_to_cut.actived = 1
                        WHERE   products_glasses.actived = 1 AND products_glasses.order_product_id = '$product_id'
                        GROUP BY products_glasses.glass_width, products_glasses.glass_height, products_glasses.glass_option_id, products_glasses.glass_color_id, products_glasses.glass_manuf_id
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
                                CONCAT('<span class=\"status_',glass_status.id,'\">',glass_status.name,'</span>') AS glasses

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
function getPath($id){
    GLOBAL $db;

    $db->setQuery(" SELECT  glasses_paths.id,
                            glasses_paths.user_id,
                            glasses_paths.glass_id,
                            glasses_paths.path_group_id,
                            glasses_paths.status_id,
                            glasses_paths.sort_n,
                            glasses_paths.cuts,
                            glasses_paths.holes,
                            groups.default_price
                    FROM    glasses_paths
                    JOIN    groups ON groups.id = glasses_paths.path_group_id 
                    WHERE   glasses_paths.id = '$id'");

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
                            status_id,
                            go_to_cut,
                            picture,
                            not_standard
                    FROM    products_glasses
                    WHERE   id = '$id'");

    $result = $db->getResultArray();



    return $result['result'][0];
    
}
function getGlassPage($id, $res = ''){
    GLOBAL $db;
    $checked = 'checked';

    if($res['go_to_cut'] == '0'){
        $checked = '';
    }
    if($res['not_standard'] == '1'){
        $checked_stand = 'checked';
    }
    $data = '   
        <div class="row">
            <div class="col-sm-6">
                <fieldset class="fieldset">
                    <legend>ინფორმაცია</legend>
                        <div class="row">
                            <div class="col-sm-6">
                                <label>აირჩიეთ შუშა</label>
                                <select id="selected_glass_cat_id">
                                    '.getGlassOptions($res['glass_option_id']).'
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label>ზომა (მმ) (სიმაღლეXსიგანე)</label>
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

                            <div class="col-sm-6">
                                <label>აირჩიეთ სურათი</label>
                                <img id="upGlassImg" src="'.$res['picture'].'" style="width:100px; cursor: pointer;" >
                                <input style="display:none;" type="file" id="glass_file">
                            </div>

                            <div class="col-sm-6">
                                <label style="display: flex;"><input type="checkbox" id="go_to_cut" '.$checked.'> <span style="margin-top: 2px;
                                margin-left: 5px;">გაიაროს ჭრის პროცესი?</span></label>
                            </div>
                            <div class="col-sm-6">
                                <label style="display: flex;"><input type="checkbox" id="stand_glass" '.$checked_stand.'> <span style="margin-top: 2px;
                                margin-left: 5px;">არასტანდარტული მინა?</span></label>
                            </div>
                           
                        </div>
                    </legend>
                </fieldset>
            </div>
            <div class="col-sm-6">
                <fieldset class="fieldset">
                    <legend>პროცესი</legend>
                    <div class="row" style="    flex-direction: row;
                    justify-content: space-around;">';
                        $db->setQuery("SELECT   id,name
                                        FROM groups
                                        WHERE actived = 1 AND id IN (3,4,5,6,7,8,9)");
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
            </div>
        </div>
                <input type="hidden" id="glass_id" value="'.$id.'">

                ';

    return $data;
}

function getPathPage($id, $res = ''){
    GLOBAL $db;
    $show = 'style="display: none;"';
    if($res['path_group_id'] == 4){
        $hidd = 'style="display: none;"';
        $show = 'style="display: block;"';
    }
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
                            <div class="col-sm-4" '.$hidd.'>
                                <label>ფასი</label>
                                <input style="width:99%;" type="text" id="price" value="'.$res['default_price'].'">
                            </div>
                            <div class="col-sm-4" '.$show.'>
                                <label>ნახვრეტების რაოდენობა</label>
                                <input style="width:99%;" type="text" id="holes_2" value="'.$res['holes'].'">
                            </div>
                            <div class="col-sm-4" '.$show.'>
                                <label>ჭრის რაოდენობა</label>
                                <input style="width:99%;" type="text" id="cuts_2" value="'.$res['cuts'].'">
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
                            butili,
                            glass_count,
                            add_info
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
                                                <input type="number" step=".01" value="1" id="hole_price">
                                            </div>
                                            
                                            <div class="col-sm-6">
                                                <label>ჭრის რაოდენობა</label>
                                                <input type="tel" min="1" id="cuts">
                                            </div>
                                            <div class="col-sm-6">
                                                <label>1 ჭრის ფასი</label>
                                                <input type="number" step=".01" value="3" id="cut_price">
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

    $dis_minapaket = 'style="display:none"';
    $dis_lameks = 'style="display:none"';
    $glass_cc = 'style="display:none"';

    if($res['product_cat_id'] == 2){
        $dis_minapaket = 'style="display:block"';
    }
    if($res['product_cat_id'] == 3){
        $dis_lameks = 'style="display:block"';
    }

    if($res['product_cat_id'] == 2 || $res['product_cat_id'] == 3){
        $glass_cc = 'style="display:block"';
    }

    if($res['glass_count'] == '' || $res['glass_count'] == 0){
        $res['glass_count'] = 2;
    }

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
                            <div class="col-sm-6" id="only_minapaket" '.$dis_minapaket.'>
                                <label>ბუტილის ზომა</label>
                                <input type="number" value="'.$res['butili'].'" id="butil_size" style="width: 100%;">
                            </div>
                            <div class="col-sm-6" id="only_lameks" '.$dis_lameks.'>
                                <label>ფირი (ლამექსისთვის მხოლოდ)</label>
                                <input type="text" id="firi_lameks" value="'.$res['lameqs_int'].'" style="width: 100%;">
                            </div>
                            <div class="col-sm-6" id="both_proc" '.$glass_cc.'>
                                <label>მინების რ-ბა</label>
                                
                                <select id="glass_count">
                                    <option value="">აირჩიეთ</option>';
                                    for($i=2;$i<=6;$i++)
                                    {
                                        if($i == $res['glass_count']){
                                            $data .= '<option value="'.$i.'" selected>'.$i.'</option>';
                                        }
                                        else{
                                            $data .= '<option value="'.$i.'">'.$i.'</option>';
                                        }
                                        
                                    }                                   
                                $data .= '</select>
                            </div>
                            <div class="col-sm-6">
                                <label>დასახელება</label>
                                <input value="'.$res['add_info'].'" data-nec="0" style="height: 18px; width: 95%;" type="text" id="add_info" class="idle" autocomplete="off">
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
    $data .= '<option value="">აირჩიეთ</option>';
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
function getClients(){
    GLOBAL $db;
    $data = '';
    $db->setQuery("SELECT   id,
                            client_name AS name
                    FROM    clients 
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
function getRespUser($id){
    GLOBAL $db;
    $data = '';
    $db->setQuery("SELECT   id,
                            CONCAT(firstname, ' ', lastname) AS 'name'
                    FROM    users 
                    WHERE actived = 1 AND group_id IN (1,12,13)");
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

    GLOBAL $db,$user_id;

    $male_checked = '';

    $female_checked = '';

    if($res['sex_id'] == 1){

        $female_checked = 'checked';

    }

    else if($res['sex_id'] == 2){

        $male_checked = 'checked';

    }


    if($_SESSION['GRPID'] == 11){
        $cexis_ufrosi = 'style="display:none;"';
    }

    if($_SESSION['GRPID'] != 1 && $_SESSION['GRPID'] != 10 && $_SESSION['GRPID'] != 13){
        $disable = 'disabled';
    }
    if($res['user_id'] == ''){
        $res['user_id'] = $user_id;
    }

    $data .= '

    
    <fieldset class="fieldset">
        <legend>პარამეტრები</legend>
        <div class="row">
            <div class="col-sm-4">
                <label>აირჩიეთ პასუხისმგებეელი პირი</label>
                <select id="resp_user" '.$disable.'>
                    '.getRespUser($res['user_id']).'
                </select>
            </div>

            <div class="col-sm-4">
                <label>აირჩიეთ კლიენტი</label>
                <select id="clients" '.$disable.'>
                    '.getClients(0).'
                </select>
            </div>
        </div>
    </fieldset>

    <fieldset class="fieldset">
        <legend>ინფორმაცია</legend>
        <div class="row">
            <div class="col-sm-3">
                <label>დამკვეთი</label>
                <input value="'.$res['client_name'].'" data-nec="0" style="height: 18px; width: 95%;" type="text" id="client_name" class="idle" autocomplete="off">
            </div>

            <div class="col-sm-3">
                <label>პ/ნ ან ს/კ</label>
                <input value="'.$res['client_pid'].'" data-nec="0" style="height: 18px; width: 95%;" type="text" id="client_pid" class="idle" autocomplete="off">
            </div>

            <div class="col-sm-3">
                <label>ტელეფონი</label>
                <input value="'.$res['client_phone'].'" data-nec="0" style="height: 18px; width: 95%;" type="number" id="client_phone" class="idle" autocomplete="off">
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
            
            
            <div class="col-sm-2" '.$cexis_ufrosi.'>
                <label>სულ გადასახდელი</label>
                <input value="'.$res['total'].'" data-nec="0" style="height: 18px; width: 95%;" type="number" step=".01" id="pay_total" class="idle" autocomplete="off">
            </div>
            <div class="col-sm-2" '.$cexis_ufrosi.'>
                <label>ავანსი</label>
                <input value="'.$res['avansi'].'" data-nec="0" style="height: 18px; width: 95%;" type="number" step=".01" id="avansi" class="idle" autocomplete="off">
            </div>
            <div class="col-sm-2" '.$cexis_ufrosi.'>
                <label>დამატებული თანხა</label>
                <input value="'.$res['avans_plus'].'" data-nec="0" style="height: 18px; width: 95%;" type="number" step=".01" id="avans_plus" class="idle" autocomplete="off">
            </div>
            <div class="col-sm-12">---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</div>
            <div class="col-sm-12">
                <label>პროდუქცია | მინაპაკეტი: <b id="minapaket_cc">0</b> | ლამექსი: <b id="lameqs_cc">0</b> | დუშკაბინა: <b id="dush_cc">0</b> | მინა: <b id="mina_cc">0</b></label>
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
                            orders.client_name,
                            orders.client_pid,
                            orders.client_phone,
                            orders.client_addr,
                            orders.user_id,
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
    $db->setQuery("SELECT   warehouse.id,
                            CONCAT(glass_manuf.name,' ზომები: ', warehouse.glass_width, 'მმ X ',warehouse.glass_height, 'მმ, პირამიდა: ', warehouse.pyramid, ' დარჩა: ',warehouse.qty ) AS name
                    FROM    warehouse
                    JOIN    glass_manuf ON glass_manuf.id = warehouse.glass_manuf_id
                    WHERE   warehouse.actived = 1 AND warehouse.glass_option_id = '$option_id' AND warehouse.glass_type_id = '$type_id' AND warehouse.glass_color_id = '$color_id'");
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
function change_sizes($res = '', $prod_id){
    $data = '   <fieldset class="fieldset">
                    <legend>ინფორმაცია</legend>
                        <div class="row">
                            <div class="col-sm-12">
                                <label>ზომა (მმ) (სიმაღლეXსიგანე)</label>
                                <div class="row">
                                    <div class="col-sm-6"><input style="width:99%;" type="text" id="glass_width_change" value="'.$res['glass_width'].'"></div>
                                    <div class="col-sm-6"><input style="width:99%;" type="text" id="glass_height_change" value="'.$res['glass_height'].'"></div>
                                </div>
                            </div>
                            
                        </div>
                    </legend>
                </fieldset>

                <input type="hidden" id="glass_id_new" value="'.$res['id'].'">
                <input type="hidden" id="prod_id_new" value="'.$prod_id.'">
                
                
                ';

    return $data;
}
function atxodPage($res = ''){

    $data = '   <fieldset class="fieldset">
                    <legend>ინფორმაცია</legend>
                        <div class="row">
                            <div class="col-sm-12">
                                <label>ზომა (მმ) (სიმაღლეXსიგანე)</label>
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