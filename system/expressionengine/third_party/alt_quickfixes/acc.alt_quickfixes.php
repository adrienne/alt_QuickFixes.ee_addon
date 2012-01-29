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

        $sec = 'other';
        
		//Set differently if we are on a publish or edit page
		if(			$this->EE->input->get('D') == "cp"
				&& 	$this->EE->input->get('M') == "entry_form" 
				&& ($this->EE->input->get('C') == "content_publish" || $this->EE->input->get('C') == "content_edit")
			) {
			$sec = 'publish';
			}
		else if(	$this->EE->input->get('D') == "cp"
				&& 	$this->EE->input->get('M') == "sync_directory" 
				&&  $this->EE->input->get('C') == "content_files"
				) {
			$sec = 'filesync';
			}
        $this->init($sec);
        
		//Hide the tab on all pages
		$this->sections[] = '<script type="text/javascript" charset="utf-8">$("#accessoryTabs a.alt_quickfixes").parent().remove();</script>';

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
		else if('filesync' == $mysec) {
			$out .= "a.backlink { font-size: 18px; color: #2D98DB !important; position: relative; top: -28px !important; margin-bottom: -22px !important; }";
			}
        $out .= "</style>\n";
		
		return $out;
		} // end private function _get_styles()
		
	// ----------------------------------------------------------------	
	
	private function _get_scripts($mysec) {
		$out = '
		<script type="text/javascript">
            /* This part fixes an issue with some pages not getting the corner() plugin loaded. **
            ** If corner does not exist, we create a plugin which does nothing, but prevents an error. */
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
		else if('filesync' == $mysec) {
			$out .= '/* Auto-select image manipulations and submit form when visiting sync page */';
			$out .= 'jQuery("input.toggle").prop("checked","checked");';
			$out .= 'jQuery("#sync form input[type=\'submit\']").eq(0).click();';
			$out .= 'jQuery(".rightNav:first").append("<a class=\'backlink\' href=\'javascript: history.go(-1)\'>&#0171; Back to Directory Listing</a>")';
			}
                
        $out .= '
                });
            </script>
            ';
		
		return $out;
		} // end private function _get_scripts()
		

}
 
/* End of file acc.alt_quickfixes.php */
/* Location: /system/expressionengine/third_party/alt_quickfixes/acc.alt_quickfixes.php */