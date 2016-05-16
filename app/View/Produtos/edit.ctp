<h1>Alterar registro</h1>
<?php
echo $this->Form->create('Produto', array('inputDefaults' => array('type' => 'text')));
echo $this->Form->input('name', array('label' => 'Nome'));
echo $this->Form->input('quantidade', array('label' => 'Quantidade'));
echo $this->Form->input('preco', array('label' => 'Preço'));
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Salvar');