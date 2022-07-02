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
                                
                                (SELECT COUNT(*) FROM `glasses_paths` WHERE actived = 1 AND path_group_id = groups.id AND status_id = 1 AND IFNULL((SELECT status_id FROM glasses_paths AS path WHERE path.actived = 1 AND path.glass_id = glasses_paths.glass_id AND path.sort_n = glasses_paths.sort_n-1), 3) = 3 AND IFNULL((SELECT status_id FROM lists_to_cut WHERE glass_id = glasses_paths.glass_id AND actived = 1), IF((SELECT COUNT(*) FROM products_glasses WHERE id = glasses_paths.glass_id AND go_to_cut = 1 AND products_glasses.actived = 1) > 0,1,3)) = 3)
                                ) AS cc_queue
                        FROM    groups


                        WHERE groups.actived = 1 AND groups.id NOT IN (1);");
        $processes = $db->getResultArray()['result'];


        $data = array();
        foreach($processes AS $proc){
            array_push($data, array("id" => $proc['id'], "title" => $proc['name'], "active" => $proc['cc_active'], "queue" => $proc['cc_queue']));
        }

        $db->setQuery("SELECT SUM(IF(lists_to_cut.id IS NULL, 1,0)) AS cc
        
                        FROM products_glasses
                        LEFT JOIN lists_to_cut ON lists_to_cut.glass_id = products_glasses.id AND lists_to_cut.actived = 1
                        WHERE products_glasses.actived = 1 AND products_glasses.go_to_cut = 1 AND products_glasses.status_id  =1");

        $cut_queue = $db->getResultArray()['result'][0]['cc'];
        array_push($data, array("id" => 999, "title" => "ჭრის მართვა", "queue" => $cut_queue));

    break;
    case 'read_notification_all':
        $db->setQuery("UPDATE notifications SET seen = 1 WHERE user_id = '$user_id'");
        $db->execQuery();

        $data = array('status' => 'OK');
    break;
    case 'get_notification_new':
        $db->setQuery("SELECT *
                    FROM notifications
                    WHERE actived = 1 AND user_id = '$user_id' AND seen = 0
                    ORDER BY id DESC");
        $notifications = $db->getResultArray();

        $data = $notifications['result'];
    break;
}

echo json_encode($data);
?>