<?php
loadModel('User');

class Login extends Model
{

    public function checkLogin()
    {
        $user = User::getOne(['email' => $this->email]);
        if ($user) {

            if($user->end_date){
                throw new AppException("Usuario esta desligado");
            }

            if (password_verify($this->password, $user->password)) {
                return $user;
            }
        }
        throw new AppException("Usuario e senha invalidos");
    }
}
