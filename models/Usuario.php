<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property integer $idUsuario
 * @property integer $idEstado
 * @property string $Usuario
 * @property string $Nombre
 * @property string $fechaCreacion
 * @property string $Password
 *
 * @property Entrada[] $entradas
 * @property Membresia[] $membresias
 * @property Producto[] $productos
 * @property Salida[] $salidas
 * @property Socio[] $socios
 * @property Sociomembresia[] $sociomembresias
 * @property Estado $idEstado0
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idEstado'], 'integer'],
            [['fechaCreacion'], 'safe'],
            [['Usuario'], 'string', 'max' => 45, 'min' => 6],
            [['Usuario', 'Password', 'Nombre'], 'required'],
            ['Usuario', 'unique'],
            [['Password'], 'string', 'max' => 100, 'min' => 8],
            [['idEstado'], 'exist', 'skipOnError' => true, 'targetClass' => Estado::className(), 'targetAttribute' => ['idEstado' => 'idEstados']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idUsuario' => 'Id Usuario',
            'idEstado' => 'Id Estado',
            'Usuario' => 'Usuario',
            'Nombre' => 'Rol',
            'fechaCreacion' => 'Fecha Creacion',
            'Password' => 'Contraseña',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntradas()
    {
        return $this->hasMany(Entrada::className(), ['idUsuarioCreo' => 'idUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMembresias()
    {
        return $this->hasMany(Membresia::className(), ['idUsuarioCreo' => 'idUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductos()
    {
        return $this->hasMany(Producto::className(), ['idUsuarioCreo' => 'idUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSalidas()
    {
        return $this->hasMany(Salida::className(), ['idUsuarioCreo' => 'idUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSocios()
    {
        return $this->hasMany(Socio::className(), ['idUsuarioCreo' => 'idUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSociomembresias()
    {
        return $this->hasMany(Sociomembresia::className(), ['idUsuarioCreo' => 'idUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEstado0()
    {
        return $this->hasOne(Estado::className(), ['idEstados' => 'idEstado']);
    }
}
