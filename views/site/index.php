<div class="form-content">
    
<?php
$this->title = 'php-test';
?>

<?php
use \yii\widgets\ActiveForm;
use yii\helpers\Html;

?>

    <?php if( Yii::$app->session->hasFlash('success') ): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo Yii::$app->session->getFlash('success'); ?>
        </div>
    <?php endif;?>

    <?php if( Yii::$app->session->hasFlash('save') ): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo Yii::$app->session->getFlash('save'); ?>
        </div>
    <?php endif;?>


<?php
$form = ActiveForm::begin([
    'class'=>'form-horizontal',
]);
?>

    <?= $form->field($model,'surname')->textInput(['autofocus'=>true])->label('Фамилия') ?>
    
    <?= $form->field($model, 'birth', [
        'inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control transparent']
    ])->textInput()->input('birth', ['placeholder' => "xx-xx-xxxx"])->label('Дата рождения'); ?>

    <?= $form->field($model, 'phone')->textInput(); ?>

    <?= $form->field($model,'email')->textInput()?>

<!--    --><?//= $form->field($model,'car')->textInput()?>

    <?= $form->field($model, 'car')->dropDownList([
        'Mersedes' => 'Mersedes',
        'BMW' => 'BMW',
        'Audi'=>'Audi',
        'Ford' => 'Ford',
        'Lada' => 'Lada',
    ]); ?>

<?= Html::submitButton('Сохранить', ['class' =>'btn btn-success'])?>

    <a class="btn btn-primary" href="/admin">Список пользователей</a>

<?php
ActiveForm::end();
?>

</div>

    <?php
    $js = <<<JS
        $('form').on('beforeSubmit', function(){
        var data = $(this).serialize();
        $.ajax({
            url: '/site/page',
            type: 'POST',
            data: data,
            success: function(res){
                console.log(res);
                 $("body").html(res);
                 $('input[type="text"]').val('');
            },
            error: function(){
                alert('Error!');
            }
        });
        return false;
    });
JS;

    $this->registerJs($js);
    ?>


<!-- --><?php
//  echo '<pre>';
//  var_dump($user);
//  echo '</pre>';
//?>