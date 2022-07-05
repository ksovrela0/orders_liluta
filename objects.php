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
	</style>
	<!--[if gte IE 5]><frame></frame><![endif]-->
	<script src="file:///C:/Users/giorgi/AppData/Local/Temp/Rar$EXa10780.17568/www.spruko.com/demo/dashlead/assets/plugins/ionicons/ionicons/ionicons.z18qlu2u.js" data-resources-url="file:///C:/Users/giorgi/AppData/Local/Temp/Rar$EXa10780.17568/www.spruko.com/demo/dashlead/assets/plugins/ionicons/ionicons/" data-namespace="ionicons"></script>
</head>

<body class="main-body">
	
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
						<h2 class="main-content-title tx-24 mg-b-5">საწყობი</h2>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">საწყობის მართვა</a></li>
							<li class="breadcrumb-item active" aria-current="page">საწყობი</li>
						</ol>
					</div>
				</div>
				<!-- End Page Header -->
				<!-- Row -->
				<div class="row">
					<div id="product_categories"></div>
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
		<p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>These items will be permanently deleted and cannot be recovered. Are you sure?</p>
	</div>
	<script>
	var aJaxURL = "server-side/objects.action.php";
	$(document).on("dblclick", "#product_categories tr.k-state-selected", function () {
		var grid = $("#product_categories").data("kendoGrid");
		var dItem = grid.dataItem($(this));
		
		if(dItem.id == ''){
			return false;
		}
		
		$.ajax({
			url: aJaxURL,
			type: "POST",
			data: {
				act: "get_edit_page",
				id: dItem.id
			},
			dataType: "json",
			success: function(data){
				$('#get_edit_page').html(data.page);
                $("#selected_glass_cat_id,#selected_glass_type_id,#selected_glass_color_id,#selected_glass_manuf_id,#owner,#gtype,#bringer").chosen();
				$("#get_edit_page").dialog({
					resizable: false,
					height: 500,
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
				$("#selected_glass_cat_id,#selected_glass_type_id,#selected_glass_color_id,#selected_glass_manuf_id,#owner,#gtype,#bringer").chosen();
				$("#get_edit_page").dialog({
					resizable: false,
					height: 500,
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
		var entityGrid = $("#product_categories").data("kendoGrid");
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
				$("#product_categories").data("kendoGrid").dataSource.read();
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
		var actions         = 	'<div class="btn btn-list"><a id="button_add" style="color:white;" class="btn ripple btn-primary"><i class="fas fa-plus-square"></i> დამატება</a><a id="button_trash" style="color:white;" class="btn ripple btn-primary"><i class="fas fa-trash"></i> გამორთვა</a></div>';
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
		var gridName        = 	'product_categories';
		var actions         = 	'<div class="btn btn-list"><a id="button_add" style="color:white;" class="btn ripple btn-primary"><i class="fas fa-plus-square"></i> დამატება</a><a id="button_trash" style="color:white;" class="btn ripple btn-primary"><i class="fas fa-trash"></i> გამორთვა</a><a id="button_copy" style="color:white;" class="btn ripple btn-primary"><i class="fas fa-plus-square"></i> კოპირება</a></div> <div> ჯამში მინა: <span id="total_glass">0</span></div>';
		var editType        =   "popup"; // Two types "popup" and "inline"
		var itemPerPage     = 	20;
		var columnsCount    =	12;
		var columnsSQL      = 	[
									"id:string",
									"glass:string",
									"manuf:string",
									"type_glass:string",
									"glass_color:string",
                                    "qty:string",
									"size:string",
									"price:string",
									"marja:string",
									"owner:string",
									"gtype:string",
									"pyramid:string"
								];
		var columnGeoNames  = 	[
									"ID", 
									"შუშა",
									"მწარმოებელი",
									"ტიპი",
									"ფერი",
                                    "დარ.რაოდ",
									"ზომა",
									"მოიტანა",
									"კატეგორია",
									"ფასნამატი",
									"ფასი კვ.",
									"პირამიდის #"
								];

		var showOperatorsByColumns  =   [0,0,0,0,0,0,0,0,0,0,0,0,0,0]; 
		var selectors               =   [0,0,0,0,0,0,0,0,0,0,0,0,0,0]; 

		var locked                  =   [0,0,0,0,0,0,0,0,0,0,0,0,0,0];
		var lockable                =   [0,0,0,0,0,0,0,0,0,0,0,0,0,0];

		var filtersCustomOperators = '{"date":{"start":"-დან","ends":"-მდე","eq":"ზუსტი"}, "number":{"start":"-დან","ends":"-მდე","eq":"ზუსტი"}}';
		//KendoUI CLASS CONFIGS END
			
		const kendo = new kendoUI();
		kendo.loadKendoUI(aJaxURL,'get_list',itemPerPage,columnsCount,columnsSQL,gridName,actions,editType,columnGeoNames,filtersCustomOperators,showOperatorsByColumns,selectors,hidden, 1, locked, lockable);

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
	function save_category(){
		let params 			= new Object;
		params.act 			= 'save_warehouse';
		params.id 			= $("#warehouse_id").val();
		params.glass_cat 	= $("#selected_glass_cat_id").val();
		params.owner 	= $("#owner").val();
		params.bringer 	= $("#bringer").val();
		params.gtype 	= $("#gtype").val();
		params.marja 	= $("#marja").val();
		params.glass_type 	= $("#selected_glass_type_id").val();
		params.glass_color	= $("#selected_glass_color_id").val();
		params.glass_qty 		= $("#glass_qty").val();
		params.glass_width 		= $("#glass_width").val();
		params.glass_height 		= $("#glass_height").val();
		params.sqr_price 	= $("#sqr_price").val();
		params.pyramid 	= $("#pyramid").val();
		params.glass_manuf 	= $("#selected_glass_manuf_id").val();

		var ready = 0;
		if(params.glass_cat == 0){
			alert("თქვენ გამოტოვეთ სისქე");
			ready++;
		}

		if(params.glass_manuf == 0){
			alert("თქვენ გამოტოვეთ მწარმოებელი");
			ready++;
		}
		if(params.glass_type == 0){
			alert("თქვენ გამოტოვეთ ტიპი");
			ready++;
		}
		if(params.glass_color == 0){
			alert("თქვენ გამოტოვეთ ფერი");
			ready++;
		}
		if(params.owner == 0 && params.bringer == 0){
			alert("აუცილებლად შეიყვანეთ მომწოდებელი ან კლიენტი");
			ready++;
		}
		if(params.gtype == 0){
			alert("თქვენ გამოტოვეთ კატეგორია");
			ready++;
		}

		if(params.glass_qty == 0 || params.glass_qty == ''){
			alert("თქვენ გამოტოვეთ რაოდენობა");
			ready++;
		}
		if(params.glass_width == 0 || params.glass_width == ''){
			alert("თქვენ გამოტოვეთ სიმაღლე");
			ready++;
		}
		if(params.glass_height == 0 || params.glass_height == ''){
			alert("თქვენ გამოტოვეთ სიგანე");
			ready++;
		}
		if(params.sqr_price == 0 || params.sqr_price == ''){
			alert("თქვენ გამოტოვეთ კვადრატულის ფასი");
			ready++;
		}
		if(params.marja == 0 || params.marja == ''){
			alert("თქვენ გამოტოვეთ ფასნამატი");
			ready++;
		}
		if(params.pyramid == 0 || params.pyramid == ''){
			alert("თქვენ გამოტოვეთ პირამიდა");
			ready++;
		}

		if(ready == 0){
			$.ajax({
				url: aJaxURL,
				type: "POST",
				data: params,
				dataType: "json",
				success: function(data){
					$("#product_categories").data("kendoGrid").dataSource.read();
					$('#get_edit_page').dialog("close");
				}
			});
		}
		
		
	}

	$(document).on('click', '#button_copy', function(){
		var grid = $("#product_categories").data("kendoGrid");
		var selectedRows = grid.select();
		var writing_id = [];
		selectedRows.each(function(index, row) {
			var selectedItem = grid.dataItem(row);
			writing_id.push(selectedItem.id);
		});
		if(typeof writing_id == 'undefined' || writing_id.length == 0) {
			alert('აირჩიეთ პროდუქტი!!!');
		} 
		else if(writing_id.length > 1){
			alert("აირჩიეთ მხოლოდ 1 პროდუქტი");
		}
		else {
			var ask = prompt("მიუთითეთ პირამიდის ნომერი");
			
			if(ask > 0){
				$.ajax({
					url: "server-side/writes.action.php",
					type: "POST",
					data: {
						act: "copy",
						type: "warehouse",
						id: writing_id,
						pyramid: ask
					},
					dataType: "json",
					success: function(data) {
						$("#product_categories").data("kendoGrid").dataSource.read();
					}
				});
			}
			
		}
	});

	$(document).on('change', '#owner', function(e){
		//e.preventDefault();

		$("#bringer").val(0);
		$("#bringer").trigger("chosen:updated");
	});

	$(document).on('change', '#bringer', function(e){
		//e.preventDefault();

		$("#owner").val(0);
		$("#owner").trigger("chosen:updated");
	});
	</script>
</body>

</html>