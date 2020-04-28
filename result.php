<?php
session_start();
require_once 'dbConfig.php';
require_once 'class.php';
$operation = new WordPlay();
$user_answer_return = $operation->UserAnswer();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Result</title>
    </head>
    <body>
        <center>
            <h3>Game Over</h3>
            <table border='1' cellpadding='3px'>
                <h3>Your Score is</h3>
                <tr>
                    <th>Word Text</th>
                    <th>Your Answer</th>
                    <th>Right Answer</th>
                    <th>Analysis</th>
                </tr>
                <?php
                $i=1;
                foreach ($user_answer_return as $row){
                ?>
                <tr>
                    <td></td>
                    <td><?php echo $row['user_answer']; ?></td>
                    <td><?php echo $row['words']; ?></td>
                    <?php if($row['user_answer'] == $row['words']) { ?>
                        <td><span>&#10004</span></td>
                    <?php } else { ?>
                        <td><span>&#10008</span></td>
                    <?php } ?>
                </tr>
                <?php } ?>
            </table>
        </center>
    </body>
</html>