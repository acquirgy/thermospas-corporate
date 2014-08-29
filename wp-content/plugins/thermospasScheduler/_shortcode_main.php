<script type="text/javascript" charset="utf-8">

	function validateInspectionForm() {
		var canSubmit = true;
		var allInputTypes = $('input').add('select');
		var allInputs = $(this).find(allInputTypes);
		$.each(allInputs, function(){
		// If it still has the label text, don't submit that text
			if($(this).data('label') && ($(this).data('label') == $(this).val()))
			{
				$(this).val('');
			}

			// validate date format
			if($(this).attr('name') == 'appt_date')
			{
				var validformat=/^\d{2}\/\d{2}\/\d{4}$/ //Basic check for format validity
				if (!validformat.test($(this).val()))
				{
					canSubmit = false;
					$(this).addClass('tss-errorInput');
				}
				else
				{
					$(this).removeClass('tss-errorInput');
				}
			}
			// all fields are required except email
			else if($(this).attr('name') != 'email')
			{
				if($(this).val() == '')
				{
					$(this).addClass('tss-errorInput');
					canSubmit = false;
				}
				else
				{
					$(this).removeClass('tss-errorInput');
				}
			}
		});

		if(!canSubmit) {
			allInputs.each(function(){
				// don't focus datepicker
				if($(this).attr('name') != 'appt_date')
				{
					$(this).focus();
					$(this).blur();
				}
			});
			return false;
		}	else {
			return true;
		}
	}

	$(function() {
		$("#appt_date").datepicker({
			minDate: 3,
			maxDate: "+2W",
			beforeShowDay: function(date){
				var showDay  = true;
				var cssClass = '';
				var tooltip  = '8am - 7pm EST';
				if(date.getDay() == 0)
				{
					showDay = false;
					tooltip = 'No appointments available on Sundays.';
				}
				else if(date.getDay() == 6)
				{
					cssClass = 'tss-datepicker-saturday';
					tooltip = '8am - 2pm EST';
				}
				return [showDay, cssClass, tooltip];
			}
		});

		var tssInputs = $('#tss-scheduleFormContainer input');
		tssInputs.each(function(){
			var label = $(this).data('label');
			if(label){ $(this).val(label); }
		});
		tssInputs.focus(function(){
			var label = $(this).data('label');
			if($(this).val() == label)
			{
				$(this).val('');
			}
		});
		tssInputs.blur(function(){
			var label = $(this).data('label');
			if($(this).val() == '')
			{
				$(this).val(label);
			}
		});
	});

</script>

<style type="text/css" media="screen">

	#tss-scheduleFormContainer {
		font-family: "Trebuchet MS";
		width: 340px;
		padding: 0 30px;
		color: #2b68b9;
		box-sizing: border-box;
		background-color: #fff;
		margin-right: 40px;
	}

	#tss-scheduleFormContainer.grayBG {
		background-color: #eee;
		padding: 30px;
		margin-right: 20px;
	}

</style>

<?php

	$postHidden = array('hname' => 'hv', 'value' => 'qagilvesyudk');
	$gotPost    = false;

	if(isset($_POST[$postHidden['hname']]) && $_POST[$postHidden['hname']] == $postHidden['value'])
	{
		$gotPost = true;

		// write to table
  	global $wpdb;
		$tableName = TSScheduler::$table_name;

		// client_name, address, city, state, zip, email, phone, appt_date, appt_time
		$fields = array('client_name', 'address', 'city', 'state', 'zip', 'email', 'phone', 'appt_date', 'appt_time');
		$data   = array();

		$_POST['appt_date'] = date( 'Y-m-d H:i:s', strtotime($_POST['appt_date']));

		foreach($fields as $field)
		{
			$data[$field] = $_POST[$field];
		}

		$data['created_at'] = current_time('mysql');
		$data['updated_at'] = current_time('mysql');

		$wpdb->insert($tableName, $data);
		TSScheduler::sendAppointmentEmail($data);

	}

	if($gotPost):

?>

	<div id="tss-scheduleFormContainer" class="grayBG">
		Thank you for submitting your appointment request. A representative will contact you shortly. Please check your email for a confirmation of this appointment request.
	</div>

<?php
	else:
		wp_enqueue_style('jquery-ui', '//code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css');
		wp_enqueue_script('jquery-globalize', plugins_url().'/thermospasScheduler/js/globalize.js');
?>

<style type="text/css" media="screen">
	#tss-scheduleFormTitle {
		font-size: 22px;
		font-weight: bold;
		line-height: 30px;
		margin-top: 20px;
		margin-bottom: 20px;
	}

	#tss-scheduleFormContainer select,
	#tss-scheduleFormContainer input {
		padding-left: 9px;
		font-size: 14px;
		font-weight: normal;
		color: #a7a7a7;
		height: 26px;
		line-height: 26px;
		border: 1px solid #c1c1c1;
		border-radius: 2px;
		float: none;
		display: inline-block;
		box-sizing: border-box;
		margin: 0 0 8px 0;
		padding: 2px 4px;
	}
	#tss-scheduleFormContainer select.tss-errorInput,
	#tss-scheduleFormContainer input.tss-errorInput {
		border-color: #f00;
	}
	#tss-scheduleFormContainer .ui-spinner input {
		border: none;
		height: 20px;
	}
	#tss-scheduleFormContainer label {
		color: #a7a7a7;
		display: block;
		margin-bottom: 2px;
	}
	#tss-scheduleFormContainer #date {
		margin-bottom: 10px;
	}
	#tss-scheduleFormContainer select {
		width: 158px;
		margin-right: 10px;
		padding: 0 4px;
	}
	.tss-fullWidth {
		width: 273px;
		padding-left: 10px;
	}
	.tss-shortWidth {
		width: 95px;
	}
	.tss-apptInfoContainer {
		font-size: 12px;
	}
	.tss-apptInfoContainer > p {
		margin: 0 0 14px;
	}
	.tss-apptInfoContainer > ul {
		font-weight: bold;
		list-style-type: none;
		margin-top: -10px;
		margin-bottom: 10px;
	}
	.tss-gray-p {
		font-size: 14px;
		font-weight: bold;
		color: #a7a7a7;
		line-height: 20px;
		margin-top: 10px;
		margin-bottom: 10px;
	}
	#tss-scheduleFormContainer input.tss-submit {
		width: 124px;
		border-radius: 2px;
		padding: 15px 0;
		text-align: center;
		color: #fff;
		font-size: 14px;
		font-weight: bold;
		border: none;
		background-color: #2b68b9;
		background-image: none;
		margin: 0;
		height: initial;
	}
	#tss-scheduleFormContainer hr {
		height: 0;
		border: none;
		border-bottom: 1px solid #c1c1c1;
		margin-bottom: 10px;
		margin-right: 0;
		margin-left: 0;
	}
</style>

<div id="tss-scheduleFormContainer">

	<div id="tss-scheduleFormTitle">Schedule Your ThermoSpas Home Experience</div>
	<form action="<?php echo get_permalink() ?>" id="tss-form" method="POST">
		<input type="text" class="tss-fullWidth" name="client_name" data-label="Name">
		<input type="text" class="tss-fullWidth" name="address" data-label="Address 1">
		<input type="text" class="tss-fullWidth" name="city" data-label="City">

		<select name="state">
			<option value="">State</option>
			<option value="AL">Alabama</option>
			<option value="AK">Alaska</option>
			<option value="AZ">Arizona</option>
			<option value="AR">Arkansas</option>
			<option value="CA">California</option>
			<option value="CO">Colorado</option>
			<option value="CT">Connecticut</option>
			<option value="DE">Delaware</option>
			<option value="FL">Florida</option>
			<option value="GA">Georgia</option>
			<option value="HI">Hawaii</option>
			<option value="ID">Idaho</option>
			<option value="IL">Illinois</option>
			<option value="IN">Indiana</option>
			<option value="IA">Iowa</option>
			<option value="KS">Kansas</option>
			<option value="KY">Kentucky</option>
			<option value="LA">Louisiana</option>
			<option value="ME">Maine</option>
			<option value="MD">Maryland</option>
			<option value="MA">Massachusetts</option>
			<option value="MI">Michigan</option>
			<option value="MN">Minnesota</option>
			<option value="MS">Mississippi</option>
			<option value="MO">Missouri</option>
			<option value="MT">Montana</option>
			<option value="NE">Nebraska</option>
			<option value="NV">Nevada</option>
			<option value="NH">New Hampshire</option>
			<option value="NJ">New Jersey</option>
			<option value="NM">New Mexico</option>
			<option value="NY">New York</option>
			<option value="NC">North Carolina</option>
			<option value="ND">North Dakota</option>
			<option value="OH">Ohio</option>
			<option value="OK">Oklahoma</option>
			<option value="OR">Oregon</option>
			<option value="PA">Pennsylvania</option>
			<option value="RI">Rhode Island</option>
			<option value="SC">South Carolina</option>
			<option value="SD">South Dakota</option>
			<option value="TN">Tennessee</option>
			<option value="TX">Texas</option>
			<option value="UT">Utah</option>
			<option value="VT">Vermont</option>
			<option value="VA">Virginia</option>
			<option value="WA">Washington</option>
			<option value="WV">West Virginia</option>
			<option value="WI">Wisconsin</option>
			<option value="WY">Wyoming</option>
		</select>
		<input type="text" class="tss-shortWidth" name="zip" data-label="Zip Code">
		<input type="text" class="tss-fullWidth" name="email" data-label="E-Mail Address">
		<input type="text" class="tss-fullWidth" name="phone" data-label="Phone Number">
		<div class="tss-apptInfoContainer">
			<p>Appointments may be scheduled within the hours</p>
			<ul>
				<li>8am - 7pm M - F</li>
				<li>8am - 2pm Saturday</li>
			</ul>
			<p>In-home appointments take 90 minutes</p>
			<p>Appointments may be scheduled 2 weeks<br>
				in advance of today’s date</p>
		</div>
		<hr>
		<label for="date">Please select a date</label>
		<input type="text" name="appt_date" id="appt_date" data-label="Date">
  	<label for="time">Appointment Time</label>
		<select name="appt_time" id="appt_time">
			<option value='8:00 AM'>8:00 AM</option>
			<option value='8:30 AM'>8:30 AM</option>
			<option value='9:00 AM'>9:00 AM</option>
			<option value='9:30 AM'>9:30 AM</option>
			<option value='10:00 AM'>10:00 AM</option>
			<option value='10:30 AM'>10:30 AM</option>
			<option value='11:00 AM'>11:00 AM</option>
			<option value='11:30 AM'>11:30 AM</option>
			<option value='12:00 PM'>12:00 PM</option>
			<option value='12:30 PM'>12:30 PM</option>
			<option value='1:00 PM'>1:00 PM</option>
			<option value='1:30 PM'>1:30 PM</option>
			<option value='2:00 PM'>2:00 PM</option>
			<option value='2:30 PM'>2:30 PM</option>
			<option value='3:00 PM'>3:00 PM</option>
			<option value='3:30 PM'>3:30 PM</option>
			<option value='4:00 PM'>4:00 PM</option>
			<option value='4:30 PM'>4:30 PM</option>
			<option value='5:00 PM'>5:00 PM</option>
			<option value='5:30 PM'>5:30 PM</option>
			<option value='6:00 PM'>6:00 PM</option>
			<option value='6:30 PM'>6:30 PM</option>
			<option value='7:00 PM'>7:00 PM</option>
		</select>

		<p class="tss-gray-p">
			A ThermoSpas telephone representative<br>
			will contact you to confirm your<br>
			requested date and time
		</p>

		<input type="hidden" name="<?php echo $postHidden['hname'] ?>" value="<?php echo $postHidden['value'] ?>">
		<input type="submit" value="SUBMIT" class="tss-submit">
	</form>
	<script type="text/javascript">
	    var __ss_noform = __ss_noform || [];
	    __ss_noform.push(['baseURI', 'https://app-PLBR48.sharpspring.com/webforms/receivePostback/MzQyNQAA/']);
	    __ss_noform.push(['endpoint', 'ae95f824-1a61-494e-9047-ae416f27277b']);
	    __ss_noform.push(['validate', validateInspectionForm]);
	</script>
	<script type="text/javascript" src="https://koi-PLBR48.sharpspring.com/client/noform.js?ver=1.0" ></script>
</div>



<?php
	endif; // if(!$gotPost)