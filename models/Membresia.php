<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "membresia".
 *
 * @property integer $idMembresia
 * @property string $Nombre
 * @property integer $idEstado
 * @property string $fechaCreacion
 * @property string $Precio
 * @property integer $idUsuarioCreo
 * @property integer $meses
 * @property string $horaInicio
 * @property string $horaFinal
 *
 * @property Estado $idEstado0
 * @property Usuario $idUsuarioCreo0
 * @property Sociomembresia[] $sociomembresias
 */
class Membresia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'membresia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idEstado', 'idUsuarioCreo', 'meses'], 'integer'],
            [['fechaCreacion', 'horaInicio', 'horaFinal'], 'safe'],
            [['Precio'], 'number'],
            [['Nombre'], 'string', 'max' => 45],
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
            'idMembresia' => 'Id Membresia',
            'Nombre' => 'Nombre',
            'idEstado' => 'Id Estado',
            'fechaCreacion' => 'Fecha Creacion',
            'Precio' => 'Precio',
            'idUsuarioCreo' => 'Id Usuario Creo',
            'meses' => 'meses de la membresia',
            'horaInicio' => 'hora que comienza la membresia para horarios especiales',
            'horaFinal' => 'hora en que termina la membresia para horarios especiales',
        ];
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSociomembresias()
    {
        return $this->hasMany(Sociomembresia::className(), ['idMembresia' => 'idMembresia']);
    }
}
