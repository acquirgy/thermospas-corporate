<?
$tub = $_REQUEST['tub'];
$jets = $_REQUEST['jets'];
$location = $_REQUEST['location'];
$tcolor = $_REQUEST['tcolor'];
$bcolor = $_REQUEST['bcolor'];
?>
<style type="text/css">
<!--
#girls {
	position: absolute;
	z-index: 1;
}
#tub1, #tub2, #tub3 {
	position:absolute;
	width:400px;
	height:399px;
	visibility: hidden;
	z-index:1;
}
#indoors, #outdoors {
	position:absolute;
	visibility: hidden;
	width:295px;
	z-index:1;
	margin-top:10px;
}
#tub0 {
	position:absolute;
	width:400px;
	height:399px;
	z-index:1;
}
#girl0, #girl1, #girl2, #girl3, #girl4, #girl5 {
	position:absolute;
	width:400px;
	height:399px;
	visibility: hidden;
	z-index:2;
}
#dyo input, select {
background-color:#FFFFFF;
background-image:url(images/form_element_b.gif);
background-repeat:repeat-x;
border-color:#CCCCCC rgb(153, 153, 153) rgb(153, 153, 153) rgb(204, 204, 204);
border-style:double;
border-width:1px;
color:#333333;
font-family:Verdana,Helvetica,Arial,sans-serif;
font-weight:bold;
padding:2px;
font-size:11px;
}
-->
</style>

<script type="text/javascript">
function check(mylayer)
{
document.getElementById(mylayer).style.color='#085DAD';
}
</script>
<div style="margin-bottom:10px;"><strong>Select some additional options that may interest you.</strong></div>
<span class="article_separator">&nbsp;</span>
<table border="0" cellspacing="5" cellpadding="5" width="930" height="430" id="dyo">
  <form action="http://www.thermospas.com/dyo.php" method="post">
    <tr>
      <td align="left" valign="top" width="200"><div><strong>Select Additional Options</strong>:<br>
          <table border="0" cellspacing="2" cellpadding="2">
            <tr>
              <td><input name="stereo" type="radio" value="y" onclick="check('st')"></td>
              <td><label  onclick="check('st')"><strong>Deluxed Stereo</strong></label></td>
            </tr>
            <tr>
              <td><input name="led" type="radio" value="y" onclick="check('ld')"></td>
              <td><label onclick="check('st')"><strong>LED Lighting </strong></label></td>
            </tr>
            <tr>
              <td><input name="jets" type="radio" value="y" onclick="check('oz')"></td>
              <td><label onclick="check('st')"><strong>Ozonators</strong></label></td>
            </tr>
            <tr>
              <td><input name="steps" type="radio" value="y" onclick="check('ste')"/></td>
              <td><label onclick="check('st')"><strong>Step Packages </strong></label></td>
            </tr>
            <tr>
              <td><input name="lifters" type="radio" value="y" onclick="check('cl')"/></td>
              <td><label onclick="check('st')"><strong>Coverlifters</strong></label></td>
            </tr>
          </table>
        </div>
        <span style="margin-top:20px;">
        <input type="submit" name="submit" value="Step 5 of 5: Quote!" style="width:200px;"/>
        </span></td>
      <td align="left" valign="top"><p><span id="st"><strong>ThermoSpas Stereo Packages</strong></span><br />
        There are many stereo packages and variations for each ThermoSpa.  In order to completely customize your stereo system and ThermoSpa, it is necessary to work with a ThermoSpa representative to accurately design the spa and stereo package for you.</p>
        <p><span id="ld"><strong>LED Lighting Packages</strong></span><br />
          LED Lighting is a great and easy way to enchance your ThermoSpas experience.  We have a variety of lighting packages to choose from that will greatly enhance your ThermoSpa.</p>
        <p><span id="oz"><strong>ThermOzone Ozonator</strong></span><br />
          Ozone is a &quot;natural&quot; purifier.  Ozone is the most powerful oxidizer and disinfectant that can be safely used in spas.  It does its job by instantly oxidizing unwanted bacteria, mold, spores, cysts, mildew and viruses up to 3,000 times more quickly than chlorine or bromine.<br />
        Thermozone is the safest and most powerful ozone purification system in the world.  It produces more than 8x more ozone per hour the standard ozonators so it dramatically reduces the frequency and the quantity of the sanitizer required for your hot tub.  Speak to a representative to learn about the additional benefits of ThermOzone.</p>
        <p><span id="ste"><strong>Step and Cabinet Add-on Packages</strong></span><br />
ThermoSpas is the only hot tub manufacturer that designs and customizes their own wrap around step and cabinet add-on packages.  Work with our factory trained representatives to choose the look thatcompletes your custom hot tub package.</p>
        <p><span id="cl"><strong>Cover Lifters</strong></span><br />
      Many hot tub owners have difficulty removing and replacing their cover all by themselves.  ThermoSpas offers a variety of easy to use and efficient cover lifters which allow you to remove and replace the cover simply and easily. </p></td>
    </tr>
    <input type="hidden" name="tub" value="<?=$tub?>">
    <input type="hidden" name="jets" value="<?=$jets?>">	
    <input type="hidden" name="location" value="<?=$location?>">
	<input type="hidden" name="tcolor" value="<?=$tcolor?>">
    <input type="hidden" name="bcolor" value="<?=$bcolor?>">		
	<input type="hidden" name="stepc" value="4">
  </form>
</table>
