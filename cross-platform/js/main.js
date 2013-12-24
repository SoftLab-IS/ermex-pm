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
	bindAutoComplete();
    bindTimePicker();
});

function bindTimePicker()
{
    if ($('#deliveryTime').length > 0)
        $('#deliveryTime').timepicker({ 'timeFormat': 'H:i' });
}

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
                        window.location.href = ermexBaseUrl + "/site/login?nid=" + newId + "&return=" + encodeURI(window.location.href);
                }
                else if (ret.done == true)
                    window.location.href = window.location.href;

            }, "json");
    });
}


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

function bindAutoComplete()
{
    var ermexAutoCompleteInfoBox = null;
    var ermexAutoCompleteSearchBox = null;

    if ($('#WorkAccounts_payeeName').length > 0)
    {
        ermexAutoCompleteInfoBox = "#WorkAccounts_payeeContactInfo";
        ermexAutoCompleteSearchBox = "#WorkAccounts_payeeName";
    }
    else if ($('#Deliveries_peyeeName').length > 0)
    {
        ermexAutoCompleteInfoBox = "#Deliveries_peyeeContactInfo";
        ermexAutoCompleteSearchBox = "#Deliveries_peyeeName";
    }

    if ((ermexAutoCompleteInfoBox != null) && (ermexAutoCompleteSearchBox != null))
    {
        $(ermexAutoCompleteSearchBox).autocomplete({
        source : ermexBaseUrl + "/site/narucilac",
        autoFocus : true,
        select : function(event, ui)
                {
                    event.preventDefault();
                    $(this).val(ui.item.label);
                    $(ermexAutoCompleteInfoBox).val(ui.item.value);
                },
        focus: function(event, ui) 
                {
                    event.preventDefault();
                }
        });

    }
}

var checkList = function()
{
    var setVal = $(this).val();
    var takenIds = [];
    var max = 0;
    $('#worker-list select').each(function(index, element)
    {
        if ($(element).val() == setVal)
            max++;

        takenIds.push($(element).val());
    });

    if (max > 1)
    {
        var nextId = 0;
        var has = false;
        for (i = 0; i < workerIds.length; i++)
        {
            has = false;
            for (j = 0; j < takenIds.length; j++)
            {
                has = (workerIds[i] == parseInt(takenIds[j]));
                if (has) break;
            }

            if (has == false)
            {
                $(this).val(workerIds[i]);
                break;
            }
        }
    }
};

$('#worker-list select').change(checkList);

$('.btn-add-worker').click(function() {
    if (workerIds.length > $('#worker-list select').length)
    {
        $('#worker-list select:last').clone().insertAfter('#worker-list select:last');
        $('#worker-list select:last').change(checkList);
        
        $('#worker-list select:last').change();

        if (workerIds.length == $('#worker-list select').length)
            $(this).remove();
    }
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


