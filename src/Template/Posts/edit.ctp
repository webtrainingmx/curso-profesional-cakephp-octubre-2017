<h1>Editar Post</h1>
<?php
echo $this->Form->create($post, ['novalidate' => 'novalidate']);
echo $this->Form->control('user_id', ['type' => 'hidden']);
echo $this->Form->control('title');
echo $this->Form->control('body', ['rows' => '3']);
echo $this->Form->control('categories._ids', ['options' => $categories]);
echo $this->Form->button(__('Guardar'));
echo $this->Form->end();
?>