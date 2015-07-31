<?php

/**
 * This is the model class for table "m_AcuerdosEntregaFabricante".
 *
 * The followings are the available columns in table 'm_AcuerdosEntregaFabricante':
 * @property integer $IdAcuerdoEntrega
 * @property integer $IdFabricante
 * @property integer $IdCedi
 * @property string $ObservacionesAcuerdoEntrega
 * @property integer $DiaSemana
 * @property String $HoraDia
  *
 * The followings are the available model relations:
 * @property MCedis $idCedi
 * @property MFabricantes $idFabricante
 * @property MTiposentrega $idTipoEntrega
 */
class AcuerdosEntregaFabricante extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'm_AcuerdosEntregaFabricante';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('IdFabricante, IdCedi, ObservacionesAcuerdoEntrega, DiaSemana, HoraDia', 'required'),
			array('IdFabricante, IdCedi, DiaSemana', 'numerical', 'integerOnly'=>true),
			array('ObservacionesAcuerdoEntrega', 'length', 'max'=>255),
                        array('IdFabricante, IdCedi', 'validFabricanteCedi','on'=>'insert'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('IdAcuerdoEntrega, IdFabricante, IdCedi, DiasSemana, HoraDia, ObservacionesAcuerdoEntrega', 'safe', 'on'=>'search'),                                                   
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
			'cedi' => array(self::BELONGS_TO, 'Cedi', 'IdCedi'),
			'fabricante' => array(self::BELONGS_TO, 'Fabricante', 'IdFabricante'),
                        'diasemana' => array(self::BELONGS_TO, 'DiasSemanaAgenda', 'DiaSemana'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IdAcuerdoEntrega' => 'ID',
			'IdFabricante' => 'Fabricante',
			'IdCedi' => 'Cedi',
                        'DiaSemana'=>'Día Semana',
                        'HoraDia'=>'Hora',
			'ObservacionesAcuerdoEntrega' => 'Observaciones',
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

		$criteria->compare('IdAcuerdoEntrega',$this->IdAcuerdoEntrega);
		$criteria->compare('IdFabricante',$this->IdFabricante);
		$criteria->compare('IdCedi',$this->IdCedi);
                $criteria->compare('DiaSemana',$this->DiaSemana);
                $criteria->compare('HoraDia',$this->HoraDia);
		$criteria->compare('ObservacionesAcuerdoEntrega',$this->ObservacionesAcuerdoEntrega,true);
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
	 * @return AcuerdoEntregasFabricante the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function validFabricanteCedi($attribute_name,$params){

	    if(!empty($this->IdFabricante) && !empty($this->IdCedi)){
                if ($this->getFabricanteCedi($this->IdFabricante, $this->IdCedi)){
                    $this->addError('IdCedi',
	                 'Ya Tiene Un Acuerdo Para El CEDI Seleccionado');
                }
            }         
	} 
        
        public static function getFabricanteCedi ($_IdFab, $_IdCedi){

            $criteria=new CDbCriteria;
            $criteria->select='IdAcuerdoEntrega';  // seleccionar solo la columna 'title'
            $criteria->addCondition('IdFabricante=:IdFab','AND');
            $criteria->addCondition('IdCedi=:IdCedi');
            $criteria->params=array(':IdFab'=>$_IdFab,':IdCedi'=>$_IdCedi);
            
            $elAcuerdo = AcuerdosEntregaFabricante::model()->find($criteria); // $params no es necesario            
            
            return $elAcuerdo;
            
        }
        
}
