<p>
    <strong>Produto: </strong>
    <?php 
    echo h($produto['Produto']['name']);
    echo '<br>Preço: R$ ' . h(number_format($produto['Produto']['preco'], 2));
    echo '<br>Quantidade: ' . h($produto['Produto']['quantidade']);
    ?>
</p>