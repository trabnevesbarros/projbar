<h1>Produto</h1>
<table>
    <thead>
    <th><?php echo $this->Paginator->sort('Produto.name', 'Nome'); ?></th>
    <th><?php echo $this->Paginator->sort('Produto.quantidade', 'Quantidade'); ?></th>
    <th><?php echo $this->Paginator->sort('Produto.preco', 'Preço'); ?></th>
    <th><?php echo $this->Paginator->sort('Produto.contabilizar', 'Contabilizar'); ?></th>
    <th colspan="2">Ação</th>
</thead>
    <tbody>
        <?php foreach ($produtos as $produto):?>
            <tr>        
                <td><?php echo $this->Html->link($produto['Produto']['name'], array('action' => 'view', $produto['Produto']['id']));  ?></td>
                <td><?php echo $produto['Produto']['quantidade'] ?></td>
                <td><?php echo 'R$ '.number_format($produto['Produto']['preco'], 2) ?></td>
                <td><?php if ($produto['Produto']['contabilizar']) { echo 'S'; }else{ echo 'N'; }?></td>
                <td><?php echo $this->Html->link('Alterar', array('action' => 'edit', $produto['Produto']['id']));?></td>
                <td><?php echo $this->Form->postLink('Remover', array('action' => 'delete', $produto['Produto']['id']), array('confirm' => 'Você tem certeza?')); ?></td>
            </tr>
            
        <?php endforeach; ?>  
    </tbody>
</table>
</br>
<?php echo $this->Html->link('Adicionar produto', array('action' => 'add')); 
echo '<br>';
echo $this->Html->link('Pesquisar', array('action' => 'find'));
?>

<div class="paging">
<?php
echo $this->Paginator->prev('Anterior');
echo $this->Paginator->numbers();
echo $this->Paginator->next('Próximo');
?>
</div>
    
    
    