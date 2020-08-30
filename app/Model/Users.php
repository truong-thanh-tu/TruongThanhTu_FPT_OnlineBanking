<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'IDCustomer';
    protected $guarded = [];
    protected $perPage = 5;

    public static function all($columns = ['*'])
    {
        return parent::all($columns)->where('deleted', false);
    }

    public function typeAccountCustomer()
    {
        return $this->hasMany(TypeAccountCustomer::class, 'IDCustomer', 'IDCustomer');
    }

    /**
     * Function checks login from the user
     * @param $useLogin
     * @param $passLogin
     * @return bool
     *
     */
    public function checkLogin($useLogin, $passLogin)
    {

        $getDataUsers = $this->all();


        if ($getDataUsers != null) {
            foreach ($getDataUsers as $getDataUser) {
                /* Use the password_verify: function to compare the encrypted value*/
                if ($getDataUser->User == $useLogin && password_verify($passLogin, $getDataUser->Pass)) {
                    $this->countEnterWrong($useLogin, true);
                    return true;
                }
            }
        }

        $this->countEnterWrong($useLogin, false);
        return false;
    }

    /**
     * Funtion Count incorrect logins and updates
     * @param $useLogin
     * @param $active
     */
    public function countEnterWrong($useLogin, $active)
    {
        $getDataUserCheck = $this->where('User', $useLogin)->select('IDCustomer', 'Turn')->first();

        if ($active) {
            $getValue = 0;
            $getDataObjLogin = $this->find($getDataUserCheck->IDCustomer);
            $getDataObjLogin->Turn = $getValue;
            $getDataObjLogin->save();
        } else {
            $getValue = $getDataUserCheck->Turn;
            if ($getValue == 3) {
                $getDataObjLogin = $this->find($getDataUserCheck->IDCustomer);
                $getDataObjLogin->deleted = true;
                $getDataObjLogin->save();
            } else {
                $getDataObjLogin = $this->find($getDataUserCheck->IDCustomer);
                $getDataObjLogin->Turn = $getDataObjLogin->Turn + 1;
                $getDataObjLogin->save();
            }
        }
    }

    public function getDataUser($username)
    {
        return $this->where('User', $username)->first();
    }
}
