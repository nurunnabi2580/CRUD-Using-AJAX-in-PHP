

jQuery(document).ready(function(){

	showAllData();
	jQuery(".save").click(function(){
		forSave();	
	});
	jQuery(".update").click(function(){
		forUpdate();	
	});

});


	function forSave(){
		var id=jQuery("#id").val();
		var sname=jQuery("#formname").val();
		var sfather=jQuery("#formfname").val();
		var smother=jQuery("#formmname").val();
		var sphone=jQuery("#formphone").val();
		var saddress=jQuery("#formaddress").val();
		$.ajax({
			'url':'proccess.php',
			'type':'POST',
			'data':{
				'id':id,
				'name':sname,
				'father':sfather,
				'mother':smother,
				'phone':sphone,
				'address':saddress,
				'checker':'insert'
			},
			'success':function(result){
				jQuery(".msg").html(result);
				jQuery("#formname").val('');
				jQuery("#formfname").val('');
				jQuery("#formmname").val('');
				jQuery("#formphone").val('');
				jQuery("#formaddress").val('');
				showAllData();
				jQuery(".msg").html(result).fadeOut(2000);
			}
	});
	}

	function showAllData(){
		$.ajax({
			'url':'proccess.php',
			'type':'POST',
			'data':{
				'checker':'show'
			},
			'success':function(result){
				jQuery(".alldata").html(result);
			}
		});
	}

	function forUpdate(){
		var id=jQuery("#id").val();
		var sname=jQuery("#formname").val();
		var sfather=jQuery("#formfname").val();
		var smother=jQuery("#formmname").val();
		var sphone=jQuery("#formphone").val();
		var saddress=jQuery("#formaddress").val();
		$.ajax({
			'url':'proccess.php',
			'type':'POST',
			'data':{
				'id':id,
				'name':sname,
				'father':sfather,
				'mother':smother,
				'phone':sphone,
				'address':saddress,
				'checker':'update'
			},
		'success':function(result){

			jQuery(".msg").html(result);
			showAllData();
				jQuery("#id").val('');
				jQuery("#formname").val('');
				jQuery("#formfname").val('');
				jQuery("#formmname").val('');
				jQuery("#formphone").val('');
				jQuery("#formaddress").val('');
			jQuery(".msg").html(result).fadeOut(2000);
		}
	});
	}

	function test(id){
		$.ajax({
			'url':'proccess.php',
			'type':'POST',
			'dataType':'JSON',
			'data':{
				'checker':'showDataforUpdate',
				'id':id
			},
			'success':function(result){
				jQuery("#formname").val(result.name);
				jQuery("#formfname").val(result.father);
				jQuery("#formmname").val(result.mother);
				jQuery("#formphone").val(result.phone);
				jQuery("#formaddress").val(result.address);
				jQuery("#id").val(result.id);
			}
		});
	}
	function forDelete(id){
		if (confirm("Are you sure want to delete this item?")) {
			$.ajax({
			'url':'proccess.php',
			'type':'POST',
			'data':{
				'checker':'delete',
				'id':id
			},
			'success' : function(result){
				jQuery(".msg").html(result).fadeIn();
				showAllData();
				jQuery(".msg").html(result).fadeOut(2000);
			}
		});
		}
		else{
			var abc ='<div class="alert alert-danger">Student Data Deleted Not Successful</div>';
			jQuery(".msg").html(abc).fadeIn();
			jQuery(".msg").html(abc).fadeOut(2000);
		}
	}

