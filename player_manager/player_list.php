<?php include '../view/header.php'; ?>
<main>

    <h1>Player List</h1>

    <aside>
        <!-- display a list of teams -->
        <h2>Teams</h2>
        <?php include '../view/team_nav.php'; ?>        
    </aside>

    <section>
        <!-- display a table of players -->
        <h2><?php echo $team_name; ?></h2>
        <table>
            <tr>
                <th>Position</th>
                <th>Name</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($players as $player) : ?>
            <tr>
                <td><?php echo $player['playerPosition']; ?></td>
                <td><?php echo $player['playerName']; ?></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="show_edit_form">
                    <input type="hidden" name="player_id"
                           value="<?php echo $player['playerID']; ?>">
                    <input type="hidden" name="team_id"
                           value="<?php echo $player['teamID']; ?>">
                    <input type="submit" value="Edit">
                </form></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="delete_player">
                    <input type="hidden" name="player_id"
                           value="<?php echo $player['playerID']; ?>">
                    <input type="hidden" name="team_id"
                           value="<?php echo $player['teamID']; ?>">
                    <input type="submit" value="Delete">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p><a href="?action=show_add_form">Add Player</a></p>
        <p><a href="?action=list_teams">List Teams</a></p>
    </section>

</main>
<?php include '../view/footer.php'; ?>