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
		$this->logger->info('Index/List');
    }
	
	public function addAction()
    {
		/*$submittedVal =json_encode($this->getRequest()->getPost());
		$this->view->mgr_sales =Zend_Registry::get('mgr_sales');
		$tmpArr =$this->view->mgr_sales;
		array_push($tmpArr,$this->getRequest()->getPost());
		//echo json_encode($tmpArr);
		$json = json_decode(file_get_contents(json_encode($tmpArr)), true);
		$this->logger->info('Index/Add');*/
    }
	
	public function editAction()
    {
		$this->logger->info('Index/Edit');
    }
	
	public function viewAction()
    {
		$this->logger->info('Index/View');
    }
	
	public function deleteAction()
    {
		$this->logger->info('Index/Delete');
    }
}

