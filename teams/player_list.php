<?php include '../view/header.php'; ?>
<main>
    <aside>
        <!-- display a list of teams -->
        <h2>teams</h2>
        <?php include '../view/team_nav.php'; ?>        
    </aside>
    <section>
        <h1><?php echo $team_name; ?></h1>
        <ul class="nav">
            <!-- display links for players in selected team -->
            <?php foreach ($players as $player) : ?>
            <li>
                <a href="?action=view_player&amp;player_id=<?php 
                          echo $player['player_id']; ?>">
                    <?php echo $player['position']; ?>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
    </section>
</main>
<?php include '../view/footer.php'; ?>