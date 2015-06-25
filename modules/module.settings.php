<?php

	add_filter('bbp_admin_get_settings_sections', 'bbpress_livesearch_add_setting_section');
	function bbpress_livesearch_add_setting_section ($sections)
	{
		$sections['bbp_settings_livesearch'] = array(
					'title'    => __( 'LiveSearch', 'bbpress' ),
					'callback' => 'bbpress_livesearch_admin_setting_header',
					'page'     => 'discussion'
				);

		//print_r($sections);
		return $sections;
	}

	function bbpress_livesearch_admin_setting_header()
	{
		?>
		<p><?php esc_html_e( 'Setup livesearch.', 'bbpress' ); ?></p>

		<?php
	}

	add_filter( 'bbp_admin_get_settings_fields', 'bbpress_livesearch_admin_setting_settings');
	function bbpress_livesearch_admin_setting_settings($settings)
	{
		$settings['bbp_settings_livesearch'] = array
		(
			'_bbp_livesearch_beforehtml' => array(
				'title'             => __( 'HTML to render before livesearch results', 'bbpress' ),
				'callback'          => 'bbpress_livesearch_admin_setting_beforehtml',
				'sanitize_callback' => '',
				'args'              => array()
			),

			'_bbp_livesearch_afterhtml' => array(
				'title'             => __( 'HTML to render after livesearch results', 'bbpress' ),
				'callback'          => 'bbpress_livesearch_admin_setting_afterhtml',
				'sanitize_callback' => '',
				'args'              => array()
			),

			'_bbp_livesearch_postlimit' => array(
				'title'             => __( 'Maximum number of results to display', 'bbpress' ),
				'callback'          => 'bbpress_livesearch_admin_setting_postlimit',
				'sanitize_callback' => '',
				'args'              => array()
			)
		);

		//print_r($settings);
		return $settings;
	}

	function bbpress_livesearch_admin_setting_beforehtml() {
	?>

		<textarea name="_bbp_livesearch_beforehtml" id="_bbp_livesearch_beforehtml" class="large-text" /> <?php bbp_form_option( '_bbp_livesearch_beforehtml', '<p class="bbpress_livesearch_header">Someone might have already asked your question. Do any of these match?</p>' ); ?></textarea>

	<?php
	}

	function bbpress_livesearch_admin_setting_afterhtml() {
	?>

		<textarea name="_bbp_livesearch_afterhtml" id="_bbp_livesearch_afterhtml" class="large-text" /> <?php bbp_form_option( '_bbp_livesearch_afterhtml', '<br>' ); ?></textarea>

	<?php
	}

	function bbpress_livesearch_admin_setting_postlimit() {
	?>

		<textarea name="_bbp_livesearch_postlimit" id="_bbp_livesearch_postlimit" class="large-text" /> <?php bbp_form_option( '_bbp_livesearch_postlimit', '10' ); ?></textarea>

	<?php
	}

	add_filter('bbp_map_settings_meta_caps', 'bbpress_livesearch_admin_setting_add_permissions_autodelete' , 10, 4);
	function bbpress_livesearch_admin_setting_add_permissions_autodelete ( $caps, $cap, $user_id, $args )
	{
		if ($cap=='bbp_settings_livesearch')
			$caps = array( bbpress()->admin->minimum_capability );

		return $caps;
	}
?>
