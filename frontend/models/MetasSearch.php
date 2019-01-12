<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Metas;

/**
 * MetasSearch represents the model behind the search form of `frontend\models\Metas`.
 */
class MetasSearch extends Metas
{
    public $status;

    public static $STATUS = [
        3 => 'Todos',
        0 => 'Pendente',
        1 => 'Em andamento',
        2 => 'Concluido',
    ];

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'idCategoria'], 'integer'],
            [['descricao', 'dataVencimento'], 'safe'],
            [['valorPrevisto', 'valorGasto'], 'number'],
            [['status'], 'in', 'range' => array_keys(self::$STATUS)]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Metas::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'idCategoria' => $this->idCategoria,
            'valorPrevisto' => $this->valorPrevisto,
            'valorGasto' => $this->valorGasto,
            'dataVencimento' => $this->dataVencimento,
//            'status' => $this->status,
        ]);

        if ($this->status != 3) {
            $query->andFilterWhere([
                'status' => $this->status
            ]);
        }

        $query->andFilterWhere(['like', 'descricao', $this->descricao]);

        return $dataProvider;
    }
}
