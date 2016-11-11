$(function () {
    $("#tabs").tabs();

    var setModule = $("#setModule").val();
    var setPage = $("#setPage").val();


    $.loading("load");

    $.get("./modules/" + setModule + "/" + setPage + "_by_date.php", {setModule: setModule, setPage: setPage, months: $("#months").val()}, function (data) {
        $("#tabs-1").html(data);
    })
            .always(function (data) {
                $.loading("unload");
            });

    $("#months").change(function () {
        $.loading("load");
        $("#tabs").tabs("option", "active", 0);
        $.get("./modules/" + setModule + "/" + setPage + "_by_date.php", {setModule: setModule, setPage: setPage, months: $(this).val()}, function (data) {
            $("#tabs-1").html(data);
        })
                .always(function (data) {
                    $.loading("unload");
                });
    });


    $("#tab-1").click(function () {

        $.loading("load");

        $.get("./modules/" + setModule + "/" + setPage + "_by_date.php", {setModule: setModule, setPage: setPage, months: $("#months").val()}, function (data) {
            $("#tabs-1").html(data);
        })
                .always(function (data) {
                    $.loading("unload");
                });

    });


    $("#tab-2").click(function () {

        $.loading("load");

        $.get("./modules/" + setModule + "/" + setPage + "_by_users.php", {setModule: setModule, setPage: setPage, months: $("#months").val()}, function (data) {
            $("#tabs-2").html(data);
        })
                .always(function (data) {
                    $.loading("unload");
                });

    });

    $("#tab-3").click(function () {

        $.loading("load");

        $.get("./modules/" + setModule + "/" + setPage + "_by_menu.php", {setModule: setModule, setPage: setPage, months: $("#months").val()}, function (data) {
            $("#tabs-3").html(data);
        })
                .always(function (data) {
                    $.loading("unload");
                });

    });


});
