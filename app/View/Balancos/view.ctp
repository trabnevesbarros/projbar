<p>
    <strong>Balan&ccedil;o: </strong>
    <?php 
    if (strtolower($balanco['Balanco']['acao']) == 'e') { echo 'Entrada';
    } else if (strtolower($balanco['Balanco']['acao']) == 's') { echo 'Saida';
    } else { echo 'Inválido';}
    echo '<br>Valor: R$ ' . h(number_format($balanco['Balanco']['valor'], 2));
    echo '<br>Quantidade: ' . h($balanco['Balanco']['quantidade']);
    echo '<br>Total: RS ' . h(number_format($balanco['Balanco']['total'], 2));
    echo '<br>Produto: ' . h($balanco['Produto']['name']);
    echo '<br>Data: ' . h($balanco['Balanco']['data']);
    ?>
</p>