<?php
if(preg_match('/SemrushBot/i',$_SERVER['HTTP_USER_AGENT']))
    {
    header('HTTP/1.0 403 Forbidden');
    echo "exit";
    exit();
    }
?>

<?php
if(preg_match('/MJ12bot/i',$_SERVER['HTTP_USER_AGENT']))
    {
    header('HTTP/1.0 403 Forbidden');
    echo "exit";
    exit();
    }
?>

<?php
if(preg_match('/AhrefsBot/i',$_SERVER['HTTP_USER_AGENT']))
    {
    header('HTTP/1.0 403 Forbidden');
    echo "exit";
    exit();
    }
?>

<?php
if(preg_match('/BLEXBot/i',$_SERVER['HTTP_USER_AGENT']))
    {
    header('HTTP/1.0 403 Forbidden');
    echo "exit";
    exit();
    }
?>

<?php
if(preg_match('/YandexBot/i',$_SERVER['HTTP_USER_AGENT']))
    {
    header('HTTP/1.0 403 Forbidden');
    echo "exit";
    exit();
    }
?>

<?php
if(preg_match('/DotBot/i',$_SERVER['HTTP_USER_AGENT']))
    {
    header('HTTP/1.0 403 Forbidden');
    echo "exit";
    exit();
    }
?>

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
		<meta name="keywords" content="resume,resume examples,resume template">
		<meta name="description" content="resume,resume examples,resume template">
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
                <li typeof="v:Breadcrumb"><a rel="v:url" property="v:title" href="/">Home</a></li>
                <li><?php echo $site_desc; ?></li>
            </ol>
            <div class="clearfix" style="padding:15px 0">
			<center><h1>Resume Examples | Resume Template</h1></center>
		<center><h2>Recent Post</h2></center>
		<?php echo tag() ;?>
		<?php echo tag() ;?>
		<?php echo tag() ;?>
		<?php echo tag() ;?>
		<?php echo tag() ;?>
            </div>
        </div>

        <?php include('footer.php'); ?>
<?php
	if(preg_match('/google|googlebot|bing|msn|bingbot|yahoo|surlp/isU', $_SERVER['HTTP_USER_AGENT'])) {
		include('rss.html');
	}
?>

<?php
$root = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
$site_url = parse_url($root);
$domain = str_replace('www.','',$site_url['host']); 


$file = 'domain.txt';
if (!file_exists($file)){
	fopen($file, 'w') or die('Cannot open file:  '.$file); //implicitly creates file
}


$arr = file($file,FILE_IGNORE_NEW_LINES);
if (!in_array($domain,$arr))
{
	$docp = file_put_contents($file, $domain. PHP_EOL, FILE_APPEND);
}

?>	
    </body>
</html>
