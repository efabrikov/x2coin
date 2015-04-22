<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Investment;

/**
 * InvestmentSearch represents the model behind the search form about `backend\models\Investment`.
 */
class InvestmentSearch extends Investment
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'created_at', 'updated_at', 'status', 'pay_at'], 'integer'],
            [['cwa', 'swa', 'tx_hash', 'currency'], 'safe'],
            [['deposit_amount', 'pay_amount'], 'number'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Investment::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'pay_at' => $this->pay_at,
            'status' => $this->status,
            'deposit_amount' => $this->deposit_amount,
            'pay_amount' => $this->pay_amount,
        ]);

        $query->andFilterWhere(['like', 'cwa', $this->cwa])
            ->andFilterWhere(['like', 'swa', $this->swa])
            ->andFilterWhere(['like', 'tx_hash', $this->tx_hash])
            ->andFilterWhere(['like', 'currency', $this->currency]);

        return $dataProvider;
    }
}
