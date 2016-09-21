<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "socio".
 *
 * @property integer $idSocio
 * @property integer $idEstado
 * @property string $fechaCreacion
 * @property string $Nombre
 * @property string $Paterno
 * @property string $Materno
 * @property string $Telefono
 * @property string $Observaciones
 * @property integer $idUsuarioCreo
 * @property resource $foto
 * @property integer $idUsuario 
 *
 * @property Registro[] $registros
 * @property Estado $idEstado0
 * @property Usuario $idUsuario0 
 * @property Usuario $idUsuarioCreo0
 * @property Sociomembresia[] $sociomembresias
 * @property Visita[] $visitas
 */
class Socio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'socio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idEstado', 'idUsuarioCreo', 'idUsuario'], 'integer'],
            [['fechaCreacion'], 'safe'],
            [['foto'], 'string'],
            [['Nombre', 'Paterno', 'Materno', 'Telefono'], 'string', 'max' => 45],
            [['Nombre', 'Paterno', 'Telefono'], 'required'],
            [['Observaciones'], 'string', 'max' => 500],
            [['idEstado'], 'exist', 'skipOnError' => true, 'targetClass' => Estado::className(), 'targetAttribute' => ['idEstado' => 'idEstados']],
            [['idUsuario'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['idUsuario' => 'idUsuario']], 
            [['idUsuarioCreo'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['idUsuarioCreo' => 'idUsuario']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idSocio' => 'Clave',
            'idEstado' => 'Estado',
            'fechaCreacion' => 'Fecha Creacion',
            'Nombre' => 'Nombre',
            'Paterno' => 'Paterno',
            'Materno' => 'Materno',
            'Telefono' => 'Telefono',
            'Observaciones' => 'Observaciones',
            'idUsuarioCreo' => 'Id Usuario Creo',
            'foto' => 'Foto',
            'idUsuario' => 'Id Usuario', 
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegistros()
    {
        return $this->hasMany(Registro::className(), ['idSocio' => 'idSocio']);
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
   public function getIdUsuario0() 
   { 
       return $this->hasOne(Usuario::className(), ['idUsuario' => 'idUsuario']); 
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
        return $this->hasMany(Sociomembresia::className(), ['idSocio' => 'idSocio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVisitas()
    {
        return $this->hasMany(Visita::className(), ['idSocio' => 'idSocio']);
    }
}
