<?php 
function getAllFeedback($organizationID){
    global $db;
    $query = "select * from Opportunities where ";
    $statement = $db->prepare($query);
    $statement->execute();

    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
}
?>

