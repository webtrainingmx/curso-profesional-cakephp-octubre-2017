<?php

namespace App\Controller;


class PostsController extends AppController
{

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

        $this->set(compact('post'));
    }
}