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
            [['nome'], 'required'],
            [['nome'], 'string', 'min' => 2, 'max' => 255],
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

    /**
     * @param null $searchTerm
     * @param null $ids
     * @return array
     */
    static public function select2Data($searchTerm = null, $ids = null){
        $results = [];

        $query = Categoria::find();

        if (!is_null($searchTerm)) {
            $query->andWhere(['like', 'nome', $searchTerm])->limit(50);
        }

        $query->orderBy(['nome' => SORT_ASC]);

        $categorias = $query->all();

        /** @var Categoria[] $categorias */
        foreach($categorias as $categoria){
            $results[] = ['id' => $categoria->id, 'text' => "{$categoria->nome} "];
        }

        return $results;
    }
}
