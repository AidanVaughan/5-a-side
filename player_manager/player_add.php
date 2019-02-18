<?php include '../view/header.php'; ?>
<main>
    <h1>Add Player</h1>
    <form action="index.php" method="post" id="add_player_form">
        <input type="hidden" name="action" value="add_player">

        <label>Category:</label>
        <select name="team_id">
        <?php foreach ( $teams as $team ) : ?>
            <option value="<?php echo $team['teamID']; ?>">
                <?php echo $team['teamName']; ?>
            </option>
        <?php endforeach; ?>
        </select>
        <br>

        <label>Position:</label>
        <input type="input" name="position">
        <br>

        <label>Name:</label>
        <input type="input" name="name">
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Add Player">
        <br>
    </form>
    <p class="last_paragraph">
        <a href="index.php?action=list_players">View Player List</a>
    </p>

</main>
<?php include '../view/footer.php'; ?>