<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Faculdade */

$this->title = 'Novo Registro';
$this->params['breadcrumbs'][] = ['label' => 'Faculdade', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
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
