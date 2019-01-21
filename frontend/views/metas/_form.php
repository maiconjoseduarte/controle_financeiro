<?php

use frontend\models\Categoria;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use common\widgets\Select2Factory;
use kartik\datecontrol\DateControl;
use kartik\money\MaskMoney;

/* @var $this yii\web\View */
/* @var $model frontend\models\Metas */
/* @var $form yii\widgets\ActiveForm */

$selectedCategoria = [];
$selectedCategoria = Categoria::select2Data(null, $model->id);
$categoriaListUrl = Url::to(['list-menus']);
?>

<div class="metas-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-3">
            <?= Select2Factory::field($form, $model,
                'idCategoria',
                null,
                $selectedCategoria,
                'Selecione',
                false,
                0,
                $categoriaListUrl)?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'descricao') ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'valorPrevisto')->widget(MaskMoney::className(), [
                'pluginOptions' => [
                    'prefix' => 'R$ ',
                    'thousands' => '.',
                    'decimal' => ',',
                    'suffix' => '',
                    'allowNegative' => false
                ]
            ]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'valorGasto')->widget(MaskMoney::className(), [
                'pluginOptions' => [
                    'prefix' => 'R$ ',
                    'suffix' => '',
                    'thousands' => '.',
                    'decimal' => ',',
                    'allowNegative' => false
                ]
            ]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'dataVencimento')->widget(DateControl::classname(), [
                'type' => DateControl::FORMAT_DATE,
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
            <?php
            $status = \frontend\models\MetasSearch::$STATUS;
            unset($status[3]);
            echo $form->field($model, 'status')->dropDownList($status) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'observacoes')->textarea() ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Salvar', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Voltar', ['index'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
