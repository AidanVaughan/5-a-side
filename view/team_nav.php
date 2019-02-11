
        <nav>
            <ul>
                <!-- display links for all teams -->
                <?php foreach($teams as $team) : ?>
                <li>
                    <a href="?team_ID=<?php 
                              echo $team['team_ID']; ?>">
                        <?php echo $team['teamName']; ?>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </nav>

