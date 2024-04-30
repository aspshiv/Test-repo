<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Datasource\ConnectionManager;
use Cake\ORM\Locator\LocatorAwareTrait;

class UcFundSanctionedDetailsController extends AppController
{

    public function index()
    {
       $this->viewBuilder()->setLayout('layout');   
	   $this->loadModel('Departments');
	   $connection = ConnectionManager::get('default');  
	
	   $query            =  "SELECT uc.*,fs.go_no as go_no
							 from utilization_certificates as uc 
							 LEFT JOIN project_work_subdetails as psd on psd.id = uc.project_work_subdetail_id
							 LEFT JOIN project_financial_sanctions as fs on fs.project_work_id =uc.project_work_id
							 ";											 
												 
        $uc_lists            = $connection->execute($query)->fetchAll('assoc');  
		
		// echo "<pre>"; print_r($uc_lists); exit();  

        $this->set(compact('uc_lists'));
    }
  
    public function view($id = null)
    {
        $this->viewBuilder()->setLayout('layout');
        $this->loadModel('UtilizationCertificates');
        $user  = $this->request->getAttribute('identity');	
		
		$utilizationCertificate     = $this->UtilizationCertificates->find('all')->where(['UtilizationCertificates.id'=>$id])->first();
		$ucFundSanctionedDetail     = $this->UcFundSanctionedDetails->find('all')->where(['UcFundSanctionedDetails.utilization_certificate_id'=>$id])->first();


        $this->set(compact('ucFundSanctionedDetail','utilizationCertificate'));
    }
   
    public function add($id = null)
    {
		  $this->viewBuilder()->setLayout('layout');
        //$this->loadModel('projectWorks');
        $this->loadModel('ProjectWorkSubdetails');
        $this->loadModel('UtilizationCertificates');
        $this->loadModel('ProjectFinancialSanctions');
        $this->loadModel('OpeningBalanceLogs');
        $this->loadModel('OpeningBalanceDetails');
        $user  = $this->request->getAttribute('identity');	
		
		$utilizationCertificate = $this->UtilizationCertificates->find('all')->where(['UtilizationCertificates.id'=>$id])->first();
		$financial_sanction     = $this->ProjectFinancialSanctions->find('all')->where(['ProjectFinancialSanctions.project_work_id'=>$utilizationCertificate['project_work_id']])->first();

        //echo "<pre>";   print_r($financial_sanction);  exit();  
		
		$ucFundSanctionedDetail = $this->UcFundSanctionedDetails->newEmptyEntity();		
        if ($this->request->is('post')) { //echo "<pre>"; print_r($this->request->getData()); exit();
			
			 /*$attachment  = $this->request->getData('file_upload');
            if ($attachment->getClientFilename() != '') {
                $name    = $attachment->getClientFilename();
                $type    = $attachment->getClientMediaType();
                $size    = $attachment->getSize();
                $tmpName = $attachment->getStream()->getMetadata('uri');
                $error   = $attachment->getError();

                if ($name != '' && $error == 0) {
                    $file                                   =  $name;
                    $array                                  =  explode('.', $file);
                    $fileExt                                =  $array[count($array) - 1];
                    $current_time                           =  date('Y_m_d');
                    $newfile                                =  "uc_sanctioned_" . $current_time . "." . $fileExt;
                    $tempFile                               =  $tmpName;
                    $targetPath                             =  'uploads/UC_sanctioned/';
                    $targetFile                             =  $targetPath . $newfile;
                    $ucFundSanctionedDetail->certificate_upload    =   $newfile;
                    move_uploaded_file($tempFile, $targetFile);
                }
            }*/
            $ucFundSanctionedDetail->utilization_certificate_id = $id;
            $ucFundSanctionedDetail->project_work_id            = $utilizationCertificate['project_work_id'];
            $ucFundSanctionedDetail->project_work_subdetail_id  = $utilizationCertificate['project_work_subdetail_id'];
            $ucFundSanctionedDetail->go_no                      = $financial_sanction['go_no'];
            $ucFundSanctionedDetail->sanctioned_date            = date('Y_m_d',strtotime($this->request->getData('sanctioned_date')));
            $ucFundSanctionedDetail->amount 					= $this->request->getData('amount');
            $ucFundSanctionedDetail->remarks 					= $this->request->getData('remarks');
			$ucFundSanctionedDetail->submit_date                = date('Y-m-d');
            $ucFundSanctionedDetail->created_by                 = $user->id; 
            $ucFundSanctionedDetail->created_date               = date('Y-m-d h:i:s');  
            //echo "<pre>"; print_r($ucFundSanctionedDetail); exit();  
            if ($this->UcFundSanctionedDetails->save($ucFundSanctionedDetail)) {
				
				$ProjectsubWorksTable      = $this->getTableLocator()->get('UtilizationCertificates');
				$projectsub                = $ProjectsubWorksTable->get($id); 
				$projectsub->uc_sanctioned  = 1;
				$ProjectsubWorksTable->save($projectsub);
							
				$hobalancedetail       = $this->OpeningBalanceDetails->find('all')->contain(['Offices','Divisions'])->where(['OpeningBalanceDetails.office_id' => 1])->first();
										  
			   // HO Debit details   							   
			   if($hobalancedetail != ''){	
					$hoopening   = $hobalancedetail['opening_balance'] - $this->request->getData('amount');		
				}					  
				$openingBalanceLog   = $this->OpeningBalanceLogs->newEmptyEntity();
				$openingBalanceLog->division_id           = null;
				$openingBalanceLog->office_id             = 1;
				$openingBalanceLog->opening_balance       = $hoopening;
				$openingBalanceLog->balance_date          = date('Y-m-d');
				$openingBalanceLog->payment_info          = 2;
				//$openingBalanceLog->request_date          = date('Y-m-d',strtotime($projectFundRequest['request_date']));
				$openingBalanceLog->transaction_amount    = $this->request->getData('amount');
				$openingBalanceLog->is_amount_received    = 0;
				$openingBalanceLog->received_date         = null;
				$openingBalanceLog->received_amount       = null;
				$openingBalanceLog->created_by            = $user->id;
				$openingBalanceLog->created_date          = date('Y-m-d H:i:s');
				//echo "<pre>"; print_r($openingBalanceLog); exit();
				if ($this->OpeningBalanceLogs->save($openingBalanceLog)) {
					$OpeningBalanceDetailsTable     = $this->getTableLocator()->get('OpeningBalanceDetails');
					$project                        = $OpeningBalanceDetailsTable->get($hobalancedetail['id']);
					$project->opening_balance       = $hoopening;
					$project->balance_date          =  date('Y-m-d');
					$OpeningBalanceDetailsTable->save($project);
				}							
							
                $this->Flash->success(__('The uc fund sanctioned detail has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The uc fund sanctioned detail could not be saved. Please, try again.'));
        }
		
		
        $this->set(compact('ucFundSanctionedDetail', 'utilizationCertificate', 'projectWorks', 'projectWorkSubdetails'));
    }

    public function edit($id = null)
    {
        $ucFundSanctionedDetail = $this->UcFundSanctionedDetails->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ucFundSanctionedDetail = $this->UcFundSanctionedDetails->patchEntity($ucFundSanctionedDetail, $this->request->getData());
            if ($this->UcFundSanctionedDetails->save($ucFundSanctionedDetail)) {
                $this->Flash->success(__('The uc fund sanctioned detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The uc fund sanctioned detail could not be saved. Please, try again.'));
        }
        $utilizationCertificates = $this->UcFundSanctionedDetails->UtilizationCertificates->find('list', ['limit' => 200])->all();
        $projectWorks = $this->UcFundSanctionedDetails->ProjectWorks->find('list', ['limit' => 200])->all();
        $projectWorkSubdetails = $this->UcFundSanctionedDetails->ProjectWorkSubdetails->find('list', ['limit' => 200])->all();
        $this->set(compact('ucFundSanctionedDetail', 'utilizationCertificates', 'projectWorks', 'projectWorkSubdetails'));
    }
   
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ucFundSanctionedDetail = $this->UcFundSanctionedDetails->get($id);
        if ($this->UcFundSanctionedDetails->delete($ucFundSanctionedDetail)) {
            $this->Flash->success(__('The uc fund sanctioned detail has been deleted.'));
        } else {
            $this->Flash->error(__('The uc fund sanctioned detail could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
