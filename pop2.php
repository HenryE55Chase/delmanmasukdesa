		

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

 <!-- Histats.com  START  (aync)-->

<!-- Histats.com  END  -->