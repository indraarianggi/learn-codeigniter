<!DOCTYPE html>
<!-- View 5 : Helper format -->

<html>
  <head>
    <title>
      <?php echo $judulapp; ?>
    </title>
  </head>
  <body>
    <?php
      echo heading($judulapp, 1);
      echo heading("Error Message!", 2);
      echo showmessage($errmessage, "err");

      echo heading("Warning Message", 2);
      echo showmessage($warnmessage, "warn");

      echo heading("Normal Message", 2);
      echo showmessage($normalmessage);
    ?>

  </body>
</html>
