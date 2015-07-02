<?php

class IndexController extends Zend_Controller_Action
{

    private $logger = null;

    public function init()
    {
        $authNamespace = new Zend_Session_Namespace('Zend_Auth');
        if (!$authNamespace->user) {
            $this->_redirect('login');
        }
        $writer = new Zend_Log_Writer_Stream('d:/log');
        $this->logger = new Zend_Log($writer);
    }

    public function indexAction()
    {
        $mgr_sales =Zend_Registry::get('mgr_sales');
        $this->view->mgr_sales = $mgr_sales;
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

    public function addsalesAction()
    {        
        /*$this->view->form = new Application_Form_Salesinfo();
        $this->view->form->setAction($this->view->url(array('controller'=>'index','action'=>'createsales'),'create'));*/
        // Creating html form for student insert
        $form = new Application_Form_Salesinfo();
        // then return the form
        print_r($form);
        return array('form'=>$form);
    }


}


