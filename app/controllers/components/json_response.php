<?php

class JsonResponseComponent extends Object {
	
	public $success = false;
	public $messages = array();
	public $errors = array();
	public $data = array();
	
	public function isSuccess($success = null) {
		if(!is_null($success)) {
			$this->success = $success;
		}
		return $this->success;
	}
	
	public function setMessages($messages) { 
		$this->messages = $messages;
	}
	
	public function addMessage($message) { 
		$this->messages[] = $message;
	}
	
	public function setErrors($errors) { 
		$this->errors = $errors;
	}
	
	public function addError($error) {
		$this->errors[] = $error;
	}
	
	public function setData($data) {
		$this->data = $data;
	}
	
	public function encode() {
		$result = array(
			"success" => $this->success,
			"messages" => $this->messages,
			"errors" => $this->errors,
			"data" => $this->data
		);
		
		return json_encode($result);
	}
	
}