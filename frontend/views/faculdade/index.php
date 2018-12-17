<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\FaculdadeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = ' Faculdade';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box-controle">
    <div class="box-header-controle">
        <h2 class="title-header"><i class="fa fa-globe"></i><?= Html::encode($this->title) ?></h2>
    </div>

    <div class="box-body-controle">
        <?= Html::a("<i class='fa fa-plus'></i>",['create'], ['class' => 'btn btn-success', 'style' => 'float: right; margin: 3px;']) ?>
        <br>
        <?php echo $this->render('_search', ['model' => $searchModel]); ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
//            'filterModel' => $searchModel,
            'columns' => [

                'nome',
                'semestre',
                'parcela',
                'dataVencimento',
                'valor',
                'dataPagamento',
                'valorPago',
                //'dataCriacao',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>
