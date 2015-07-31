<?php

/**
 * Modelo creado para la tabla: "m_Transportador".
 *
 * The followings are the available columns in table 'm_Transportador':
 * @property integer $IdTransportador
 * @property string $Nombre
 */
class Transportador extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'm_Transportador';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Nombre', 'required'),
			array('Nombre', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('IdTransportador, Nombre', 'safe', 'on'=>'search'),
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
                    'logistica' => array(self::HAS_MANY, 'LogisticaFabricante', 'IdTransportador'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IdTransportador' => 'Id Transportador',
			'Nombre' => 'Nombre',
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

		$criteria->compare('IdTransportador',$this->IdTransportador);
		$criteria->compare('Nombre',$this->Nombre,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Transportador the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	
	public static function getTransportador()
	{
            $data = self::model()->findAll(array('order' => 'Nombre'));
            return CHtml::listData($data,'IdTransportador','Nombre');		
	}
                
        public static function getNombreTransportador ($_Id){

            $elNombreTransportador = '';
            
            $criteria=new CDbCriteria;
            $criteria->select='Nombre';  // seleccionar solo la columna 
            $criteria->condition='IdTransportador=:Id';
            $criteria->params=array(':Id'=>$_Id);
            
            $elTransportador = Transportador::model()->find($criteria); // $params no es necesario            
            
            if ($elTransportador != null){                
                $elNombreTransportador = $elTransportador->Nombre;                
            }
            return $elNombreTransportador;
            
        }
        
}
