<p>
    <strong>Produto: </strong>
    <?php 
    echo h($produto['Produto']['name']);
    echo '<br>Quantidade: ' . h($produto['Produto']['quantidade']);
    echo '<br>Preço: ' . h($produto['Produto']['preco']);
    ?>
</p>