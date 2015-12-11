<?php 
	// safely apply wp_kses_post to all fields
	// when using acf_form()
	function acf_wp_kses_post($data) {
		if (!is_array($data)) {
			return wp_kses_post($data);
		}
		$return = array();
		foreach ($data as $index => $value) {
			$return[$index] = acf_wp_kses_post($value);
		}
	  return $return;
	}
	add_filter('acf/update_value', 'acf_wp_kses_post')
	/*
		there is another way to do it posted by the author of ACF that can be
		found here http://www.advancedcustomfields.com/resources/acf_form/#security
		I'll keep this one here as an alternate
	*/
?>