<h1>Balan&ccedil;o</h1>
<?php
echo $this->Form->create('Balanco', array('url' => array_merge(array('action' => 'relatorio'),$this->params['pass']),
'inputDefaults' => array('type' => 'text', 'class' => 'txtSearch')));
?>
<div class="search">
    <table class="tableSearch">
    <tbody>
        <tr>
            <td><?php
                echo $this->Form->input('data_s_search', array(
                    'type' => 'datetime',
                    'label' => 'Inicio'
                ));
                ?>
            </td>
            <td><?php
                echo $this->Form->input('data_f_search', array(
                    'type' => 'datetime',
                    'label' => 'Fim'
                ));
                ?>
            </td>
        </tr>
        <tr><td><?php echo $this->Form->end('Gerar'); ?></td></tr>
    </tbody>
    </table>
</div>
<?php if (isset($balancos)): ?>
<table>
    <thead>
    <th><?php echo $this->Paginator->sort('Produto.name', 'Nome do Produto'); ?></th>
    <th><?php echo $this->Paginator->sort('Balanco.acao', 'E/S'); ?></th>
    <th><?php echo $this->Paginator->sort('Balanco.valor', 'Valor'); ?></th>
    <th><?php echo $this->Paginator->sort('Balanco.quantidade', 'Quantidade'); ?></th>
    <th><?php echo $this->Paginator->sort('Balanco.total', 'Total'); ?></th>
    <th><?php echo $this->Paginator->sort('Balanco.data', 'Data/Hora'); ?></th>
</thead>
    <tbody>
        <?php
        $subtotal = 0;
        foreach ($balancos as $balanco):
        ?>
            <tr>        
                <td><?php echo $balanco['Produto']['name'] ?></td>
                <td><?php 
                    if (strtolower($balanco['Balanco']['acao']) == 'e') {
                        echo 'Entrada';
                        $balanco['Balanco']['total'] = -1* $balanco['Balanco']['total'];
                    } else if (strtolower($balanco['Balanco']['acao']) == 's') { echo 'Saida';
                    } else { echo 'Inválido';} 
                    ?>
                </td>
                <td><?php echo 'R$ '.number_format($balanco['Balanco']['valor'], 2) ?></td>
                <td><?php echo $balanco['Balanco']['quantidade'] ?></td>
                <td><?php echo 'R$ '.number_format($balanco['Balanco']['total'], 2) ?></td>
                <td><?php echo date('d/m/Y - h:i:s A', strtotime($balanco['Balanco']['data'])) ?></td>                
            </tr>
            
        <?php
        $subtotal += $balanco['Balanco']['total'];
        endforeach; 
        ?>  
            <tr><td colspan="6"><strong><?php echo 'Total: R$ '.number_format($subtotal, 2) ?></strong></td></tr>
    </tbody>
</table>
</br>
<?php
echo $this->Html->link('Voltar', array('action' => 'relatorio'));
endif;
?>

