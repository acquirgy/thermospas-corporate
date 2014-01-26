<?
$dbname = "thermosp_thermospascom";
$db = mysql_connect("localhost", "thermosp_tscom", "*tscom07");
$tub = $_REQUEST['tub'];
$fname = $_REQUEST['fname'];
$lname = $_REQUEST['lname'];
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

$sql = "SELECT tub_thumb from `tub_config` where tub_name = '$thistub' ORDER BY onsale_price DESC limit 1";
$result = MySQL($dbname,$sql);
while ($t = mysql_fetch_array ($result)) {
	$tub_name = $t['tub_name'];
	$tub_thumb = $t['tub_thumb'];
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
	font-size: 15px;
	font-weight: bold;
}
.style4 {font-weight: bold}
.style5 {color: #18A1F0; font-size:14px; font-weight:bold;}
.style6 {color: #4FA640}
.style7 {
	color: #004591;
	font-weight: bold;
	font-family: "Courier New", Courier, monospace;
	font-size: 18px;
}
.style8 {font-size: 15px; font-weight: bold; color: #AA1428; }
-->
</style>
<table border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="200" valign="top" style="padding:6px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="left" valign="top">
            <div> <span id="tub_link"><img src="<?=$tub_thumb?>" width="200" border="0" /></span> </div></td>
        </tr>
        <tr>
          <td align="left" valign="top">ThermoSpas has many other <?=$tub_type?> available. To learn about these hot tubs and these special savings, call us!          </td>
        </tr>
    </table></td>
    <td valign="top" style="padding:6px;"><table border="0" id="omtub" style="border:solid 2px #e7e7e8">
        <tr>
          <td bgcolor="#d0f0ff" nowrap="NOWRAP"><strong>Model</strong></td>
          <td bgcolor="#d0f0ff" nowrap="NOWRAP"><strong>Package</strong></td>
          <td bgcolor="#d0f0ff" nowrap="NOWRAP"><strong>Dealer Direct </strong></td>
          <td bgcolor="#d0f0ff" nowrap="NOWRAP"><span class="style1">ON SALE NOW! </span></td>
        </tr>
        <?
$sql = "SELECT * from `tub_config` where tub_name = '$thistub'";
$result = MySQL($dbname,$sql);
$i = 0;
while ($t = mysql_fetch_array ($result)) { 
if ($i % 2 == 1) {
	$td1 = "#f3f3f4";
	$td2 = "#FFFFFF";
} else {
	$td1 = "#e7e7e8";
	$td2 = "#f3f3f4";
}
$tub_type = $t['tub_type'];
$tub_name = $t['tub_name'];
?>
        <tr>
          <td nowrap="nowrap" bgcolor="#fafafb"><?=$t['tub_name']?></td>
          <td nowrap="nowrap" bgcolor="#fafafb"><?=$t['tub_class']?></td>
          <td nowrap="nowrap" bgcolor="<?=$td1?>"><span class="style4">
            <?="$".number_format($t['fd_price'])?>
          </span></td>
          <td nowrap="nowrap" bgcolor="<?=$td2?>"><span style="color:#AA1428; font-size:18px; font-weight:bold;">
            <?="$".number_format($t['onsale_price'])?>
          </span></td>
        </tr>
        <? 
$i++;
} ?>
        
      </table>      </td><td rowspan="2" valign="top" style="padding:6px; width:350px;"><div style="width:100%; text-align:center; padding:3px; background-color:#FFFFE1"><span class="style7">NOTICE -
      NO DEALER AREA</span></div>
      <p class="style8">Hot Tubs On Sale Now at Pre-Dealer Pricing</p>
      <p><img src="images/alert.jpg" width="50" height="50" align="left" />ThermoSpas is in discussions with a dealer in your area and  expect to open a showroom by December, 2008. Until then you have an opportunity to  save money by working with us and buying your hot tub direct from the  manufacturer. We&rsquo;ll also arrange delivery and service by factory trained  professional service techs:</p>
      <ul class="star">
        <li><strong>Dramatic savings buying now!</strong></li>
        <li><strong>Deal direct with manufacturer</strong></li>
        <li><strong>Learn about all other models</strong></li>
        <li><strong>Still receive Local Service and Installation</strong></li>
      </ul>
	  <div style="font-size:15px; font-weight:bold; color:#aa1428">
	    <div align="center">To order now or learn about other available models and discounts, call us!</div>
	  </div>
	  <div style="font-size:36px; font-weight:bold; color:#18a1f0; margin-top:16px;">
	    <div align="center">1-800-876-0158</div>
	  </div></td>
  </tr>
  <tr>
    <td colspan="2" valign="top" style="padding:6px;"><p><strong>Dealer Direct Pricing &ndash; Benefits</strong></p>
      <p>Buy from a ThermoSpas dealer and you&rsquo;ll receive the best  value for your money. Our dealers offer the best built, most efficient hot tubs  in the world At your local showroom you&rsquo;ll receive guidance from a hot tub  expert and be able to experience a ThermoSpas hot tub first hand.</p>
      <ul class="check">
        <li><strong>See, Touch and Experience!</strong></li>
        <li><strong>Compare a variety of hot tubs </strong></li>
        <li><strong>Buy locally</strong></li>
        <li><strong>Local Delivery and Installation </strong></li>
      </ul>
      <p class="style2 style6">Estimated dealer open date: December 2008 **</p>
      <div style="text-align:center">
        <div style="font-size:15px; font-weight:bold; color:#aa1428"></div>
        <p class="style6"><em>**After Decemeber, these savings will no longer be available.</em></p>
    </div></td>
  </tr>
</table>
