<?php
function get_teams() {
    global $db;
    $query = 'SELECT * FROM teams
              ORDER BY teamID';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement; 
}

function get_team_name($team_id) {
    global $db;
    $query = 'SELECT * FROM teams
              WHERE teamID = :team_id';    
    $statement = $db->prepare($query);
    $statement->bindValue(':team_id', $team_id);
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

function delete_team($team_id) {
    global $db;
    $query = 'DELETE FROM teams
              WHERE teamID = :team_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':team_id', $team_id);
    $statement->execute();
    $statement->closeCursor();
}
?>