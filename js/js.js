$(document).ready(function(){
	
	  $('#usernames').on('blur',function(){
		  var username=$('#username').val();
		  if(username==""){
			  
		  }else{
		   $.ajax({
		type: "POST",
		url: "checkuser.php",
		data: {username:username},
		cache: false,
 		success: function(data){
		if($.trim(data)=="succc")
		{
			//alert("Admin Login Successfully");
			//window.location.href="hostelpayment_gm.php";
		$("#username").val('');
		$('#userexit').show();
		$('#userexit').html("This Username Not Available");
		$('#userexit').fadeOut(5000);
		
 			} 
		}
		 		 });
		  }
	  })
	  
	  //////select lga
			$('#gender').change(function(){
				//var click_on="selectsubject";
	            var gender=$(this).val();
		$.ajax({
		url: "select_word.php",
		method: "POST",
		data: {gender:gender},
		dataType:"text",
		success: function(data){
			$('#word').html(data);
			//alert(data);
		}
		
		
	});
	});
	
	//////select bed
			$('#word').change(function(){
				//var click_on="selectsubject";
	            var word=$(this).val();
		$.ajax({
		url: "select_bed.php",
		method: "POST",
		data: {word:word},
		dataType:"text",
		success: function(data){
			$('#bed').html(data);
			//alert(data);
		}
		
		
	});
	});
		
			
	
});