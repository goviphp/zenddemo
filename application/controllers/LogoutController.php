<?php

class LogoutController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
		$writer = new Zend_Log_Writer_Stream('d:/log');
		$logger = new Zend_Log($writer);
		$logger->info('Logout');
		$authNamespace = new Zend_Session_Namespace('Zend_Auth');
		$authNamespace->user = "";
		$this->_redirect('login');
    }


}

