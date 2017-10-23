<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Utility\Text;
use Cake\Validation\Validator;
use Cake\ORM\Query;

class PostsTable extends Table
{
    public function beforeSave($event, $entity, $options)
    {
        if ($entity->isNew() && !$entity->slug) {
            $slug = Text::slug($entity->title);
            $entity->slug = substr($slug, 0, 191);
        }

    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->notEmpty('title')
            ->minLength('title', 10)
            ->maxLength('title', 255)
            ->notEmpty('body')
            ->minLength('body', 10);

        return $validator;
    }

    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
        $this->belongsToMany('Categories'); // Add this line
    }

    public function findCategorized(Query $query, array $options)
    {
        $columns = [
            'Posts.id', 'Posts.user_id', 'Posts.title',
            'Posts.body', 'Posts.published', 'Posts.created',
            'Posts.slug',
        ];

        $query = $query
            ->select($columns)
            ->distinct($columns);

        if (empty($options['categories'])) {
            // Posts sin categorias
            $query->leftJoinWith('Categories')
                ->where(['Categories.title IS' => null]);
        } else {
            $query->innerJoinWith('Categories')
                ->where(['Categories.title IN' => $options['categories']]);
        }
        return $query->group(['Posts.id']);
    }
}