<?php include '../view/header.php'; ?>
<main>

    <h1>team List</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($teams as $team) : ?>
        <tr>
            <td><?php echo $team['teamName']; ?></td>
            <td>
                <form id="delete_player_form"
                      action="index.php" method="post">
                    <input type="hidden" name="action" value="delete_team">
                    <input type="hidden" name="team_ID"
                           value="<?php echo $team['team_ID']; ?>">
                    <input type="submit" value="Delete">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <br />

    <h2>Add team</h2>
    <form id="add_team_form"
          action="index.php" method="post">
        <input type="hidden" name="action" value="add_team">

        <label>Name:</label>
        <input type="input" name="name">
        <input type="submit" value="Add">
    </form>

    <p><a href="index.php?action=list_players">List players</a></p>

</main>
<?php include '../view/footer.php'; ?>