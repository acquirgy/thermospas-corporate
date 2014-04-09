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
		echo '<iframe height="1" width="1" frameborder="0" scrolling="no" src="https://www.emjcd.com/tags/c?containerTagId=1204&ITEM1=lead&AMT1=1&QTY1=1&CID=1524481&OID='.$oid.'&TYPE=354381&CURRENCY=USD" name="cj_conversion"></iframe>
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
		?>
        <!-- VSW CONVERSIONS -->
		<div id="vswcnv" style="display:none"><script type="text/javascript" id="vswcnvscript">
		var u='https://secure.featurelink.com/Tracking/ConversionProcessing/ConversionTracking.aspx?aid=Thermospas&cnv_name=purchase&cnv_type=1';
		var s=document.createElement('script');s.src=u;document.write(unescape("%3Cscript src='"+u+"' type='text/javascript'%3E%3C/script%3E"));
		</script>
		<script type="text/javascript">(function(){ VSW_Conversion();})();</script>
		<noscript><iframe name="vswcnvf" width="0" height="0" src="https://secure.featurelink.com/Tracking/TrackConversion.ashx?aid=Thermospas&cnv_name=purchase&noscript=1&cnv_type=1" frameborder="0" marginwidth="0" marginheight="0" vspace="0" hspace="0" allowtransparency="true" scrolling="no"></iframe></noscript></div>
		<!-- END VSW CONVERSIONS -->
		<?php
	mysql_query($sql_leads);

	// Send Email Notification
	require_once($_SERVER['DOCUMENT_ROOT'] . '/classes/HtDb.php');
	require_once($_SERVER['DOCUMENT_ROOT'] . '/classes/HtEmail.php');

	$db = new HtDb();
	$email = new HtEmail();

	$submission = $db->get('ht_form', array('ht_token', $_POST['ht_token']));
	$lead = $db->get('leads', array('leads_token', $_POST['ht_token']));
	$email->sendSubmission($submission, 'hot-tub-pricing-1.php - step 2', $lead);
	// End Send Email Notification


else:
	echo $sql_ht_form."<br />";
	echo $sql_leads;

endif;

?>
