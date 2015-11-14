<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "items".
 *
 * @property integer $id
 * @property integer $cat_id
 * @property integer $brend_id
 * @property string $strings
 * @property string $anker
 * @property string $form
 * @property string $bridj
 * @property integer $material
 * @property integer $pie
 * @property integer $lad
 * @property integer $inlay
 * @property integer $price
 * @property string $shema
 * @property integer $q_volume
 * @property integer $q_tone
 * @property string $add
 *
 * @property Category $cat
 * @property Brend $brend
 */
class Items extends \yii\db\ActiveRecord
{
    public $file;
    public $files;
    public $file_main;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'items';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name','cat_id', 'brend_id'],'required'],
            [['cat_id', 'brend_id','pie', 'lad', 'inlay', 'q_volume', 'q_tone','price'], 'integer'],
            [['strings', 'anker', 'form', 'bridj', 'shema','material','name','main_image'], 'string', 'max' => 150],
            [['add'], 'string', 'max' => 1255],
          ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Наименование',
            'main_image' => 'Основное фото',
            'cat_id' => 'Категория',
            'brend_id' => 'Производитель Звукоснимателя',
            'strings' => 'Количество струн',
            'anker' => 'Тип крепления струн',
            'form' => 'Форма корпуса',
            'bridj' => 'Тип бриджа',
            'material' => 'Материал грифа',
            'pie' => 'Порожек с зажимом',
            'lad' => 'Количество ладов',
            'inlay' => 'Инкрустация',
            'shema' => 'Схема звукаснимателей',
            'q_volume' => 'Количество регуляторов громкости',
            'q_tone' => 'Количество регуляторов тона',
            'add' => 'Описание',
            'price' => 'Цена',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCat()
    {
        return $this->hasOne(Category::className(), ['id' => 'cat_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBrend()
    {
        return $this->hasOne(Brend::className(), ['id' => 'brend_id']);
    }

    // Вернет главное фото
    public static function getMainPhoto($id,$width=490,$height=150){


        $model = self::findOne($id);
        if ($model->main_image) {
            return  "<img src='/upload/items_images_main/" .$model->main_image. "' alt='' width='".$width."' height='".$height."' >";
        } else {
            return  "<img src='/image/default.jpg' alt='' width='".$width."' height='".$height."' >";
        }
    }

    /*
*  Вернет одно фото
*/
    public static function getNameByItemId($items_id)
    {

        $model = self::find()->where(['id' => $items_id])->one();
        if ($model) {
            return '/upload/items_images_main/'.$model->main_image;
        } else {
            return '/image/default.jpg';
        }
    }

    /*
*  true/false
*/
    public static function isgetImage($items_id)
    {

        $model = self::findOne($items_id);
        if ($model->main_image) {
            return true;
        } else {
            return false;
        }
    }

    /*
*  вернет товары
*/
    public static function getItemsByCatId($cat_id)
    {

        $model = self::find()->where(['cat_id'=> $cat_id])->orderBy('id DESC')->limit(4)->all();
        if ($model) {
            return $model;
        } else {
            return false;
        }
    }


}
