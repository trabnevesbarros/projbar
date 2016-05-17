<h1>Alterar registro</h1>
<?php
echo $this->Form->create('Balanco', array('inputDefaults' => array('type' => 'text')));
echo $this->Form->input('produto_id', array('label' => 'Produto', 'type' => 'select', 'options' => $produtos));
echo $this->Form->input('acao', array('label' => 'Ação', 'type' => 'select', 'options' => array('E' => 'Entrada', 'S' => 'Saida')));
echo $this->Form->input('valor', array('label' => 'Valor'));
echo $this->Form->input('quantidade', array('label' => 'Quantidade'));
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Salvar');