<?php
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
        $query = "INSERT INTO (`organizationID`, `Date`,`Start Time`,`End Time`,`Location`,`Name`, `Number_Of_Spots`,`Sign_Up_Deadline`,`Description`) `Opportunities` VALUES (:organizationID, :eventdate, :starttime, :endtime, :locatn, :eventname, :spots, :deadline, :descr);";
        $statement = $db->prepare($query); 
        $statement->bindValue(':organizationID', $organizationID);
        $statement->bindValue(':eventdate', $date);
        $statement->bindValue(':starttime', $starttime);
        $statement->bindValue(':endtime', $endtime);
        $statement->bindValue(':locatn', $location);
        $statement->bindValue(':eventname', $name);
        $statement->bindValue(':spots', $numSpots);
        $statement->bindValue(':deadline', $deadline);
        $statement->bindValue(':descr', $description);
        $statement->execute();
        $statement->closeCursor();
        echo "executed";
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

    function signUp($studentID, $organizationID, $eventDate, $startTime, $locatn){
        global $db;
        $query = "INSERT INTO `Signs_up` VALUES (:studentID, :organizationID, :eventDate, :startTime, :locatn);";
        $statement = $db->prepare($query); 
        $statement->bindValue(':studentID', $studentID);
        $statement->bindValue(':organizationID', $organizationID);
        $statement->bindValue(':eventDate', $eventDate);
        $statement->bindValue(':startTime', $startTime);
        $statement->bindValue(':locatn', $locatn);
        $statement->execute();
        $statement->closeCursor();
    }
?>