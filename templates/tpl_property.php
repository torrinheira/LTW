<?php function draw_reservation($checkin, $checkout, $guests, $property_id) { ?>
    <section class="reservation_form">
        <form action="../actions/action_add_reservation.php" method="post">
            <input type="hidden" name="property_id" value="<?=$property_id?>">
            <div class="form_entry"><label>Check-in</label><input id="checkin" name="checkin" type="date" value="<?php echo date($checkin);?>"></div>
            <div class="form_entry"><label>Check-out</label><input id="checkout" name="checkout" type="date" value="<?php echo date($checkout);?>"></div>
            <div class="form_entry"><label>Guests</label><input name="guests" type="number" value="<?= $guests?>" min="1" max="20"></div>
            <div class="form_entry"><input class="button" type="submit" value="Confirm"></div>
        </form>
    </section>  
<?php } ?>


<?php function draw_property_list_item($image, $property, $checkin, $checkout, $guests) { ?>
    <li class="p_item">
        <?php if ($image != null) { ?>
        <img class="p_image" src="../images/t_small/<?=$image['image_id']?>.jpg" height="200" width="200">
        <?php } else { ?>
        <img class="p_image" src="../images/not_found.jpg" height="200" width="200">
        <?php } ?>
        <div class="p_info">
            <h3 class="p_title"><a href="./property.php?id=<?=$property['id']?>&checkin=<?=$checkin?>&checkout=<?=$checkout?>&guests=<?=$guests?>"><?=$property['title']?></a></h3>
            <p class="p_description"><i class="fas fa-info"></i><?=$property['description']?></p>
            <p class="p_address"><i class="fas fa-map-marker-alt"></i><?=$property['city']?>, <?=$property['address']?></p>
            <p class="p_price"><i class="fas fa-euro-sign"></i><?=$property['price']?></p>
            <p class="p_capacity"><i class="fas fa-users"></i><?=$property['capacity']?></p>
            <p class="p_owner"><i class="fas fa-id-badge"></i><a href="../pages/profile.php?username=<?=$property['owner']?>"><?=$property['owner']?></a></p>
        </div>
    </li>
<?php } ?>


<?php function draw_property_info($property, $images) { ?>
        <h1 class="p_title"><?=$property['title']?></h1>

        <!-- implementing slideshow here -->
        <div class="slideshow">
            <?php if ($images != null) { ?>
            <?php foreach ($images as $image) { ?>
            <div class="slide">
                <img src="../images/t_medium/<?=$image['image_id']?>.jpg" height="400">
            </div>
            <?php } ?>
            <?php } else { ?>
            <div class="slide">
                <img src="../images/not_found.jpg" height="400">
            </div>
            <?php } ?>

            <a class="prev">&#10094;</a>
            <a class="next">&#10095;</a>
            <div class="dots">
                <?php if ($images != null) { ?>
                <?php for ($i = 0; $i < sizeof($images); $i++) { ?>
                    <span class="dot"></span>
                <?php } ?>
                <?php } else { ?>
                    <span class="dot"></span>
                <?php } ?>
            </div>
        </div>
    <div class ="p_info">
        <p class="p_description"><i class="fas fa-info"></i><?= $property['description']?></p>
        <p class="p_address"><i class="fas fa-map-marker-alt"></i><?=$property['city']?>, <?=$property['address']?></p>
        <p class="p_price"><i class="fas fa-euro-sign"></i><?=$property['price']?></p>
        <p class="p_capacity"><i class="fas fa-users"></i><?= $property['capacity']?></p>
        <p class="p_owner"><i class="fas fa-id-badge"></i><a href="../pages/profile.php?username=<?=$property['owner']?>"><?=$property['owner']?></a></p>
    </div>
<?php } ?>

<?php function draw_no_found() { ?>
    <section id="no_results">
        <p> No property found for your search...</p>
    </section>
<?php } ?>


<?php function draw_manage_property($image, $user_property) { ?>
    <li class="property">
    <?php if ($image != null) { ?>    
        <img class="p_image" src="../images/t_small/<?=$image['image_id']?>.jpg" height="200">
    <?php } else { ?>
        <img class="p_image" src="../images/not_found.jpg" height="200">
    <?php } ?>
        <div class="p_info">
            <p class="p_title"><i class="fa fa-home icon"></i><?= $user_property['title']?></p>
            <p class="p_address"><i class="fa fa-map-marker icon"></i><?=$user_property['city']?>, <?=$user_property['address']?></p> 
            <div class="actions">
                <a class="button" href="../pages/property.php?id=<?=$user_property['id']?>">View property</a>
                <a class="button" href="../pages/edit_property.php?id=<?=$user_property['id']?>">Edit</a>
                <a class="button" href="../actions/action_delete_property.php?id=<?=$user_property['id']?>">Delete</a>
                <a class="button" href="../pages/property_reservations.php?id=<?=$user_property['id']?>">Reservations</a>
            </div>
        </div>
    </li>
<?php } ?>


<?php function draw_comments() { ?>
    <div class="comments">
        <h2><i class="fas fa-comment"></i>Comments</h2>
        <?php if (isset($_SESSION['username'])) { ?>
            <form class="comment_form">
                <textarea id="content" placeholder="What did you think of this property?" rows="5"></textarea>
                <input id="submit" type="button" value="Post" />
            </form>
        <?php } ?>
    </div>
<?php } ?>


<?php function draw_no_properties() { ?>
    <section id="no_properties">
        You have no properties.
    </section>
<?php } ?>
