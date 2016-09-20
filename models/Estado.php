<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estado".
 *
 * @property integer $idEstados
 * @property string $Estado
 *
 * @property Entrada[] $entradas
 * @property Membresia[] $membresias
 * @property Producto[] $productos
 * @property Salida[] $salidas
 * @property Socio[] $socios
 * @property Sociomembresia[] $sociomembresias
 * @property Usuario[] $usuarios
 */
class Estado extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estado';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Estado'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idEstados' => 'Id Estados',
            'Estado' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntradas()
    {
        return $this->hasMany(Entrada::className(), ['idEstado' => 'idEstados']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMembresias()
    {
        return $this->hasMany(Membresia::className(), ['idEstado' => 'idEstados']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductos()
    {
        return $this->hasMany(Producto::className(), ['idEstado' => 'idEstados']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSalidas()
    {
        return $this->hasMany(Salida::className(), ['idEstado' => 'idEstados']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSocios()
    {
        return $this->hasMany(Socio::className(), ['idEstado' => 'idEstados']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSociomembresias()
    {
        return $this->hasMany(Sociomembresia::className(), ['idEstado' => 'idEstados']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasMany(Usuario::className(), ['idEstado' => 'idEstados']);
    }
}
