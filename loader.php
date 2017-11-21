<?php

//-------- add below code to header.php after <body> tag ---------?>

<div class="loader"></div>

<?php//--------- style.css  --------------------?>
<style>
.loader {
position: fixed;
left: 0px;
top: 0px;
width: 100%;
height: 100%;
z-index: 9999;
background: url('images/loader.GIF') center center no-repeat #f8f8f8;
}
</style>

<?php//---------------- header.php before </head> tag ----------------------?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
    $(window).load(function() {
        $(".loader").fadeOut("slow");
    })
</script>
