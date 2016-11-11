<script src="../../js/jquery.dataTables/js/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="../../js/jquery.dataTables/css/jquery.dataTables_themeroller.css">
<script src="../../js/jquery.dataTables/js/jquery.dataTables.min.js"></script>
<link type="text/css" href="../../css/ui.lightness-theme/jquery-ui.css" rel="stylesheet" />
<style type="text/css">
    body {

        font-size:11px;
        font-family:tahoma;
    }
</style>

<table id="example" class="display compact" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th width='5%' class="header_height">Manage</th>
            <th width='53%'>Report Group</th>
            <th width='10%'>Type</th>
            <th width='11%'>Used</th>
            <th width='9%'>Order</th>
            <th width='12%'>Update Time</th>      
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th width='5%' class="header_height">Manage</th>
            <th width='53%'>Report Group</th>
            <th width='10%'>Type</th>
            <th width='11%'>Used</th>
            <th width='9%'>Order</th>
            <th width='12%'>Update Time</th>      
        </tr>
    </tfoot>
</table>
<input type="text" id="hidRadio">

<script>
    $(document).ready(function () {
        var table = $('#example').DataTable(
                {
                    "processing": true,
                    "serverSide": true,
                    'bJQueryUI': true,
                    "ajax": "../../includes/dataTable/server_processing.php?module_name=FI",
                    'columnDefs': [{
                            'targets': 0,
                            'className': 'dt-body-center',
                            'render': function (data, type, full, meta) {
                                return '<input type="radio" name="id[]"  id="rowID_' + $('<div/>').text(data).html() + '" value="' + $('<div/>').text(data).html() + '">';
                            }
                        }]
                });


        $('#example tbody').on('click', 'tr', function () {
            var data = table.row(this).data();
            $('#rowID_' + data[0]).prop("checked", true);
            $("#hidRadio").val(data[0]);
            console.log(data[0]);

            //	alert( 'You clicked on '+data[0]+'\'s row' );
        });


    });
</script>