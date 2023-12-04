<?php
    function getUserSignUp($memberID){
        global $db;
        $query = "select * from Signs_up WHERE studentID= :id";
        $statement = $db->prepare($query); 
        $statement->bindValue(':id', $memberID);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;
    }

    function deleteSignUp($memberID, $organizationID, $date, $time){
        global $db;
        $query = "DELETE FROM Signs_up WHERE studentID = :id AND organizationID = :orgid AND Time = :ti AND Date = :dates";
        $statement = $db->prepare($query); 
        $statement->bindValue(':id', $memberID);
        $statement->bindValue(':orgid', $organizationID);
        $statement->bindValue(':ti', $time);
        $statement->bindValue(':dates', $date);
        $statement->execute();
        $statement->closeCursor();
        return $statement;
    }
    function getAllOpportunities(){
        global $db;
        $query = "SELECT * from Opportunities";
        $statement = $db->prepare($query);
        $statement->execute();

        $results = $statement->fetchAll();
        $statement->closeCursor();
        return $results;
    }
    function getAllOrganizations(){
        global $db;
        $query = "select * from Organizations";
        $statement = $db->prepare($query);
        $statement->execute();

        $results = $statement->fetchAll();
        $statement->closeCursor();
        return $results;
    }

    function addOpportunity($organizationID, $date, $starttime, $endtime, $location, $name, $numSpots,$deadline, $description){
        global $db;
        $query = "INSERT INTO `Opportunities` VALUES (:organizationID, :Date, :Start, :End, :Location, :Name, :Spots, :Deadline, :Description)";
        echo "1";
        echo $query;
        $statement = $db->prepare($query); 
        $statement->bindValue(':organizationID', $organizationID);
        $statement->bindValue(':Date', $date);
        $statement->bindValue(':Start', $starttime);
        $statement->bindValue(':End', $endtime);
        $statement->bindValue(':Location', $location);
        $statement->bindValue(':Name', $name);
        $statement->bindValue(':Spots', $numSpots);
        $statement->bindValue(':Deadline', $deadline);
        $statement->bindValue(':Description', $description);
        echo "2";
        echo $query;
        $test = $statement->dump();
        echo $test;
        $statement->execute();
        echo "3";
        echo $statement;
        $statement->closeCursor();
    }

    function updateOpportunity($organizationID, $date, $starttime, $endtime, $location, $name, $numSpots,$deadline, $description){
        global $db;
        $query = "UPDATE `Opportunities` SET `End Time`=:endtime, `Name`=:name, `Number_Of_Spots`=:numSpots, `Sign_Up_Deadline`=:deadline, `Description`=:description WHERE `organizationID`=:organizationID AND `Date`=:date AND `Start Time`=:starttime AND `Location`=:location;";
        $statement = $db->prepare($query); 
        $statement->bindValue(':organizationID', $organizationID);
        $statement->bindValue(':date', $date);
        $statement->bindValue(':starttime', $starttime);
        $statement->bindValue(':endtime', $endtime);
        $statement->bindValue(':location', $location);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':numSpots', $numSpots);
        $statement->bindValue(':deadline', $deadline);
        $statement->bindValue(':description', $description);
        $statement->execute();
        $statement->closeCursor();
    }

    function signUp(){
        global $db;
        $query = "INSERT INTO `Signs_up` VALUES ()";
    }
?>