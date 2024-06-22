<?php

namespace app\models;

use Yii;
use yii\base\Model;

class RegistrationForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $password_confirmation;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['username', 'email', 'password', 'password_confirmation'], 'required'],
            [['username'], 'match', 'pattern' => '/^[a-zA-Zа-яА-Я]+$/u'],
            [['email'], 'email'],
            [['email'], 'unique', 'targetClass' => '\app\models\User'],
            [['password'], 'match', 'pattern' => '/^[a-zA-Z0-9]+$/'],
            [['password'], 'string', 'min' => 6],
            [['password_confirmation'], 'compare', 'compareAttribute' => 'password'],
        ];
    }

    /**
     * Registers a new user.
     * @return bool whether the user is registered successfully
     */
    public function register()
    {
        $user = new User();

        if ($this->validate()) {
            $user->username = $this->username;
            $user->email = $this->email;
            $user->password = Yii::$app->security->generatePasswordHash($this->password);

            if($user->save()){
                $auth = Yii::$app->authManager;
                $userRole = $auth->getRole('user');
                $auth->assign($userRole, $user->id);
                return true;
            }
            
        }
        return false;
    }
}
