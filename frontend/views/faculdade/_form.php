<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datecontrol\DateControl;

/* @var $this yii\web\View */
/* @var $model frontend\models\Faculdade */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="faculdade-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'semestre')->textInput() ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'parcela')->textInput() ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'dataVencimento')->widget(DateControl::className(), [
                'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
                'displayFormat' => 'php: d/M/Y',
                'options' => [
                    'removeButton' => false,
                    'pluginOptions' => [
                        'startView' => 1,
                        'minViewMode' => 1
                    ]
                ]
            ]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'valor')->textInput() ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'dataPagamento')->widget(DateControl::className(), [
                'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
                'displayFormat' => 'php: d/M/Y',
                'options' => [
                    'removeButton' => false,
                    'pluginOptions' => [
                        'startView' => 1,
                        'minViewMode' => 1
                    ]
                ]
            ]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'valorPago')->textInput() ?>
        </div>

    </div>

    <div class="form-group">
        <?= Html::submitButton('Salvar', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Voltar', ['index'],['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
