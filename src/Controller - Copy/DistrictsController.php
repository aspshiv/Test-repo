<?php

declare(strict_types=1);

namespace App\Controller;


class DistrictsController extends AppController
{
    public function index()
    {
        $this->viewBuilder()->setLayout('layout');
        //$districts = $this->Districts->find('all')->where(['Districts.is_active' => 1]);
        $districts = $this->Districts->find('all')->contain(['Divisions'])->toArray();
        $this->set(compact('districts'));
    }

    public function view($id = null)
    {
        $this->viewBuilder()->setLayout('layout');
        $district = $this->Districts->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('district'));
    }


    public function add()
    // {
    //     $this->viewBuilder()->setLayout('layout');
    //     $user = $this->request->getAttribute('identity');
    //     $district = $this->Districts->newEmptyEntity();
    //     if ($this->request->is('post')) {
    //         $district                       = $this->Districts->patchEntity($district, $this->request->getData());
    //         $name                           = $this->request->getData('name');
    //         $district->created_date         = date('Y-m-d H:i:s');
    //         $district->created_by           = $user->id;
    //         $district->name                 = $name;
    //         $name_role = $this->Districts->find('all')->where(['Districts.name' => $name])->count();
            
    //         // print_r($dist);
    //         // exit();
    //         if ($name_role > 0) {
    //             $this->Flash->error(__('Name is already exits'));
    //             // return $this->redirect(['action' => 'index']);
    //         } else {
    //             if ($this->Districts->save($district)) {
    //                 $this->Flash->success(__('The district has been saved.'));

    //                 return $this->redirect(['action' => 'index']);
    //             }
    //             $this->Flash->error(__('The district could not be saved. Please, try again.'));
    //         }
    //     }
        
    //     $dist = $this->Districts->Divisions->find('list', ['limit' => 200])->all();
    //     $this->set(compact('district','dist'));
    // }
    {
        $this->viewBuilder()->setLayout('layout');
        $user = $this->request->getAttribute('identity');
        
        $district = $this->Districts->newEmptyEntity();
        if ($this->request->is('post')) {
            //  echo"<pre>";  
            //  print_r($_POST);
            //  exit();
            // $projectWork = $this->ProjectWorks->patchEntity($projectWork, $this->request->getData());

            
            // $id=1;
            // $projectcount = $this->ProjectWorks->find('ProjectWorks')->where(['ProjectWorks.id'=>$id])->count();
            // echo"<pre>"; print_r($projectcount);exit();
            // if ($projectcount > 0) {
            //     $entry = $projectcount + 1;
            // } else {
            //     $entry = 1;
            // }
            // $projectWork->project_code         =  $entry;

            // $appliaction_no = 'CNRA' . sprintf('%04d', $entry);
            $district->name       =  $this->request->getData('name');
            $district->division_id       =  $this->request->getData('division_id');
          
            $district->created_by          =  $user->id;
            $district->created_date        =  date('Y-m-d H:i:s');
           
            //  echo"<pre>";   print_r($projectWork);
            //                 exit();

         
            if ($this->Districts->save($district)) {
           
                $this->Flash->success(__('The project work has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The project work could not be saved. Please, try again.'));
        }
       
   
        $dist    = $this->Districts->Divisions->find('list', ['keyField' => 'id', 'valueField' => 'name'])->all();
        // print_r($district);
        // exit();
   
        $this->set(compact('district','dist'));
    }

    public function edit($id = null)
    {
        $this->viewBuilder()->setLayout('layout');
        $id = base64_decode($id);
        $user = $this->request->getAttribute('identity');
        $district = $this->Districts->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $district = $this->Districts->patchEntity($district, $this->request->getData());
            $name                           = $this->request->getData('name');
            $district->modified_date	    = date('Y-m-d H:i:s');
            $district->modified_by          = $user->id;
            $district->name                 = $name;
            $name_role = $this->Districts->find('all')->where(['Districts.name' => $name,'Districts.name !=' => $name])->count();
            if ($name_role > 0) {
                $this->Flash->error(__('Name is already exits'));
                // return $this->redirect(['action' => 'index']);
            }else{
                if ($this->Districts->save($district)) {
                    $this->Flash->success(__('The district has been saved.'));
    
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The district could not be saved. Please, try again.'));
            }
            
        }
        $dist    = $this->Districts->Divisions->find('list', ['keyField' => 'id', 'valueField' => 'name'])->all();
        $this->set(compact('district','dist'));
    }


    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $id = base64_decode($id);
        $district = $this->Districts->get($id);
        $district->is_active =0;
        if ($this->Districts->delete($district)) {
            $this->Flash->success(__('The district has been deleted.'));
        } else {
            $this->Flash->error(__('The district could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
