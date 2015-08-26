<?php

/**
 * This is the model class for table "t_solicitudescitadetalle".
 *
 * The followings are the available columns in table 't_solicitudescitadetalle':
 * @property integer $IdSolicitudesCitaDetalle
 * @property integer $IdNumeroSolicitud
 * @property integer $IdOrdenCompra
 * @property string $TotalOrdenCompra
 * @property integer $NumeroPiezas
 * @property string $FechaGraba
 * @property string $Adjunto
 * @property integer $IdEstadoOrdenCompra
 * @property string $FechaTentativaEntrega
 * @property string $FechaRegistroOrdenCompra
 *
 * The followings are the available model relations:
 * @property TSolicitudescita $idNumeroSolicitud
 * @property HOrdenescompracitascedi $idOrdenCompra
 */
class SolicitudesCitaDetalle extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_solicitudescitadetalle';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('FechaGraba', 'required'),
			array('IdNumeroSolicitud, IdOrdenCompra, NumeroPiezas, IdEstadoOrdenCompra', 'numerical', 'integerOnly'=>true),
			array('TotalOrdenCompra', 'length', 'max'=>15),
			array('Adjunto', 'length', 'max'=>255),
			array('FechaTentativaEntrega, FechaRegistroOrdenCompra', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('IdSolicitudesCitaDetalle, IdNumeroSolicitud, IdOrdenCompra, TotalOrdenCompra, NumeroPiezas, FechaGraba, Adjunto, IdEstadoOrdenCompra, FechaTentativaEntrega, FechaRegistroOrdenCompra', 'safe', 'on'=>'search'),
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
			'idNumeroSolicitud' => array(self::BELONGS_TO, 'TSolicitudescita', 'IdNumeroSolicitud'),
			'idOrdenCompra' => array(self::BELONGS_TO, 'HOrdenescompracitascedi', 'IdOrdenCompra'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IdSolicitudesCitaDetalle' => 'Id Solicitudes Cita Detalle',
			'IdNumeroSolicitud' => 'Id Numero Solicitud',
			'IdOrdenCompra' => 'Id Orden Compra',
			'TotalOrdenCompra' => 'Total Orden Compra',
			'NumeroPiezas' => 'Numero Piezas',
			'FechaGraba' => 'Fecha Graba',
			'Adjunto' => 'Adjunto',
			'IdEstadoOrdenCompra' => 'Id Estado Orden Compra',
			'FechaTentativaEntrega' => 'Fecha Tentativa Entrega',
			'FechaRegistroOrdenCompra' => 'Fecha Registro Orden Compra',
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

		$criteria->compare('IdSolicitudesCitaDetalle',$this->IdSolicitudesCitaDetalle);
		$criteria->compare('IdNumeroSolicitud',$this->IdNumeroSolicitud);
		$criteria->compare('IdOrdenCompra',$this->IdOrdenCompra);
		$criteria->compare('TotalOrdenCompra',$this->TotalOrdenCompra,true);
		$criteria->compare('NumeroPiezas',$this->NumeroPiezas);
		$criteria->compare('FechaGraba',$this->FechaGraba,true);
		$criteria->compare('Adjunto',$this->Adjunto,true);
		$criteria->compare('IdEstadoOrdenCompra',$this->IdEstadoOrdenCompra);
		$criteria->compare('FechaTentativaEntrega',$this->FechaTentativaEntrega,true);
		$criteria->compare('FechaRegistroOrdenCompra',$this->FechaRegistroOrdenCompra,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SolicitudesCitaDetalle the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
