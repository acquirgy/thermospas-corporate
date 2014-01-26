<style type="text/css">
<!--
input.textf {
	font-family: Arial, Helvetica, sans-serif !IMPORTANT;
	font-size: 11px !IMPORTANT;
	color: #333333 !IMPORTANT;
	width: 280px !IMPORTANT;
	padding: 3px !IMPORTANT;
	text-align: left !IMPORTANT;
	margin: 5px !IMPORTANT;
	height: 30px !IMPORTANT;
	background-color:#FFFFFF !IMPORTANT;
}
-->
</style>
<div style="margin-top:40px;">
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="margin:0px;">
    <tr>
      <td align="right" valign="top" style="vertical-align:top"><table width="300" height="367" border="0" cellpadding="0" cellspacing="0" bgcolor="#e5e5e5" style="vertical-align:top; background-color:#e5e5e5; background-image:url('http://www.thermospas.com/slides/tbbg.jpg'); background-repeat:repeat-x; padding:5px; border:solid 1px #CCCCCC;">
        <form id="topform">
        <tr>
          <td style="padding:8px;"><h3 class="custom-font" style="font-size:18px; font-weight:bold">Download our Hot Tub Buying Guide, ThermoSpas DVD & Brochure</h3></td>
        </tr>
        <tr>
          <td style="padding:8px;">Simply fill out the form below and download a 50 pg Hot Tub Buying Guide, ThermoSpas Brochure and DVD. </td>
        </tr>
        <tr>
          <td align="center"><input name="name" type="text" class="textf" value="Your Name *"></td>
        </tr>
        <tr>
          <td align="center"><input name="email" type="text" class="textf" value="Your Email *"></td>
        </tr>
        <tr>
          <td align="center"><input name="zip" type="text" class="textf" value="Your Zip Code *"></td>
        </tr>
        <tr>
          <td align="center"><img src="slides/download.jpg" alt="Download"></td>
        </tr>

        <tr>
          <td>&nbsp;</td>
        </tr></form>
      </table></td>
      <td width="610" align="left" valign="top"><script type='text/javascript' src='/mediaplayer/jwplayer.js'></script>
        <div id='mediaplayer'></div>
        <script type="text/javascript">
jwplayer("mediaplayer").setup({
flashplayer: "/mediaplayer/player.swf",
width: 600,
height: 367,
file: "http://www.youtube.com/watch?v=<?=$video_id?>",
<? if (1==2) { ?>controlbar: "bottom",<? } ?>
stretching: "fill",
<? if (1==1) { ?>skin: "/mediaplayer/skins/stormtrooper.zip",<? } ?>
<? if (1==2) { ?>skin: "/mediaplayer/skins/nemesis.zip",<? } ?>
image: "http://www.thermospas.com/slides/<?=$video_image?>"
});
</script></td>
    </tr>
    <tr>
      <td colspan="2" style="text-align:center; padding-top:15px;"><img src="http://www.thermospas.com/slides/shadow.jpg" width="962" height="38" /></td>
    </tr>
  </table>
</div>
