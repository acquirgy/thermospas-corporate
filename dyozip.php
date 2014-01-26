<?
//echo $_COOKIE['zip'];
//echo $_COOKIE['IMOM'];
//$_SERVER['QUERY_STRING']
if ($_COOKIE['IMOM'] == "IM") { ?>
<div class="mod-default">
<div class="module default">
  <div class="module-2">
    <div class="module-3">
      <div class="module-4 deepest">
        <h3 class="module"><span class="module-2"><span class="module-3"><span class="color">Great News!!!</span></span></span></h3>
        <p style="font-weight: bold">Factory Direct is available in your area along with a $1000 savings coupon!  Other offers and specials may be available during your time of purchase. </p>
        <p><b>Design your own hot tub now to receive a quote and your $1000 savings coupon!</b></p>
      </div>
    </div>
  </div>
</div>
<? } else if ($_COOKIE['IMOM'] == "OM") { ?>
<table border="0" cellspacing="6" cellpadding="6">
  <tr>
    <td width="50%" align="left" valign="top"><div class="mod-color">
      <div class="module green">
        <div class="module-2">
          <div class="module-3">
            <div class="module-4 deepest">
              <h3 class="module"><span class="module-2"><span class="module-3"><span class="color">Good News!!</span></span></span></h3>
              <p style="font-weight: bold">ThermoSpas is in negotiations with a dealer in your area opening in December, 2008. When the dealer is open, you can view, touch, and experience ThermoSpas Hot Tubs</p>
            </div>
          </div>
        </div>
      </div></td>
    <td width="50%" align="left" valign="top"><div class="mod-color">
      <div class="module blue">
        <div class="module-2">
          <div class="module-3">
            <div class="module-4 deepest">
              <h3 class="module"><span class="module-2"><span class="module-3"><span class="color">Better News!!</span></span></span></h3>
              <p style="font-weight: bold">Because we haven't opened a dealer yet, you can buy at our special ON SALE NOW price until December.  This offer is ONLY available until the dealer showroom is open!</p>
            </div>
          </div>
        </div>
      </div></td>
  </tr>
</table>
<h2 align="center">Design your own hot tub now and receive the EXACT ON SALE NOW price on your new hot tub!</h2>
<? } else { ?>
<? } ?>
