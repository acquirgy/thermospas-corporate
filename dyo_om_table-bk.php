<?
$dbname = "thermosp_thermospascom";
$db = mysql_connect("localhost", "thermosp_tscom", "*tscom07");
$tub = $_REQUEST['tub'];
$fname = $_REQUEST['fname'];
$lname = $_REQUEST['lname'];
switch ($tub) {
	case "23":
	$thistub = "Gemini";
	$img = "gemini_plat.jpg";
	$copy = "One of ThermoSpas’ 2 person spas is The Gemini. The Gemini fits where other spas can't. This two person hot tub may be customized with built-in pillows and many other amenities of a full size spa. The Gemini is considered the perfect spa for personal relaxation yet offers room enough for two. Each side offers a slightly different seating design and jet configuration. Each seating area is contoured for deep soaking, so even the tallest bather can stretch out and enjoy a neck, shoulder, or foot massage. ";
	$other = "";
	break;
	case "34":
	$thistub = "Atlantis";
	$img = "atlantis_gold.jpg";
	$copy = "Once the Atlantis is discovered, most stop searching for the ideal spa because the Atlantis is among the hot tub industry's very best values. This mid-size spa for four, offers bathers 5 unique seating areas: a roomy, elongated lounge with arm rests for comfortable seating, a deep therapy seat with lumbar support and room to stretch your legs, a bi-level bench offers a choice of two seating depths, and a cool-down seat provides relief from the warm water or a place for a young guest. The angled control panel is ergonomically designed so it's easy to view and operate the spa.";
	$other = "";
	break;
	case "45":
	$thistub = "Concord";
	$img = "concord_plat.jpg";
	$copy = "Considered the ideal mid-sized hot tub, the Concord fits four adults perfectly, yet it easily accommodates five. Two luxurious therapy seats, each with wrap around arm rests and built-in pillows, are angled toward each other to allow for relaxing conversation. One therapy seat may be customized for deep or standard seating depth. For those looking for intimacy, the adjacent love seat provides a place to stretch out and relax, or slide close to cuddle. For personal serenity, slip into the corner therapy seat for a relaxing back massage.";
	$other = "";
	break;
	case "56":
	$thistub = "Park Ave";
	$img = "parkave_diamond.jpg";
	$copy = "The Park Avenue is often called the perfect full size hot tub. It has double wide, reversible lounge with large, soft, textured pillows on both ends allows bathers to lie side by side or stretch out face to face. At the opposite end of the spa are two perfectly contoured therapy seats, each with wrap-around armrests and built-in pillows. The center of the spa features a deep foot well and a seating area positioned to face one of ThermoSpas powerful whirlpool jets guaranteed to relax the most tired muscles.";
	$other = "";
	break;
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
-->
</style>
<table border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top" style="padding:6px;"><table border="0" id="omtub" style="border:solid 2px #e7e7e8">
        <tr>
          <td bgcolor="#d0f0ff" nowrap="nowrap"><strong>Model</strong></td>
          <td bgcolor="#d0f0ff" nowrap="nowrap"><strong>Package</strong></td>
          <td bgcolor="#d0f0ff" nowrap="nowrap"><strong>Dealer Direct </strong></td>
          <td bgcolor="#d0f0ff" nowrap="nowrap"><span class="style1">ON SALE NOW! </span></td>
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
          <td bgcolor="#fafafb"><?=$t['tub_name']?></td>
          <td bgcolor="#fafafb"><?=$t['tub_class']?></td>
          <td bgcolor="<?=$td1?>"><?="$".number_format($t['fd_price'])?></td>
          <td bgcolor="<?=$td2?>"><span style="color:#AA1428; font-size:18px; font-weight:bold;"><?="$".number_format($t['onsale_price'])?></span></td>
        </tr>
        <? 
$i++;
} ?>
        <tr>
          <td colspan="4" style="border-top:solid 1px #e7e7e8"><p><strong>Dear
              <?=$fname?>
              <?=$lname?>, </strong><br>
              Thank you for spending time with us today designing your own hot tub and allowing us to prepare a quote for you.  Because you are in a unique area, we have some good and better news for you!</p>
            <p><strong>Good News!<br>
              </strong>ThermoSpas is negotiating with a dealer in your area where you can buy a hot tub at factory direct prices and see, touch, experience your new hot tub </p>
            <p><strong>Better News!<br>
              </strong>Since we don't have a dealer open in your area now, you can buy now and save $1,000s of dollars off our everyday low factory direct pricing on any model listed above. Call our sales department at to learn more about this unique and special offer.</p>
            <p>Once a dealer is open in your area, you can still receive our low factory direct pricing, but the offer to save $1,000s of dollars of a brand new ThermoSpas Hot Tub will end. </p>
			<div align="center"><div style="font-size:18px; font-weight:bold; color:#aa1428">Call us now for these special savings!</div><br />
			<span style="font-size:36px; font-weight:bold; color:#18a1f0">1-800-876-0158</span>
			</div>
			</td>
        </tr>
      </table></td>
    <td valign="top" style="padding:6px;">
	<div style="margin-bottom:15px;"><span style="font-size:18px; font-weight:bold;"><?=$tub_name?>: <?=$tub_type?></span>
	<div><?=$copy?></div>
	</div>
	<img src="/08/images/dyo/<?=$img?>"></td>
  </tr>
</table>
