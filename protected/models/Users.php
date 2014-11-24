<?php

/**
 * This is the model class for table "{{users}}".
 *
 * The followings are the available columns in table '{{users}}':
 * @property string $id
 * @property string $login
 * @property string $password
 * @property string $email
 * @property string $firstname
 * @property string $lastname
 * @property integer $gender
 * @property string $born_date
 * @property integer $fav_club_id
 * @property integer $fav_player_id
 * @property string $create_date
 * @property string $last_visit
 * @property string $avatar
 * @property integer $usergroup_id
 * @property integer $is_active
 * @property string $description
 */
class Users extends CActiveRecord
{
	public $password2;
	public $verifyCode;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{users}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		$rules = array(
			array('login, password, password2', 'required'),
			array('login', 'length', 'max'=>20, 'min' => 3,'message' => Yii::t('user',"Incorrect username (length between 3 and 20 characters).")),
			array('login','unique','message' => Yii::t('user',"This user's name already exists.")),
			array('login', 'match', 'pattern' => '/^[A-Za-z0-9_]+$/u','message' => Yii::t('user',"Incorrect symbols (A-z0-9).")),
			array('email', 'unique', 'message' => Yii::t('user',"This user's email address already exists.")),
			array('password', 'length', 'max'=>128, 'min' => 4,'message' => Yii::t('user',"Incorrect password (minimal length 4 symbols).")),
			array('email', 'email'),
			array('gender, fav_club_id, fav_player_id, usergroup_id, is_active', 'numerical', 'integerOnly'=>true),
			array('email, firstname, lastname, avatar', 'length', 'max'=>128),
			array('born_date, last_visit, description', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, login, password, email, firstname, lastname, gender, born_date, fav_club_id, fav_player_id, create_date, last_visit, avatar, usergroup_id, is_active, description', 'safe', 'on'=>'search'),
		);
		if (!(isset($_POST['ajax']) && $_POST['ajax']==='register-form')) {
			array_push($rules,array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()));
		}
		array_push($rules,array('password2', 'compare', 'compareAttribute'=>'password', 'message' => Yii::t('user',"Retype Password is incorrect.")));
		return $rules;
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'login' => 'Логин',
			'password' => 'Пароль',
			'password2' => 'Повторите пароль',
			'verifyCode' => Yii::t('user','Verification Code'),
			'email' => 'Email',
			'firstname' => 'Имя',
			'lastname' => 'Фамилия',
			'gender' => 'Пол',
			'born_date' => 'Дата рождения',
			'fav_club_id' => 'Любимый клуб',
			'fav_player_id' => 'Любимый игрок',
			'create_date' => 'Дата создания',
			'last_visit' => 'Последний визит',
			'avatar' => 'Аватарка',
			'usergroup_id' => 'Группа пользователей',
			'is_active' => 'Активный',
			'description' => 'Описание',
		);
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
		$criteria->compare('login',$this->login,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('firstname',$this->firstname,true);
		$criteria->compare('lastname',$this->lastname,true);
		$criteria->compare('gender',$this->gender);
		$criteria->compare('born_date',$this->born_date,true);
		$criteria->compare('fav_club_id',$this->fav_club_id);
		$criteria->compare('fav_player_id',$this->fav_player_id);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('last_visit',$this->last_visit,true);
		$criteria->compare('avatar',$this->avatar,true);
		$criteria->compare('usergroup_id',$this->usergroup_id);
		$criteria->compare('is_active',$this->is_active);
		$criteria->compare('description',$this->description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function login($username,$password){
		$user = Users::model()->find(array(
			'condition'=>'login=:login AND password=:pass',
			'params'=>array(':login'=>$username, ':pass'=>md5($password)),
		));
		if($user==null)
			return false;
		else
			return true;
	}
	
	
}
