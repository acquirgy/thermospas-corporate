<?
$dbname = "thermosp_thermospascom";
$db = mysql_connect("localhost", "thermosp_tscom", "*tscom07");
$stepc = $_REQUEST['stepc'];
$tub = $_REQUEST['tub'];
$jets = $_REQUEST['jets'];
$location = $_REQUEST['location'];
$tcolor = $_REQUEST['tcolor'];
$bcolor = $_REQUEST['bcolor'];
$stereo = $_REQUEST['stereo'];
$led = $_REQUEST['led'];
$steps = $_REQUEST['steps'];
$ozonators = $_REQUEST['ozonators'];
$coverlifters = $_REQUEST['coverlifters'];


switch ($_REQUEST['tub']) {
	case "23":
	$thistub = "Gemini";
	break;
	case "34":
	$thistub = "Atlantis";
	break;
	case "45":
	$thistub = "Concord";
	break;
	case "56":
	$thistub = "Park Ave";
	case "swim":
	$tub_name = "Swim Spas";
	$tub_type = "Fitness Series Spas";
	$tub_thumb = "swimspa-final.jpg";
	break;
	case "exercise":
	$tub_name = "Aquacisor and Exercise Spas";
	$tub_type = "Fitness Series Spas";
	$tub_thumb = "exercise-final.jpg";
	break;
	case "swimexercise":
	$tub_name = "Swim Spas, Aquacisor, and Exercise Spas";
	$tub_type = "Fitness Series Spas";
	$tub_thumb = "swimexercise-final.jpg";
	break;
}
switch ($jets) {
	case "s":
	$tub_class = "Silver";
	break;
	case "g":
	$tub_class = "Gold";
	break;
	case "p":
	$tub_class = "Platinum";
	break;
	case "d":
	$tub_class = "Diamond";
	break;
}

if ($tub != "swim" || $tub != "exercise" || $tub != "swimexercise") {

$sql = "SELECT * from `tub_config` where tub_class = '".$tub_class."' and tub_name = '$thistub'";
$result = MySQL($dbname,$sql);
while ($t = mysql_fetch_array ($result)) {
	$tub_type = $t['tub_type'];
	$tub_name = $t['tub_name'];
	$jets_range = $t['jets_range'];
	$tub_series = $t['tub_series'];
	$tub_image = $t['tub_image'];
	$tub_thumb = $t['tub_thumb'];
	$tub_price = $t['tub_price'];
	$range_start = $t['range_start'];
	$range_end = $t['range_end'];
	$range_between = $t['range_between'];
	$tub_includes = $t['tub_includes'];
	$additional = "";
	if (strlen($location) > 1) {
		$additional .= "<b>Hot Tub Location</b>: $location<BR>\n";
	}
	if (strlen($tcolor) > 1) {
		$additional .= "<b>Hot Tub Shell</b>: ".ucwords($tcolor)."<br>\n";
	}
	if (strlen($bcolor) > 1) {
		$additional .= "<b>Cabinet</b>: ".ucwords($bcolor)."<br>\n";
	}
	if ($stereo == "y") {
		$additional .= "* <b>Deluxed Stereo</b>: Interested<br>\n";
	}
	if ($steps == "y") {
		$additional .= "* <b>Steps and Cabinet Addons</b>: Interested<br>\n";
	}
	if ($led == "y") {
		$additional .= "* <b>Led Lighting Package</b>: Interested<br>\n";
	}
	if ($ozonators == "y") {
		$additional .= "* <b>Ozonator</b>: Interested<br>\n";
	}
	if ($coverlifters == "y") {
		$additional .= "* <b>Cover Lifter</b>: Interested<br>\n";
	}	// GET BASE
	$sqlt = "SELECT `range_start`,`range_end`,`avg_price` from `tub_config` where tub_name = '$tub_name' AND base = 'y'";
	$resultt = MySQL($dbname,$sqlt);
	while ($tt = mysql_fetch_array ($resultt)) {
		$start_range_start = $tt['range_start'];
		$start_range_end = $tt['range_end'];
		$avg_price = $tt['avg_price'];
	}
}

}
?>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td align="left" valign="top" class=""><h2 class="custom-font" style="font-size:18px; font-weight:bold; color:#0278c0;">Your Hot Tub Design Summary:</h2>
        <div style="margin-top: 0px; margin-bottom: 2px;"> These are the features and specifications you have just chosen. </div></td>
    </tr>
    <tr>
      <td align="left" valign="top" class="" style="width:40%;">
        <? if ($tub != "swim" && $tub != "exercise" && $tub != "swimexercise") { ?>
    		<p>Photo #1 - click to enlarge </p>
    		<div style="border-width:0px; float: left; width: 210px; margin-right: 10px;" >
          <span id="tub_link">
      		  <a href="<?=$tub_image?>" target="_blank">
              <img src="<?=$tub_thumb?>" width="200" border="0" />
            </a>
      		</span>
        </div>
    		<? } else { ?>
    			<img src="/images/dyo/<?=$tub_thumb?>" width="250" border="0" />
    		<? } ?>
        <div> <span id="summary"><br />
          <b>Hot Tub</b>:
          <?=$tub_name?> <?=$tub_type?>
          <? if ($tub != "swim" && $tub != "exercise" && $tub != "swimexercise") { ?>
  		      <br />
            <b>Range of Jets</b>:
            <?=$jets_range?>
            <br />
            <?=$additional?>
	        <? } ?>
          </span>
        </div>
      </td>
    </tr>
    <tr>
      <td align="left" valign="top" class=""><strong><br />
        Included Features:</strong>
        <ul>
          <span id="tub_includes">
          <li><a href="http://www.thermospas.com/features/thermoboard.php" target="_blank">ThermoBoard Cabinetry</a></li>
          <li><a href="http://www.thermospas.com/features/spa-filter.php" target="_blank"> ThermoFiltration Independent filtering system</a></li>
          <li> <a href="http://www.thermospas.com/features/covers.php">ThermoCover insulated hard cover</a></li>
          <li> <a href="http://www.thermospas.com/features/insulation.php" target="_blank">Full multi-layer ThermoInsulation &amp; Soundproofing package</a></li>
          <li><a href="http://www.thermospas.com/features/pumpsheaters.php" target="_blank">Titanium Heater Coil</a></li>
          <li><a href="http://www.thermospas.com/features/pumpsheaters.php" target="_blank">Pumps with Viton Seals</a></li>
          <li><a href="http://www.thermospas.com/features/tct.php" target="_blank">Total Control Therapy</a> </li>
          <li>Microban anti-microbial plumbing lines</li>
          <li>Patented Air Venturi Controls</li>
          </span><span id="tubinc">
          <?=$tub_includes?>
          </span>
        </ul>
        <div style="font-size:9px; margin-top: 4px;">* Price not included in MSRP</div></td>
    </tr>
  </table>