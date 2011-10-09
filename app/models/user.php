<?php
class User extends AppModel {
	var $name = 'User';
	var $validate = array(
		'username' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'password' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'email' => array(
			'email' => array(
				'rule' => array('email'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'role' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	
	
	public function attachPasswordMatchValidation() {
		$this->validate[] = array(
			"confirm_password" => array(
				'rule' => array('passwordsMatchRule'),
				'message' => 'Passwords do not match.'
			)
		);
	}
	
	public function passwordsMatchRule($check) {
		if($this->data[$this->name]["password"] == $this->data[$this->name][$check]) {
			return true;
		}
		return false;
	}
	
	public function createUser($data) {
		$this->attachPasswordMatchValidation();
		$this->save($data);
	}
	
	/**
	 * Hook for hashing the password before saving.
	 * @return boolean  true on successful save
	 */
	public function beforeSave() 
	{
	    if(isset($this->data["password"])) 
	    {
	        $this->data["password"] = Security::hash($this->data["password"],null,true);
	    }
	    return true;
	}


}
?>