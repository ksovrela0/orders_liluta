<?php
   session_start();
   
   include("db.php");
   
   GLOBAL $db;
   
   $db = new dbClass();
   
   ?>
	<!DOCTYPE html>
	<html>

	<head>
		<title>შეკვეთები(ოფისი) - liluta</title>
		<link href="assets/css/kendoUI/kendo.common.min.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/style.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/kendoUI/kendo.default.min.css" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/jquery-ui/chosen.css" rel="stylesheet" type="text/css" />
		<script src="assets/plugins/jquery/jquery.min.js"></script>
		<script type="text/javascript" language="javascript" src="assets/plugins/jquery-ui/chosen.jquery.js"></script>
		<script type="text/javascript" language="javascript" src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
		<script type="text/javascript" language="javascript" src="assets/js/kendoUI/kendo.all.min.js"></script>
		<script type="text/javascript" language="javascript" src="assets/js/kendoUI/kendo.main.class.js?v=1.2"></script>
		<script type="text/javascript" language="javascript" src="assets/js/kendoUI/pako_deflate.min.js"></script>
		<script type="text/javascript" language="javascript" src="assets/js/timepicker.js"></script>
		<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	</head>

	<body>
		<style>
		#ui-datepicker-div {
			z-index: 999!important;
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
			padding: 0!important;
		}
		
		.k-grid-toolbar {
			display: flex;
		}
		
		#new_writing, #new_product {
			border: 1px solid black;
			width: fit-content;
			padding: 7px;
			font-size: 18px;
			color: #fff;
			background-color: #2aad2e;
			cursor: pointer;
		}
		
		#copy_writing, #copy_product {
			border: 1px solid black;
			width: fit-content;
			padding: 7px;
			font-size: 18px;
			color: #fff;
			background-color: purple;
			cursor: pointer;
			margin-left: 20px;
		}
		
		#del_writing, #del_product {
			border: 1px solid black;
			width: fit-content;
			padding: 7px;
			font-size: 18px;
			color: #fff;
			background-color: red;
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
		</style>
			<div id="logout">გასვლა</div>
			<div id="main_div"></div>
			<div title="შეკვეთა" id="get_edit_page"></div>
			<div title="შეკვეთა - პროდუქტი" id="get_product_page"></div>
			<div title="შეკვეთა - პროდუქტი - მინები" id="get_glass_page"></div>
			<div title="SMS ყველასთან" id="sms_to_all_div"></div>
			<div title="SMS მონიშნულებთან" id="sms_to_checked_div"></div>
			<br>

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
				LoadKendoTable_main();
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

			function LoadKendoTable_main(hidden) {
				//KendoUI CLASS CONFIGS BEGIN
				var aJaxURL = "server-side/writes.action.php";
				var gridName = 'main_div';
				var actions = '<div id="new_writing">ახალი შეკვეთა</div><div id="copy_writing">შეკვეთის კოპირება</div><div id="del_writing">შეკვეთის წაშლა</div>';
				var editType = "popup"; // Two types "popup" and "inline"
				var itemPerPage = 100;
				var columnsCount = 11;
				var columnsSQL = ["id:string", "datetime:string", "client:string", "client_id:string", "client_phone:string", "client_addr:string", "total_to_pay:string", "avans:string", "add_money:string", "left_to_pay:string", "status:string"];
				var columnGeoNames = ["ID", "შეკვ.თარიღ", "დასახელება", "პირადი ნომერი", "ტელეფონი", "მისამართი", "სულ გადასახდელი", "ავანსი", "ზედმეტად დამატებული", "დარჩენილი", "სტატუსი"];
				var showOperatorsByColumns = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
				var selectors = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
				var locked = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
				var lockable = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
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
				var columnsCount = 5;
				var columnsSQL = ["id2:string", "name_product:string", "glass_count:string", "picture:string", "action:string"];
				var columnGeoNames = ["ID", "დასახელება", "მინების რ-ბა", "სურათი", "ქმედება"];
				var showOperatorsByColumns = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
				var selectors = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
				var locked = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
				var lockable = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
				var filtersCustomOperators = '{"date":{"start":"-დან","ends":"-მდე","eq":"ზუსტი"}, "number":{"start":"-დან","ends":"-მდე","eq":"ზუსტი"}}';
				//KendoUI CLASS CONFIGS END
				const kendo = new kendoUI();
				kendo.loadKendoUI(aJaxURL, 'get_list_product', itemPerPage, columnsCount, columnsSQL, gridName, actions, editType, columnGeoNames, filtersCustomOperators, showOperatorsByColumns, selectors, hidden, 1, locked, lockable);
			}
			function LoadKendoTable_glass(hidden) {
				//KendoUI CLASS CONFIGS BEGIN
				var aJaxURL = "server-side/writes.action.php";
				var gridName = 'glasses_div';
				var actions = '<div id="new_product">დამატება</div><div id="copy_product">კოპირება</div><div id="del_product"> წაშლა</div>';
				var editType = "popup"; // Two types "popup" and "inline"
				var itemPerPage = 100;
				var columnsCount = 7;
				var columnsSQL = ["id:string", "name_product:string", "dimm:string", "type:string", "color:string", "proccess2:string", "status:string"];
				var columnGeoNames = ["ID კოდი", "დასახელება", "ზომა", "ტიპი", "ფერი", "პროცესი", "სტატუსი"];
				var showOperatorsByColumns = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
				var selectors = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
				var locked = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
				var lockable = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
				var filtersCustomOperators = '{"date":{"start":"-დან","ends":"-მდე","eq":"ზუსტი"}, "number":{"start":"-დან","ends":"-მდე","eq":"ზუსტი"}}';
				//KendoUI CLASS CONFIGS END
				const kendo = new kendoUI();
				kendo.loadKendoUI(aJaxURL, 'get_list_glasses', itemPerPage, columnsCount, columnsSQL, gridName, actions, editType, columnGeoNames, filtersCustomOperators, showOperatorsByColumns, selectors, hidden, 1, locked, lockable);
			}
			function LoadKendoTable_path(hidden) {
				//KendoUI CLASS CONFIGS BEGIN
				var aJaxURL = "server-side/writes.action.php";
				var gridName = 'path_div';
				var actions = '<div id="new_product">დამატება</div><div id="del_product"> წაშლა</div>';
				var editType = "popup"; // Two types "popup" and "inline"
				var itemPerPage = 100;
				var columnsCount = 4;
				var columnsSQL = ["id2:string", "proccess:string", "sort_n:string", "stat:string"];
				var columnGeoNames = ["ID","პროცესი", "თანმიმდევრობა", "სტატუსი"];
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
						act: "get_add_page"
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
						LoadKendoTable_product();
						$("#get_edit_page").dialog({
							resizable: false,
							height: "auto",
							width: 1200,
							modal: true,
							buttons: {
								"შენახვა": function() {
									//save_writing();
								},
								'დახურვა': function() {
									$(this).dialog("close");
								}
							}
						});
					}
				});
			});
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
					alert('ჩაწერა აირჩიეთ ცხრილიდან');
				} else {
					$.ajax({
						url: "server-side/writes.action.php",
						type: "POST",
						data: {
							act: "disable",
							id: writing_id
						},
						dataType: "json",
						success: function(data) {
							$("#main_div").data("kendoGrid").dataSource.read();
						}
					});
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
						$("#personal,#statuses,#cabinet").chosen();
						$("#order_date").datetimepicker({
							dateFormat: "yy-mm-dd",
							timeFormat: "HH:mm:ss"
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
							width: 1200,
							modal: true,
							buttons: {
								"შენახვა": function() {
									//save_writing();
								},
								'დახურვა': function() {
									$(this).dialog("close");
								}
							}
						});
					}
				});
			});
			$(document).on("dblclick", "#glasses_div tr.k-state-selected", function() {
				var grid = $("#glasses_div").data("kendoGrid");
				var dItem = grid.dataItem($(this));
				if(dItem.id == '') {
					return false;
				}
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
						var kendo = new kendoUI();
						var hid = "&glass_id="+dItem.id;
						LoadKendoTable_path(hid);
						$("#selected_glass_cat_id,#selected_glass_type_id,#selected_glass_color_id,#selected_glass_status").chosen();
						$("#get_glass_page").dialog({
							resizable: false,
							height: "auto",
							width: 600,
							height: 650,
							modal: true,
							buttons: {
								"შენახვა": function() {
									//save_writing();
								},
								'დახურვა': function() {
									$(this).dialog("close");
								}
							}
						});
					}
				});
			});
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
						$("#selected_product_id").chosen();
						$("#get_product_page").dialog({
							resizable: false,
							height: "auto",
							width: 1100,
							modal: true,
							buttons: {
								"შენახვა": function() {
									//save_writing();
								},
								'დახურვა': function() {
									$(this).dialog("close");
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

			function save_writing() {
				let params = new Object;
				var zones = [];
				$('#zones option:selected').toArray().map(c => zones.push(c.value));
				params.act = 'save_writing';
				params.id = $("#writing_id").val();
				params.firstname = $("#firstname").val();
				params.lastname = $("#lastname").val();
				params.phone = $("#phone").val();
				params.soc_media = $("#soc_media").val();
				params.sex_id = $("input[name='sex_id']:checked").val();
				params.visit_date = $("#visit_date").val();
				params.cab_id = $("#cabinet").val();
				params.personal = $("#personal").val();
				params.total_price = $("#total_price").val();
				params.impuls_qty = $("#impuls_qty").val();
				params.status = $("#statuses").val();
				params.zones = zones;
				var ready_to_save = 0;
				if(params.firstname == '') {
					alert('შეიყვანეთ კლიენტის სახელი');
					ready_to_save++;
				}
				if(params.lastname == '') {
					alert('შეიყვანეთ კლიენტის გვარი');
					ready_to_save++;
				}
				if(params.phone == '') {
					alert('შეიყვანეთ კლიენტის ნომერი');
					ready_to_save++;
				}
				if($.isNumeric(params.phone)) {} else {
					alert('ტელეფონის ველში უნდა გამოიყენოთ მხოლოდ ციფრები');
					ready_to_save++;
				}
				if(typeof params.sex_id == 'undefined') {
					alert('აირჩიეთ სქესი');
					ready_to_save++;
				}
				if(params.visit_date == '') {
					alert('აირჩიეთ ვიზიტის თარიღი');
					ready_to_save++;
				}
				if(params.zones == 0) {
					alert('აირჩიეთ 1 ზონა მაინც');
					ready_to_save++;
				}
				let impulses_array = [];
				$(".impulses").each(function(index) {
					impulses_array.push($(this).attr('id') + ':' + $(this).val());
				});
				params.impulses = impulses_array;
				if(ready_to_save == 0) {
					$.ajax({
						url: "server-side/writes.action.php",
						type: "POST",
						data: params,
						dataType: "json",
						success: function(data) {
							$("#main_div").data("kendoGrid").dataSource.read();
							if(data.error == 'time_error') {
								alert("ყველა პარამეტრი შენახულია, თუმცა არჩეული ვიზიტის თარიღი და კაბინეტი დაკავებულია");
								$('#get_edit_page').dialog("close");
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
							} else {
								$('#get_edit_page').dialog("close");
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
							}
						}
					});
				}
			}
			</script>
	</body>

	</html>