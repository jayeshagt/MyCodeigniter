<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <title><?php echo $title; ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />
        <?php
        echo $_styles; 
        ?>
        <script type="text/javascript">
            var base_url = '<?php echo base_url(); ?>';
        </script>
        <script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery.js"></script>
        <?php echo $_scripts; ?>
    </head>
    <body>
        <div class="container" id="page">
            <div id="header">
                <div id="logo"></div>
            </div>
           
            <div id="mainmenu">
                
            </div>
            <div class="container">
                <div id="content">
                    <?php echo $content; ?>
                </div>
            </div>
            <div id="footer">
            </div>
        </div>
    </body>
</html>