<?php
	//must check that the user has the required capability
	if (!current_user_can('manage_options'))
	{
		wp_die( __('You do not have sufficient permissions to access this page.') );
	}

	$columns = array('id', 'client_name', 'address', 'city', 'state',
					'zip', 'email', 'phone', 'appt_date', 'appt_time', 'created_at');
	$columnString = '`' . implode('`,`', $columns) . '`';
?>
<style type="text/css" media="screen">
	.tss-table{
		border-collapse: collapse;
	}
	.tss-table th,
	.tss-table td {
		border: 1px solid black;
		padding: 10px;
	}
</style>
<div class="wrap">
	<h2>ThermoSpas Scheduler Plugin</h2>

	<table class="tss-table">
		<tr>
			<?php 
				foreach($columns as $column){
					echo "<th>$column</th>";
				}
			?>
		</tr>
		<?php
		global $wpdb;

		$query = "SELECT $columnString FROM " . TSScheduler::$table_name . ' WHERE 1 ORDER BY created_at DESC';

		$posts = $wpdb->get_results($query, ARRAY_A);

		foreach($posts as $post):
		?>
		<tr>
			<? foreach($post as $key => $value): ?>
			<td><?php echo $value ?></td>
			<?php endforeach; ?>
		</tr>
		<?php endforeach; ?>
	</table>
</div>
