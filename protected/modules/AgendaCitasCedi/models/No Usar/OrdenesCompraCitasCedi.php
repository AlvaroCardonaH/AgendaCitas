<?php

/**
 * This is the model class for table "h_ordenescompracitascedi".
 *
 * The followings are the available columns in table 'h_ordenescompracitascedi':
 * @property integer $NumeroOrdenCompra
 * @property integer $IdFabricante
 * @property string $NombreFabricante
 * @property integer $IdCedi
 * @property string $NombreCedi
 * @property string $TotalOrdenCompra
 * @property integer $IdEstadoOrdenCompra
 * @property string $FechaTentativaEntrega
 * @property string $FechaRegistroOrdenCompra
 */
class OrdenesCompraCitasCedi extends CActiveRecord
{
    
        public $IdTransportador;
        public $NombreTransportador;
        public $HoraDia;
        public $DiaSemana;
        public $FechaSolicitudCita ;
        public $NumeroPiezas;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'h_OrdenesCompraCitasCedi';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('NumeroOrdenCompra, IdFabricante, NombreFabricante, IdCedi, NombreCedi, FechaSolicitudCita, NumeroPiezas', 'required'),
			array('NumeroOrdenCompra, IdFabricante, IdCedi, NumeroPiezas', 'numerical', 'integerOnly'=>true),
			array('NombreFabricante', 'length', 'max'=>150),
			array('NombreCedi', 'length', 'max'=>45),
			array('TotalOrdenCompra', 'length', 'max'=>15),
			array('FechaTentativaEntrega, FechaRegistroOrdenCompra', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('NumeroOrdenCompra, IdFabricante, NombreFabricante, IdCedi, NombreCedi, TotalOrdenCompra, FechaTentativaEntrega, FechaRegistroOrdenCompra', 'safe', 'on'=>'search'),
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
                        'estadoorden' => array(self::BELONGS_TO, 'EstadosOrdenCompra', 'IdEstadoOrdenCompra'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'NumeroOrdenCompra' => 'Orden Compra',
			'IdFabricante' => 'Fabricante',
			'NombreFabricante' => 'Nombre Fabricante',
			'IdCedi' => 'Cedi',
			'NombreCedi' => 'Nombre Cedi',
			'TotalOrdenCompra' => 'Valor Total',
			'IdEstadoOrdenCompra' => 'Estado',
			'FechaTentativaEntrega' => 'Fecha Tentativa',
			'FechaRegistroOrdenCompra' => 'Fecha Registro',
                        'IdNumeroSolicitud' => 'Número Solicitud',
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

            $usuario = Usuarios::getUsuarioId(app()->user->id);
            
            if ($usuario){
                
                $criteria=new CDbCriteria;
                
                switch ($usuario->IdRol){
                    case 1:
                    case 2:
                        $criteria->select = 'OC.*, LF.IdTransportador, AE.DiaSemana, AE.HoraDia, TR.Nombre AS NombreTransportador, '
                                . ' CalcularFechaEntregaMcia(OC.FechaRegistroOrdenCompra,AE.DiaSemana) AS FechaSolicitudCita ';
                        $criteria->alias = 'OC';
                        $criteria->join='LEFT JOIN m_LogisticaFabricante LF ON OC.IdFabricante = LF.IdFabricante '
                                . 'AND OC.IdCedi = LF.IdCedi '
                                . 'LEFT JOIN m_AcuerdosEntregaFabricante AE ON OC.IdFabricante = AE.IdFabricante '
                                . 'AND OC.IdCedi = AE.IdCedi '
                                . 'LEFT JOIN m_Transportador TR ON TR.IdTransportador = LF.IdTransportador ';                        
                        break;
                    case 3:
                    case 4:
                        $criteria->select = 'OC.*, LF.IdTransportador, AE.DiaSemana, AE.HoraDia, TR.Nombre AS NombreTransportador, '
                                . ' CalcularFechaEntregaMcia(OC.FechaRegistroOrdenCompra,AE.DiaSemana) AS FechaSolicitudCita ';
                        $criteria->alias = 'OC';
                        $criteria->join='LEFT JOIN m_LogisticaFabricante LF ON OC.IdFabricante = LF.IdFabricante '
                                . 'AND OC.IdCedi = LF.IdCedi '
                                . 'LEFT JOIN m_AcuerdosEntregaFabricante AE ON OC.IdFabricante = AE.IdFabricante '
                                . 'AND OC.IdCedi = AE.IdCedi '
                                . 'LEFT JOIN m_Transportador TR ON TR.IdTransportador = LF.IdTransportador ';
                        $criteria->condition='LF.IdUsuarioResponsable='. app()->user->id;                        
                        break;
                    default:
                        break;
                } // switch ($usuario->IdRol)
                
		$criteria->compare('NumeroOrdenCompra',$this->NumeroOrdenCompra);
		$criteria->compare('OC.IdFabricante',$this->IdFabricante);
		$criteria->compare('NombreFabricante',$this->NombreFabricante,true);
		$criteria->compare('OC.IdCedi',$this->IdCedi);
                $criteria->compare('LF.IdTransportador',$this->IdTransportador);
		$criteria->compare('NombreCedi',$this->NombreCedi,true);
		$criteria->compare('TotalOrdenCompra',$this->TotalOrdenCompra,true);
		$criteria->compare('IdEstadoOrdenCompra',$this->IdEstadoOrdenCompra);
		$criteria->compare('FechaTentativaEntrega',$this->FechaTentativaEntrega,true);
		$criteria->compare('FechaRegistroOrdenCompra',$this->FechaRegistroOrdenCompra,true);
                
		return new CActiveDataProvider($this, array(
                        'keyAttribute'=>'NumeroOrdenCompra',// IMPORTANTE, para que el CGridView conozca la seleccion
			'criteria'=>$criteria,
		));                
                
            }
            
            return null;
                                  
	}

	public function getOrdenCompraCitaCedi($miNumeroOrdenCompra)
	{
            // @todo Please modify the following code to remove attributes that should not be searched.
            
            $criteria=new CDbCriteria;
            
                        $criteria->select = 'OC.*, LF.IdTransportador, AE.DiaSemana, AE.HoraDia, TR.Nombre AS NombreTransportador, '
                                    . ' CalcularFechaEntregaMcia(OC.FechaRegistroOrdenCompra,AE.DiaSemana) AS FechaSolicitudCita ';
                        $criteria->alias = 'OC';
                        $criteria->join='LEFT JOIN m_LogisticaFabricante LF ON OC.IdFabricante = LF.IdFabricante '
                                    . 'AND OC.IdCedi = LF.IdCedi '
                                    . 'LEFT JOIN m_AcuerdosEntregaFabricante AE ON OC.IdFabricante = AE.IdFabricante '
                                    . 'AND OC.IdCedi = AE.IdCedi '
                                    . 'LEFT JOIN m_Transportador TR ON TR.IdTransportador = LF.IdTransportador ';
                        $criteria->condition='LF.IdUsuarioResponsable='. app()->user->id;
                        $criteria->condition='OC.NumeroOrdenCompra=' . $miNumeroOrdenCompra;

            
            $laOrdenCompraCitaCedi = OrdenesCompraCitasCedi::model()->find($criteria);
                
            return $laOrdenCompraCitaCedi;
	}
        
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return OrdenesCompraCitasCedi the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
