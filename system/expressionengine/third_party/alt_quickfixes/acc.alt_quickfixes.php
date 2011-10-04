<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
/**
 * Publish/Edit Quick Fixes Accessory
 *
 * @package		ExpressionEngine
 * @subpackage	Addons
 * @category	Accessory
 * @author		Adrienne L. Travis
 * @link		
 */
 
class Alt_quickfixes_acc {
	
	public $name			= 'Publish/Edit Quick Fixes';
	public $id				= 'alt_quickfixes';
	public $version			= '1.0';
	public $description		= 'Quick Fixes for Publish, Edit, & FileManager Screens';
	public $sections		= array();
	
	function __construct()
	{
		$this->EE =& get_instance();


		//Only initialize if we are on a publish or edit page
		if(			$this->EE->input->get('D') == "cp"
				&& 	$this->EE->input->get('M') == "entry_form" 
				&& ($this->EE->input->get('C') == "content_publish" || $this->EE->input->get('C') == "content_edit")
			) {
			$this->init();
			}

		//Hide the tab on all pages
		$this->_hide_my_tab();

	}
	
	public function init() {
		$mystyles = $this->_get_styles();
		$this->EE->cp->add_to_head($mystyles);
		
		$myscripts = $this->_get_scripts();
		$this->EE->cp->add_to_foot($myscripts);
		} // end public function init()
	
	/**
	 * Set Sections
	 * This function must exist, but is empty
	 */
	public function set_sections() {

		} // end public function set_sections()
	
	// ----------------------------------------------------------------
	
	private function _get_styles() {
		$out = '
		<style type="text/css">
			div.publish_date fieldset.holder select { display: none !important; }
		</style>
		
		';
		
		return $out;
		} // end private function _get_styles()
		
	// ----------------------------------------------------------------	
	
	private function _get_scripts() {
		$out = '
		<script type="text/javascript">
				jQuery(document).ready(function() {
					jQuery.datepicker.setDefaults( { changeMonth: true, changeYear: true } );
					});
		</script>
		
		';
		
		return $out;
		} // end private function _get_scripts()
		
	private function _hide_my_tab() {
		$this->EE->cp->load_package_js('hide_tab');
		} // end private function _hide_my_tab()
	
}
 
/* End of file acc.alt_quickfixes.php */
/* Location: /system/expressionengine/third_party/alt_quickfixes/acc.alt_quickfixes.php */