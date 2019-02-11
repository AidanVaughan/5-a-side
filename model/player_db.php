<?php
function get_players() {
    global $db;
    $query = 'SELECT * FROM players
              ORDER BY player_id';
    $statement = $db->prepare($query);
    $statement->execute();
    $players = $statement->fetchAll();
    $statement->closeCursor();
    return $players;
}

function get_players_by_team($team_ID) {
    global $db;
    $query = 'SELECT * FROM players
              WHERE players.team_ID = :team_ID
              ORDER BY player_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":team_ID", $team_ID);
    $statement->execute();
    $players = $statement->fetchAll();
    $statement->closeCursor();
    return $players;
}

function get_player($player_id) {
    global $db;
    $query = 'SELECT * FROM players
              WHERE player_id = :player_id';
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
              WHERE player_id = :player_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':player_id', $player_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_player($team_ID, $player_name, $position) {
    global $db;
    $query = 'INSERT INTO players
                 (team_ID, player_name, position)
              VALUES
                 (:team_ID, :player_name, :position)';
    $statement = $db->prepare($query);
    $statement->bindValue(':team_ID', $team_ID);
    $statement->bindValue(':player_name', $player_name);
    $statement->bindValue(':position', $position);
    $statement->execute();
    $statement->closeCursor();
}

function update_player($player_id, $team_ID, $player_name, $position) {
    global $db;
    $query = 'UPDATE players
              SET team_ID = :team_ID,
                  player_name = :player_name,
                  position = :position,
               WHERE player_id = :player_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':team_ID', $team_ID);
    $statement->bindValue(':player_name', $player_name);
    $statement->bindValue(':position', $position);
    $statement->bindValue(':player_id', $player_id);
    $statement->execute();
    $statement->closeCursor();
}
?>