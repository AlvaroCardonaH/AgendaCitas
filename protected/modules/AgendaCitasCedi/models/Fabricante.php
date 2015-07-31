<?php

/**
 * This is the model class for table "m_Fabricante".
 *
 * The followings are the available columns in table 'm_fabricantes':
 * @property integer $IdFabricante
 * @property string $Nombre
  *
 * The followings are the available model relations:
 * @property Usuarios[] $mUsuarioses
 */
class Fabricante extends CActiveRecord
{    
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'm_Fabricante';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('IdFabricante, Nombre', 'required', 'message' => 'Digite un texto para el campo {attribute}.'),
			array('IdFabricante', 'numerical', 'integerOnly'=>true),
			array('Nombre', 'length', 'max'=>150),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
                        array('Nombre','unique',
                                'caseSensitive'=>true,
                                'allowEmpty'=>true,  
                                'message'=>'Nombre Ya Existe'
                        ),                                        
                        array('IdFabricante','unique',
                                'caseSensitive'=>true,
                                'allowEmpty'=>true,  
                                'message'=>'ID de Fabricante Ya Existe'
                        ),                                                            
			array('IdFabricante, Nombre', 'safe', 'on'=>'search'),
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
			'acuerdos' => array(self::HAS_MANY, 'AcuerdosEntregaFabricante', 'IdFabricante'),
                        'logistica' => array(self::HAS_MANY, 'LogisticaFabricante', 'IdFabricante'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IdFabricante' => 'ID',
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

		$criteria->compare('IdFabricante',$this->IdFabricante);
		$criteria->compare('Nombre',$this->NombreFabricante,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Fabricantes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        /**
         * Retorna lista de sedes para lista desplegable
         * @return lista de sedes (id, nombre)
         */
        public static function listData() {
            $data = self::model()->findAll(array('order' => 'Nombre'));
            $lst = CHtml::listData($data, 'IdFabricante', 'Nombre');
            return $lst;
        }   
        
        public static function getNombreFabricante ($_Id){

            $elNombreFabricante = '';
            
            $criteria=new CDbCriteria;
            $criteria->select='Nombre';  // seleccionar solo la columna 'title'
            $criteria->condition='IdFabricante=:Id';
            $criteria->params=array(':Id'=>$_Id);
            
            $elFabricante = Fabricante::model()->find($criteria); // $params no es necesario            
            
            if ($elFabricante != null){                
                $elNombreFabricante = $elFabricante->Nombre;                
            }
            return $elNombreFabricante;
            
        }
        
}
