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
	}
    #new_writing, #new_product, #new_glass, #new_path {

			cursor: pointer;

		}
        #copy_writing, #copy_product, #copy_glass {
			border: 1px solid black;

			cursor: pointer;

		}
		
		#del_writing, #del_product, #del_glass,#del_list, #del_path {

			cursor: pointer;
		}

		#del_list {
			border: 1px solid black;
			width: fit-content;
			padding: 7px;
			font-size: 18px;
			color: #fff;
			background-color: red;
			cursor: pointer;
			margin-left: 20px;
			background: radial-gradient(#ff0005 0.3%, #a30707 90%);
			border-radius: 15px;
			box-shadow: 2px 1px black;
		}
		#del_list:hover {
			box-shadow: unset;
		}
		.print_shtrixkod,.print_shtrixkod_all{
			color: blue;
			cursor: pointer;
			font-size: 17px;
		}
		#cut_glass{
			border: 1px solid black;
			width: fit-content;
			padding: 7px;
			font-size: 18px;
			color: #fff;
			background-color: red;
			cursor: pointer;
			margin-left: 20px;
			background: radial-gradient(#ff00fb 0.3%, #ff00fb 90%);
			border-radius: 15px;
			box-shadow: 2px 1px black;
    	}

		#cut_glass:hover{
			box-shadow: unset;
    	}
		#status_change{
			border: 1px solid black;
			width: fit-content;
			padding: 7px;
			font-size: 18px;
			color: #fff;
			background-color: #2aad2e;
			cursor: pointer;
			background: radial-gradient(#31d319 0.3%, #2e8104 90%);
			border-radius: 15px;
			box-shadow: 2px 1px black;
		}
		#status_change:hover{
			box-shadow: unset;
		}
		#filter{
			border: 1px solid black;
			width: fit-content;
			padding: 7px;
			font-size: 18px;
			color: #fff;
			background-color: red;
			cursor: pointer;
			margin-left: 20px;
			background: radial-gradient(#1448ce 0.3%, #5e28ee 90%);
			border-radius: 15px;
			box-shadow: 2px 1px black;
		}
	</style>
	<!--[if gte IE 5]><frame></frame><![endif]-->
	<script src="file:///C:/Users/giorgi/AppData/Local/Temp/Rar$EXa10780.17568/www.spruko.com/demo/dashlead/assets/plugins/ionicons/ionicons/ionicons.z18qlu2u.js" data-resources-url="file:///C:/Users/giorgi/AppData/Local/Temp/Rar$EXa10780.17568/www.spruko.com/demo/dashlead/assets/plugins/ionicons/ionicons/" data-namespace="ionicons"></script>
</head>
<?php
$id =$_REQUEST['id'];

GLOBAL $db;

$db->setQuery("SELECT id,name FROM groups WHERE id = '$id'");
$proc_data = $db->getResultArray()['result'][0];
?>
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
                        <h2 class="main-content-title tx-24 mg-b-5"><?php echo $proc_data['name']; ?></h2>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">პროცესები</a></li>
							<li class="breadcrumb-item active" aria-current="page"><?php echo $proc_data['name']; ?></li>
						</ol>
					</div>
				</div>
				<!-- End Page Header -->
				<!-- Row -->
				<div class="row">
				<?php
					if($proc_data['id'] == 6 || $proc_data['id'] == 7){
						echo '<div id="main_div_2" style="width:97%;"></div>';
					}
					else if($proc_data['id'] == 2){
						echo '	<div class="col-sm-2" style="margin-bottom:20px;">
									<label>აირჩიეთ შუშა</label>
									<select id="selected_glass_cat_id">';
										getGlassOptions(0);
									echo '</select>
								</div>
								<div class="col-sm-2" style="margin-top:20px;">
									<div id="filter">ფილტრი</div>
								</div>';
						echo '<div id="main_cut" style="width:97%;"></div>';
					}
					else{
						echo '<div id="main_div" style="width:97%;"></div>';
					}
				?>
                
				</div>
				<!-- End Row -->
			</div>
		</div>
		<!-- End Main Content-->
		<!-- Sidebar -->
		<div class="sidebar sidebar-right sidebar-animate">
			<div class="sidebar-icon"> <a href="#" class="text-right float-right text-dark fs-20" data-toggle="sidebar-right" data-target=".sidebar-right"><i class="fe fe-x"></i></a> </div>
			<div class="sidebar-body">
				<h5>Todo</h5>
				<div class="d-flex p-2">
					<label class="ckbox">
						<input checked="" type="checkbox"><span>Hangout With friends</span></label> <span class="ml-auto"> <i class="fe fe-edit-2 text-primary mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Edit"></i> <i class="fe fe-trash-2 text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i> </span> </div>
				<div class="d-flex p-2 border-top">
					<label class="ckbox">
						<input type="checkbox"><span>Prepare for presentation</span></label> <span class="ml-auto"> <i class="fe fe-edit-2 text-primary mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Edit"></i> <i class="fe fe-trash-2 text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i> </span> </div>
				<div class="d-flex p-2 border-top">
					<label class="ckbox">
						<input type="checkbox"><span>Prepare for presentation</span></label> <span class="ml-auto"> <i class="fe fe-edit-2 text-primary mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Edit"></i> <i class="fe fe-trash-2 text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i> </span> </div>
				<div class="d-flex p-2 border-top">
					<label class="ckbox">
						<input checked="" type="checkbox"><span>System Updated</span></label> <span class="ml-auto"> <i class="fe fe-edit-2 text-primary mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Edit"></i> <i class="fe fe-trash-2 text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i> </span> </div>
				<div class="d-flex p-2 border-top">
					<label class="ckbox">
						<input type="checkbox"><span>Do something more</span></label> <span class="ml-auto"> <i class="fe fe-edit-2 text-primary mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Edit"></i> <i class="fe fe-trash-2 text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i> </span> </div>
				<div class="d-flex p-2 border-top">
					<label class="ckbox">
						<input type="checkbox"><span>System Updated</span></label> <span class="ml-auto"> <i class="fe fe-edit-2 text-primary mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Edit"></i> <i class="fe fe-trash-2 text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i> </span> </div>
				<div class="d-flex p-2 border-top">
					<label class="ckbox">
						<input type="checkbox"><span>Find an Idea</span></label> <span class="ml-auto"> <i class="fe fe-edit-2 text-primary mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Edit"></i> <i class="fe fe-trash-2 text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i> </span> </div>
				<div class="d-flex p-2 border-top mb-4 border-bottom">
					<label class="ckbox">
						<input type="checkbox"><span>Project review</span></label> <span class="ml-auto"> <i class="fe fe-edit-2 text-primary mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Edit"></i> <i class="fe fe-trash-2 text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i> </span> </div>
				<h5>Overview</h5>
				<div class="p-2">
					<div class="main-traffic-detail-item">
						<div> <span>Founder &amp; CEO</span> <span>24</span> </div>
						<div class="progress">
							<div aria-valuemax="100" aria-valuemin="0" aria-valuenow="20" class="progress-bar progress-bar-xs wd-20p" role="progressbar"></div>
						</div>
						<!-- progress -->
					</div>
					<div class="main-traffic-detail-item">
						<div> <span>UX Designer</span> <span>1</span> </div>
						<div class="progress">
							<div aria-valuemax="100" aria-valuemin="0" aria-valuenow="15" class="progress-bar progress-bar-xs bg-secondary wd-15p" role="progressbar"></div>
						</div>
						<!-- progress -->
					</div>
					<div class="main-traffic-detail-item">
						<div> <span>Recruitment</span> <span>87</span> </div>
						<div class="progress">
							<div aria-valuemax="100" aria-valuemin="0" aria-valuenow="45" class="progress-bar progress-bar-xs bg-success wd-45p" role="progressbar"></div>
						</div>
						<!-- progress -->
					</div>
					<div class="main-traffic-detail-item">
						<div> <span>Software Engineer</span> <span>32</span> </div>
						<div class="progress">
							<div aria-valuemax="100" aria-valuemin="0" aria-valuenow="25" class="progress-bar progress-bar-xs bg-info wd-25p" role="progressbar"></div>
						</div>
						<!-- progress -->
					</div>
					<div class="main-traffic-detail-item">
						<div> <span>Project Manager</span> <span>32</span> </div>
						<div class="progress">
							<div aria-valuemax="100" aria-valuemin="0" aria-valuenow="25" class="progress-bar progress-bar-xs bg-danger wd-25p" role="progressbar"></div>
						</div>
						<!-- progress -->
					</div>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->
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
	<div title="საწყობი - მიღება" id="get_edit_page">
	<div title="პროცესის დაწყება" id="proc_start_page"></div>
	<div title="პროცესის დასრულება" id="proc_finish_page"></div>
	<div title="პროცესის დახარვეზება" id="proc_error_page"></div>
		<p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>These items will be permanently deleted and cannot be recovered. Are you sure?</p>
	</div>
	<script>
		$(document).on('click', '.finish_proc', function(){
			var id = $(this).attr('data-id');
			var path_id = $(this).attr('path-id');
			var get_proc_id = <?php echo $_REQUEST['id']; ?>;

			if(get_proc_id == 2){
				var cut_id = $(this).attr('cut-id');

				$.ajax({
					url: "server-side/writes.action.php",
					type: "POST",
					data: {
						act: "finish_proc",
						proc_id: get_proc_id,
						cut_id: cut_id,
					},
					dataType: "json",
					success: function(data) {
						$('#proc_finish_page').html(data.page);
							
						$("#proc_finish_page").dialog({
							resizable: false,
							height: "auto",
							width: 800,
							modal: true,
							buttons: {
								"დასრულება": function() {
									var ready_to_save = 0;
									var url = new Object();
									url.act = "finish_glass_proc";
									url['gpyr'] = [];
									url['apyr'] = [];
									$(".glass_pyramids_m").each(function(i, x){
										if($(x).val() == ''){
											ready_to_save++;
										}
										else{
											url['gpyr'].push($(x).val()+'-'+$(x).attr('data-id'));
										}
										
									})

									$(".atxod_pyramids_m").each(function(i, x){
										if($(x).val() == ''){
											ready_to_save++;
										}
										else{
											url['apyr'].push($(x).val()+'-'+$(x).attr('data-id'));
										}
									})

									url.proc_id = get_proc_id;
									url.cut_id = cut_id;

									if(ready_to_save > 0){
										alert("გთხოვთ შეიყვანეთ ყველა პირამიდის ნომერი!!!");
									}
									else{
										$.ajax({
											url: "server-side/writes.action.php",
											type: "POST",
											data: url,
											dataType: "json",
											success: function(data) {
												
												$("#main_cut").data("kendoGrid").dataSource.read();
												$('#proc_finish_page').dialog("close");
											}
										});
									}
								}
							}
						});
					}
				});
			}
			else if(get_proc_id == 6 || get_proc_id == 7){
				var prod_id = $(this).attr('prod-id');

				$.ajax({
					url: "server-side/writes.action.php",
					type: "POST",
					data: {
						act: "finish_proc",
						prod_id: prod_id,
						proc_id: get_proc_id
					},
					dataType: "json",
					success: function(data) {
						$('#proc_finish_page').html(data.page);
							
						$("#proc_finish_page").dialog({
							resizable: false,
							height: "auto",
							width: 400,
							modal: true,
							buttons: {
								"დასრულება": function() {
									var pyramid = $("#pyramid_num").val();

									if(pyramid == ''){
										alert("გთხოვთ შეიყვანეთ პირამიდის ნომერი!!!");
									}
									else{
										$.ajax({
											url: "server-side/writes.action.php",
											type: "POST",
											data: {
												act: "finish_glass_proc",
												prod_id: prod_id,
												proc_id: get_proc_id,
												pyramid: pyramid
											},
											dataType: "json",
											success: function(data) {
												$("#main_div_2").data("kendoGrid").dataSource.read();
												$('#proc_finish_page').dialog("close");
											}
										});
									}
								}
							}
						});
					}
				});
			}
			else{
				$.ajax({
					url: "server-side/writes.action.php",
					type: "POST",
					data: {
						act: "finish_proc",
						proc_id: get_proc_id,
						path_id: path_id,
						glass_id: id
					},
					dataType: "json",
					success: function(data) {
						if(typeof data.error != 'undefined'){
							alert(data.error)
							return false;
						}
						$('#proc_finish_page').html(data.page);
							
						$("#proc_finish_page").dialog({
							resizable: false,
							height: "auto",
							width: 400,
							modal: true,
							buttons: {
								"დასრულება": function() {
									var pyramid = $("#pyramid_num").val();

									if(pyramid == ''){
										alert("გთხოვთ შეიყვანეთ პირამიდის ნომერი!!!");
									}
									else{
										$.ajax({
											url: "server-side/writes.action.php",
											type: "POST",
											data: {
												act: "finish_glass_proc",
												glass_id: id,
												path_id: path_id,
												proc_id: get_proc_id,
												pyramid: pyramid
											},
											dataType: "json",
											success: function(data) {
												if(typeof data.error != 'undefined'){
													alert(data.error);
													$("#main_div").data("kendoGrid").dataSource.read();
												}
												else{
													$("#main_div").data("kendoGrid").dataSource.filter({});
													setTimeout(function(){
														$( ".k-input-inner" ).eq(1).focus()
													},1000)
													$('#proc_finish_page').dialog("close");
												}
												
												
											}
										});
									}
								}
							}
						});
					}
				});
			}
			
		});
		$(document).on('click', '.del_glass', function(){
			var id = $(this).attr('data-id');
			var path_id = $(this).attr('path-id');
			var get_proc_id = <?php echo $_REQUEST['id']; ?>;

			if(get_proc_id == 2){
				var cut_id = $(this).attr('cut-id');

				$.ajax({
					url: "server-side/writes.action.php",
					type: "POST",
					data: {
						act: "start_glass_proc",
						proc_id: get_proc_id,
						cut_id: cut_id,
						glass_rate: 0
					},
					dataType: "json",
					success: function(data) {
						$('#proc_error_page').html(data.page);
							
						$("#proc_error_page").dialog({
							resizable: false,
							height: "auto",
							width: 800,
							modal: true,
							buttons: {
								"დახარვეზება": function() {
									var ready_to_save = 0;
									var url = new Object();
									url.act = "error_glass_proc";
									url['gpyr'] = [];
									url['apyr'] = [];
									$(".glass_error").each(function(i, x){
										if($(x).is(":checked")){
											if($(".glass_pyramids[data-id='"+$(x).attr('data-id')+"']").val() == ''){
												alert("შეიყვანეთ პირამიდის ნომერი დახარვეზებული მინისთვის");
												ready_to_save++;
											}
											else{
												url['gpyr'].push($(".glass_pyramids[data-id='"+$(x).attr('data-id')+"']").val()+'-'+$(x).attr('data-id'));
											}
											
										}
										
									})

									$(".atxod_error").each(function(i, x){
										if($(x).is(":checked")){
											if($(".atxod_pyramids[data-id='"+$(x).attr('data-id')+"']").val() == ''){
												alert("შეიყვანეთ პირამიდის ნომერი დახარვეზებული ატხოდისთვის");
												ready_to_save++;
											}
											else{
												if($(".atxod_width[data-id='"+$(x).attr('data-id')+"']").val() == '' || $(".atxod_height[data-id='"+$(x).attr('data-id')+"']").val() == ''){
													alert("ატხოდის ზომები არ შეიძლება იყოს ცარიელი, გთხოვთ შეავსოთ!!!");
													ready_to_save++;
												}
												else{
													url['apyr'].push($(".atxod_pyramids[data-id='"+$(x).attr('data-id')+"']").val()+'-'+$(x).attr('data-id')+'-'+$(".atxod_width[data-id='"+$(x).attr('data-id')+"']").val()+'-'+$(".atxod_height[data-id='"+$(x).attr('data-id')+"']").val());
												}
											}
											
										}
										
									})


									if(url['gpyr'].length == 0 && url['apyr'] == 0){
										alert("დასახარვეზებლად უნდა აირჩიოთ 1 მინა ან ატხოდი მაინც!!!");
										ready_to_save++;
									}
									console.log(url)

									url.proc_id = get_proc_id;
									url.cut_id = cut_id;

									if(ready_to_save == 0){
										$.ajax({
											url: "server-side/writes.action.php",
											type: "POST",
											data: url,
											dataType: "json",
											success: function(data) {
												$("#main_cut").data("kendoGrid").dataSource.read();
												$('#proc_error_page').dialog("close");
											}
										});
									}

									/* var ready_to_save = 0;
									var url = new Object();
									url.act = "error_glass_proc";
									url['gpyr'] = [];
									url['apyr'] = [];
									$(".glass_pyramids").each(function(i, x){
										if($(x).val() == ''){
											ready_to_save++;
										}
										else{
											url['gpyr'].push($(x).val()+'-'+$(x).attr('data-id'));
										}
										
									})

									$(".atxod_pyramids").each(function(i, x){
										if($(x).val() == ''){
											ready_to_save++;
										}
										else{
											url['apyr'].push($(x).val()+'-'+$(x).attr('data-id'));
										}
									})

									url.path_id = get_path_id;
									url.cut_id = cut_id;

									if(ready_to_save > 0){
										alert("გთხოვთ შეიყვანეთ ყველა პირამიდის ნომერი!!!");
									}
									else{
										$.ajax({
											url: "server-side/writes.action.php",
											type: "POST",
											data: url,
											dataType: "json",
											success: function(data) {
												$("#main_cut").data("kendoGrid").dataSource.read();
												$('#proc_error_page').dialog("close");
											}
										});
									} */
								}
							}
						});
					}
				});
			}
			else if(get_proc_id == 6 || get_proc_id == 7){
				var prod_id = $(this).attr('prod-id');

				$.ajax({
					url: "server-side/writes.action.php",
					type: "POST",
					data: {
						act: "start_glass_proc",
						proc_id: get_proc_id,
						prod_id: prod_id,
						glass_rate: 0
					},
					dataType: "json",
					success: function(data) {
						$('#proc_error_page').html(data.page);
							
						$("#proc_error_page").dialog({
							resizable: false,
							height: "auto",
							width: 800,
							modal: true,
							buttons: {
								"დახარვეზება": function() {
									var ready_to_save = 0;
									var url = new Object();
									url.act = "error_glass_proc";
									url['gpyr'] = [];
									if(!$(".error_prod").is(":checked")){
										$(".glass_error").each(function(i, x){
										if($(x).is(":checked")){
												if($(".glass_pyramids[data-id='"+$(x).attr('data-id')+"']").val() == ''){
													alert("შეიყვანეთ პირამიდის ნომერი დახარვეზებული მინისთვის");
													ready_to_save++;
												}
												else{
													url['gpyr'].push($(".glass_pyramids[data-id='"+$(x).attr('data-id')+"']").val()+'-'+$(x).attr('data-id'));
												}
												
											}
											
										})


										if(url['gpyr'].length == 0){
											alert("დასახარვეზებლად უნდა აირჩიოთ 1 მინა მაინც!!!");
											ready_to_save++;
										}
									}
									else{
										url.prod_pyramids = $(".prod_pyramids").val();
									}
									

									url.proc_id = get_proc_id;
									url.prod_id = prod_id;

									url.error_prod_all = $(".error_prod").is(":checked");
									

									if(ready_to_save == 0){
										$.ajax({
											url: "server-side/writes.action.php",
											type: "POST",
											data: url,
											dataType: "json",
											success: function(data) {
												$("#main_div_2").data("kendoGrid").dataSource.read();
												$('#proc_error_page').dialog("close");
											}
										});
									}
								}
							}
						});
					}
				});
			}
			else{
				var ask = prompt("ნამდვილად გსურთ მინის დახარვეზება? მიუთითეთ პირამიდის ნომერი!")
				if (ask != '' && ask > 0) {
					$.ajax({
						url: "server-side/writes.action.php",
						type: "POST",
						data: {
							act: "start_glass_proc",
							glass_id: id,
							proc_id: get_proc_id,
							path_id: path_id,
							glass_rate: 0,
							pyramid: ask
						},
						dataType: "json",
						success: function(data) {
							$("#main_div").data("kendoGrid").dataSource.read();
						}
					});
				}
			}
			
		})
		$(document).on('click', '.start_proc', function(){
			var id = $(this).attr('data-id');
			var path_id = $(this).attr('path-id');
			var get_proc_id = <?php echo $_REQUEST['id']; ?>;
			if (confirm("ნამდვილად გსურთ დაიწყოთ პროცესი?") == true) {
				if(get_proc_id == 2){
					var cut_id = $(this).attr('cut-id');

					$.ajax({
						url: "server-side/writes.action.php",
						type: "POST",
						data: {
							act: "start_glass_proc",
							glass_id: id,
							proc_id: get_proc_id,
							cut_id: cut_id,
							glass_rate: 2
						},
						dataType: "json",
						success: function(data) {
							if(typeof(data.error) == 'undefined'){
								
							}
							else{
								alert(data.error);
							}
							$("#main_cut").data("kendoGrid").dataSource.read();
						}
					});
				}
				else if(get_proc_id == 6 || get_proc_id == 7){
					var prod_id = $(this).attr('prod-id');

					$.ajax({
						url: "server-side/writes.action.php",
						type: "POST",
						data: {
							act: "start_glass_proc",
							glass_id: id,
							proc_id: get_proc_id,
							path_id: path_id,
							prod_id: prod_id,
							glass_rate: 2
						},
						dataType: "json",
						success: function(data) {
							if(typeof(data.error) == 'undefined'){
								
							}
							else{
								alert(data.error);
							}
							$("#main_div_2").data("kendoGrid").dataSource.read();
						}
					});
				}
				else{
					$.ajax({
						url: "server-side/writes.action.php",
						type: "POST",
						data: {
							act: "start_glass_proc",
							glass_id: id,
							path_id: path_id,
							proc_id: get_proc_id,
							glass_rate: 2
						},
						dataType: "json",
						success: function(data) {
							if(typeof(data.error) == 'undefined'){
								$("#main_div").data("kendoGrid").dataSource.filter({});
								setTimeout(function(){
									$( ".k-input-inner" ).eq(1).focus()
								},1000)
							}
							else{
								alert(data.error);
								$("#main_div").data("kendoGrid").dataSource.read();
								
							}
							
						}
					});
				}
				

			}

			/* $.ajax({
				url: "server-side/writes.action.php",
				type: "POST",
				data: {
					act: "start_proc",
					proc_id: <?php echo $id; ?>,
					glass_id: id
				},
				dataType: "json",
				success: function(data) {
					$('#proc_start_page').html(data.page);
						
					$("#proc_start_page").dialog({
						resizable: false,
						height: "auto",
						width: 600,
						modal: true,
						buttons: {
							"დაწყება": function() {
								var checked = $(".glass_rate:checked").val()
								if(typeof checked == 'undefined'){
									alert("გთხოვთ აირჩიოთ შეფასება!!!");
								}
								else if(checked == 0){
									if (confirm("ნამდვილად გსურთ შეაფასოთ მინა როგორც “ცუდი“? ამ შემთხვევაში მინის დამუშავებას ვერ შეძლებთ ") == true) {
										$.ajax({
											url: "server-side/writes.action.php",
											type: "POST",
											data: {
												act: "start_glass_proc",
												glass_id: id,
												path_id: path_id,
												glass_rate: checked
											},
											dataType: "json",
											success: function(data) {
												$("#main_div").data("kendoGrid").dataSource.read();
												$('#proc_start_page').dialog("close");
											}
										});
									}
								}
								else if(checked == 1){
									if (confirm("ნამდვილად გსურთ შეაფასოთ მინა როგორც “საშუალო“? ამ შემთხვევაში მინის დამუშავებას ვერ შეძლებთ ოფისის საბოლოო გადაწყვეტილებამდე ") == true) {
										$.ajax({
											url: "server-side/writes.action.php",
											type: "POST",
											data: {
												act: "start_glass_proc",
												glass_id: id,
												path_id: path_id,
												glass_rate: checked
											},
											dataType: "json",
											success: function(data) {
												$("#main_div").data("kendoGrid").dataSource.read();
												$('#proc_start_page').dialog("close");
											}
										});
									}
								}
								else if(checked == 2){
									if (confirm("ნამდვილად გსურთ შეაფასოთ მინა როგორც “კარგი“?") == true) {
										$.ajax({
											url: "server-side/writes.action.php",
											type: "POST",
											data: {
												act: "start_glass_proc",
												glass_id: id,
												path_id: path_id,
												glass_rate: checked
											},
											dataType: "json",
											success: function(data) {
												$("#main_div").data("kendoGrid").dataSource.read();
												$('#proc_start_page').dialog("close");
											}
										});
									}
								}
							},
							'დახურვა': function() {
								$(this).dialog("close");
							}
						}
					});
				}
			}); */
		});
	function GetDate(iname) {
				$("#" + iname).datepicker({
					changeMonth: true,
					changeYear: true
				});
				var date = $("#" + iname).val();
				$("#" + iname).datepicker("option", $.datepicker.regional["ka"]);
				$("#" + iname).datepicker("option", "dateFormat", "yy-mm-dd");
				$("#" + iname).datepicker("setDate", date);
			}
			$(document).on('click', '#logout', function() {
				$.ajax({
					url: "server-side/writes.action.php",
					type: "POST",
					data: {
						act: "destroy_session"
					},
					dataType: "json",
					success: function(data) {
						location.reload();
					}
				});
			})
			$(document).on('click', '#count_data', function() {
				$.ajax({
					url: "server-side/writes.action.php",
					type: "POST",
					data: {
						act: "count_total_money",
						start_date: $('#start_date').val(),
						end_date: $('#end_date').val()
					},
					dataType: "json",
					success: function(data) {
						var total = data.total + ' GEL';
						var personal_total = data.personal;
						$("#money_total").html(total);
						$("#personal_total").html('');
						$.each(personal_total, function(i, item) {
							$("#personal_total").append('<p><b>' + personal_total[i].name + ':</b> ' + personal_total[i].cc + ' GEL</p>');
						});
					}
				});
			});
			$(document).ready(function() {
				GetDate('start_date');
				GetDate('end_date');
				
				var hid = "&path_id=<?php echo $id; ?>"

				<?php
					if($proc_data['id'] == 6 || $proc_data['id'] == 7){
						echo 'LoadKendoTable_main2(hid);';
						echo 'setInterval(function () {$("#main_div_2").data("kendoGrid").dataSource.read();}, 15000);';
					}
					else if($proc_data['id'] == 2){
						echo 'LoadKendoTable_main3(hid);';
						echo 'setInterval(function () {$("#main_cut").data("kendoGrid").dataSource.read();}, 15000);';
						
					}
					else{
						echo 'LoadKendoTable_main(hid);';
						echo 'setInterval(function () {$("#main_div").data("kendoGrid").dataSource.read();}, 15000);';
					}
				?>

				$("#selected_glass_cat_id").chosen();
				
				
			});

			function LoadKendoTable_main(hidden) {
				//KendoUI CLASS CONFIGS BEGIN
				var aJaxURL = "server-side/writes.action.php";
				var gridName = 'main_div';
				var actions = '';
				var editType = "popup"; // Two types "popup" and "inline"
				var itemPerPage = 100;
				var columnsCount = 11;
				var columnsSQL = ["id:string","orderer:string", "datetime:string", "client:string", "client_phone:string", "client_addr:string", "cliddent_addr:string", "infooo:string", "avans:string", "add_money:string", "left_to_pay:string", "status:string"];
				var columnGeoNames = ["ID","დამკვეთი", "მინა", "ტიპი", "ფერი", "სიგრძეXსიგანე", "სურათი", "ინფო", "პირამიდის ნომ.", "სტატუსი", "ქმედება"];
				var showOperatorsByColumns = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
				var selectors = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
				var locked = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
				var lockable = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
				var filtersCustomOperators = '{"date":{"start":"-დან","ends":"-მდე","eq":"ზუსტი"}, "number":{"start":"-დან","ends":"-მდე","eq":"ზუსტი"}}';
				//KendoUI CLASS CONFIGS END
				const kendo = new kendoUI();
				kendo.loadKendoUI(aJaxURL, 'get_list_proccess', itemPerPage, columnsCount, columnsSQL, gridName, actions, editType, columnGeoNames, filtersCustomOperators, showOperatorsByColumns, selectors, hidden, 1, locked, lockable);
				setTimeout(function(){
					$( ".k-input-inner" ).eq(1).focus()
				},1000)
			}

			function LoadKendoTable_main2(hidden) {
				//KendoUI CLASS CONFIGS BEGIN
				var aJaxURL = "server-side/writes.action.php";
				var gridName = 'main_div_2';
				var actions = '';
				var editType = "popup"; // Two types "popup" and "inline"
				var itemPerPage = 100;
				var columnsCount = 8;
				var columnsSQL = ["product_id:string","orderer2:string", "product_glasses:string", "butil:string", "lameks:string", "product_pic:string", "product_status:string", "product_act:string"];
				var columnGeoNames = ["პრ.ID","დამკვეთი", "მინები", "ბუტილის ზომა", "ფირი", "სურათი", "სტატუსი", "ქმედება"];
				var showOperatorsByColumns = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
				var selectors = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
				var locked = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
				var lockable = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
				var filtersCustomOperators = '{"date":{"start":"-დან","ends":"-მდე","eq":"ზუსტი"}, "number":{"start":"-დან","ends":"-მდე","eq":"ზუსტი"}}';
				//KendoUI CLASS CONFIGS END
				const kendo = new kendoUI();
				kendo.loadKendoUI(aJaxURL, 'get_list_proccess', itemPerPage, columnsCount, columnsSQL, gridName, actions, editType, columnGeoNames, filtersCustomOperators, showOperatorsByColumns, selectors, hidden, 1, locked, lockable);
			}

			function LoadKendoTable_main3(hidden) {
				//KendoUI CLASS CONFIGS BEGIN
				var aJaxURL = "server-side/writes.action.php";
				var gridName = 'main_cut';
				var actions = '<?php if( in_array($_SESSION['GRPID'],array(1,12,13,11))){ echo '<div style="display:flex;gap: 10px;"><div id="cut_glass">ლისტის კოპირება</div> <div id="del_list">ლისტის წაშლა</div><div id="status_change">მოლოდინში გადაყვანა</div></div>'; } ?>';
				var editType = "popup"; // Two types "popup" and "inline"
				var itemPerPage = 100;
				var columnsCount = 6;
				var columnsSQL = ["cut_id","list:string", "product_glasses:string", "atxodebi:string", "product_status:string", "product_act:string"];
				var columnGeoNames = ["ჭრის ID","ლისტი", "მინები", "ათხოდები", "სტატუსი", "ქმედება"];
				var showOperatorsByColumns = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
				var selectors = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
				var locked = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
				var lockable = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
				var filtersCustomOperators = '{"date":{"start":"-დან","ends":"-მდე","eq":"ზუსტი"}, "number":{"start":"-დან","ends":"-მდე","eq":"ზუსტი"}}';
				//KendoUI CLASS CONFIGS END
				const kendo = new kendoUI();
				kendo.loadKendoUI(aJaxURL, 'get_list_proccess', itemPerPage, columnsCount, columnsSQL, gridName, actions, editType, columnGeoNames, filtersCustomOperators, showOperatorsByColumns, selectors, hidden, 1, locked, lockable);
			}

			
            $(document).on('click', '#sms_to_checked', function(){
                var checked_ids = [];
                $(".checked_phones:checked").each(function(index, elem){
                    checked_ids.push($(this).val());
                });

                $.ajax({
					url: "server-side/writes.action.php",
					type: "POST",
					data: {
						act: "get_sms_page_checked",
                        checked_ids: checked_ids.join(',')
					},
					dataType: "json",
					success: function(data) {
						$('#sms_to_checked_div').html(data.page);
						
						$("#sms_to_checked_div").dialog({
							resizable: false,
							height: "auto",
							width: 600,
							modal: true,
							buttons: {
								"დაწყება": function() {
									if (confirm("ნამდვილად გსურთ სმს-ების გაგზავნის დაწყება?") == true) {
                                        
                                        var message = $("#sms_message").val();
                                        if(message == ''){
                                            alert("გთხოვთ შეავსოთ SMS ტექსტი");
                                        }
                                        else{
                                            $.ajax({
                                                url: "server-side/writes.action.php",
                                                type: "POST",
                                                data: {
                                                    act: "start_sms_checked",
                                                    sms_text: message,
                                                    checked_ids: checked_ids.join(',')
                                                },
                                                dataType: "json",
                                                success: function(data) {
                                                    alert("SMS-ების დაგზავნა დაიწყო!!!");
                                                    location.reload();
                                                }
                                            });
                                        }
                                    }
								},
								'დახურვა': function() {
									$(this).dialog("close");
								}
							}
						});
					}
				});
            });
            $(document).on('click', '#sms_to_all', function() {
				$.ajax({
					url: "server-side/writes.action.php",
					type: "POST",
					data: {
						act: "get_sms_page_all"
					},
					dataType: "json",
					success: function(data) {
						$('#sms_to_all_div').html(data.page);
						
						$("#sms_to_all_div").dialog({
							resizable: false,
							height: "auto",
							width: 600,
							modal: true,
							buttons: {
								"დაწყება": function() {
									if (confirm("ნამდვილად გსურთ სმს-ების გაგზავნის დაწყება?") == true) {
                                        
                                        var message = $("#sms_message").val();
                                        if(message == ''){
                                            alert("გთხოვთ შეავსოთ SMS ტექსტი");
                                        }
                                        else{
                                            $.ajax({
                                                url: "server-side/writes.action.php",
                                                type: "POST",
                                                data: {
                                                    act: "start_sms_all",
                                                    sms_text: message
                                                },
                                                dataType: "json",
                                                success: function(data) {
                                                    alert("SMS-ების დაგზავნა დაიწყო!!!");
                                                    location.reload();
                                                }
                                            });
                                        }
                                    }
								},
								'დახურვა': function() {
									$(this).dialog("close");
								}
							}
						});
					}
				});
			});
			$(document).on('click', '#new_writing', function() {
				$.ajax({
					url: "server-side/writes.action.php",
					type: "POST",
					data: {
						act: "get_edit_page"
					},
					dataType: "json",
					success: function(data) {
						$('#get_edit_page').html(data.page);
						$("#personal,#statuses,#cabinet").chosen();
						$("#order_date").datetimepicker({
							dateFormat: "yy-mm-dd",
							timeFormat: "HH:mm:ss"
						});
						/* $(document).on('click', '#sex_set label', function() {
							var sex_id = $(this).prev().val();
							var kendo = new kendoUI();
							var multiselect = $("#zones").data("kendoMultiSelect");
							$(".k-content").html('');
							$(".k-content").append('<select id="zones" style="width: 100% !important; font-size: 12px;"></select>');
							if(sex_id == 1) {
								kendo.kendoMultiSelector('zones', 'server-side/writes.action.php', 'get_selected_zones_female', "აირჩით ზონები", data.selectedZones);
							} else if(sex_id == 2) {
								kendo.kendoMultiSelector('zones', 'server-side/writes.action.php', 'get_selected_zones_male', "აირჩით ზონები", data.selectedZones);
							}
							var multiselect = $("#zones").data("kendoMultiSelect");
							multiselect.bind("change", reloadImpulses);
						}); */
						var pr = "&order_id="+$("#writing_id").val();
						LoadKendoTable_product(pr);
						$("#get_edit_page").dialog({
							resizable: false,
							height: "auto",
							width: 1200,
							modal: true,
							buttons: {
								"შენახვა": function() {
									save_order();
								},
								'დახურვა': function() {
									$(this).dialog("close");
								}
							}
						});
					}
				});
			});
			$(document).on('click', '#new_product', function(){
				$.ajax({
					url: "server-side/writes.action.php",
					type: "POST",
					data: {
						act: "get_product_page"
					},
					dataType: "json",
					success: function(data) {
						$('#get_product_page').html(data.page);
						var kendo = new kendoUI();
						var pr = "&product_id="+$("#product_id").val();
						LoadKendoTable_glass(pr);
						$("#selected_product_id").chosen();
						$("#get_product_page").dialog({
							resizable: false,
							height: "auto",
							width: 1100,
							modal: true,
							buttons: {
								"შენახვა": function() {
									save_product();
								},
								'დახურვა': function() {
									$(this).dialog("close");
								}
							}
						});
					}
				});
			});

			$(document).on('click','#new_path', function(){
				$.ajax({
					url: "server-side/writes.action.php",
					type: "POST",
					data: {
						act: "get_path_page"
					},
					dataType: "json",
					success: function(data) {
						$('#get_path_page').html(data.page);
						$("#path_group_id,#path_status").chosen();
						$("#get_path_page").dialog({
							resizable: false,
							height: 400,
							width: 900,
							modal: true,
							buttons: {
								"შენახვა": function() {
									save_path();
								},
								'დახურვა': function() {
									$(this).dialog("close");
								}
							}
						});
					}
				});
			})
			$(document).on('click', '#copy_writing', function() {
				var grid = $("#main_div").data("kendoGrid");
				var selectedRows = grid.select();
				var writing_id;
				selectedRows.each(function(index, row) {
					var selectedItem = grid.dataItem(row);
					writing_id = selectedItem.id;
				});
				if(typeof writing_id == 'undefined') {
					alert('ჩაწერა აირჩიეთ ცხრილიდან');
				} else {
					$.ajax({
						url: "server-side/writes.action.php",
						type: "POST",
						data: {
							act: "copy_writing",
							writing_id: writing_id
						},
						dataType: "json",
						success: function(data) {
							$("#main_div").data("kendoGrid").dataSource.read();
						}
					});
				}
			});
			$(document).on('click', '#del_writing', function() {
				var grid = $("#main_div").data("kendoGrid");
				var selectedRows = grid.select();
				var writing_id;
				selectedRows.each(function(index, row) {
					var selectedItem = grid.dataItem(row);
					writing_id = selectedItem.id;
				});
				if(typeof writing_id == 'undefined') {
					alert('აირჩიეთ შეკვეთა!!!');
				} else {
					var ask = confirm("ნამდვილად გსურთ შეკვეთის წაშლა?");
					if(ask){
						$.ajax({
							url: "server-side/writes.action.php",
							type: "POST",
							data: {
								act: "disable",
								type: "order",
								id: writing_id
							},
							dataType: "json",
							success: function(data) {
								$("#main_div").data("kendoGrid").dataSource.read();
							}
						});
					}
					
				}
			});
			$(document).on('click', '#del_product', function() {
				var grid = $("#product_div").data("kendoGrid");
				var selectedRows = grid.select();
				var writing_id;
				selectedRows.each(function(index, row) {
					var selectedItem = grid.dataItem(row);
					writing_id = selectedItem.id2;
				});
				if(typeof writing_id == 'undefined') {
					alert('აირჩიეთ პროდუქტი!!!');
				} else {
					var ask = confirm("ნამდვილად გსურთ პროდუქტის წაშლა?");
					if(ask){
						$.ajax({
							url: "server-side/writes.action.php",
							type: "POST",
							data: {
								act: "disable",
								type: "product",
								id: writing_id
							},
							dataType: "json",
							success: function(data) {
								$("#product_div").data("kendoGrid").dataSource.read();
							}
						});
					}
					
				}
			});

			$(document).on('click', '#del_path', function() {
				var grid = $("#path_div").data("kendoGrid");
				var selectedRows = grid.select();
				var writing_id;
				selectedRows.each(function(index, row) {
					var selectedItem = grid.dataItem(row);
					writing_id = selectedItem.id2;
				});
				if(typeof writing_id == 'undefined') {
					alert('აირჩიეთ პროცესი!!!');
				} else {
					var ask = confirm("ნამდვილად გსურთ პროცესის წაშლა?");
					if(ask){
						$.ajax({
							url: "server-side/writes.action.php",
							type: "POST",
							data: {
								act: "disable",
								type: "path",
								id: writing_id
							},
							dataType: "json",
							success: function(data) {
								$("#path_div").data("kendoGrid").dataSource.read();
							}
						});
					}
					
				}
			});
			
			
			
			function reloadImpulses() {
				$.ajax({
					url: "server-side/writes.action.php",
					type: "POST",
					data: {
						act: "reload_impulses",
						writing_id: $('#writing_id').val(),
						zones: $('#zones').val()
					},
					dataType: "json",
					success: function(data) {
						$(".automator_child").html('');
						$(".automator_child").html(data.automatedChild);
					}
				});
			}

			function save_order() {
				let params = new Object;

				params.act = 'save_order';
				params.id = $("#writing_id").val();
				params.client_name = $("#client_name").val();
				params.client_pid = $("#client_pid").val();
				params.client_phone = $("#client_phone").val();
				params.client_addr = $("#client_addr").val();
				params.order_date = $("#order_date").val();
				params.pay_total = $("#pay_total").val();
				params.avansi = $("#avansi").val();
				params.avans_plus = $("#avans_plus").val();

				var ready_to_save = 0;
				if(params.client_name == '') {
					alert('შეიყვანეთ კლიენტის სახელი');
					ready_to_save++;
				}
				if(params.client_phone == '') {
					alert('შეიყვანეთ კლიენტის ნომერი');
					ready_to_save++;
				}
				if(params.client_addr == '') {
					alert('შეიყვანეთ კლიენტის მისამართი');
					ready_to_save++;
				}
				if(params.client_pid == '') {
					alert('შეიყვანეთ კლიენტის პირადი ნომერი');
					ready_to_save++;
				}

				if(ready_to_save == 0) {
					$.ajax({
						url: "server-side/writes.action.php",
						type: "POST",
						data: params,
						dataType: "json",
						success: function(data) {
							$("#main_div").data("kendoGrid").dataSource.read();
							$('#get_edit_page').dialog("close");
						}
					});
				}
			}
			function save_product() {
				let params = new Object;

				params.act = 'save_product';
				params.id = $("#product_id").val();
				params.order_id = $("#writing_id").val();
				params.selected_product_id = $("#selected_product_id").val();


				var ready_to_save = 0;


				if(ready_to_save == 0) {
					$.ajax({
						url: "server-side/writes.action.php",
						type: "POST",
						data: params,
						dataType: "json",
						success: function(data) {
							$("#product_div").data("kendoGrid").dataSource.read();
							$('#get_product_page').dialog("close");
						}
					});
				}
			}
			function save_glass(){
				let params = new Object;

				params.act = 'save_glass';
				params.id = $("#glass_id").val();
				params.product_id = $("#product_id").val();

				params.glass_cat = $("#selected_glass_cat_id").val();
				params.glass_type = $("#selected_glass_type_id").val();
				params.glass_color = $("#selected_glass_color_id").val();
				params.glass_status = $("#selected_glass_status").val();

				params.glass_width = $("#glass_width").val();
				params.glass_height = $("#glass_height").val();


				var ready_to_save = 0;


				if(ready_to_save == 0) {
					$.ajax({
						url: "server-side/writes.action.php",
						type: "POST",
						data: params,
						dataType: "json",
						success: function(data) {
							$("#glasses_div").data("kendoGrid").dataSource.read();
							$('#get_glass_page').dialog("close");
						}
					});
				}
			}
			function save_path(){
				let params = new Object;

				params.act = 'save_path';
				params.id = $("#path_id").val();
				params.glass_id = $("#glass_id").val();

				params.path_group_id = $("#path_group_id").val();
				params.path_status = $("#path_status").val();
				params.sort_n = $("#sort_n").val();
				


				var ready_to_save = 0;


				if(ready_to_save == 0) {
					$.ajax({
						url: "server-side/writes.action.php",
						type: "POST",
						data: params,
						dataType: "json",
						success: function(data) {
							$("#path_div").data("kendoGrid").dataSource.read();
							$('#get_path_page').dialog("close");
						}
					});
				}
			}

			$(document).on('click', '.print_shtrixkod, .print_shtrixkod_all', function(){
				var glass_id = $(this).attr('data-id');

				$.ajax({
					url: "ajax/print.ajax.php",
					type: "POST",
					data: "act=print&glass_id="+glass_id,
					dataType: "json",
					success: function (data) {
						if(typeof data != 'undefined'){
							var a = window.open('', '', 'height=500, width=500');
							a.document.write(data.page);
							a.document.close();
							setTimeout(function(){
								a.print();
							}, 1000)
							
						}
						else{
							alert('დაფიქსირდა შეცდომა');
						}
					}
				});
			});

			$(document).on('click', '#cut_glass', function(){
				var grid = $("#main_cut").data("kendoGrid");
				var selectedRows = grid.select();
				var writing_id = [];
				selectedRows.each(function(index, row) {
					var selectedItem = grid.dataItem(row);
					writing_id.push(selectedItem.cut_id);
				});
				if(typeof writing_id == 'undefined' || writing_id.length == 0) {
					alert('აირჩიეთ ლისტი!!');
				} 
				else if(writing_id.length > 1){
					alert("გთხოვთ აირჩიოთ მხოლოდ 1 ლისტი");
				}
				else {
					var ask = prompt("ნამდვილად გსურთ ლისტის დაკოპირება? თუ კი შეიყვანეთ კოპირების რ-ბა");
					if(ask > 0){
						$.ajax({
							url: "server-side/writes.action.php",
							type: "POST",
							data: {
								act: "copy_cut",
								ids: writing_id,
								limit: ask
							},
							dataType: "json",
							success: function(data) {
								if(typeof data.error != 'undefined'){
									alert(data.error);
								}
								$("#main_cut").data("kendoGrid").dataSource.read();
							}
						});
					}
					
				}
			});	
			$(document).on('click', '#del_list', function(){
				var grid = $("#main_cut").data("kendoGrid");
				var selectedRows = grid.select();
				var writing_id = [];
				selectedRows.each(function(index, row) {
					var selectedItem = grid.dataItem(row);
					writing_id.push(selectedItem.cut_id);
				});
				if(typeof writing_id == 'undefined' || writing_id.length == 0) {
					alert('აირჩიეთ ლისტი!!');
				} 
				else {
					var ask = confirm("ნამდვილად გსურთ ლისტის წაშლა?");
					if(ask){
						$.ajax({
							url: "server-side/writes.action.php",
							type: "POST",
							data: {
								act: "delete_cut",
								ids: writing_id
							},
							dataType: "json",
							success: function(data) {
								if(typeof data.error != 'undefined'){
									alert(data.error)
								}
								$("#main_cut").data("kendoGrid").dataSource.read();
							}
						});
					}
					
				}
			});
			$(document).on('click', '#status_change', function(){
				var grid = $("#main_cut").data("kendoGrid");
				var selectedRows = grid.select();
				var writing_id = [];
				selectedRows.each(function(index, row) {
					var selectedItem = grid.dataItem(row);
					writing_id.push(selectedItem.cut_id);
				});
				if(typeof writing_id == 'undefined' || writing_id.length == 0) {
					alert('აირჩიეთ ლისტი!!');
				} 
				else {
					var ask = confirm("ნამდვილად გსურთ ლისტის მიმდინარეში გადაყვანა?");
					if(ask){
						$.ajax({
							url: "server-side/writes.action.php",
							type: "POST",
							data: {
								act: "change_status_list",
								ids: writing_id
							},
							dataType: "json",
							success: function(data) {
								
								$("#main_cut").data("kendoGrid").dataSource.read();
							}
						});
					}
				}
			});

			$(document).on('click', '.error_prod', function(){
				var state = $(this).is(":checked");

				if(state){
					$(".glass_pyramids,.glass_error").prop('disabled', true)
					$(".glass_pyramids").val('');
					$(".glass_error").prop('checked', false)
					$(".prod_pyramids").prop('disabled', false)

				}
				else{
					$(".glass_pyramids,.glass_error").prop('disabled', false)
					$(".prod_pyramids").prop('disabled', true)
				}

			})


			$(document).on('click', '#filter', function(){
				let params = new Object;

				params.option_id = $("#selected_glass_cat_id").val();


				var search = "&path_id=2&option_id="+params.option_id;
				LoadKendoTable_main3(search)
			});
	</script>
</body>

</html>
<?php
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
    echo $data;
}

?>