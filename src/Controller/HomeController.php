<?php
namespace App\Controller;
use Cake\Event\Event;
use App\Controller\AppController;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Mailer\Email;
use Cake\Core\Configure;
use Cake\I18n\Time;

/**
 * Speciality Controller
 *
 * @property \App\Model\Table\SpecialityTable $Speciality
 *
 * @method \App\Model\Entity\Speciality[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class HomeController extends AppController
{

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->loadModel('Speciality');
        $this->loadModel('Users');
        $this->loadModel('Brand');
        $this->viewBuilder()->setLayout('frontend/default');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $speciality = $this->Speciality->find('list', ['keyField' => 'id', 'valueField' => 'name'])->where(['Speciality.is_active' => 1])->enableHydration(false)->toArray();
        $list_brands = $this->Brand->find('all')->where(['Brand.is_active'=>1,'Brand.speciality_id'=>1]);
        foreach ($list_brands as $key => $val) {
            // $brand[$key]['id'] = $val->id;
            $brand[$key]['value'] = $val->name;
        }
        $this->set(compact('speciality','brand'));
    }

    /**
     * View method
     *
     * @param string|null $id Speciality id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $speciality = $this->Speciality->get($id, [
            'contain' => ['Brand']
        ]);

        $this->set('speciality', $speciality);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $speciality = $this->Speciality->newEntity();
        if ($this->request->is('post')) {
            $speciality = $this->Speciality->patchEntity($speciality, $this->request->getData());
            if ($this->Speciality->save($speciality)) {
                $this->Flash->success(__('The speciality has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The speciality could not be saved. Please, try again.'));
        }
        $this->set(compact('speciality'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Speciality id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $speciality = $this->Speciality->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $speciality = $this->Speciality->patchEntity($speciality, $this->request->getData());
            if ($this->Speciality->save($speciality)) {
                $this->Flash->success(__('The speciality has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The speciality could not be saved. Please, try again.'));
        }
        $this->set(compact('speciality'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Speciality id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $speciality = $this->Speciality->get($id);
        if ($this->Speciality->delete($speciality)) {
            $this->Flash->success(__('The speciality has been deleted.'));
        } else {
            $this->Flash->error(__('The speciality could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function getBrand() {
        // Configure::write('debug', false);
        $this->render = false;
        $this->viewBuilder()->setLayout = false;
        $this->autoRender = false;
        $term = $this->request->getQuery('speciality');
        $list_brands = $this->Brand->find('all')->where(['Brand.speciality_id'=>$term]);
        $this->response->type('json');
        foreach ($list_brands as $key => $val) {
            $brand[$key]['id'] = $val->id;
            $brand[$key]['value'] = $val->name;
        }
        $this->response->body(json_encode($brand));
        return $this->response;
    }

}
