<?php
use Wordplate\Acf\Field;
/**
 * Add a acf_hidden_randomvalue helper function
 * for wordplate
 */
if (!function_exists('acf_hidden_randomvalue')) {
	/**
	 * Get an acf text field settings array.
	 *
	 * @param array $config
	 *
	 * @return \WordPlate\Acf\Field
	 */
	function acf_hidden_randomvalue(array $config): Field
	{
		$config = array_merge($config, ['type' => 'acf_field_hidden_randomvalue']);
		return new Field($config, ['name']);
	}
}