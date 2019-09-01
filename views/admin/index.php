<div class="container">
<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <a class="btn btn-primary btn-user" href="/site">Назад</a>

    <h1>Пользователи</h1>

    <p>
<!--        --><?//= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'surname',
            'birth',
            'phone',
            'email:email',
            //'car',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
