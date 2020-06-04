<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/404/css/style.css" />
    <title>404</title>
  </head>
  <body>
    <div id="js-browser" class="browser">
      <div id="js-browser__close" class="browser__close"></div>
      <div id="js-browser__minimize" class="browser__minimize"></div>
      <div id="js-browser__maximize" class="browser__maximize"></div>
      <div class="browser__address-bar"></div>
      <div class="browser__body">
        <a href="javascript:window.history.go(-1);" class="x" title="Going back"></a>
        <p>Uh-oh! Page not found.</p>
      </div>
    </div>
    <script src="<?php echo base_url(); ?>/assets/404/js/main.js"></script>
  </body>
</html>
