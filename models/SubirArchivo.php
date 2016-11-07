<?php

namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class SubirArchivo extends Model
{
    /**
     * @var imagenes[]
     */
    public $imagenes;
    public $imagen;

    public function rules()
    {
        return [
            [['imagenes'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'maxFiles' => 4],
            [['imagen'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'maxFiles' => 1],
        ];
    }

    public function subirImagenes()
    {
        if ($this->validate()) { 
            foreach ($this->imagenes as $file) {
                $file->saveAs('uploads/' . $file->baseName . '.' . $file->extension);
            }
            return true;
        } else {
            return false;
        }
    }
    
    public function subirImagen()
    {
        if ($this->validate()) { 
        	
        	$imagen = $this->imagen;
            $imagen->saveAs('uploads/' . $imagen->baseName . '.' . $imagen->extension);
            
            return true;
        } else {
            return false;
        }
    }
}