<h1>Posts</h1>

<?= $this->Html->link('Agregar Post', ['action' => 'add']) ?>
<table>
    <tr>
        <th>Título</th>
        <th>Creado en</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($posts as $post): ?>
        <tr>
            <td>
                <?= $this->Html->link($post->title, ['action' => 'view', $post->slug]) ?>
            </td>
            <td>
                <?= $post->created->format(DATE_RFC850) ?>
            </td>
            <td>
                <?= $this->Html->link('Editar', ['action' => 'edit', $post->slug]) ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>