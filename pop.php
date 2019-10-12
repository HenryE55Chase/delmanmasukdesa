		

<script>
var remtitle = " - All New Resume Examples & Resume Template"; // Tulisan di judul yg dihapus

judul = $(document).attr('title');
judul = judul.replace(remtitle, "");
var linkoffer = "/register";
var im = $(".thumbnail").html();
im = im.replace(/<noscript>(.*)<\/noscript>/, "");
var ims = im.replace(/(.*) src="(.*)" (.*)/g, "$2");
offr = '<div id="my-modals" class="modals fade" data-backdrop="static" data-keyboard="false" style="display: block;"><div class="modals-dialog"><div class="modals-content"><div class="modals-header"><h3 class="modals-title">'+judul+'</h3></div><div class="modals-body"><div class="row"><div class="small-12 medium-4 columns text-center"><div class="shadow"><img id="coverImage" src="'+ims+'" alt="'+judul+'"></div></div><br><p class="text-center">Please create a <span style="color: #ff0000; font-weight: bold;">FREE ACCOUNT</span> to continue <span style="color:#1d64a6;font-weight:bold">reading</span> or <span style="color:#1d64a6;font-weight:bold">download</span>!</p><p class="text-center" style="font-size: 16px; font-weight: bold; color:red;">Start Your FREE Month!!</p><div class="small-12 colums text-center" style="font-size:20px"><a href="'+linkoffer+'" target="_self" rel="nofollow tag" class="btn btn-info" role="button">CREATE MY ACCOUNT NOW</a></div><br><div class="secure text-center"></div></div></div></div></div></div>';
$("#footer").append(offr);
$('head').append('<link rel="stylesheet" type="text/css" href="/modals.css">');
$("body").on("contextmenu",function(e){
     return false;
   });
</script>

  <!-- Histats.com  (div with counter) --><div id="histats_counter"></div>
<!-- Histats.com  START  (aync)-->
<script type="text/javascript">var _Hasync= _Hasync|| [];
_Hasync.push(['Histats.start', '1,4323379,4,511,95,18,00000000']);
_Hasync.push(['Histats.fasi', '1']);
_Hasync.push(['Histats.track_hits', '']);
(function() {
var hs = document.createElement('script'); hs.type = 'text/javascript'; hs.async = true;
hs.src = ('//s10.histats.com/js15_as.js');
(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(hs);
})();</script>
<noscript><a href="/" target="_blank"><img  src="//sstatic1.histats.com/0.gif?4323379&101" alt="invisible hit counter" border="0"></a></noscript>
<!-- Histats.com  END  -->
