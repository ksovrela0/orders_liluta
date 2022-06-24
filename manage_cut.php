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
	<link rel="icon" href="assets/img/brand/favicon.ico" type="image/x-icon">
	<!-- Title -->
	<title>Dashlead - Admin Panel HTML Dashboard Template</title>
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
		padding: 12px!important;
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
    }
    
    #copy_writing, #copy_product, #copy_glass {
        border: 1px solid black;
        width: fit-content;
        padding: 7px;
        font-size: 18px;
        color: #fff;
        background-color: purple;
        cursor: pointer;
        margin-left: 20px;
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
						<h2 class="main-content-title tx-24 mg-b-5">ჭრის მართვა</h2>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">პროცესები</a></li>
							<li class="breadcrumb-item active" aria-current="page">ჭრის მართვა</li>
						</ol>
					</div>
				</div>
				<!-- End Page Header -->
				<!-- Row -->
				<div class="row">
					<div id="glasses_div"></div>
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
    <div title="ჭრა!!!" id="get_cut_page"></div>
    <div title="ატხოდი" id="get_atxod_page"></div>
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
    function LoadKendoTable_glass(hidden) {
				//KendoUI CLASS CONFIGS BEGIN
        var aJaxURL = "server-side/writes.action.php";
        var gridName = 'glasses_div';
        var actions = '<div id="cut_glass">ჭრაზე გაშვება</div>';
        var editType = "popup"; // Two types "popup" and "inline"
        var itemPerPage = 100;
        var columnsCount = 12;
        var columnsSQL = ["id:string","glass_option_id:string","glass_type_id:string","glass_color_id:string","glass_manuf_id:string", "name_product:string", "dimm:string", "type:string", "color:string", "proccess2:string", "status:string", "cut_list:string"];
        var columnGeoNames = ["ID კოდი","glass_option_id","glass_type_id","glass_color_id","glass_manuf_id", "დასახელება", "ზომა", "ტიპი", "ფერი", "პროცესი", "სტატუსი", "ლისტი"];
        var showOperatorsByColumns = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        var selectors = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        var locked = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        var lockable = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        var filtersCustomOperators = '{"date":{"start":"-დან","ends":"-მდე","eq":"ზუსტი"}, "number":{"start":"-დან","ends":"-მდე","eq":"ზუსტი"}}';
        //KendoUI CLASS CONFIGS END
        const kendo = new kendoUI();
        kendo.loadKendoUI(aJaxURL, 'get_list_glasses_all', itemPerPage, columnsCount, columnsSQL, gridName, actions, editType, columnGeoNames, filtersCustomOperators, showOperatorsByColumns, selectors, hidden, 1, locked, lockable);
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
        kendo.loadKendoUI(aJaxURL, 'get_list_atxods', itemPerPage, columnsCount, columnsSQL, gridName, actions, editType, columnGeoNames, filtersCustomOperators, showOperatorsByColumns, selectors, hidden, 1, locked, lockable);
    }
	$( document ).ready(function() {
		LoadKendoTable_glass()
	});
	function save_category(){
		let params 			= new Object;
		params.act 			= 'save_warehouse';
		params.id 			= $("#warehouse_id").val();
		params.glass_cat 	= $("#selected_glass_cat_id").val();
		params.glass_type 	= $("#selected_glass_type_id").val();
		params.glass_color	= $("#selected_glass_color_id").val();
		params.glass_qty 		= $("#glass_qty").val();
		params.glass_width 		= $("#glass_width").val();
		params.glass_height 		= $("#glass_height").val();
		params.sqr_price 	= $("#sqr_price").val();
		params.pyramid 	= $("#pyramid").val();
		params.glass_manuf 	= $("#selected_glass_manuf_id").val();
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
                        
                        $("#selected_list_id").chosen();
                        $("#get_cut_page").dialog({
                            resizable: false,
                            height: 600,
                            width: 800,
                            modal: true,
                            buttons: {
                                "შენახვა": function() {
                                    save_cut();
                                },
                                'დახურვა': function() {
                                    $(this).dialog("close");
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
    function save_cut(){
        let params = new Object;

        params.act = 'save_list_cut';
        params.glass_ids = $("#glass_ids").val();
        params.cut_id = $("#cut_id").val();
        params.list_id = $("#selected_list_id").val();

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
    function allAreEqual(array) {
        const result = array.every(element => {
            if (element === array[0]) {
            return true;
            }
        });

        return result;
    }
    $(document).on("click", "#new_glass", function(){
        $.ajax({
            url: "server-side/writes.action.php",
            type: "POST",
            data: {
                act: "get_atxod_page"
            },
            dataType: "json",
            success: function(data) {
                $('#get_atxod_page').html(data.page);
                $("#selected_list_id").chosen();
                $("#get_atxod_page").dialog({
                    resizable: false,
                    height: 300,
                    width: 500,
                    modal: true,
                    buttons: {
                        "შენახვა": function() {
                            save_atxod();
                        },
                        'დახურვა': function() {
                            $(this).dialog("close");
                        }
                    }
                });
            }
        });
    });

    function save_atxod(){
        let params = new Object;

        params.act = 'save_atxod';
        params.atxod_id = $("#atxod_id").val();
        params.cut_id = $("#cut_id").val();
        params.glass_width = $("#glass_width").val();
        params.glass_height = $("#glass_height").val();

        $.ajax({
            url: "server-side/writes.action.php",
            type: "POST",
            data: params,
            dataType: "json",
            success: function(data) {
                if(data.status == 'OK'){
                    $("#otxod_div").data("kendoGrid").dataSource.read();
                    $('#get_atxod_page').dialog("close");
                }else{
                    alert(data.error)
                }
                
            }
        });
    }
	</script>
</body>

</html>