<h1>Balanco</h1>
<table>
    <thead>
    <th><?php echo $this->Paginator->sort('Produto.name', 'Nome do Produto'); ?></th>
    <th><?php echo $this->Paginator->sort('Balanco.acao', 'E/S'); ?></th>
    <th><?php echo $this->Paginator->sort('Balanco.valor', 'Valor'); ?></th>
    <th><?php echo $this->Paginator->sort('Balanco.quantidade', 'Quantidade'); ?></th>
    <th><?php echo $this->Paginator->sort('Balanco.total', 'Total'); ?></th>
    <th><?php echo $this->Paginator->sort('Balanco.data', 'Data/Hora'); ?></th>
    <th colspan="2">Ação</th>
</thead>
    <tbody>
        <?php foreach ($balancos as $balanco):?>
            <tr>        
                <td><?php echo $this->Html->link($balanco['Produto']['name'], array('action' => 'view', $balanco['Balanco']['id']));  ?></td>
                <td><?php 
                    if (strtolower($balanco['Balanco']['acao']) == 'e') { echo 'Entrada';
                    } else if (strtolower($balanco['Balanco']['acao']) == 's') { echo 'Saida';
                    } else { echo 'Inválido';} 
                    ?>
                </td>
                <td><?php echo $balanco['Balanco']['valor'] ?></td>
                <td><?php echo $balanco['Balanco']['quantidade'] ?></td>
                <td><?php echo $balanco['Balanco']['total'] ?></td>
                <td><?php echo $balanco['Balanco']['data'] ?></td>
                <td><?php echo $this->Html->link('Alterar', array('action' => 'edit', $balanco['Balanco']['id']));?></td>
                <td><?php echo $this->Form->postLink('Remover', array('action' => 'delete', $balanco['Balanco']['id']), array('confirm' => 'Você tem certeza?')); ?></td>
            </tr>
            
        <?php endforeach; ?>  
    </tbody>
</table>
</br>
<?php echo $this->Html->link('Adicionar balanco', array('action' => 'add')); 
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
    
    
    