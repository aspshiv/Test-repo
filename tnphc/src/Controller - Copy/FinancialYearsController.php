<?php

declare(strict_types=1);

namespace App\Controller;

class FinancialYearsController extends AppController
{

    public function index()
    {
        $this->viewBuilder()->setLayout('layout');
        $financialYears = $this->FinancialYears->find('all')->where(['FinancialYears.is_active' => 1]);
        $this->set(compact('financialYears'));
    }

    public function view($id = null)
    {
        $this->viewBuilder()->setLayout('layout');
        $financialYear = $this->FinancialYears->get($id, [
            'contain' => [],
        ]);
        $this->set(compact('financialYear'));
    }


    public function add()
    {
        $this->viewBuilder()->setLayout('layout');
        $user = $this->request->getAttribute('identity');
        $financialYear = $this->FinancialYears->newEmptyEntity();
        if ($this->request->is('post')) {
            $financialYear                       = $this->FinancialYears->patchEntity($financialYear, $this->request->getData());
            $name                                = $this->request->getData('name');
            $financialYear->created_date         = date('Y-m-d H:i:s');
            $financialYear->created_by           = $user->id;
            $financialYear->name                 = $name;
            $year = $this->Roles->find('all')->where(['FinancialYears.name' => $name])->count();
            if ($year > 0) {
                $this->Flash->error(__('financial year is already exits'));
                // return $this->redirect(['action' => 'index']);
            } else {
                if ($this->FinancialYears->save($financialYear)) {
                    $this->Flash->success(__('The financial year has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The financial year could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('financialYear'));
    }


    public function edit($id = null)
    {
        $this->viewBuilder()->setLayout('layout');
        $user = $this->request->getAttribute('identity');
        $financialYear = $this->FinancialYears->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $financialYear = $this->FinancialYears->patchEntity($financialYear, $this->request->getData());
            $id                                   =  $id;
            $name                                 = $this->request->getData('name');
            $financialYear->modified_date         = date('Y-m-d H:i:s');
            $financialYear->modified_by           = $user->id;
            $financialYear->name                  = $name;
            $year = $this->Roles->find('all')->where(['FinancialYears.name' => $name, 'FinancialYears.id !=' => $id])->count();
            if ($year > 0) {
                $this->Flash->error(__('Name is already exits'));
                // return $this->redirect(['action' => 'index']);
            }else{
                if ($this->FinancialYears->save($financialYear)) {
                $this->Flash->success(__('The financial year has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The financial year could not be saved. Please, try again.'));
        }
            
        }
        $this->set(compact('financialYear'));
    }



    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $financialYear             = $this->FinancialYears->get($id);
        $financialYear->is_active  = 0;
        if ($this->FinancialYears->save($financialYear)) {
            $this->Flash->success(__('The FinancialYears has been deleted.'));
        } else {
            $this->Flash->error(__('The FinancialYears could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
