<?php include '../view/header.php'; ?>
<main>
    <h1>Edit Product</h1>
    <form action="index.php" method="post" id="add_player_form">

        <input type="hidden" name="action" value="update_player">

        <input type="hidden" name="player_id"
               value="<?php echo $player['playerID']; ?>">

        <label>Team ID:</label>
        <input type="team_id" name="team_id"
               value="<?php echo $player['teamID']; ?>">
        <br>

        <label>Position:</label>
        <input type="input" name="Position"
               value="<?php echo $player['playerPosition']; ?>">
        <br>

        <label>Name:</label>
        <input type="input" name="name"
               value="<?php echo $player['playerName']; ?>">
        <br>

        

        <label>&nbsp;</label>
        <input type="submit" value="Save Changes">
        <br>
    </form>
    <p><a href="index.php?action=list_players">View Player List</a></p>

</main>
<?php include '../view/footer.php'; ?>