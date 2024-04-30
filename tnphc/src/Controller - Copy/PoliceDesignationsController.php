<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * PoliceDesignations Controller
 *
 * @property \App\Model\Table\PoliceDesignationsTable $PoliceDesignations
 * @method \App\Model\Entity\PoliceDesignation[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PoliceDesignationsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {

        $this->viewBuilder()->setLayout('layout');

        $policeDesignations = $this->PoliceDesignations->find('all')->where(['PoliceDesignations.is_active' => 1]);
        $this->set(compact('policeDesignations'));
    }

    /**
     * View method
     *
     * @param string|null $id Police Designation id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $policeDesignation = $this->PoliceDesignations->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('policeDesignation'));
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

        $policeDesignation = $this->PoliceDesignations->newEmptyEntity();
        if ($this->request->is('post')) {
            //  echo"<pre>";print_r($_POST);exit();
            $policeDesignation->name         =  $this->request->getData('name');
            $policeDesignation->created_by          =  $user->id;
            $policeDesignation->created_date        =  date('Y-m-d H:i:s');


            if ($this->PoliceDesignations->save($policeDesignation)) {

                $this->Flash->success(__('The PoliceDesignations has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The PoliceDesignations could not be saved. Please, try again.'));
        }

        $this->set(compact('policeDesignation'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Police Designation id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->setLayout('layout');
        $policeDesignation = $this->PoliceDesignations->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $policeDesignation = $this->PoliceDesignations->patchEntity($policeDesignation, $this->request->getData());
            if ($this->PoliceDesignations->save($policeDesignation)) {
                $this->Flash->success(__('The police designation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The police designation could not be saved. Please, try again.'));
        }
        $this->set(compact('policeDesignation'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Police Designation id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $policeDesignation = $this->PoliceDesignations->get($id);
        if ($this->PoliceDesignations->delete($policeDesignation)) {
            $this->Flash->success(__('The police designation has been deleted.'));
        } else {
            $this->Flash->error(__('The police designation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
