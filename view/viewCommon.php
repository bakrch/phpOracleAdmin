<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php $title ?></title>


    <script language="JavaScript" type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script language="JavaScript" type="text/javascript" src="js/bootstrap3-typeahead.min.js"></script>
    <script language="JavaScript" type="text/javascript" src="js/tablequery.js"></script>

    </script>
  </head>
  <body>

    <header>

    </header>
    <link rel="stylesheet" href="css/styleTable.css">
    <link rel="stylesheet" href="css/styleUser.css">
    <script language="JavaScript" type="text/javascript" src="js/user.js"></script>
    <div class="row">
        <!-- uncomment code for absolute positioning tweek see top comment in css -->
        <!-- <div class="absolute-wrapper"> </div> -->
        <!-- Menu -->
        <?php echo $sidebar; ?>

        <!-- Main Content -->
        <div class="container-fluid">
            <div class="side-body">
              <div id="content">
                <?php echo $content;
                 ?>
              </div>

            </div>
        </div>
    </div>

    <footer>

    </footer>
  </body>
</html>
