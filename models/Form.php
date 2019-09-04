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
            ['surname', 'match', 'pattern' => '^[А-ЯA-Z](\S-|\S)\w*$'],
            ['email', 'match', 'pattern' => '\w*\w*\.\w*'],
//            ['birth', 'match', 'pattern' => '/\d{4}(-|\/)\d{2}(-|\/)\d{2}/'],
            ['birth', 'match', 'pattern' => '/^(((((1[26]|2[048])00)|[12]\d([2468][048]|[13579][26]|0[48]))-((((0[13578]|1[02])-(0[1-9]|[12]\d|3[01]))|((0[469]|11)-(0[1-9]|[12]\d|30)))|(02-(0[1-9]|[12]\d))))|((([12]\d([02468][1235679]|[13579][01345789]))|((1[1345789]|2[1235679])00))-((((0[13578]|1[02])-(0[1-9]|[12]\d|3[01]))|((0[469]|11)-(0[1-9]|[12]\d|30)))|(02-(0[1-9]|1\d|2[0-8])))))$/'],
        ];
    }
}

