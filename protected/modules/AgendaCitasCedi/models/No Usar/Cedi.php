<?php

/**
 * This is the model class for table "m_cedi".
 *
 * The followings are the available columns in table 'm_cedi':
 * @property integer $IDCEDI
 * @property string $NombreCEDI
 * @property string $CedulaJefe
 * @property string $CelularJefe
 * @property string $TelefonoCEDI
 * @property integer $IndicativoTelefonoCEDI
 * @property string $DireccionCEDI
 * @property string $IdCentroCostos
 * @property string $CodigoEAN
 * @property string $HorarioAperturaLunesAViernes
 * @property string $HorarioCierreLunesAViernes
 * @property string $HorarioAperturaSabado
 * @property string $HorarioCierreSabadoo
 */
class Cedi extends CActiveRecord
{
    
        private static $_muelles=array();
    
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'm_Cedi';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('IDCEDI, NombreCEDI, CedulaJefe, DireccionCEDI, IdCentroCostos, HorarioAperturaLunesAViernes, HorarioCierreLunesAViernes, HorarioAperturaSabado, HorarioCierreSabadoo', 'required'),
			array('IDCEDI, IndicativoTelefonoCEDI', 'numerical', 'integerOnly'=>true),
			array('NombreCEDI', 'length', 'max'=>45),
			array('CedulaJefe, IdCentroCostos', 'length', 'max'=>15),
			array('CelularJefe, TelefonoCEDI, CodigoEAN', 'length', 'max'=>20),
			array('DireccionCEDI', 'length', 'max'=>80),
			array('HorarioAperturaLunesAViernes, HorarioCierreLunesAViernes, HorarioAperturaSabado, HorarioCierreSabadoo', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('IDCEDI, NombreCEDI, CedulaJefe, CelularJefe, TelefonoCEDI, IndicativoTelefonoCEDI, DireccionCEDI, IdCentroCostos, CodigoEAN, HorarioAperturaLunesAViernes, HorarioCierreLunesAViernes, HorarioAperturaSabado, HorarioCierreSabadoo', 'safe', 'on'=>'search'),
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
                    'acuerdos_cedi' => array(self::HAS_MANY, 'AcuerdosEntregaFabricante', 'IdCedi'),
                    'logistica' => array(self::HAS_MANY, 'LogisticaFabricante', 'IdCedi'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IDCEDI' => 'Id CEDI',
			'NombreCEDI' => 'Nombre Cedi',
			'CedulaJefe' => 'Cedula Jefe',
			'CelularJefe' => 'Celular Jefe',
			'TelefonoCEDI' => 'Telefono Cedi',
			'IndicativoTelefonoCEDI' => 'Indicativo Telefono Cedi',
			'DireccionCEDI' => 'Direccion Cedi',
			'IdCentroCostos' => 'Id Centro Costos',
			'CodigoEAN' => 'Codigo Ean',
			'HorarioAperturaLunesAViernes' => 'Horario Apertura Lunes Aviernes',
			'HorarioCierreLunesAViernes' => 'Horario Cierre Lunes Aviernes',
			'HorarioAperturaSabado' => 'Horario Apertura Sabado',
			'HorarioCierreSabadoo' => 'Horario Cierre Sabadoo',
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

		$criteria->compare('IDCEDI',$this->IDCEDI);
		$criteria->compare('NombreCEDI',$this->NombreCEDI,true);
		$criteria->compare('CedulaJefe',$this->CedulaJefe,true);
		$criteria->compare('CelularJefe',$this->CelularJefe,true);
		$criteria->compare('TelefonoCEDI',$this->TelefonoCEDI,true);
		$criteria->compare('IndicativoTelefonoCEDI',$this->IndicativoTelefonoCEDI);
		$criteria->compare('DireccionCEDI',$this->DireccionCEDI,true);
		$criteria->compare('IdCentroCostos',$this->IdCentroCostos,true);
		$criteria->compare('CodigoEAN',$this->CodigoEAN,true);
		$criteria->compare('HorarioAperturaLunesAViernes',$this->HorarioAperturaLunesAViernes,true);
		$criteria->compare('HorarioCierreLunesAViernes',$this->HorarioCierreLunesAViernes,true);
		$criteria->compare('HorarioAperturaSabado',$this->HorarioAperturaSabado,true);
		$criteria->compare('HorarioCierreSabadoo',$this->HorarioCierreSabadoo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Cedi the static model class
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
            $data = self::model()->findAll(array('order' => 'NombreCEDI'));
            $lst = CHtml::listData($data, 'IDCEDI', 'NombreCEDI');
            return $lst;
        }   
        
        public static function getCedi ($_Id){
            $criteria=new CDbCriteria;

            $criteria->select = 'CE.*, US.NumeroDocumento, US.EmailUsuario AS EmailUsuario, '
                    . 'CONCAT(US.PrimerNombre, " ", US.SegundoNombre, " ", US.PrimerApellido, " ", US.SegundoApellido) AS NombreCompleto';
            $criteria->alias = 'CE';
            $criteria->join='LEFT JOIN m_UsuariosCitasCedi US ON CE.CedulaJefe = US.NumeroDocumento ';
            $criteria->condition='CE.IDCEDI =' . $_Id;            
            
            $elCedi = Cedi::model()->find($criteria);
                
            return $elCedi;
        }


        public static function getNombreCedi ($_Id){

            $elNombreCedi = '';
            
            $criteria=new CDbCriteria;
            $criteria->select='NombreCEDI';  // seleccionar solo la columna 'title'
            $criteria->condition='IDCEDI=:IDCEDI';
            $criteria->params=array(':IDCEDI'=>$_Id);
            
            $elCedi = Cedi::model()->find($criteria); // $params no es necesario            
            
            if ($elCedi != null){                
                $elNombreCedi = $elCedi->NombreCEDI;                
            }
            return $elNombreCedi;
            
        }
        
}
