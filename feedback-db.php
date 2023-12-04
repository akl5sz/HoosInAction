<?php 
function addFeedback($name, $orgoID, $description){
    global $db;
    $query = "insert into Feedback values(:name, :orgoID, :description)";

    $statement = $db->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':orgoID', $orgoID);
    $statement->bindValue(':description', $description);

    $statement->execute();

    $statement->closeCursor();
}


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

