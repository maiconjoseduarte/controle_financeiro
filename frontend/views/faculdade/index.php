<?php

use frontend\models\Faculdade;
use yii\helpers\Html;
use kartik\grid\GridView;
use common\components\Icones;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\FaculdadeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = ' Faculdade somente teste';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box-controle">
    <div class="box-header-controle">
        <h2 class="title-header"><i class="fa fa-globe"></i><?= Html::encode($this->title) ?></h2>
    </div>

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
                    'attribute' => 'nome',
                    'value' => function ($model) {
                        /** @var Faculdade $model*/
                        if ($model->nome == \frontend\models\FaculdadeSearch::MAICON) {
                            return 'Maicon';
                        }

                        return 'Monica';
                    }
                ],
                [
                    'attribute' => 'semestre',
                    'value' => function ($model) {
                        /** @var Faculdade $model*/

                        return $model->semestre;
                    }
                ],
                'parcela',
                [
                    'attribute' => 'dataVencimento',
                    'hAlign' => 'center',
                    'format' => ['date', 'php:d/m/Y'],
                ],
                [
                    'attribute' => 'valor',
                    'hAlign' => 'right',
                    'value' => function ($model) {
                        /** @var Faculdade $model */
                        if ($model->valor != null) {
                            return Yii::$app->formatter->asDecimal($model->valor,2);
                        }

                        return null;
                    },
                ],
                [
                    'attribute' => 'dataPagamento',
                    'hAlign' => 'center',
                    'format' => ['date', 'php:d/m/Y'],
                ],
                [
                    'attribute' => 'valorPago',
                    'hAlign' => 'right',
                    'value' => function ($model) {
                        /** @var Faculdade $model */
                        if ($model->valorPago != null) {
                            return Yii::$app->formatter->asDecimal($model->valorPago,2);
                        }

                        return null;
                    },
                ],
                [
                    'label' => 'juros/descontos',
                    'format' => 'html',
                    'hAlign' => 'right',
                    'value' => function ($model) {
                        /** @var Faculdade $model */
                        $valor = $model->valor - $model->valorPago;

                        if ($valor > 0) {
                            return "<span style='color: green;'>{$valor}</span>";
                        } else {
                            return "<span style='color: red;'>{$valor}</span>";
                        }
                    },
                ],
                [
                    'attribute' => 'desconto',
                    'hAlign' => 'right',
                    'value' => function ($model) {
                        /** @var Faculdade $model */
                        if ($model->desconto != null) {
                            return Yii::$app->formatter->asDecimal($model->desconto,2);
                        }

                        return null;
                    },
                ],
                [
                    'attribute' => 'juros',
                    'hAlign' => 'right',
                    'value' => function ($model) {
                        /** @var Faculdade $model */
                        if ($model->juros != null) {
                            return Yii::$app->formatter->asDecimal($model->juros,2);
                        }

                        return null;
                    },
                ],
            ],
        ]); ?>
    </div>
</div>
