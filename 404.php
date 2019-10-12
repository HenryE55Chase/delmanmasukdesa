<?php
include('config.php');
include ('fungsi.php');
?>
<!doctype html>
<html lang="<?php echo $lang; ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $site_name.' - '.$site_desc; ?></title>
        <meta property="og:title" content="<?php echo $site_name.' - '.$site_desc; ?>">
        <?php include('css.php'); ?>
<?php
    $file_name = 'head.txt';
    $script_head = file_get_contents( $file_name );
    echo $script_head;
    ?>
    </head>
    <body>
        <?php include('header.php'); ?>

        <div class="container">
            <ol xmlns:v="http://rdf.data-vocabulary.org/#" class="breadcrumb">
                <li typeof="v:Breadcrumb"><a rel="v:url" property="v:title" href="/">Tag</a></li>
                <li><?php echo $site_desc; ?></li>
            </ol>
            <div class="clearfix" style="padding:15px 0">
		<center><h2>Wiring Diagram Recent files</h2></center>
		<?php echo tag() ;?>
		<?php echo tag() ;?>
		<?php echo tag() ;?>
		<?php echo tag() ;?>
		<?php echo tag() ;?>
		<?php echo tag() ;?>
		<?php echo tag() ;?>
		<?php echo tag() ;?>
		<?php echo tag() ;?>
	<?php echo tag() ;?>
		<?php echo tag() ;?>
		<?php echo tag() ;?>
		<?php echo tag() ;?>
		<?php echo tag() ;?>
		<?php echo tag() ;?>
		<?php echo tag() ;?>
		<?php echo tag() ;?>
		<?php echo tag() ;?>
	<?php echo tag() ;?>
		<?php echo tag() ;?>
		<?php echo tag() ;?>
		<?php echo tag() ;?>
		<?php echo tag() ;?>
		<?php echo tag() ;?>
		<?php echo tag() ;?>
		<?php echo tag() ;?>
		<?php echo tag() ;?>
			<?php echo tag() ;?>
		<?php echo tag() ;?>
		<?php echo tag() ;?>
		<?php echo tag() ;?>
		<?php echo tag() ;?>
		<?php echo tag() ;?>
		<?php echo tag() ;?>
		<?php echo tag() ;?>
		<?php echo tag() ;?>
	<?php echo tag() ;?>
		<?php echo tag() ;?>
		<?php echo tag() ;?>
		<?php echo tag() ;?>
		<?php echo tag() ;?>
		<?php echo tag() ;?>
		<?php echo tag() ;?>
		<?php echo tag() ;?>
		<?php echo tag() ;?>
	<?php echo tag() ;?>
		<?php echo tag() ;?>
		<?php echo tag() ;?>
		<?php echo tag() ;?>
		<?php echo tag() ;?>
		<?php echo tag() ;?>
		<?php echo tag() ;?>
		<?php echo tag() ;?>
		<?php echo tag() ;?>	
            </div>
        </div>

        <?php include('footer.php'); ?>
    </body>
</html>