<?php

declare(strict_types=1);

namespace App\Controller;


class ProjectwiseDevelopmentWorksController extends AppController
{

    public function index()
    {
        $this->viewBuilder()->setLayout('layout');
        $this->paginate = [
            'contain' => ['ProjectWorks', 'ProjectWorkSubdetails'],
        ];
        $projectwiseDevelopmentWorks = $this->paginate($this->ProjectwiseDevelopmentWorks);

        $this->set(compact('projectwiseDevelopmentWorks'));
    }


    public function view($pid = null ,$work_id = null,$id = null)
    {
        $this->viewBuilder()->setLayout('layout');
        $projectwiseDevelopmentWork = $this->ProjectwiseDevelopmentWorks->get($id, [
            'contain' => ['ProjectWorks', 'ProjectWorkSubdetails'],
        ]);

        $this->set(compact('projectwiseDevelopmentWork'));
    }


    public function add($pid,$work_id)
    {
        $this->viewBuilder()->setLayout('layout');
        $user = $this->request->getAttribute('identity');
        $ProjectwiseDevelopmentWorkscount = $this->ProjectwiseDevelopmentWorks->find('all')->where(['ProjectwiseDevelopmentWorks.project_work_id'=>$pid,'ProjectwiseDevelopmentWorks.project_work_subdetail_id'=>$work_id])->count();
		$ProjectwiseDevelopmentWorkslists = $this->ProjectwiseDevelopmentWorks->find('all')->where(['ProjectwiseDevelopmentWorks.project_work_id'=>$pid,'ProjectwiseDevelopmentWorks.project_work_subdetail_id'=>$work_id])->toArray();
// echo"<pre>";print_r( $ProjectwiseDevelopmentWorkscount);exit();
        $projectwiseDevelopmentWork = $this->ProjectwiseDevelopmentWorks->newEmptyEntity();
        if ($this->request->is('post')) {
// echo"<pre>";print_r($_POST);exit();

            $attachment  =  $this->request->getData('file_upload');

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
                    $newfile                                   = "file_upload_" . $current_time . "." . $fileExt;
                    $tempFile                                  = $tmpName;
                    $targetPath                                = 'uploads/ProjectwiseDevelopmentWork/';
                    $targetFile                                = $targetPath . $newfile;
                    $projectwiseDevelopmentWork->file_upload   =   $newfile;

                    move_uploaded_file($tempFile, $targetFile);
                }
            }
            $projectwiseDevelopmentWork->project_work_id              =  $pid;
            $projectwiseDevelopmentWork->project_work_subdetail_id    =  $work_id;
            $projectwiseDevelopmentWork->work_name                    =  $this->request->getData('work_name');
            $projectwiseDevelopmentWork->work_description             =  $this->request->getData('work_description');
            $projectwiseDevelopmentWork->estimated_cost               =  $this->request->getData('estimated_cost');
            $projectwiseDevelopmentWork->created_by                   =  $user->id;
            $projectwiseDevelopmentWork->created_date                 =  date('Y-m-d:h:m:s');

            if ($this->ProjectwiseDevelopmentWorks->save($projectwiseDevelopmentWork)) {
                $this->Flash->success(__('The projectwise development work has been saved.'));
                return $this->redirect(['action' => 'add/'.$pid.'/'.$work_id]);
                // return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The projectwise development work could not be saved. Please, try again.'));
        }
        $this->set(compact('projectwiseDevelopmentWork','ProjectwiseDevelopmentWorkscount','ProjectwiseDevelopmentWorkslists','pid','work_id'));
    }


    public function edit($pid = null ,$work_id = null,$id = null)
    {
        $this->viewBuilder()->setLayout('layout');
        $user = $this->request->getAttribute('identity');
        $projectwiseDevelopmentWork = $this->ProjectwiseDevelopmentWorks->get($id, [
            'contain' => [],
        ]);
        // echo"<pre>";print_r($projectwiseDevelopmentWork);exit();

        if ($this->request->is(['patch', 'post', 'put'])) {
            // echo"<pre>";print_r($_POST);exit();

            // $projectwiseDevelopmentWork = $this->ProjectwiseDevelopmentWorks->patchEntity($projectwiseDevelopmentWork, $this->request->getData());

            $attachment  =  $this->request->getData('file_upload');

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
                    $newfile                                   = "file_upload_" . $current_time . "." . $fileExt;
                    $tempFile                                  = $tmpName;
                    $targetPath                                = 'uploads/ProjectwiseDevelopmentWork/';
                    $targetFile                                = $targetPath . $newfile;
                    $projectwiseDevelopmentWork->file_upload   =   $newfile;

                    move_uploaded_file($tempFile, $targetFile);
                }
            }else{
                $projectwiseDevelopmentWork->file_upload        = $this->request->getData('file_upload1');
            }

            $projectwiseDevelopmentWork->project_work_id             =  $pid;
            $projectwiseDevelopmentWork->project_work_subdetail_id   =  $work_id;
            $projectwiseDevelopmentWork->work_name                   =  $this->request->getData('work_name');
            $projectwiseDevelopmentWork->work_description            =  $this->request->getData('work_description');
            $projectwiseDevelopmentWork->estimated_cost              =  $this->request->getData('estimated_cost');
            $projectwiseDevelopmentWork->modified_by                 =  $user->id;
            $projectwiseDevelopmentWork->modified_date               =  date('Y-m-d:h:m:s');
        // echo"<pre>";print_r($projectwiseDevelopmentWork);exit();

            if ($this->ProjectwiseDevelopmentWorks->save($projectwiseDevelopmentWork)) {

                $this->Flash->success(__('The projectwise development work has been saved.'));

                return $this->redirect(['action' => 'add/'.$pid.'/'.$work_id]);
            }
            $this->Flash->error(__('The projectwise development work could not be saved. Please, try again.'));
        }
        $this->set(compact('projectwiseDevelopmentWork'));
    }


    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $projectwiseDevelopmentWork = $this->ProjectwiseDevelopmentWorks->get($id);
        if ($this->ProjectwiseDevelopmentWorks->delete($projectwiseDevelopmentWork)) {
            $this->Flash->success(__('The projectwise development work has been deleted.'));
        } else {
            $this->Flash->error(__('The projectwise development work could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
