<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Categoria;
use yii\helpers\Url;
use common\widgets\Select2Factory;

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
            <?= $form->field($model, 'status')->dropDownList(\frontend\models\MetasSearch::$STATUS) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Pesquisar', ['class' => 'btn btn-primary']) ?>
        <?php // echo Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
