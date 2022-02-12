<?php
require_once "config.php";
?>
 <table id="insertable1">
                <?php $sql = "SELECT * FROM teste";
                $result = $con->query($sql); 
                while ($row = $result->fetch_assoc()) 
                {
                    

                ?>
                        <tr>

                            <td>
                                <?php echo $row["id"]; ?>
                            </td>

                            <td>
                                <?php echo $row["produto"]; ?>
                            </td>

                            <td>
                                <?php echo $row["quantidade"]; ?>
                            </td>

                            <td>
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
                    
                }
                    ?>
                        </tr>

                        <tr><th id='bordernone'><div id='lastdiv'></div></th></tr>
       
            </table>