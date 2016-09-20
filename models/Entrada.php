<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "entrada".
 *
 * @property integer $idEntrada
 * @property integer $idEstado
 * @property string $fechaCreacion
 * @property integer $idUsuarioCreo
 * @property string $Total
 *
 * @property Detalleentrada[] $detalleentradas
 * @property Estado $idEstado0
 * @property Usuario $idUsuarioCreo0
 */
class Entrada extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'entrada';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idEstado', 'idUsuarioCreo'], 'integer'],
            [['fechaCreacion'], 'safe'],
            [['Total'], 'number'],
            [['idEstado'], 'exist', 'skipOnError' => true, 'targetClass' => Estado::className(), 'targetAttribute' => ['idEstado' => 'idEstados']],
            [['idUsuarioCreo'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['idUsuarioCreo' => 'idUsuario']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idEntrada' => 'Id Entrada',
            'idEstado' => 'Id Estado',
            'fechaCreacion' => 'Fecha Creacion',
            'idUsuarioCreo' => 'Id Usuario Creo',
            'Total' => 'Total',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleentradas()
    {
        return $this->hasMany(Detalleentrada::className(), ['idEntrada' => 'idEntrada']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEstado0()
    {
        return $this->hasOne(Estado::className(), ['idEstados' => 'idEstado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUsuarioCreo0()
    {
        return $this->hasOne(Usuario::className(), ['idUsuario' => 'idUsuarioCreo']);
    }
}
