<?php
session_start();
require_once 'dbConfig.php';
require_once 'class.php';
$operation = new WordPlay();
$result = $operation->GetWords();
$total_words_return = $operation->TotalWords();
$total_words = $total_words_return['total_words'];
$random_keys = $operation->SplitWords($result['words']);
$word_id = $result['word_id'];
if(isset($_POST['user_ans'])){
    $word_id = $_POST['word_id'];
    $insert_answer = $operation->InsertUserAnswer($_SESSION['user_id'], $word_id, $_POST['user_ans']);
}
$count = $operation->Count();
$criteria_result = $operation->Criteria();
$max_records = $criteria_result['max_records'];
$record_percentage = round((($criteria_result['record_percentage']*$total_words)/100));
$_SESSION['max_records'] = $max_records;
$_SESSION['record_percentage'] = $record_percentage;
if($count['word_id'] == $max_records) { ?>
    <script>
        $("#user_ans_form").hide();
        $("#getwords").hide();
        $("#result").load("result.php");
    </script>
<?php } elseif($count['word_id'] == $record_percentage){ ?>
    <script>
        $("#user_ans_form").hide();
        $("#getwords").hide();
        $("#result").load("result.php");
    </script>
<?php }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Word Play</title>
        <link rel="stylesheet" href="css.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="/sagar/task4/js.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    </head>
    <body>
        <input type="hidden" name="word_id" id="word_id" value="<?php echo $result['word_id'];?>">
        <form method="post" name="user_ans_form" id="user_ans_form" action="getwords.php">
            <input type="text" name="user_ans" id="user_ans" autofocus>
            <button class="btn btn-primary btn-sm" type="button" name="next" value="Next" id="next">Next</button>
        </form>
    </body>
</html>