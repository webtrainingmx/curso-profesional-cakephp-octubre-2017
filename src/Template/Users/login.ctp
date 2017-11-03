<h1>Login</h1>
<?= $this->Form->create() ?>
<div class="form-group">
    <?= $this->Form->control('email', ['class' => 'form-control']) ?>
</div>
<div class="form-group">
    <?= $this->Form->control('password', ['class' => 'form-control']) ?>
</div>
<?= $this->Form->button('Login', ['class' => 'btn btn-warning']) ?>
<?= $this->Form->end() ?>