<?php

use common\components\Icones;
use frontend\models\Metas;
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

        <?php echo $this->render('_search', ['model' => $searchModel]); ?>


        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'summary' => '',
            'hover' => true,
            'bordered' => false,
//            'filterModel' => $searchModel,
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
                    'hAlign' => 'right',
                    'value' => function ($model) {
                        /** @var Metas $model */
                        if ($model->valorPrevisto != null) {
                            return Yii::$app->formatter->asDecimal($model->valorPrevisto,2);
                        }

                        return null;
                    },
                ],
                [
                    'attribute' => 'valorGasto',
                    'hAlign' => 'right',
                    'value' => function ($model) {
                        /** @var Metas $model */
                        if ($model->valorGasto != null) {
                            return Yii::$app->formatter->asDecimal($model->valorGasto,2);
                        }

                        return null;
////                        return $model->dataVencimento ? $vencimentoFormatter->format(DateTimeUtils::dbStringToDatetime($model->vencimento)) : null;
//                        return Yii::$app->formatter->asDate(strtotime($model->dataVencimento),'php: d/m/Y');
                    },
                ],
                [
                    'attribute' => 'dataVencimento',
                    'hAlign' => 'center',
                    'format' => ['date', 'php:d/m/Y'],
//                    'value' => function ($model) {
//                        /** @var Metas $model */
////                        return $model->dataVencimento ? $vencimentoFormatter->format(DateTimeUtils::dbStringToDatetime($model->vencimento)) : null;
//                        return Yii::$app->formatter->asDate(strtotime($model->dataVencimento),'php: d/m/Y');
//                    },
                ],
                [
                    'attribute' => 'status',
                    'hAlign' => 'center',
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
                    'attribute' => 'status',
                    'hAlign' => 'center',
                    'format' => 'html',
                    'value' => function ($model) {
                        $status = '';
                        $labelColor = 'label-success';
                        $r = 'red';

                        if ($model->status == 0) {
                            $labelColor = 'label-warning';
                            $status = 'Pendente';
                        } else if ($model->status == 1) {
                            $labelColor = 'label-primary';
                            $status = 'Em andamento';
                        } else {
                            $status = 'Concluido';
                        }

                        $result = "<span class='label $labelColor'>$status</span>";
                        return $result;
                        return "<span class='label label-info'>Shipped</span>";
                    }
                ],
            ],
        ]); ?>
    </div>
</div>
