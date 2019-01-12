<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "Metas".
 *
 * @property int $id
 * @property int $idCategoria
 * @property string $descricao
 * @property double $valorPrevisto
 * @property double $valorGasto
 * @property string $dataVencimento
 * @property int $status
 *
 * @property Categoria $categoria
 */
class Metas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Metas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idCategoria', 'status'], 'integer'],
            [['valorPrevisto', 'valorGasto'], 'number'],
            [['dataVencimento'], 'safe'],
            [['descricao'], 'string', 'max' => 255],
            [['idCategoria'], 'exist', 'skipOnError' => true, 'targetClass' => Categoria::className(), 'targetAttribute' => ['idCategoria' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idCategoria' => 'Categoria',
            'descricao' => 'Descricao',
            'valorPrevisto' => 'Valor Previsto',
            'valorGasto' => 'Valor Gasto',
            'dataVencimento' => 'Data Vencimento',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoria()
    {
        return $this->hasOne(Categoria::className(), ['id' => 'idCategoria']);
    }
}
