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
	#list_area,#glasses_div{
		border: 1px solid black;
		padding: 10px;
		display: flex;
		justify-content: center;
		margin-bottom: 15px;
		flex-wrap: wrap;
		gap: 15px;
	}
	#no_list{
		margin: 0;
		color: red;
	}
	.element_in_list{
		border: 1px solid #cdcdcd;
		padding: 8px;
		background-color: #f7fffd;
		font-weight: bold;
		position: relative;
		transition: 0.5s ease;
	}
	.element_in_div{
		border: 1px solid #cdcdcd;
		padding: 8px;
		background-color: #f7fffd;
		font-weight: bold;
		position: relative;
		cursor: pointer;
		transition: 0.5s ease;
	}
	.element_in_div:hover{
		-webkit-box-shadow: 3px 5px 14px -2px rgba(0,0,0,0.58); 
		box-shadow: 3px 5px 14px -2px rgba(0,0,0,0.58);
	}
	.remove_from_list, .glass_cc{
		border: 1px solid black;
		width: fit-content;
		padding: 4px 5px 4px 5px;
		line-height: 11px;
		border-radius: 9px;
		cursor: pointer;
		position: absolute;
		top: -8px;
		right: -10px;
		background-color: white;
		transition: 0.4s ease;
	}
	.sort_n{
		border: 1px solid black;
		width: fit-content;
		padding: 4px 5px 4px 5px;
		line-height: 11px;
		border-radius: 9px;
		cursor: pointer;
		position: absolute;
		bottom: -8px;
		right: -10px;
		background-color: white;
		transition: 0.4s ease;
	}
	.remove_from_list:hover{
		background-color: red;
		color: white;
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
						<h2 class="main-content-title tx-24 mg-b-5">ჭრის მართვა</h2>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">პროცესები</a></li>
							<li class="breadcrumb-item active" aria-current="page">ჭრის მართვა</li>
						</ol>
					</div>
				</div>
				<!-- End Page Header -->
				<!-- Row -->
				<div class="row" style="margin-bottom: 17px;">
					<div class="col-sm-2">
						<label>აირჩიეთ მწარმოებელი</label>
						<select id="selected_glass_manuf_id">
							<?php getGlassManuf(0); ?>
						</select>
					</div>
					<div class="col-sm-2">
						<label>აირჩიეთ შუშა</label>
						<select id="selected_glass_cat_id">
							<?php getGlassOptions(0); ?>
						</select>
					</div>
					<div class="col-sm-2">
						<label>აირჩიეთ ფერი</label>
						<select id="selected_glass_color_id">
							<?php getGlassColorOptions(0); ?>
						</select>
					</div>

					<div class="col-sm-2">
						<label>აირჩიეთ ზომა</label>
						<select id="selected_glass_sizes">
							<?php getSizeOpt(0); ?>
						</select>
					</div>

					<div class="col-sm-2">
						<label>აირჩიეთ დამკვეთი <button class="select_all">Select all</button></label>
						<select multiple  id="selected_glass_client">
							<?php getClients(0); ?>
						</select>
						
					</div>

					<div class="col-sm-12" style="margin-top:20px;display:flex;justify-content: flex-start;align-items: end;">
						<div id="filter">ფილტრი</div>
						<div id="cut_glass">ჭრაზე გაშვება</div>
					</div>
					<div class="col-sm-2">
						
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div id="list_area">
							<p id="no_list">ლისტი ცარიელია</p>
						</div>
						
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div id="glasses_div"></div>
					</div>
					
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
	var f_product_name = '';
	var f_color = '';

	var glass_option_id = '';
	var glass_color_id = '';
	var glass_manuf_id = '';
	$(document).on("dblclick", ".element_in_div", function () {
		var sort_n = $(this).attr('sort_n');
		var el = this;
		var params = new Object();
		params.act = 'check_glass_status';
		$(this).each(function() {
			$.each(this.attributes, function() {
				// this.attributes is not a plain object, but an array
				// of attribute nodes, which contain both the name and value
				if(this.specified) {
					//console.log(this.name, this.value);
					params[this.name] = this.value;
				}
			});
		});

		var glass_ids = [];

		$(".element_in_list").each(function(i,x){
			glass_ids.push($(x).attr('glass-id'));
		})
		params.ids = glass_ids;




		$.ajax({
			url: "server-side/writes.action.php",
			type: "POST",
			data: params,
			dataType: "json",
			success: function(data){
				if(typeof data.error != 'undefined'){
					alert(data.error);
				}
				else{
					if($(".element_in_list").length == 0){
						
						glass_option_id = params.glass_option_id;
						glass_color_id = params.glass_color_id;
						glass_manuf_id = params.glass_manuf_id;

						
					}
					else{
						if(glass_option_id != params.glass_option_id || glass_color_id != params.glass_color_id){
							alert("დასაჭრელად არჩეული მინები არ არიან ერთნაირი ფერის, მწარმოებლის ან სისქის, გთხოვთ აირჩიოთ მხოლოდ მსგავსი მინები");
							return false;
						}
					}

					var styles = ``;
					if(data.not_standard == 1){
						styles = 'style="background-color:#ffeaa3;"';
					}

					var pic = '';

					if(data.picture != '' && data.picture != null){
						pic = '<a style="color:blue;" target="_blank" href="'+data.picture+'"><img style="width:35px;" src="assets/img/main.png"></a>';
					}

					$("#list_area").append(`
					<div class="element_in_list" `+styles+` sort_n="`+sort_n+`" glass-id="`+data.id+`" glass_option_id="`+data.glass_option_id+`" glass_type_id="`+data.glass_type_id+`" glass_color_id="`+data.glass_color_id+`" glass_manuf_id="`+data.glass_manuf_id+`">
						<div style="font-size: 20px;">`+data.sizes+`</div>
						<div>ID: `+data.id+`  `+data.name+`</div>
						
						<div>`+data.color+`</div>
						`+pic+`
						<div class="remove_from_list">X</div>
						<div class="sort_n">`+sort_n+`</div>
						<div>`+data.client_name+`</div>
					</div>`);

					$("#no_list").css('display', 'none');

					let old_counter = $(el).find(".glass_cc").html();
					let new_counter = old_counter - 1;

					$(el).find(".glass_cc").html(new_counter)

				}
				
			}
		});
	})
	$(document).on("dblclick", "#glasses_div tr.k-state-selected", function () {
		var grid = $("#glasses_div").data("kendoGrid");
		var dItem = grid.dataItem($(this));
		
		if(dItem.id == ''){
			return false;
		}
		
		var glass_id = dItem.id;

		if($(".element_in_list").length == 0){
			f_product_name = dItem.name_product_22;
			f_color = dItem.color_22;
		}
		if($(".element_in_list").length > 0){
			if(f_product_name != dItem.name_product_22 || f_color != dItem.color_22){
				alert("დასაჭრელად არჩეული მინები არ არიან ერთნაირი ფერის, მწარმოებლის ან სისქის, გთხოვთ აირჩიოთ მხოლოდ მსგავსი მინები");
				return false;
			}
		}
		if($(".element_in_list[glass-id='"+glass_id+"']").length == 0){

			$.ajax({
				url: "server-side/writes.action.php",
				type: "POST",
				data: {
					act: "check_glass_status",
					glass_id: glass_id
				},
				dataType: "json",
				success: function(data){
					if(typeof data.error != 'undefined'){
						alert(data.error);
					}
					else{
						$("#list_area").append(`
						<div class="element_in_list" glass-id="`+glass_id+`" glass_option_id="`+dItem.glass_option_id+`" glass_type_id="`+dItem.glass_type_id+`" glass_color_id="`+dItem.glass_color_id+`" glass_manuf_id="`+dItem.glass_manuf_id+`">
							<div>ID: `+glass_id+`  `+dItem.name_product_22+`</div>
							<div>`+dItem.dimm_22+`</div>
							<div>`+dItem.color_22+`</div>

							<div class="remove_from_list">X</div>
						</div>`);

						$("#no_list").css('display', 'none');
					}
					
				}
			});
			
		}
		else{
			alert("არჩეული მინა უკვე დამატებულია ლისტში");
		}

		
	});
	$(document).on('click', '.remove_from_list', function(){
		let sort_n = $(this).parent().attr('sort_n');
		
		let old_counter = $(".element_in_div[sort_n='"+sort_n+"']").find(".glass_cc").html();

		
		let new_counter = parseInt(old_counter) + 1;
		$(".element_in_div[sort_n='"+sort_n+"']").find(".glass_cc").html(new_counter);
		$(this).parent().remove();
		if($(".element_in_list").length == 0){
			$("#no_list").css('display', 'block');
		}
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
        var actions = '';
        var editType = "popup"; // Two types "popup" and "inline"
        var itemPerPage = 100;
        var columnsCount = 12;
        var columnsSQL = ["id:string","glass_option_id:string","glass_type_id:string","glass_color_id:string","glass_manuf_id:string", "name_product_22:string", "dimm_22:string", "type_22:string", "color_22:string", "proccess2_22:string", "status_22:string", "cut_list_22:string"];
        var columnGeoNames = ["ID კოდი","glass_option_id","glass_type_id","glass_color_id","glass_manuf_id", "დასახელება", "ზომა", "ტიპი", "ფერი", "პროცესი", "სტატუსი", "ჭრის ID"];
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
        var actions = '<div id="new_glass">დამატება</div><div id="del_glass2"> წაშლა</div>';
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
		loadBlocks();
		$("#selected_glass_cat_id,#selected_glass_type_id,#selected_glass_color_id,#selected_glass_status,#selected_glass_manuf_id,#selected_glass_sizes,#selected_glass_client").chosen();
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
        var glass_ids = [];
        var option_ids = [];
        var type_ids = [];
        var color_ids = [];
        var manuf_ids = [];
		$(".element_in_list").each(function(i,x){
			console.log($(x).attr('glass-id'))

			glass_ids.push($(x).attr('glass-id'));
            option_ids.push($(x).attr('glass_option_id'));
            type_ids.push($(x).attr('glass_type_id'));
            color_ids.push($(x).attr('glass_color_id'));
            manuf_ids.push($(x).attr('glass_manuf_id'));
		})
        
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
                    $('#get_cut_page').dialog("close");
					$(".element_in_list").remove();
					$("#no_list").css('display', 'block');

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
	$(document).on('click', '#del_glass', function(){
		var grid = $("#glasses_div").data("kendoGrid");
		var selectedRows = grid.select();
		var writing_id = [];
		selectedRows.each(function(index, row) {
			var selectedItem = grid.dataItem(row);
			writing_id.push(selectedItem.id);
		});
		if(typeof writing_id == 'undefined' || writing_id.length == 0) {
			alert('აირჩიეთ მინა!!!');
		} else {
			if(confirm("მინის ჭრიდან წაშლის შემთხვევაში, ჭრის პროცესი, რომელშიც შედის ეგ მინა/მინები გაუქმდება. ნამდვილად გსურთ მინის/მინების წაშლა?")){
				$.ajax({
					url: "server-side/writes.action.php",
					type: "POST",
					data: {
						act: "delete_cut",
						ids: writing_id
					},
					dataType: "json",
					success: function(data) {
						$("#glasses_div").data("kendoGrid").dataSource.read();
					}
				});
			}
			
		}
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

	$(document).on('click', '#filter', function(){
		let params = new Object;

        params.manuf_id = $("#selected_glass_manuf_id").val();
        params.option_id = $("#selected_glass_cat_id").val();
        params.color_id = $("#selected_glass_color_id").val();
		params.size = $("#selected_glass_sizes").val();
		params.client = $("#selected_glass_client").val();

		var search = "&manuf_id="+params.manuf_id+"&option_id="+params.option_id+"&color_id="+params.color_id+"&size="+params.size+"&client="+params.client;
        loadBlocks(search);
	});

	function loadBlocks(search = ''){
		$("#glasses_div").html('');
		$.ajax({
			url: "server-side/writes.action.php",
			type: "POST",
			data: "act=get_list_glasses_all"+search,
			dataType: "json",
			success: function(data){
				if(typeof data != 'undefined' || data.length > 0){
					data.forEach(function(data, x){
						x = x+1;
						
						var styles = ``;
						if(data.not_standard == 1){
							styles = 'style="background-color:#ffeaa3;"';
						}

						
						$("#glasses_div").append(`
						<div class="element_in_div" `+styles+` sort_n="`+x+`" glass_width="`+data.glass_width+`" glass_height="`+data.glass_height+`" glass_option_id="`+data.glass_option_id+`" glass_type_id="`+data.glass_type_id+`" glass_color_id="`+data.glass_color_id+`" glass_manuf_id="`+data.glass_manuf_id+`" not_standard="`+data.not_standard+`">
							<div style="font-size: 20px;">`+data.sizes+`</div>	
							<div>`+data.name+`</div>
							
							<div>`+data.color+`</div>
							<div class="glass_cc">`+data.cc+`</div>
							<div>`+data.clients+`</div>
							<div class="sort_n">`+x+`</div>
						</div>`);
					})
				}
			}
		})
	}
	$('.select_all').click(function(){
		$('#selected_glass_client option').prop('selected', true);
		$('#selected_glass_client').trigger('chosen:updated');
	});

	$(document).on('change', '#selected_glass_cat_id', function(){
		var glass_option = $(this).val();

		$.ajax({
			url: "server-side/writes.action.php",
			type: "POST",
			data: "act=get_clients&glass_option="+glass_option,
			dataType: "json",
			success: function(data){
				$("#selected_glass_client").html(data.opts);
				$('#selected_glass_client').trigger('chosen:updated');
			}
		})
	})
	</script>
</body>

</html>

<?php
function getClients($id){
	GLOBAL $db;
	$data = '';
    $db->setQuery("SELECT   GROUP_CONCAT(id) AS id,
                            client_name AS 'name'
                    FROM    orders
                    WHERE actived = 1
					GROUP BY client_name");
    $cats = $db->getResultArray();
	//$data .= '<option value="">აირჩიეთ</option>';
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
function getSizeOpt($id){
	GLOBAL $db;
    $data = '';
    $db->setQuery("SELECT  CONCAT(products_glasses.glass_width,'-',products_glasses.glass_height) AS id,
	CONCAT(products_glasses.glass_width, ' X ', products_glasses.glass_height) AS name
	
	FROM    products_glasses
	JOIN    glass_options ON glass_options.id = products_glasses.glass_option_id
	JOIN    glass_type ON glass_type.id = products_glasses.glass_type_id
	JOIN    glass_colors ON glass_colors.id = products_glasses.glass_color_id
	JOIN    glass_status ON glass_status.id = products_glasses.status_id
	JOIN    glass_manuf ON glass_manuf.id = products_glasses.glass_manuf_id
	
	WHERE   products_glasses.actived = 1 AND products_glasses.go_to_cut = 1 AND products_glasses.status_id = 1 AND products_glasses.id NOT IN (SELECT glass_id FROM lists_to_cut WHERE actived = 1) 
	GROUP BY products_glasses.glass_width, products_glasses.glass_height, products_glasses.glass_option_id, products_glasses.glass_color_id, products_glasses.glass_manuf_id
	ORDER BY products_glasses.id");
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
function getGlassColorOptions($id){
    GLOBAL $db;
    $data = '';
    $db->setQuery("SELECT   id,
                            name AS 'name'
                    FROM    glass_colors
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
function getGlassManuf($id){
    GLOBAL $db;
    $data = '';
    $db->setQuery("SELECT   id,
                            name AS 'name'
                    FROM    glass_manuf
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