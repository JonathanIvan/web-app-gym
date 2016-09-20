<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sociomembresia".
 *
 * @property integer $idSocioMembresia
 * @property integer $idEstado
 * @property string $fechaCreacion
 * @property integer $idUsuarioCreo
 * @property integer $idSocio
 * @property integer $idMembresia
 * @property string $Precio
 * @property string $fechaInicioMembresia
 *
 * @property Estado $idEstado0
 * @property Membresia $idMembresia0
 * @property Socio $idSocio0
 * @property Usuario $idUsuarioCreo0
 */
class Sociomembresia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sociomembresia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idEstado', 'idUsuarioCreo', 'idSocio', 'idMembresia'], 'integer'],
            [['fechaCreacion', 'fechaInicioMembresia'], 'safe'],
            [['Precio'], 'number'],
            [['idEstado'], 'exist', 'skipOnError' => true, 'targetClass' => Estado::className(), 'targetAttribute' => ['idEstado' => 'idEstados']],
            [['idMembresia'], 'exist', 'skipOnError' => true, 'targetClass' => Membresia::className(), 'targetAttribute' => ['idMembresia' => 'idMembresia']],
            [['idSocio'], 'exist', 'skipOnError' => true, 'targetClass' => Socio::className(), 'targetAttribute' => ['idSocio' => 'idSocio']],
            [['idUsuarioCreo'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['idUsuarioCreo' => 'idUsuario']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idSocioMembresia' => 'Id Socio Membresia',
            'idEstado' => 'Id Estado',
            'fechaCreacion' => 'Fecha Creacion',
            'idUsuarioCreo' => 'Id Usuario Creo',
            'idSocio' => 'Id Socio',
            'idMembresia' => 'Id Membresia',
            'Precio' => 'Precio',
            'fechaInicioMembresia' => 'Fecha Inicio Membresia',
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
    public function getIdMembresia0()
    {
        return $this->hasOne(Membresia::className(), ['idMembresia' => 'idMembresia']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdSocio0()
    {
        return $this->hasOne(Socio::className(), ['idSocio' => 'idSocio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUsuarioCreo0()
    {
        return $this->hasOne(Usuario::className(), ['idUsuario' => 'idUsuarioCreo']);
    }
}
