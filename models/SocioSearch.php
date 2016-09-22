<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Socio;

/**
 * SocioSearch represents the model behind the search form about `app\models\Socio`.
 */
class SocioSearch extends Socio
{
    public $Estado;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idSocio', 'idEstado', 'idUsuarioCreo', 'idUsuario'], 'integer'],
            [['fechaCreacion', 'Nombre', 'Paterno', 'Materno', 'Telefono', 'Observaciones', 'foto', 'Estado'], 'safe'],
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
        $query = Socio::find()->where(['!=', 'idEstado', 3])->andWhere(['!=', 'idSocio', 1000]);

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
            'idSocio' => $this->idSocio,
            'idEstado' => $this->idEstado,
            'fechaCreacion' => $this->fechaCreacion,
            'idUsuarioCreo' => $this->idUsuarioCreo,
            'idUsuario' => $this->idUsuario,
        ]);

        $query->andFilterWhere(['like', 'Nombre', $this->Nombre])
            ->andFilterWhere(['like', 'Paterno', $this->Paterno])
            ->andFilterWhere(['like', 'Materno', $this->Materno])
            ->andFilterWhere(['like', 'Telefono', $this->Telefono])
            ->andFilterWhere(['like', 'Estado', $this->Estado])
            ->andFilterWhere(['like', 'Observaciones', $this->Observaciones])
            ->andFilterWhere(['like', 'foto', $this->foto]);

        return $dataProvider;
    }
}
