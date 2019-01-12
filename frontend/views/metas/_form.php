<?php

use frontend\models\Categoria;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use common\widgets\Select2Factory;

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
        <?= Html::submitButton('Salvar', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Voltar', ['index'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
