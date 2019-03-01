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
    $team_id = filter_input(INPUT_GET, 'team_id', 
            FILTER_VALIDATE_INT);
    if ($team_id == NULL || $team_id == FALSE) {
        $team_id = 1;
    }
    
    // Get player and team data
    $team_name = get_team_name($team_id);
    $teams = get_teams();
    $players = get_players_by_team($team_id);

    // Display the player list
    include('player_list.php');
} else if ($action == 'show_edit_form') {
    $player_id = filter_input(INPUT_POST, 'player_id', 
            FILTER_VALIDATE_INT);
    if ($player_id == NULL || $player_id == FALSE) {
        $error = "Missing or incorrect player id. This player could not be found";
        include('../errors/error.php');
    } else { 
        $player = get_player($player_id);
        include('player_edit.php');
    }
} else if ($action == 'update_player') {
    $player_id = filter_input(INPUT_POST, 'player_id', 
            FILTER_VALIDATE_INT);
    $team_id = filter_input(INPUT_POST, 'team_id', 
            FILTER_VALIDATE_INT);
    $position = filter_input(INPUT_POST, 'Position');
    $name = filter_input(INPUT_POST, 'name');
   

    // Validate the inputs
    if ($player_id == NULL || $player_id == FALSE) {
        $error = "Invalid player data. Check player id field and try again.";
        include('../errors/error.php');
    }else if($team_id == NULL || $team_id == FALSE){
        $error = "Invalid player data. Check team field and try again. ";
        include('../errors/error.php');
    }else if($position == NULL){
        $error = "Invalid player data. Check position field and try again.";
        include('../errors/error.php');
    }else if($name == NULL){
        $error = "Invalid player data. Check Name field and try again.";
        include('../errors/error.php');
    }else {
        update_player($player_id, $team_id, $position, $name);

        // Display the Player List page for the current team
        header("Location: .?team_id=$team_id");
    }
} else if ($action == 'delete_player') {
    $player_id = filter_input(INPUT_POST, 'player_id', 
            FILTER_VALIDATE_INT);
    $team_id = filter_input(INPUT_POST, 'team_id', 
            FILTER_VALIDATE_INT);
    if ($player_id == NULL || $player_id == FALSE) {
        $error = "Missing or incorrect player id";
        include('../errors/error.php');
    }else if($team_id == NULL || $team_id == FALSE){
        $error = "Invalid player data. Check team field and try again. ";
        include('../errors/error.php');
    } else { 
        delete_player($player_id);
        header("Location: .?team_id=$team_id");
    }
} else if ($action == 'show_add_form') {
    $teams = get_teams();
    include('player_add.php');
} else if ($action == 'add_player') {
    $team_id = filter_input(INPUT_POST, 'team_id', 
            FILTER_VALIDATE_INT);
    $position = filter_input(INPUT_POST, 'position');
    $name = filter_input(INPUT_POST, 'name');
    if ($team_id == NULL || $team_id == FALSE || $position == NULL || 
            $name == NULL) {
        $error = "Invalid player data. Check all fields and try again.";
        include('../errors/error.php');
    } else { 
        add_player($team_id, $position, $name);
        header("Location: .?team_id=$team_id");
    }
} else if ($action == 'list_teams') {
    $teams = get_teams();
    include('team_list.php');
} else if ($action == 'add_team') {
    $name = filter_input(INPUT_POST, 'name');

    // Validate inputs
    if ($name == NULL) {
        $error = "Invalid team name. Check name and try again.";
        include('../errors/error.php');
    } else {
        add_team($name);
        header('Location: .?action=list_teams');  // display the Category List page
    }
} else if ($action == 'delete_team') {
    $team_id = filter_input(INPUT_POST, 'team_id', 
            FILTER_VALIDATE_INT);
    delete_playerForTeam($team_id);
    delete_team($team_id);
    header('Location: .?action=list_teams');      // display the Category List page
    
    
}else if($action == 'clearTeam'){
    $team_id = filter_input(INPUT_POST, 'team_id', 
            FILTER_VALIDATE_INT);
    delete_playerForTeam($team_id);
    header('Location: .?action=list_teams');
}

?>