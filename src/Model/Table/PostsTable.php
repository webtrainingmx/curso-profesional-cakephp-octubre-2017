<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Utility\Text;

class PostsTable extends Table
{
    public function beforeSave($event, $entity, $options)
    {
        if ($entity->isNew() && !$entity->slug) {
            $slug = Text::slug($entity->title);
            $entity->slug = substr($slug, 0, 191);
        }

    }

    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
    }
}