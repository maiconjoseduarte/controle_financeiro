<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\CategoriaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box-search-controle">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'nome') ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton("<i class='fa fa-filter'> Pesquisar</i>", ['class' => 'btn btn-primary']) ?>
        <?= Html::a("<i class='fa fa-plus'> Cadastrar</i>", ['create'],['class' => 'btn btn-success']) ?>
        <?php // echo Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
