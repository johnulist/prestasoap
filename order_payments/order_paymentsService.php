<?php

define( '_PS_VERSION_', 1 );

/**
 * Prestashop SOAP Connector
 *
 * Prestashop SOAP Connector 
 *
 * @package    prestasoap
 * @subpackage modules
 * @author     Mickael cabanas (cabanas.mickael|at|gmail.com)
 * @copyright  2012 Mickael Cabanas
 * @license    http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @version    $Id:$
 */

 /** loading framework **/
include_once('../Commons.php');

	
	/**
    * This function getByID
	* (expose as WS)
    * @param
    * @return 
   */
	function GetOrder_paymentById($params) {
		
		$resource = 'order_payments';
		$resourceSingle = 'order_payment';
		return GetById($params,$resource,$resourceSingle);
		
	}
	/**
    * This function GetALL
	* (expose as WS)
    * @param
    * @return 
   */
	function GetOrder_payments($params) {
	
		$resource = 'order_payments';
		$resourceSingle = 'order_payment';
		return GetList($params,$resource,$resourceSingle);
		
	}
	
	/**
    * This function Crete Object
	* (expose as WS)
    * @param
    * @return 
   */
	function CreateOrder_payment($params) {
		
		$resource = 'order_payments';
		$resourceSingle = 'order_payment';
		return CreateMapper($params,$resource,$resourceSingle);
	}
	
	/**
    * This function Update Object
	* (expose as WS)
    * @param
    * @return 
   */
	function UpdateOrder_payment($params) {
		
		$resource = 'order_payments';
		$resourceSingle = 'order_payment';
		return UpdateMapper($params,$resource,$resourceSingle);
	
	}
	
	/**
    * This function Delete Object
	* (expose as WS)
    * @param
    * @return 
   */
	function DeleteOrder_payment($params) {
		
		$resource = 'order_payments';
		$resourceSingle = 'order_payment';
		return DeleteMapper($params,$resource,$resourceSingle);
	
	}

	
	
	
	
	$soap_ws_custom_on = WSDL_SERVICES_ON;
	/* SOAP SETTINGS */
	if ($soap_ws_custom_on==1){
		$soap_ws_custom_cache_on = WSDL_CACHE_ON;
		ini_set("soap.wsdl_cache_enabled", $soap_ws_custom_cache_on); // wsdl cache settings
		$options = array('soap_version' => SOAP_1_2);
		
		/** SOAP SERVER **/
		$server = new SoapServer(WSDL_ORDER_PAYMENTS);
		
		/* Add Functions */
		$server->addFunction("GetOrder_payments");
		$server->addFunction("GetOrder_paymentById");
		$server->addFunction("CreateOrder_payment");
		$server->addFunction("UpdateOrder_payment");
		$server->addFunction("DeleteOrder_payment");

		$server->handle();
		
	}else{
		echoXmlMessageWSDisabled('Order_payment');
	}
?> 