<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class LoginForm extends CFormModel
{

	public $email;
	public $password;
	private $_identity;


	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// name, email, subject and body are required
			array('password,email', 'required'),
			array('password', 'authenticate'),

		);
	}
	public function authenticate($attribute,$params)
	{

		if(!$this->hasErrors())
		{

			$identity= new UserIdentity($this->email, $this->password);

			$identity->authenticate();


			switch($identity->errorCode)
			{

				case UserIdentity::ERROR_NONE: {

					Yii::app()->user->login($identity, 0);
					break;
				}
				case UserIdentity::ERROR_USERNAME_INVALID: {

					$this->addError('email','Пользователь не существует!');
					break;
				}
				case UserIdentity::ERROR_PASSWORD_INVALID: {

					$this->addError('password','Вы указали неверный пароль!');
					break;
				}
			}
		}
	}





}