<?php

namespace App\Controller;


class PostsController extends AppController
{

    public function index()
    {
        $posts = $this->Posts->find();
        $this->set(compact('posts'));
    }
}