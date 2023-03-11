<html lang="en">

<head>
	<style data-styles="">
	ion-icon {
		visibility: hidden
	}
	
	.hydrated {
		visibility: inherit
	}
	</style>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
	<meta name="description" content="Dashlead -  Admin Panel HTML Dashboard Template">
	<meta name="author" content="Spruko Technologies Private Limited">
	<meta name="keywords" content="sales dashboard, admin dashboard, bootstrap 4 admin template, html admin template, admin panel design, admin panel design, bootstrap 4 dashboard, admin panel template, html dashboard template, bootstrap admin panel, sales dashboard design, best sales dashboards, sales performance dashboard, html5 template, dashboard template">
	<!-- Favicon -->
	<link rel="icon" href="assets/img/brand/logo.png" type="image/x-icon">
	<!-- Title -->
	<title>ლილუტა - Panel</title>
	<!---Fontawesome css-->
	<?php include('includes/functions.php'); ?>
	<script type="text/javascript">
	<!--
	eraf = document.all;
	dc5b = eraf && !document.getElementById;
	kics = eraf && document.getElementById;
	vvw6 = !eraf && document.getElementById;
	k3zr = document.layers;

	function ka10(aqer) {
		try {
			if(dc5b) alert("");
		} catch(e) {}
		if(aqer && aqer.stopPropagation) aqer.stopPropagation();
		return false;
	}

	function eyav() {
		if(event.button == 2 || event.button == 3) ka10();
	}

	function g0fy(e) {
		return(e.which == 3) ? ka10() : true;
	}

	function hr0x(bta0) {
		for(cx54 = 0; cx54 < bta0.images.length; cx54++) {
			bta0.images[cx54].onmousedown = g0fy;
		}
		for(cx54 = 0; cx54 < bta0.layers.length; cx54++) {
			hr0x(bta0.layers[cx54].document);
		}
	}

	function pzuk() {
		if(dc5b) {
			for(cx54 = 0; cx54 < document.images.length; cx54++) {
				document.images[cx54].onmousedown = eyav;
			}
		} else if(k3zr) {
			hr0x(document);
		}
	}

	function rqaz(e) {
		if((kics && event && event.srcElement && event.srcElement.tagName == "IMG") || (vvw6 && e && e.target && e.target.tagName == "IMG")) {
			return ka10();
		}
	}
	if(kics || vvw6) {
		document.oncontextmenu = rqaz;
	} else if(dc5b || k3zr) {
		window.onload = pzuk;
	}

	function kzji(e) {
		artx = e && e.srcElement && e.srcElement != null ? e.srcElement.tagName : "";
		if(artx != "INPUT" && artx != "TEXTAREA" && artx != "BUTTON") {
			return false;
		}
	}

	function mys2() {
		return false
	}
	if(eraf) {
		document.onselectstart = kzji;
		document.ondragstart = mys2;
	}
	if(document.addEventListener) {
		document.addEventListener('copy', function(e) {
			artx = e.target.tagName;
			if(artx != "INPUT" && artx != "TEXTAREA") {
				e.preventDefault();
			}
		}, false);
		document.addEventListener('dragstart', function(e) {
			e.preventDefault();
		}, false);
	}

	function ta6m(evt) {
		if(evt.preventDefault) {
			evt.preventDefault();
		} else {
			evt.keyCode = 37;
			evt.returnValue = false;
		}
	}
	var q9vo = 1;
	var n7zy = 2;
	var w0mu = 4;
	var u3jz = new Array();
	u3jz.push(new Array(n7zy, 65));
	u3jz.push(new Array(n7zy, 67));
	u3jz.push(new Array(n7zy, 80));
	u3jz.push(new Array(n7zy, 83));
	u3jz.push(new Array(n7zy, 85));
	u3jz.push(new Array(q9vo | n7zy, 73));
	u3jz.push(new Array(q9vo | n7zy, 74));
	u3jz.push(new Array(q9vo, 121));
	u3jz.push(new Array(0, 123));

	function s8fj(evt) {
		evt = (evt) ? evt : ((event) ? event : null);
		if(evt) {
			var jn0n = evt.keyCode;
			if(!jn0n && evt.charCode) {
				jn0n = String.fromCharCode(evt.charCode).toUpperCase().charCodeAt(0);
			}
			for(var u2ym = 0; u2ym < u3jz.length; u2ym++) {
				if((evt.shiftKey == ((u3jz[u2ym][0] & q9vo) == q9vo)) && ((evt.ctrlKey | evt.metaKey) == ((u3jz[u2ym][0] & n7zy) == n7zy)) && (evt.altKey == ((u3jz[u2ym][0] & w0mu) == w0mu)) && (jn0n == u3jz[u2ym][1] || u3jz[u2ym][1] == 0)) {
					ta6m(evt);
					break;
				}
			}
		}
	}
	if(document.addEventListener) {
		document.addEventListener("keydown", s8fj, true);
		document.addEventListener("keypress", s8fj, true);
	} else if(document.attachEvent) {
		document.attachEvent("onkeydown", s8fj);
	}
	</script>
	<meta http-equiv="imagetoolbar" content="no">
	<style type="text/css">

	<style type="text/css" media="print">
	< !-- body {
		display: none
	}
	.k-grid-header th .k-grid-filter {
		top: 7px!important;
		right: 0!important;
	}
	.k-grid-header .k-header {
		position: relative!important;
		vertical-align: middle !important;
		cursor: default!important;
		padding: 0!important;
	}
	</style>
	<!--[if gte IE 5]><frame></frame><![endif]-->
	<script src="file:///C:/Users/giorgi/AppData/Local/Temp/Rar$EXa10780.17568/www.spruko.com/demo/dashlead/assets/plugins/ionicons/ionicons/ionicons.z18qlu2u.js" data-resources-url="file:///C:/Users/giorgi/AppData/Local/Temp/Rar$EXa10780.17568/www.spruko.com/demo/dashlead/assets/plugins/ionicons/ionicons/" data-namespace="ionicons"></script>
</head>

<body class="main-body main-sidebar-hide">
	
	<!-- Start Switcher -->
	<?php include('includes/switcher.php'); ?>
	<!-- End Switcher -->
	<!-- Loader -->
	<div id="global-loader" style="display: none;"> <img src="assets/img/loader.svg" class="loader-img" alt="Loader"> </div>
	<!-- End Loader -->
	<!-- Page -->
	<div class="page">
		<!-- Sidemenu -->
		<?php include('includes/menu.php'); ?>
		<!-- End Sidemenu -->
		<!-- Main Content-->
		<div class="main-content side-content pt-0">
			<!-- Main Header-->
			<?php include('includes/header.php'); ?>
			<!-- End Main Header-->
			<div class="container-fluid">
				<!-- Page Header -->
				<div class="page-header">
					<div>
						<h2 class="main-content-title tx-24 mg-b-5">მწარმოებლები</h2>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">პარამეტრები</a></li>
							<li class="breadcrumb-item active" aria-current="page">მწარმოებლები</li>
						</ol>
					</div>
				</div>
				<!-- End Page Header -->
				<!-- Row -->
				
                    <?php
                    $setUser__ID = 1;
                    $curYearMonth = date("Y-m");
                    $curYearMonthExplode = explode("-", $curYearMonth);
                    $minusMonth = str_pad($curYearMonthExplode[1] - 1, 2, '0', STR_PAD_LEFT);

                    if(date("Y-m-d") < $curYearMonth."-10"){ $targetDate = $curYearMonthExplode[0]."-".$minusMonth; }else{ $targetDate = $curYearMonth; }

                    $params['date']=$curYearMonth;


                    // if ($params['date'] < '2021-05' || $params['date'] > $targetDate) {
                    //     $params['date'] = $targetDate;
                    // }



                    $targetMonth = $params['date'];
                    $filteredDate = date("Y-m", strtotime($targetMonth));
                    $lastDate = date("Y-m-t", strtotime($targetMonth));

                    /** Holiday List */
                    $db->setQuery("
                        SELECT 
                            * 
                        FROM 
                            holidays
                        WHERE 
                            tarigi >= '".$filteredDate."-01'  AND 
                            tarigi <= '".$lastDate."' 
                    ");

                    $holidays = $db->getResultArray()['result'];


                    $holidaysArray = array();  //  ასოცირებული მასივი სადაც key იქნება თარიღი და value იქნება name

                    foreach ($holidays as $key => $val) {
                        $holidaysArray[$val['tarigi']] = $val['name'];
                    }


                    /** OverTime List */
                    $overtimes = array();

                    $overtimesArray = array();  // overtime - ის გადაწერა დაჯამებულზე


                    // if ($setUser__ID == 6509) {
                    //     print_r($overtimes);
                    // }



                    foreach ($overtimes as $key => $val) {
                        $overtimesArray[$val['person_id']] = $val['time'];
                    }

                    /** ნანახია სტატუსის დააფდეითება */
                    $seenArray = array();

                    /* $view = $msDB->getArray("
                        SELECT
                            person_id,
                            FORMAT(updated_at , 'yyyy-MM-dd  HH:mm') as updated_at
                        FROM
                            tbl_tabel_view
                        WHERE
                            deleted = 1 AND
                            tabel_date = '".$targetMonth."'
                    ");


                    foreach ($view as $key => $val) {
                        $seenArray[$val['person_id']] = $val['updated_at'];
                    } */


                    /** Comment types*/
                    /* $commentTypes = $msDB->getArray("
                        SELECT 
                            *
                        FROM 	
                            tbl_comment_types as tct
                        WHERE 
                            tct.deleted = 1
                        ORDER BY 
                            tct.name
                    "); */

                    /** Graphic types*/
                    $db->setQuery("
                        SELECT 
                            *
                        FROM 	
                            tbl_schedule_types as tst
                        WHERE 
                            tst.deleted = 1
                    ");
                    $grTypes = $db->getResultArray()['result'];
                    /** Current Schedule Type for auth user */
                    $db->setQuery("
                        SELECT 
                            tbl_schedule_type_id 
                        FROM 
                            users
                        WHERE   
                            id = $setUser__ID
                    ");
                    $schedulType = $db->getResultArray()['result'];

                    $myS = $schedulType ? $schedulType['tbl_schedule_type_id'] : '';
                    $gr = null;

                    foreach ($grTypes as $item) {
                        if ($item['id'] === $myS) {
                            $gr = $item;
                        }
                    }


                    /** Work hours  & Person info */
                    $db->setQuery("
                    SELECT 
                    p.id as person_id,
                    p.firstname AS name_first , 
                    p.lastname AS name_last , 
                    '' as work_time_id,
                    '' AS name,
                    '' AS time_start,
                    '' AS time_end,
                    '' AS latecome,
                    '' AS earlygo,
                    '' AS checkin,
                    '' AS checkout,
                    '' AS workingminutes,
                    '' AS ganakveti,
                    '' as date_start_real,
                    '' as date_end_real,
                    '' AS vtype,
                    '' AS order_temp_id,
                    '' as trip_start_date,
                    '' as trip_end_date
                    FROM
                    users as p 
                    WHERE 
                    p.id =  $setUser__ID
                        
                    ");

                    $workingGraphicType = $db->getResultarray()['result'];

                    $workTimeArray = array();  //  ასოცირებული მასივი სადაც key იქნება მომხმარებლის id

                    $workTimeArray[$setUser__ID]['vac'] = [];


                    foreach ($workingGraphicType as $key => $val) {
                        
                        $workTimeArray[$val['person_id']]['person_id'] = $val['person_id'];
                        $workTimeArray[$val['person_id']]['name_first'] = $val['name_first'];
                        $workTimeArray[$val['person_id']]['name_last']  = $val['name_last'];
                        $workTimeArray[$val['person_id']]['work_time_id']  = $val['work_time_id'];
                        $workTimeArray[$val['person_id']]['name']  = $val['name'];
                        $workTimeArray[$val['person_id']]['time_start']  = $val['time_start'];
                        $workTimeArray[$val['person_id']]['time_end']  = $val['time_end'];
                        $workTimeArray[$val['person_id']]['latecome']  = $val['latecome'];
                        $workTimeArray[$val['person_id']]['earlygo']  = $val['earlygo'];
                        $workTimeArray[$val['person_id']]['checkin']  = $val['checkin'];
                        $workTimeArray[$val['person_id']]['checkout']  = $val['checkout'];
                        $workTimeArray[$val['person_id']]['workingminutes']  = $val['workingminutes'];
                        $workTimeArray[$val['person_id']]['ganakveti']  = $val['ganakveti'];
                        $workTimeArray[$val['person_id']]['date_start_real']  = $val['date_start_real'];
                        $workTimeArray[$val['person_id']]['date_end_real']  = $val['date_end_real'];
                        $workTimeArray[$val['person_id']]['vtype']  = $val['vtype'];
                        $workTimeArray[$val['person_id']]['order_temp_id']  = $val['order_temp_id'];
                        
                        if (empty($workTimeArray[$val['person_id']]['trip_start_date'])) {
                            $workTimeArray[$val['person_id']]['trip_start_date']  = $val['trip_start_date'];
                            $workTimeArray[$val['person_id']]['trip_end_date']  = $val['trip_end_date'];
                        }
                        
                        /*$date = $val['date_start_real'].':'.$val['date_end_real'].':'.$val['vtype'].':'.$val['order_temp_id'];
                        array_push($workTimeArray[$setUser__ID]['vac'], $date);*/
                    }
                    /** Vacations  */
                        $vacations = array();
                            

                            
                        foreach ($vacations as $vac) {
                            if (isset($workTimeArray[$vac['person_id']]['vac'])) {
                                array_push($workTimeArray[$vac['person_id']]['vac'], $vac['date']);
                            } else {
                                $workTimeArray[$vac['person_id']]['vac'] = [$vac['date']];
                            }
                        }
                        
                        

                    /** Trips  */
                    $trips = array();

                    $tripsOnlyOrder = array();


                    foreach ($trips as $trip) {
                        if (isset($workTimeArray[$trip['person_id']]['trips'])) {
                            array_push($workTimeArray[$trip['person_id']]['trips'], $trip['date']);
                        } else {
                            $workTimeArray[$trip['person_id']]['trips'] = [$trip['date']];
                        }
                    }

                    foreach ($tripsOnlyOrder as $trip) {
                        if (isset($workTimeArray[$trip['person_id']]['trips'])) {
                            array_push($workTimeArray[$trip['person_id']]['trips'], $trip['date']);
                        } else {
                            $workTimeArray[$trip['person_id']]['trips'] = [$trip['date']];
                        }
                    }


                    /** Comments */
                    $comments = array();


                    foreach ($comments as $comment) {
                        if (isset($workTimeArray[$comment['author_id']]['notification'])) {
                            array_push($workTimeArray[$comment['author_id']]['notification'], $comment['date']);
                        } else {
                            $workTimeArray[$comment['author_id']]['notification'] = [$comment['date']];
                        }
                    }



                    /**Schedules **/
                        /* $schedules = $msDB->getArray("
                                SELECT  
                                    p.id as person_id,
                                    tg.plan_in,
                                    tg.plan_out,
                                    tg.plan_date,
                                    tg.is_night,
                                    FORMAT(tg.plan_date, 'yyyy-MM-dd') as day,
                                    FORMAT(tg.plan_date, 'dd') as ng,
                                    CONCAT(   FORMAT(tg.plan_in,'HH:mm')  ,'-',  FORMAT(tg.plan_out,'HH:mm')  )  as times ,
                                    DATEDIFF(second, tg.plan_in ,tg.plan_out) / 60 as working_hours,
                                    ps.hpw,
                                    ps.ganakveti
                                FROM 
                                    people as p 
                                LEFT JOIN 
                                    people_structure as ps
                                        ON
                                            p.id = person_id AND
                                            ps.is_active = 2 AND
                                            ps.deleted = 1
                                LEFT JOIN 
                                    tbl_grafiki as tg
                                        ON 
                                            tg.person_id = p.id AND tg.deleted = 1 AND
                                            tg.plan_date >= '".$firstDate."'  AND 
                                            tg.plan_date <= '".$lastDate."'  AND 
                                            tg.plan_in IS NOT NULL AND
                                            tg.plan_out IS NOT NULL 
                                WHERE
                                    p.id = $setUser__ID
                                GROUP BY 
                                    p.id ,
                                    tg.plan_in,
                                    tg.plan_out,
                                    tg.is_night,
                                    tg.plan_date,
                                    ps.hpw,
                                    ps.ganakveti
                                ORDER BY 
                                    p.id , tg.plan_date
                        "); */
                        
                        $schedule = array();
                        foreach ($schedules as $dat) {
                            $workTimeArray[$dat['person_id']]['schedule'][$dat['day']] = $dat['times'].'-'.$dat['working_hours'].'-'.$dat['hpw'].'-'.$dat['ganakveti'];
                            $workTimeArray[$dat['person_id']]['is_night'][$dat['ng']] = $dat['is_night'];
                        }


                    /** Face Log  ( in  , out  ) times */
                    $db->setQuery("
                        SELECT 
                            tf.userID AS UserID,
                            p.tbl_schedule_type_id as schedule_type,
                            tst.name as schedule_name,
                            DAY(tf.authDate) as day, 
                            DATE_FORMAT(MIN(tf.authDateTime),'%H:%i') as real_in,
                            DATE_FORMAT(MAX(tf.authDateTime),'%H:%i') as real_out,
                            tst.plan_in,
                            tst.plan_out,
                            tst.working_minutes,
                            tst.check_in,
                            tst.check_out,
                            tst.check_wm,
                            tst.latecome,
                            tst.earlygo,
                            ROUND(TIMESTAMPDIFF(second, MIN(tf.authDateTime) ,MAX(tf.authDateTime)) / 60) as working_hours,
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
                            tf.authDate >= '".$filteredDate."-01'  AND 
                            tf.authDate <= '$lastDate' AND
                            tf.userID = $setUser__ID
                        GROUP BY
                            tf.userID ,
                            tf.authDate
                        ORDER BY 
                            tf.userID DESC,
                            tf.authDate
                    ");

                    $attendance = $db->getResultArray()['result'];
                    /**  if date is in weekend */
                    function isWeekend($date)
                    {
                        return (date('N', strtotime($date)) >= 6);
                    }

                    function nonWorkingDay($date, $personID, $gType)
                    {
                        if ($gType === 3) {  // მხოლოდ მცოცავი გრაფიკის შემთხვევა (ქსელი),  რომელსაც ყოველი სამუშაო დღე ინდივიდიუალურად აქვს აღწერილი ბაზაში.
                            return	!isset($workTimeArray[$personID]['schedule'][$date]) ;
                        } else {  // დანარჩენ შემთხვევაში დასვენების დღეები მხოლოდ შაბათ კვირაა
                            return (date('N', strtotime($date)) >= 6);
                        }
                    }


                    $wdays = [
                        'Monday' => 'ორშ.',
                        'Tuesday' => 'სამ.',
                        'Wednesday' => 'ოთხ.',
                        'Thursday' => 'ხუთ.',
                        'Friday' => 'პარ.',
                        'Saturday' => 'შაბ.',
                        'Sunday' => 'კვ.'
                    ];




                    /** ნანახია სტატუსის დააფდეითება */
                    /* $view = $msDB->getRow("
                        SELECT
                            * 
                        FROM
                            tbl_tabel_view
                        WHERE
                            deleted = 1 AND
                            tabel_date = '".$targetMonth."' AND
                            person_id = ".$setUser__ID."
                    ");


                    $insertDataList['person_id'] = $setUser__ID;
                    $insertDataList['tabel_date'] = $targetMonth;
                    $insertDataList['updated_at'] = date("Y-m-d H:i:s");
                    $insertDataList['deleted'] = 1;
                    $insertDataList['seen_number'] = 1;

                    if ($view) {
                        $insertDataList['seen_number'] =  $view['seen_number'] + 1;
                        $tmExplode = explode("-", $targetMonth);
                        $plusMonth = str_pad($tmExplode[1] + 1, 2, '0', STR_PAD_LEFT);

                        $lastTargetMonth = $tmExplode[0]."-".$plusMonth."-10";
                        if(date("Y-m-d") < $lastTargetMonth){
                            if ($msDB->AutoExecute("tbl_tabel_view", $insertDataList, 'UPDATE', "id = ".$view['id'])) {
                                //  განახლდა
                            } else {
                                //  ვერ განახლდა
                            }
                        }
                    } else {
                        $insertDataList['created_at'] = date("Y-m-d H:i:s");

                        if ($msDB->AutoExecute("tbl_tabel_view", $insertDataList)) {
                            //  დაემატა
                        } else {
                            // ვერ დაემატა
                        }
                    } */


                    ?>


                    <style>
                            .popUp {
                            position:absolute;
                            width:80%;
                            left:10%;
                            display:none;
                            }

                            .popUp > .row > div {
                                box-shadow:0px 0px 3px gray;
                                background-color:white;
                                padding:40px;
                            }     

                            .popUp  .glyphicon {
                                cursor:pointer;
                            }
                                
                            .popUp .grafikType > div {
                                display:none;
                            }

                            .popUp .list-group .row > .col-sm-6 {
                                padding-top:7px;
                                padding-bottom:8px;
                            }

                            .popUp .list-group .row > .col-sm-4 > span {
                                margin-top:7px;
                                display:block;
                            }

                            .popUp .list-group .row > .col-sm-4 > div {
                                display:none;
                            }

                            .popUp .list-group .row > .col-sm-2 > span  {
                                margin-top:12px;
                                display:block;
                            }
                        
                            .popUp .list-group .row > .col-sm-2 > .action {
                                    padding-top:12px;
                                    display:none;
                            }

                            .popUp .list-group .row > .col-sm-2 > .action span {
                                margin-left:5px;
                            }
                            .main_head_tabel td{
                                color:#fff!important;
                                padding:10px!important;
                            }
                            /** table */
                            table > thead > tr {
                                background-color:darkblue;
                                color:white!important;
                                font-weight:bold;
                            }

                            table > tbody  > tr > td {
                                background-color:white;
                                border:0px !important;
                                padding-left:3px!important;
                                padding-right:3px!important;
                            }

                            table td  p{
                                margin-top:10px;    
                                padding-bottom: 2px;
                            }
                            
                            table .nAproved {
                                border-bottom:3px solid darkblue;
                            }
                            
                            table .nWaiting {
                                border-bottom:3px solid red;
                            }
                            
                            table .warningDay {
                                color:red;
                            }

                            table > tbody  > tr  .dayDetail {
                                cursor:pointer;
                            }

                            table > tbody   .noworkingday {
                                background:#efa53d24;
                            }

                            table > tbody >  tr >  td  .inOutInfo{
                                position:absolute;
                                background:#f9f7f7;
                                padding:10px;
                                overflow:hidden;
                                border: 1px solid lightgray;
                                display:none;
                            } 

                            table > tbody > tr > td:hover .inOutInfo {
                                display:block;
                                padding:0px!important;
                            }
                            table > tbody > tr > td:hover .inOutInfo ul{
                                padding:10px;
                                list-style: none;
                                margin:0!important;
                            }
                            .view .overTimeH  i {
                                font-style: normal;
                                margin-left: 20px;
                                box-shadow:0px 0px 2px gray;
                                color: #333333;
                                padding: 5px;
                                cursor:pointer;
                            }
                            
                            .shenishvnebi {
                                position: absolute;
                                top: 20%;
                                margin: auto;
                                width: 30%;
                                left: 40%;
                                box-shadow: 0px 0px 8px 3px lightgrey;
                                display:none;
                            }

                            .shenishvnebi .panel-heading {
                                position:relative;
                                overflow:hidden;
                            }
                            
                            .shenishvnebi .panel-heading p{
                                padding-top: 8px;
                            }
                            
                            .shenishvnebi .panel-footer p {
                                    font-size: 12px;
                                    color: red;
                                    text-align: justify;
                            }
                            
                        </style>



                        <div class="panel panel-default">

                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-sm-7">
                                        <p class="wn-font-capital">ფილტრაცია</p>
                                    </div>
                                </div>
                            </div>
                                
                            <div class="panel-body">
                                <form class="row" action = '' method = "get" >
                                    <div class="col-md-8">
                                    
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="control-label wn-font-normal small " for="date">თარიღი</label>
                                        
                                            <div class="input-group date-picker" >
                                                <input type="text" name="date" id="date" min='2021-03-01' max='2021-04-31'  value="<?php echo $params['date'] ?? $params['date']  ?>" class="form-control required lime-data-send is_date"  data-date-format="YYYY-MM"/>
                                                <span class="input-group-addon"> 
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-1">
                                        <div class="form-group">
                                            <div class="col-xs-12 text-right">
                                                <label class="wn-font-normal "> &nbsp;</label>
                                                <button class="btn btn-primary "> ძებნა </button>
                                            </div>
                                        </div>
                                    </div>   
                                
                                </form> 	
                            </div>
                        </div>


                    </div>


                    <div class="row">
                        <div class="col-sm-12 ">
                            <div class="table-responsives">
                                <table class="table table-hover table-striped table-bordered table-condensed small">
                                    <thead class="main_head_tabel">
                                        <tr>
                                            <td class='text-center'>#</td>
                                            <td class='text-center'>სახელი გვარი</td>
                                            <?php
                                                $end = date("t", strtotime($targetMonth));   // თვის ბოლო დღე

                                                for ($i =  1  ; $i <= $end ; $i ++) {
                                                    echo "<td class='text-center'>$i</td>";
                                                }
                                            ?>
                                            <td class='text-center'>საათები</td>
                                            <td class='text-center'>დღეები</td>
                                            <td class='text-center'>უქმე დღეს ნამუშევარი</td>
                                            <td class='text-center'>არნამუშევარი საათები</td>
                                            <td></td>
                                        </tr>                   
                                    </thead>

                                    <tbody>
                                        <?php
                                                echo '<tr class="table_'.$setUser__ID.'"><pre>';

                                                //var_dump($workTimeArray);
                                                echo '  <td class="text-center">
                                                            <p>
                                                                '.$workTimeArray[$setUser__ID]['person_id'].'
                                                            </p>
                                                        </td>
                                                        <td class="text-center">
                                                            <p>
                                                                '.$workTimeArray[$setUser__ID]['name_first']." ".$workTimeArray[$setUser__ID]['name_last'] .'
                                                            </p>
                                                        </td>';

                                                        $day = 1; // მიმდინარე დღის ინიცირება
                                                        $workingDays = 0; // ნამუშევარი დღეები
                                                        $workingNightDays = 0; // საღამოს სმენის ნამუშევარი საათები
                                                        $workingHours = 0; // ნამუშევარი საათები
                                                        $workingHolidays = 0; // დასვენების პერიოდში  ნამუშევარი დღეები
                                                        $workingHolidaysHours = 0; // დასვენების პერიოდში  ნამუშევარი საათები
                                                        $nonWorkedHours = 0; // არნამუშევარი საათები
                                                        $vacationPayed = 0; // ხელფასიანი შვებულება
                                                        $vacationFree  = 0; // უხელფასო შვებულება
                                                        $overTimeHours = 0;  // ზე განაკვეთური საათები ( დღიურად 8 საათზე მეტი ნამუშევარი )
                                                        $graphicType = ''; // გრაფიკის ტიპი
                                                            
                                                            $upsentPVacation =  0; // 'შვებულება';
                                                            $upsentUPVacation =  0; // 'უხ. შვებულება';
                                                            $upsentSFVacation =  0; // 'ს/ფ';
                        
                        
                        
                                                        $dayoffs = 0;  // არა სამუშაო დღე
                        
                                                        
                                                        foreach ($attendance as $item) {
                                                            if ($graphicType === '' && $item['schedule_name']) {
                                                                $graphicType = $item['schedule_name'];
                                                            }
                                                            
                                                            
                                                            
                                                            /** სანამ  მიმდინარე დაფიქსირების დღე ( $item['day'] ) მეტია მიმდინარე დღეზე ($day)   */
                                                            while ($day < $item['day']) {
                                                                $date = $day < 10 ? $filteredDate.'-0'.$day : $filteredDate.'-'.$day;  // თარიღი
                                                                $wday = $wdays[date('l', strtotime($date))];  // კვირის დღე
                                                                $gType = $item['schedule_type']; // გრაფიკის ტიპი
                                                                $workingTemp = '&nbsp;';
                        
                                                                $enter = '';
                                                                $leave = '';
                                                                $duration = 0;
                                                                    
                                                                /** მივლინება */
                                                                $isM = false;
                                                                $trips  = isset($workTimeArray[$setUser__ID]['trips']) ? $workTimeArray[$setUser__ID]['trips'] : null ;
                                                                    
                                                                if ($trips) {
                                                                    foreach ($trips as $trip) {
                                                                        $startM = explode(':', $trip)[0];
                                                                        $endM = explode(':', $trip)[1];
                        
                                                                        if ($date <= $endM and $date >= $startM) {
                                                                            $isM = true;
                                                                        }
                                                                    }
                                                                }
                                                            
                                                                /** შვებულება **/
                                                                $vac  = isset($workTimeArray[$setUser__ID]['vac']) ? $workTimeArray[$setUser__ID]['vac'] : [];
                                                                $isV = false;
                                                                $vType = 0;
                                                                $orderType = '';
                                                                    
                                                                if ($vac) {
                                                                    foreach ($vac as $eachVac) {
                                                                        $startM = explode(':', $eachVac)[0];
                                                                        $endM = explode(':', $eachVac)[1];
                                                                        $type = explode(':', $eachVac)[2];
                                                                        $ordTemp = explode(':', $eachVac)[3];
                                                                        
                        
                                                                        if ($date <= $endM and $date >= $startM) {
                                                                            $isV = true;
                                                                            $vType = $type;
                                                                            $orderType = $ordTemp;
                                                                        }
                                                                    }
                                                                }
                        
                        
                                                                /** კომენტარები */
                                                                $comment  = isset($workTimeArray[$setUser__ID]['notification']) ?  $workTimeArray[$setUser__ID]['notification'] : [];
                                                                $ntClass = '';
                                                            
                                                                if ($comment && count($comment) > 0) {
                                                                    foreach ($comment as $n) {
                                                                        $dt = explode(':', $n)[0];  // თარიღი
                                                                        $tp = explode(':', $n)[1];  // კომანტარის ტიპი
                        
                                                                    
                                                                        if ($dt == $date) {
                                                                            switch ($tp) {
                                                                                    case '1':
                                                                                        $ntClass = 'nWaiting';    //დადასტურების მოლოდინში
                                                                                        break;
                                                                                    case '2':
                                                                                        $ntClass = 'nAproved';   // დადასტურებული
                                                                                        break;
                                                                                    case '3':
                                                                                        $ntClass = 'nDeny'; // უარყოფილი
                                                                                        break;
                                                                                    default:break;
                                                                                }
                                                                        }
                                                                    }
                                                                }
                                                            
                                                            
                                                            
                                                                /*if ((intVal($gType) > 0  && $ntClass === 'nAproved') || $isM) {
                                                                    $valid = true;
                                                                    $workingDays++;
                        
                                                                    if ($gType != 3) {
                                                                        $workingTemp = '8:00';
                                                                        $workingHours += 480;
                                                                    }
                                                                }*/
                                                                
                        
                                                                
                                                            
                                                                
                                                                /** გრაფიკების მიხედვით ფილტრაცია */
                                                                $valid = false;
                        
                                                                if ((intVal($gType) > 0  && $ntClass === 'nAproved') || $isM || $gType == 2) {
                                                                    switch ($gType) {
                                                                        case 2:  // თავისუფალი გრაფიკი
                                            
                                            
                                                                            $break  = intVal($item['break']) * 60;   // შესვენების წუთები
                                                                            $interval = intVal($item['working_minutes']) +   (intVal($item['latecome']) % 60); // მოსვლა წასვლის ინტერვალი
                                                                            $mustWork = $interval - $break; // სამუშაო საათები შესვენების გამოკლებით
                                                    
                                                                        
                                                    
                                                                            $enter = $item['plan_in'];
                                                                            $leave = $item['plan_out'];
                                                                            $duration = $mustWork;
                                                    
                                                                            $valid = true;
                        
                        
                                                                        
                                                                        break;
                                                                        case 3:  // მცოცავი გრაფიკი (ქსელი)
                                                                            $sch3  = isset($workTimeArray[$setUser__ID]['schedule'][$date]) ? $workTimeArray[$setUser__ID]['schedule'][$date] : null;
                                                                            
                                                                            if ($sch3) {
                                                                                $sch3_plan_in = explode('-', $sch3)[0];
                                                                                $sch3_plan_out = explode('-', $sch3)[1];
                                                                                $sch3_working_hour = explode('-', $sch3)[2];
                                                                                $sch3_hpw = explode('-', $sch3)[3];
                                                                                $sch3_ganakveti = explode('-', $sch3)[4];
                                                                                
                                                                                
                                                                                $gType3 = $sch3_hpw / $sch3_ganakveti;
                                                                                $managerPlan += $sch3_working_hour;
                                                                                
                                                                                /** ყოველდღიურ გრაფიკში რაც ეწერება  ის დრო უნდა იმუშაოს ნაკლებზე წითლდება ან გვიან მოსვლაზე */
                                                                                if ($item['working_hours'] < $sch3_working_hour   || $item['real_in'] > $sch3_plan_in) {
                                                                                    $valid = false;
                                                                                }
                                                                            
                                                                                $planInOut = "
                                                                                    <li class='text-center'>_______</li>
                                                                                    <li class='text-center'>$sch3_plan_in  - $sch3_plan_out </li>
                                                                                ";
                                                                                
                                                                                if ($sch3_working_hour &&  ($ntClass === 'nAproved' || $isM)) {
                                                                                    $valid = true;
                                                                                    $item['working_hours'] = $sch3_working_hour;
                                                                                    $item['real_in'] = $sch3_plan_in;
                                                                                    $item['real_out'] = $sch3_plan_out;
                        
                        
                                                                                    $workingHours += $item['working_hours']; //  ნამუშევარ საათებს
                                                                                    $workingDays ++;   // ნამუშევარ დღეებს + 1
                                                                                    $workingTemp = floor($item['working_hours']/60).':'.($item['working_hours']%60);
                                                                                }
                                                                            }
                                                                            
                                                                            break;
                                                                        default:
                                                                                $break  = intVal($item['break']) * 60;   // შესვენების წუთები
                                                                                $interval = intVal($item['working_minutes']) +   (intVal($item['latecome']) % 60); // მოსვლა წასვლის ინტერვალი
                                                                                $mustWork = $interval - $break; // სამუშაო საათები შესვენების გამოკლებით
                        
                                                                                if ($ntClass === 'nAproved' || $isM) {
                                                                                    $valid = true;
                                                                                    
                                                                                    $enter = $item['plan_in'];
                                                                                    $leave = $item['plan_out'];
                                                                                    $duration = $mustWork;
                                                                                    $valid = true;
                        
                                                                                
                                                                                    $workingHours += $duration;
                                                                                    $workingDays ++;
                                                                                    $workingTemp = floor($mustWork/60).':'.($mustWork%60);
                                                                                }
                        
                                                    
                                                                                // $valid = true;
                                                                                
                                                                                // if ($setUser__ID != 12936) {
                                                                                //     $item['working_hours'] = $interval;
                                                                                //     $item['real_in'] = $item['plan_in'];
                                                                                //     $item['real_out'] = date('H:i', strtotime($item['plan_in'].' + '.$interval.'minute'));
                                                                                    
                                                                                //     if ($item['real_in'] < '13:00' && $item['real_out'] > '15:00' && in_array($gType, [1,2,6])) {
                                                                                //         $item['working_hours'] = $item['working_hours'] - $break;
                                                                                //     }
                                                                                        
                                                                                //     $workingHours += $item['working_hours']; //  ნამუშევარ საათებს
                                                                                //     $workingDays ++;   // ნამუშევარ დღეებს + 1
                                                                                //     $workingTemp = floor($item['working_hours']/60).':'.($item['working_hours']%60);
                                                                                // } else {
                                                                                //     if (in_array($gType, [1,2,6])) {
                                                                                //         $interval = $interval - $break;
                                                                                //     }
                        
                                                                                //     $workingHours += $interval; //  ნამუშევარ საათებს
                                                                                //     $workingDays ++;   // ნამუშევარ დღეებს + 1
                                                                                //     $workingTemp = floor($interval/60).':'.($interval%60);
                                                                                // }
                                                                            
                                                                            
                                                                            break;
                                                                    }
                                                                }
                                                            
                                                                $dayType = $valid  ? '' : 'warningDay';
                        
                                                            
                                                                if ($isM) {  //  მივლინება
                                                                    //$dayoffs ++;
                                                                    echo "
                                                                        <td class='dayDetail'>
                                                                            <input type='hidden' name = 'plan_date' value = '".$date."'/>
                                                                            <p class='text-center $ntClass'>  მ  </p>
                                                                            <div class = 'inOutInfo'>
                                                                                <ul>
                                                                                    <li class = 'text-center'>".$wday."</li>
                                                                                </ul>
                                                                            </div>
                                                                        </td>
                                                                    ";
                                                                } elseif (isset($holidaysArray[$date])) {  // უქმე დღე  ( 'ქალთა დღე' , 'დედის დღე '... )
                                                                    $dayoffs ++;
                                                                    
                                                                    echo "
                                                                        <td class='dayDetail'>
                                                                        <input type='hidden' name = 'plan_date' value = '".$date."'/>
                                                                            <p class='text-center $ntClass'>  უ  </p>
                                                                            <div class = 'inOutInfo'>
                                                                                <ul>
                                                                                    <li class = 'text-center'>".$wday."</li>
                                                                                    <li class = 'text-center'>".$holidaysArray[$date]."</li>
                                                                                </ul>
                                                                            </div>
                                                                        </td>
                                                                    ";
                                                                } elseif (nonWorkingDay($date, $setUser__ID, $gType)  && $gType != 3) {  // თუ უქმე დღე არ არის და არის შაბათ-კვირა
                                                                    $dayoffs ++;
                                                                    echo "
                                                                        <td class='dayDetail'>
                                                                        <input type='hidden' name = 'plan_date' value = '".$date."'/>
                                                                            <p class='noworkingday $ntClass'>&nbsp;</p>
                                                                            <div class = 'inOutInfo'>
                                                                                <ul>
                                                                                    <li class = 'text-center'>".$wday."</li>
                                                                                </ul>
                                                                            </div>
                                                                        </td>
                                                                    ";
                                                                } elseif ($isV) {  // შვებულება
                                                                    $vacTypeLabel = '';
                                                                    $dayoffs ++;
                                    
                                                                    if ($vType == 31) {
                                                                        if ($orderType == 26) {
                                                                            $vacTypeLabel = 'ს/ფ';
                                                                            $upsentSFVacation++;
                                                                        } else {
                                                                            $vacTypeLabel = 'შ';
                                                                            $upsentPVacation++;
                                                                        }
                                                                    } elseif ($vType != 31 && $vType > 0) {
                                                                        if ($orderType == 16 || $orderType == 119) {
                                                                            $vacTypeLabel = 'დ';
                                                                            $upsentDPVacation++;
                                                                        } else {
                                                                            $vacTypeLabel = 'უხ.შ';
                                                                            $upsentUPVacation++;
                                                                        }
                                                                    }
                                                                                                        
                                                                    echo "
                                                                    <td  class='dayDetail'>
                                                                        <input type='hidden' name = 'plan_date' value = '".$date."'/>
                                                                        <p class='text-center $ntClass'> $vacTypeLabel  </p>
                                                                        <div class = 'inOutInfo'>
                                                                            <ul>
                                                                                <li class = 'text-center'>".$wday."</li>
                                                                            </ul>
                                                                        </div>
                                                                    </td>";
                                                                } elseif ($ntClass == 'nAproved' && $gType != 2) {
                                                                    $hours = floor($duration/ 60);
                                                                    $minutes = $duration -  ($hours * 60);
                                                                    $minutes =  $minutes < 10 ? "0".$minutes : $minutes;
                                                                    $workingTemp = $hours.":".$minutes;
                                                                    
                                                                    echo "<td class='dayDetail'><input type='hidden' name = 'plan_date' value = '".$date."'/>
                                                                                                                    <p class='text-center $ntClass  $dayType'> 	$workingTemp   </p>
                                                                                                                    <div class = 'inOutInfo'>
                                                                                                                        <ul>
                                                                                                                            <li class='text-center'>".$wday."</li>
                                                                                                                        
                                                                                                                        </ul>
                                                                                                                    </div>
                                                                                                                </div>";
                                                                } elseif (isset($duration) && $date < date('Y-m-d')  && $gType == 2) {
                                                                    $hours = floor($duration/ 60);
                                                                    $minutes = $duration -  ($hours * 60);
                                                                    $minutes =  $minutes < 10 ? "0".$minutes : $minutes;
                                                                    $workingTemp = $hours.":".$minutes;
                        
                        
                                                                    $workingHours += $duration;
                                                                    $workingDays ++;
                        
                                                                    
                                                                    echo "<td class='dayDetail'><input type='hidden' name = 'plan_date' value = '".$date."'/>
                                                                                                                    <p class='text-center $ntClass  $dayType'> 	$workingTemp   </p>
                                                                                                                    <div class = 'inOutInfo'>
                                                                                                                        <ul>
                                                                                                                            <li class='text-center'>".$wday."</li>
                                                                                                                        
                                                                                                                        </ul>
                                                                                                                    </div>
                                                                                                                </div>";
                                                                } else {
                                                                    echo "<td class='dayDetail'>
                                                                                    <input type='hidden' name = 'plan_date' value = '".$date."'/>
                                                                                        <p class='text-center $ntClass  $dayType'> 	$workingTemp   </p>
                                                                                        <div class = 'inOutInfo'>
                                                                                            <ul>
                                                                                                <li class='text-center'>".$wday."</li>
                                                                                            
                                                                                            
                                                                                            </ul>
                                                                                        </div>
                                                                                </td>";
                                                                }
                                                                
                                                                $day ++;
                                                            }
                                                            
                        
                                                            /**  ----------------------------------------------------------    აპარატში სახის დაფიქსირების შემთხვევის ლოგიკა ---------------------------------------------------- */
                                                        
                                                            if ($day == $item['day']) {
                                                                $date = $day < 10 ? $filteredDate.'-0'.$day : $filteredDate.'-'.$day;   // თარიღი
                                                                $wday = $wdays[date('l', strtotime($date))];  // კვირის დღე  (ორშ. , სამ. ...)
                                                                $dn = '';  // უქმე დღისთვის შემოტანილი ცვლადი
                                                                $gType = $item['schedule_type']; // გრაფიკის ტიპი
                                                                $planInOut = '';
                                                                
                                                                $lateCome  = 0;
                        
                                                                
                                                                /** კომენტარები */
                                                                $comment  = isset($workTimeArray[$setUser__ID]['notification']) ?  $workTimeArray[$setUser__ID]['notification'] : [];
                                                                $ntClass = '';
                                                                
                                                                if ($comment && count($comment) > 0) {
                                                                    foreach ($comment as $n) {
                                                                        $dt = explode(':', $n)[0];  // თარიღი
                                                                        $tp = explode(':', $n)[1];  // კომანტარის ტიპი
                        
                                                                            
                                                                        if ($dt == $date) {
                                                                            switch ($tp) {
                                                                                case '1':
                                                                                    $ntClass = 'nWaiting';    //დადასტურების მოლოდინში
                                                                                break;
                                                                                case '2':
                                                                                    $ntClass = 'nAproved';   // დადასტურებული
                                                                                break;
                                                                                case '3':
                                                                                    $ntClass = 'nDeny'; // უარყოფილი
                                                                                break;
                                                                                default:break;
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                                
                                                            
                                                                
                                                                /** მივლინება */
                                                                $isM = false;
                                                                $trips  = isset($workTimeArray[$item['UserID']]['trips']) ? $workTimeArray[$item['UserID']]['trips'] : null;
                                                                    
                                                                if ($trips) {
                                                                    foreach ($trips as $trip) {
                                                                        $startM = explode(':', $trip)[0];
                                                                        $endM = explode(':', $trip)[1];
                                                                            
                                                                        if ($date <= $endM and $date >= $startM) {
                                                                            $isM = true;
                                                                        }
                                                                    }
                                                                }
                                                            
                                                            
                                                                /** გრაფიკების მიხედვით ფილტრაცია */
                                                                if ($gType) {
                                                                    $valid = true;
                                                                    switch ($gType) {
                                                                                                                                                        
                                                                        
                                                                        case 3:  // მცოცავი გრაფიკი (ქსელი)
                                                                            $sch3  = isset($workTimeArray[$item['UserID']]['schedule'][$date]) ? $workTimeArray[$item['UserID']]['schedule'][$date] : null;
                                                                            
                                                                            if ($sch3) {
                                                                                $sch3_plan_in = explode('-', $sch3)[0];
                                                                                $sch3_plan_out = explode('-', $sch3)[1];
                                                                                $sch3_working_hour = explode('-', $sch3)[2];
                                                                                $nonWorkedHours;
                                                                                /** ყოველდღიურ გრაფიკში რაც ეწერება  ის დრო უნდა იმუშაოს ნაკლებზე წითლდება ან გვიან მოსვლაზე */
                                                                                if ($item['working_hours'] < $sch3_working_hour   || $item['real_in'] > $sch3_plan_in) {
                                                                                    $valid = false;
                                                                                }
                        
                        
                                                                                /** თუ მოსვლის დროს ან წასვლის დროს აპარატში არ დაფიქსირებულა */
                                                                                if ($item['real_in'] == $item['real_out']) {
                                                                                    $midTime = date('H:i', strtotime($sch3_plan_in.' + '.($sch3_working_hour / 2).'minute'));
                        
                        
                                                                                    if ($item['real_in'] <  $midTime) {
                                                                                        $item['real_out']  = 'წასვლა არ დაფიქსირდა';
                                                                                    } else {
                                                                                        $item['real_in']  = 'მოსვლა არ დაფიქსირდა';
                                                                                    }
                                                                                }
                                                                                
                                                                                $plan_out_seconds = strtotime($sch3_plan_out);
                                                                                $plan_in_seconds = strtotime($sch3_plan_in);
                                                                                $real_worked_seconds = $item['working_hours']*60;
                                                                                $needToWorkSeconds = $plan_out_seconds-$plan_in_seconds;
                        
                                                                                $nonWorkedSeconds = $needToWorkSeconds - $real_worked_seconds;
                        
                                                                                if($nonWorkedSeconds > 0 && $ntClass != 'nAproved' && !$isM && $item['working_hours'] > 0){
                                                                                    $nonWorkedHours += $needToWorkSeconds - $real_worked_seconds;
                                                                                }
                                                                                $planInOut = "
                                                                                    <li class='text-center'>_______</li>
                                                                                    <li class='text-center'>$sch3_plan_in  - $sch3_plan_out</li>
                                                                                ";
                        
                                                                                
                                                                                
                                                                                if ($ntClass === 'nAproved' || $isM) {
                                                                                    $valid = true;
                                                                                    $item['working_hours'] = $sch3_working_hour;
                                                                                    $item['real_in'] = $sch3_plan_in;
                                                                                    $item['real_out'] = $sch3_plan_out;
                                                                                }
                                                                                
                                                                                
                                                                                
                                                                                /** ზეგანაკვეთი */
                                                                                if ($item['working_hours'] >  $sch3_working_hour) {
                                                                                    $overTimeHours += intVal($item['working_hours']) - $sch3_working_hour;
                                                                                }
                                                                            }
                                                                            
                                                                            break;
                                                                        default:
                                                                            
                                                                            
                                                                            
                                                                            $break  = intVal($item['break']) * 60;   // შესვენების წუთები
                                                                            $interval = intVal($item['working_minutes']) +   (intVal($item['latecome']) % 60); // მოსვლა წასვლის ინტერვალი
                                                                            $mustWork = $interval - $break; // სამუშაო საათები შესვენების გამოკლებით
                                                                            
                        
                                                                        
                                                                            if ($item['check_in']) {
                                                                                $checkInMax = date('H:i', strtotime($item['plan_in'].' + '.$item['latecome'].'minute'));
                        
                                                                                if ($item['real_in'] > $checkInMax) {
                                                                                    $valid = false;
                        
                                                                                    $dt1 = (explode(':', $item['real_in'])[0]*60)    +  explode(':', $item['real_in'])[1];
                                                                                    $dt2 = (explode(':', $checkInMax)[0]*60)    +  explode(':', $checkInMax)[1];
                                                                                    $lateCome = $dt1 - $dt2;
                                                                                }
                                                                            } else {
                                                                                $item['real_in'] = $item['plan_in'];
                                                                            }
                                                                            
                                                                            
                                                                            if ($item['check_out']) {
                                                                                $checkOutMin = date('H:i', strtotime($item['plan_out'].' -'.$item['earlygo'].'minute'));
                                                                                
                                                                                if ($item['real_out'] < $checkOutMin) {
                                                                                    $valid = false;
                        
                                                                                    $dt1 = (explode(':', $item['real_out'])[0]*60)    +  explode(':', $item['real_out'])[1];
                                                                                    $dt2 = (explode(':', $checkOutMin)[0]*60)    +  explode(':', $checkOutMin)[1];
                                                                                    $lateCome = $dt2 - $dt1;
                                                                                }
                                                                            } else {
                                                                                $item['real_out'] = $item['plan_out'];
                                                                            }
                                                                            
                                                                                    
                                                                            if ($item['check_wm']) {
                                                                                if ($item['working_minutes'] > $item['working_hours']) {
                                                                                    $valid = false;
                                                                                }
                                                                            } else {
                                                                                $item['working_hours'] = $interval - $lateCome;
                                                                            }
                                                                            
                                                                            
                                                                            if ($item['real_in'] < '13:00' && $item['real_out'] > '15:00' && in_array($gType, [1,2,10,6,11,12])) {
                                                                                $item['working_hours'] = $item['working_hours'] - $break;
                                                                            }
                                                                            
                                                                            if ($item['real_in'] == $item['real_out']) {
                                                                                if ($item['real_in'] < '13:00') {
                                                                                    $item['real_out'] = 'წასვლა -  არ დაფიქსირდა';
                                                                                } else {
                                                                                    $item['real_in'] = ' მოსვლა -   არ დაფიქსირდა';
                                                                                }
                                                                            }
                        
                        
                                                                            $real_in_seconds = strtotime($item['real_in']);
                                                                            $real_out_seconds = strtotime($item['real_out']);
                        
                                                                            $real_worked_seconds = $real_out_seconds-$real_in_seconds-3600;
                        
                        
                                                                            $mustWork_seconds = ($mustWork * 60)-600;
                        
                                                                            $nonWorkedSeconds = $real_worked_seconds-$mustWork_seconds;
                                                                            
                                                                            if($nonWorkedSeconds < 0 && $item['working_hours'] > 0 && $ntClass != 'nAproved' && !$isM){
                                                                                
                                                                                $nonWorkedHours += abs($nonWorkedSeconds);
                                                                                //echo $item['day'].': '.abs($nonWorkedSeconds).'    non: '.$nonWorkedHours.',  ';
                                                                            }
                                                                            if ($ntClass == 'nAproved' || $isM) {
                                                                                $valid = true;
                                                                                $item['working_hours'] = $mustWork;
                                                                                $item['real_in'] = $item['plan_in'];
                                                                                $item['real_out'] = date('H:i', strtotime($item['plan_in'].' + '.$interval.'minute'));
                                                                            }
                                                                            
                                                                        
                                                                            /** ზეგანაკვეთი */
                                                                            if (intVal($item['working_hours'])   > ($mustWork + $lateCome)) {
                                                                                $overTimeHours += intVal($item['working_hours']) - $mustWork - $lateCome;
                                                                            }
                                                                                                                            
                                                                        break;
                                                                    }
                                                                }
                                                            
                                                                $dayType = $valid  ? '' : 'warningDay';
                                                                /** გრაფიკების მიხედვით ფილტრაცია */
                                                                
                                                                $workingHours += $item['working_hours']; //  ნამუშევარ საათებს
                                                                $workingDays ++;   // ნამუშევარ დღეებს + 1
                                                            
                                                                if (isset($holidaysArray[$date])) {
                                                                    $dn = "<li class='text-center'>".$holidaysArray[$date]."</li>";  //უქმე დღის სახელი (  ქალთა დღე , დედის დღე , .... )
                                                                    $workingHolidays ++;  // უქმე დღეეზე ნამუშევარი დღეების ჯამს + 1
                                                                    $workingHolidaysHours += $item['working_hours'];
                        
                                                                }
                                                                    
                                                                /** შვებულება */
                                                                $isV = false;
                                                                $vac  = isset($workTimeArray[$setUser__ID]['vac']) ? $workTimeArray[$setUser__ID]['vac'] : null ;
                                                                $tempType = '';
                                                                $vType  = 0;
                                                                    
                                                                    
                                                                if ($vac) {
                                                                    foreach ($vac as $vacation) {
                                                                        $startM = explode(':', $vacation)[0];
                                                                        $endM = explode(':', $vacation)[1];
                                                                        $vType = explode(':', $vacation)[2];
                                                                        $tempType = explode(':', $vacation)[3];
                        
                                                                        if ($date <= $endM and $date >= $startM) {
                                                                            $isV = true;
                                                                        }
                                                                    }
                                                                }
                                                                
                        
                                                                /** ღამე ნამუშევარი საათები */
                                                                if (isset($workTimeArray[$setUser__ID]['is_night'][$item['day']])) {
                                                                    if ($workTimeArray[$setUser__ID]['is_night'][$item['day']] == 2) {
                                                                        $workingNightDays ++;
                                                                    }
                                                                }
                                                                                            
                                                                /**  წუთების გადაყვანა საათში  */
                                                                $hours = floor(intVal($item['working_hours']) / 60);
                                                                $minute =  intVal($item['working_hours'])  -  ($hours * 60);
                                                                $item['working_hours'] = $hours.":".($minute < 10 ? '0'.$minute : $minute);
                                                                /**  წუთების გადაყვანა საათში  */
                        
                        
                                                                if ($isM) {
                                                                    echo "
                                                                        <td class='dayDetail'>
                                                                            <input type='hidden' name = 'plan_date' value = '".$date."'/>
                                                                            <p class='text-center $ntClass'>  მ  </p>
                                                                            <div class = 'inOutInfo'>
                                                                                <ul>
                                                                                    <li class = 'text-center'>".$wday."</li>
                                                                                    <li class='text-center'>მივლინება</li>
                                                                                </ul>
                                                                            </div>
                                                                        </td>
                                                                    ";
                                                                } else {
                                                                    echo "
                                                                        <td class='dayDetail'>
                                                                            <input type='hidden' name = 'plan_date' value = '".$date."'/>
                                                                            <p class='text-center $ntClass  $dayType'>" .$item['working_hours'] ."</p>
                        
                                                                            <div class='inOutInfo'>
                                                                                <ul>
                                                                                    <li class='text-center'>".$wday."</li>
                                                                                    <li class='text-center'>".$item['real_in']."</li>
                                                                                    <li class='text-center'>".$item['real_out']."</li>
                                                                                    $dn
                                                                                    $planInOut
                                                                                </ul>
                                                                            </div>
                                                                        </td>
                                                                    ";
                                                                }
                                                                $day ++ ;
                                                            }
                                                        }
                                                        
                        
                                                        while ($day <= $end) {
                                                            $date = $day < 10 ? $filteredDate.'-0'.$day : $filteredDate.'-'.$day;  // თარიღი
                                                            $wday = $wdays[date('l', strtotime($date))]; // კვირის დღე  (ორშ. , სამ. ...)
                        
                                                            
                        
                                                            /** მივლინება */
                                                            $isM = false;
                                                            $trips  = isset($workTimeArray[$setUser__ID]['trips']) ? $workTimeArray[$setUser__ID]['trips'] : null;
                                                                    
                                                            if ($trips) {
                                                                foreach ($trips as $trip) {
                                                                    $startM = explode(':', $trip)[0];
                                                                    $endM = explode(':', $trip)[1];
                        
                        
                                                                    if ($date <= $endM and $date >= $startM) {
                                                                        $isM = true;
                                                                    }
                                                                }
                                                            }
                                                        
                                                                
                                                            /** შვებულება **/
                                                            $vac  = isset($workTimeArray[$setUser__ID]['vac']) ? $workTimeArray[$setUser__ID]['vac'] : [];
                                                            $isV = false;
                                                            $vType = 0;
                                                            $orderType = '';
                                                                    
                                                            if ($vac) {
                                                                foreach ($vac as $eachVac) {
                                                                    $startM = explode(':', $eachVac)[0];
                                                                    $endM = explode(':', $eachVac)[1];
                                                                    $type = explode(':', $eachVac)[2];
                                                                    $ordTemp = explode(':', $eachVac)[3];
                                                                        
                        
                                                                    if ($date <= $endM and $date >= $startM) {
                                                                        $isV = true;
                                                                        $vType = $type;
                                                                        $orderType = $ordTemp;
                                                                    }
                                                                }
                                                            }
                                                            
                                                                
                                                            $comment  = isset($workTimeArray[$setUser__ID]['notification']) ?  $workTimeArray[$setUser__ID]['notification'] : [];
                                                            $ntClass = '';
                                                            
                                                            if ($comment && count($comment) > 0) {
                                                                foreach ($comment as $n) {
                                                                    $dt = explode(':', $n)[0];  // თარიღი
                                                                        $tp = explode(':', $n)[1];  // კომანტარის ტიპი
                                                                    
                                                                        if ($dt === $date) {
                                                                            switch ($tp) {
                                                                                case '1':
                                                                                        $ntClass = 'nWaiting';
                                                                                break;
                                                                                case '2':
                                                                                        $ntClass = 'nAproved';
                                                                            }
                                                                        }
                                                                }
                                                            }
                        
                                                        
                        
                                                            /** გრაფიკების მიხედვით ფილტრაცია */
                                                            if ($gr) {
                                                                $valid = false;
                        
                                                                if ($graphicType == '' && $gr['name']) {
                                                                    $graphicType = $gr['name'];
                                                                }
                        
                                                                switch ($myS) {
                                                                    
                                                                    case 3:  // მცოცავი გრაფიკი (ქსელი)
                                                                        $sch3  = isset($workTimeArray[$setUser__ID]['schedule'][$date]) ? $workTimeArray[$setUser__ID]['schedule'][$date] : null;
                                                                        
                                                                        if ($sch3) {
                                                                            $sch3_plan_in = explode('-', $sch3)[0];
                                                                            $sch3_plan_out = explode('-', $sch3)[1];
                                                                            $sch3_working_hour = explode('-', $sch3)[2];
                                                                            
                                                                            /** ყოველდღიურ გრაფიკში რაც ეწერება  ის დრო უნდა იმუშაოს ნაკლებზე წითლდება ან გვიან მოსვლაზე */
                                                                            if ($item['working_hours'] < $sch3_working_hour   || $item['real_in'] > $sch3_plan_in) {
                                                                                $valid = false;
                                                                            }
                                                                        
                                                                            $planInOut = "
                                                                                <li class='text-center'>_______</li>
                                                                                <li class='text-center'>$sch3_plan_in  - $sch3_plan_out </li>
                                                                            ";
                                                                            if ($ntClass != 'nAproved' AND !$isM AND $date < date('Y-m-d')){
                                                                            
                                                                                $nonWorkedHours += $sch3_working_hour*60;
                                                                                
                                                                            }
                                                                            
                                                                            if ($ntClass === 'nAproved' || $isM) {
                                                                                $valid = true;
                                                                                //$item['working_hours'] = $sch3_working_hour;
                                                                                //$item['real_in'] = $sch3_plan_in;
                                                                                //$item['real_out'] = $sch3_plan_out;
                                                                            }
                                                                            
                                                                            
                                                                            
                                                                            /** ზეგანაკვეთი */
                                                                            if ($item['working_hours'] >  $sch3_working_hour) {
                                                                                $overTimeHours += intVal($item['working_hours']) - $sch3_working_hour;
                                                                            }
                                                                        }
                                                                        
                                                                        break;
                                                                    default:
                        
                                                                
                                                                        $break  = intVal($gr['break']) * 60;   // შესვენების წუთები
                                                                        $interval = intVal($gr['working_minutes']) +   (intVal($gr['latecome']) % 60); // მოსვლა წასვლის ინტერვალი
                                                                        $mustWork = $interval - $break; // სამუშაო საათები შესვენების გამოკლებით
                                                                    
                        
                                                                        if ($gr['check_in']) {
                                                                            $checkInMax = date('H:i', strtotime($gr['plan_in'].' + '.$gr['latecome'].'minute'));
                                                                            
                                                                        
                        
                                                                            if ($gr['real_in'] > $checkInMax) {
                                                                                $valid = false;
                        
                                                                                $dt1 = (explode(':', $gr['real_in'])[0]*60)    +  explode(':', $gr['real_in'])[1];
                                                                                $dt2 = (explode(':', $checkInMax)[0]*60)    +  explode(':', $checkInMax)[1];
                                                                                $lateCome = $dt1 - $dt2;
                                                                            }
                                                                        } else {
                                                                            $gr['real_in'] = $gr['plan_in'];
                                                                        }
                        
                        
                                                                        
                                                                        
                                                                        if ($gr['check_out']) {
                                                                            $checkOutMin = date('H:i', strtotime($gr['plan_out'].' -'.$gr['earlygo'].'minute'));
                                                                            
                                                                            if ($gr['real_out'] < $checkOutMin) {
                                                                                $valid = false;
                                                                            }
                                                                        } else {
                                                                            $gr['real_out'] = $gr['plan_out'];
                                                                        }
                                                                        
                        
                                                                        if ($gr['check_wm']) {
                                                                            if ($gr['working_minutes'] > $gr['working_hours']) {
                                                                                $valid = false;
                                                                            }
                                                                        } else {
                                                                            $gr['working_hours'] = $interval;
                                                                        }
                                                                        
                                                                        
                                                                        if ($gr['real_in'] < '13:00' && $gr['real_out'] > '15:00' && in_array($gr['id'], [1,2,10,6,11,12])) {
                                                                            $gr['working_hours'] = $gr['working_hours'] - $break;
                                                                        }

                                                                        
                                                                        if (!nonWorkingDay($date, $setUser__ID, $myS) AND !isset($holidaysArray[$date]) AND $date < date('Y-m-d') AND $ntClass != 'nAproved' AND !$isM AND $gr['id'] != 2){
                                                                            $nonWorkedHours += $mustWork*60;
                                                                        }
                                                                        
                                                                        
                                                                        if ($ntClass == 'nAproved' || $isM || $gr['id'] == 2) {
                                                                            $valid = true;
                                                                            $gr['working_hours'] = $mustWork;
                                                                            $gr['real_in'] = $gr['plan_in'];
                                                                            $gr['real_out'] = date('H:i', strtotime($gr['plan_in'].' + '.$interval.'minute'));
                                                                        }
                                                                    
                                                                        /** ზეგანაკვეთი */
                                                                        if (intVal($gr['working_hours'])   > ($mustWork + $lateCome)) {
                                                                            $overTimeHours += intVal($gr['working_hours']) - $mustWork - $lateCome;
                                                                        }
                                                                                                                        
                                                                    break;
                                                                }
                                                            }
                                                        
                                                            $dayType = $valid  ? '' : 'warningDay';
                                                            /** გრაფიკების მიხედვით ფილტრაცია */
                        
                        
                        
                                                        
                        
                                                            
                                                            if ($isM) {
                                                                $workingDays ++; // ნამუშევარი დღეები
                                                                $workingHours += $gr['working_hours']; // ნამუშევარი საათები
                        
                                                                // $hours = floor(intVal($gr['working_hours']) / 60);
                                                                // $minute =  intVal($gr['working_hours'])  -  ($hours * 60);
                                                                // $gr['working_hours'] = $hours.":".($minute < 10 ? '0'.$minute : $minute);
                                                                
                                                                echo "
                                                                        <td class='dayDetail'>
                                                                            <input type = 'hidden'   name = 'day' value = '".$date."'   />
                                                                            <p class='text-center $ntClass'>  მ  </p>
                                                                            <div class = 'inOutInfo'>
                                                                                <ul>
                                                                                    <li class = 'text-center'>".$wday."</li>
                                                                                    <li class='text-center'>".$gr['real_in']."</li>
                                                                                    <li class='text-center'>".$gr['real_out']."</li>
                                                                                </ul>
                                                                            </div>
                                                                        </td>
                                                                    ";
                                                            } elseif (isset($holidaysArray[$date])) {  // უქმე დღე  ( 'ქალთა დღე' , 'დედის დღე '... )
                                                                $dayoffs ++;
                        
                                                                echo "
                                                                        <td>
                                                                        <input type='hidden' name = 'plan_date' value = '".$date."'/>
                                                                            <p class='text-center $ntClass'>  უ  </p>
                                                                            <div class = 'inOutInfo'>
                                                                                <ul>
                                                                                    <li class = 'text-center'>".$wday."</li>
                                                                                    <li class = 'text-center'>".$holidaysArray[$date]."</li>
                                                                                </ul>
                                                                            </div>
                                                                        </td>
                                                                    ";
                                                            } elseif (nonWorkingDay($date, $setUser__ID, $myS) && $myS != 3) {  // თუ უქმე დღე არ არის და არის შაბათ-კვირა
                                                                $dayoffs ++;
                                                                echo "
                                                                    <td class='dayDetail'>
                                                                    <input type='hidden' name = 'plan_date' value = '".$date."'/>
                                                                        <p class='noworkingday $ntClass'>&nbsp;</p>
                                                                        <div class = 'inOutInfo'>
                                                                            <ul>
                                                                                <li class = 'text-center'>".$wday."</li>
                                                                            </ul>
                                                                        </div>
                                                                    </td>
                                                                ";
                                                            } elseif ($isV) {  // შვებულება
                                                                $dayoffs ++;
                        
                                                                $vacTypeLabel = '';
                                                                
                                                                if ($vType == 31) {
                                                                    if ($orderType == 26) {
                                                                        $vacTypeLabel = 'ს/ფ';
                                                                        $upsentSFVacation++;
                                                                    } else {
                                                                        $vacTypeLabel = 'შ';
                                                                        $upsentPVacation++;
                                                                    }
                                                                } elseif ($vType != 31 && $vType > 0) {
                                                                    if ($orderType == 16 || $orderType == 119) {
                                                                        $vacTypeLabel = 'დ';
                                                                        $upsentDPVacation++;
                                                                    } else {
                                                                        $vacTypeLabel = 'უხ.შ';
                                                                        $upsentUPVacation++;
                                                                    }
                                                                }
                                                                        
                                                                echo "
                                                                    <td  class='dayDetail'>
                                                                        <input type='hidden' name = 'plan_date' value = '".$date."'/>
                                                                        <p class='text-center $ntClass'> $vacTypeLabel  </p>
                                                                        <div class = 'inOutInfo'>
                                                                            <ul>
                                                                                <li class = 'text-center'>".$wday."</li>
                                                                            </ul>
                                                                        </div>
                                                                    </td>";
                                                            } elseif (isset($gr['working_hours']) && $date <= date('Y-m-d') && $gr['id'] == 2) {
                                                                $workingDays ++; // ნამუშევარი დღეები
                                                                $workingHours +=  intVal($gr['working_hours']); // ნამუშევარი საათები
                        
                                                                $hours = floor(intVal($gr['working_hours']) / 60);
                                                                $minute =  intVal($gr['working_hours'])  -  ($hours * 60);
                                                                $gr['working_hours'] = $hours.":".($minute < 10 ? '0'.$minute : $minute);
                        
                                                                echo "<td>
                                                                    <input type='hidden' name = 'plan_date' value = '".$date."'/>
                                                                    <p class='text-center $ntClass  $dayType'>" .$gr['working_hours'] ."</p>
                        
                                                                    <div class='inOutInfo'>
                                                                        <ul>
                                                                            <li class='text-center'>".$wday."</li>
                                                                            <li class='text-center'>".$gr['real_in']."</li>
                                                                            <li class='text-center'>".$gr['real_out']."</li>
                                                                        </ul>
                                                                    </div>
                                                                </td>";
                                                            } else { // სხვა დანარჩენი შემთხვევა
                        
                                                                if ($date >= date('Y-m-d')) {
                                                                    $dayType = '';
                                                                }
                                                                echo "<td class='dayDetail'>
                                                                            <input type='hidden' name = 'plan_date' value = '".$date."'/>
                                                                                <p class='text-center $ntClass  $dayType'>  &nbsp; </p>
                                                                                <div class = 'inOutInfo'>
                                                                                    <ul>
                                                                                        <li class = 'text-center'>".$wday."</li>
                                                                                    </ul>
                                                                                </div>
                                                                            </td>";
                                                            }
                        
                                                            $day ++;
                                                        }
                                                        
                                                        if ($targetMonth === '2021-03' && $item['schedule_type'] == 3) {
                                                            if ($overtimesArray[$setUser__ID]) {
                                                                $tm = $overtimesArray[$setUser__ID];
                            
                                                                $h = intVal(explode(':', $tm)[0]);
                                                                $m = intVal(explode(':', $tm)[1]);
                            
                                                                $overTimeHours = ($h*60)  + intVal($m);
                                                            } else {
                                                                $overTimeHours = 0;
                                                            }
                                                        }
                        
                        
                        
                                                        /** დღეების გეგმა , გაცდენები */
                                                        $minDays = 0;
                                                        $upsent = 0;
                        
                                                        if ($item['schedule_type'] != 3) {
                                                            $minWorkDay = $end - $dayoffs;
                                                            $minDays =  $minWorkDay * 480;
                        
                                                            if ($minDays > $workingHours) {
                                                                $overTimeHours  = 0;
                                                            } elseif ($overTimeHours >= ($workingHours - $minDays)) {
                                                                $overTimeHours = $workingHours - $minDays;
                                                            }
                                                            
                                                            if ($minWorkDay >= $workingDays &&  date("Y-m-d") >= $date) {
                                                                $upsent = $minWorkDay - $workingDays;
                                                            }
                                                        }
                                                        
                                                        
                                                        echo "  <td class='text-center workH'><p>".floor($workingHours / 60)." : ".($workingHours -      (floor($workingHours / 60) * 60))."</p></td>
                                                                <td class='text-center workD' ><p>$workingDays </p></td>
                                                        ";
                        
                                                        /** ნანახია სტატუსი */
                                                        $seen = $seenArray[$setUser__ID]  ? $seenArray[$setUser__ID] : '';

                                                        echo '
                                                        
                                                        <td class="text-center">';
                                                            
                                                                $workingHolidaysHours = $workingHolidaysHours*60;
                                                                $hours = floor($workingHolidaysHours / 3600);
                                                                $mins = floor($workingHolidaysHours / 60 % 60);
                                                                if($mins < 10){
                                                                    $mins = '0'.$mins;
                                                                }
                                                                echo '<p>'.$hours.':'.$mins.'</p>';
                                                            echo '
                                                        </td>
                                                        <td class="text-center">
                                                            ';
                                                                $hours = floor($nonWorkedHours / 3600);
                                                                $mins = floor($nonWorkedHours / 60 % 60);
                                                                if($mins < 10){
                                                                    $mins = '0'.$mins;
                                                                }
                                                                echo '<p>'.$hours.':'.$mins.'</p>';
                                                            
                                                        echo '</td>
                                                        <td class="text-center">                                       

                                                            <button class="viewRow btn btn-warning" onClick="retriveDetails('.$setUser__ID.", '".$filteredDate."' , ".$workingHolidays.",".$upsentPVacation.",".$upsentUPVacation.",".$overTimeHours.", '".$seen."'".", '".$upsent."' ,'".$workingNightDays."',".$upsentSFVacation .')">დეტალები</button>
                                                            
                                                        </td>
                                                        ';
                                            
                                        ?>
                                    

                                    </tbody>
                                </table>
                            </div>
                        </div>








                        <!-- დეტალები  -->
                        <div class="popUp view">
                            <div class="row">
                                <div class="col-sm-6 col-sm-offset-3" >
                                    
                                    <h4>დეტალები</h4>
                                    <hr>
                                    <div class="list-group">
                                        <div class="list-group-item row">
                                            <div class="col-sm-6">
                                                გრაფიკის ტიპი  :
                                            </div>
                                            <div class="col-sm-4  grafikType">
                                                <span><?php echo $graphicType; ?></span>
                                                <div>
                                                    <select class="form-control">
                                                        <?php
                                            
                                                            if ($grTypes) {
                                                                foreach ($grTypes as $gType) {
                                                                    if ($graphicType === $gType['name']) {
                                                                        echo "<option selected value='".$gType['id']."'>".$gType['name']."</option>";
                                                                    } else {
                                                                        echo "<option value='".$gType['id']."'>".$gType['name']."</option>";
                                                                    }
                                                                }
                                                            }
                                                        
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>  

                                            <div class="col-sm-2 text-right">
                                                <!-- <span class="glyphicon glyphicon-cog options"></span>                             -->
                                                
                                                <div class="action">
                                                    <span class="glyphicon glyphicon-floppy-saved" onClick = ></span>
                                                    <span class="glyphicon  glyphicon-floppy-remove"></span>
                                                </div>
                                            </div>
                                        </div>
                                                    <div class="list-group-item row  workingDH">
                                            <div class="col-sm-6"> სულ ნამუშევარი ( დღე / საათი )   : </div>
                                            <div class="col-sm-4">
                                                <span> </span>
                                            </div>
                                        </div>

                                        
                                                        <div class="list-group-item row  ">
                                                            <div class="col-sm-6">ზეგანაკვეთი  ( საათი ):</div> 
                                                            <div class="col-sm-4 overTimeH  val"> 
                                                                <span> </span>
                                                                <div>
                                                                    <input type="number" class="form-control"  placeholder="Minutes">
                                                                </div>
                                                            </div>
                                                            <!-- <div class="col-sm-2 text-right">
                                                                <span class="glyphicon glyphicon-cog options"></span>                            
                                                                
                                                                <div class="action">
                                                                    <span class="glyphicon glyphicon-floppy-saved"></span>
                                                                    <span class="glyphicon  glyphicon-floppy-remove"></span>
                                                                </div>
                                                            </div> -->
                                                        </div>                                   
                                    
                                        


                                    <!--  <div class="list-group-item row">
                                            <div class="col-sm-6">დაგვიანება ( საათი )  :</div>  
                                            <div class="col-sm-4"> 
                                                <span>  </span>
                                            </div>
                                        </div> -->



                                        <div class="list-group-item row workedNight">
                                            <div class="col-sm-6">ღამე მორიგეობა  ( დღეების რაოდენობა )  : </div> 
                                            <div class="col-sm-4"> 
                                                <span></span>
                                            </div>
                                        

                                        </div>


                                        <div class="list-group-item row holidaysD">
                                            <div class="col-sm-6">უქმე დღე  ( დღეების რაოდენობა ) :</div> 
                                            <div class="col-sm-4"> 
                                                <span> </span>
                                            </div>
                                        </div>


                                        <div class="list-group-item row payedVacD">
                                            <div class="col-sm-6">შვებულება   ( დღეების რაოდენობა ) : </div>  
                                            <div class="col-sm-4"> 
                                                <span> </span>
                                            </div>
                                        </div>


                                        <div class="list-group-item row freeVacD">
                                            <div class="col-sm-6">უხ. შვებულება  ( დღეების რაოდენობა ) : </div>  
                                            <div class="col-sm-4"> 
                                                <span> </span>
                                            </div>
                                        </div>

                                        <div class="list-group-item row sfVacD">
                                            <div class="col-sm-6">ს/ფ ( დღეების რაოდენობა ) : </div>  
                                            <div class="col-sm-4"> 
                                                <span> 0 </span>
                                            </div>
                                        </div>




                                        <div class="list-group-item row upsent">
                                            <div class="col-sm-6">გაცდენა  ( დღეების რაოდენობა ) : </div>  
                                            <div class="col-sm-4"> 
                                                <span>  </span>
                                            </div>
                                        </div>

                                        <div class="list-group-item row seenDT">
                                            <div class="col-sm-6"> პირადი ტაბელის ნახვის დრო  : </div>  
                                            <div class="col-sm-4"> 
                                                <span>  </span>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>
                            
                                    <div class="btn btn-warning col-sm-3 col-sm-offset-9">
                                        დახურვა
                                    </div>
                                

                                </div>
                            </div>
                        </div>

                    </div>

				<!-- End Row -->
			</div>
		</div>
		<!-- End Main Content-->
		
		<!-- Main Footer-->
		<div class="main-footer text-center">
			<div class="container">
				<div class="row">
					<div class="col-md-12"> <span>Copyright © 2019 <a href="#">Dashlead</a>. Designed by <a href="https://www.spruko.com/">Spruko</a> All rights reserved.</span> </div>
				</div>
			</div>
		</div>
		<!--End Footer-->
	</div>
	<!-- End Page -->
	<!-- Back-to-top --><a href="#top" id="back-to-top" style="display: none;"><i class="fe fe-arrow-up"></i></a>
	<!-- Jquery js-->
	
	<div class="main-navbar-backdrop"></div>
	<div title="მწარმოებელი" id="get_edit_page">
		<p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>These items will be permanently deleted and cannot be recovered. Are you sure?</p>
	</div>
	<script>
	
	</script>
</body>

</html>