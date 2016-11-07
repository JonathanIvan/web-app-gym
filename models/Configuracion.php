<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "configuracion".
 *
 * @property integer $idConfiguracion
 * @property string $NombreGimnacio
 * @property string $Domicilio
 * @property string $Telefono
 * @property resource $Logo
 * @property string $fechaModificacion
 * @property integer $idUsuarioModifico
 * @property integer $mensajeVencimiento
 * @property string $RFC
 * @property string $Mensaje
 */
class Configuracion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'configuracion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Logo'], 'string'],
            [['fechaModificacion'], 'safe'],
            [['idUsuarioModifico', 'mensajeVencimiento'], 'integer'],
            [['NombreGimnacio', 'Telefono', 'RFC'], 'string', 'max' => 45],
            [['Domicilio'], 'string', 'max' => 200],
            [['Mensaje'], 'string', 'max' => 100],
            [['NombreGimnacio', 'Domicilio'], 'required'],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idConfiguracion' => 'Id Configuracion',
            'NombreGimnacio' => 'Nombre Gimnacio',
            'Domicilio' => 'Domicilio',
            'Telefono' => 'Telefono',
            'Logo' => 'Logo',
            'fechaModificacion' => 'Fecha Modificacion',
            'idUsuarioModifico' => 'Id Usuario Modifico',
            'mensajeVencimiento' => 'Mensaje Vencimiento',
            'RFC' => 'Rfc',
            'Mensaje' => 'Mensaje',
        ];
    }
}
