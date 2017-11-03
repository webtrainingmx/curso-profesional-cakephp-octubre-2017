<?php

namespace App\Controller;


class PostsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['index']);
    }

    public function isAuthorized($user)
    {
        $action = $this->request->getParam('action');
        // Add posts is ALWAYS allowed for authenticated users
        if (in_array($action, ['add'])) {
            return true;
        }

        // All other Posts actions require the SLUG
        $slug = $this->request->getParam('pass.0');
        if (!$slug) {
            return false;
        }

        $post = $this->Posts->findBySlug($slug)->first();


        return $post->user_id === $user['id'];
    }

    public function index()
    {
        $posts = $this->Posts->find();
        $this->set(compact('posts'));
    }

    public function view($slug = null)
    {
        $post = $this->Posts->findBySlug($slug)->firstOrFail();
        $this->set(compact('post'));
    }

    public function add()
    {
        $post = $this->Posts->newEntity();

        if ($this->request->is('post')) {
            $post = $this->Posts->patchEntity($post, $this->request->getData());

            $post->user_id = 1;

            if ($this->Posts->save($post)) {
                $this->Flash->success(__('Post guardado'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('No se ha podido guardar'));
        }

        // Get a list of categories
        $categories = $this->Posts->Categories->find('list');

        $this->set('categories', $categories);

        $this->set(compact('post'));
    }

    public function edit($slug)
    {
        $post = $this->Posts
            ->findBySlug($slug)
            ->contain('Categories')// Cargar categorías
            ->firstOrFail();

        if ($this->request->is(['post', 'put'])) {
            $this->Posts->patchEntity($post, $this->request->getData());
            if ($this->Posts->save($post)) {
                $this->Flash->success(__('Post guardado'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se ha podido guardar'));
        }

        // Get a list of categories
        $categories = $this->Posts->Categories->find('list');

        $this->set('categories', $categories);

        $this->set('post', $post);
    }

    public function delete($slug)
    {
        $this->request->allowMethod(['post', 'delete']);

        $post = $this->Posts->findBySlug($slug)->firstOrFail();
        if ($this->Posts->delete($post)) {
            $this->Flash->success(__('El {0} post ha sido eliminado', $post->title));
            return $this->redirect(['action' => 'index']);
        }
    }

    public function categories()
    {
        // The 'pass' key is provided by CakePHP and contains all
        // the passed URL path segments in the request.
        $categories = $this->request->getParam('pass');

        $posts = $this->Posts->find('categorized', [
            'categories' => $categories
        ]);

        $this->set(['posts' => $posts, 'categories' => $categories]);

    }
}