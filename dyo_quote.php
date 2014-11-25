<?php

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
?>

<div style="float:left; width:320px; margin-left: 5px;">

  <form id="topform" class="general-form request-quote-form" method="POST" action="/dyo.php">

    <div style="display: none">
      <input name="stepc" type="hidden" value="done">
      <input type="hidden" name="tub" value="<?=$tub?>">
      <input type="hidden" name="jets" value="<?=$jets?>">
      <input type="hidden" name="location" value="<?=$location?>">
      <input type="hidden" name="tcolor" value="<?=$tcolor?>">
      <input type="hidden" name="bcolor" value="<?=$bcolor?>">
      <input type="hidden" name="stereo" value="<?=$stereo?>">
      <input type="hidden" name="led" value="<?=$led?>">
      <input type="hidden" name="steps" value="<?=$steps?>">
      <input type="hidden" name="ozonators" value="<?=$ozonators?>">
      <input type="hidden" name="coverlifters" value="<?=$coverlifters?>">
    </div>

    <table border="0" cellpadding="0" cellspacing="0" bgcolor="#e5e5e5">
      <tr>
        <td>
          <h2 class="custom-font" style="font-size:18px; font-weight:bold; color:#0278c0;">
            Request Pricing, DVD, Brochure & $1000 Coupon
          </h2>
        </td>
      </tr>

      <tr>
        <td>
          Fill out the form to request pricing and receive a ThermoSpas Brochure and DVD.
        </td>
      </tr>

      <tr>
        <td><input name="name" type="text" class="required defaultInvalid" value="Your Name *" /></td>
      </tr>

      <tr>
        <td><input name="address1" type="text" value="Your Address" /></td>
      </tr>

      <tr>
        <td><input name="city" type="text" value="Your City" /></td>
      </tr>

      <tr>
        <td >
          <select name="state" id="state" maxlength="10">
          <? if ($gotstate == "y") { ?>
            <option selected="selected" value="<?=$_REQUEST['state']?>">
            <?=$_REQUEST['state']?>
            </option>
          <? } else { ?>
            <option selected="selected" value="ZZZ">Choose Your State</option>
            <option value="AK">AK</option>
            <option value="AL">AL</option>
            <option value="AR">AR</option>
            <option value="AZ">AZ</option>
            <option value="CA">CA</option>
            <option value="CO">CO</option>
            <option value="CT">CT</option>
            <option value="DC">DC</option>
            <option value="DE">DE</option>
            <option value="FL">FL</option>
            <option value="GA">GA</option>
            <option value="HI">HI</option>
            <option value="IA">IA</option>
            <option value="ID">ID</option>
            <option value="IL">IL</option>
            <option value="IN">IN</option>
            <option value="KS">KS</option>
            <option value="KY">KY</option>
            <option value="LA">LA</option>
            <option value="MA">MA</option>
            <option value="MD">MD</option>
            <option value="ME">ME</option>
            <option value="MI">MI</option>
            <option value="MN">MN</option>
            <option value="MO">MO</option>
            <option value="MS">MS</option>
            <option value="MT">MT</option>
            <option value="NC">NC</option>
            <option value="ND">ND</option>
            <option value="NE">NE</option>
            <option value="NH">NH</option>
            <option value="NJ">NJ</option>
            <option value="NM">NM</option>
            <option value="NV">NV</option>
            <option value="NY">NY</option>
            <option value="OH">OH</option>
            <option value="OK">OK</option>
            <option value="OR">OR</option>
            <option value="PA">PA</option>
            <option value="RI">RI</option>
            <option value="SC">SC</option>
            <option value="SD">SD</option>
            <option value="TN">TN</option>
            <option value="TX">TX</option>
            <option value="UT">UT</option>
            <option value="VA">VA</option>
            <option value="VT">VT</option>
            <option value="WA">WA</option>
            <option value="WI">WI</option>
            <option value="WV">WV</option>
            <option value="WY">WY</option>
          <? } ?>
          </select>
        </td>
      </tr>

      <tr>
        <td ><input name="zip" type="text" class="required defaultInvalid" value="Your Zip Code *" /></td>
      </tr>

      <tr>
        <td><input name="phone" type="text" class="required defaultInvalid phone" value="Your Phone *" placeholder="Your Phone *" /></td>
      </tr>

      <tr>
        <td><input name="email" type="text" class="required defaultInvalid" value="Your Email *" /></td>
      </tr>

      <tr>
        <td><button type="submit" class="primary-button">GET MY QUOTE</button></td>
      </tr>

    </table>

  </form>


  <script type="text/javascript" src="<?=get_bloginfo('template_directory');?>/js/jquery.validate.min.js"></script>
  <script type="text/javascript" src="<?=get_bloginfo('template_directory');?>/js/additional-methods.min.js"></script>
  <script type="text/javascript" src="<?=get_bloginfo('template_directory');?>/js/request-quote-form.js"></script>
  <script type="text/javascript">
      var __ss_noform = __ss_noform || [];
      __ss_noform.push(['baseURI', 'https://app-PLBR48.sharpspring.com/webforms/receivePostback/MzQyNQAA/']);
      __ss_noform.push(['endpoint', '2b2296e4-c022-41ef-a3d3-11f7568526d6']);
      __ss_noform.push(['validate', validateForm]);
  </script>
  <script type="text/javascript" src="https://koi-PLBR48.sharpspring.com/client/noform.js?ver=1.0"></script>

</div>

<div style="float:left; width:520px; margin-left: 5px;">

  <?php include ("dyo_tub.php"); ?>

</div>