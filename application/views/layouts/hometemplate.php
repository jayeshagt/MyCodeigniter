<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php echo $title; ?></title>
        <?php echo $_styles; ?>
        <script type="text/javascript" >
            var base_url = '<?php echo base_url(); ?>';
        </script>
        <script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery.js"></script>
        <?php echo $_scripts; ?>
    </head>

    <body>
        <div id="wrapper">
            <div id="container">
                <?php echo $content; ?>
            </div>
        </div>
    </body>
</html>
