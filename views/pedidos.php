<?php 
global $config;
?>
<h1>Seus Pedidos</h1>
<a href="/login/logout">Sair</a>
<table border="0" width="100%">
    <tr>
        <th>N° do pedido</th>
        <th>Valor pago</th>
        <th>Forma de Pgto</th>
        <th>Status do Pgto</th>
        <th>Açoes</th>
    </tr>
        <?php foreach ($pedidos as $pedido): ?>
    <tr>
        <td><?php echo $pedido['id'];?></td>
        <td><?php echo $pedido['valor'];?></td>
        <td><?php echo $pedido['tipopgto'];?></td>
        <td><?php echo $config['status_pgto'][$pedido['status_pg']];?></td>
        
        <td></td>
    </tr>
        <?php endforeach; ?>
</table>