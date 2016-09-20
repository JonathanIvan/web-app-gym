<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "detalleentrada".
 *
 * @property integer $idDetalleEntrada
 * @property integer $idProducto
 * @property string $CostoUnitario
 * @property integer $idEntrada
 * @property integer $idDetalleSalida
 *
 * @property Entrada $idEntrada0
 * @property Producto $idProducto0
 * @property Detallesalida $idDetalleSalida0
 */
class Detalleentrada extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'detalleentrada';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idProducto', 'idEntrada', 'idDetalleSalida'], 'integer'],
            [['CostoUnitario'], 'number'],
            [['idEntrada'], 'exist', 'skipOnError' => true, 'targetClass' => Entrada::className(), 'targetAttribute' => ['idEntrada' => 'idEntrada']],
            [['idProducto'], 'exist', 'skipOnError' => true, 'targetClass' => Producto::className(), 'targetAttribute' => ['idProducto' => 'idProducto']],
            [['idDetalleSalida'], 'exist', 'skipOnError' => true, 'targetClass' => Detallesalida::className(), 'targetAttribute' => ['idDetalleSalida' => 'iddetalleSalida']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idDetalleEntrada' => 'Id Detalle Entrada',
            'idProducto' => 'Id Producto',
            'CostoUnitario' => 'Costo Unitario',
            'idEntrada' => 'Id Entrada',
            'idDetalleSalida' => 'Id Detalle Salida',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEntrada0()
    {
        return $this->hasOne(Entrada::className(), ['idEntrada' => 'idEntrada']);
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
    public function getIdDetalleSalida0()
    {
        return $this->hasOne(Detallesalida::className(), ['iddetalleSalida' => 'idDetalleSalida']);
    }
}
