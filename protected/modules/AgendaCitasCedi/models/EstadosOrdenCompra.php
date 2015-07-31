<?php

/**
 * This is the model class for table "m_estadosordencompra".
 *
 * The followings are the available columns in table 'm_estadosordencompra':
 * @property integer $IdEstadoOrdenCompra
 * @property string $NombreEstadoOrdenCompra
 * @property integer $IdUsuarioGraba
 * @property string $FechaGraba
 * @property integer $IdUsuarioModifica
 * @property string $FechaModifica
 */
class EstadosOrdenCompra extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'm_estadosordencompra';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('NombreEstadoOrdenCompra, IdUsuarioGraba, FechaGraba, IdUsuarioModifica, FechaModifica', 'required'),
			array('IdUsuarioGraba, IdUsuarioModifica', 'numerical', 'integerOnly'=>true),
			array('NombreEstadoOrdenCompra', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('IdEstadoOrdenCompra, NombreEstadoOrdenCompra, IdUsuarioGraba, FechaGraba, IdUsuarioModifica, FechaModifica', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IdEstadoOrdenCompra' => 'Id Estado Orden Compra',
			'NombreEstadoOrdenCompra' => 'Nombre Estado Orden Compra',
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

		$criteria->compare('IdEstadoOrdenCompra',$this->IdEstadoOrdenCompra);
		$criteria->compare('NombreEstadoOrdenCompra',$this->NombreEstadoOrdenCompra,true);
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
	 * @return EstadosOrdenCompra the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public static function listData() {
            $data = self::model()->findAll(array('order' => 'NombreEstadoOrdenCompra'));
            $lst = CHtml::listData($data, 'IdEstadoOrdenCompra', 'NombreEstadoOrdenCompra');
            return $lst;
        }   
        
        public static function getNombreEstadoOrdenCompra($_Id){

            $elNombre = '';
            
            $criteria=new CDbCriteria;
            $criteria->select='NombreEstadoOrdenCompra';  // seleccionar solo la columna 'title'
            $criteria->condition='IdEstadoOrdenCompra=:Id';
            $criteria->params=array(':Id'=>$_Id);
            
            $elEstadoOrdenCompra = EstadosOrdenCompra::model()->find($criteria); // $params no es necesario            
            
            if ($elEstadoOrdenCompra != null){                
                $elNombre = $elEstadoOrdenCompra->NombreEstadoOrdenCompra;                
            }
            return $elNombre;
            
        }
        
}
