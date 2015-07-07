<?php

class IndexController extends Zend_Controller_Action
{
	private $logger;
    public function init()
    {
       $authNamespace = new Zend_Session_Namespace('Zend_Auth');
		if(!$authNamespace->user)
		{
			$this->_redirect('login');
		}
		$writer = new Zend_Log_Writer_Stream('d:/log');
		$this->logger = new Zend_Log($writer);
    }

    public function indexAction()
    {
		$this->view->mgr_sales =Zend_Registry::get('mgr_sales');
    }
	
	public function addAction()
    {
		$this->view->mgr_sales =Zend_Registry::get('mgr_sales');
		$tmpArr =$this->view->mgr_sales;
		if(sizeof($this->getRequest()->getPost()) > 0){
			array_push($tmpArr,$this->getRequest()->getPost());
			$fp = fopen(DATA_PATH."/manager_sales.json", 'w');
			fwrite($fp, json_encode($tmpArr));
			fclose($fp);
			$this->_redirect('index');
		}
    }
	
	public function editAction()
    {
		$originalVal =$this->view->mgr_sales =Zend_Registry::get('mgr_sales');
		$request = new Zend_Controller_Request_Http();
		$ref = $request->getParam('ref');
		if(sizeof($this->getRequest()->getPost()) > 0){
			$originalVal[$ref]=$this->getRequest()->getPost();
			$fp = fopen(DATA_PATH."/manager_sales.json", 'w');
			fwrite($fp, json_encode($originalVal));
			fclose($fp);
			$this->_redirect('index');
		}
    }
	
	public function viewAction()
    {
		$this->logger->info('Index/View');
		$this->view->mgr_sales =Zend_Registry::get('mgr_sales');
    }
	
	public function deleteAction()
    {
		$originalVal =$this->view->mgr_sales =Zend_Registry::get('mgr_sales');
		$request = new Zend_Controller_Request_Http();
		$ref = $request->getParam('ref');
		$originalVal = $this->array_delete($ref, $originalVal);
		$fp = fopen(DATA_PATH."/manager_sales.json", 'w');
		fwrite($fp, json_encode($originalVal));
		fclose($fp);
    }

	/* 
	$del_val as a key to delete from an $array
	*/
	public function array_delete($del_val, $array) {
		foreach ($array as $key => $value){
			if ($key == $del_val) {
				unset($array[$key]);
			}
		}
		return array_values($array);
	}
}

