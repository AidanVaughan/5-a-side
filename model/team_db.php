<?php
function get_teams() {
    global $db;
    $query = 'SELECT * FROM teams
              ORDER BY team_ID';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement; 
}

function get_team_name($team_ID) {
    global $db;
    $query = 'SELECT * FROM teams
              WHERE team_ID = :team_ID';    
    $statement = $db->prepare($query);
    $statement->bindValue(':team_ID', $team_ID);
    $statement->execute();    
    $team = $statement->fetch();
    $statement->closeCursor();    
    $team_name = $team['teamName'];
    return $team_name;
}

function add_team($name) {
    global $db;
    $query = 'INSERT INTO teams (teamName)
              VALUES (:name)';
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->execute();
    $statement->closeCursor();    
}

function delete_team($team_ID) {
    global $db;
    $query = 'DELETE FROM teams
              WHERE team_ID = :team_ID';
    $statement = $db->prepare($query);
    $statement->bindValue(':team_ID', $team_ID);
    $statement->execute();
    $statement->closeCursor();
}
?>