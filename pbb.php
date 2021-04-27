<?php 

?>
<HTML>
<HEAD>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>PBB</title>
<meta name="description" content="PPBbyPsyl0 || Laurent Garnier's Webradio. Open 24/7">
<meta property="og:url" content="website" />
<link href="/css/bootstrap.min.css" rel="stylesheet">
<link href="/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="/css/font-awesome.css" rel="stylesheet" type="text/css">
<link href="/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<!-- <meta property="og:image" content="https://www.kdbuzz.com/PBB/pbb-like.png">
<meta property="og:title" content="PBB - Pedro's Broadcasting Basement">
<meta property="og:description" content="Laurent Garnier's Webradio. Open 24/7">

<meta property="og:type" content="https://www.kdbuzz.com/PBB/" />
<link rel="icon" type="image/png" href="https://www.kdbuzz.com/PBB/favico-pbb-fb.jpg">
 

--> 
 
<STYLE>

.logo
{
width:270px;
}
@media (max-width:780px)

{

.logo
{
width:75%;
}

}
#flux
{
	font-family:arial;
	color:#000;
	font-size:150%;
}
.pbbradio
{
	text-align:center;
	max-width:150%;
		margin:auto;
}
</STYLE>


</HEAD>
<BODY>
<div class="pbbradio">

<CENTER>
<IMG SRC="/img/pbb.png" class="logo">
<BR>
<audio controls="" autoplay="true" name="media" style="height:70px; width:250px;"><source src="https://pbbradio.com:8443/128" type="audio/aac"></audio>
<BR><BR>



<script src="/js/jquery-3.6.0.js" type="text/javascript"></script>
<script>
$(document).ready(function(){

$("#flux").load('pbbstream.php');


setInterval(function(){
$("#flux").load('pbbstream.php')
}, 10000);
});
</script>
<div id="flux"></div>

<BR>
<A HREF="https://pbbradio.com:8443/128" target="_blank"  style="font-family:arial; color:#8b8b8b; font-size:90%;">pbbradio.com:8443</A> - <A HREF="https://www.laurentgarnier.com/" target="_blank" style="color:#8b8b8b;  font-size:90%;">laurentgarnier.com</A>
<BR>
<BR>
</center>
</div>
</BODY>
</HTML>