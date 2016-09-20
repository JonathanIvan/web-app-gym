<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "detallesalida".
 *
 * @property integer $iddetalleSalida
 * @property integer $idProducto
 * @property string $precioUnitario
 * @property integer $idSalida
 *
 * @property Detalleentrada[] $detalleentradas
 * @property Producto $idProducto0
 * @property Salida $idSalida0
 */
class Detallesalida extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'detallesalida';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idProducto', 'idSalida'], 'integer'],
            [['precioUnitario'], 'number'],
            [['idProducto'], 'exist', 'skipOnError' => true, 'targetClass' => Producto::className(), 'targetAttribute' => ['idProducto' => 'idProducto']],
            [['idSalida'], 'exist', 'skipOnError' => true, 'targetClass' => Salida::className(), 'targetAttribute' => ['idSalida' => 'idSalida']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'iddetalleSalida' => 'Iddetalle Salida',
            'idProducto' => 'Id Producto',
            'precioUnitario' => 'Precio Unitario',
            'idSalida' => 'Id Salida',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleentradas()
    {
        return $this->hasMany(Detalleentrada::className(), ['idDetalleSalida' => 'iddetalleSalida']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProducto0()
    {
        return $this->hasOne(Producto::className(), ['idProducto' => 'idProducto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdSalida0()
    {
        return $this->hasOne(Salida::className(), ['idSalida' => 'idSalida']);
    }
}
