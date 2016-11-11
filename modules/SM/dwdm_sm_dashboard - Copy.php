
<link rel="stylesheet" type="text/css" href="../../vendor/twbs/bootstrap/dist/css/bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="../../vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../../vendor/fortawesome/font-awesome/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<style type="text/css">

    .panel-title {
        font-size:12px;
        font-weight:bold;
    }
    /*!
     * Start Bootstrap - SB Admin 2 Bootstrap Admin Theme (http://startbootstrap.com)
     * Code licensed under the Apache License v2.0.
     * For details, see http://www.apache.org/licenses/LICENSE-2.0.
     */


    .panel {
        border-radius:2px;	
    }

    body {
        background-color: #f8f8f8;
        font-family:Tahoma, Geneva, sans-serif;
        font-size:12px;
    }

    #wrapper {
        width: 100%;
    }

    #page-wrapper {
        padding: 0 15px;
        min-height: 568px;
        background-color: #fff;
    }

    @media(min-width:768px) {
        #page-wrapper {
            position: inherit;
            margin: 0 0 0 250px;
            padding: 0 30px;
            border-left: 1px solid #e7e7e7;
        }
    }

    .navbar-top-links {
        margin-right: 0;
    }

    .navbar-top-links li {
        display: inline-block;
    }

    .navbar-top-links li:last-child {
        margin-right: 15px;
    }

    .navbar-top-links li a {
        padding: 15px;
        min-height: 50px;
    }

    .navbar-top-links .dropdown-menu li {
        display: block;
    }

    .navbar-top-links .dropdown-menu li:last-child {
        margin-right: 0;
    }

    .navbar-top-links .dropdown-menu li a {
        padding: 3px 20px;
        min-height: 0;
    }

    .navbar-top-links .dropdown-menu li a div {
        white-space: normal;
    }

    .navbar-top-links .dropdown-messages,
    .navbar-top-links .dropdown-tasks,
    .navbar-top-links .dropdown-alerts {
        width: 310px;
        min-width: 0;
    }

    .navbar-top-links .dropdown-messages {
        margin-left: 5px;
    }

    .navbar-top-links .dropdown-tasks {
        margin-left: -59px;
    }

    .navbar-top-links .dropdown-alerts {
        margin-left: -123px;
    }

    .navbar-top-links .dropdown-user {
        right: 0;
        left: auto;
    }

    .sidebar .sidebar-nav.navbar-collapse {
        padding-right: 0;
        padding-left: 0;
    }

    .sidebar .sidebar-search {
        padding: 15px;
    }

    .sidebar ul li {
        border-bottom: 1px solid #e7e7e7;
    }

    .sidebar ul li a.active {
        background-color: #eee;
    }

    .sidebar .arrow {
        float: right;
    }

    .sidebar .fa.arrow:before {
        content: "\f104";
    }

    .sidebar .active>a>.fa.arrow:before {
        content: "\f107";
    }

    .sidebar .nav-second-level li,
    .sidebar .nav-third-level li {
        border-bottom: 0!important;
    }

    .sidebar .nav-second-level li a {
        padding-left: 37px;
    }

    .sidebar .nav-third-level li a {
        padding-left: 52px;
    }

    @media(min-width:768px) {
        .sidebar {
            z-index: 1;
            position: absolute;
            width: 250px;
            margin-top: 51px;
        }

        .navbar-top-links .dropdown-messages,
        .navbar-top-links .dropdown-tasks,
        .navbar-top-links .dropdown-alerts {
            margin-left: auto;
        }
    }

    .btn-outline {
        color: inherit;
        background-color: transparent;
        transition: all .5s;
    }

    .btn-primary.btn-outline {
        color: #428bca;
    }

    .btn-success.btn-outline {
        color: #5cb85c;
    }

    .btn-info.btn-outline {
        color: #5bc0de;
    }

    .btn-warning.btn-outline {
        color: #f0ad4e;
    }

    .btn-danger.btn-outline {
        color: #d9534f;
    }

    .btn-primary.btn-outline:hover,
    .btn-success.btn-outline:hover,
    .btn-info.btn-outline:hover,
    .btn-warning.btn-outline:hover,
    .btn-danger.btn-outline:hover {
        color: #fff;
    }

    .chat {
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .chat li {
        margin-bottom: 10px;
        padding-bottom: 5px;
        border-bottom: 1px dotted #999;
    }

    .chat li.left .chat-body {
        margin-left: 60px;
    }

    .chat li.right .chat-body {
        margin-right: 60px;
    }

    .chat li .chat-body p {
        margin: 0;
    }

    .panel .slidedown .glyphicon,
    .chat .glyphicon {
        margin-right: 5px;
    }

    .chat-panel .panel-body {
        height: 350px;
        overflow-y: scroll;
    }

    .login-panel {
        margin-top: 25%;
    }

    .flot-chart {
        display: block;
        height: 400px;
    }

    .flot-chart-content {
        width: 100%;
        height: 100%;
    }

    .dataTables_wrapper {
        position: relative;
        clear: both;
    }

    table.dataTable thead .sorting,
    table.dataTable thead .sorting_asc,
    table.dataTable thead .sorting_desc,
    table.dataTable thead .sorting_asc_disabled,
    table.dataTable thead .sorting_desc_disabled {
        background: 0 0;
    }

    table.dataTable thead .sorting_asc:after {
        content: "\f0de";
        float: right;
        font-family: fontawesome;
    }

    table.dataTable thead .sorting_desc:after {
        content: "\f0dd";
        float: right;
        font-family: fontawesome;
    }

    table.dataTable thead .sorting:after {
        content: "\f0dc";
        float: right;
        font-family: fontawesome;
        color: rgba(50,50,50,.5);
    }

    .btn-circle {
        width: 30px;
        height: 30px;
        padding: 6px 0;
        border-radius: 15px;
        text-align: center;
        font-size: 12px;
        line-height: 1.428571429;
    }

    .btn-circle.btn-lg {
        width: 50px;
        height: 50px;
        padding: 10px 16px;
        border-radius: 25px;
        font-size: 18px;
        line-height: 1.33;
    }

    .btn-circle.btn-xl {
        width: 70px;
        height: 70px;
        padding: 10px 16px;
        border-radius: 35px;
        font-size: 24px;
        line-height: 1.33;
    }

    .show-grid [class^=col-] {
        padding-top: 10px;
        padding-bottom: 10px;
        border: 1px solid #ddd;
        background-color: #eee!important;
    }

    .show-grid {
        margin: 15px 0;
    }

    .huge {
        font-size: 30px;
    }

    .panel-green {
        border-color: #5cb85c;
    }

    .panel-green .panel-heading {
        border-color: #5cb85c;
        color: #fff;
        background-color: #5cb85c;
    }

    .panel-green a {
        color: #5cb85c;
    }

    .panel-green a:hover {
        color: #3d8b3d;
    }

    .panel-red {
        border-color: #d9534f;
    }

    .panel-red .panel-heading {
        border-color: #d9534f;
        color: #fff;
        background-color: #d9534f;
    }

    .panel-red a {
        color: #d9534f;
    }

    .panel-red a:hover {
        color: #b52b27;
    }

    .panel-yellow {
        border-color: #f0ad4e;
    }

    .panel-yellow .panel-heading {
        border-color: #f0ad4e;
        color: #fff;
        background-color: #f0ad4e;
    }

    .panel-yellow a {
        color: #f0ad4e;
    }

    .panel-yellow a:hover {
        color: #df8a13;
    }

    .text-normal{
        font-weight:normal;	
    }

</style>
<div class="container">

    <!-- Jumbotron -->
    <div class="">
        <h4>DW/DM Security Matrix Dashboard</h4>
        <hr>

        <!-- Example row of columns -->
        <div class="row">
            <div class="col-md-12">
                <p><i class="fa fa-users" aria-hidden="true"></i> Current Users : <strong>716</strong></p>
            </div>
        </div>
    </div>



    <!-- Example row of columns -->
    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-users" aria-hidden="true"></i> Users total by Module</h3>     
                </div>
                <div class="panel-body">      
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="text-center">
                                            <i class="fa fa-users fa-2x"></i>
                                        </div>
                                        <div class="text-center">
                                            <div class="huge">26</div>
                                            <div class="text-normal">CM</div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="panel panel-green">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="text-center">
                                            <i class="fa fa-users fa-2x"></i>
                                        </div>
                                        <div class="text-center">
                                            <div class="huge">12</div>
                                            <div class="text-normal">HKR</div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="panel panel-yellow">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="text-center">
                                            <i class="fa fa-users fa-2x"></i>
                                        </div>
                                        <div class="text-center">
                                            <div class="huge">124</div>
                                            <div class="text-normal">CM</div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="panel panel-red">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="text-center">
                                            <i class="fa fa-users fa-2x"></i>
                                        </div>
                                        <div class="text-center">
                                            <div class="huge">13</div>
                                            <div class="text-normal">NUA</div>
                                        </div>
                                    </div>
                                </div>                       
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <div class="col-lg-6 text-center">Pire Graph</div>
                        <div class="col-lg-6 text-center">Bar Graph</div>
                    </div>        

                </div>
                <!-- <div class="panel-footer">Panel footer</div>-->
            </div>
        </div>


        <!-- Example row of columns -->
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-users" aria-hidden="true"></i> Reports total by Module</h3>     
                    </div>
                    <div class="panel-body">      
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="text-center">
                                                <i class="fa fa-users fa-2x"></i>
                                            </div>
                                            <div class="text-center">
                                                <div class="huge">26</div>
                                                <div class="text-normal">CM</div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="panel panel-green">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="text-center">
                                                <i class="fa fa-users fa-2x"></i>
                                            </div>
                                            <div class="text-center">
                                                <div class="huge">12</div>
                                                <div class="text-normal">HKR</div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="panel panel-yellow">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="text-center">
                                                <i class="fa fa-users fa-2x"></i>
                                            </div>
                                            <div class="text-center">
                                                <div class="huge">124</div>
                                                <div class="text-normal">CM</div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="panel panel-red">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="text-center">
                                                <i class="fa fa-users fa-2x"></i>
                                            </div>
                                            <div class="text-center">
                                                <div class="huge">13</div>
                                                <div class="text-normal">NUA</div>
                                            </div>
                                        </div>
                                    </div>                       
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <div class="col-lg-6 text-center">Pire Graph</div>
                            <div class="col-lg-6 text-center">Bar Graph</div>
                        </div>        

                    </div>
                    <!-- <div class="panel-footer">Panel footer</div>-->
                </div>
            </div>
            <!--
            <div class="col-lg-6">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title">Panel title</h3>
                </div>
                <div class="panel-body">
                  <p class="text-danger">As of v8.0, Safari exhibits a bug in which resizing your browser horizontally causes rendering errors in the justified nav that are cleared upon refreshing.</p>
                  <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                  <p><a class="btn btn-primary  btn-xs" href="#" role="button">View details &raquo;</a></p>
                </div>
                <div class="panel-footer">Panel footer</div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12"  align="right">
                <p><i class="fa fa-calendar" aria-hidden="true"></i> Data base on : <strong><?php echo date('Y-m-d') ?></strong></p>
              </div>
            </div>-->
        </div>
        <!-- /container -->
        <script src="../../vendor/components/jquery/jquery.min.js"></script>
        <script src="../../vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>