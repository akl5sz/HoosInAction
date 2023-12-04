<?php
function addUser($memberID,$password){
    global $db; 

    $query = "insert into Users values (:memberID, :password) ";
  
    $statement = $db->prepare($query); 
    $statement->bindValue(':memberID', $memberID);
    $statement->bindValue(':password', $password);
    $statement->execute();
    $statement->closeCursor();

}

function addOrganization($memberID, $name, $description){
    global $db; 

    $query = "insert into Organizations values (:memberID, :name, :description) ";
  
    $statement = $db->prepare($query); 
    $statement->bindValue(':memberID', $memberID);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':description', $description);
    $statement->execute();
    $statement->closeCursor();
}

function addStudent($memberID, $fname, $lname){
    global $db; 

    $query = "insert into Students values (:studentID, :First_Name, :Last_Name) ";
    // `studentID` varchar(30) NOT NULL,
    //`First_Name` varchar(50) NOT NULL,
    //`Last_Name` varchar(50) NOT NULL
  
    $statement = $db->prepare($query); 
    $statement->bindValue(':studentID', $memberID);
    $statement->bindValue(':First_Name', $fname);
    $statement->bindValue(':Last_Name', $lname);
    $statement->execute();
    $statement->closeCursor();
}

function addUser_emails($memberID, $email){
    global $db; 

    $query = "insert into User_emails values (:memberID, :email) ";
    // `studentID` varchar(30) NOT NULL,
    //`First_Name` varchar(50) NOT NULL,
    //`Last_Name` varchar(50) NOT NULL
  
    $statement = $db->prepare($query); 
    $statement->bindValue(':memberID', $memberID);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $statement->closeCursor();
}

function addStudent_phone($memberID, $phone){
    global $db;
    $query = "insert into Student_phones values (:memberID, :phone) ";
    $statement = $db->prepare($query); 
    $statement->bindValue(':memberID', $memberID);
    $statement->bindValue(':phone', $phone);
    $statement->execute();
    $statement->closeCursor();
}

function getUserID($email){
    global $db;
    $query = "SELECT memberID FROM User_emails WHERE email = :email ";
    $statement = $db->prepare($query); 
    $statement->bindValue(':email', $email);
    $statement->execute();
    $result = $statement->fetchAll();
    $statement->closeCursor();
    return $result;
}

function getPassword($memberID){
    global $db;
    $query = "SELECT password FROM Users WHERE memberID = :memberID ";
    $statement = $db->prepare($query); 
    $statement->bindValue(':memberID', $memberID);
    $statement->execute();
    $result = $statement->fetchAll();
    $statement->closeCursor();
    return $result;
}

function getUserType($id){
    global $db;
    $type;
    $query = "SELECT * FROM Organizations WHERE organizationID = :id";
    $statement = $db -> prepare($query);
    $statement->bindValue(':id',$id);
    $statement->execute();
    $result = $statement->fetchAll();
    while ($statement->fetch()){
        if (!in_array($id)){
            $type = "Student"
            return $type;
        }
    }
    $type = "Organization";
    return $type;
}
