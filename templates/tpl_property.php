<?php function draw_reservation($checkin, $checkout, $guests, $property_id) { ?>
    <section class="reservation_form">
        <form action="../actions/action_add_reservation.php" method="post">
            <input type = "hidden" name = "property_id" value="<?=$property_id?>">
            <label>Check-in<input id="checkin" name="checkin" type="date" value="<?php echo date($checkin);?>"></label>
            <label>Check-out<input id="checkout" name="checkout" type="date" value="<?php echo date($checkout);?>"></label>
            <label>Guests<input name="guests" type="number" value="<?= $guests?>" min="1" max="20"></label>
            <input type="submit" value="Confirm">
        </form>
    </section>  
<?php } ?>


<?php function draw_property_list_item($property, $checkin, $checkout, $guests) { ?>
    <li>
        <p> - - - - - - - - - - - - - - - - - - - - - - - - - - - </p>
        <!-- TODO: remove the id field, it is only temporary for testing purposes -->
        <h3>Property ID: <?= $property['id']?></h3> 
        <h4 class="pl_title"><a href="./property.php?id=<?=$property['id']?>&checkin=<?=$checkin?>&checkout=<?=$checkout?>&guests=<?=$guests?>">Title: <?=$property['title']?></a></h4>
        <h5 class="pl_price">Price: <?=$property['price']?></h5>
        <h5 class="pl_owner"><a href="../pages/profile.php?username=<?=$property['owner']?>">Owner: <?=$property['owner']?></a></h5>
        <p> - - - - - - - - - - - - - - - - - - - - - - - - - - - </p>
    </li>
<?php } ?>


<?php function draw_property_info($property, $images) { ?>
        <h1 class="p_title"><?=$property['title']?></h1>

        <!-- implementing slideshow here -->
        <?php if ($images != null) { ?>
        <div class="slideshow">
            <?php foreach ($images as $image) { ?>
            <div class="slide">
                <img src="../images/t_medium/<?=$image['image_id']?>.jpg" height="400">
            </div>
            <?php } ?>

            <a class="prev">&#10094;</a>
            <a class="next">&#10095;</a>
            <div class="dots">
                <?php for ($i = 0; $i < sizeof($images); $i++) { ?>
                    <span class="dot"></span>
                <?php } ?>
            </div>
        </div>
        <?php } ?>
    <div class ="info">
        <h2>Info</h2>
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


<?php function draw_manage_property($user_property) { ?>
    <section id="property_of_user">
        <li><?= $user_property['title']?>, <?= $user_property['city']?> : <a href="../pages/edit_property.php?id=<?=$user_property['id']?>">Edit</a> | <a href="../actions/action_delete_property.php?id=<?=$user_property['id']?>">Delete</a> | <a href="../pages/property_reservations.php?id=<?=$user_property['id']?>">Reservations</a> </li>
    </section>
<?php } ?>


<?php function draw_comments() { ?>
    <div class="comments">
        <h2><i class="fas fa-comment"></i>Comments</h2>
        <?php if (isset($_SESSION['username'])) { ?>
        <form id="comment_form">
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
