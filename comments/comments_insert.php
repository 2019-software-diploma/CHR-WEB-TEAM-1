<?php
    require '../main/dbConnectionCHR.php';

    $error = '';
    $comment_name = '';
    $comment_content = '';

    if(empty($_POST['comment_name'])){
        $error .= '<p class="text-danger">Name is required.</p>';
    }
    else{
        $comment_name = $_POST['comment_name'];
    }

    if(empty($_POST['comment_content'])){
        $error .= '<p class="text-danger">Comment is required.</p>';
    }
    else{
        $comment_content = $_POST['comment_content'];
    }
    // $journal_number
    if($error == ''){
        $query = "INSERT INTO `chr`.`comments`
        (`parent_id`,
        `id_journal`,
        `date`,
        `author`,
        `text`)
        VALUES
        (:parent_id,
        :id_journal,
        :date,
        :author,
        :text);";

        $statement = $conn->prepare($query);
        $statement->execute(
            array(
                ':parent_id'    => '0',
                ':id_journal'   => $journal_number,
                ':date'         => date(),
                ':author'       => $comment_name,
                ':text'         => $comment_content            
            )
        );
        $error = '<label class="text-success">Comment Added</label>';
    }
    $data = array(
        'error' => $error
    );

    echo json_encode($data);
?>