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
    console.log($('.user-select'));
    selectWorkers();
    bindShowFilterOptions();
	
});

function selectWorkers() {

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
}

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

$('.addO').click(function()
{
   var value = '<div class="clearfix oneOrder"><div class="large-9 columns"><label>Naziv</label><input type="text" name="Order[][title]"/></div><div class="large-1 columns"><label>Količina</label><input type="text" name="Order[][amount]"/></div><div class="large-1 columns"><label>Mjera</label><input type="text" name="Order[][measurementUnit]"/></div><div class="large-1 columns"><label>Cijena</label><input type="text" name="Order[][price]"/></div><div class="large-12 columns"><label>Opis</label><textarea name="Order[][description]"></textarea></div></div>';
   $(value).insertBefore(".addOrder");
});
/*novi proizvod iz otpremnice*/
$('.addOO').click(function()
{
    var value = '<div class="clearfix oneOrder"><div class="large-9 columns"><label>Naziv</label><input type="text" name="Order[][title]"/></div><div class="large-1 columns"><label>Količina</label><input type="text" name="Order[][amount]"/></div><div class="large-1 columns"><label>Mjera</label><input type="text" name="Order[][measurementUnit]"/></div><div class="large-1 columns"><label>Cijena</label><input type="text" name="Order[][price]"/></div><div class="large-12 columns"><label>Opis</label><textarea name="Order[][description]"></textarea></div><input type="hidden" name="Order[][id]" value="0"/></div>';
    $(value).insertBefore(".addOrder");
});

$('.btn-add-worker').click(function(){
    var selectField = $('.new-work-account .user-select > select').clone();
    console.log(selectField);
    $(selectField).insertBefore('.add-worker').wrap('<div></div>');

});

$('.btn-add-material').click(function(){
    var selectField = $('.new-work-account .material-select > div').clone();
    console.log(selectField);
    $(selectField).insertBefore('.add-materials').wrap('<div></div>');

});

function bindShowFilterOptions()
{
    $('.show-filter-options').on('click', function(){
        $('.hidden-filter-options').slideToggle();
    });
}
