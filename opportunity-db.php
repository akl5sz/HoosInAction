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
        /*
        global $db;
        $query = "SELECT * from Opportunities NATURAL JOIN Opportunity_categories";
        $statement = $db->prepare($query);
        $statement->execute();

        $results = $statement->fetchAll();
        $statement->closeCursor();*/

        $query = "CALL getAll()";
        $statement = $db->prepare($query);
        $statement->execute();

        $results = $statement->fetchAll();
        $statement->closeCursor();

        return $results;
    }

    function getAllOpportunitiesByName(){
        global $db;
        $query = "SELECT * from Opportunities NATURAL JOIN Opportunity_categories ORDER BY `Name`";
        $statement = $db->prepare($query);
        $statement->execute();

        $results = $statement->fetchAll();
        $statement->closeCursor();
        return $results;
    }

    function getAllOpportunitiesByDate(){
        global $db;
        $query = "SELECT * from Opportunities NATURAL JOIN Opportunity_categories ORDER BY `Date`";
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
        $query = "INSERT INTO `Opportunities` (`organizationID`, `Date`, `Start Time`, `End Time`, `Location`, `Name`, `Number_Of_Spots`, `Sign_Up_Deadline`, `Description`) VALUES (:organizationID, :eventdate, :starttime, :endtime, :locatn, :eventname, :spots, :deadline, :descr);";
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
        return $statement;
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

    function getOrgOpportunity($id){
        global $db;
        $query = "SELECT * from Opportunities WHERE organizationID= :id";
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $results = $statement->fetchAll();
        $statement->closeCursor();
        return $results;
    }

    function deleteOpp($id, $date, $time) {
        global $db;
        $query = "DELETE FROM Opportunities WHERE organizationID=:id AND Date=:dte AND `Start Time`=:tme";
        $statement = $db->prepare($query); 
        $statement->bindValue(':id', $id);
        $statement->bindValue(':dte', $date);
        $statement->bindValue(':tme', $time);
        $statement->execute();
        $statement->closeCursor();
        return true;
    }
    
    function addCategory($id, $date, $start, $loc, $cat) {
        global $db;
        $query = "INSERT INTO `Opportunity_categories` VALUES (:id, :dte, :strt, :loc, :cat);";
        $statement = $db->prepare($query); 
        $statement->bindValue(':id', $id);
        $statement->bindValue(':dte', $date);
        $statement->bindValue(':strt', $start);
        $statement->bindValue(':loc', $loc);
        $statement->bindValue(':cat', $cat);
        $statement->execute();
        $statement->closeCursor();
        return true;
    }

    function getAllOrgs($user){
        global $db;
        $query = "SELECT organizationID FROM Member WHERE studentID = :id";
        $statement = $db->prepare($query); 
        $statement->bindValue(':id', $user);
        $statement->execute();
        $results = $statement->fetchAll();
        $statement->closeCursor();
        return $results;
    }

    function getEmails($user){
        global $db;
        $query = "SELECT * FROM `User_emails` WHERE memberID = :id";
        $statement = $db->prepare($query); 
        $statement->bindValue(':id', $user);
        $statement->execute();
        $results = $statement->fetchAll();
        $statement->closeCursor();
        return $results;
    }

    function updateCategory($id, $date, $start, $loc, $cat) {
        global $db;
        $query = "UPDATE `Opportunity_categories` SET `Date`=:dte, `Start Time`=:strt, `Location`=:loc, `Category`=:cat WHERE `organizationID`=:id AND `Date`=:date AND `Start Time`=:starttime AND `Location`=:location;";
        $statement = $db->prepare($query); 
        $statement->bindValue(':id', $id);
        $statement->bindValue(':dte', $date);
        $statement->bindValue(':strt', $start);
        $statement->bindValue(':loc', $loc);
        $statement->bindValue(':cat', $cat);
        $statement->bindValue(':date', $date);
        $statement->bindValue(':starttime', $start);
        $statement->bindValue(':location', $loc);
        $statement->execute();
        $statement->closeCursor();
        return true;
    }
    
?>