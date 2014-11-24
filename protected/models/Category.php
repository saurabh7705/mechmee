<?php

/**
 * This is the model class for table "category".
 *
 * The followings are the available columns in table 'category':
 * @property string $id
 * @property string $name
 * @property string $type
 * @property integer $created_at
 * @property integer $updated_at
 */
class Category extends CActiveRecord
{
	const TYPE_ALCOHOLIC = 'ALCOHOLIC';
	const TYPE_NONALCOHOLIC = 'NON_ALCOHOLIC';
	const TYPE_SNACKS = 'SNACKS';

	public static $types = array(self::TYPE_ALCOHOLIC=>'Alcoholic', self::TYPE_NONALCOHOLIC=>'Non Alcoholic', self::TYPE_SNACKS=>'Snacks');
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Category the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'category';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, type', 'required'),
			array('created_at, updated_at', 'numerical', 'integerOnly'=>true),
			array('name, type', 'length', 'max'=>255),
			array('file_name', 'file', 'types'=>'jpg, jpeg, png', 'maxSize'=>1024*1024*3, 'tooLarge'=>'File size cannot exceed 3 MB.'),
			array('extension', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, type, created_at, updated_at', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'sub_categories' => array(self::HAS_MANY, 'SubCategory', 'category_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'type' => 'Type',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
		);
	}

	public function beforeSave() {
		if($this->isNewRecord)
			$this->created_at = time();
		$this->updated_at = time();
		return parent::beforeSave();
	}

	public static function create($attributes) {
		$model = new Category;
		$model->attributes = $attributes;
		$model->save();
		return $model;
	}

	public function getFileName() {
    	return "$this->id.$this->extension";
    }

    public function getFilePath() {
    	return Yii::app()->basePath."/../category/$this->id.$this->extension";
    }

    public function getFileUrl() {
		return "http://localhost/".Yii::app()->baseUrl."/category/".$this->getFileName();
    }

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('created_at',$this->created_at);
		$criteria->compare('updated_at',$this->updated_at);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array('pageSize'=>25),
			'sort'=>array('defaultOrder'=>"{$this->tableAlias}.created_at DESC"),
		));
	}
}