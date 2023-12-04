<?php 
function getFeedbackPerOrg($organizationID){
    global $db;
    $query = "select * from Feedback WHERE organizationID= :id";
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $organizationID);
    $statement->execute();

    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
}
?>

