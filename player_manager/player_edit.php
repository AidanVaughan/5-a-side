<?php include '../view/header.php'; ?>
<main>
    <h1>Edit player</h1>
    <form action="index.php" method="post" id="add_player_form">

        <input type="hidden" name="action" value="update_player">

        <input type="hidden" name="player_id"
               value="<?php echo $player['player_id']; ?>">

        <label>team ID:</label>
        <input type="team_ID" name="team_ID"
               value="<?php echo $player['team_ID']; ?>">
        <br>

        <label>player_name:</label>
        <input type="input" name="player_name"
               value="<?php echo $player['player_name']; ?>">
        <br>

        <label>Name:</label>
        <input type="input" name="name"
               value="<?php echo $player['position']; ?>">
        <br>

        

        <label>&nbsp;</label>
        <input type="submit" value="Save Changes">
        <br>
    </form>
    <p><a href="index.php?action=list_players">View player List</a></p>

</main>
<?php include '../view/footer.php'; ?>