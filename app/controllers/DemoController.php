<?php
declare(strict_types=1);

 

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model;


class DemoController extends ControllerBase
{
    /**
     * Index action
     */
    public function indexAction()
    {
        //
    }

    /**
     * Searches for demo
     */
    public function searchAction()
    {
        $numberPage = $this->request->getQuery('page', 'int', 1);
        $parameters = Criteria::fromInput($this->di, 'Demo', $_GET)->getParams();
        $parameters['order'] = "id";

        $paginator   = new Model(
            [
                'model'      => 'Demo',
                'parameters' => $parameters,
                'limit'      => 10,
                'page'       => $numberPage,
            ]
        );

        $paginate = $paginator->paginate();

        if (0 === $paginate->getTotalItems()) {
            $this->flash->notice("The search did not find any demo");

            $this->dispatcher->forward([
                "controller" => "demo",
                "action" => "index"
            ]);

            return;
        }

        $this->view->page = $paginate;
    }

    /**
     * Displays the creation form
     */
    public function newAction()
    {
        //
    }

    /**
     * Edits a demo
     *
     * @param string $id
     */
    public function editAction($id)
    {
        if (!$this->request->isPost()) {
            $demo = Demo::findFirstByid($id);
            if (!$demo) {
                $this->flash->error("demo was not found");

                $this->dispatcher->forward([
                    'controller' => "demo",
                    'action' => 'index'
                ]);

                return;
            }

            $this->view->id = $demo->id;

            $this->tag->setDefault("id", $demo->id);
            $this->tag->setDefault("nombre", $demo->nombre);
            $this->tag->setDefault("apellido", $demo->apellido);
            $this->tag->setDefault("cel", $demo->cel);
            
        }
    }

    /**
     * Creates a new demo
     */
    public function createAction()
    {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "demo",
                'action' => 'index'
            ]);

            return;
        }

        $demo = new Demo();
        $demo->nombre = $this->request->getPost("nombre", "varchar");
        $demo->apellido = $this->request->getPost("apellido", "varchar");
        $demo->cel = $this->request->getPost("cel", "varchar");
        

        if (!$demo->save()) {
            foreach ($demo->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "demo",
                'action' => 'new'
            ]);

            return;
        }

        $this->flash->success("demo was created successfully");

        $this->dispatcher->forward([
            'controller' => "demo",
            'action' => 'index'
        ]);
    }

    /**
     * Saves a demo edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "demo",
                'action' => 'index'
            ]);

            return;
        }

        $id = $this->request->getPost("id");
        $demo = Demo::findFirstByid($id);

        if (!$demo) {
            $this->flash->error("demo does not exist " . $id);

            $this->dispatcher->forward([
                'controller' => "demo",
                'action' => 'index'
            ]);

            return;
        }

        $demo->nombre = $this->request->getPost("nombre", "varchar");
        $demo->apellido = $this->request->getPost("apellido", "varchar");
        $demo->cel = $this->request->getPost("cel", "varchar");
        

        if (!$demo->save()) {

            foreach ($demo->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "demo",
                'action' => 'edit',
                'params' => [$demo->id]
            ]);

            return;
        }

        $this->flash->success("demo was updated successfully");

        $this->dispatcher->forward([
            'controller' => "demo",
            'action' => 'index'
        ]);
    }

    /**
     * Deletes a demo
     *
     * @param string $id
     */
    public function deleteAction($id)
    {
        $demo = Demo::findFirstByid($id);
        if (!$demo) {
            $this->flash->error("demo was not found");

            $this->dispatcher->forward([
                'controller' => "demo",
                'action' => 'index'
            ]);

            return;
        }

        if (!$demo->delete()) {

            foreach ($demo->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "demo",
                'action' => 'search'
            ]);

            return;
        }

        $this->flash->success("demo was deleted successfully");

        $this->dispatcher->forward([
            'controller' => "demo",
            'action' => "index"
        ]);
    }
}
