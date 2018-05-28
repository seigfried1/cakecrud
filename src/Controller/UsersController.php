<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function showMe(){//redundant function
        $this->set('name', $this->Users->find('all'));
    }
    public function getData(){
        $allData = $this->Users->find('all');
        $this->set('allData', $allData);  
    }
    public function profile($userId){
        $oneData = $this->Users->find('all')->Where(['id'=>$userId])->toArray();
        $this->set('oneData', $oneData); 
    }
    public function updateData($userId=null){
        $oneData2 = $this->Users->get($userId, ['contain'=>[]]);
        if($this->request->is(['post','patch','put'])){
            $oneData = $this->Users->patchEntity($oneData2, $this->request->getData());
            if($this->Users->save($oneData)){
                $this->Flash->success(__('Post Updated Successfully'));
                return $this->redirect(['action'=>'getData']);
            }
            else{
                $this->Flash->error(__('The record cannot be updated. Please try again'));
            }
        }
    }
    public function del($userId=null){
        $user = $this->Users->get($userId);
        $this->Users->delete($user);
        $this->Flash->success('Record deleted successfully');
        $this->redirect(['action'=>'getData']);
    }
    public function registration(){
        $user = $this->Users->newEntity();
        if($this->request->is('post')){
            //print_r($this->request->data);exit;
            $this->Users->patchEntity($user, $this->request->data); //patch this data in the newly created entity.
            if($this->Users->save($user)){
                $this->Flash->success('Data Saved');
                $this->redirect(['action'=>'getData']);
            }
            else{
                $this->Flash->error('Database error');
            }
        }
    }
    
}
