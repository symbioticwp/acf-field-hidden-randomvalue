<?php
namespace Symbiotic\Acf\Field\RandomValue;
use acf_field;

class AcfFieldRandomValue extends acf_field {

	/*
	*  __construct
	*
	*  This function will setup the field type data
	*
	*  @type	function
	*  @date	5/03/2014
	*  @since	5.0.0
	*
	*  @param	n/a
	*  @return	n/a
	*/

	function __construct() {

		/*
		*  name (string) Single word, no spaces. Underscores allowed
		*/

		$this->name = 'acf_field_hidden_randomvalue';

		/*
		*  label (string) Multiple words, can include spaces, visible when selecting a field type
		*/
		$this->label = __('Random value', 'acf-randomvalue');


		/*
		*  category (string) basic | content | choice | relational | jquery | layout | CUSTOM GROUP NAME
		*/
		$this->category = 'basic';

		/*
		*  l10n (array) Array of strings that are used in JavaScript. This allows JS strings to be translated in PHP and loaded via:
		*  var message = acf._e('randomstring', 'error');
		*/
		$this->l10n = array();

		// do not delete!
		parent::__construct();
	}

	/*
	*  render_field_settings()
	*
	*  Create extra settings for your field. These are visible when editing a field
	*
	*  @type	action
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$field (array) the $field being edited
	*  @return	n/a
	*/
	// function render_field_settings( $field ) {
	//     acf_render_field_setting($field, array(
	//         'label' => __('Default Value', 'acf-fewbricks-hidden'),
	//         'instructions' => __('Set a default value for the field', 'acf-fewbricks-hidden'),
	//         'type' => 'string',
	//         'name' => 'default_value',
	//         'prepend' => '',
	//     ));
	// }

	/*
	*  render_field()
	*
	*  Create the HTML interface for your field
	*
	*  @param	$field (array) the $field being rendered
	*
	*  @type	action
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$field (array) the $field being edited
	*  @return	n/a
	*/

	function render_field( $field ) {
		// CSS to hide the field and its wrapper
		?>
        <style
                type="text/css">.field_key-<?php echo $field['key']; ?>, .acf-<?php echo str_replace('_', '-', $field['key']); ?>, .acf-field-<?php echo str_replace('_', '-', $field['key']); ?>, [data-key="<?php echo $field['key']; ?>"] {
                display: none;}</style>
        <input type="hidden" name="<?php echo esc_attr($field['name']) ?>" value="<?php echo esc_attr($field['value']) ?>" style="display: none"/>
		<?php
	}

	/*
	*  update_value()
	*
	*  This filter is applied to the $value before it is saved in the db
	*
	*  @type	filter
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$value (mixed) the value found in the database
	*  @param	$post_id (mixed) the $post_id from which the value was loaded
	*  @param	$field (array) the field array holding all the field options
	*  @return	$value
	*/
	function update_value( $value, $post_id, $field ) {
		if(!$value) {
			//$value = substr(chr( mt_rand( 97 ,122 ) ).substr( md5( time( ) ) ,10 ),0,8);
			$value = substr(bin2hex(openssl_random_pseudo_bytes(12)),0,8);
		}
		return $value;
	}

	/*
	*  validate_value()
	*
	*  This filter is used to perform validation on the value prior to saving.
	*  All values are validated regardless of the field's required setting. This allows you to validate and return
	*  messages to the user if the value is not correct
	*
	*  @type	filter
	*  @date	11/02/2014
	*  @since	5.0.0
	*
	*  @param	$valid (boolean) validation status based on the value and the field's required setting
	*  @param	$value (mixed) the $_POST value
	*  @param	$field (array) the field array holding all the field options
	*  @param	$input (string) the corresponding input name for $_POST value
	*  @return	$valid
	*/
	function validate_value( $valid, $value, $field, $input ){
		return true;
	}
}
?>