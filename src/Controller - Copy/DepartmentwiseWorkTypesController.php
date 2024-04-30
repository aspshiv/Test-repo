<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * DepartmentwiseWorkTypes Controller
 *
 * @property \App\Model\Table\DepartmentwiseWorkTypesTable $DepartmentwiseWorkTypes
 * @method \App\Model\Entity\DepartmentwiseWorkType[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DepartmentwiseWorkTypesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->viewBuilder()->setLayout('layout');
        $this->loadModel('Departments');
        $departmentwiseWorkTypes = $this->DepartmentwiseWorkTypes->find('all')->contain(['Departments'])->where(['DepartmentwiseWorkTypes.is_active' => 1]);
        $this->set(compact('departmentwiseWorkTypes'));
    }

    /**
     * View method
     *
     * @param string|null $id Departmentwise Work Type id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $departmentwiseWorkTypes = $this->DepartmentwiseWorkTypes->get($id, [
            'contain' => ['Departments'],
        ]);

        $this->set(compact('departmentwiseWorkTypes'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->setLayout('layout');
        $user = $this->request->getAttribute('identity');
        $this->loadModel('Departments');

        $departmentwiseWorkType = $this->DepartmentwiseWorkTypes->newEmptyEntity();
        if ($this->request->is('post')) {
            //  echo"<pre>";print_r($_POST);exit();
            $departmentwiseWorkType->department_id                =  $this->request->getData('department_id');
            $departmentwiseWorkType->name         =  $this->request->getData('name');
            $departmentwiseWorkType->created_by          =  $user->id;
            $departmentwiseWorkType->created_date        =  date('Y-m-d H:i:s');


            if ($this->DepartmentwiseWorkTypes->save($departmentwiseWorkType)) {

                $this->Flash->success(__('The DepartmentwiseWorkTypes has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The DepartmentwiseWorkTypes could not be saved. Please, try again.'));
        }

        $departments = $this->DepartmentwiseWorkTypes->Departments->find('list', ['limit' => 200])->all();
        $this->set(compact('departmentwiseWorkType', 'departments'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Departmentwise Work Type id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->setLayout('layout');
        $departmentwiseWorkType = $this->DepartmentwiseWorkTypes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $departmentwiseWorkType = $this->DepartmentwiseWorkTypes->patchEntity($departmentwiseWorkType, $this->request->getData());
            if ($this->DepartmentwiseWorkTypes->save($departmentwiseWorkType)) {
                $this->Flash->success(__('The departmentwise work type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The departmentwise work type could not be saved. Please, try again.'));
        }
        $departments = $this->DepartmentwiseWorkTypes->Departments->find('list', ['limit' => 200])->all();
        $this->set(compact('departmentwiseWorkType', 'departments'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Departmentwise Work Type id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $departmentwiseWorkType = $this->DepartmentwiseWorkTypes->get($id);
        if ($this->DepartmentwiseWorkTypes->delete($departmentwiseWorkType)) {
            $this->Flash->success(__('The departmentwise work type has been deleted.'));
        } else {
            $this->Flash->error(__('The departmentwise work type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
