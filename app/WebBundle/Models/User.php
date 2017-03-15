<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/10
 * Time: 10:27
 */
namespace  App\WebBundle\Models;

use Illuminate\Database\Eloquent\Model;


class User extends  Model{

    protected $table = 'user';

    protected $fillable = [
        'email',
        'name',
        'password',
    ];

    public function setPassword($password)
    {
        $this->update([
            'password' => password_hash($password,PASSWORD_DEFAULT)
        ]);
    }

}