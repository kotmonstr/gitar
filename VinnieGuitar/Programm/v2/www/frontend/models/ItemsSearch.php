<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Items;

/**
 * ItemsSearch represents the model behind the search form about `frontend\models\Items`.
 */
class ItemsSearch extends Items
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'cat_id', 'brend_id', 'material', 'pie', 'lad', 'inlay', 'q_volume', 'q_tone'], 'integer'],
            [['strings', 'anker', 'form', 'bridj', 'shema', 'add'], 'safe'],
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
        $query = Items::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'cat_id' => $this->cat_id,
            'brend_id' => $this->brend_id,
            'material' => $this->material,
            'pie' => $this->pie,
            'lad' => $this->lad,
            'inlay' => $this->inlay,
            'q_volume' => $this->q_volume,
            'q_tone' => $this->q_tone,
        ]);

        $query->andFilterWhere(['like', 'strings', $this->strings])
            ->andFilterWhere(['like', 'anker', $this->anker])
            ->andFilterWhere(['like', 'form', $this->form])
            ->andFilterWhere(['like', 'bridj', $this->bridj])
            ->andFilterWhere(['like', 'shema', $this->shema])
            ->andFilterWhere(['like', 'add', $this->add]);

        return $dataProvider;
    }
}
