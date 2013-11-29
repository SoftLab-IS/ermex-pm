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
		
		$.get(ermexBaseUrl + "/site/userswitch", 
		{
			"id" : $(this).val()
		},
		function(ret)
		{
			if (ret.done == false)
			{
				if (ret.login == true)
					window.location.href = ermexBaseUrl + "/site/login";
			}
			else if (ret.done == true)
				window.location.href = window.location.href;

		}, "json");
	});
});	


