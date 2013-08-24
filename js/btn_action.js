// JavaScript Document


function like() 
{
	var nlike = $("#nlike").val();
	var email = $("#email").val();
	
	
	
			var dataString = 
		  + '&nlike=' + nlike 
		+ '&email=' + email
		
		   + '&page1=signup';
	
		
		$.ajax({
			type: "POST",
			url: "btn_action_process.php",
			data: dataString,
			cache: false,
			beforeSend: function() 
			{
				$("#like_div").html('<img src="images/loadings.gif" align="absmiddle" />');
			},
			success: function(response)
			{
				
				$("#youlike").hide().fadeIn('slow').html(response);
				$("#like_div").hide().fadeIn('slow').html(response);
				
				$("#like").hide().fadeout('slow').html(response);
				
				
			}
		});

}
function dislike() 
{
	var nlike = $("#nlike").val();
	var email = $("#email").val();
		
	
			var dataString = 
		  + '&nlike=' + nlike 
		+ '&email=' + email
		
		   + '&page2=signup';
	
		
		$.ajax({
			type: "POST",
			url: "btn_action_process.php",
			data: dataString,
			cache: false,
			beforeSend: function() 
			{
				$("#dislike_div").html('<img src="images/loadings.gif" align="absmiddle" />');
			},
			success: function(response)
			{
				
				
				$("#disyoulike").hide().fadeIn('slow').html(response);
				$("#dislike_div").hide().fadeIn('slow').html(response);
		
				$("#dislike").hide().fadeout('slow').html(response);
				
				
			}
		});

}



function doLogin() 
{
	var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	var email = $("#email").val();
	
	if(email == "")
	{
		$("#signup_status").html('<div class="info">Please enter your Email.</div>');
		$("#email").focus();
		
	}else if(reg.test(email) == false)
	{
		alert("enter valid email address");
		$("#email").focus();
	}else{
			var dataString = 
		   'email=' + email
		   + '&page=signup';
	
		
		$.ajax({
			type: "POST",
			url: "check.php",
			data: dataString,
			cache: false,
			beforeSend: function() 
			{
				$("#login_div").html('<div style="float:left; margin-left:10px;"><img src="images/loadings.gif" alt="Wait..." align="absmiddle" title="Loading...."/></div>');
			},
			success: function(response)
			{
				$("#login_div").hide().fadeIn('slow').html(response);
			}
		});
}
}