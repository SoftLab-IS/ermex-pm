/**
 * 
 * Main Script
 *
 * All main javascript logic goes here.
 * 
 * @version 1.0.0
 * @author Aleksandar Panic
 */

$(document).ready(function (event)
{
	/**
	 * OnChange select workers Event
	 *
	 * @author Aleksandar Panic
	 *
	 * @param event e Passed event arguments
	**/
	$('#select-workers').change(function (e)
	{
		$(this).addClass('is-changed');
		
		newId = $(this).val();
		$.get(ermexBaseUrl + "/site/userswitch", 
		{
			"id" : newId
		},
		function(ret)
		{
			if (ret.done == false)
			{
				if (ret.login == true)
					window.location.href = ermexBaseUrl + "/site/login?nid=" + newId;
			}
			else if (ret.done == true)
				window.location.href = window.location.href;

		}, "json");
	});
	
});	

$('.materials').keyup(function()
{
	var searchTerm = $(this).val();
	//alert("hello");
	$.get(ermexBaseUrl + '/radninalozi/getmaterial',{name: searchTerm},function(done)
	{
		alert(done);
		//$('.search-result').append(JSON.parse(done).array);
		
	}, "json");
	/*
	$.ajax({
		url: 'getmaterial',
		type: 'post',
		data: searchTerm,
		success: function(done)
		{
			alert(done);
		}				
	});
	*/
});
