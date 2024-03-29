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
	.chosen-container {
		width: 95% !important;
	}
	.badge{
		width: 100%!important;
	}
	.courier_start_order{
		border: 1px solid black;
		width: 155px;
		margin: 0 auto;
		margin-top: 10px;
		margin-bottom: 10px;
		background-color: #74a8f7;
		color: #fff;
		border-radius: 10px;
		font-size: 16px;
		font-weight: 900;
		padding: 8px;
		cursor: pointer;
	}
	.ostatus_999 {
		padding: 5px;
		color: white;
		background: radial-gradient(#ce1414 0.3%, #ee2828 90%);
		border-radius: 5px;
		font-size: 15px;
	}
	#ui-datepicker-div {
			z-index: 99999999!important;
		}
		
		.ui-state-active {
			background-color: #e00c33!important;
			color: #fff!important;
		}
		
		.ui-state-highlight {
			background-color: #ffffff!important;
			color: #000!important;
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
		
		.k-grid-toolbar {
			display: flex;
		}
		
		#new_writing, #new_product, #new_glass, #new_path {
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
		
		#copy_writing, #copy_product, #copy_glass,.copy_product {
			border: 1px solid black;
			width: fit-content;
			padding: 7px;
			font-size: 18px;
			color: #fff;
			cursor: pointer;
			margin-left: 20px;
			background: radial-gradient(#0039f3 0.3%, #1713b4 90%);
			border-radius: 15px;
			box-shadow: 2px 1px black;
		}

		#copy_writing:hover, #copy_product:hover, #copy_glass:hover,.copy_product:hover {
			box-shadow: unset;
		}
		
		#del_writing, #del_product, #del_glass, #del_path {
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

		#hard_finish_writing{
			border: 1px solid black;
			width: fit-content;
			padding: 7px;
			font-size: 18px;
			color: #fff;
			background-color: red;
			cursor: pointer;
			margin-left: 20px;
			background: radial-gradient(#4a8aff 0.3%, #072ea3 90%);
			border-radius: 15px;
			box-shadow: 2px 1px black;
		}

		#hard_give_glasses{
			border: 1px solid black;
			width: fit-content;
			padding: 7px;
			font-size: 18px;
			color: #fff;
			background-color: red;
			cursor: pointer;
			margin-left: 20px;
			background: radial-gradient(#a94aff 0.3%, #7000ff 90%);
			border-radius: 15px;
			box-shadow: 2px 1px black;
		}

		#del_writing:hover, #del_product:hover, #del_glass:hover, #del_path:hover {
			box-shadow: unset;
		}

		#new_writing:hover, #new_product:hover, #new_glass:hover, #new_path:hover  {
			box-shadow: unset;
		}

		#cut_glass{
			border: 1px solid black;
			width: fit-content;
			padding: 7px;
			font-size: 18px;
			color: #fff;
			background-color: #ff00fb;
			cursor: pointer;
			margin-left: 20px;
		}
		
		.red_dot {
			width: 100%;
			height: 20px;
			background-color: red;
		}
		
		.yellow_dot {
			width: 100%;
			height: 20px;
			background-color: yellow;
		}
		
		.blue_dot {
			width: 100%;
			height: 20px;
			background-color: blue;
		}
		
		.green_dot {
			width: 100%;
			height: 20px;
			background-color: green;
		}
		.mid_yellow_dot{
			width: 100%;
			height: 20px;
			background-color: #b2c73f;
		}
		.purple_dot {
			width: 100%;
			height: 20px;
			background-color: purple;
		}
		
		#logout {
			background-color: red;
			width: fit-content;
			padding: 5px;
			font-size: 18px;
			font-weight: bold;
			color: #fff;
			margin: 10px;
			cursor: pointer;
		}
		
		#leftSMS {
			background-color: green;
			width: fit-content;
			padding: 5px;
			font-size: 18px;
			font-weight: bold;
			color: #fff;
			margin: 10px;
		}
		
		.k-grid td {
			word-break: break-word;
			font-size: 15px;
			line-height: 31px;
		}
		
		#sms_to_all {
			border: 1px solid black;
			width: fit-content;
			padding: 7px;
			font-size: 18px;
			color: #fff;
			background-color: #2aad2e;
			cursor: pointer;
			margin-left: 320px;
		}
		
		#sms_to_checked {
			border: 1px solid black;
			width: fit-content;
			padding: 7px;
			font-size: 18px;
			color: #fff;
			background-color: #2aad2e;
			cursor: pointer;
			margin-left: 20px;
		}
		.ui-widget-content{
			background-color: #fff!important;
		}
		.fieldset input {
			height: 34.14px !important;
		}
		.proccess{
			border: 1px solid;
			padding: 4px;
			cursor: pointer;
			transition: 0.5s;
		}
		.proccess:hover{
			background-color: grey;
		}
		.row_glass{
			line-height: 11px;
			display: none;
			justify-content: flex-start;
			align-items: center;
		}
		.glass_detail{
			cursor: pointer;
		}
		.open_close{
			cursor: pointer;
		}

		.change_sizes,.change_damk{
			cursor: pointer;
			transition: 0.5s ease;
		}
		.change_sizes:hover,.change_damk:hover{
			font-size: 18px;
		}
		.k-master-row:has(.make_me_red) {
			background-color: #d5d1eb;
			color: #000;
		}
		.k-master-row:has(.make_me_red):hover {
			background-color:#96a2d6;
			color: black;
		}


		.k-master-row:has(.make_me_green) {
			background-color: #81ff81;
			color: #000;
		}
		.k-master-row:has(.make_me_yellow) {
			background-color: yellow;
			color: #000;
		}
		.k-master-row:has(.make_me_yellow):hover {
			background-color: #f9f99e;
			color: #000;
		}
		.k-master-row:has(.make_me_green):hover {
			background-color:#96a2d6;
			color: black;
		}


		.k-grid tbody tr:not(.k-detail-row).k-hover, .k-grid tbody tr:not(.k-detail-row).k-state-hover, .k-grid tbody tr:not(.k-detail-row):hover{
			background-color:#96a2d6;
		}

		.small_text{
			text-overflow: ellipsis;
			white-space: nowrap;
			overflow: hidden;
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
						<h2 class="main-content-title tx-24 mg-b-5">შეკვეთბი</h2>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">შეკვეთები</a></li>
							<li class="breadcrumb-item active" aria-current="page">მიმდინარე შეკვეთები</li>
						</ol>
					</div>
				</div>
				<!-- End Page Header -->
				<!-- Row -->
				<div class="row">
					<?php
						
						/* if(isMobile()){
							
							if($_SESSION['GRPID'] == 3){
								echo '
									<div id="mobile_courier_orders">
										
									</div>';
							}
							else{
								echo '<div id="orders"></div>';
							}
						}
						else{
							if($_SESSION['GRPID'] == 3){
								echo '<div id="orders_couriers"></div>';
							}
							else{
								echo '<div id="orders"></div>';
							}
							
						} */
					?>
					<div id="main_div"></div>
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
	
	<div title="შეკვეთა" id="get_edit_page"></div>
	<div title="შეკვეთა - პროდუქტი" id="get_product_page"></div>
	<div title="შეკვეთა - პროდუქტი - მინები" id="get_glass_page"></div>
	<div title="SMS ყველასთან" id="sms_to_all_div"></div>
	<div title="SMS მონიშნულებთან" id="sms_to_checked_div"></div>
	<div title="შეკვეთა - პროდუქტი - მინები - პროცესი" id="get_path_page"></div>
	<div title="პროცესის ფასი" id="get_price_page"></div>

	<div title="პროცესის ფასი" id="proc_start_page"></div>
	<div title="ზომების ცვლილება" id="change_sizes"></div>
	<div title="დამკვეთის ცვლილება" id="change_damk"></div>
	<div title="ჭრა!!!" id="get_cut_page"></div>
		<!-- <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>These items will be permanently deleted and cannot be recovered. Are you sure?</p> -->
	</div>
	<script>
			
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
				var hid = "&type=mine";
				LoadKendoTable_main(hid);
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



				<?php
					if(isset($_REQUEST['glass_id']) AND !empty($_REQUEST['glass_id'])){
						echo '
						$.ajax({
							url: "server-side/writes.action.php",
							type: "POST",
							data: {
								act: "get_edit_page_by_glass",
								id: '.$_REQUEST['glass_id'].'
							},
							dataType: "json",
							success: function(data) {
								$("#get_edit_page").html(data.page);
								$("#resp_user,#clients,#owner_id").chosen();
								$("#order_date").daterangepicker({
									timePicker: true,
									locale: {
										format: "YYYY-MM-DD HH:mm:ss"
									}
								});
								var kendo = new kendoUI();
								var pr = "&order_id="+data.order_id;
								LoadKendoTable_product(pr);
								$("#get_edit_page").dialog({
									resizable: false,
									height: "auto",
									width: 1400,
									modal: true,
									position: "top",
									buttons: {
										"შეკვეთის დასრულება": function() {
											hard_finish();
										},
										"გადათვლა": function() {
											$.ajax({
												url: "server-side/writes.action.php",
												type: "POST",
												data: {
													act: "calc_price",
													order_id: $("#writing_id").val()
												},
												dataType: "json",
												success: function(data) {
													$("#pay_total").val(data.total_price);
												}
											});
										},
										"შენახვა": function() {
											save_order();
										},
										\'დახურვა\': function() {
											if(confirm("ნამდვილად გსურთ დახურვა?")){
												$(this).dialog("close");
											}
										}
									}
								});
							}
						});
						
						';
					}
				?>
			});

			function LoadKendoTable_main(hidden) {
				//KendoUI CLASS CONFIGS BEGIN
				var aJaxURL = "server-side/writes.action.php";
				var gridName = 'main_div';
				var actions = '<?php if($_SESSION['GRPID'] != 11) { echo '<div id="new_writing">ახალი შეკვეთა</div><div style="display:none;" id="copy_writing">შეკვეთის კოპირება</div><div id="del_writing">შეკვეთის წაშლა</div><div id="hard_finish_writing">შეკვეთის დასრულება</div><div id="hard_give_glasses">შეკვეთის გაცემა</div>';} ?>';
				var editType = "popup"; // Two types "popup" and "inline"
				var itemPerPage = 100;
				var columnsCount = 13;
				var columnsSQL = ["id:string", "datetime:string", "client:string", "client_id:string", "client_phone:string", "client_addr:string", "sum_sqrm:string", "total_to_pay:string", "avans:string", "add_money:string", "left_to_pay:string", "status:string", "gacmin:string"];
				var columnGeoNames = ["ID", "შეკვ.თარიღ", "დამკვეთი", "დამკვეთი", "ტელეფონი", "მისამართი", "სულ კვ.მ", "სულ გადასახდელი", "ავანსი", "ზედმეტად დამატებული", "დარჩენილი", "სტატუსი", "გაც.მინები"];
				var showOperatorsByColumns = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
				var selectors = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
				var locked = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
				var lockable = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
				var filtersCustomOperators = '{"date":{"start":"-დან","ends":"-მდე","eq":"ზუსტი"}, "number":{"start":"-დან","ends":"-მდე","eq":"ზუსტი"}}';
				//KendoUI CLASS CONFIGS END
				const kendo = new kendoUI();
				kendo.loadKendoUI(aJaxURL, 'get_list', itemPerPage, columnsCount, columnsSQL, gridName, actions, editType, columnGeoNames, filtersCustomOperators, showOperatorsByColumns, selectors, hidden, 1, locked, lockable);
			}

			function LoadKendoTable_product(hidden) {
				//KendoUI CLASS CONFIGS BEGIN
				var aJaxURL = "server-side/writes.action.php";
				var gridName = 'product_div';
				var actions = '<div id="new_product">დამატება</div><div id="copy_product">კოპირება</div><div id="del_product"> წაშლა</div>';
				var editType = "popup"; // Two types "popup" and "inline"
				var itemPerPage = 100;
				var columnsCount = 6;
				var columnsSQL = ["id2:string", "name_product:string", "dasaxeleba:string", "glass_count:string", "picture_prod:string", "act_product:string"];
				var columnGeoNames = ["ID", "პროდუქტი", "დამკვეთი", "მინები", "სულ კვ.მ", "ქმედება"];
				var showOperatorsByColumns = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
				var selectors = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
				var locked = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
				var lockable = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
				var filtersCustomOperators = '{"date":{"start":"-დან","ends":"-მდე","eq":"ზუსტი"}, "number":{"start":"-დან","ends":"-მდე","eq":"ზუსტი"}}';
				//KendoUI CLASS CONFIGS END
				const kendo = new kendoUI();
				kendo.loadKendoUI(aJaxURL, 'get_list_product', itemPerPage, columnsCount, columnsSQL, gridName, actions, editType, columnGeoNames, filtersCustomOperators, showOperatorsByColumns, selectors, hidden, 1, locked, lockable);
			}
			function LoadKendoTable_otxod(hidden) {
				//KendoUI CLASS CONFIGS BEGIN
				var aJaxURL = "server-side/writes.action.php";
				var gridName = 'otxod_div';
				var actions = '<div id="new_glass">დამატება</div><div id="del_glass"> წაშლა</div>';
				var editType = "popup"; // Two types "popup" and "inline"
				var itemPerPage = 100;
				var columnsCount = 2;
				var columnsSQL = ["id:string","otxod:string"];
				var columnGeoNames = ["ID კოდი","ატხოდის ზომა"];
				var showOperatorsByColumns = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
				var selectors = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
				var locked = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
				var lockable = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
				var filtersCustomOperators = '{"date":{"start":"-დან","ends":"-მდე","eq":"ზუსტი"}, "number":{"start":"-დან","ends":"-მდე","eq":"ზუსტი"}}';
				//KendoUI CLASS CONFIGS END
				const kendo = new kendoUI();
				kendo.loadKendoUI(aJaxURL, 'get_list_glasses', itemPerPage, columnsCount, columnsSQL, gridName, actions, editType, columnGeoNames, filtersCustomOperators, showOperatorsByColumns, selectors, hidden, 1, locked, lockable);
			}
			function LoadKendoTable_glass(hidden) {
				//KendoUI CLASS CONFIGS BEGIN
				var aJaxURL = "server-side/writes.action.php";
				var gridName = 'glasses_div';
				var actions = '<div id="new_glass">დამატება</div><div id="copy_glass">კოპირება</div><div id="del_glass"> წაშლა</div>';
				var editType = "popup"; // Two types "popup" and "inline"
				var itemPerPage = 100;
				var columnsCount = 2;
				var columnsSQL = ["glasses_grouped:string","glasses_grouped_cc:string"];
				var columnGeoNames = ["მინები","რაოდენობა"];
				var showOperatorsByColumns = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
				var selectors = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
				var locked = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
				var lockable = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
				var filtersCustomOperators = '{"date":{"start":"-დან","ends":"-მდე","eq":"ზუსტი"}, "number":{"start":"-დან","ends":"-მდე","eq":"ზუსტი"}}';
				//KendoUI CLASS CONFIGS END
				const kendo = new kendoUI();
				kendo.loadKendoUI(aJaxURL, 'get_list_glasses', itemPerPage, columnsCount, columnsSQL, gridName, actions, editType, columnGeoNames, filtersCustomOperators, showOperatorsByColumns, selectors, hidden, 1, locked, lockable);
			}
			function LoadKendoTable_path(hidden) {
				//KendoUI CLASS CONFIGS BEGIN
				var aJaxURL = "server-side/writes.action.php";
				var gridName = 'path_div';
				var actions = '<div id="del_path"> წაშლა</div>';
				var editType = "popup"; // Two types "popup" and "inline"
				var itemPerPage = 100;
				var columnsCount = 5;
				var columnsSQL = ["id2:string", "proccess:string", "sort_n:string", "price_glass_proc:string", "stat_path_or:string"];
				var columnGeoNames = ["ID","პროცესი", "თანმიმდევრობა","ფასი", "სტატუსი"];
				var showOperatorsByColumns = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
				var selectors = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
				var locked = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
				var lockable = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
				var filtersCustomOperators = '{"date":{"start":"-დან","ends":"-მდე","eq":"ზუსტი"}, "number":{"start":"-დან","ends":"-მდე","eq":"ზუსტი"}}';
				//KendoUI CLASS CONFIGS END
				const kendo = new kendoUI();
				kendo.loadKendoUI(aJaxURL, 'get_list_glasses_path', itemPerPage, columnsCount, columnsSQL, gridName, actions, editType, columnGeoNames, filtersCustomOperators, showOperatorsByColumns, selectors, hidden, 1, locked, lockable);
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
							position: "top",
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
									if(confirm("ნამდვილად გსურთ დახურვა?")){
										$(this).dialog("close");
									}
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
							position: "top",
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
									if(confirm("ნამდვილად გსურთ დახურვა?")){
										$(this).dialog("close");
									}
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
						$("#resp_user,#clients,#owner_id").chosen();
						$("#order_date").daterangepicker({
							timePicker: true,
							locale: {
								format: 'YYYY-MM-DD HH:mm:ss'
							}
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
							width: 1400,
							modal: true,
							position: "top",
							buttons: {
								"შეკვეთის დასრულება": function() {
									hard_finish();
								},
								"გადათვლა": function() {
									$.ajax({
										url: "server-side/writes.action.php",
										type: "POST",
										data: {
											act: "calc_price",
											order_id: $("#writing_id").val()
										},
										dataType: "json",
										success: function(data) {
											$("#pay_total").val(data.total_price);
										}
									});
								},
								"შენახვა": function() {
									save_order();
								},
								'დახურვა': function() {
									if(confirm("ნამდვილად გსურთ დახურვა?")){
										$(this).dialog("close");
									}
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
						$("#selected_product_id,#glass_count").chosen();
						$("#get_product_page").dialog({
							resizable: false,
							height: "auto",
							width: 1100,
							modal: true,
							position: "top",
							buttons: {
								"შენახვა": function() {
									save_product();
								},
								'დახურვა': function() {
									if(confirm("ნამდვილად გსურთ დახურვა?")){
										$(this).dialog("close");
									}
								}
							}
						});
					}
				});
			});
			$(document).on('click', '#new_glass', function(){
				$.ajax({
					url: "server-side/writes.action.php",
					type: "POST",
					data: {
						act: "get_glass_page",
						owner_id: $('#owner_id').val()
					},
					dataType: "json",
					success: function(data) {
						$('#get_glass_page').html(data.page);

						$(".proccess[data-id='6'], .proccess[data-id='7']").css('display', 'none');
						if($("#selected_product_id").val() == 2){
							$(".proccess[data-id='7']").css('display', 'block');
						}
						else if($("#selected_product_id").val() == 3){
							$(".proccess[data-id='6']").css('display', 'block');
						}
						var kendo = new kendoUI();
						var pr = "&glass_id="+$("#glass_id").val();

						LoadKendoTable_path(pr);
						$("#selected_glass_cat_id,#selected_glass_type_id,#selected_glass_color_id,#selected_glass_status,#selected_glass_manuf_id").chosen();
						$("#get_glass_page").dialog({
							resizable: false,
							height: "auto",
							width: 1200,
							height: 550,
							modal: true,
							position: "top",
							buttons: {
								"შენახვა": function() {
									save_glass();
								},
								'დახურვა': function() {
									if(confirm("ნამდვილად გსურთ დახურვა?")){
										$(this).dialog("close");
									}
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
							position: "top",
							buttons: {
								"შენახვა": function() {
									save_path();
								},
								'დახურვა': function() {
									if(confirm("ნამდვილად გსურთ დახურვა?")){
										$(this).dialog("close");
									}
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
			$(document).on('click', '#hard_give_glasses', function(){
				var grid = $("#main_div").data("kendoGrid");
				var selectedRows = grid.select();
				var order_id = [];
				selectedRows.each(function(index, row) {
					var selectedItem = grid.dataItem(row);
					order_id.push(selectedItem.id);
				});
				if(typeof order_id == 'undefined' || order_id.length != 1) {
					alert('გასაცემად უნდა არიჩიოთ მხოლოდ 1 შეკვეთა');
				}
				else{
					if(confirm("ნამდვილად გსურთ მინების გაცემა?")){
						let params 			= new Object;
						params.act 			= 'hard_give_glasses';
						params.order_id 	= order_id;
						$.ajax({
							url: "server-side/writes.action.php",
							type: "POST",
							data: params,
							dataType: "json",
							success: function(data){
								if(typeof(data.error) == 'undefined'){
									$("#get_excel").html(data.page)
									$("#get_excel").dialog({
										resizable: false,
										height: 'auto',
										width: 120,
										modal: true,
										buttons: {
											'დახურვა': function() {
												$(this).dialog("close");
											}
										}
									});
								}
								else{
									alert(data.error);
								}
								$("#main_div").data("kendoGrid").dataSource.read();
							}
						});
					}
				}
			})
			$(document).on('click', '#hard_finish_writing', function(){
				var grid = $("#main_div").data("kendoGrid");
				var selectedRows = grid.select();
				var writing_id = [];
				selectedRows.each(function(index, row) {
					var selectedItem = grid.dataItem(row);
					writing_id.push(selectedItem.id);
				});
				console.log(writing_id)
				if(typeof writing_id == 'undefined' || writing_id.length == 0) {
					alert('აირჩიეთ შეკვეთა!!!');
				} else {
					var ask = confirm("ნამდვილად გსურთ შეკვეთის დასრულება?");
					if(ask){
						$.ajax({
							url: "server-side/writes.action.php",
							type: "POST",
							data: {
								act: "hard_finish",
								order_id: writing_id
							},
							dataType: "json",
							success: function(data) {
								$("#main_div").data("kendoGrid").dataSource.read();
							}
						});
					}
					
				}
			})
			$(document).on('click', '#del_writing', function() {
				var grid = $("#main_div").data("kendoGrid");
				var selectedRows = grid.select();
				var writing_id = [];
				selectedRows.each(function(index, row) {
					var selectedItem = grid.dataItem(row);
					writing_id.push(selectedItem.id);
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
				var writing_id = [];
				selectedRows.each(function(index, row) {
					var selectedItem = grid.dataItem(row);
					writing_id.push(selectedItem.id2);
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
								order_id: $("#writing_id").val(),
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
			$(document).on('click', '#del_glass', function() {
				var selectedRows = $(".selected_glass")
				var writing_id = [];
				selectedRows.each(function(index, row) {
					if($(row).is(":checked")){
						writing_id.push($(row).attr('data-id'));
					}
				});
				if(typeof writing_id == 'undefined') {
					alert('აირჩიეთ მინა!!!');
				} else {
					var ask = confirm("ნამდვილად გსურთ მინის წაშლა?");
					if(ask){
						$.ajax({
							url: "server-side/writes.action.php",
							type: "POST",
							data: {
								act: "disable",
								type: "glass",
								order_id: $("#writing_id").val(),
								id: writing_id
							},
							dataType: "json",
							success: function(data) {
								$("#glasses_div").data("kendoGrid").dataSource.read();
							}
						});
					}
					
				}
			});

			$(document).on('click', '#del_path', function() {
				var grid = $("#path_div").data("kendoGrid");
				var selectedRows = grid.select();
				var writing_id = [];
				selectedRows.each(function(index, row) {
					var selectedItem = grid.dataItem(row);
					writing_id.push(selectedItem.id2);
				});
				if(typeof writing_id == 'undefined' || writing_id.length == 0) {
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
								if(typeof data.error != 'undefined'){
									alert(data.error);
								}
								$("#path_div").data("kendoGrid").dataSource.read();
							}
						});
					}
					
				}
			});
			
			$(document).on("dblclick", "#main_div tr.k-state-selected", function() {
				var grid = $("#main_div").data("kendoGrid");
				var dItem = grid.dataItem($(this));
				if(dItem.id == '') {
					return false;
				}
				$.ajax({
					url: "server-side/writes.action.php",
					type: "POST",
					data: {
						act: "get_edit_page",
						id: dItem.id
					},
					dataType: "json",
					success: function(data) {
						$('#get_edit_page').html(data.page);
						$("#resp_user,#clients,#owner_id").chosen();
						$("#order_date").daterangepicker({
							timePicker: true,
							locale: {
								format: 'YYYY-MM-DD HH:mm:ss'
							}
						});
						var kendo = new kendoUI();
						/* var sex_id = $("input[name='sex_id']:checked").val();
						$.ajax({
							url: "server-side/writes.action.php",
							type: "POST",
							data: {
								act: "get_selected_zones",
								id: dItem.id
							},
							dataType: "json",
							success: function(data) {
								if(sex_id == 1) {
									kendo.kendoMultiSelector('zones', 'server-side/writes.action.php', 'get_selected_zones_female', "აირჩით ზონები", data.selectedZones);
								} else if(sex_id == 2) {
									kendo.kendoMultiSelector('zones', 'server-side/writes.action.php', 'get_selected_zones_male', "აირჩით ზონები", data.selectedZones);
								}
								var multiselect = $("#zones").data("kendoMultiSelect");
								multiselect.bind("change", reloadImpulses);
							}
						}); */
						var pr = "&order_id="+dItem.id;
						LoadKendoTable_product(pr);
						$("#get_edit_page").dialog({
							resizable: false,
							height: "auto",
							width: 1400,
							modal: true,
							position: "top",
							buttons: {
								"შეკვეთის დასრულება": function() {
									hard_finish();
								},
								"გადათვლა": function() {
									$.ajax({
										url: "server-side/writes.action.php",
										type: "POST",
										data: {
											act: "calc_price",
											order_id: $("#writing_id").val()
										},
										dataType: "json",
										success: function(data) {
											$("#pay_total").val(data.total_price);
										}
									});
								},
								"შენახვა": function() {
									save_order();
								},
								'დახურვა': function() {
									if(confirm("ნამდვილად გსურთ დახურვა?")){
										$(this).dialog("close");
									}
								}
							}
						});
					}
				});
			});
			$(document).on('click', '.glass_detail', function(){
				var dItem = new Object();

				dItem.id = $(this).attr('data-id');
				$.ajax({
					url: "server-side/writes.action.php",
					type: "POST",
					data: {
						act: "get_glass_page",
						id: dItem.id
					},
					dataType: "json",
					success: function(data) {
						$('#get_glass_page').html(data.page);
						$(".proccess[data-id='6'], .proccess[data-id='7']").css('display', 'none');
						if($("#selected_product_id").val() == 2){
							$(".proccess[data-id='7']").css('display', 'block');
						}
						else if($("#selected_product_id").val() == 3){
							$(".proccess[data-id='6']").css('display', 'block');
						}

						var kendo = new kendoUI();
						var hid = "&glass_id="+dItem.id;
						LoadKendoTable_path(hid);
						$("#selected_glass_cat_id,#selected_glass_type_id,#selected_glass_color_id,#selected_glass_status,#selected_glass_manuf_id").chosen();
						$("#get_glass_page").dialog({
							resizable: false,
							height: "auto",
							width: 1200,
							height: 550,
							modal: true,
							position: "top",
							buttons: {
								"შენახვა": function() {
									save_glass();
								},
								'დახურვა': function() {
									if(confirm("ნამდვილად გსურთ დახურვა?")){
										$(this).dialog("close");
									}
								}
							}
						});
					}
				});
			})

			$(document).on("dblclick", "#product_div tr.k-state-selected", function() {
				var grid = $("#product_div").data("kendoGrid");
				var dItem = grid.dataItem($(this));
				if(dItem.id == '') {
					return false;
				}
				$.ajax({
					url: "server-side/writes.action.php",
					type: "POST",
					data: {
						act: "get_product_page",
						id: dItem.id2
					},
					dataType: "json",
					success: function(data) {
						$('#get_product_page').html(data.page);
						var kendo = new kendoUI();
						var pr = "&product_id="+dItem.id2;
						LoadKendoTable_glass(pr);
						$("#selected_product_id,#glass_count").chosen();
						$("#get_product_page").dialog({
							resizable: false,
							height: "auto",
							width: 1100,
							modal: true,
							position: "top",
							buttons: {
								"შენახვა": function() {
									save_product();
								},
								'დახურვა': function() {
									if(confirm("ნამდვილად გსურთ დახურვა?")){
										$(this).dialog("close");
									}
								}
							}
						});
					}
				});
			});
			$(document).on("dblclick", "#path_div tr.k-state-selected", function() {
				var grid = $("#path_div").data("kendoGrid");
				var dItem = grid.dataItem($(this));
				if(dItem.id == '') {
					return false;
				}
				$.ajax({
					url: "server-side/writes.action.php",
					type: "POST",
					data: {
						act: "get_path_page",
						id: dItem.id2
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
							position: "top",
							buttons: {
								"შენახვა": function() {
									save_path();
								},
								'დახურვა': function() {
									if(confirm("ნამდვილად გსურთ დახურვა?")){
										$(this).dialog("close");
									}
								}
							}
						});
					}
				});
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
			function hard_finish() {
				let ask = confirm("ნამდვილად გსურთ შეკვეთის დასრულება?");

				if(ask){
					$.ajax({
						url: "server-side/writes.action.php",
						type: "POST",
						data: {
							act: "hard_finish",
							order_id: $('#writing_id').val(),
							zones: $('#zones').val()
						},
						dataType: "json",
						success: function(data) {
							$("#main_div").data("kendoGrid").dataSource.read();
							$('#get_edit_page').dialog("close");
						}
					});
				}
			}
			function save_order() {
				let params = new Object;

				params.act = 'save_order';
				params.id = $("#writing_id").val();
				params.client_name = $("#client_name").val();
				params.client_pid = $("#client_pid").val();
				params.client_comment = $("#client_comment").val();
				params.client_phone = $("#client_phone").val();
				params.client_addr = $("#client_addr").val();
				params.order_date = $("#order_date").val();
				params.pay_total = $("#pay_total").val();
				params.avansi = $("#avansi").val();
				params.avans_plus = $("#avans_plus").val();
				params.owner_id = $("#owner_id").val();

				params.actived_order = $("#actived_order").prop('checked');

				params.resp_user = $("#resp_user").val();

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
				params.add_info = $("#add_info").val();

				params.butil_size = $("#butil_size").val();
				params.firi_lameks = $("#firi_lameks").val();
				params.glass_count = $("#glass_count").val();


				var ready_to_save = 0;


				if(ready_to_save == 0) {
					$.ajax({
						url: "server-side/writes.action.php",
						type: "POST",
						data: params,
						dataType: "json",
						success: function(data) {
							if(typeof data.error != 'undefined'){
								alert(data.error)	
							}
							else{
								$("#product_div").data("kendoGrid").dataSource.read();
								$('#get_product_page').dialog("close");
							}
							
						}
					});
				}
			}
			function save_glass(){
				let params = new Object;

				params.act = 'save_glass';
				params.id = $("#glass_id").val();
				params.product_id = $("#product_id").val();
				params.order_id = $("#writing_id").val();
				params.glass_cat = $("#selected_glass_cat_id").val();
				params.glass_type = $("#selected_glass_type_id").val();
				params.glass_color = $("#selected_glass_color_id").val();
				params.glass_status = $("#selected_glass_status").val();
				params.glass_manuf = $("#selected_glass_manuf_id").val();
				params.glass_width = $("#glass_width").val();
				params.glass_height = $("#glass_height").val();

				params.glass_width_add = $("#glass_width_add").val();
				params.glass_height_add = $("#glass_height_add").val();

				params.stand_glass = $("#stand_glass").is(':checked');
				params.go_to_cut = $("#go_to_cut").is(':checked');

				params.glass_count = $("#glass_count").val();


				var ready_to_save = 0;

				if(params.glass_cat == ''){
					ready_to_save++;
					alert("შეიყვანეთ სისქე");
				}

				if(ready_to_save == 0) {
					$.ajax({
						url: "server-side/writes.action.php",
						type: "POST",
						data: params,
						dataType: "json",
						success: function(data) {
							if(typeof data.error != 'undefined'){
								alert(data.error)
							}
							else{
								$('#get_glass_page').dialog("close");
							}
							$("#glasses_div").data("kendoGrid").dataSource.read();
							
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
				params.price = $("#price").val();

				params.width = $("#glass_width").val();
				params.height = $("#glass_height").val();

				params.cuts = $("#cuts_2").val();
				params.holes = $("#holes_2").val();
				


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

							// $.ajax({
							// 	url: "server-side/writes.action.php",
							// 	type: "POST",
							// 	data: {
							// 		act: "calc_price",
							// 		order_id: $("#writing_id").val()
							// 	},
							// 	dataType: "json",
							// 	success: function(data) {
							// 		$("#pay_total").val(data.total_price);
							// 	}
							// });
						}
					});

					
				}
			}

			$(document).on('click', '.copy_product', function(){

				var ask = prompt("რამდენჯერ დაკოპირდეს პროდუქტი?");
				
				if(ask > 0){
					var prod_id = [];
					prod_id[0] = $(this).attr('prod-id');
					$.ajax({
						url: "server-side/writes.action.php",
						type: "POST",
						data: {
							act: "copy",
							type: "product",
							id: prod_id,
							order_id: $("#writing_id").val(),
							qty: ask
						},
						dataType: "json",
						success: function(data) {
							$("#product_div").data("kendoGrid").dataSource.read();
						}
					});
				}
					
				
			});
			
			$(document).on('click', '#copy_product', function(){
				var grid = $("#product_div").data("kendoGrid");
				var selectedRows = grid.select();
				var writing_id = [];
				selectedRows.each(function(index, row) {
					var selectedItem = grid.dataItem(row);
					writing_id.push(selectedItem.id2);
				});
				if(typeof writing_id == 'undefined' || writing_id.length == 0) {
					alert('აირჩიეთ პროდუქტი!!!');
				} else {
					var ask = prompt("რამდენჯერ დაკოპირდეს პროდუქტი?");
					
					if(ask > 0){
						$.ajax({
							url: "server-side/writes.action.php",
							type: "POST",
							data: {
								act: "copy",
								type: "product",
								id: writing_id,
								order_id: $("#writing_id").val(),
								qty: ask
							},
							dataType: "json",
							success: function(data) {
								$("#product_div").data("kendoGrid").dataSource.read();
							}
						});
					}
					else{
						alert("თქვენ შეიყვანეთ არასწორი რაოდენობა");
					}
					
				}
			});
			$(document).on('click', '#copy_glass', function(){
				var grid = $("#glasses_div").data("kendoGrid");
				var selectedRows = $(".selected_glass")
				var writing_id = [];
				selectedRows.each(function(index, row) {
					if($(row).is(":checked")){
						writing_id.push($(row).attr('data-id'));
					}
				});
				if(typeof writing_id == 'undefined' || writing_id.length == 0) {
					alert('აირჩიეთ მინა!!!');
				} else {
					var ask = prompt("რამდენჯერ დაკოპირდეს მინა?");
					
					if(ask > 0){
						$.ajax({
							url: "server-side/writes.action.php",
							type: "POST",
							data: {
								act: "copy",
								type: "glass",
								id: writing_id,
								order_id: $("#writing_id").val(),
								qty: ask
							},
							dataType: "json",
							success: function(data) {
								$("#glasses_div").data("kendoGrid").dataSource.read();
							}
						});
					}
					else{
						alert("თქვენ შეიყვანეთ არასწორი რაოდენობა");
					}
					
				}
			});


			$(document).on('click', '.proccess', function(){
				var proc_id = $(this).attr('data-id');
				$.ajax({
					url: "server-side/writes.action.php",
					type: "POST",
					data: {
						act: "calc_proc_price",
						proc_id: proc_id,
						glass_id:  $("#glass_id").val(),
						width: $("#glass_width").val(),
						height: $("#glass_height").val(),
					},
					dataType: "json",
					success: function(data) {
						//asdasd
						if(typeof data.error != 'undefined'){
							alert(data.error)
						}
						else{
							if(proc_id == 3){
								$('#get_price_page').html(data.page);
								$("#get_price_page").dialog({
									resizable: false,
									height: 300,
									width: 500,
									modal: true,
									position: "top",
									buttons: {
										"შენახვა": function() {
											let params = new Object;
											var price_total = 0;
											params.act = 'save_path';
											params.id = $("#path_id").val();
											params.glass_id = $("#glass_id").val();

											params.path_group_id = proc_id;
											params.path_status = 1;
											params.holes = $("#holes").val();
											params.cuts = $("#cuts").val();

											params.kronka_top = $("#kronka_top").prop('checked');
											params.kronka_bottom = $("#kronka_bottom").prop('checked');
											params.kronka_right = $("#kronka_right").prop('checked');
											params.kronka_left = $("#kronka_left").prop('checked');

											//params.sort_n = $("#sort_n").val();
											if(proc_id == 4){
												price_total = ($("#holes").val() * $("#hole_price").val()) + ($("#cuts").val() * $("#cut_price").val())
											}
											if(proc_id == 3){
												price_total = (($("#glass_width").val()/100) + ($("#glass_height").val()/100))*2*$("#kv_price").val()
											}
											if(proc_id == 5){
												price_total = (($("#glass_width").val()/100) * ($("#glass_height").val()/100))*$("#kv_price").val()
											}
											if(proc_id == 2){
												price_total = (($("#glass_width").val()/100) * ($("#glass_height").val()/100))*$("#kv_price").val()
											}
											if(proc_id == 6 || proc_id == 7){
												$.ajax({
													url: "server-side/writes.action.php",
													type: "POST",
													async: false,
													data: {
														act: "get_lameks_data",
														glass_id: $("#glass_id").val()
													},
													dataType: "json",
													success: function(data) {
														price_total = data.max_kv * $("#kv_price").val() * data.glass_count;
													}
												});
											}

											params.price = price_total;
											var ready_to_save = 0;


											if(ready_to_save == 0) {
												$.ajax({
													url: "server-side/writes.action.php",
													type: "POST",
													data: params,
													dataType: "json",
													
													success: function(data) {
														if(typeof data.error != 'undefined'){
															alert(data.error)
														}
														$("#path_div").data("kendoGrid").dataSource.read();
														$('#get_price_page').dialog("close");
													}
												});
											}
										},
										'დახურვა': function() {
											if(confirm("ნამდვილად გსურთ დახურვა?")){
												$(this).dialog("close");
											}
										}
									}
								});
							}
							if(proc_id == 4){
								$('#get_price_page').html(data.page);
								$("#get_price_page").dialog({
									resizable: false,
									height: 300,
									width: 500,
									modal: true,
									position: "top",
									buttons: {
										"შენახვა": function() {
											let params = new Object;
											var price_total = 0;
											params.act = 'save_path';
											params.id = $("#path_id").val();
											params.glass_id = $("#glass_id").val();

											params.path_group_id = proc_id;
											params.path_status = 1;
											params.holes = $("#holes").val();
											params.cuts = $("#cuts").val();
											//params.sort_n = $("#sort_n").val();
											if(proc_id == 4){
												price_total = ($("#holes").val() * $("#hole_price").val()) + ($("#cuts").val() * $("#cut_price").val())
											}
											if(proc_id == 3){
												price_total = (($("#glass_width").val()/100) + ($("#glass_height").val()/100))*2*$("#kv_price").val()
											}
											if(proc_id == 5){
												price_total = (($("#glass_width").val()/100) * ($("#glass_height").val()/100))*$("#kv_price").val()
											}
											if(proc_id == 2){
												price_total = (($("#glass_width").val()/100) * ($("#glass_height").val()/100))*$("#kv_price").val()
											}
											if(proc_id == 6 || proc_id == 7){
												$.ajax({
													url: "server-side/writes.action.php",
													type: "POST",
													async: false,
													data: {
														act: "get_lameks_data",
														glass_id: $("#glass_id").val()
													},
													dataType: "json",
													success: function(data) {
														price_total = data.max_kv * $("#kv_price").val() * data.glass_count;
													}
												});
											}

											params.price = price_total;
											var ready_to_save = 0;


											if(ready_to_save == 0) {
												$.ajax({
													url: "server-side/writes.action.php",
													type: "POST",
													data: params,
													dataType: "json",
													
													success: function(data) {
														if(typeof data.error != 'undefined'){
															alert(data.error)
														}
														$("#path_div").data("kendoGrid").dataSource.read();
														$('#get_price_page').dialog("close");
													}
												});
											}
										},
										'დახურვა': function() {
											if(confirm("ნამდვილად გსურთ დახურვა?")){
										$(this).dialog("close");
									}
										}
									}
								});
							}
							else{
								if(typeof data.error != 'undefined'){
									alert(data.error)
								}
								$("#path_div").data("kendoGrid").dataSource.read();
							}
						}
						
						

						
					}
				});
				

				/* let params = new Object;

				params.act = 'save_path';
				params.id = $("#path_id").val();
				params.glass_id = $("#glass_id").val();

				params.path_group_id = proc_id;
				params.path_status = 1;
				//params.sort_n = $("#sort_n").val();
				


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
				} */

			});
			$(document).on('click', "#upProdImg", function(){
				$("#product_file").trigger("click");
			})
			$(document).on('change','#product_file',function(e){
				//submit the form here
				//var name = $(".fileupchat").val();
				var file_data = $('#product_file').prop('files')[0];
				var fileName = e.target.files[0].name;
				var fileNameN = Math.ceil(Math.random()*99999999999);
				var fileSize = e.target.files[0].size;
				var fileExt = $(this).val().split('.').pop().toLowerCase();
				var form_data = new FormData();
				console.log(file_data)
				form_data.append('act', 'product_img');
				form_data.append('file', file_data);
				form_data.append('ext', fileExt);
				form_data.append('original', fileName);
				form_data.append('newName', fileNameN);
				form_data.append('product_id', $("#product_id").val());
				var fileExtension = ['jpg','png','gif','jpeg'];
				if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
				alert("დაუშვებელი ფორმატი!!!  გამოიყენეთ მხოლოდ: "+fileExtension.join(', '));
				$("#product_file").val('');
				}
				else {
					if(fileSize>20971520) {
						alert("შეცდომა! ფაილის ზომა 20MB-ზე მეტია!!!");
						$("#product_file").val('');
					}
					else{
						$.ajax({
							url: 'up.php', // point to server-side PHP script
							dataType: 'json',  // what to expect back from the PHP script, if anything
							cache: false,
							contentType: false,
							processData: false,
							data: form_data,
							type: 'post',
							success: function (data) {
								
								if(data.status == 'OK'){
									$("#upProdImg").attr("src", data.src);
									alert("ფაილი ატვირთულია");
								}
								else{
									alert('ვერ მოხერხდა ფაილის ატვირთვა');
								}
							}
						});
					}
				}
				
			});

			$(document).on('click', "#upGlassImg", function(){
				$("#glass_file").trigger("click");
			})
			$(document).on('change','#glass_file',function(e){
				//submit the form here
				//var name = $(".fileupchat").val();
				var file_data = $('#glass_file').prop('files')[0];
				var fileName = e.target.files[0].name;
				var fileNameN = Math.ceil(Math.random()*99999999999);
				var fileSize = e.target.files[0].size;
				var fileExt = $(this).val().split('.').pop().toLowerCase();
				var form_data = new FormData();
				console.log(file_data)
				form_data.append('act', 'glass_img');
				form_data.append('file', file_data);
				form_data.append('ext', fileExt);
				form_data.append('original', fileName);
				form_data.append('newName', fileNameN);
				form_data.append('glass_id', $("#glass_id").val());
				var fileExtension = ['jpg','png','gif','jpeg'];
				if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
				alert("დაუშვებელი ფორმატი!!!  გამოიყენეთ მხოლოდ: "+fileExtension.join(', '));
				$("#glass_file").val('');
				}
				else {
					if(fileSize>20971520) {
						alert("შეცდომა! ფაილის ზომა 20MB-ზე მეტია!!!");
						$("#glass_file").val('');
					}
					else{
						$.ajax({
							url: 'up.php', // point to server-side PHP script
							dataType: 'json',  // what to expect back from the PHP script, if anything
							cache: false,
							contentType: false,
							processData: false,
							data: form_data,
							type: 'post',
							success: function (data) {
								
								if(data.status == 'OK'){
									$("#upGlassImg").attr("src", data.src);
									alert("ფაილი ატვირთულია");
								}
								else{
									alert('ვერ მოხერხდა ფაილის ატვირთვა');
								}
							}
						});
					}
				}
				
			});

			$(document).on("click", "#cut_glass", function(){
				var grid = $("#glasses_div").data("kendoGrid");
				var selectedRows = grid.select();
				var glass_ids = [];
				var option_ids = [];
				var type_ids = [];
				var color_ids = [];
				var manuf_ids = [];
				selectedRows.each(function(index, row) {
					var selectedItem = grid.dataItem(row);
					glass_ids.push(selectedItem.id);
					option_ids.push(selectedItem.glass_option_id);
					type_ids.push(selectedItem.glass_type_id);
					color_ids.push(selectedItem.glass_color_id);
					manuf_ids.push(selectedItem.glass_manuf_id);
				});
				
				var allowToCut = 0;
				if(!allAreEqual(option_ids) || !allAreEqual(type_ids) || !allAreEqual(color_ids) || !allAreEqual(manuf_ids)){
					allowToCut++;
				}

				if(glass_ids.length == 0){
					alert("აირჩიეთ ერთი მინა მაინც!!");
				}
				else{
					if(allowToCut == 0){
						$.ajax({
							url: "server-side/writes.action.php",
							type: "POST",
							data: {
								act: "get_cut_page",
								ids: glass_ids,
								option_id: option_ids[0],
								type_id: type_ids[0],
								color_id: color_ids[0],
								manuf_id: manuf_ids[0],
							},
							dataType: "json",
							success: function(data) {
								$('#get_cut_page').html(data.page);
								var kendo = new kendoUI();
								LoadKendoTable_otxod();
								$("#selected_list_id").chosen();
								$("#get_cut_page").dialog({
									resizable: false,
									height: 400,
									width: 800,
									modal: true,
									position: "top",
									buttons: {
										"შენახვა": function() {
											save_cut();
										},
										'დახურვა': function() {
											if(confirm("ნამდვილად გსურთ დახურვა?")){
										$(this).dialog("close");
									}
										}
									}
								});
							}
						});
					}
					else{
						alert("დასაჭრელად არჩეული მინები არ არიან ერთნაირი ტიპის, ფერის, მწარმოებლის ან სისქის, გთხოვთ აირჩიოთ მხოლოდ მსგავსი მინები");
					}
				}
				

			})

			function allAreEqual(array) {
				const result = array.every(element => {
					if (element === array[0]) {
					return true;
					}
				});

				return result;
			}

			function save_cut(){
				let params = new Object;

				params.act = 'save_list_cut';
				params.glass_ids = $("#glass_ids").val();
				params.list_id = $("#selected_list_id").val();
				params.product_id = $("#product_id").val();
				params.order_id = $("#writing_id").val();

				$.ajax({
					url: "server-side/writes.action.php",
					type: "POST",
					data: params,
					dataType: "json",
					success: function(data) {
						if(data.status == 'OK'){
							$("#glasses_div").data("kendoGrid").dataSource.read();
							$('#get_cut_page').dialog("close");
						}else{
							alert(data.error)
						}
						
					}
				});
			}

			$(document).on('click', '.open_close', function(){
				if($(this).parent().find('.row_glass').css('display') == 'flex'){
					$(this).parent().find('.row_glass').css('display', 'none');
				}
				else{
					$(this).parent().find('.row_glass').css('display', 'flex');
				}
				
			})

			$(document).on('change', '#selected_product_id', function(){
				var prod_id = $(this).val();
				if(prod_id == 2){
					$("#only_minapaket").css('display', 'block');
					$("#only_lameks").css('display', 'none');

					$("#both_proc").css('display', 'block');
				}
				else if(prod_id == 3){
					$("#only_minapaket").css('display', 'none');
					$("#only_lameks").css('display', 'block');
					$("#both_proc").css('display', 'block');
				}
				else{
					$("#only_minapaket").css('display', 'none');
					$("#only_lameks").css('display', 'none');
					$("#both_proc").css('display', 'none');
				}
			});

			$(document).on('click', '.change_damk', function(){
				var prod_id = $(this).attr('prod-id');


				$.ajax({
					url: "server-side/writes.action.php",
					type: "POST",
					data: {
						act: "change_damk",
						prod_id: prod_id,
						
					},
					dataType: "json",
					success: function(data) {
						$('#change_damk').html(data.page);

						$("#change_damk").dialog({
							resizable: false,
							height: 250,
							width: 400,
							modal: true,
							buttons: {
								"შენახვა": function() {
									$.ajax({
										url: "server-side/writes.action.php",
										type: "POST",
										data: {
											act: "change_damk_save",
											prod_id: prod_id,
											damkveti: $("#add_info_new").val()
											
										},
										dataType: "json",
										success: function(data) {
											$("#product_div").data("kendoGrid").dataSource.read();
											$('#change_damk').dialog("close");
										}
									});
									
								},
								'დახურვა': function() {
									if(confirm("ნამდვილად გსურთ დახურვა?")){
										$(this).dialog("close");
									}
								}
							}
						});
					}
				});
			});
			$(document).on('click', '.change_sizes', function(){
				var prod_id = $(this).attr('prod-id');
				var glass_id = $(this).attr('glass-id');


				$.ajax({
					url: "server-side/writes.action.php",
					type: "POST",
					data: {
						act: "change_sizes",
						prod_id: prod_id,
						glass_id: glass_id
						
					},
					dataType: "json",
					success: function(data) {
						$('#change_sizes').html(data.page);

						$("#change_sizes").dialog({
							resizable: false,
							height: 250,
							width: 400,
							modal: true,
							buttons: {
								"შენახვა": function() {
									$.ajax({
										url: "server-side/writes.action.php",
										type: "POST",
										data: {
											act: "change_sizes_save",
											prod_id: prod_id,
											glass_id: glass_id,
											width: $("#glass_width_change").val(),
											height: $("#glass_height_change").val()
											
										},
										dataType: "json",
										success: function(data) {
											$("#product_div").data("kendoGrid").dataSource.read();
											$('#change_sizes').dialog("close");
										}
									});
									
								},
								'დახურვა': function() {
									if(confirm("ნამდვილად გსურთ დახურვა?")){
										$(this).dialog("close");
									}
								}
							}
						});
					}
				});
			});
			$(document).on('change', '#owner_id', function(){
				var client_id = $(this).val();

				$.ajax({
					url: "server-side/writes.action.php",
					type: "POST",
					data: "act=get_client&id="+client_id,
					dataType: "json",
					success: function(data){
						$("#clients").val(0);
						$('#clients').trigger('chosen:updated');


						$("#client_name").val(data.client_name);
						$("#client_pid").val(data.client_pid);
						$("#client_phone").val(data.client_phone);
						$("#client_addr").val(data.client_addr);
					}
				})
			})
			$(document).on('change', '#clients', function(){
				var client_id = $(this).val();

				$.ajax({
					url: "server-side/writes.action.php",
					type: "POST",
					data: "act=get_client&id="+client_id,
					dataType: "json",
					success: function(data){
						$("#clients").val(0);
						$('#clients').trigger('chosen:updated');


						$("#client_name").val(data.client_name);
						$("#client_pid").val(data.client_pid);
						$("#client_phone").val(data.client_phone);
						$("#client_addr").val(data.client_addr);
					}
				})
			})
			$(document).on('click','#select_all_kronka', function(){
				$('#kronka_top, #kronka_bottom, #kronka_left, #kronka_right').click();
			});	
			</script>
			<div title="ბეჭვდვა" id="get_excel">
</body>

</html>