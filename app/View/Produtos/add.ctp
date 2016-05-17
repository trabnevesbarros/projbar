<h1>Cadastrar Produto</h1>
<?php
echo $this->Form->create('Produto', array('inputDefaults' => array('type' => 'text')));
echo $this->Form->input('name', array('label' => 'Nome'));
echo $this->Form->input('quantidade', array('label' => 'Quantidade', 'value' => 0, 'type' => 'hidden'));
echo $this->Form->input('preco', array('label' => 'Preço'));
echo $this->Form->end('Salvar');
