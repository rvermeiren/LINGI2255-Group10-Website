<?php

/**
 * Magic Members sendy autoresponder module
 *
 * @package MagicMembers
 * @since 1.0
 */

class mgm_sendy extends mgm_autoresponder{

	// construct
	function __construct(){
		// php4 construct
		$this->mgm_sendy();
	}	

	// construct
	function mgm_sendy(){
		// parent
		parent::__construct();

		// set code
		$this->code = __CLASS__; 

		// set module
		$this->module = str_replace('mgm_', '', $this->code);

		// set name
		$this->name = 'Sendy';

		// desc
		$this->description = __('Sendy Desc','mgm');		

		// set path
		parent::set_tmpl_path();	

		// read settings
		$this->read();
	}	

	// settings api hook
	function settings(){

		global $wpdb;

		// data
		$data = array();		

		// set 
		$data['module']           = $this;

		// fields
		$data['custom_fields']    = $this->_get_custom_fields();

		// membership types
		$data['membership_types'] = $this->_get_membership_types();		

		// load template view
		return $this->load->template('settings', array('data'=>$data), true);
	}	

	

	// settings_box
	function settings_box(){

		global $wpdb;

		// data
		$data = array();	

		// set 
		$data['module'] = $this;

		// load template view
		return $this->load->template('settings_box', array('data'=>$data), true);
	}

	

	// update

	function settings_update(){

		// form type 
		switch($_POST['setting_form']){

			case 'main':
			// form main

				// set fields
				$this->setting['api_key'] 		= $_POST['setting']['api_key'];
				
				$this->setting['list_id']       = $_POST['setting']['list_id'];

				$this->setting['post_url']      = $_POST['setting']['post_url'];

				$this->setting['unsubscribe_post_url'] = $_POST['setting']['unsubscribe_post_url'];

				// fieldmap

				$this->setting['fieldmap']      = $this->_make_assoc($_POST['setting']['fieldmap']);

				// membershipmap

				$this->setting['membershipmap'] = $this->_make_assoc($_POST['setting']['membershipmap']);

				// update enable/disable

				$this->enabled                  = $_POST['enabled']; 

				// enable/disable method

				$activate_method = bool_from_yn($this->enabled) ? 'activate_module' : 'deactivate_module';				

				// update

				$ret = call_user_func_array(array(mgm_get_class('system'),$activate_method),array($this->code,$this->type));					

				// save object options

				$this->save();								

				// message				

				return json_encode(array('status'=>'success','message'=>sprintf(__('%s settings updated','mgm'),$this->name)));

			break;			

			case 'box':

			default:

			// from box

				// set fields
				$this->setting['api_key']   = $_POST['setting']['sendy']['api_key'];
				
				$this->setting['list_id'] 	= $_POST['setting']['sendy']['list_id'];

				$this->setting['post_url']	= $_POST['setting']['sendy']['post_url'];				

				$this->setting['unsubscribe_post_url']	= $_POST['setting']['sendy']['unsubscribe_post_url'];				

				// save

				$this->save();

				// message	

				return json_encode(array('status'=>'success','message'=>sprintf(__('%s settings updated','mgm'), $this->name)));

			break;			

		}		

	}

	

	// set postfields

	function set_postfields($user_id){

		// validate
		if(!isset($this->setting['api_key']) && !isset($this->setting['list_id']) && !isset($this->setting['post_url'])){
		
			return false;

		}		

		// userdata	
		$userdata = $this->_get_userdata($user_id);	

		// set
		$this->postfields = array(

			'list'    => $this->setting['list_id'], // default

			'email'   => $userdata['email'],

			'boolean' => 'true'

		);			

		// set extra postfields, not for unsubscribe
		if($this->method != 'unsubscribe') $this->_set_extra_postfields($userdata, 'list');				

		// return
		return true;
	}	

	// validate
	function validate(){

		// errors
		$errors = array();
		
		// check
		if(empty($_POST['setting']['sendy']['api_key'])){
			$errors[] = __('API Key is required','mgm'); 
		}

		// check

		if(empty($_POST['setting']['sendy']['list_id'])){
			$errors[] = __('List Id is required','mgm'); 
		}

		// check		

		if(empty($_POST['setting']['sendy']['post_url'])){
			$errors[] = __('Post Url is required','mgm'); 
		}		

		// return
		return count($errors) == 0 ? false : $errors;
	}

	

	// get endpoint

	function get_endpoint($method='subscribe'){

		// by method post url
		if(isset($this->setting[$method . '_post_url'])) $post_url = $this->setting[$method . '_post_url'];

		else $post_url = $this->setting['post_url'];

		// set 
		$this->set_endpoint($method, $post_url);	

		// return
		return parent::get_endpoint($method);

	}

	// user subscribe to the Sendy list
	function subscribe($user_id){	
		// set method
		$this->set_method('subscribe');	
		// set params, to be overridden by child class		
		if($this->set_postfields($user_id)){
			// transport			
			return $this->_transport($user_id);
		}
		// return
		return false;
	}

	// user unsubscribe from the Sendy list
	function unsubscribe($user_id){	
		// set method
		$this->set_method('unsubscribe');
		// set params
		if($this->set_postfields($user_id)){
			// transport
			return $this->_transport($user_id);
		}

		// return 
		return false;
	}	
}

// end of file core/modules/autoresponder/mgm_sendy.php