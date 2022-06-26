<?php
include('../db.php');
GLOBAL $db;

$db = new dbClass();
$user_gr = $_SESSION['GRPID'];
?>
<div class="main-sidebar main-sidebar-sticky side-menu ps">
    <div class="sidemenu-logo"> <a class="main-logo" href="index.php"> <img src="assets/img/brand/logo.png" class="header-brand-img desktop-logo" alt="logo"> <img src="assets/img/brand/icon.png" class="header-brand-img icon-logo" alt="logo"> <img src="assets/img/brand/logo-light.png" class="header-brand-img desktop-logo theme-logo" alt="logo"> <img src="assets/img/brand/icon-light.png" class="header-brand-img icon-logo theme-logo" alt="logo"> </a> </div>
    <div class="main-sidebar-body">
        <ul class="nav">
            <?php
                $menu_li;
                $db->setQuery(" SELECT 		menu_detail.id,
                                            menu_detail.icon,
                                            menu_detail.name,
                                            menu_detail.url

                                FROM 		menu_detail
                                JOIN 		group_pages ON group_pages.page_id = menu_detail.id

                                WHERE 		menu_detail.actived = 1 AND group_pages.group_id = '$user_gr'
                                ORDER BY 	menu_detail.position ASC");
                $menu = $db->getResultArray();
                foreach($menu['result'] AS $item){
                    if($item[url] == '#'){
                        $menu_li .= '<li class="nav-label">'.$item[name].'</li>';
                        if($item['id'] == 15){
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
                            $menu_li .= '<li class="nav-item"> <a class="nav-link" href="index.php?page=manage_cut"><i class="fe fe-database"></i> ჭრის მართვა</a> </li>';
                            foreach($processes AS $group){
                                $menu_li .= '<li class="nav-item"> <a class="nav-link" href="index.php?page=processes&id='.$group['id'].'"><i class="fe fe-database"></i><span class="sidemenu-label" id="proccess_'.$group['id'].'">'.$group[name].' <span style="color: #95952a;">('.$group[cc_active].')</span> <span style="color: red;">('.$group[cc_queue].')</span> </span></a> </li>';
                            }
                        }
                    }
                    else{
                        $menu_li .= '<li class="nav-item"> <a class="nav-link" href="index.php?page='.$item[url].'">'.$item[icon].'<span class="sidemenu-label">'.$item[name].'</span></a> </li>';
                    }
                }
                echo $menu_li;
            ?>
            
            
        </ul>
    </div>
    <div class="ps__rail-x" style="left: 0px; top: 0px;">
        <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
    </div>
    <div class="ps__rail-y" style="top: 0px; right: 0px;">
        <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
    </div>
</div>