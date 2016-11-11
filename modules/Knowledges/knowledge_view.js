// JavaScript Document
$(function () {

    ajaxLoading();

    // modules = module name
    // pages = page name
    // select_id = selection id
    var setModule = $("#setModule").val();

    var setPage = $("#setPage").val();

    var setTitle = $("#setTitle").val();

    // Setting Dialog
    $.setDialog(setPage, 820, 620, setTitle);

    /******************* End Delete ********************/

    // เลือกเมนู
    $('#sel_cate_id').change(function () {
        window.location = '?setModule=Knowledges&setPage=knowledge_view&cate_id=' + $(this).val();
    });



    $(".link").click(function () {
        $('#dialog-form-knowledge_view').dialog('open');
        $.get('./modules/Knowledges/knowledge_view_detail.php',
                {doAction: 'view', id: $(this).attr("ref")},
                function (data) {
                    $("#dialog-form-knowledge_view").html(data);
                    //$("input:radio[name=auth_id][disabled=false]:first").attr('checked', true);
                }
        );
        return false;
    });



});

