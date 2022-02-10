<?php
require_once "config.php";
    $filter = $_POST['searchref'] ?? null;
    $query = "SELECT id,produto,quantidade,price,stock FROM teste WHERE id LIKE '%$filter%' ";
    $result = $con->query($query);
    while ($row = $result->fetch_assoc()){ 
?>
            <tr class="searchresults">
                <td class="searchresults" ><?php echo $row["id"]; ?></td>
                <td class="searchresults" ><?php echo $row["produto"]; ?></td>
                <td class="searchresults" ><?php echo $row["quantidade"]; ?></td>
                <td class="searchresults" ><?php echo $row["price"] . " €" ; ?></td>
                <?php 
                            if ($row['stock'] == '1')
                            {
                                echo "<td class='searchresults verde'></td>"; 
                            }
                            elseif ($row['stock'] == '2')
                            {
                                echo "<td class='searchresults amarelo'></td>"; 
                            }
                            else
                            {
                                echo "<td class='searchresults vermelho'></td>"; 
                            }
                            ?>
            </tr> 
    <?php
    }









/*
    $sql = "SELECT id,produto,quantidade,price FROM teste WHERE produto LIKE '%".$_POST["search"]."%' ";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) > 0)
    {
                        while($row = mysqli_fetch_array($result))
                        {
                            $output .= '
                        <table>
                        <tr>
                        <td>'.$row['id'].'</td>
                        <td>'.$row['produto'].'</td>
                        <td>'.$row['quantidade'].'</td>
                        <td>'.$row['price'].'</td>
                        <td>'.$row['price'].'</td>
                        </tr>
                        </table
                        ';
                        echo $output;
                        }
                        
    }
    else { echo 'data not found';}
    */