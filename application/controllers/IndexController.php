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
		$this->logger->info('Index/List');
    }
	
	public function addAction()
    {
		$this->logger->info('Index/Add');
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

