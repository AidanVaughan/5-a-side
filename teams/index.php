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
    $team_ID = filter_input(INPUT_GET, 'team_ID', 
            FILTER_VALIDATE_INT);
    if ($team_ID == NULL || $team_ID == FALSE) {
        $team_ID = 1;
    }
    $teams = get_teams();
    $team_name = get_team_name($team_ID);
    $players = get_players_by_team($team_ID);

    include('player_list.php');
} else if ($action == 'view_player') {
    $player_id = filter_input(INPUT_GET, 'player_id', 
            FILTER_VALIDATE_INT);   
    if ($player_id == NULL || $player_id == FALSE) {
        $error = 'Missing or incorrect player id.';
        include('../errors/error.php');
    } else {
        $teams = get_teams();
        $player = get_player($player_id);

        // Get player data
        $player_name = $player['player_name'];
        $name = $player['position'];
        $list_price = $player['listPrice'];

        // Calculate discounts
        $discount_percent = 30;  // 30% off for all web orders
        $discount_amount = round($list_price * ($discount_percent/100.0), 2);
        $unit_price = $list_price - $discount_amount;

        // Format the calculations
        $discount_amount_f = number_format($discount_amount, 2);
        $unit_price_f = number_format($unit_price, 2);

        // Get image URL and alternate text
        $image_filename = '../images/' . $player_name . '.png';
        $image_alt = 'Image: ' . $player_name . '.png';

        include('player_view.php');
    }
}
?>