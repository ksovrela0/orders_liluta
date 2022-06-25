<?php
error_reporting(E_ERROR);
include('../db.php');
GLOBAL $db;
$db = new dbClass();
$act = $_REQUEST['act'];
$user_id = $_SESSION['USERID'];

switch ($act){
    case 'get_count':
        $db->setQuery(" SELECT  groups.id, 
                                name,
                                IF(groups.id = 2,(SELECT COUNT(*) FROM lists_to_cut WHERE actived = 1 AND status_id = 2), (SELECT COUNT(*) FROM glasses_paths WHERE glasses_paths.path_group_id = groups.id AND glasses_paths.status_id = 2 AND glasses_paths.actived = 1)) AS cc_active,
                                
                                
                                IF(groups.id = 2,(SELECT COUNT(*) FROM lists_to_cut WHERE actived = 1 AND status_id = 1),
                                
                                (SELECT COUNT(*) FROM `glasses_paths` WHERE actived = 1 AND path_group_id = groups.id AND status_id = 1 AND IFNULL((SELECT status_id FROM glasses_paths AS path WHERE path.actived = 1 AND path.glass_id = glasses_paths.glass_id AND path.sort_n = glasses_paths.sort_n-1), 3) = 3 AND IFNULL((SELECT status_id FROM lists_to_cut WHERE glass_id = glasses_paths.glass_id AND actived = 1), 3) = 3)
                                ) AS cc_queue
                        FROM    groups
                        
                        
                        WHERE groups.actived = 1 AND groups.id NOT IN (1)
                        
                        GROUP BY groups.id");
        $processes = $db->getResultArray()['result'];


        $data = array();
        foreach($processes AS $proc){
            array_push($data, array("id" => $proc['id'], "title" => $proc['name'], "active" => $proc['cc_active'], "queue" => $proc['cc_queue']));
        }
    break;

}

echo json_encode($data);
?>