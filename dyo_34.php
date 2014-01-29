<style type="text/css">

<!--

#girls {

	position: absolute;

	z-index: 1;

}

#tub1, #tub2, #tub3, #tub4 {

	position:absolute;

	width:400px;

	height:398px;

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

	height:398px;

	z-index:1;

}

#girl0, #girl1, #girl2, #girl3, #girl4, #girl5 {

	position:absolute;

	width:400px;

	height:398px;

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

<div style="margin-bottom:10px;"><strong>Choose the range of hot tub jets and hot tub location</strong><br />

  Jets are the heart of your hot tub.  They pulse, swirl, rotate; some deliver just warm air bubbles.  Other jets may be configured to cycle on and off at the touch of a button.  From 6 to 160 jets, ThermoSpas consultants will help you choose just the right number, type, and pattern of jets for your needs</div>

<span class="article_separator">&nbsp;</span>

<table border="0" cellspacing="5" cellpadding="5" width="930" height="430" id="dyo">

  <form action="/dyo.php" method="post">

    <tr>

      <td align="left" valign="top" width="200"><div><strong>Number of jets range</strong>:<br>

          <table border="0" cellspacing="2" cellpadding="2">

            <tr>

              <td><input name="jets" type="radio" value="g" onClick="showdiv('tub1'),hidediv('tub2');" id="jg"></td>

              <td><label for="jg" onClick="showdiv('tub1'),hidediv('tub2');"><strong>36-42</strong></label></td>

            </tr>

            <tr>

              <td><input name="jets" type="radio" value="s" onClick="showdiv('tub2'),hidediv('tub1');" id="js"></td>

              <td><label for="js" onClick="showdiv('tub2'),hidediv('tub1');"><strong>30-35</strong></label></td>

            </tr>

          </table>

        </div>

        <div style="margin-top:20px;"><strong>Location of you hot tub</strong>:<br>

          <table border="0" cellspacing="2" cellpadding="2">

            <tr>

              <td><input name="location" type="radio" value="out" onClick="showdiv('outdoors'),hidediv('indoors');" id="outd"></td>

              <td><label for="outd" onClick="showdiv('outdoors'),hidediv('indoors');"><strong>Outdoors</strong></label></td>

            </tr>

            <tr>

              <td><input name="location" type="radio" value="in" onClick="showdiv('indoors'),hidediv('outdoors');" id="ind"></td>

              <td><label for="ind" onClick="showdiv('indoors'),hidediv('outdoors');"><strong>Indoors</strong></label></td>

            </tr>

          </table>

        </div>

		<div style="margin-top:20px;"><strong>Preview people</strong><br>

          <table border="0" cellspacing="2" cellpadding="2">

            <tr>

              <td><input name="people" type="radio" value="1"  onClick="showdiv('girl1'),hidediv('girl2'),hidediv('girl3'),hidediv('girl4');" id="p1"></td>

              <td><label for="p1" onClick="showdiv('girl1'),hidediv('girl2'),hidediv('girl3'),hidediv('girl4');"><strong>1</strong></label></td>

            </tr>

            <tr>

              <td><input name="people" type="radio" value="2" onClick="showdiv('girl2'),hidediv('girl1'),hidediv('girl3'),hidediv('girl4');" id="p2"></td>

              <td><label for="p2" onClick="showdiv('girl2'),hidediv('girl1'),hidediv('girl3'),hidediv('girl4');"><strong>2</strong></label></td>

            </tr>

            <tr>

              <td><input name="people" type="radio" value="3" onClick="showdiv('girl3'),hidediv('girl1'),hidediv('girl2'),hidediv('girl4');" id="p2"></td>

              <td><label for="p3" onClick="showdiv('girl3'),hidediv('girl1'),hidediv('girl2'),hidediv('girl4');"><strong>3</strong></label></td>

            </tr>

            <tr>

              <td><input name="people" type="radio" value="4" onClick="showdiv('girl4'),hidediv('girl1'),hidediv('girl3'),hidediv('girl2');" id="p2"></td>

              <td><label for="p4" onClick="showdiv('girl4'),hidediv('girl1'),hidediv('girl3'),hidediv('girl2');"><strong>4</strong></label></td>

            </tr>

          </table>

        </div>

        <div style="margin-top:20px;">

          <input type="submit" name="submit" value="Step 3 of 5: Colors" style="width:200px;"/>

        </div></td>

      <td align="left" valign="top" width="430"><div id="girl0"><img src="images/pixel.gif" alt="People in Hot Tub" width="400" height="398"></div>

        <div id="girl1"><img src="images/dyo/atlantis/girls/1.png" alt="People in Hot Tub" width="400" height="398"></div>

        <div id="girl2"><img src="images/dyo/atlantis/girls/2.png" alt="People in Hot Tub" width="400" height="398"></div>

        <div id="girl3"><img src="images/dyo/atlantis/girls/3.png" alt="People in Hot Tub" width="400" height="398"></div>

        <div id="girl4"><img src="images/dyo/atlantis/girls/4.png" alt="People in Hot Tub" width="400" height="398"></div>

        <div id="tub0"><img src="images/dyo/atlantis_gold.jpg" alt="3-4 Person Hot Tub" width="400" height="398" id="jetstub"></div>

        <div id="tub1"><img src="images/dyo/atlantis_gold.jpg" alt="3-4 Person Hot Tub" width="400" height="398" id="jetstub"></div>

        <div id="tub2"><img src="images/dyo/atlantis_silver.jpg" alt="3-4 Person Hot Tub" width="400" height="398" id="jetstub"></div>

       </td>

      <td align="left" valign="top"><strong>Customizable Options and Features</strong>

        <table border="0" cellspacing="0" cellpadding="0">

          <tr>

            <td><div > Number of Pumps<br />

                Number of Jets<br />

                Air Bubbling System<br />

                Titanium Heater<br />

                Viton Seals</div></td>

            <td><div>ThermoFiltration<br />

                ThermoInsulation<br />

                Total Control Therapy<br />

                LED Lighting<br />

                ThermOzone Ozonator</div></td>

          </tr>

        </table>

        <div id="outdoors"><strong>Hot Tub Outdoors</strong><br />

          The most popular location for hot tubs is outside. Thermospas technicians are specially trained to help answer questions about electrical requirements, deck loads, doorway clearances, building codes. What size hot tub will fit the best? Which spa cabinet color will best match the house siding? They can even arrange for crane deliveries if needed! </div>

        <div id="indoors"><strong>Hot Tub Indoors</strong><br />

          Choosing to locate your hot tub inside may limit which models you may select. Floor loads, venting, entry/exit dimensions, access, etc. are just a few of the items that must be considered. During your free site survey, your Thermospa technician will provide expert advice on installation tips to help you choose just the right hot tub for your special location. </div></td>

    </tr>

    <input type="hidden" name="tub" value="34">

	<input type="hidden" name="stepc" value="2">

  </form>

</table>

