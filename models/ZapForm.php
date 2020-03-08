<?php 

namespace app\models;

use yii\base\Model;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;


class zapForm extends \yii\db\ActiveRecord
{

   public $image;

	public static function tableName()
	    {
	        return 'lektureprepod';
	    }

	    public function rules()
    {
        return [
            [['id', 'prepod_name', 'lecture', 'file', 'imageFile'], 'required'],
            [['id'], 'integer'],
            [['prepod_name'], 'string'],
            [['lecture'], 'string', 'max' => 500],
            [['file'], 'string', 'max' => 100],
            [['image'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg,'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'prepod_name' => 'Имя преподователя',
            'lecture' => 'Название лекция',
            'file' => 'Лекция',
            'image' => 'Фото лекции',
        ];
    }

    

    
    
    public function upload()
    {
        if ($this->validate()) {
            $this->image->saveAs('uploads/' . $this->image->basename . '.' . $this->image->extension);
            return true;
        } else {
            return false;
        }
    }
}



?>