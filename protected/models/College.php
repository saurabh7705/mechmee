<?php

/**
 * This is the model class for table "college".
 *
 * The followings are the available columns in table 'college':
 * @property string $id
 * @property string $name
 * @property string $description
 * @property integer $city_id
 * @property integer $sub_course_id
 * @property integer $established_year
 * @property string $location
 * @property integer $rating
 * @property string $file_name
 * @property string $extension
 * @property integer $created_at
 * @property integer $updated_at
 */
class College extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'college';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('city_id, sub_course_id', 'required'),
			array('city_id, sub_course_id, established_year, rating, created_at, updated_at', 'numerical', 'integerOnly'=>true),
			array('location, file_name, extension', 'length', 'max'=>255),
			array('name, description', 'safe'),
			array('file_name', 'file', 'types'=>'jpg, jpeg, png', 'maxSize'=>1024*1024*3, 'tooLarge'=>'File size cannot exceed 3 MB.'),
			array('extension, file_name', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, description, city_id, sub_course_id, established_year, location, rating, file_name, extension, created_at, updated_at', 'safe', 'on'=>'search'),
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
			'city' => array(self::BELONGS_TO, 'City', 'city_id'),
			'subCourse' => array(self::BELONGS_TO, 'SubCourse', 'sub_course_id'),
		);
	}

	public function getFileName() {
    	return "$this->id.$this->extension";
    }

    public function getFilePath() {
    	return Yii::app()->basePath."/../college/$this->id.$this->extension";
    }

    public function getFileUrl() {
		return "http://52.221.250.196/".Yii::app()->baseUrl."/college/".$this->getFileName();
		//return "http://localhost/".Yii::app()->baseUrl."/college/".$this->getFileName();
    }

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'description' => 'Description',
			'city_id' => 'City',
			'sub_course_id' => 'Sub Course',
			'established_year' => 'Established Year',
			'location' => 'Location',
			'rating' => 'Rating',
			'file_name' => 'File Name',
			'extension' => 'Extension',
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

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('city_id',$this->city_id);
		$criteria->compare('sub_course_id',$this->sub_course_id);
		$criteria->compare('established_year',$this->established_year);
		$criteria->compare('location',$this->location,true);
		$criteria->compare('rating',$this->rating);
		$criteria->compare('file_name',$this->file_name,true);
		$criteria->compare('extension',$this->extension,true);
		$criteria->compare('created_at',$this->created_at);
		$criteria->compare('updated_at',$this->updated_at);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return College the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
