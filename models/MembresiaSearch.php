<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Membresia;

/**
 * MembresiaSearch represents the model behind the search form about `app\models\Membresia`.
 */
class MembresiaSearch extends Membresia
{

    public $Estado;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idMembresia', 'idEstado', 'idUsuarioCreo', 'meses'], 'integer'],
            [['Nombre', 'fechaCreacion', 'horaInicio', 'horaFinal', 'Estado'], 'safe'],
            [['Precio'], 'number'],
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
        $query = Membresia::find()->where(['!=', 'idEstado', 3])->andWhere(['!=', 'idMembresia', 1]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith(['idEstado0']);
        

        $query->andFilterWhere([
            'idMembresia' => $this->idMembresia,
            'idEstado' => $this->idEstado,
            'fechaCreacion' => $this->fechaCreacion,
            'Precio' => $this->Precio,
            'idUsuarioCreo' => $this->idUsuarioCreo,
            'meses' => $this->meses,
            'horaInicio' => $this->horaInicio,
            'horaFinal' => $this->horaFinal,
        ]);

        $query->andFilterWhere(['like', 'Nombre', $this->Nombre])
              ->andFilterWhere(['like', 'Estado', $this->Estado]);

        return $dataProvider;
    }
}
