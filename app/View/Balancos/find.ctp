<h1>Balan&ccedil;o</h1>
<?php
echo $this->Form->create('Balanco', array('url' => array_merge(array('action' => 'find'),$this->params['pass']),
'inputDefaults' => array('type' => 'text', 'class' => 'txtSearch')));
?>

<div class="search">
    <h2>Filtros:</h2>
    <table class="tableSearch">
    <tbody>
        <tr>
            <td><?php
                echo $this->Form->input('produto_name_search', array(
                    'div' => false,
                    'label' => 'Nome do Produto'
                ));
                ?>
            </td>
            <td><?php
                echo $this->Form->input('data_search', array(
                    'type' => 'date',
                    'label' => 'Data', 
                    'dateFormat' => 'DMY'
                ));
                ?>
            </td>
        </tr>
        <tr><td><?php echo $this->Form->end('Pesquisar'); ?></td></tr>
    </tbody>
    </table>
</div>

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
                <td><?php echo 'R$ '.number_format($balanco['Balanco']['valor'], 2) ?></td>
                <td><?php echo $balanco['Balanco']['quantidade'] ?></td>
                <td><?php echo 'R$ '.number_format($balanco['Balanco']['total'], 2) ?></td>
                <td><?php echo date('d/m/Y - h:i:s A', strtotime($balanco['Balanco']['data'])) ?></td>
                <td><?php echo $this->Html->link('Alterar', array('action' => 'edit', $balanco['Balanco']['id']));?></td>
                <td><?php echo $this->Form->postLink('Remover', array('action' => 'delete', $balanco['Balanco']['id']), array('confirm' => 'Você tem certeza?')); ?></td>
            </tr>
            
        <?php endforeach; ?>  
    </tbody>
</table>
</br>
<?php echo $this->Html->link('Adicionar balanco', array('action' => 'add')); 
echo '<br>';
echo $this->Html->link('Voltar', array('action' => 'index'));
?>

<div class="paging">
<?php
echo $this->Paginator->prev('Anterior');
echo $this->Paginator->numbers();
echo $this->Paginator->next('Próximo');
?>
</div>
