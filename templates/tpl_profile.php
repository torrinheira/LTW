<?php function draw_profile($profile) { ?>
    <section id=profile>
        <?php draw_profile_info($profile); ?>
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
        <p><a href="./edit_profile.php">Edit profile</a></p>
    <?php } ?>

<?php } ?>

<?php function draw_host_info($profile) { ?>
    <section id=host_information>
        <p><label id="host_username"> Username: <?= $profile['username']?></label></p>
        <p><label id="host_first_last_name">Name: <?= $profile['first_name']?> <?= $profile['last_name']?></label></p>
        <p><label id="host_email">Email: <?=$profile['email']?> </label></p>
        <p><label id="host_description">Description: <?=$profile['description']?></label></p>
        <!--TODO: fazer display da imagem-->
    </section>
<?php } ?>

