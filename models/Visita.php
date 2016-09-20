<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "visita".
 *
 * @property integer $idVisita
 * @property integer $idSocio
 * @property string $fechaCreacion
 * @property string $precioVisita
 *
 * @property Socio $idSocio0
 */
class Visita extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'visita';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idSocio'], 'integer'],
            [['fechaCreacion'], 'safe'],
            [['precioVisita'], 'number'],
            [['idSocio'], 'exist', 'skipOnError' => true, 'targetClass' => Socio::className(), 'targetAttribute' => ['idSocio' => 'idSocio']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idVisita' => 'Id Visita',
            'idSocio' => 'Id Socio',
            'fechaCreacion' => 'Fecha Creacion',
            'precioVisita' => 'Precio Visita',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdSocio0()
    {
        return $this->hasOne(Socio::className(), ['idSocio' => 'idSocio']);
    }
}
