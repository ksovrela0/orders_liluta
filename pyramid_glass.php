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
						<h2 class="main-content-title tx-24 mg-b-5">მინების მართვა</h2>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">შეკვეთები</a></li>
							<li class="breadcrumb-item active" aria-current="page">მინების მართვა</li>
						</ol>
					</div>
				</div>
				<!-- End Page Header -->
				<!-- Row -->
				<div class="row">
					<div id="pyramid_glass" style="width:97%;"></div>
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
	<div title="სტატუსის ცვლილება" id="get_status_page"></div>
	<div class="main-navbar-backdrop"></div>
	<div title="ბეჭვდვა" id="get_excel">
		<p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>These items will be permanently deleted and cannot be recovered. Are you sure?</p>
	</div>
	<script>
	var aJaxURL = "server-side/objects.action.php";
	$(document).on("dblclick", "#pyramid_glass tr.k-state-selected", function () {
		var grid = $("#pyramid_glass").data("kendoGrid");
		var dItem = grid.dataItem($(this));
		
		if(dItem.id == ''){
			return false;
		}
		
		$.ajax({
			url: aJaxURL,
			type: "POST",
			data: {
				act: "get_status_page",
				id: dItem.id_pyr_glass
			},
			dataType: "json",
			success: function(data){
				$('#get_status_page').html(data.page);
                $("#status_id").chosen();
				$("#get_status_page").dialog({
					resizable: false,
					height: 400,
					width: 400,
					modal: true,
					buttons: {
						'პირამიდის შეცვლა': function() {
							let params 			= new Object;
							params.act 			= 'change_pyramid';
							params.id 			= $("#glass_id").val();
							params.pyramid 		= $("#pyramid_num").val();
							
							$.ajax({
								url: aJaxURL,
								type: "POST",
								data: params,
								dataType: "json",
								success: function(data){
									if(typeof data.error != 'undefined'){
										alert(data.error)
									}
									else{
										$("#pyramid_glass").data("kendoGrid").dataSource.read();
										$('#get_status_page').dialog("close");
									}
									
								}
							});
						},
						'დახურვა': function() {
							$( this ).dialog( "close" );
						}
					}
				});
			}
		});
	});
	$(document).on('click','#button_add',function(){
		$.ajax({
			url: aJaxURL,
			type: "POST",
			data: {
				act: "get_add_page"
			},
			dataType: "json",
			success: function(data){
				$('#get_edit_page').html(data.page);
				$("#selected_glass_cat_id,#selected_glass_type_id,#selected_glass_color_id,#selected_glass_manuf_id").chosen();
				$("#get_edit_page").dialog({
					resizable: false,
					height: 400,
					width: 900,
					modal: true,
					buttons: {
						"შენახვა": function() {
							save_category();
						},
						'დახურვა': function() {
							$( this ).dialog( "close" );
						}
					}
				});
			}
		});
	});
	$(document).on('click','#button_trash',function(){
		var removeIDS = [];
		var entityGrid = $("#pyramid_glass").data("kendoGrid");
		var rows = entityGrid.select();
		rows.each(function(index, row) {
			var selectedItem = entityGrid.dataItem(row);
			// selectedItem has EntityVersionId and the rest of your model
			removeIDS.push(selectedItem.id);
		});
		$.ajax({
			url: aJaxURL,
			type: "POST",
			data: "act=disable&id=" + removeIDS,
			dataType: "json",
			success: function (data) {
				$("#pyramid_glass").data("kendoGrid").dataSource.read();
			}
		});
	});
	$( document ).ready(function() {
		LoadKendoTable_incomming()
	});
    function LoadKendoTable_branches(hidden){

		//KendoUI CLASS CONFIGS BEGIN
		var aJaxURL	        =   "server-side/objects.action.php";
		var gridName        = 	'object_branches';
		var actions         = 	'<div class="btn btn-list"><a id="button_add" style="color:white;" class="btn ripple btn-primary"><i class="fas fa-plus-square"></i> დამატება</a><a id="button_trash" style="color:white;" class="btn ripple btn-primary"><i class="fas fa-trash"></i> წაშლა</a></div>';
		var editType        =   "popup"; // Two types "popup" and "inline"
		var itemPerPage     = 	20;
		var columnsCount    =	5;
		var columnsSQL      = 	[
									"id:string",
									"name_geo:string",

									"work_h:string",
									"phone:string",
                                    "address:string"
								];
		var columnGeoNames  = 	[
									"ID", 
									"დასახელება",
									"მარაგში",
									"კვ. საერთო",
                                    "კვ. ფასი"
								];

		var showOperatorsByColumns  =   [0,0,0,0,0,0,0,0,0,0]; 
		var selectors               =   [0,0,0,0,0,0,0,0,0,0]; 

		var locked                  =   [0,0,0,0,0,0,0,0,0,0];
		var lockable                =   [0,0,0,0,0,0,0,0,0,0];

		var filtersCustomOperators = '{"date":{"start":"-დან","ends":"-მდე","eq":"ზუსტი"}, "number":{"start":"-დან","ends":"-მდე","eq":"ზუსტი"}}';
		//KendoUI CLASS CONFIGS END
			
		const kendo = new kendoUI();
		kendo.loadKendoUI(aJaxURL,'get_list_branches',itemPerPage,columnsCount,columnsSQL,gridName,actions,editType,columnGeoNames,filtersCustomOperators,showOperatorsByColumns,selectors,hidden, 1, locked, lockable);

	}
	function LoadKendoTable_incomming(hidden){

		//KendoUI CLASS CONFIGS BEGIN
		var aJaxURL	        =   "server-side/objects.action.php";
		var gridName        = 	'pyramid_glass';
		var actions         = 	'<?php if($_SESSION['GRPID'] != 11) { echo '<div id="new_glass">მინების გაცემა</div>';} ?>';
		var editType        =   "popup"; // Two types "popup" and "inline"
		var itemPerPage     = 	20;
		var columnsCount    =	10;
		var columnsSQL      = 	[
									"id_pyr_glass:string",
									"glass:string",
									"manuf:string",
                                    "shekv:string",
									"type_glass:string",
									"glass_color:string",
                                    "qty:string",
									"ueeess:string",
									"qty2:string",
									"size:string"
								];
		var columnGeoNames  = 	[
									"მინა ID", 
                                    "ზომა",
									"პირამიდა",
                                    "შეკვ.ID",
									"დამკვეთი",
									"პ/ნ ან ს/კ",
									"ტელეფონი",
									"გადახდილია?",
									"პროცესი",
                                    "პროც.სტატუსი"
								];

		var showOperatorsByColumns  =   [0,0,0,0,0,0,0,0,0,0]; 
		var selectors               =   [0,0,0,0,0,0,0,0,0,0]; 

		var locked                  =   [0,0,0,0,0,0,0,0,0,0];
		var lockable                =   [0,0,0,0,0,0,0,0,0,0];

		var filtersCustomOperators = '{"date":{"start":"-დან","ends":"-მდე","eq":"ზუსტი"}, "number":{"start":"-დან","ends":"-მდე","eq":"ზუსტი"}}';
		//KendoUI CLASS CONFIGS END
			
		const kendo = new kendoUI();
		kendo.loadKendoUI(aJaxURL,'get_list_by_glass',itemPerPage,columnsCount,columnsSQL,gridName,actions,editType,columnGeoNames,filtersCustomOperators,showOperatorsByColumns,selectors,hidden, 1, locked, lockable);

	}

	$(document).on('click', '#new_glass', function(){
		var grid = $("#pyramid_glass").data("kendoGrid");
		var selectedRows = grid.select();
		var glass_id = [];
		var order_id = [];
		var status = [];
		selectedRows.each(function(index, row) {
			var selectedItem = grid.dataItem(row);
			glass_id.push(selectedItem.id_pyr_glass);
			order_id.push(selectedItem.shekv);
			status.push(selectedItem.size);
		});
		if(typeof glass_id == 'undefined' || glass_id.length == 0) {
			alert('აირჩიეთ 1 მინა მაინც!!');
		}
		else{
			if(!allAreEqual(order_id)){
				alert('ერთდროულად მხოლოდ 1 შეკვეთის მინების გაცემაა შესაძლებელი');
			}
			else{
				if(confirm("ნამდვილად გსურთ მინების გაცემა?")){
					let params 			= new Object;
					params.act 			= 'give_glasses';
					params.ids 			= glass_id;
					params.order_id 			= order_id[0];
					$.ajax({
						url: aJaxURL,
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
							$("#pyramid_glass").data("kendoGrid").dataSource.read();
						}
					});
				}
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
	$(document).on('click','#upload_img',function(){
		$("#upload_back_img").trigger('click');
	});
	$(document).on('change','#upload_back_img', function(e){

		//submit the form here
		//var name = $(".fileupchat").val();
		var file_data = $('#upload_back_img').prop('files')[0];
		var fileName = e.target.files[0].name;
		var fileNameN = Math.ceil(Math.random()*99999999999);
		var fileSize = e.target.files[0].size;
		var fileExt = $(this).val().split('.').pop().toLowerCase();
		var form_data = new FormData();
		var object_id = $("#object_id").val();
		form_data.append('act', 'upload_object_logo');
		form_data.append('file', file_data);
		form_data.append('ext', fileExt);
		form_data.append('original', fileName);
		form_data.append('newName', fileNameN);
		form_data.append('object_id', object_id);

		var fileExtension = ['jpg','png','jpeg'];
		if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
			alert("დაუშვებელი ფორმატი!!!  გამოიყენეთ მხოლოდ: "+fileExtension.join(', '));
			$("#upload_back_img").val('');
		}
		else {

			if(fileSize>20971520) {
				alert("შეცდომა! ფაილის ზომა 20MB-ზე მეტია!!!");
				$(".upload_back_img").val('');
			}
			else{
				$.ajax({
				url: 'up.php', // point to server-side PHP script
				dataType: 'text',  // what to expect back from the PHP script, if anything
				cache: false,
				contentType: false,
				processData: false,
				data: form_data,
				type: 'post',
				success: function (data) {
					//$("#upload_back_img").val(data);
					console.log(data)
					$('#dialog_image_1').html('<img src="'+data+'"/>');
				}
				});
			}

		}
	});



	$(document).on('click','#upload_img_cat',function(){
		$("#upload_default_cat_img").trigger('click');
	});
	$(document).on('change','#upload_default_cat_img', function(e){

		//submit the form here
		//var name = $(".fileupchat").val();
		var file_data = $('#upload_default_cat_img').prop('files')[0];
		var fileName = e.target.files[0].name;
		var fileNameN = Math.ceil(Math.random()*99999999999);
		var fileSize = e.target.files[0].size;
		var fileExt = $(this).val().split('.').pop().toLowerCase();
		var form_data = new FormData();
		var object_id = $("#object_id").val();
		form_data.append('act', 'upload_object_default_cat');
		form_data.append('file', file_data);
		form_data.append('ext', fileExt);
		form_data.append('original', fileName);
		form_data.append('newName', fileNameN);
		form_data.append('object_id', object_id);

		var fileExtension = ['jpg','png','jpeg'];
		if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
			alert("დაუშვებელი ფორმატი!!!  გამოიყენეთ მხოლოდ: "+fileExtension.join(', '));
			$("#upload_default_cat_img").val('');
		}
		else {

			if(fileSize>20971520) {
				alert("შეცდომა! ფაილის ზომა 20MB-ზე მეტია!!!");
				$(".upload_default_cat_img").val('');
			}
			else{
				$.ajax({
				url: 'up.php', // point to server-side PHP script
				dataType: 'text',  // what to expect back from the PHP script, if anything
				cache: false,
				contentType: false,
				processData: false,
				data: form_data,
				type: 'post',
				success: function (data) {
					//$("#upload_back_img").val(data);
					console.log(data)
					$('#dialog_image_2').html('<img src="'+data+'"/>');
				}
				});
			}

		}
	});


	$(document).on('click','#upload_img_product',function(){
		$("#upload_default_product_img").trigger('click');
	});
	$(document).on('change','#upload_default_product_img', function(e){

		//submit the form here
		//var name = $(".fileupchat").val();
		var file_data = $('#upload_default_product_img').prop('files')[0];
		var fileName = e.target.files[0].name;
		var fileNameN = Math.ceil(Math.random()*99999999999);
		var fileSize = e.target.files[0].size;
		var fileExt = $(this).val().split('.').pop().toLowerCase();
		var form_data = new FormData();
		var object_id = $("#object_id").val();
		form_data.append('act', 'upload_object_default_product');
		form_data.append('file', file_data);
		form_data.append('ext', fileExt);
		form_data.append('original', fileName);
		form_data.append('newName', fileNameN);
		form_data.append('object_id', object_id);

		var fileExtension = ['jpg','png','jpeg'];
		if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
			alert("დაუშვებელი ფორმატი!!!  გამოიყენეთ მხოლოდ: "+fileExtension.join(', '));
			$("#upload_default_product_img").val('');
		}
		else {

			if(fileSize>20971520) {
				alert("შეცდომა! ფაილის ზომა 20MB-ზე მეტია!!!");
				$(".upload_default_product_img").val('');
			}
			else{
				$.ajax({
				url: 'up.php', // point to server-side PHP script
				dataType: 'text',  // what to expect back from the PHP script, if anything
				cache: false,
				contentType: false,
				processData: false,
				data: form_data,
				type: 'post',
				success: function (data) {
					//$("#upload_back_img").val(data);
					console.log(data)
					$('#dialog_image_3').html('<img src="'+data+'"/>');
				}
				});
			}

		}
	});


	$(document).on('click', '#proc_again', function(){
		var pyramid = $("#pyramid_num").val();
		var ask = confirm("ნამდვილად გსურთ ნამდვილად გსურთ პროცესის ხელახლა გატარება??");
		if(ask){
			if(pyramid == '' || pyramid == 0){
				alert("გთხოვთ მიუთითოთ სწორი პირამიდის ნომერი");
			}
			else{
				let params 			= new Object;
				params.act 			= 'save_mina_status';
				params.id 			= $("#glass_id").val();
				params.type 		= 'proc_again';
				params.pyramid 		= $("#pyramid_num").val();
				
				$.ajax({
					url: aJaxURL,
					type: "POST",
					data: params,
					dataType: "json",
					success: function(data){
						if(typeof data.error != 'undefined'){
							alert(data.error)
						}
						else{
							$("#pyramid_glass").data("kendoGrid").dataSource.read();
							$('#get_status_page').dialog("close");
						}
						
					}
				});
			}
		}
		
	});

	$(document).on('click', '#proc_next', function(){
		var pyramid = $("#pyramid_num").val();
		var ask = confirm("ნამდვილად გსურთ მინის შემდეგ პროცესზე გადაყვანა??");
		if(ask){
			if(pyramid == '' || pyramid == 0){
				alert("გთხოვთ მიუთითოთ სწორი პირამიდის ნომერი");
			}
			else{
				let params 			= new Object;
				params.act 			= 'save_mina_status';
				params.id 			= $("#glass_id").val();
				params.type 		= 'proc_next';
				params.pyramid 		= $("#pyramid_num").val();
				
				$.ajax({
					url: aJaxURL,
					type: "POST",
					data: params,
					dataType: "json",
					success: function(data){
						if(typeof data.error != 'undefined'){
							alert(data.error)
						}
						else{
							$("#pyramid_glass").data("kendoGrid").dataSource.read();
							$('#get_status_page').dialog("close");
						}
						
					}
				});
			}
		}
		
	});

	$(document).on('click', '#proc_start', function(){
		var pyramid = $("#pyramid_num").val();
		var ask = confirm("ნამდვილად გსურთ ჭრაზე ხელახლა გაშვება?");
		if(ask){
			if(pyramid == '' || pyramid == 0){
				alert("გთხოვთ მიუთითოთ სწორი პირამიდის ნომერი");
			}
			else{
				let params 			= new Object;
				params.act 			= 'save_mina_status';
				params.id 			= $("#glass_id").val();
				params.type 		= 'proc_start';
				params.pyramid 		= $("#pyramid_num").val();
				
				$.ajax({
					url: aJaxURL,
					type: "POST",
					data: params,
					dataType: "json",
					success: function(data){
						if(typeof data.error != 'undefined'){
							alert(data.error)
						}
						else{
							$("#pyramid_glass").data("kendoGrid").dataSource.read();
							$('#get_status_page').dialog("close");
						}
						
					}
				});
			}
		}
		
	});

	function save_category(){
		let params 			= new Object;
		params.act 			= 'save_mina_status';
		params.id 			= $("#glass_id").val();
		params.status_id 	= $("#status_id").val();
		params.pyramid 	= $("#pyramid_num").val();
		
		$.ajax({
			url: aJaxURL,
			type: "POST",
			data: params,
			dataType: "json",
			success: function(data){
				$("#pyramid_glass").data("kendoGrid").dataSource.read();
				$('#get_status_page').dialog("close");
			}
		});
		
	}
	</script>
</body>

</html>