<link rel="stylesheet" href="css/styleUser.css">
<script language="JavaScript" type="text/javascript" src="js/user.js"></script>
<div class="side-menu">

<nav class="navbar navbar-default" role="navigation">
<!-- Brand and toggle get grouped for better mobile display -->
<div class="navbar-header">
    <div class="brand-wrapper">
        <!-- Hamburger -->
        <button type="button" class="navbar-toggle">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <!-- Brand -->
        <div class="brand-name-wrapper">
            <a class="navbar-brand" href="../MVC_TEST">
                Oracle PHP Admin
            </a>
        </div>

        <!-- Search -->
        <a data-toggle="collapse" href="?logout" class="btn btn-default" id="search-trigger">
            <span class="glyphicon glyphicon-off"></span>
        </a>

        <!-- Search body -->
        <div id="search" class="panel-collapse collapse">
            <div class="panel-body">
                <form class="navbar-form" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default "><span class="glyphicon glyphicon-ok"></span></button>
                </form>
            </div>
        </div>
    </div>

</div>

<!-- Main Menu -->
<div class="side-menu-container">
    <ul class="nav navbar-nav">

        <li class=""><a href="#"><span class="glyphicon glyphicon-user"></span> User's profil</a></li>
        <li class=""><a href="?table"><span class="glyphicon glyphicon-menu-right"></span> System's tables</a></li>
        <li class=""><a href="?userTables"><span class="glyphicon glyphicon-menu-right"></span> User's tables</a></li>
        <li class=""><a href="?createTable"><span class="glyphicon glyphicon-pencil"></span>Create tables</a></li>
        <li class=""><a href="?execQuery"><span class="glyphicon glyphicon-send"></span>Execute a query</a></li>
        <li class=""><a href="?dropUser"><span class="glyphicon glyphicon-trash"></span>Drop user</a></li>
        <li class=""><a href="?dropTable"><span class="glyphicon glyphicon-trash"></span>Drop table</a></li>


        <li><a href="#"><span class="glyphicon glyphicon-cog"></span> Preferences</a></li>

    </ul>
</div><!-- /.navbar-collapse -->
</nav>

</div>
