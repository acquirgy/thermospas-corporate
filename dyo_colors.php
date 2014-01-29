<script src="/showdiv.js" type="text/javascript"></script>

<?

$tub = $_REQUEST['tub'];

$jets = $_REQUEST['jets'];

$location = $_REQUEST['location'];

$tcolor = $_REQUEST['tcolor'];

$bcolor = $_REQUEST['bcolor'];

?>

<form action="dyo.php" method="post">

<input type="hidden" name="tub" value="<?=$tub?>">

<input type="hidden" name="jets" value="<?=$jets?>">

<input type="hidden" name="location" value="<?=$location?>">

<input type="hidden" name="stepc" value="3">

<table border="0" cellspacing="5" cellpadding="5" width="900" height="430" id="dyo">

  <tr>

    <td width="200" rowspan="3" align="left" valign="top" style="vertical-align:top"><div><strong>Shell Color</strong>:<br />

            <table border="0" cellspacing="2" cellpadding="2">

              <tr>

                <td style="vertical-align:top"><input name="tcolor" type="radio" value="emerald" id="emerald" /></td>

                <td style="vertical-align:top"><label for="emerald"><strong>Emerald</strong></label></td>

              </tr>

              <tr>

                <td style="vertical-align:top"><input name="tcolor" type="radio" value="black" id="black" /></td>

                <td style="vertical-align:top"><label for="black"><strong>Black Opal </strong></label></td>

              </tr>

              <tr>

                <td style="vertical-align:top"><input name="tcolor" type="radio" value="aquamarine" id="aquamarine" /></td>

                <td style="vertical-align:top"><label for="aquamarine"><strong>Aquamarine</strong></label></td>

              </tr>

              <tr>

                <td style="vertical-align:top"><input name="tcolor" type="radio" value="midnight" id="midnight" /></td>

                <td style="vertical-align:top"><label for="midnight"><strong>Midnight</strong></label></td>

              </tr>

              <tr>

                <td style="vertical-align:top"><input name="tcolor" type="radio" value="bluestone" id="bluestone" /></td>

                <td style="vertical-align:top"><label for="bluestone"><strong>Bluestone</strong></label></td>

              </tr>

              <tr>

                <td style="vertical-align:top"><input name="tcolor" type="radio" value="desertstone" id="desertstone" /></td>

                <td style="vertical-align:top"><label for="desertstone"><strong>Desertstone</strong></label></td>

              </tr>

            </table>

    </div>

      <div style="margin-top:20px;"><strong>Cabinet Color </strong>:<br />

            <table border="0" cellspacing="2" cellpadding="2">

               <tr>

                <td style="vertical-align:top"><input name="bcolor" type="radio" value="teak" id="ind" /></td>

                <td style="vertical-align:top"><label for="ind"><strong>Teak</strong></label></td>

              </tr>

              <tr>

                <td style="vertical-align:top"><input name="bcolor" type="radio" value="cherry"  id="ind" /></td>

                <td style="vertical-align:top"><label for="ind"><strong>Cherry</strong></label></td>

              </tr>

             <tr>

                <td style="vertical-align:top"><input name="bcolor" type="radio" id="outd" value="grey" checked="checked" /></td>

                <td style="vertical-align:top"><label for="outd"><strong>Grey</strong></label></td>

              </tr>

            </table>

        </div>      <div style="margin-top:20px;">

          <input type="submit" name="submit" value="Step 4 of 5: Options" style="width:200px;"/>

      </div></td>

    <td align="left" valign="top" style="vertical-align:top; width:350px"><h2 class="custom-font" style="font-size:23px; font-weight:bold">ThermoSpas Shell Colors </h2></td>

    <td align="left" valign="top" style="vertical-align:top"><h2 class="custom-font" style="font-size:23px; font-weight:bold">ThermoBoard Cabinets</h2></td>

  </tr>

  <tr>

    <td align="left" valign="top" style="vertical-align:top; width:350px"> The surface of a ThermoSpas shell is smooth and luxurious to the touch, yet durable enough to resist stress cracking and easily withstands temperature changes from minus 50&ordm;F up to 180&ordm; F.&nbsp; </td>

    <td align="left" valign="top" style="vertical-align:top"> ThermoBoard isn&rsquo;t wood. It&rsquo;s far better. It&rsquo;s a weatherproof synthetic designed to mimic the rich look and feel of wood without the needed maintenance.</td>

  </tr>

  <tr>

    <td align="left" valign="top" style="vertical-align:top; width:350px; padding:10px;" width="350">

	<img src="/wp-content/themes/majestics/timthumb.php?src=slides/shellcolors/white-pearl.jpg&w=150&h=120" style="float:left; padding:3px; border:solid 1px #CCCCCC; background-color:#f2f2f2; margin:5px;" /><img src="/wp-content/themes/majestics/timthumb.php?src=slides/shellcolors/oyster-opal.jpg&w=150&h=120" style="float:left; padding:3px; border:solid 1px #CCCCCC; background-color:#f2f2f2; margin:5px;" /><img src="/wp-content/themes/majestics/timthumb.php?src=slides/shellcolors/desert-stone.jpg&w=150&h=120" style="float:left; padding:3px; border:solid 1px #CCCCCC; background-color:#f2f2f2; margin:5px;" /><img src="/wp-content/themes/majestics/timthumb.php?src=slides/shellcolors/blue-stone.jpg&w=150&h=120" style="float:left; padding:3px; border:solid 1px #CCCCCC; background-color:#f2f2f2; margin:5px;" /><img src="/wp-content/themes/majestics/timthumb.php?src=slides/shellcolors/ocean-wave-opal.jpg&w=150&h=120" style="float:left; padding:3px; border:solid 1px #CCCCCC; background-color:#f2f2f2; margin:5px;" /><img src="/wp-content/themes/majestics/timthumb.php?src=slides/shellcolors/midnight-stone.jpg&w=150&h=120" style="float:left; padding:3px; border:solid 1px #CCCCCC; background-color:#f2f2f2; margin:5px;" /><img src="/wp-content/themes/majestics/timthumb.php?src=slides/shellcolors/mystic-emerald.jpg&w=150&h=120" style="float:left; padding:3px; border:solid 1px #CCCCCC; background-color:#f2f2f2; margin:5px;" /><img src="/wp-content/themes/majestics/timthumb.php?src=slides/shellcolors/midnight-opal.jpg&w=150&h=120" style="float:left; padding:3px; border:solid 1px #CCCCCC; background-color:#f2f2f2; margin:5px;" /><img src="/wp-content/themes/majestics/timthumb.php?src=slides/shellcolors/aqua-stone.jpg&w=150&h=120" style="float:left; padding:3px; border:solid 1px #CCCCCC; background-color:#f2f2f2; margin:5px;" />	</td>

    <td align="left" valign="top" style="vertical-align:top">

	<img src="/wp-content/themes/majestics/timthumb.php?src=slides/shellcolors/Burmese Teak.jpg&w=150" style="float:left; margin:5px;" /><img src="/wp-content/themes/majestics/timthumb.php?src=slides/shellcolors/American Cherry.jpg&w=150" style="float:left; margin:5px;" /><img src="/wp-content/themes/majestics/timthumb.php?src=slides/shellcolors/Nantucket Gray.jpg&w=150" style="float:left; margin:5px;" /></td>

  </tr>

  <input type="hidden" name="tub2" value="<?=$tub?>" />

  <input type="hidden" name="jets2" value="<?=$jets?>" />

  <input type="hidden" name="location2" value="<?=$location?>" />

  <input type="hidden" name="stepc2" value="3" />

</table>

</form>



