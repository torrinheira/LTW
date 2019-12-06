<?php function draw_profile($profile, $comments) { ?>
    <section id=profile>
        <?php draw_profile_info($profile); ?>
        <?php draw_profile_comments($comments); ?>
    </section>
<?php } ?>


<?php function draw_profile_info($profile) { ?>
    <section id="info">
        <img src="../images/t_medium/<?=$profile['image']?>.jpg" width="400" height="400">

        <p><?=$profile['username']?></p>
        <p><?=$profile['first_name'] . ' ' . $profile['last_name']?></p>
        <p><?=$profile['email']?></p>

        <?php if ($profile['description'] != null) { ?>
            <p><?=$profile['description']?></p>
        <?php } ?>
    </section>

    <?php if ($profile['username'] == $_SESSION['username']) { ?>
        <a href="./edit_profile.php">Edit profile</a>
        <a href="./add_property.php">Add property</a>
    <?php } ?>
<?php } ?>


<?php function draw_profile_comments($comments) { ?>


<?php } ?>
