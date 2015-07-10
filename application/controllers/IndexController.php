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
<<<<<<< HEAD
        $this->logger->info('Index/List');
=======
		$this->view->mgr_sales =Zend_Registry::get('mgr_sales');
>>>>>>> siva-final-branch
    }

    public function addAction()
    {
<<<<<<< HEAD
        $this->logger->info('Index/Add');
=======
		$this->view->mgr_sales =Zend_Registry::get('mgr_sales');
		$tmpArr =$this->view->mgr_sales;
		if(sizeof($this->getRequest()->getPost()) > 0){
			array_push($tmpArr,$this->getRequest()->getPost());
			$fp = fopen(DATA_PATH."/manager_sales.json", 'w');
			fwrite($fp, json_encode($tmpArr));
			fclose($fp);
			$this->_redirect('index');
		}
>>>>>>> siva-final-branch
    }

    public function editAction()
    {
<<<<<<< HEAD
        $this->logger->info('Index/Edit');
=======
		$originalVal = $this->view->mgr_sales =Zend_Registry::get('mgr_sales');
		$this->view->ref = $this->getRequest()->getParam('ref');
		if(sizeof($this->getRequest()->getPost()) > 0){
			$originalVal[$this->view->ref]=$this->getRequest()->getPost();
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
		$this->view->ref = $this->getRequest()->getParam('ref');
>>>>>>> siva-final-branch
    }

    public function deleteAction()
    {
<<<<<<< HEAD
        $this->logger->info('Index/Delete');
    }
}
=======
		$originalVal =$this->view->mgr_sales =Zend_Registry::get('mgr_sales');
		$request = new Zend_Controller_Request_Http();
		$this->view->ref = $this->getRequest()->getParam('ref');
		$originalVal = $this->array_delete($this->view->ref, $originalVal);
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

>>>>>>> siva-final-branch
