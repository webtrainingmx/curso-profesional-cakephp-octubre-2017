<h1>Posts</h1>

<?= $this->Html->link('Agregar Post', ['action' => 'add']) ?>
<table>
    <tr>
        <th>Título</th>
        <th>Creado en</th>
    </tr>
    <?php foreach ($posts as $post): ?>
        <tr>
            <td>
                <?= $this->Html->link($post->title, ['action' => 'view', $post->slug]) ?>
            </td>
            <td>
                <?= $post->created->format(DATE_RFC850) ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>