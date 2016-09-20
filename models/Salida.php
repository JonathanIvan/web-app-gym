<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "salida".
 *
 * @property integer $idSalida
 * @property integer $idEstado
 * @property string $fechaCreacion
 * @property string $total
 * @property integer $idUsuarioCreo
 *
 * @property Detallesalida[] $detallesalidas
 * @property Estado $idEstado0
 * @property Usuario $idUsuarioCreo0
 */
class Salida extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'salida';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idEstado', 'idUsuarioCreo'], 'integer'],
            [['fechaCreacion'], 'safe'],
            [['total'], 'number'],
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
            'idSalida' => 'Id Salida',
            'idEstado' => 'Id Estado',
            'fechaCreacion' => 'Fecha Creacion',
            'total' => 'Total',
            'idUsuarioCreo' => 'Id Usuario Creo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetallesalidas()
    {
        return $this->hasMany(Detallesalida::className(), ['idSalida' => 'idSalida']);
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
