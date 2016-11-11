// JavaScript Document
$(function () {
    // ป้องกันการ enter
    $(window).keydown(function (event) {
        if (event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
    });

    var setModule = $("#setModule").val();

    $('#q').focus();


    $('#q').tagEditor({
        clickDelete: true,
        delimiter: ',', /* space and comma */
        placeholder: 'Enter keyword ...',
        forceLowercase: false,
        removeDuplicates: true,
        sortable: true // jQuery UI sortable					
    });


    $('button:submit').button({
        icons: {
            primary: 'ui-icon-search'
        }
    }).click(function (event) {

    });

    $('button:reset').button({
        icons: {
            primary: 'ui-icon-refresh'
        }
    }).click(function (event) {
        $('form')[0].reset();
        window.location = 'index.php?setModule=SM&setPage=dwdm_sm_search_report';
        $('#q').val('');
        $('#q').focus().effect('highlight');

    });


    $('#btncontact button').button({
        icons: {
            primary: 'ui-icon-contact'
        }
    }).click(function (event) {
        $("#divContact").toggle("slow", function () {
            // Animation complete.
        });
    });

});

