<?php
	//must check that the user has the required capability
	if (!current_user_can('manage_options'))
	{
		wp_die( __('You do not have sufficient permissions to access this page.') );
	}

	// variables for the field and option names
	$hidden_field_name = 'tss_submit_hidden';

	// set option values as they are in the DB
	$options = TSScheduler::$options;

	// See if the user has posted us some information
	// If they did, this hidden field will be set to 'Y'
	if( isset($_POST[ $hidden_field_name ]) && $_POST[ $hidden_field_name ] == 'Y' ) {
		TSScheduler::updateOptions($_POST);
		$options = TSScheduler::$options;

		// Put a settings updated message on the screen
		echo '<div class="updated"><p><strong>settings saved.</strong></p></div>';
	}

?>
<style type="text/css" media="screen">
	label {
		vertical-align: top;
	}
</style>
<div class="wrap">
	<h2>ThermoSpas Scheduler Plugin Settings</h2>
	<form name="form1" method="post" action="">
	<input type="hidden" name="<?php echo $hidden_field_name; ?>" value="Y">

	<?php foreach($options as $option_name => $option_info): ?>
		<div class="optionContainer">
			<label for="<?php echo $option_name ?>"><?php echo $option_info['label'] ?>: </label>
			<?php switch($option_info['type']):
					case 'string': ?>
						<input type="text" name="<?php echo $option_name ?>" id="<?php echo $option_name ?>" value="<?php echo $option_info['value'] ?>" title="<?php echo $option_info['desc'] ?>">
					<?php break;
					case 'boolean': ?>
						<label>True <input type="radio" name="<?php echo $option_name ?>" id="<?php echo $option_name ?>_true" value="true" <?php if($option_info['value']=='true'){echo 'checked="checked"';} ?> title="<?php echo $option_info['desc'] ?>"></label>
						<label>False <input type="radio" name="<?php echo $option_name ?>" id="<?php echo $option_name ?>_false" value="false" <?php if($option_info['value']=='false'){echo 'checked="checked"';} ?> title="<?php echo $option_info['desc'] ?>"></label>
					<?php break;
					case 'text': ?>
						<textarea rows="15" cols="75" name="<?php echo $option_name ?>" id="<?php echo $option_name ?>" title="<?php echo $option_info['desc'] ?>"><?php echo $option_info['value'] ?></textarea>
			<?php endswitch; ?>
			</div>
	<?php endforeach; ?>

	<hr />

	<p class="submit">
	<input type="submit" name="Submit" class="button-primary" value="<?php esc_attr_e('Save Changes') ?>" />
	</p>

	</form>
</div>
