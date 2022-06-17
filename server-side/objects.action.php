<?php
error_reporting(E_ERROR);
include('../db.php');
GLOBAL $db;
$db = new dbClass();
$act = $_REQUEST['act'];
$user_id = $_SESSION['USERID'];

switch ($act){
    case 'get_add_page':
        $id = $_REQUEST['id'];
        $data = array('page' => getPage());
    break;
    case 'get_edit_page':
        $id = $_REQUEST['id'];
        $data = array('page' => getPage(getObject($id)));
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
                                        CONCAT(warehouse.glass_width, 'სმ X ',warehouse.glass_height, 'სმ' ),
                                        warehouse.sqr_price,
                                        warehouse.pyramid
                            FROM warehouse
                            LEFT JOIN glass_options ON glass_options.id = warehouse.glass_option_id
                            LEFT JOIN glass_type ON glass_type.id = warehouse.glass_type_id
                            LEFT JOIN glass_colors ON glass_colors.id = warehouse.glass_color_id
                            LEFT JOIN glass_manuf ON glass_manuf.id = warehouse.glass_manuf_id
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
                <label>რაოდენობა</label>
                <input value="'.$res['qty'].'" data-nec="0" style="height: 18px; width: 95%;" type="text" id="glass_qty" class="idle" autocomplete="off">
            </div>
            <div class="col-sm-4">
                <label>თითოს ზომა (სიგრძეXსიგანე)</label>
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
                <label>პირამიდის ნომერი</label>
                <input value="'.$res['pyramid'].'" data-nec="0" style="height: 18px; width: 95%;" type="text" id="pyramid" class="idle" autocomplete="off">
            </div>

            
        </div>
    </fieldset>
    <input type="hidden" id="warehouse_id" value="'.$res[id].'">
    ';

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