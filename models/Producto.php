<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "producto".
 *
 * @property integer $idProducto
 * @property string $Nombre
 * @property string $Descripcion
 * @property integer $idEstado
 * @property string $fechaCreacion
 * @property string $Precio
 * @property integer $idUsuarioCreo
 * @property string $Costo
 *
 * @property Detalleentrada[] $detalleentradas
 * @property Detallesalida[] $detallesalidas
 * @property Estado $idEstado0
 * @property Usuario $idUsuarioCreo0
 */
class Producto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'producto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idEstado', 'idUsuarioCreo'], 'integer'],
            [['fechaCreacion'], 'safe'],
            [['Precio', 'Costo'], 'number'],
            [['Nombre'], 'string', 'max' => 45],
            [['Descripcion'], 'string', 'max' => 100],
            [['Nombre', 'Precio', 'Costo'], 'required'],
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
            'idProducto' => 'Id Producto',
            'Nombre' => 'Nombre',
            'Descripcion' => 'Descripcion',
            'idEstado' => 'Id Estado',
            'fechaCreacion' => 'Fecha Creacion',
            'Precio' => 'Precio',
            'idUsuarioCreo' => 'Id Usuario Creo',
            'Costo' => 'Costo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleentradas()
    {
        return $this->hasMany(Detalleentrada::className(), ['idProducto' => 'idProducto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetallesalidas()
    {
        return $this->hasMany(Detallesalida::className(), ['idProducto' => 'idProducto']);
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
