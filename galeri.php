<?php
include('config.php');
include ('fungsi.php');

$q = $_GET['q'];
if(cek_badword($q)) {
    header( "Location: $domain" );
    exit;
}
$keyword = bersih($q);
$cano = $domain.'/'.$galeri.'/'.sanitize_title2($q);
$data = ambil_gambar($keyword);
if(empty($data) || $data == false) {
    $data = ambil_gambar($keyword);
}
?><!doctype html>
<html lang="<?php echo $lang; ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $keyword.' Galleries - '.$site_desc; ?></title>
        <meta property="og:title" content="<?php echo $keyword.' - '.$site_desc; ?>">
        <meta property="og:description" content="<?php echo $keyword; ?> image galleries. Access <?php echo $keyword; ?> images for free at <?php echo $domen; ?>">
        <meta name="description" content="<?php echo $keyword; ?> image galleries. Access <?php echo $keyword; ?> images for free at <?php echo $domen; ?>">
        <link rel="canonical" href="<?php echo $cano; ?>" />
        <?php include('css.php'); ?>
    </head>
    <body>
        <?php include('header.php'); ?>

        <div class="container">
            <ol xmlns:v="http://rdf.data-vocabulary.org/#" class="breadcrumb">
                <li typeof="v:Breadcrumb"><a rel="v:url" property="v:title" href="/">Home</a></li>
                <li><?php echo $keyword; ?></li>
            </ol>
            <?php if(empty($data) || $data == false) {
                echo '<div class="striped text-center" style="padding:15px 0"><h1>Not Found</h1></div>';
            }
            else { ?>
            <div class="striped text-center" style="padding:15px 0">
                <h2><?php echo $keyword; ?></h2>

                <?php
                $suggest = related($keyword);
                if(!empty($suggest)) {
                    echo "<div class=\"relatedkey clearfix\">\n";
                    echo "<ul>";
                    foreach($suggest as $key) {
                        echo "<li><a href=\"/".$single."/".sanitize_title($key)."\" title=\"".$key."\">".$key."</a></li>\n";
                        //echo "<li><a href=\"galeri.php?q=".urlencode($key)."\" title=\"".$key."\">".$key."</a></li>\n";
                    }
                    echo "</ul>";
                    echo "</div>";
                } ?>

                <div class="ads">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- responsive text link ads -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-1473505998765968"
     data-ad-slot="3186556975"
     data-ad-format="link"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
                </div>
                <div class="clearfix">
                <?php
                    foreach($data as $i) {
                        echo "<div class=\"galeri col-md-4 col-sm-6\">";
                        echo "<a href=\"/".$single."/".sanitize_title2($i['judul'])."\">";
                       // echo "<a href=\"".$domain."/single.php?q=".urlencode($i['judul'])."\">";
                        echo "<div class=\"thumbnail\" style=\"background-image: url('".$i['thumb']."'); background-color: #cccccc; background-size: cover; background-repeat: no-repeat; background-position: center center;width:100%;height:180px;\"><noscript><img src=\"http://i0.wp.com/".str_replace(array('http://','https://'), '', $i['link'])."?quality=80&strip=all\"/></noscript></div>";
                        echo "<h3>".$i['judul']."</h3>\n";
                        echo "</a>";
                        echo "</div>";
                    }
                ?>
                </div>
            </div>
            <?php } ?>
        </div>
        <?php include('footer.php'); ?>
    </body>
</html>