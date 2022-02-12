<?php
require_once "config.php";
?>

<table id="insertable1">
<?php
        $sql =  "SELECT COUNT(*) FROM produtos";
        $result = $con->query($sql);
        while($row = mysqli_fetch_array($result)) {
            ?>
<tr>
<td colspan="6"><?php echo 'Número de entradas:'. $row['COUNT(*)']; 
} ?></td>
</tr>

<tr>
                <th>Referência</th>
                <th>Produto</th>
                <th>Quantidade</th>  
                <th>Preço por unidade</th>
                <th>Stock</th>
            </tr>

        
                <?php $sql = "SELECT * FROM teste";
                $result = $con->query($sql); 
                while ($row = $result->fetch_assoc()) 
                {
                    

                ?>
                        <tr>

                            <td class="tdref">
                                <?php echo $row["id"]; ?>
                            </td>

                            <td class="tdprod">
                                <?php echo $row["produto"]; ?>
                            </td>

                            <td class="tdsql">
                                <?php echo $row["quantidade"]; ?>
                            </td>

                            <td class="tdsql">
                                <?php echo $row["price"] . " €";   ?>
                            </td>

                            <?php 
                            if ($row["stock"] == '1')
                            {
                                echo "<td class='verde'></td>"; 
                            }
                            elseif ($row["stock"] == '2')
                            {
                                echo "<td class='amarelo'></td>"; 
                            }
                            else
                            {
                                echo "<td class='vermelho'></td>"; 
                            }
                            ?>
                            </tr>
                    <?php 
                    
                }
                    ?>
                        
       
            </table>