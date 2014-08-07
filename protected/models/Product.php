<?php

/**
 * This is the model class for table "product".
 *
 * The followings are the available columns in table 'product':
 * @property string $id
 * @property string $name
 * @property integer $category_id
 * @property integer $sub_category_id
 * @property string $brand
 * @property integer $in_stock
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Product extends CActiveRecord
{
	const STATUS_ACTIVE = 1;
	const STATUS_INACTIVE = 2;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Produ the static model class
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
		return 'product';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, category_id, sub_category_id', 'required'),
			array('category_id, sub_category_id, in_stock, status, created_at, updated_at', 'numerical', 'integerOnly'=>true),
			array('name, brand', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, category_id, sub_category_id, brand, in_stock, status, created_at, updated_at', 'safe', 'on'=>'search'),
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
			'category' => array(self::BELONGS_TO, 'Category', 'category_id'),
			'sub_category' => array(self::BELONGS_TO, 'SubCategory', 'sub_category_id'),
			'quantities' => array(self::HAS_MANY, 'ProductQuantity', 'product_id'),
		);
	}

	public function scopes()
    {
        return array(
            'active'=>array('condition'=>"{$this->tableAlias}.status=".self::STATUS_ACTIVE),
            'in_stock'=>array('condition'=>"{$this->tableAlias}.in_stock = 1"),
            'viewable'=>array('condition'=>"{$this->tableAlias}.in_stock = 1 AND {$this->tableAlias}.status=".self::STATUS_ACTIVE),
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
			'category_id' => 'Category',
			'sub_category_id' => 'Sub Category',
			'brand' => 'Brand',
			'in_stock' => 'In Stock',
			'status' => 'Status',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
		);
	}

	public function beforeSave() {
		if($this->isNewRecord) {
			$this->created_at = time();
			$this->status = self::STATUS_INACTIVE;
		}
		$this->updated_at = time();
		return parent::beforeSave();
	}

	public static function create($attributes) {
		$model = new Product;
		$model->attributes = $attributes;
		$model->save();
		return $model;
	}

	public function markActive() {
		if($this->quantities) {
			$this->status = self::STATUS_ACTIVE;
			$this->save();
		}
	}

	public function markInactive() {
		$this->status = self::STATUS_INACTIVE;
		$this->save();
	}

	public function isActive() {
		return ($this->status == self::STATUS_ACTIVE);
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
		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('sub_category_id',$this->sub_category_id);
		$criteria->compare('brand',$this->brand,true);
		$criteria->compare('in_stock',$this->in_stock);
		$criteria->compare('status',$this->status);
		$criteria->compare('created_at',$this->created_at);
		$criteria->compare('updated_at',$this->updated_at);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}