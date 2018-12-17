<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "Faculdade".
 *
 * @property int $id
 * @property string $nome
 * @property int $semestre
 * @property int $parcela
 * @property string $dataVencimento
 * @property double $valor
 * @property string $dataPagamento
 * @property double $valorPago
 * @property string $dataCriacao
 */
class Faculdade extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Faculdade';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['semestre', 'parcela'], 'integer'],
            [['dataVencimento', 'dataPagamento', 'dataCriacao'], 'safe'],
            [['valor', 'valorPago'], 'number'],
            [['nome'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'semestre' => 'Semestre',
            'parcela' => 'Parcela',
            'dataVencimento' => 'Data Vencimento',
            'valor' => 'Valor',
            'dataPagamento' => 'Data Pagamento',
            'valorPago' => 'Valor Pago',
            'dataCriacao' => 'Data Criacao',
        ];
    }
}
