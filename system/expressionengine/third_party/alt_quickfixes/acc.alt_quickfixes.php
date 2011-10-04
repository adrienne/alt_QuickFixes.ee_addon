<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
/**
 * ExpressionEngine - by EllisLab
 *
 * @package		ExpressionEngine
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2003 - 2011, EllisLab, Inc.
 * @license		http://expressionengine.com/user_guide/license.html
 * @link		http://expressionengine.com
 * @since		Version 2.0
 * @filesource
 */
 
// ------------------------------------------------------------------------
 
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
	
	/**
	 * Set Sections
	 */
	public function set_sections() {
		$this->EE =& get_instance();

		$mystyles = $this->_get_styles();
		$this->EE->cp->add_to_head($mystyles);
		
		$myscripts = $this->_get_scripts();
		$this->EE->cp->add_to_foot($myscripts);
		
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
					$("#alt_quickfixes.accessory").remove();
					$("#accessoryTabs").find("a.alt_quickfixes").parent("li").remove();
					});
		</script>
		
		';
		
		return $out;
		} // end private function _get_scripts()
	
}
 
/* End of file acc.alt_quickfixes.php */
/* Location: /system/expressionengine/third_party/alt_quickfixes/acc.alt_quickfixes.php */