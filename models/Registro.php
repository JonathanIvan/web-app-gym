<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "registro".
 *
 * @property integer $idregistro
 * @property integer $idSocio
 * @property string $fechaCreacion
 *
 * @property Socio $idSocio0
 */
class Registro extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'registro';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idSocio'], 'integer'],
            [['fechaCreacion'], 'safe'],
            [['idSocio'], 'exist', 'skipOnError' => true, 'targetClass' => Socio::className(), 'targetAttribute' => ['idSocio' => 'idSocio']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idregistro' => 'Idregistro',
            'idSocio' => 'Id Socio',
            'fechaCreacion' => 'Fecha Creacion',
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
