<?php
error_reporting(E_ERROR);
include('../db.php');
GLOBAL $db;
$db = new dbClass();
$act = $_REQUEST['act'];
$user_id = $_SESSION['USERID'];
$data = array();
switch ($act){
    case 'disable':
        $ids = $_REQUEST['id'];
        $ids = explode(',',$ids);

        foreach($ids AS $id){
            $db->setQuery("UPDATE work_group SET actived = 0 WHERE id = '$id'");
            $db->execQuery();
        }
    break;
    case 'disable_u':
        $ids = $_REQUEST['id'];
        $ids = explode(',',$ids);

        foreach($ids AS $id){
            $db->setQuery("UPDATE work_group_users SET actived = 0 WHERE id = '$id'");
            $db->execQuery();
        }
    break;
    case 'count_salary':
        $id          =      $_REQUEST['hidden'];
		
        $all_date = explode(' - ', $_REQUEST['count_date']);
        $start = $all_date[0];

        $end     = $all_date[1];


        $columnCount = 		$_REQUEST['count'];
		$cols[]      =      $_REQUEST['cols'];

            $db->setQuery(" SELECT  users.id,
                                    CONCAT(users.firstname,' ',users.lastname),
                                    SUM(work_group_users.finished_sqm),
                                    CONCAT(ROUND(SUM(work_group_users.finished_sqm)*work_group.sqm_price, 2), ' GEL')
            
                            FROM    work_group_users
                            JOIN    work_group ON work_group.id = work_group_users.work_group_id AND work_group.actived = 1 AND work_group.work_date BETWEEN '$start' AND '$end'
                            JOIN    users ON users.id = work_group_users.user_id
                            WHERE   work_group_users.actived = 1
                            GROUP BY work_group_users.user_id");

        $result = $db->getKendoList($columnCount, $cols);
        $data = $result;
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
                    $hid_array = array("id2","write_date","impuls_qty","glass_option_id","glass_type_id","glass_color_id","glass_manuf_id","name_product_22","type_22","color_22","proccess2_22","cut_list_22","infooo");
					if($columns[$j] == "inc_status"){
						$g = array('field'=>$columns[$j],'encoded'=>false,'title'=>$columnNames[0][$a],'filterable'=>array('multi'=>true,'search' => true), 'width' => 153);
					}elseif($columns[$j] == "audio_file"){
						$g = array('field'=>$columns[$j],'encoded'=>false,'title'=>$columnNames[0][$a],'filterable'=>array('multi'=>true,'search' => true), 'width' => 150);
					}elseif(in_array($columns[$j], $hid_array)){

						$g = array('field'=>$columns[$j], 'hidden' => true,'encoded'=>false,'title'=>$columnNames[0][$a],'filterable'=>array('multi'=>true,'search' => true, 'cell' => array('operator'=>'contains','suggestionOperator'=>'contains')), 'width' => 100);

					}
                    elseif($columns[$j] == "action_given"){
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

            $db->setQuery(" SELECT  work_group.id,
                                    work_group.name,
                                    `proc`.name,
                                    work_group.work_date,
                                    GROUP_CONCAT(CONCAT(users.firstname,' ',users.lastname,' - ', IF(work_group_users.is_boss = 1,'<b>უფროსი</b> - ',''),work_group_users.salary_percent, '%') SEPARATOR '<br>') AS work_group,
                                    IF(work_group.finished_work = 0, '<b>აქტიური</b>', '<b>დასრულებული</b>')

                            FROM    work_group
                            JOIN    `groups` AS `proc` ON `proc`.id = work_group.proc_id AND `proc`.actived = 1
                            JOIN    work_group_users ON work_group_users.work_group_id = work_group.id AND work_group_users.actived = 1
                            JOIN    users ON users.id = work_group_users.user_id
                            WHERE   work_group.actived = 1
                            GROUP BY work_group.id
                            ORDER BY work_group.id ASC, work_group.finished_work ASC");

        $result = $db->getKendoList($columnCount, $cols);
        $data = $result;
    break;
    case 'get_list_work_users':
        $id          =      $_REQUEST['hidden'];
	
        $work_group_id = $_REQUEST['work_group_id'];

        if($work_group_id != ''){
            $wh = " AND work_group_users.work_group_id = '$work_group_id'";
        }

        $columnCount = 		$_REQUEST['count'];
		$cols[]      =      $_REQUEST['cols'];

            $db->setQuery("SELECT work_group_users.id,
                                    CONCAT(users.firstname, ' ', users.lastname),
                                    IF(work_group_users.is_boss = 1,'<b>კი</b>','არა'),
                                    work_group_users.salary_percent,
                                    if(work_group_users.finished_work = 0,'<b>აქტიური</b>','დასრულებული')

                            FROM work_group_users
                            JOIN users ON users.id = work_group_users.user_id
                            WHERE work_group_users.actived = 1 $wh
                            ORDER BY work_group_users.is_boss DESC");

        $result = $db->getKendoList($columnCount, $cols);
        $data = $result;
        break;

    case 'get_edit_page':
        $id = $_REQUEST['id'];
        if($id == '' OR !isset($_REQUEST['id'])){
            $db->setQuery("INSERT INTO work_group SET actived = 1");
            $db->execQuery();

            $id = $db->getLastId();

            $db->setQuery("DELETE FROM work_group WHERE id='$id'");
            $db->execQuery();
        }
        $data = array('page' => getPage($id, getWorkGroup($id)));
    break;
    case 'get_work_user':
        $id = $_REQUEST['id'];
        $data = array('page' => getPageUser($id, getWorkUser($id)));
        break;
    case 'save_w_user':
        $id = $_REQUEST['id'];


        $w_user_id      = $_REQUEST['w_user_id'];
        $is_boss      = $_REQUEST['is_boss'];
        $salary      = $_REQUEST['salary'];
        $work_group_id      = $_REQUEST['work_group_id'];
        
        
        if($id == ''){
            $db->setQuery(" INSERT INTO  work_group_users
                            SET     `user_id` = '$w_user_id',
                                    `is_boss` = '$is_boss',
                                    `salary_percent` = '$salary',
                                    `work_group_id` = '$work_group_id'");
            $db->execQuery();
        }
        else{
            $db->setQuery(" UPDATE  work_group_users
                            SET     `user_id` = '$w_user_id',
                                    `is_boss` = '$is_boss',
                                    `salary_percent` = '$salary',
                                    `work_group_id` = '$work_group_id'

                            WHERE   id = '$id'");
            $db->execQuery();
        }
    break;

    case 'save_work_group':
        $id = $_REQUEST['id'];


        $name      = $_REQUEST['work_group_name'];
        $proc_id      = $_REQUEST['proc_id'];
        $work_date      = $_REQUEST['work_date'];
        
        
        $db->setQuery(" SELECT  COUNT(*) AS cc
                        FROM    work_group
                        WHERE   id = '$id' AND actived = 1");
        $isset = $db->getResultArray();

        if($isset['result'][0]['cc'] == 0){
            $db->setQuery("INSERT INTO work_group SET
                                                id = '$id',
                                                name='$name',
                                                proc_id='$proc_id',
                                                work_date='$work_date'");

            $db->execQuery();
            
        }

        else{
            $db->setQuery("UPDATE work_group SET    name='$name',
                                                    proc_id='$proc_id',
                                                    work_date='$work_date'
                            WHERE id='$id'");
            $db->execQuery();
            
        }
        break;
}

echo json_encode($data);


function getPageUser($id = '', $res = ''){

    if($res['is_boss'] == 1){
        $is_boss_yes = 'selected';
    }
    
    $data .= '
    
    
    <fieldset class="fieldset">
        <legend>ინფორმაცია</legend>
        <div class="row">
            <div class="col-sm-4">
                <label>თანამშრომელი</label>
                <select id="w_user_id">
                    <option value="0">აირჩიეთ</option>
                    '.getUsers($res['user_id']).'
                </select>
            </div>
            <div class="col-sm-4">
                <label>უფროსი?</label>
                <select id="is_boss">
                    <option value="0">არა</option>
                    <option value="1" '.$is_boss_yes.'>კი</option>
                </select>
            </div>
            <div class="col-sm-4">
                <label>წილი</label>
                <input value="'.$res['salary_percent'].'" data-nec="0" style="height: 18px; width: 95%;" type="number" id="w_user_percent" class="idle" autocomplete="off">
            </div>

            
        </div>
    </fieldset>
    <input type="hidden" id="work_group_user_id" value="'.$id.'">
    ';

    return $data;
}
function getPage($id = '', $res = ''){
    $data .= '
    
    
    <fieldset class="fieldset">
        <legend>ინფორმაცია</legend>
        <div class="row">
            <div class="col-sm-4">
                <label>დასახელება</label>
                <input value="'.$res['name'].'" data-nec="0" style="height: 18px; width: 95%;" type="text" id="work_group_name" class="idle" autocomplete="off">
            </div>
            <div class="col-sm-4">
                <label>პროცესი</label>
                <select id="proc_id">
                    <option value="0">აირჩიეთ</option>
                    '.getProc($res['proc_id']).'
                </select>
            </div>
            
            <div class="col-sm-4">
                <label>თარიღი</label>
                <input value="'.$res['work_date'].'" data-nec="0" style="height: 18px; width: 95%;" type="text" id="work_date" class="idle" autocomplete="off">
            </div>

            
        </div>
    </fieldset>

    <fieldset class="fieldset">
        <legend>ჯგუფის წევრები</legend>
        <div class="row">
            <div class="col-sm-12">
                <div id="work_group_users"></div>
            </div>
        
        </div>
    </fieldset>
    <input type="hidden" id="work_group_id" value="'.$id.'">
    ';

    return $data;
}
function getUsers($id){
    GLOBAL $db;

    $db->setQuery("SELECT   id,
                            CONCAT(firstname,' ',lastname) AS 'name'
                    FROM    users");

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
function getProc($id){
    GLOBAL $db;

    $db->setQuery("SELECT   id,
                            name AS 'name'
                    FROM    groups
                    WHERE   id NOT IN (1,10,11,12,13,14,15)");

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
function getWorkGroup($id){
    GLOBAL $db;
    $db->setQuery(" SELECT 	work_group.id,
                            work_group.name,
                            work_group.proc_id,
                            work_group.work_date
                        
                            
                    FROM 	work_group
                    WHERE   work_group.id = '$id'");

    $result = $db->getResultArray();



    return $result['result'][0];
}
function getWorkUser($id){
    GLOBAL $db;
    $db->setQuery(" SELECT 	work_group_users.id,
                            work_group_users.user_id,
                            work_group_users.is_boss,
                            work_group_users.salary_percent
                        
                            
                    FROM 	work_group_users
                    WHERE   work_group_users.id = '$id'");

    $result = $db->getResultArray();



    return $result['result'][0];
}
?>