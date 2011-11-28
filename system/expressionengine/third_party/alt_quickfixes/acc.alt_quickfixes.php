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
	public $id			= 'alt_quickfixes';
	public $version			= '1.1';
	public $description		= 'Quick Fixes for Various CP Screens';
	public $sections		= array();
	
	function __construct()
	{
		$this->EE =& get_instance();

        	$sec = 'other';
        
		//Only initialize if we are on a publish or edit page
		if(	 $this->EE->input->get('D') == "cp"
		&& 	 $this->EE->input->get('M') == "entry_form" 
		&& 	($this->EE->input->get('C') == "content_publish" || $this->EE->input->get('C') == "content_edit")
			) {
			$sec = 'publish';
			}
       		
       		$this->init($sec);
        
		//Hide the tab on all pages
		$this->_hide_my_tab();

	}
	
	public function init($sec) {
		$mystyles = $this->_get_styles($sec);
		$this->EE->cp->add_to_head($mystyles);
		
		$myscripts = $this->_get_scripts($sec);
		$this->EE->cp->add_to_foot($myscripts);

        
		} // end public function init()
	
	/**
	 * Set Sections
	 * This function must exist, but is empty
	 */
	public function set_sections() {

		} // end public function set_sections()
	
	// ----------------------------------------------------------------
	
	private function _get_styles($mysec) {
		$out = '<style type="text/css">'."\n";
        if('publish' == $mysec) {
            $out .= "div.publish_date fieldset.holder select { display: none !important; }\n";
            $out .= "html body .cke_skin_ee .cke_rcombo .cke_text { width: 180px !important; }\n";
            $out .= "html body .cke_skin_ee .cke_rcombopanel { width: 330px !important; }\n";
            }
        $out .= "</style>\n";
		
		return $out;
		} // end private function _get_styles()
		
	// ----------------------------------------------------------------	
	
	private function _get_scripts($mysec) {
		$out = '
		<script type="text/javascript">
            // This part fixes an issue with some pages not getting the corner() plugin loaded.
            // If corner does not exist, we create a plugin which does nothing, but prevents an error.
            if(!(jQuery().corner)) {
                ;(function($) { 
                    $.fn.corner = function() {
                        };
                    })(jQuery);
                }
            // Start the document.ready block
				jQuery(document).ready(function() {
            ';
        if('publish' == $mysec) {
                $out .= 'jQuery.datepicker.setDefaults( { changeMonth: true, changeYear: true } );';
                }
                
        $out .= '
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