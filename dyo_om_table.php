<?

$dbname = "thermosp_thermospascom";

$db = mysql_connect("localhost", "thermosp_tscom", "*tscom07");

$tub = $_REQUEST['tub'];

$fname = $_REQUEST['fname'];

$lname = $_REQUEST['lname'];

$email = $_REQUEST['email'];

$jets = $_REQUEST['jets'];

$correcte = $_REQUEST['correcte'];

$nextmonth = date("F, Y", mktime(0, 0, 0, date("m")+1  , date("d"), date("Y")));



switch($jets) {

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



switch ($tub) {

	case "23":

	$thistub = "Gemini";

	$tub_type = "2-3 Person Hot Tub";

	$img = "gemini_plat.jpg";

	$copy = "One of ThermoSpas’ 2 person spas is The Gemini. The Gemini fits where other spas can't. This two person hot tub may be customized with built-in pillows and many other amenities of a full size spa. The Gemini is considered the perfect spa for personal relaxation yet offers room enough for two. Each side offers a slightly different seating design and jet configuration. Each seating area is contoured for deep soaking, so even the tallest bather can stretch out and enjoy a neck, shoulder, or foot massage. ";

	$other = "";

	break;

	case "34":

	$thistub = "Atlantis";

	$tub_type = "3-4 Person Hot Tub";

	$img = "atlantis_gold.jpg";

	$copy = "Once the Atlantis is discovered, most stop searching for the ideal spa because the Atlantis is among the hot tub industry's very best values. This mid-size spa for four, offers bathers 5 unique seating areas: a roomy, elongated lounge with arm rests for comfortable seating, a deep therapy seat with lumbar support and room to stretch your legs, a bi-level bench offers a choice of two seating depths, and a cool-down seat provides relief from the warm water or a place for a young guest. The angled control panel is ergonomically designed so it's easy to view and operate the spa.";

	$other = "";

	break;

	case "45":

	$thistub = "Concord";

	$tub_type = "4-5 Person Hot Tub";

	$img = "concord_plat.jpg";

	$copy = "Considered the ideal mid-sized hot tub, the Concord fits four adults perfectly, yet it easily accommodates five. Two luxurious therapy seats, each with wrap around arm rests and built-in pillows, are angled toward each other to allow for relaxing conversation. One therapy seat may be customized for deep or standard seating depth. For those looking for intimacy, the adjacent love seat provides a place to stretch out and relax, or slide close to cuddle. For personal serenity, slip into the corner therapy seat for a relaxing back massage.";

	$other = "";

	break;

	case "56":

	$thistub = "Park Ave";

	$tub_type = "5-6 Person Hot Tub";

	$img = "parkave_diamond.jpg";

	$copy = "The Park Avenue is often called the perfect full size hot tub. It has double wide, reversible lounge with large, soft, textured pillows on both ends allows bathers to lie side by side or stretch out face to face. At the opposite end of the spa are two perfectly contoured therapy seats, each with wrap-around armrests and built-in pillows. The center of the spa features a deep foot well and a seating area positioned to face one of ThermoSpas powerful whirlpool jets guaranteed to relax the most tired muscles.";

	$other = "";

	break;

}



$sql = "SELECT * from `tub_config` where tub_class = '".$tub_class."' and tub_name = '$thistub' limit 1";

//echo $sql;

$result = MySQL($dbname,$sql);

while ($t = mysql_fetch_array ($result)) {

	$tub_type = $t['tub_type'];

		$tub_name = $t['tub_name'];

		$tub_series = $t['tub_series'];

		$tub_image = $t['tub_image'];

		$tub_thumb = $t['tub_thumb'];

		$tub_price = $t['tub_price'];

		$range_start = $t['range_start'];

		$range_end = $t['range_end'];

		$range_between = $t['range_between'];

		$tub_includes = $t['tub_includes'];

}



$sqlt = "SELECT `range_start`,`range_end`,`avg_price` from `tub_config` where tub_name = '$thistub' AND base = 'y'";

	$resultt = MySQL($dbname,$sqlt);

	while ($tt = mysql_fetch_array ($resultt)) {

		$start_range_start = $tt['range_start'];

		$start_range_end = $tt['range_end'];

		$avg_price = $tt['avg_price'];

	}



?>

<style type="text/css">

<!--

#omtub td {

	padding: 5px;

	font-size:14px;

}

.style1 {

	color: #AA1428;

	font-weight: bold;

}

.style2 {

	font-size: 17px;

	font-weight: bold;

}

.style6 {color: #4FA640}

.style7 {

	color: #004591;

	font-weight: bold;

	font-family: "Courier New", Courier, monospace;

	font-size: 20px;

}

.style8 {font-size: 17px; font-weight: bold; color: #AA1428; }

.bigger li {

	font-size:16px;

	font-weight: bold;

	margin: 6px 0px;

}

input, select {

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

.style9 {

	font-size: 14px;

	font-weight: bold;

	color:#18a1f0;

}

-->

</style>

<table border="0" cellpadding="0" cellspacing="0">

  <tr>

    <td colspan="2" valign="top" style="padding:6px;"><div style="width:100%; text-align:center; padding:3px; background-color:#FFFFE1"><span class="style7">

        <marquee behavior="alternate" direction="left" scrollamount="2">

        NO DEALER AVAILABLE IN YOUR AREA. YOU QUALIFY FOR ADDITIONAL DISCOUNTS

        </marquee>

        </span></div></td>

  </tr>

  <tr>

    <td width="50%" valign="top" style="padding:6px;"><table width="100%" border="0" id="omtub" style="border:solid 2px #e7e7e8">

        <tr>

          <td nowrap="nowrap" bgcolor="#fafafb"><strong>MSRP Range:</strong></td>

          <td width="100%" bgcolor="#fafafb"><span class="style8">

            <?=$range_start." - ".$range_end?>

            </span>*</td>

        </tr>

        <tr>

          <td nowrap="nowrap" bgcolor="#fafafb"><strong>Avg.  Price in 2008:</strong></td>

          <td width="100%" bgcolor="#fafafb"><span class="style8">

            <?=$avg_price?>

            </span></td>

        </tr>

        <tr>

          <td nowrap="nowrap" bgcolor="#fafafb"><strong>Lowest  Price:</strong></td>

          <td width="100%" bgcolor="#fafafb"><span class="style8">

            <?=$start_range_start?>

            </span></td>

        </tr>

        <tr>

          <td colspan="2" align="center" bgcolor="#fafafb">*MSRP Range Quoted does not include discounts and special offers that may be available to customers in non-dealer areas.</td>

        </tr>

      </table>     </td>

    <td width="50%" valign="top" style="padding:6px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">

        <tr>

          <td align="left" valign="top"><div><img src="<?=$tub_thumb?>" width="200" border="0" /></div></td>

          <td align="left" valign="top"><div style="margin-top:10px;"> <strong>

              <?=$tub_name?>

              :

              <?=$tub_type?>

              </strong><br />

              ThermoSpas has many other

              <?=$tub_type?>

              s available. To learn about these hot tubs and these special savings, call us!</div></td>

        </tr>

      </table></td>

  </tr>

  <tr>

    <td colspan="2" align="center" valign="top" style="padding:6px;"><hr width="95%" noshade="noshade" /></td>

  </tr>

  <tr>

    <td colspan="2" align="center" valign="top" style="padding:6px;"> <div style="font-size:18px; font-weight:bold; color:#aa1428">

        <div align="center">To order now or learn about other available models, discounts and local service and delivery, call us!</div>

      </div>

      <div style="font-size:36px; font-weight:bold; color:#18a1f0; margin-top:16px;">

        <div align="center">(888)-298-3698</div>

      </div></td>

  </tr>

  <tr>

    <td colspan="2" align="center" valign="top" style="padding:6px;"><hr width="95%" noshade="noshade" /></td>

  </tr>

  <tr>

    <td colspan="2" align="center" valign="top" style="padding:6px;"><a href="/thermospas-dvd.html"><strong>Download our lastest brochure and watch our DVD online! </strong><br />

      <img src="images/brochure.jpg" alt="Download Brochure" width="300" height="249" border="0" /></a></td>

  </tr>

</table>

