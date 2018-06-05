<?php

namespace app\models;
use yii\web\UploadedFile;
use Yii;

/**
 * This is the model class for table "todo".
 *
 * @property int $id
 * @property int $cat_id
 * @property string $name
 * @property string $image
 * @property string $details
 * @property string $date_complete
 * @property string $status
 */
class Todo extends \yii\db\ActiveRecord
{
    
    public $image;
    /**
     * {@inheritdoc}
     */

    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }
    public static function tableName()
    {
        return 'todo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cat_id'], 'integer'],
            [['details'], 'string'],
            [['image'], 'file', 'skipOnEmpty' => true],
            [['date_complete'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['status'], 'string', 'max' => 15],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cat_id' => 'Cat ID',
            'name' => 'Name',
            
            'details' => 'Details',
            'date_complete' => 'Date Complete',
            'status' => 'Status',
        ];
    }
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'cat_id']);
    }

    public function upload(){
        if($this->validate()){
            $path = 'upload/'.$this->image->baseName .'.'.$this->image->extension;
            $this->image->saveAs($path, true);
            $this->attachImage($path);
            @unlink($path);
                return true;
        }else{
            return false;
        }
    }

    public function upd($id){
        if($this->validate()){
            foreach ($this->getImages() as $image) {
                if ($image->isMain == 1 && $image->itemId == $id) {
                    $this->removeImage($image);
                }
            }



            $path = 'upload/store/'.$this->image->baseName .'.'.$this->image->extension;
            $this->image->saveAs($path, true);
            $this->attachImage($path);
            @unlink($path);
            return true;
        }else{
            return false;
        }
    }
}
