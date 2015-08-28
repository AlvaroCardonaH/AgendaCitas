<?php

/**
 * This is the model class for table "t_solicitudcitaentregamercancia".
 *
 * The followings are the available columns in table 't_solicitudcitaentregamercancia':
 * @property integer $IdNumeroSolicitud
 * @property integer $IdTransportador
 * @property integer $IdFabricante
 * @property integer $IdCedi
 * @property integer $IdOrdenCompra
 * @property string $FechaRegistroOrdenCompra
 * @property string $FechaTentativaEntrega
 * @property string $FechaSolicitudCita
 * @property string $HoraSolicitudCita
 * @property integer $NumeroPiezas
 * @property string $TotalOrdenCompra
 * @property string $ObservacionesSolicitudCita
 * @property integer $IdEstadoSolicitudCita
 * @property integer $IdUsuarioGraba
 * @property string $FechaGraba
 * @property integer $IdUsuarioModifica
 * @property string $FechaModifica
 */
class SolicitudCitaEntregaMercancia extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
        public $NombreFabricante;
        public $NombreCEDI;
        public $TotalOrdenCompra;
       // public $NumeroPiezasFormat;
        public $IdMuelle;
        
	public function tableName()
	{
		return 't_SolicitudesCita';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('IdFabricante, IdCedi,  FechaSolicitudCita, HoraSolicitudCita', 'required'),
			array('IdTransportador, IdFabricante, IdCedi,   IdEstadoSolicitudCita, IdConductor', 'numerical', 'integerOnly'=>true),
			array('HoraSolicitudCita', 'length', 'max'=>10),
			//array('TotalOrdenCompra', 'length', 'max'=>15),
			array('ObservacionesSolicitudCita', 'length', 'max'=>255),
                        array('FechaSolicitudCita','validarFechaSolicitud'),
			array('FechaModifica', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('IdNumeroSolicitud, IdTransportador, IdFabricante, IdCedi, FechaSolicitudCita, HoraSolicitudCita, ObservacionesSolicitudCita, IdEstadoSolicitudCita, IdConductor', 'safe', 'on'=>'search'),
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
                    'estadosolicitud' => array(self::BELONGS_TO, 'EstadosSolicitudCita', 'IdEstadoSolicitudCita'),
                    'detallesolicitudcita' => array(self::BELONGS_TO, 'SolicitudesCitaDetalle', 'IdNumeroSolicitud'),
                    'cedi' => array(self::BELONGS_TO, 'Cedi', 'IdCedi'),
                    'fabricante' => array(self::BELONGS_TO, 'Fabricante', 'IdFabricante'),                    
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IdNumeroSolicitud' => 'Numero Solicitud',
			'IdTransportador' => 'Transportador',
			'IdFabricante' => 'Fabricante',
			'IdCedi' => 'Cedi',
                        'IdConductor' => 'Conductor',
			//'IdOrdenCompra' => 'Orden Compra',
                        'TotalOrdenCompra' => 'Total Orden Compra',
                        //'NumeroPiezasFormat' => 'Número Piezas',
			//'FechaRegistroOrdenCompra' => 'Fecha Registro Orden Compra',
			//'FechaTentativaEntrega' => 'Fecha Tentativa Entrega',
			'FechaSolicitudCita' => 'Fecha Solicitud',
			'HoraSolicitudCita' => 'Hora Solicitud',
			//'NumeroPiezas' => 'Numero Piezas',
			//'TotalOrdenCompra' => 'Total Orden Compra',
			'ObservacionesSolicitudCita' => 'Observaciones',
			'IdEstadoSolicitudCita' => 'Estado',
			//'IdUsuarioGraba' => 'Id Usuario Graba',
			'FechaGraba' => 'Fecha Graba',
			//'IdUsuarioModifica' => 'Id Usuario Modifica',
			//'FechaModifica' => 'Fecha Modifica',
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

		$criteria->compare('IdNumeroSolicitud',$this->IdNumeroSolicitud);
		$criteria->compare('IdTransportador',$this->IdTransportador);
		$criteria->compare('IdFabricante',$this->IdFabricante);
		$criteria->compare('IdCedi',$this->IdCedi);
                $criteria->compare('IdConductor',$this->IdConductor);
		//$criteria->compare('IdOrdenCompra',$this->IdOrdenCompra);
		//$criteria->compare('FechaRegistroOrdenCompra',$this->FechaRegistroOrdenCompra,true);
		//$criteria->compare('FechaTentativaEntrega',$this->FechaTentativaEntrega,true);
		$criteria->compare('FechaSolicitudCita',$this->FechaSolicitudCita,true);
		$criteria->compare('HoraSolicitudCita',$this->HoraSolicitudCita,true);
		//$criteria->compare('NumeroPiezas',$this->NumeroPiezas);
		//$criteria->compare('TotalOrdenCompra',$this->TotalOrdenCompra,true);
		$criteria->compare('ObservacionesSolicitudCita',$this->ObservacionesSolicitudCita,true);
		$criteria->compare('IdEstadoSolicitudCita',$this->IdEstadoSolicitudCita);
		//$criteria->compare('IdUsuarioGraba',$this->IdUsuarioGraba);
		$criteria->compare('FechaGraba',$this->FechaGraba,true);
		//$criteria->compare('IdUsuarioModifica',$this->IdUsuarioModifica);
		//$criteria->compare('FechaModifica',$this->FechaModifica,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SolicitudCitaEntregaMercancia the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
	public function getSolicitudCita ($miIdNumeroSolicitud)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

                $criteria->select = 'SC.*, FA.Nombre AS NombreFabricante, CE.NombreCEDI, TR.Nombre AS NombreTransportador, '
                        . ' CONCAT(CO.PrimerNombre, " ", CO.SegundoNombre, " ", CO.PrimerApellido, " ", CO.SegundoApellido) AS NombreConductor ';
                $criteria->alias = 'SC';
                $criteria->join='LEFT JOIN m_Fabricante FA ON SC.IdFabricante = FA.IdFabricante '
                        . 'LEFT JOIN m_Cedi CE ON SC.IdCedi = CE.IdCedi '
                        . 'LEFT JOIN m_Transportador TR ON TR.IdTransportador = SC.IdTransportador '
                        . 'LEFT JOIN m_Conductor CO ON SC.IdConductor = CO.IdConductor ';
                
		$criteria->condition='SC.IdNumeroSolicitud =' . $miIdNumeroSolicitud;

                $solicitudCitaEntregaMercancia = SolicitudCitaEntregaMercancia::model()->find($criteria);
                
		return $solicitudCitaEntregaMercancia;
	}
        
        public function validarFechaSolicitud($attribute, $params){
            
            $_Fecha = $this->FechaSolicitudCita;
            $_IdCedi = $this->IdCedi;
            $elMensaje = null;
            
            $bloqueosfecha = FechasBloqueadas::getDatosBloqueoFecha($_Fecha);
            
            foreach ($bloqueosfecha as $reg){ 
                if (empty($reg->IdCedi)){
                    if (($this->HoraSolicitudCita >= $reg->HoraInicio) &&
                        ($this->HoraSolicitudCita <= $reg->HoraFinal)){

                        $elMensaje = 'Fecha No Disponible Para La Solicitud. '
                           . $reg->ObservacionesBloqueo
                           . '. Hora Inicio: ' . $reg->HoraInicio
                           . '. Hora Final: ' . $reg->HoraFinal; 

                        break;
                    }
                }else{
                    if ($reg->IdCedi == $this->IdCedi){
                        if (empty($reg->IdMuelle)){
                            if (($this->HoraSolicitudCita >= $reg->HoraInicio) &&
                                ($this->HoraSolicitudCita <= $reg->HoraFinal)){

                                $elMensaje = 'Fecha No Disponible Para La Solicitud. '
                                   . $reg->ObservacionesBloqueo
                                   . '. Hora Inicio: ' . $reg->HoraInicio
                                   . '. Hora Final: ' . $reg->HoraFinal; 

                                break;
                            }                            
                        }
                    }
                }
            }
            
            if ($elMensaje){
                $this->addError('ObservacionesSolicitudCita', $elMensaje);
            }
        }
        
        public function getTotalOrdenCompra($IdNumeroSolicitud)
        {
            
            
            $sql = "SELECT SUM(TotalOrdenCompra) 
                    FROM t_solicitudescitadetalle
                    WHERE IdNumeroSolicitud = $IdNumeroSolicitud
                ";
            
            $TotalOrdenCompra = Yii::app()->db->createCommand($sql)->queryScalar();
            
              return  Yii::app()->format->formatNumber($TotalOrdenCompra);
            
        }
        
        public function getTotalNumeroPiezas($IdNumeroSolicitud)
        {
            
            
            $sql = "SELECT SUM(NumeroPiezas) 
                    FROM t_solicitudescitadetalle
                    WHERE IdNumeroSolicitud = $IdNumeroSolicitud
                ";
            
            $TotalNumeroPiezas = Yii::app()->db->createCommand($sql)->queryScalar();
            
              return  Yii::app()->format->formatNumber($TotalNumeroPiezas);
            
        }
        
}
