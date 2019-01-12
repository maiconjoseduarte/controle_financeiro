<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\MetasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box-search-controle">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'idCategoria') ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'descricao') ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'valorPrevisto') ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'valorGasto') ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'dataVencimento') ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'status') ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
