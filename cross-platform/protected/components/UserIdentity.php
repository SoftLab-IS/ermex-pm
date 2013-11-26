<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
    /**
     * @var bool Specifies whether or not user is active.
     */
    public $notActive = false;


	/**
	 * Authenticates a user.
     *
     * @author Aleksandar Panic
     *
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
        $user = Users::model()->getUser($this->username, $this->password);

        if ($user == null)
        {
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
            return false;
        }
        else
        {
            if ($user->privilegeLevel == 0)
            {
                $this->errorCode = 3;
                return false;
            }

            Yii::app()->session['id'] = $user->usId;
            Yii::app()->session['level'] = $user->privilegeLevel;
            Yii::app()->session['fullname'] = $user->realName + " " + $user->realSurname;

            Config::model()->setLoginedByUserId($user->usId);

            $this->errorCode = self::ERROR_NONE;
            return true;
        }
	}
}