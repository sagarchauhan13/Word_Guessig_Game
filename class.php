<?php
require_once 'dbConfig.php';

class WordPlay{
    public $conn;
    public $user_email;
    public $user_id;

    public function __construct(){
        $this->conn = new dbConfig();
    }
    
    /*Function For Inserting E-mail into "user" Table*/
    public function InsertEmail($user_email){
        $stmt= $this->conn->prepare("INSERT INTO `user` (`user_email`) VALUES (?);");
        $insert = $stmt->execute([$user_email]);
        $user_id = $this->user_id = $this->conn->lastInsertId();
        $_SESSION['user_id'] = $user_id;
        $user_id = $_SESSION['user_id'];
        return $insert;
    }
    
    /*Function For Fetching Words From "words" Table*/
    public function GetWords(){
        $stmt = $this->conn->prepare("SELECT word_id, words FROM words WHERE word_id NOT IN (SELECT word_id FROM user_answer WHERE user_id = ?) ORDER BY RAND() LIMIT 5;");
        $stmt->bindParam(1,$_SESSION['user_id']);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    }
    
    /*Function For Insert User Answer into "user_answer" Table*/
    public function InsertUserAnswer($user_id,$word_id,$user_answer){
        $stmt = $this->conn->prepare("INSERT INTO `user_answer` (`user_id`, `word_id`, `user_answer`) VALUES (?, ?, ?);");
        $insert_answer = $stmt->execute([$user_id,$word_id,$user_answer]);
        return $insert_answer;
    }
    
    /*Function For Hide Characters of Words*/
    public function SplitWords($result){
        $array = str_split($result);
        $random_keys = array_rand($array, round(count($array)/2));
        for ($i = 0; $i < count($array); $i++) {
            if (in_array($i, $random_keys)) {
                echo '_';
            } else {
                echo $array[$i];
            }
        }
        return $random_keys;
    }
    
    /*Select max_records & record_percentage From "game_settings" Table*/
    public function Criteria(){
        $stmt = $this->conn->prepare("SELECT record_percentage,max_records FROM game_settings WHERE setting_id=1");
        $stmt->execute();
        $criteria_result = $stmt->fetch();
        return $criteria_result;
    }
    
    /*Function For Counting Value of Total Answered Questions From "user_answer" Table*/
    public function Count(){
        $stmt = $this->conn->prepare("SELECT COUNT(word_id) AS word_id FROM user_answer WHERE user_id =?;");
        $stmt->bindParam(1,$_SESSION['user_id']);
        $stmt->execute();
        $count = $stmt->fetch();
        return $count;
    }
    
    /*Function For Getting Total Number of Words from words table*/
    public function TotalWords(){
        $stmt = $this->conn->prepare("SELECT COUNT(words) AS total_words FROM words;");
        $stmt->execute();
        $total_words_return = $stmt->fetch();
        return $total_words_return;
    }
    
    /*Function For Fetching User Answer */
    public function UserAnswer(){
        $stmt = $this->conn->prepare("SELECT words.word_id, words.words, user_answer.user_id, user_answer.word_id, user_answer.user_answer 
FROM words
INNER JOIN user_answer ON words.word_id = user_answer.word_id WHERE user_id = ?");
        $stmt->bindParam(1,$_SESSION['user_id']);
        $stmt->execute();
        $user_answer_return = $stmt->fetchAll();
        return $user_answer_return;
    }

}