<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Datasource\ConnectionManager;
use Cake\ORM\Locator\LocatorAwareTrait;

class UtilizationCertificatesController extends AppController
{
    
    // public function index()
    // {
        // $this->paginate = [
            // 'contain' => ['ProjectWorks', 'ProjectWorkSubdetails'],
        // ];
        // $utilizationCertificates = $this->paginate($this->UtilizationCertificates);

        // $this->set(compact('utilizationCertificates'));
    // }
   
    // public function view($id = null)
    // {
		
		 // $this->viewBuilder()->setLayout('layout');
        // $this->loadModel('projectWorks');
        // $this->loadModel('ProjectWorkSubdetails');
        // $user  = $this->request->getAttribute('identity');
        // $utilizationCertificate = $this->UtilizationCertificates->get($id, [
            // 'contain' => ['ProjectWorks', 'ProjectWorkSubdetails'],
        // ]);

        // $this->set(compact('utilizationCertificate'));
    // }

    public function utilizationcertificates($pw_id = null,$work_id = null)
    {
        $this->viewBuilder()->setLayout('layout');
        //$this->loadModel('projectWorks');
        $this->loadModel('ProjectWorkSubdetails');
        $user  = $this->request->getAttribute('identity');		
		$utilizationCertificatecount = $this->UtilizationCertificates->find('all')->where(['UtilizationCertificates.project_work_id'=>$pw_id,'UtilizationCertificates.project_work_subdetail_id'=>$work_id])->count();
		$utilizationCertificatelists = $this->UtilizationCertificates->find('all')->where(['UtilizationCertificates.project_work_id'=>$pw_id,'UtilizationCertificates.project_work_subdetail_id'=>$work_id])->toArray();

        $utilizationCertificate = $this->UtilizationCertificates->newEmptyEntity();
        if ($this->request->is('post')) {
             $attachment  = $this->request->getData('certificate_upload');
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
                    $newfile                                =  "utilizationCertificates_" . $current_time . "." . $fileExt;
                    $tempFile                               =  $tmpName;
                    $targetPath                             =  'uploads/utilizationCertificates/';
                    $targetFile                             =  $targetPath . $newfile;
                    $utilizationCertificate->certificate_upload    =   $newfile;
                    move_uploaded_file($tempFile, $targetFile);
                }
            }
            $utilizationCertificate->remarks                    = $this->request->getData('remarks');
            $utilizationCertificate->project_work_id            = $pw_id;
            $utilizationCertificate->project_work_subdetail_id  = $work_id;
            $utilizationCertificate->certificated_date          = date('Y_m_d',strtotime($this->request->getData('certificated_date')));
            $utilizationCertificate->amount 					= $this->request->getData('amount');
            $utilizationCertificate->created_by                 = $user->id; 
            $utilizationCertificate->created_date               = date('Y_m_d:h:i:s');
            if ($this->UtilizationCertificates->save($utilizationCertificate)) {				   
				
                $this->Flash->success(__('The utilization certificate has been saved.'));
                return $this->redirect(['action' => 'utilizationcertificates/'.$pw_id.'/'.$work_id]);
            }
            $this->Flash->error(__('The utilization certificate could not be saved. Please, try again.'));
        }
        $this->set(compact('utilizationCertificate', 'projectWorks', 'projectWorkSubdetails','utilizationCertificatelists','utilizationCertificatelists','utilizationCertificatecount','pw_id','work_id'));
    }
  
    public function utilizationcertificatesedit($pw_id = null,$work_id = null,$certificate_id = null)
    {
        $this->viewBuilder()->setLayout('layout');
        $user  = $this->request->getAttribute('identity');		
	   $utilizationCertificate = $this->UtilizationCertificates->get($certificate_id, [
            'contain' => [],
        ]);
      
        if ($this->request->is(['patch', 'post', 'put'])) {
            $attachment  = $this->request->getData('certificate_upload');
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
                    $newfile                                =  "utilizationCertificates_" . $current_time . "." . $fileExt;
                    $tempFile                               =  $tmpName;
                    $targetPath                             =  'uploads/utilizationCertificates/';
                    $targetFile                             =  $targetPath . $newfile;
                    $utilizationCertificate->certificate_upload    =   $newfile;
                    move_uploaded_file($tempFile, $targetFile);
                }
            }else {
                $utilizationCertificate->certificate_upload              =  $this->request->getData('certificate_upload1');
            }
            $utilizationCertificate->remarks                   = $this->request->getData('remarks');
            $utilizationCertificate->project_work_id           = $pw_id;
            $utilizationCertificate->project_work_subdetail_id = $work_id;
            $utilizationCertificate->certificated_date         = date('Y_m_d',strtotime($this->request->getData('certificated_date')));
		    $utilizationCertificate->amount 					= $this->request->getData('amount');
            $utilizationCertificate->modified_by                = $user->id; 
            $utilizationCertificate->modified_date              = date('Y_m_d:h:i:s');
            if ($this->UtilizationCertificates->save($utilizationCertificate)) {
                $this->Flash->success(__('The utilization certificate has been saved.'));
			     return $this->redirect(['action' => 'utilizationcertificates/'.$pw_id.'/'.$work_id]);
            }

            $this->Flash->error(__('The utilization certificate could not be saved. Please, try again.'));
        }
        $this->set(compact('utilizationCertificate'));
    }

   
}