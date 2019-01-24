<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Categoria */

$this->title = 'Atualizar Categoria: ' . $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Categorias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box-controle">

    <div class="box-header-controle">
        <h2><?= Html::encode($this->title) ?></h2>
    </div>

    <div class="box-body-controle">

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>

</div>
