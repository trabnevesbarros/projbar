<p>
    <strong>Balan&ccedil;o: </strong>
    <?php 
    if (strtolower($produto['Balanco']['acao']) == 'e') { echo 'Entrada';
    } else if (strtolower($produto['Balanco']['acao']) == 's') { echo 'Saida';
    } else { echo 'Inválido';}
    echo '<br>:Valor R$' . h($balanco['Balanco']['valor']);
    echo '<br>:Quantidade ' . h($balanco['Balanco']['quantidade']);
    echo '<br>:Total ' . h($balanco['Balanco']['total']);
    echo '<br>:Produto ' . h($balanco['Produto']['name']);
    echo '<br>:Data ' . h($balanco['Balanco']['data']);
    ?>
</p>