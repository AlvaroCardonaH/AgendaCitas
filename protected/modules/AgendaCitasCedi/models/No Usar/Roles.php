<?php

/**
 * This is the model class for table "m_roles".
 *
 * The followings are the available columns in table 'm_roles':
 * @property integer $IdRol
 * @property string $NombreRol
 * @property integer $IdUsuarioGraba
 * @property string $FechaGraba
 * @property integer $IdUsuarioModifica
 * @property string $FechaModifica
 *
 * The followings are the available model relations:
 * @property MUsuarios[] $mUsuarioses
 */
class Roles extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
        public $campo1;
        public $campo2;
    
	public function tableName()
	{
		return 'm_Roles';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('NombreRol, DescripcionRol', 'required', 'message' => 'Digite un texto para el campo {attribute}.'),
			array('NombreRol', 'length', 'max'=>45),
                        array('NombreRol','unique',
                                'caseSensitive'=>true,
                                'allowEmpty'=>true,  
                                'message'=>'Nombre Ya Existe'
                        ),                                        
                    
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('IdRol, NombreRol, DescripcionRol', 'safe', 'on'=>'search'),
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
                    'usuarios' => array(self::HAS_MANY, 'Usuarios', 'IdRol'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IdRol' => 'ID',
			'NombreRol' => 'Nombre',
                        'DescripcionRol' => 'Descripcion',
			'IdUsuarioGraba' => 'Id Usuario Graba',
			'FechaGraba' => 'Fecha Graba',
			'IdUsuarioModifica' => 'Id Usuario Modifica',
			'FechaModifica' => 'Fecha Modifica',
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

		$criteria->compare('IdRol',$this->IdRol);
		$criteria->compare('NombreRol',$this->NombreRol,true);
		$criteria->compare('IdUsuarioGraba',$this->IdUsuarioGraba);
		$criteria->compare('FechaGraba',$this->FechaGraba,true);
		$criteria->compare('IdUsuarioModifica',$this->IdUsuarioModifica);
		$criteria->compare('FechaModifica',$this->FechaModifica,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Roles the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public static function  getListaRoles(){

            $roles = Roles::model()->findAll(
                        array(
                                  'select'=>'IdRol, NombreRol',
                                  'condition'=>''
                        )
                    );

            $listaRoles = array();
            $listaRoles [] = "";

            foreach ($roles as $reg){ 
                $listaRoles[$reg->IdRol] = $reg->NombreRol;
            }

            return $listaRoles;
        }

        public static function getRol ($_IdRol){
            $elRol = Roles::model()->findByPk($_IdRol);
        }
        
        public static function getNombreRol ($_Id){

            $elNombreRol = '';
            
            $criteria=new CDbCriteria;
            $criteria->select='NombreRol';  // seleccionar solo la columna 'title'
            $criteria->condition='IdRol=:IdRol';
            $criteria->params=array(':IdRol'=>$_Id);
            
            $elRol = Roles::model()->find($criteria); // $params no es necesario            
            
            if ($elRol != null){                
                $elNombreRol = $elRol->NombreRol;                
            }
            return $elNombreRol;
            
        }
        
        
}
