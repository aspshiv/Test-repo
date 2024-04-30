<?php

declare(strict_types=1);

namespace App\Controller;

class ProjectwiseTimeExtensionDetailsController extends AppController
{

    public function index()
    {
        $this->viewBuilder()->setLayout('layout');

        $this->paginate = [
            'contain' => ['ProjectWorks', 'ProjectWorkSubdetails'],
        ];
		
        $projectwiseTimeExtensionDetails = $this->paginate($this->ProjectwiseTimeExtensionDetails);

        $this->set(compact('projectwiseTimeExtensionDetails'));
    }


    public function view($pid = null, $work_id = null,$id = null)
    {
        $this->viewBuilder()->setLayout('layout');

        $projectwiseTimeExtensionDetail = $this->ProjectwiseTimeExtensionDetails->get($id, [
            'contain' => ['ProjectWorks', 'ProjectWorkSubdetails'],
        ]);
        // $projectwiseTimeExtensionDetail  = $this->ProjectwiseTimeExtensionDetails->find('all')->where(['ProjectwiseTimeExtensionDetails.id' => $id,'ProjectwiseTimeExtensionDetails.project_work_id' => $pid, 'ProjectwiseTimeExtensionDetails.project_work_subdetail_id' => $work_id])->toArray();

        $this->set(compact('projectwiseTimeExtensionDetail'));
    }


    public function add($pid = null, $work_id = null)  
    {
        $this->viewBuilder()->setLayout('layout');
        $user = $this->request->getAttribute('identity');
		$this->loadModel('Roles');
        $projectwiseTimeExtensionDetailcount = $this->ProjectwiseTimeExtensionDetails->find('all')->where(['ProjectwiseTimeExtensionDetails.project_work_id' => $pid, 'ProjectwiseTimeExtensionDetails.project_work_subdetail_id' => $work_id])->count();
        $projectwiseTimeExtensionDetailists  = $this->ProjectwiseTimeExtensionDetails->find('all')->where(['ProjectwiseTimeExtensionDetails.project_work_id' => $pid, 'ProjectwiseTimeExtensionDetails.project_work_subdetail_id' => $work_id])->toArray();

        //echo "<pre>";  print_r($projectwiseTimeExtensionDetailists);  exit();    
		$projectwiseTimeExtensionDetail = $this->ProjectwiseTimeExtensionDetails->newEmptyEntity();
        if ($this->request->is('post')) { //echo "<pre>";  print_r($this->request->getData());  exit();  
            // echo "<pre>";
            // print_r($_POST);
            // exit();
            if ($this->request->getData('any_notice_issued_by_contractor') == 1) {
                $attachment  =  $this->request->getData('notice_file_upload');
                if ($attachment->getClientFilename() != '') {
                    $name    = $attachment->getClientFilename();
                    $type    = $attachment->getClientMediaType();
                    $size    = $attachment->getSize();
                    $tmpName = $attachment->getStream()->getMetadata('uri');
                    $error   = $attachment->getError();

                    if ($name != '' && $error == 0) {

                        $file                                      = $name;
                        $array                                     = explode('.', $file);
                        $fileExt                                   = $array[count($array) - 1];
                        $current_time                              = date('Y_m_d_H_i_s');
                        $newfile                                   = "notice_file_upload_" . $current_time . "." . $fileExt;
                        $tempFile                                  = $tmpName;
                        $targetPath                                = 'uploads/ProjectwiseTimeExtension/';
                        $targetFile                                = $targetPath . $newfile;
                        $projectwiseTimeExtensionDetail->notice_file_upload        =   $newfile;

                        move_uploaded_file($tempFile, $targetFile);
                    }
                }
            }
            $projectwiseTimeExtensionDetail->project_work_id                 =  $pid;
            $projectwiseTimeExtensionDetail->project_work_subdetail_id       = $work_id;
            $projectwiseTimeExtensionDetail->extension_date_of_ee            =  date('Y-m-d', strtotime($this->request->getData('extension_date_of_ee')));
            $projectwiseTimeExtensionDetail->delay_part_of_contractor        =  $this->request->getData('delay_part_of_contractor');
            $projectwiseTimeExtensionDetail->delay_due_to_department         =  $this->request->getData('delay_due_to_department');
            $projectwiseTimeExtensionDetail->delay_for_revision_plan         =  $this->request->getData('delay_for_revision_plan');
            $projectwiseTimeExtensionDetail->delay_due_to_rain               =  $this->request->getData('delay_due_to_rain');
            $projectwiseTimeExtensionDetail->delay_due_to_shortage_sand      =  $this->request->getData('delay_due_to_shortage_sand');
            $projectwiseTimeExtensionDetail->any_notice_issued_by_contractor =  $this->request->getData('any_notice_issued_by_contractor');
            $projectwiseTimeExtensionDetail->any_fine_imposed_for_delay      =  $this->request->getData('any_fine_imposed_for_delay');
            $projectwiseTimeExtensionDetail->contractor_quality_of_work 	 =  $this->request->getData('contractor_quality_of_work');
            $projectwiseTimeExtensionDetail->remarks_of_ee              	 =  $this->request->getData('remarks_of_ee');
            if($projectwiseTimeExtensionDetailcount == 0){
   		    $projectwiseTimeExtensionDetail->approval_role              	 =  5;
		    }else if($projectwiseTimeExtensionDetailcount == 1){
            $projectwiseTimeExtensionDetail->approval_role              	 =  6;
		    }else if($projectwiseTimeExtensionDetailcount >= 2){
            $projectwiseTimeExtensionDetail->approval_role              	 =  17;
		    } 
			 
			$projectwiseTimeExtensionDetail->created_by                   	 =  $user->id;
            $projectwiseTimeExtensionDetail->created_date            		 =  date('Y-m-d:h:m:s');
			//echo "<pre>";  print_r($projectwiseTimeExtensionDetail);  exit();  
			if ($this->ProjectwiseTimeExtensionDetails->save($projectwiseTimeExtensionDetail)) {
			 $insert_id = $projectwiseTimeExtensionDetail->id;	
				
				$ProjectsubWorksTable            = $this->getTableLocator()->get('ProjectWorkSubdetails');
				$projectsub                      = $ProjectsubWorksTable->get($work_id); 
				   $projectsub->projectwise_time_extension_detail_id     = $insert_id;  

				if($projectwiseTimeExtensionDetailcount == 0){
					$projectsub->eot_count           = 1;  
					$projectsub->eot_approval_role   = 5;
				}else if($projectwiseTimeExtensionDetailcount == 1){
					$projectsub->eot_count           = 2;
					$projectsub->eot_approval_role   = 6;
				}else if($projectwiseTimeExtensionDetailcount >= 2){
					$projectsub->eot_count           = ($projectwiseTimeExtensionDetailcount+1);
					$projectsub->eot_approval_role   = 17;
				} 
				
				$ProjectsubWorksTable->save($projectsub);		
             
                $this->Flash->success(__('The projectwise time extension detail has been saved.'));

                return $this->redirect(['action' => 'add/'.$pid.'/'.$work_id]);
            }
            $this->Flash->error(__('The projectwise time extension detail could not be saved. Please, try again.'));
        }
        $NoticeIssue = [1 => 'Yes', 0 => 'No'];
		$curr_role   = $this->Roles->find('list')->toArray();		

        $this->set(compact(
            'projectwiseTimeExtensionDetail',
            'NoticeIssue',
            'pid',
            'work_id',
            'projectwiseTimeExtensionDetailcount',
            'projectwiseTimeExtensionDetailists','curr_role'
        ));
    }
	
	
    public function approval($pid = null, $work_id = null,$id = null)
    {
        $this->viewBuilder()->setLayout('layout');
		$this->loadModel('ProjectWorkSubdetails');

        $user = $this->request->getAttribute('identity'); 
		
        $role_id     = $user->role_id;
		$division_id = $user->division_id;
		$circle_id   = $user->circle_id;			
		//$projectwiseTimeExtensionDetailcount = $this->ProjectwiseTimeExtensionDetails->find('all')->where(['ProjectwiseTimeExtensionDetails.project_work_id' => $pid, 'ProjectwiseTimeExtensionDetails.project_work_subdetail_id' => $work_id])->count();
		$projectwiseTimeExtensionDetail = $this->ProjectwiseTimeExtensionDetails->find('all')->where(['ProjectwiseTimeExtensionDetails.project_work_id' => $pid, 'ProjectwiseTimeExtensionDetails.project_work_subdetail_id' => $work_id,'ProjectwiseTimeExtensionDetails.id'=>$id])->first();
       // $projectwiseTimeExtensionDetail  = $this->ProjectwiseTimeExtensionDetails->find('all')->where(['ProjectwiseTimeExtensionDetails.id' => $id])->first();
         // $projectwiseTimeExtensionDetail = $this->ProjectwiseTimeExtensionDetails->get($id, [
            // 'contain' => ['ProjectWorks', 'ProjectWorkSubdetails'],
        // ]);
        if ($this->request->is('post')) { //echo "<pre>";  print_r($this->request->getData());  exit();  
			$approved = $this->request->getData('is_approved');			
			$ProjectsubWorksTable         = $this->getTableLocator()->get('ProjectwiseTimeExtensionDetails');
			$projectsub                   = $ProjectsubWorksTable->get($id); 
			$projectsub->is_approved      = $approved;
			if($approved == 1){
			$projectsub->approved_date    = date('Y-m-d');
			}
			$projectsub->approval_remarks = $this->request->getData('remarks');
			$ProjectsubWorksTable->save($projectsub);	
			
			
			  $ProjectsubWorksTable1             = $this->getTableLocator()->get('ProjectWorkSubdetails');
			  $projectsub1                       = $ProjectsubWorksTable1->get($work_id); 
			  $projectsub1->projectwise_time_extension_detail_id     = null;  
			  $projectsub1->eot_approval_role   = null;
			
			$ProjectsubWorksTable1->save($projectsub1);
		
			return $this->redirect(['controller'=>'ProjectWorks','action' => 'projectlist/14']);
				

        }
		
        $approval = [1 => 'Approved'];
       // $approval = [1 => 'Approved', 2 => 'Rejected'];
        $this->set(compact('projectwiseTimeExtensionDetail','approval','pid','work_id','projectwiseTimeExtensionDetailcount','projectwiseTimeExtensionDetailists'));
    }

    public function edit($pid = null, $work_id = null, $id = null)
    {
        $this->viewBuilder()->setLayout('layout');
        $user = $this->request->getAttribute('identity');

        $projectwiseTimeExtensionDetail = $this->ProjectwiseTimeExtensionDetails->get($id, [
            'contain' => [],
        ]);
        // echo"<pre>";print_r($projectwiseTimeExtensionDetail);exit();
        if ($this->request->is(['patch', 'post', 'put'])) {
        //   echo"<pre>";print_r($_POST);exit();
            if ($this->request->getData('any_notice_issued_by_contractor') == 1) {

                $attachment  =  $this->request->getData('notice_file_upload');

                if ($attachment->getClientFilename() != '') {
                    $name    = $attachment->getClientFilename();
                    $type    = $attachment->getClientMediaType();
                    $size    = $attachment->getSize();
                    $tmpName = $attachment->getStream()->getMetadata('uri');
                    $error   = $attachment->getError();

                    if ($name != '' && $error == 0) {

                        $file                                      = $name;
                        $array                                     = explode('.', $file);
                        $fileExt                                   = $array[count($array) - 1];
                        $current_time                              = date('Y_m_d_H_i_s');
                        $newfile                                   = "notice_file_upload_" . $current_time . "." . $fileExt;
                        $tempFile                                  = $tmpName;
                        $targetPath                                = 'uploads/ProjectwiseTimeExtension/';
                        $targetFile                                = $targetPath . $newfile;
                        $projectwiseTimeExtensionDetail->notice_file_upload        =   $newfile;

                        move_uploaded_file($tempFile, $targetFile);
                    }
                }else {
                    $projectwiseTimeExtensionDetail->notice_file_upload              =  $this->request->getData('notice_file_upload1');
                }
                
            }
            $projectwiseTimeExtensionDetail->project_work_id                 =  $pid;
            $projectwiseTimeExtensionDetail->project_work_subdetail_id       = $work_id;
            $projectwiseTimeExtensionDetail->extension_date_of_ee            =  date('Y-m-d', strtotime($this->request->getData('extension_date_of_ee1')));
            $projectwiseTimeExtensionDetail->delay_part_of_contractor        =  $this->request->getData('delay_part_of_contractor');
            $projectwiseTimeExtensionDetail->delay_due_to_department         =  $this->request->getData('delay_due_to_department');
            $projectwiseTimeExtensionDetail->delay_for_revision_plan         =  $this->request->getData('delay_for_revision_plan');
            $projectwiseTimeExtensionDetail->delay_due_to_rain               =  $this->request->getData('delay_due_to_rain');
            $projectwiseTimeExtensionDetail->delay_due_to_shortage_sand      =  $this->request->getData('delay_due_to_shortage_sand');
            $projectwiseTimeExtensionDetail->any_notice_issued_by_contractor =  $this->request->getData('any_notice_issued_by_contractor');
            $projectwiseTimeExtensionDetail->any_fine_imposed_for_delay =  $this->request->getData('any_fine_imposed_for_delay');
            $projectwiseTimeExtensionDetail->contractor_quality_of_work =  $this->request->getData('contractor_quality_of_work');
            $projectwiseTimeExtensionDetail->remarks_of_ee              =  $this->request->getData('remarks_of_ee');
            $projectwiseTimeExtensionDetail->modified_by              =  $user->id;
            $projectwiseTimeExtensionDetail->modified_date            =  date('Y-m-d:h:m:s');
                    // echo"<pre>";print_r($projectwiseTimeExtensionDetail);exit();

            // $projectwiseTimeExtensionDetail = $this->ProjectwiseTimeExtensionDetails->patchEntity($projectwiseTimeExtensionDetail, $this->request->getData());
            if ($this->ProjectwiseTimeExtensionDetails->save($projectwiseTimeExtensionDetail)) {
				   $this->Flash->success(__('The projectwise time extension detail has been saved.'));
                return $this->redirect(['action' => 'add/'.$pid.'/'.$work_id]);

                // return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The projectwise time extension detail could not be saved. Please, try again.'));
        }
        $NoticeIssue = [1 => 'Yes', 0 => 'No'];

        $this->set(compact('projectwiseTimeExtensionDetail','NoticeIssue','pid','work_id'));
    }


    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $projectwiseTimeExtensionDetail = $this->ProjectwiseTimeExtensionDetails->get($id);
        if ($this->ProjectwiseTimeExtensionDetails->delete($projectwiseTimeExtensionDetail)) {
            $this->Flash->success(__('The projectwise time extension detail has been deleted.'));
        } else {
            $this->Flash->error(__('The projectwise time extension detail could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
