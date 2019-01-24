<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use common\components\Icones;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CategoriaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categoria';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box-controle">
    <div class="box-header-controle">
        <h2 class="title-header"><i class="fa fa-globe"></i> <?= Html::encode($this->title) ?></h2>
    </div>

    <div class="box-body-controle">
        <?php echo $this->render('_search', ['model' => $searchModel]); ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
//            'filterModel' => $searchModel,
            'summary' => '',
            'hover' => true,
            'bordered' => false,
            'columns' => [
                [
                    'class' => '\yii\grid\ActionColumn',
                    'header' => 'Ações',
                    'headerOptions' => ['style' => 'color:#337ab7'],
                    'template' => '{view} {update} {delete}',
                    'buttons' => [
                        'view' => function ($url, $model) {
                            return Html::a('<span class="'. Icones::VISUALIZAR .'"> </span>', $url , [
                                'title' => 'Exibir',
//                            'onclick' => 'openModal("' . $url . '", false, true, "")',
                                'class' => 'btn btn-default btn-sm',
                            ]);
                        },
                        'update' => function ($url, $model) {
                            return Html::a('<span class="'. Icones::EDITAR .'"> </span>', $url, [
                                'class' => 'btn btn-warning btn-sm',
                                'disabled' => true
                            ]);
                        },
                        'delete' => function ($url, $model) {
                            return Html::a('<span class="'. Icones::EXCLUIR .'"> </span>', $url, [
                                'class' => 'btn btn-danger btn-sm',
                                'title' => 'Apagar',
                                'data-method' => 'post',
                                'data-confirm' => Yii::t('yii', 'Confima a exclusão deste item?'),
                            ]);
                        },
                        'urlCreator' => function ($action, $model) {
                            if ($action === 'view') {
                                return Url::to(['view', 'id' => $model->id]);

                            }
                            elseif ($action === 'update') {
                                return Url::to(['update', 'id' => $model->id]);

                            } elseif ($action === 'delete') {
                                return Url::to(['delete', 'id' => $model->id]);
                            }
                        }
                    ],
                ],
                'id',
                'nome',
            ],
        ]); ?>
    </div>
</div>
