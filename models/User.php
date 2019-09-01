<?php
/**
 * Created by PhpStorm.
 * User: Альберт
 * Date: 28.08.2019
 * Time: 14:41
 */

namespace app\models;
use yii\db\ActiveRecord;

class User extends ActiveRecord
{
    public static function tableName()
    {
        return 'User';
    }
}