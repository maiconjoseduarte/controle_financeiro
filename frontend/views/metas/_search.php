<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Categoria;
use yii\helpers\Url;
use common\widgets\Select2Factory;
use kartik\money\MaskMoney;
use kartik\datecontrol\DateControl;

/* @var $this yii\web\View */
/* @var $model frontend\models\MetasSearch */
/* @var $form yii\widgets\ActiveForm */

$selectedCategoria = [];
$selectedCategoria = Categoria::select2Data(null, $model->id);
$categoriaListUrl = Url::to(['list-menus']);
?>

<div class="box-search-controle">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

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
                    'thousands' => '.',
                    'decimal' => ',',
                    'suffix' => '',
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
            <?= $form->field($model, 'status')->dropDownList(\frontend\models\MetasSearch::$STATUS) ?>
        </div>
    </div>

    <br>
    <div class="form-group">
    <?php echo Html::submitButton("<i class='fa fa-filter'> Pesquisar</i>", ['class' => 'btn btn-primary']) ?>
        <?= Html::a("<i class='fa fa-plus'> Cadastrar</i>",['create'], ['class' => 'btn btn-success', 'style' => ' margin: 3px;']) ?>

        <?php // echo Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
