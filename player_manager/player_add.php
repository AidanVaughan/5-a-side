<?php include '../view/header.php'; ?>
<main>
    <h1>Add player</h1>
    <form action="index.php" method="post" id="add_player_form">
        <input type="hidden" name="action" value="add_player">

        <label>team:</label>
        <select name="team_ID">
        <?php foreach ( $teams as $team ) : ?>
            <option value="<?php echo $team['team_ID']; ?>">
                <?php echo $team['teamName']; ?>
            </option>
        <?php endforeach; ?>
        </select>
        <br>

        <label>player_name:</label>
        <input type="input" name="Player Name">
        <br>

        <label>Name:</label>
        <input type="input" name="Position">
        <br>

        

        <label>&nbsp;</label>
        <input type="submit" value="Add player">
        <br>
    </form>
    <p class="last_paragraph">
        <a href="index.php?action=list_players">View player List</a>
    </p>

</main>
<?php include '../view/footer.php'; ?>