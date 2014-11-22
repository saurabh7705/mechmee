<?php

/**
 * This is the model class for table "product_quantity".
 *
 * The followings are the available columns in table 'product_quantity':
 * @property string $id
 * @property integer $product_id
 * @property string $quantity
 * @property string $price
 * @property string $vendor
 * @property integer $stock_left
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class ProductQuantity extends CActiveRecord
{
	const STATUS_ACTIVE = 1;
	const STATUS_INACTIVE = 2;
	public static $statuses = array(self::STATUS_ACTIVE=>'Active', self::STATUS_INACTIVE=>'Inactive');
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ProductQuantity the static model class
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
		return 'product_quantity';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('product_id, quantity, price', 'required'),
			array('product_id, stock_left, status, created_at, updated_at, vendor_id', 'numerical', 'integerOnly'=>true),
			array('quantity, price, vendor', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, product_id, quantity, price, vendor, stock_left, status, created_at, updated_at', 'safe', 'on'=>'search'),
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
			'product' => array(self::BELONGS_TO, 'Product', 'product_id'),
			'vendor' => array(self::HAS_ONE, 'Vendor', 'vendor_id'),
		);
	}

	public function scopes()
    {
        return array(
            'active'=>array('condition'=>"{$this->tableAlias}.status=".self::STATUS_ACTIVE),
            'in_stock'=>array('condition'=>"{$this->tableAlias}.stock_left > 0"),
            'viewable'=>array('condition'=>"{$this->tableAlias}.stock_left > 0 AND {$this->tableAlias}.status=".self::STATUS_ACTIVE),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'product_id' => 'Product',
			'quantity' => 'Quantity',
			'price' => 'Price',
			'vendor' => 'Vendor',
			'stock_left' => 'Stock Left',
			'status' => 'Status',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
		);
	}

	public function beforeSave() {
		if($this->isNewRecord) {
			$this->created_at = time();
			$this->status = self::STATUS_ACTIVE;
		}
		$this->updated_at = time();
		return parent::beforeSave();
	}

	public static function create($attributes) {
		$model = new ProductQuantity;
		$model->attributes = $attributes;
		$model->save();
		return $model;
	}

	public function markActive() {
		$this->status = self::STATUS_ACTIVE;
		$this->save();
	}

	public function markInactive() {
		$this->status = self::STATUS_INACTIVE;
		$this->save();
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
		$criteria->compare('product_id',$this->product_id);
		$criteria->compare('quantity',$this->quantity,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('vendor',$this->vendor,true);
		$criteria->compare('stock_left',$this->stock_left);
		$criteria->compare('status',$this->status);
		$criteria->compare('created_at',$this->created_at);
		$criteria->compare('updated_at',$this->updated_at);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}