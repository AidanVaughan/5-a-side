<?php
function get_players() {
    global $db;
    $query = 'SELECT * FROM players
              ORDER BY playerID';
    $statement = $db->prepare($query);
    $statement->execute();
    $players = $statement->fetchAll();
    $statement->closeCursor();
    return $players;
}

function get_players_by_team($team_id) {
    global $db;
    $query = 'SELECT * FROM players
              WHERE players.teamID = :team_id
              ORDER BY playerID';
    $statement = $db->prepare($query);
    $statement->bindValue(":team_id", $team_id);
    $statement->execute();
    $players = $statement->fetchAll();
    $statement->closeCursor();
    return $players;
}

function get_player($player_id) {
    global $db;
    $query = 'SELECT * FROM players
              WHERE playerID = :player_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":player_id", $player_id);
    $statement->execute();
    $player = $statement->fetch();
    $statement->closeCursor();
    return $player;
}

function delete_player($player_id) {
    global $db;
    $query = 'DELETE FROM players
              WHERE playerID = :player_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':player_id', $player_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_player($team_id, $position, $name) {
    global $db;
    $query = 'INSERT INTO players
                 (teamID, playerPosition, playerName)
              VALUES
                 (:team_id, :position, :name)';
    $statement = $db->prepare($query);
    $statement->bindValue(':team_id', $team_id);
    $statement->bindValue(':position', $position);
    $statement->bindValue(':name', $name);
    $statement->execute();
    $statement->closeCursor();
}

function update_player($player_id, $team_id, $position, $name) {
    global $db;
    $query = 'UPDATE players
              SET teamID = :team_id,
                  playerposition = :position,
                  playerName = :name
               WHERE playerID = :player_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':team_id', $team_id);
    $statement->bindValue(':position', $position);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':player_id', $player_id);
    $statement->execute();
    $statement->closeCursor();
}

function delete_playerForTeam($team_id) {
    global $db;
    $query = 'DELETE FROM players
              WHERE teamID = :team_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':team_id', $team_id);
    $statement->execute();
    $statement->closeCursor();
}
?>