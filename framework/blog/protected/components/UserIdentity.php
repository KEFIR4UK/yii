<?php
/**
 * Created by PhpStorm.
 * User: roma
 * Date: 01.07.15
 * Time: 11:15
 */

class UserIdentity extends CUserIdentity
{
    private $_id;
    public function authenticate()
    {
        $record=User::model()->findByAttributes(array('email'=>$this->username));
        if($record===null)

            $this->errorCode=self::ERROR_USERNAME_INVALID;
        else if($record->password!==md5($this->password))

            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        else
        {
            $this->_id=$record->id;
            $this->errorCode=self::ERROR_NONE;
        }
        return !$this->errorCode;
    }

    public function getId()
    {
        return $this->_id;
    }
}