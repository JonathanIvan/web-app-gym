<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Usuario;

/**
 * UsuarioSearch represents the model behind the search form about `app\models\Usuario`.
 */
class UsuarioSearch extends Usuario
{
    public $Estado;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idUsuario', 'idEstado'], 'integer'],
            [['Usuario', 'Nombre', 'fechaCreacion', 'Password', 'Token', 'Estado'], 'safe'],
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
        $query = Usuario::find()->where(['<>', 'idEstado', 3]);


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
            'idUsuario' => $this->idUsuario,
            'idEstado' => $this->idEstado,
            'fechaCreacion' => $this->fechaCreacion,
        ]);

        $query->andFilterWhere(['like', 'Usuario', $this->Usuario])
            ->andFilterWhere(['like', 'Nombre', $this->Nombre])
            ->andFilterWhere(['like', 'Estado', $this->Estado])
            ->andFilterWhere(['like', 'Password', $this->Password])
            ->andFilterWhere(['like', 'Token', $this->Token]);

        return $dataProvider;
    }
}
