<?php
require('../model/database.php');
require('../model/player_db.php');
require('../model/team_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_players';
    }
}

if ($action == 'list_players') {
    // Get the current team ID
    $team_ID = filter_input(INPUT_GET, 'team_ID', 
            FILTER_VALIDATE_INT);
    if ($team_ID == NULL || $team_ID == FALSE) {
        $team_ID = 1;
    }
    
    // Get player and team data
    $team_name = get_team_name($team_ID);
    $teams = get_teams();
    $players = get_players_by_team($team_ID);

    // Display the player list
    include('player_list.php');
} else if ($action == 'show_edit_form') {
    $player_id = filter_input(INPUT_POST, 'player_id', 
            FILTER_VALIDATE_INT);
    if ($player_id == NULL || $player_id == FALSE) {
        $error = "Missing or incorrect player id.";
        include('../errors/error.php');
    } else { 
        $player = get_player($player_id);
        include('player_edit.php');
    }
} else if ($action == 'update_player') {
    $player_id = filter_input(INPUT_POST, 'player_id', 
            FILTER_VALIDATE_INT);
    $team_ID = filter_input(INPUT_POST, 'team_ID', 
            FILTER_VALIDATE_INT);
    $player_name = filter_input(INPUT_POST, 'player_name');
    $position = filter_input(INPUT_POST, 'position');

    // Validate the inputs
    if ($player_id == NULL || $player_id == FALSE || $team_ID == NULL || 
            $team_ID == FALSE || $player_name == NULL || $position == NULL){
        $error = "Invalid player data. Check all fields and try again.";
        include('../errors/error.php');
    } else {
        update_player($player_id, $team_ID, $player_name, $position, $price);

        // Display the player List page for the current team
        header("Location: .?team_ID=$team_ID");
    }
} else if ($action == 'delete_player') {
    $player_id = filter_input(INPUT_POST, 'player_id', 
            FILTER_VALIDATE_INT);
    $team_ID = filter_input(INPUT_POST, 'team_ID', 
            FILTER_VALIDATE_INT);
    if ($team_ID == NULL || $team_ID == FALSE ||
            $player_id == NULL || $player_id == FALSE) {
        $error = "Missing or incorrect player id or team id.";
        include('../errors/error.php');
    } else { 
        delete_player($player_id);
        header("Location: .?team_ID=$team_ID");
    }
} else if ($action == 'show_add_form') {
    $teams = get_teams();
    include('player_add.php');
} else if ($action == 'add_player') {
    $team_ID = filter_input(INPUT_POST, 'team_ID', 
            FILTER_VALIDATE_INT);
    $player_name = filter_input(INPUT_POST, 'player_name');
    $position = filter_input(INPUT_POST, 'position');
    $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
    if ($team_ID == NULL || $team_ID == FALSE || $player_name == NULL || 
            $position == NULL) {
        $error = "Invalid player data. Check all fields and try again.";
        include('../errors/error.php');
    } else { 
        add_player($team_ID, $player_name, $position, $price);
        header("Location: .?team_ID=$team_ID");
    }
} else if ($action == 'list_teams') {
    $teams = get_teams();
    include('team_list.php');
} else if ($action == 'add_team') {
    $position = filter_input(INPUT_POST, 'position');

    // Validate inputs
    if ($name == NULL) {
        $error = "Invalid team name. Check name and try again.";
        include('../errors/error.php');
    } else {
        add_team($name);
        header('Location: .?action=list_teams');  // display the team List page
    }
} else if ($action == 'delete_team') {
    $team_ID = filter_input(INPUT_POST, 'team_ID', 
            FILTER_VALIDATE_INT);
    delete_team($team_ID);
    header('Location: .?action=list_teams');      // display the team List page
}
?>