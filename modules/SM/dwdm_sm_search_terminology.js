// JavaScript Document
$(function () {
    // ป้องกันการ enter

    var setModule = $("#setModule").val();
    var setPage = $("#setPage").val();

    var w = $(window).height() - 220;

    $("#showData").css("height", w);

    $(window).keydown(function (event) {
        if (event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
    });



    $('#q').focus();


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
        // window.location= 'index.php?setModule=SM&setPage=dwdm_sm_search_terminology';
        $('#showData').html('');
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


    // Auto Complete
    $("#q").autocomplete({
        source: "./modules/" + setModule + "/autocomp_search_terminology.php?" + $.now(),
        minLength: 2,
        select: function (event, ui) {
            $(this).val(ui.item.id);

            $.loading("load");
            $.get('./modules/' + setModule + '/dwdm_sm_search_teminology_list.php?' + $.now(), {setModule: setModule, setPage: setPage, q: $('#q').val()}, function (data) {

                $('#showData').html(data);
                $.loading("unload");


            });
        }
    });

});

