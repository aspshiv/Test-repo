<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * BuildingItems Controller
 *
 * @property \App\Model\Table\BuildingItemsTable $BuildingItems
 * @method \App\Model\Entity\BuildingItem[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BuildingItemsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {

        $this->viewBuilder()->setLayout('layout');
        $buildingItems = $this->BuildingItems->find('all')->where(['BuildingItems.is_active' => 1])->order(['BuildingItems.item_code ASC']);
        $this->set(compact('buildingItems'));
    }

    /**
     * View method
     *
     * @param string|null $id Building Item id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->setLayout('layout');
        $buildingItem = $this->BuildingItems->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('buildingItem'));
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

        $buildingItem = $this->BuildingItems->newEmptyEntity();
        if ($this->request->is('post')) {
            //  echo"<pre>";print_r($_POST);exit();
            $buildingItem->item_code                =  $this->request->getData('item_code');
            $buildingItem->item_description         =  $this->request->getData('item_description');
            $buildingItem->created_by          =  $user->id;
            $buildingItem->created_date        =  date('Y-m-d H:i:s');


            if ($this->BuildingItems->save($buildingItem)) {

                $this->Flash->success(__('The BuildingItems has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The BuildingItems could not be saved. Please, try again.'));
        }

        $this->set(compact('buildingItem'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Building Item id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)

    {
        $this->viewBuilder()->setLayout('layout');

        $user = $this->request->getAttribute('identity');
        $buildingItem = $this->BuildingItems->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $buildingItem = $this->BuildingItems->patchEntity($buildingItem, $this->request->getData());
            $item_code                           = $this->request->getData('item_code');
            $item_description                = $this->request->getData('item_description');
            $buildingItem->modified_date        = date('Y-m-d H:i:s');
            $buildingItem->modified_by          = $user->id;
            $buildingItem->item_code                 = $item_code;
            $item_code_role = $this->BuildingItems->find('all')->where(['BuildingItems.item_code' => $item_code, 'BuildingItems.item_code !=' => $item_code])->count();
            if ($item_code_role > 0) {
                $this->Flash->error(__('item code is already exits'));
                // return $this->redirect(['action' => 'index']);
            } else {
                if ($this->BuildingItems->save($buildingItem)) {
                    $this->Flash->success(__('The buildingItem has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The buildingItem could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('buildingItem'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Building Item id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $buildingItem = $this->BuildingItems->get($id);
        if ($this->BuildingItems->delete($buildingItem)) {
            $this->Flash->success(__('The building item has been deleted.'));
        } else {
            $this->Flash->error(__('The building item could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
