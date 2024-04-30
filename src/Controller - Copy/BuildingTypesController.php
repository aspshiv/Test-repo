<?php
declare(strict_types=1);

namespace App\Controller;


class BuildingTypesController extends AppController
{
   
    public function index()
    
    {
        $this->viewBuilder()->setLayout('layout');
        $buildingType = $this->paginate($this->BuildingType);

        $this->set(compact('buildingType'));
    }

  
    public function view($id = null)
    {
        $buildingType = $this->BuildingType->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('buildingType'));
    }

   
    public function add()
    {
        $this->viewBuilder()->setLayout('layout');
        $user = $this->request->getAttribute('identity');
        // print_r($user);exit();
        $buildingType = $this->BuildingTypes->newEmptyEntity();
        if ($this->request->is('post')) {
        
            $buildingType = $this->BuildingTypes->patchEntity($buildingType, $this->request->getData());
            $name                       = $this->request->getData('name');
            $buildingType->created_date         = date('Y-m-d H:i:s');
            $buildingType->created_by           = $user->id;
            $buildingType->name                 = $name;
            // print_r($role);exit();
            $name_dist = $this->BuildingTypes->find('all')->where(['BuildingTypes.name' => $name])->count();
            // $div = $this->BuildingType->find('all')->where(['BuildingType.name' => $name])->count();
            //  print_r($name_role);exit();
            if ($name_dist > 0) {
                $this->Flash->error(__('Name is already exits'));
                // return $this->redirect(['action' => 'index']);
            } else {
                if ($this->BuildingTypes->save($buildingType)) {
                    $this->Flash->success(__('The buildingType has been saved.'));
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The buildingType could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('buildingType'));
    }

  
    public function edit($id = null)
    {
        $this->viewBuilder()->setLayout('layout');
        $user = $this->request->getAttribute('identity');
        $buildingType = $this->BuildingTypes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $buildingType = $this->BuildingTypes->patchEntity($buildingType, $this->request->getData());
            // $article = $articles->get($id);
            $id =  $id;
            $name                        = $this->request->getData('name');
            $buildingType->modified_date         = date('Y-m-d H:i:s');
            $buildingType->modified_by           = $user->id;
            $buildingType->name                  = $name;
            // $buildingType = $this->request->getAttribute('identity');
            // print_r($id);exit();
            $name_buildingType = $this->BuildingTypes->find('all')->where(['BuildingTypes.name' => $name, 'BuildingTypes.id !=' => $id])->count();
            // print_r($name_buildingType);exit();
            if ($name_buildingType > 0) {
                $this->Flash->error(__('Name is already exits'));
                // return $this->redirect(['action' => 'index']);
            } else {
                if ($this->BuildingTypes->save($buildingType)) {
                    $this->Flash->success(__('The buildingType has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The buildingType could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('buildingType'));
    }

  
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $buildingType = $this->BuildingType->get($id);
        $buildingType->is_active  = 0;
        if ($this->BuildingType->save($buildingType)) {
            $this->Flash->success(__('The buildingType has been deleted.'));
        } else {
            $this->Flash->error(__('The buildingType could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
