<?php

use common\components\Icones;
use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\MetasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Metas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box-controle">
    <div class="box-header-controle">
        <h2 class="title-header"><i class="fa fa-globe"></i> <?= Html::encode($this->title) ?></h2>
    </div>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="box-body-controle">
        <?= Html::a("<i class='fa fa-plus'> Cadastrar</i>",['create'], ['class' => 'btn btn-success', 'style' => 'float: right; margin: 3px;']) ?>
        <br>
        <?php echo $this->render('_search', ['model' => $searchModel]); ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'summary' => '',
            'hover' => true,
            'bordered' => false,
//            'filterModel' => $searchModel,
            'columns' => [
                [
                    'attribute' => 'idCategoria',
                    'value' => function ($model) {
                        /** @var \frontend\models\Categoria $nomeCategoria */
                        $nomeCategoria = \frontend\models\Categoria::find()->where(['id' => $model->idCategoria])->one();

                        if (!empty($nomeCategoria)) {
                            return $nomeCategoria->nome;
                        }

                        return null;
                    }
                ],
                'descricao',
                [
                    'attribute' => 'valorPrevisto',
//                    'format' => 'currency',

                ],
                'valorGasto',
                'dataVencimento',
                [
                    'attribute' => 'status',
                    'format' => 'html',
                    'value' => function ($model) {
                        $status = '';
                        $labelColor = 'bg-green';
                        $r = 'red';

                        if ($model->status == 0) {
                            $labelColor = 'bg-blue';
                            $status = 'Pendente';
                        } else if ($model->status == 1) {
                            $labelColor = 'bg-gray';
                            $status = 'Em andamento';
                        } else {
                            $status = 'Concluido';
                        }

                        $result = "<span class='point $labelColor' style='font-size: small'></span> $status";
//                        $result = "<span class='point bg-danger'></span> $status ";
                        return $result;
                    }
                ],

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
            ],
        ]); ?>
    </div>
</div>
