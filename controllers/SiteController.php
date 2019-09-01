<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Form;
use app\models\User;
use \yii\widgets\ActiveForm;


class SiteController extends Controller
{
    public function actionIndex()
    {
        $model = new Form();
        $user = User::find()->all();
        return $this->render('index', ['model' => $model, 'user' => $user]);
    }

    public function actionPage()
    {
        $model = new Form();
        $user = new User();

        if(Yii::$app->request->isAjax && $model->load(\Yii::$app->request->post())){

            $db = User::find()->where(['phone' => $_POST['Form']['phone']])->one();
            if ($db) {
                Yii::$app->session->setFlash('success', "Пользователь с таким номером телефона существует! Повторите попытку.");
                return $this->render('index',['model' => $model]);
            }
            else {
                $phone = $_POST['Form']['phone'];
                $phone_quan = strlen((string)$phone);

                $user->surname = $_POST['Form']['surname'];
                $user->birth = $_POST['Form']['birth'];

                if ($phone_quan == 10 || $phone_quan == 11) {
                    $user->phone = 89995555555;
                }
                elseif ($phone_quan == 7) {
                    $user->phone = 88435555555;
                }
                else {
                    $user->phone = $_POST['Form']['phone'];
                }

                $user->email = $_POST['Form']['email'];
                $user->car = $_POST['Form']['car'];
                $user->save();
                Yii::$app->session->setFlash('save', "Пользователь сохранён в БД!");
                return $this->render('index',['model' => $model]);
            }
        }
        return $this->render('index', compact('model'));
    }
}
