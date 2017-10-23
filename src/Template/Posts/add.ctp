<h1>Agregar Post</h1>
<?php
echo $this->Form->create($post);
// Hard code the user for now.
echo $this->Form->control('user_id', ['type' => 'hidden', 'value' => 1]);
echo $this->Form->control('title');
echo $this->Form->control('body', ['rows' => '3']);
echo $this->Form->button(__('Guardar'));
echo $this->Form->end();
?>