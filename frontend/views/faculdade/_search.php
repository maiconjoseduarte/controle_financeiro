<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\FaculdadeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box-search-controle">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'nome')->dropDownList(\frontend\models\Faculdade::$NOMES, ['prompt' => 'Selecione']) ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'semestre')->dropDownList(\frontend\models\Faculdade::$SEMESTRE, ['prompt' => 'Selecione']) ?>
        </div>

        <div class="col-md-3">

        </div>
    </div>






    <?php // $form->field($model, 'parcela') ?>

    <?php // $form->field($model, 'dataVencimento') ?>

    <?php // echo $form->field($model, 'valor') ?>

    <?php // echo $form->field($model, 'dataPagamento') ?>

    <?php // echo $form->field($model, 'valorPago') ?>

    <?php // echo $form->field($model, 'dataCriacao') ?>

    <div class="form-group">
        <?= Html::submitButton("<i class='fa fa-filter'> Pesquisar</i>", ['class' => 'btn btn-primary']) ?>
        <?= Html::a("<i class='fa fa-plus'> Cadastrar</i>",['create'], ['class' => 'btn btn-success', 'style' => ' margin: 3px;']) ?>

        <?php // Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
