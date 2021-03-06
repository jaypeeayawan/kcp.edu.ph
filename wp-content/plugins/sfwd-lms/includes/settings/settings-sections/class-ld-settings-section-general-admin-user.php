<?php
if ( ( class_exists( 'LearnDash_Settings_Section' ) ) && ( !class_exists( 'LearnDash_Settings_Section_General_Admin_User' ) ) ) {
	class LearnDash_Settings_Section_General_Admin_User extends LearnDash_Settings_Section {

		function __construct() {
			$this->settings_page_id					=	'learndash_lms_settings';
		
			// This is the 'option_name' key used in the wp_options table
			$this->setting_option_key 				= 	'learndash_settings_admin_user';

			// This is the HTML form field prefix used. 
			$this->setting_field_prefix				= 	'learndash_settings_admin_user';
	
			// Used within the Settings API to uniquely identify this section
			$this->settings_section_key				= 	'settings_admin_user';
		
			// Section label/header
			$this->settings_section_label			=	__( 'Admin User Settings', 'learndash' );
		
			// Used to show the section description above the fields. Can be empty
			//$this->settings_section_description		=	__( '<p>Settings Section One Description.</p>', 'learndash' );

			parent::__construct(); 
		}
		
		function load_settings_values() {
			parent::load_settings_values();

			$_INITIALIZE = false; 
			if ( $this->setting_option_values === false ) {
				$_INITIALIZE = true;
				$this->setting_option_values = array();
			} 
			
			$this->setting_option_values = wp_parse_args(
				$this->setting_option_values, 
				array(
					'courses_autoenroll_admin_users' => 	( $_INITIALIZE == true ) ? 'yes' : 'no',
					'bypass_course_limits_admin_users' => 	( $_INITIALIZE == true ) ? 'yes' : 'no',
				)
			);
		}
		
		function load_settings_fields() {

			$this->setting_option_fields = array(
				'courses_autoenroll_admin_users' => array(
					'name'  		=> 	'courses_autoenroll_admin_users', 
					'type'  		=> 	'checkbox',
					'label' 		=> 	__( 'Courses Auto-enroll', 'learndash' ),
					'help_text'  	=> 	sprintf( _x( 'Admin users will be automatically enrolled in all %s.', 'placeholder: Courses', 'learndash' ), LearnDash_Custom_Label::get_label( 'courses' ) ),
					'value' 		=> 	isset( $this->setting_option_values['courses_autoenroll_admin_users'] ) ? $this->setting_option_values['courses_autoenroll_admin_users'] : 'no',
					'options'		=>	array(
											'yes'	=>	__('Yes', 'learndash'),
										)
				),
				'bypass_course_limits_admin_users' => array(
					'name'  		=> 	'bypass_course_limits_admin_users', 
					'type'  		=> 	'checkbox',
					'label' 		=> 	__( 'Bypass Course limits', 'learndash' ),
					'help_text'  	=> 	sprintf( _x( 'Admin users will bypass restrictions like %s Progression, %s and %s Prerequisites, %s Points limits and %s/%s timers.', 'placeholder: Course, Course, Lesson, Course, Lesson, Topic', 'learndash' ), LearnDash_Custom_Label::get_label( 'course' ), LearnDash_Custom_Label::get_label( 'course' ), LearnDash_Custom_Label::get_label( 'lesson' ), LearnDash_Custom_Label::get_label( 'course' ), LearnDash_Custom_Label::get_label( 'lesson' ), LearnDash_Custom_Label::get_label( 'topic' ) ),
					'value' 		=> 	isset( $this->setting_option_values['bypass_course_limits_admin_users'] ) ? $this->setting_option_values['bypass_course_limits_admin_users'] : 'yes',
					'options'		=>	array(
											'yes'	=>	__('Yes', 'learndash'),
										)
				),
				'reports_include_admin_users' => array(
					'name'  		=> 	'reports_include_admin_users', 
					'type'  		=> 	'checkbox',
					'label' 		=> 	__( 'Include in Reports', 'learndash' ),
					'help_text'  	=> 	sprintf( _x( 'Admin users will be included in the %s and %s CSV reports.</p>', 'placeholders: Course, Quiz', 'learndash' ), LearnDash_Custom_Label::get_label( 'course' ), LearnDash_Custom_Label::get_label( 'quiz' ) ),
					
					'value' 		=> 	isset( $this->setting_option_values['reports_include_admin_users'] ) ? $this->setting_option_values['reports_include_admin_users'] : 'no',
					'options'		=>	array(
											'yes'	=>	__('Yes', 'learndash'),
										)
				),
			);
		
			$this->setting_option_fields = apply_filters( 'learndash_settings_fields', $this->setting_option_fields, $this->settings_section_key );
			
			parent::load_settings_fields();
		}
	}
}
add_action( 'learndash_settings_sections_init', function() {
	LearnDash_Settings_Section_General_Admin_User::add_section_instance();
} );
