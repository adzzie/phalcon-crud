<?php
namespace Application\Controllers;

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;
use Application\Models\Kategori;

class KategoriController extends ControllerBase
{
    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for kategori
     */
    public function searchAction()
    {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, '\Application\Models\Kategori', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = [];
        }
        $parameters["order"] = "id";

        $kategori = Kategori::find($parameters);
        if (count($kategori) == 0) {
            $this->flash->notice("The search did not find any kategori");

            $this->dispatcher->forward([
                "controller" => "kategori",
                "action" => "index"
            ]);

            return;
        }

        $paginator = new Paginator([
            'data' => $kategori,
            'limit'=> 10,
            'page' => $numberPage
        ]);

        $this->view->page = $paginator->getPaginate();
    }

    /**
     * Displays the creation form
     */
    public function newAction()
    {

    }

    /**
     * Edits a kategori
     *
     * @param string $id
     */
    public function editAction($id)
    {
        if (!$this->request->isPost()) {

            $kategori = Kategori::findFirstByid($id);
            if (!$kategori) {
                $this->flash->error("kategori was not found");

                $this->dispatcher->forward([
                    'controller' => "kategori",
                    'action' => 'index'
                ]);

                return;
            }

            $this->view->id = $kategori->id;

            $this->tag->setDefault("id", $kategori->id);
            $this->tag->setDefault("nama", $kategori->nama);
//            $this->tag->setDefault("created_at", $kategori->created_at);
//            $this->tag->setDefault("modified_at", $kategori->modified_at);
//            $this->tag->setDefault("is_deleted", $kategori->is_deleted);
//            $this->tag->setDefault("deleted_at", $kategori->deleted_at);
            
        }
    }

    /**
     * Creates a new kategori
     */
    public function createAction()
    {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "kategori",
                'action' => 'index'
            ]);

            return;
        }

        $kategori = new Kategori();
        $kategori->id = $this->request->getPost("id");
        $kategori->nama = $this->request->getPost("nama");
//        $kategori->createdAt = $this->request->getPost("created_at");
//        $kategori->modifiedAt = $this->request->getPost("modified_at");
//        $kategori->isDeleted = $this->request->getPost("is_deleted");
//        $kategori->deletedAt = $this->request->getPost("deleted_at");
        

        if (!$kategori->save()) {
            foreach ($kategori->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "kategori",
                'action' => 'new'
            ]);

            return;
        }

        $this->flash->success("kategori was created successfully");

        $this->dispatcher->forward([
            'controller' => "kategori",
            'action' => 'index'
        ]);
    }

    /**
     * Saves a kategori edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "kategori",
                'action' => 'index'
            ]);

            return;
        }

        $id = $this->request->getPost("id");
        $kategori = Kategori::findFirstByid($id);

        if (!$kategori) {
            $this->flash->error("kategori does not exist " . $id);

            $this->dispatcher->forward([
                'controller' => "kategori",
                'action' => 'index'
            ]);

            return;
        }

        $kategori->id = $this->request->getPost("id");
        $kategori->nama = $this->request->getPost("nama");
//        $kategori->createdAt = $this->request->getPost("created_at");
//        $kategori->modifiedAt = $this->request->getPost("modified_at");
//        $kategori->isDeleted = $this->request->getPost("is_deleted");
//        $kategori->deletedAt = $this->request->getPost("deleted_at");
        

        if (!$kategori->save()) {

            foreach ($kategori->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "kategori",
                'action' => 'edit',
                'params' => [$kategori->id]
            ]);

            return;
        }

        $this->flash->success("kategori was updated successfully");

        $this->dispatcher->forward([
            'controller' => "kategori",
            'action' => 'index'
        ]);
    }

    /**
     * Deletes a kategori
     *
     * @param string $id
     */
    public function deleteAction($id)
    {
        $kategori = Kategori::findFirstByid($id);
        if (!$kategori) {
            $this->flash->error("kategori was not found");

            $this->dispatcher->forward([
                'controller' => "kategori",
                'action' => 'index'
            ]);

            return;
        }

        if (!$kategori->delete()) {

            foreach ($kategori->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "kategori",
                'action' => 'search'
            ]);

            return;
        }

        $this->flash->success("kategori was deleted successfully");

        $this->dispatcher->forward([
            'controller' => "kategori",
            'action' => "index"
        ]);
    }

}
