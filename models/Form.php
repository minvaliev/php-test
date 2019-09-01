<?php
/**
 * Created by PhpStorm.
 * User: Альберт
 * Date: 27.08.2019
 * Time: 23:43
 */

namespace app\models;


use yii\base\Model;
use app\models\User;

class Form extends Model
{
    public $surname;
    public $birth;
    public $phone;
    public $email;
    public $car;

    public function rules()
    {
        return [
            [['surname','birth','phone','car'],'required'],
            ['surname', 'match', 'pattern' => '^[А-Я](\S-|\S)\w*$'],
            ['email', 'match', 'pattern' => '\w*\w*\.\w*'],
        ];
    }
}

