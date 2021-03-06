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
    selectWorkers();
    bindShowFilterOptions();
	bindAutoComplete();
    bindTimePicker();
    bindOtprmenicaSubmitCheck();
    bindCloseAddExistingProductsModal()
});

var displayError = function(errNum)
{
    switch(errNum)
    {
        case 0: // Nije moguce kreirati otpremnicu bez proizvoda
          $('.empty-proizvod').fadeIn();
          break;
        case 1: // Morate popuniti nazive svih proizvoda.
          $('.empty-proizvod-2').fadeIn();
          break;
    }
}

function bindOtprmenicaSubmitCheck()
{
    $('#otpremnica-submit-button').click(function(e)
    {
        //TODO dodati validaciju da se ne moze snimiti otpremnica bez proizvoda
//        if ($(this).attr("data-otpremnica-ok") != "1")
//        {
//            e.preventDefault();
//            displayError(0);
//        }
/*        if (!$('.oneOrder').find())
        {
            e.preventDefault();
            displayError(0);
        }*/
    });
    $('.empty-proizvod > .close').click(function(e) 
    {
        e.preventDefault();
        $('.empty-proizvod').fadeOut();
    })
}

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

/**
  * Add one product function
  *
  * @author Aleksandar Panic
  *
  * @param event e Passed event arguments
  * @param JSONP data Data which will be parsed.
  */
var addOOProduct = function(e, data)
{
    var separator = "";
    if($('.oneOrder').find())
    {
        separator = "<hr/>";
    }
    var order = '<div class="order-field clearfix oneOrder">' + separator +
        '<div class="large-9 columns"><label>Naziv</label><input type="text" name="Order[title][]" required {NAZIV} /><small class="error">Naziv proizvoda je obavezan</small></div>' +
        '<div class="large-1 columns"><label>Količina</label><input type="text" name="Order[amount][]"  pattern="integer" {KOLICINA} required pattern="integer" /><small class="error">Unesite broj</small></div>' +
        '<div class="large-1 columns"><label>Mjera</label> <input type="text" name="Order[measurementUnit][]" {MJERA} required/><small class="error">Mjerna jedinica</small></div>' +
        '<div class="large-1 columns"><label>Cijena</label><input type="text" pattern="integer" name="Order[price][]" {CIJENA} pattern="number"/><small class="error">Unesite broj</small></div>' +
        '<div class="large-10 columns"><label>Opis</label><textarea name="Order[description][]">{OPIS}</textarea></div>' +
        '<div class="large-2 columns text-right"><br/><br/><br/><br/><br/><a class="button small secondary text-right removeThisOrder" href="#">Izbriši narudžbu</a></div>' +
        '<input type="hidden" name="Order[id][]" value="(ORDERID)"/></div>';
    var value = "";
    
    if (data == null)
    {
        value = order.replace(/\{(.+?)\}/mig, "").replace("(ORDERID)", "0");
    }
    else
    {
        var oneOrder = "";
        for (i = 0; i < data.length; i++)
        {
            oneOrder = order.replace("{NAZIV}", 'value="' + data[i].naziv + '"');
            oneOrder = oneOrder.replace("{KOLICINA}", 'value="' + data[i].kolicina + '"');
            oneOrder = oneOrder.replace("{MJERA}", 'value="' + data[i].mjera + '"');
            oneOrder = oneOrder.replace("{CIJENA}", 'value="' + data[i].cijena + '"');
            oneOrder = oneOrder.replace("{OPIS}", data[i].opis);
            oneOrder = oneOrder.replace("(ORDERID)", data[i].id);

            value += oneOrder;
        }
    }
    $(value).insertBefore(".addOrder");
}

$('body').on('click', '.removeThisOrder', function(e){
    console.log('konj');
    $(this).parent('div').parent('.order-field').remove();
    e.preventDefault();
});

/* Novi proizvod za radni nalog */
$('.addO').click(addOOProduct);

/* Novi proizvod za otpremnice */
$('.addOO').click(function (e)
{
    $('#otpremnica-submit-button').attr("data-otpremnica-ok", "1");
    addOOProduct(e);
});


$('#proizvodiDodajPostojeci').click(function() 
{
    var arr = $('#order-grid').find('input[name="orderId[]"]');
    var ids = "";
    arr.each(function (index, element) 
    {
        if ($(element).is(":checked"))
        {
            ids += $(element).val() + ",";
            $(element).prop('checked', false);
            $(element).attr("disabled", true);
        }
    });

    ids = ids.substring(0, ids.length - 1);

    $.post(ermexBaseUrl + "/proizvodi/vratiproizvode", { searchIds : ids }, function(data) 
    {
        addOOProduct(null, data);
        $('#otpremnica-submit-button').attr("data-otpremnica-ok", "1");
    }, "json")
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
    $(selectField).find('input').val('');
    $(selectField).insertBefore('.add-materials').wrap('<div></div>');

});

function bindShowFilterOptions()
{
    $('.show-filter-options').on('click', function(){
        $('.hidden-filter-options').slideToggle();
    });
}

function bindCloseAddExistingProductsModal()
{
    $('#proizvodiDodajPostojeci').click(function(){
        $('.reveal-modal-bg').click();
    });
}
