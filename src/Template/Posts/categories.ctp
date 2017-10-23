<h1>
    Posts categorizados como:
    <?= $this->Text->toList(h($categories), 'o') ?>
</h1>

<section>
    <?php foreach ($posts as $post): ?>
        <article>
            <h4><?= $this->Html->link(
                    $post->title,
                    ['controller' => 'Posts', 'action' => 'view', $post->slug]
                ) ?></h4>
            <span><?= h($post->created) ?>
        </article>
    <?php endforeach; ?>
</section>