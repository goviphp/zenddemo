<?php
class LoginController extends Zend_Controller_Action
{
    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
        $authNamespace = new Zend_Session_Namespace('Zend_Auth');
        $name = $this->getRequest()->getPost('txtUsername', null);
        $pass =$this->getRequest()->getPost('txtPassword', null);
        $writer = new Zend_Log_Writer_Stream('d:/log');
        $logger = new Zend_Log($writer);

        if('admin' == $name && 'admin' == $pass)
        {
            $logger->info($name);

            $authNamespace->user = "admin";
            $logger->info('Login Success');
            $this->_redirect('index');
        }
    }
}