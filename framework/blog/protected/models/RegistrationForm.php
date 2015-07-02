<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class RegistrationForm extends CFormModel
{
	public $first_name;
	public $email;
	public $last_name;
	public $password;
	public $repeat_password;
	public $verifyCode;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// name, email, subject and body are required
			array('first_name, repeat_password, last_name, password,email', 'required'),
			// email has to be a valid email address
			array('email', 'email'),
			array('email', 'uniqueEmail','message'=>'Email already exists!'),
			array('repeat_password', 'compare', 'compareAttribute'=>'password'),
			// verifyCode needs to be entered correctly
			array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements())
		);
	}
	public function uniqueEmail($attribute, $params)
	{
		if($user = User::model()->exists('email=:email',array('email'=>$this->email)))
			$this->addError($attribute, 'Email already exists!');
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
			'verifyCode'=>'Verification Code',
		);
	}



}