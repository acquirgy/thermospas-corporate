<br><?php
if ( !isset( $parent_class ) ) {
	$parent_class = $this;
}
if ( defined( 'pluginbuddy_importbuddy' ) ) {
	//$parent_class->admin_scripts();
}












//$table_list = array();
?>

<table class="widefat">
	<thead>
		<tr class="thead">
			<?php
				echo '<th>', __('Database Table', 'it-l10n-backupbuddy' ),'</th>',
					 '<th>', __('Status', 'it-l10n-backupbuddy' ), '</th>',
					 '<th>', __('Settings', 'it-l10n-backupbuddy' ), '</th>',
					 '<th>', __('Updated / Checked', 'it-l10n-backupbuddy' ),'</th>',
					 '<th>', __('Rows', 'it-l10n-backupbuddy' ), '</th>',
					 '<th>', __('Size', 'it-l10n-backupbuddy' ), '</th>',
					 '<th>', __('Excluded Size', 'it-l10n-backupbuddy' ), '</th>';
			?>
		</tr>
	</thead>
	<tfoot>
		<tr class="thead">
			<?php
				echo '<th>', __('Database Table', 'it-l10n-backupbuddy' ),'</th>',
					 '<th>', __('Status', 'it-l10n-backupbuddy' ), '</th>',
					 '<th>', __('Settings', 'it-l10n-backupbuddy' ), '</th>',
					 '<th>', __('Updated / Checked', 'it-l10n-backupbuddy' ),'</th>',
					 '<th>', __('Rows', 'it-l10n-backupbuddy' ), '</th>',
					 '<th>', __('Size', 'it-l10n-backupbuddy' ), '</th>',
					 '<th>', __('Excluded Size', 'it-l10n-backupbuddy' ), '</th>';
			?>
		</tr>
	</tfoot>
	<tbody>
		<?php
		global $wpdb;
		$prefix = $wpdb->prefix;
		$prefix_length = strlen( $wpdb->prefix );
		
		$additional_includes = explode( "\n", pb_backupbuddy::$options['mysqldump_additional_includes'] );
		array_walk( $additional_includes, create_function('&$val', '$val = trim($val);')); 
		$additional_excludes = explode( "\n", pb_backupbuddy::$options['mysqldump_additional_excludes'] );
		array_walk( $additional_excludes, create_function('&$val', '$val = trim($val);')); 

		
		$total_size = 0;
		$total_size_with_exclusions = 0;
		$total_rows = 0;
		$result = mysql_query("SHOW TABLE STATUS");
		while( $rs = mysql_fetch_array( $result ) ) {
			$excluded = true; // Default.
			
			// TABLE STATUS.
			$resultb = mysql_query("CHECK TABLE `{$rs['Name']}`");
			while( $rsb = mysql_fetch_array( $resultb ) ) {
				if ( $rsb['Msg_type'] == 'status' ) {
					$status = $rsb['Msg_text'];
				}
			}
			mysql_free_result( $resultb );
			
			// Fix up row count and average row length for InnoDB engine which returns inaccurate
			// (and changing) values for these
			if ( 'InnoDB' === $rs[ 'Engine' ] ) {
			
				if ( false !== ( $resultc = mysql_query( "SELECT COUNT(1) FROM `{$rs[ 'Name' ]}`" ) ) ) {
				
					if ( false !== ( $row = mysql_fetch_row( $resultc ) ) ) {
					
						if ( 0 < ( $rs[ 'Rows' ] = $row[ 0 ] ) ) {
						
							$rs[ 'Avg_row_length' ] = ( $rs[ 'Data_length' ] / $rs[ 'Rows' ] );
							
						}
						
					}
					
					mysql_free_result( $resultc );
					
				}
				
			}
			
			// TABLE SIZE.
			$size = ( $rs['Data_length'] + $rs['Index_length'] );
			$total_size += $size;
			
			
			// HANDLE EXCLUSIONS.
			if ( pb_backupbuddy::$options['backup_nonwp_tables'] == 0 ) { // Only matching prefix.
				if ( ( substr( $rs['Name'], 0, $prefix_length ) == $prefix ) OR ( in_array( $rs['Name'], $additional_includes ) ) ) {
					if ( !in_array( $rs['Name'], $additional_excludes ) ) {
						$total_size_with_exclusions += $size;
						$excluded = false;
					}
				}
			} else { // All tables.
				if ( !in_array( $rs['Name'], $additional_excludes ) ) {
					$total_size_with_exclusions += $size;
					$excluded = false;
				}
			}
			
			
			
			
			
			// OUTPUT TABLE ROW.
			echo '<tr class="entry-row alternate"';
			if ( $excluded === true ) {
				echo ' style="background: #fcc9c9;"';
			}
			echo '>';
			echo '	<td>' . $rs['Name'];
			echo '	<div class="row-actions">
						<a href="' . pb_backupbuddy::ajax_url( 'db_check' ) . '&table=' . base64_encode( $rs['Name'] ) . '&#038;TB_iframe=1&#038;width=640&#038;height=600" class="thickbox" title="Check database table for any errors or corruption.">Check</a>
						|
						<a href="' . pb_backupbuddy::ajax_url( 'db_repair' ) . '&table=' . base64_encode( $rs['Name'] ) . '&#038;TB_iframe=1&#038;width=640&#038;height=600" class="thickbox" title="Repair table that has been corrupted. Only needed if the status or check response indicated damage.">Repair</a>
					</div>
				';
			echo '</td>';
			echo '	<td>' . $status . '</td>';
			echo '	<td>Engine: ' . $rs['Engine'] . '<br>Collation: ' . $rs['Collation'] . '</td>';
			
			echo '	<td>Updated: ';
			if ( $rs['Update_time'] == '' ) {
				_e( 'Unavailable', 'it-l10n-backupbuddy' );
			} else {
				echo $rs['Update_time'];
			}
			echo '<br>Checked: ';
			if ( $rs['Check_time'] == '' ) {
				_e( 'Unavailable', 'it-l10n-backupbuddy' );
			} else {
				echo $rs['Check_time'];
			}
			echo '</td>';
			
			echo '	<td>' . $rs['Rows'] . '</td>';
			echo '	<td>' . pb_backupbuddy::$format->file_size( $size ) . '</td>';
			if ( $excluded === true ) {
				echo '	<td><span class="pb_label pb_label-important">Excluded</span></td>';
			} else {
				echo '	<td>' . pb_backupbuddy::$format->file_size( $size ) . '</td>';
			}
			
			
			
						
			
			
			$total_rows += $rs['Rows'];
			echo '</tr>';
		}
		echo '<tr class="entry-row alternate">';
		echo '	<td>&nbsp;</td>';
		echo '	<td>&nbsp;</td>';
		echo '	<td>&nbsp;</td>';
		echo '<td><b>',__('TOTALS','it-l10n-backupbuddy' ),':</b></td>';
		echo '<td><b>' . $total_rows . '</b></td>';
		echo '<td><b>' . pb_backupbuddy::$format->file_size( $total_size ) . '</b></td>';
		echo '<td><b>' . pb_backupbuddy::$format->file_size( $total_size_with_exclusions ) . '</b></td>';
		echo '</tr>';
		
		pb_backupbuddy::$options['stats']['db_size'] = $total_size;
		pb_backupbuddy::$options['stats']['db_size_excluded'] = $total_size_with_exclusions;
		pb_backupbuddy::$options['stats']['db_size_updated'] = time();
		pb_backupbuddy::save();
		
		unset( $total_size );
		unset( $total_rows );
		mysql_free_result( $result );
		?>
	</tbody>
</table><br>