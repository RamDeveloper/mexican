<?php
/*
 * @created : Ramkumar S  
 * @created on : September,2018 
 */
?>
<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Routing\Router;
use Cake\Auth\DefaultPasswordHasher;

/**
 * Brand Controller
 *
 * @property \App\Model\Table\BrandTable $Brand
 *
 * @method \App\Model\Entity\Brand[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BrandController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Speciality']
        ];
        $brand = $this->paginate($this->Brand);

        $this->set(compact('brand'));
    }

    /**
     * View method
     *
     * @param string|null $id Brand id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $brand = $this->Brand->get($id, [
            'contain' => ['Users', 'Speciality']
        ]);

        $this->set('brand', $brand);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $brand = $this->Brand->newEntity();
        
        if ($this->request->is('post')) {
            $requestData = $this->request->getData();
            $get_brandid = $this->Brand->find('all')->select('id')->order(['Brand.id' => 'desc'])->first();
            $brandid = ($get_brandid->id) + 1;
            if (empty($requestData['image']['name'])) {
                $this->Flash->errorerror(__('Please upload valid image and try again!'));
                return $this->redirect(['action' => 'index']);
            } else if (!empty($requestData['image']['name'])) {
                $imageCheck = $this->ImageUpload->checkImage($requestData['image']);
                if (!empty($imageCheck['error'])) {
                    $this->Flash->error(__($imageCheck['error']));
                    return $this->redirect(['action' => 'index']);
                } else {
                    $output = $this->ImageUpload->upload_image_and_thumbnail($requestData['image'], ADMINISTRATOR, $brandid);
                }
            }
            $requestData['image_url'] = !empty($output['imageURL']) ? $output['imageURL'] : $this->request->getAttribute("webroot") . EMPTYIMAGE;
            $requestData['users_id'] = 1; //For now
            $brand = $this->Brand->patchEntity($brand, $requestData);
            if ($this->Brand->save($brand)) {
                $this->Flash->success(__('The brand has been saved.'));

                return $this->redirect(['controller'=>'Speciality','action' => 'index']);
            }
            $this->Flash->error(__('The brand could not be saved. Please, try again.'));
        }
        $speciality = $this->Brand->Speciality->find('list', ['limit' => 200]);
        $this->set(compact('brand', 'speciality'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Brand id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $brand = $this->Brand->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $brand = $this->Brand->patchEntity($brand, $this->request->getData());
            if ($this->Brand->save($brand)) {
                $this->Flash->success(__('The brand has been saved.'));

                return $this->redirect(['controller'=>'Speciality','action' => 'index']);
            }
            $this->Flash->error(__('The brand could not be saved. Please, try again.'));
        }
        $users = $this->Brand->Users->find('list', ['limit' => 200]);
        $speciality = $this->Brand->Speciality->find('list', ['limit' => 200]);
        $this->set(compact('brand', 'users', 'speciality'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Brand id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $brand = $this->Brand->get($id);
        if ($this->Brand->delete($brand)) {
            $this->Flash->success(__('The brand has been deleted.'));
        } else {
            $this->Flash->error(__('The brand could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller'=>'Speciality','action' => 'index']);
    }
}
