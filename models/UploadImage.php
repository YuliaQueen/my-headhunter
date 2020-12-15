<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class UploadImage extends Model
{

    public $image;

    public function rules()
    {
        return [
            [['image'], 'file', 'extensions' => 'png, jpg'],
        ];
    }

    public function uploadImage(UploadedFile $file)
    {
        $this->image = $file;
        $fileName = strtolower(md5(uniqid($file->baseName)) . '.' . $file->extension);

        $file->saveAs(Yii::getAlias('@web') . 'uploads/' . $fileName);

        return $fileName;
    }
}
