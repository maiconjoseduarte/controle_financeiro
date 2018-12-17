<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Faculdade */

$this->title = 'Atualizar: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Faculdades', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Atualizar';
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
