<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="{$page_kw|default:$_var.page.keywords}">
    <meta name="description" content="{$page_desc|default:$_var.page.description}">
    <link rel="icon" href="<?php echo $_assign_vars['urlView']; ?>img/favicon.ico">
    <title><?php echo $_assign_vars['pageTitle']; ?> - <?php echo $_assign_vars['pageHeading']; ?></title>
    <link href="<?php echo $_assign_vars['urlView']; ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $_assign_vars['urlView']; ?>flags/famfamfam-flags.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
        <header class="header clearfix">
            <div class="row">
                <div class="col-lg-10 p-4">
                    <h3 class="text-muted"><?php echo $_assign_vars['pageTitle']; ?></h3>
                </div>
                <div class="col-lg-2 align-self-center">
                    <img src="<?php echo $_assign_vars['urlView']; ?>img/oxwall-logo.png" class="pull-right">
                </div>
            </div>
        </header>
      <main role="main">
        <?php echo $_assign_vars['pageSteps']; ?>
        <div class="row jumbotron">
            <div class="col-lg-9"><h3><?php echo $_assign_vars['pageHeading']; ?></h3></div>
            <div class="col-lg-3"><?php echo $_assign_vars['pageLangs']; ?></div>
            <div class="col-lg-12 pt-4">
              <?php echo $_assign_vars['pageBody']; ?>
            </div>
        </div>
      </main>
      <footer class="footer">
          &copy; <?php echo date("Y"); ?> by <a href="https://oxwallplus.com" target="_blank" title="Best social software">Oxwall Plus</a>
      </footer>
    </div> 
    <script src="<?php echo $_assign_vars['urlView']; ?>js/jquery.min.js"></script>
    <script src="<?php echo $_assign_vars['urlView']; ?>js/bootstrap.bundle.min.js"></script>
  </body>
</html>