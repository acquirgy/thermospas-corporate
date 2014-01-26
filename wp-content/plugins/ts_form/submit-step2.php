<?php
include_once "lib/db_connect.php";

json_encode( $_POST );

$sql_ht_form = "UPDATE ht_form
		SET `email` = '".$_POST['email']."',
		`address1` = '".$_POST['address']."',
		`city` = '".$_POST['city']."',
		`state` = '".$_POST['state1']."',
		`ht_location` = '".$_POST['ht_location']."',
		`ht_jets` = '".$_POST['ht_jets']."',
		`ht_owner` = '".$_POST['ht_owner']."',
		`ht_siteinspection` = '".$_POST['ht_siteinspection']."'
		WHERE `ht_token` = '".$_POST['ht_token']."'";

$sql_leads = "UPDATE leads
		SET `email` = '".$_POST['email']."',
		`address1` = '".$_POST['address']."',
		`city` = '".$_POST['city']."',
		`state` = '".$_POST['state1']."',
		`DYO_location` = '".$_POST['ht_location']."',
		`DYO_jets` = '".$_POST['ht_jets']."',
		`DYO_owner` = '".$_POST['ht_owner']."',
		`DYO_siteinspection` = '".$_POST['ht_siteinspection']."'
		WHERE `leads_token` = '".$_POST['ht_token']."'";


if(mysql_query($sql_ht_form)):
		$oid_arr = explode("Z",$_POST['ht_token']);
		$oid = $oid_arr[1]."Z".$oid_arr[0];
		echo '<iframe height="1" width="1" frameborder="0" scrolling="no" src="https://www.emjcd.com/tags/c?containerTagId=1204&ITEM1=lead&AMT1=0.00&QTY1=1&CID=1524481&OID='.$oid.'&TYPE=354381&CURRENCY=USD" name="cj_conversion"></iframe>
		<!-- Google Code for ThermoSpas -->
		<!-- Remarketing tags may not be associated with personally identifiable information or placed on pages related to sensitive categories. For instructions on adding this tag and more information on the above requirements, read the setup guide: google.com/ads/remarketingsetup -->
		<script type="text/javascript">
			/* <![CDATA[ */
			var google_conversion_id = 1070435200;
			var google_conversion_label = "ZHS9CKDnzgEQgJe2_gM";
			var google_custom_params = window.google_tag_params;
			var google_remarketing_only = true;
			/* ]]> */
		</script>
		<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
		</script>
		<noscript>
			<div style="display:inline;">
				<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/1070435200/?value=0&amp;label=ZHS9CKDnzgEQgJe2_gM&amp;guid=ON&amp;script=0"/>
			</div>
		</noscript>';
	mysql_query($sql_leads);
	//echo $sql_leads;

else:
	echo $sql_ht_form."<br />";
	echo $sql_leads;

endif;

?>
