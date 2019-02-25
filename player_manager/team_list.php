<?php include '../view/header.php'; ?>
<main>

    <h1>Team List</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>Delete</th>
            <th>Remove Players</th>
        </tr>
        <?php foreach ($teams as $team) : ?>
        <tr>
            <td><?php echo $team['teamName']; ?></td>
            <td>
                <form id="delete_player_form"
                      action="index.php" method="post">
                    <input type="hidden" name="action" value="delete_team">
                    <input type="hidden" name="team_id"
                           value="<?php echo $team['teamID']; ?>">
                    <input type="submit" value="Delete">
                    
                </form>
            </td>
            <td>
                <form id="clearTeam" action="index.php" method="post">
                <input type="hidden" name="action" value="clearTeam">
                  <input type="hidden" name="team_id"
                           value="<?php echo $team['teamID']; ?>">
                 <input type="submit" value="Clear Team">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <br />

    <h2>Add Team</h2>
    <form id="add_team_form"
          action="index.php" method="post">
        <input type="hidden" name="action" value="add_team">

        <label>Name:</label>
        <input type="input" name="name">
        <input type="submit" value="Add">
    </form>

    <p><a href="index.php?action=list_players">List Players</a></p>

</main>
<?php include '../view/footer.php'; ?>