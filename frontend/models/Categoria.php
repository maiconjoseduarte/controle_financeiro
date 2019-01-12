<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "Categoria".
 *
 * @property int $id
 * @property string $nome
 *
 * @property Metas[] $metas
 */
class Categoria extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Categoria';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMetas()
    {
        return $this->hasMany(Metas::className(), ['idCategoria' => 'id']);
    }
}
