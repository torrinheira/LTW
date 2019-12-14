<?php function draw_profile($profile) { ?>
    <section id=profile>
        <?php draw_profile_info($profile); ?>
    </section>
<?php } ?>


<?php function draw_profile_info($profile) { ?>
    <section id="info">

        <div class="profile_image">
            <img src="../images/t_medium/<?=$profile['image']?>.jpg" width="400" height="400">
        </div>
        
        <div class="main_info">
            <p><i class="fa fa-user-circle icon"></i><?=$profile['username']?></p>
            <p><i class="fa fa-arrow-circle-right icon"></i><?=$profile['first_name'] . ' ' . $profile['last_name']?></p>
            <p><i class="fa fa-envelope icon"></i><?=$profile['email']?></p>

            <?php if ($profile['description'] != null) { ?>
                <p><i class="fa fa-info-circle icon"></i> <?=$profile['description']?></p>
            <?php } ?>
        </div>

        <hr>

        <?php if ($profile['username'] == $_SESSION['username']) { ?>
            <div class = "profile_edit"><a class="button" href="./edit_profile.php">Edit profile</a></div>
        <?php } ?>
            
    </section>

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

