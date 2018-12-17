<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Faculdade;

/**
 * FaculdadeSearch represents the model behind the search form of `frontend\models\Faculdade`.
 */
class FaculdadeSearch extends Faculdade
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'semestre', 'parcela'], 'integer'],
            [['nome', 'dataVencimento', 'dataPagamento', 'dataCriacao'], 'safe'],
            [['valor', 'valorPago'], 'number'],
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
        $query = Faculdade::find();

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
            'semestre' => $this->semestre,
            'parcela' => $this->parcela,
            'dataVencimento' => $this->dataVencimento,
            'valor' => $this->valor,
            'dataPagamento' => $this->dataPagamento,
            'valorPago' => $this->valorPago,
            'dataCriacao' => $this->dataCriacao,
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome]);

        return $dataProvider;
    }
}
