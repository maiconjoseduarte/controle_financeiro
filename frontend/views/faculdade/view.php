<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Faculdade */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Faculdades', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box-controle">

    <div class="box-header-controle">
        <h2><?= Html::encode($this->title) ?></h2>
    </div>
    <div class="box-body-controle">
        <p>
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'nome',
                'semestre',
                'parcela',
                'dataVencimento',
                'valor',
                'dataPagamento',
                'valorPago',
                'dataCriacao',
            ],
        ]) ?>
    </div>
</div>
