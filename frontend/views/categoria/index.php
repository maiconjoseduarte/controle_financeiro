<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CategoriaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categoria';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box-controle">
    <div class="box-header-controle">
        <h2 class="title-header"><i class="fa fa-globe"></i><?= Html::encode($this->title) ?></h2>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php // echo Html::a('Create Categoria', ['create'], ['class' => 'btn btn-success']) ?>

    <div class="box-body-controle">
        <?= Html::a("<i class='fa fa-plus'> Cadastrar</i>",['create'], ['class' => 'btn btn-success', 'style' => 'float: right; margin: 3px;']) ?>
        <br>
        <?php echo $this->render('_search', ['model' => $searchModel]); ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
//            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'nome',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>
