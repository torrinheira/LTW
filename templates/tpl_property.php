<?php function draw_reservation($checkin, $checkout, $guests, $property_id) { ?>
    <section id="reservation_form">
        <form action="../actions/action_add_reservation.php" method="post">
            <input type = "hidden" name = "property_id" value="<?=$property_id?>">
            <label>Check-in<input name="checkin" type="date" value="<?php echo date($checkin);?>"></label>
            <label>Check-out<input name="checkout" type="date" value="<?php echo date($checkout);?>"></label>
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


<?php function draw_property_info($property) { ?>
    <section class = info_property>
        <!-- TODO: remove the id field, it is only temporary for testing purposes -->
        <h3>Property ID: <?= $property['id']?></h3> 
        <h4 class="p_title">Title: <?= $property['title']?> </h4>
        <h5 class="p_price">Price per night: <?= $property['price']?> </h5>
        <h5 class="p_city">City:<?= $property['city']?> </h5>
        <h5 class="p_address">Address: <?= $property['address']?> </h5>
        <h5 class="p_description">Description: <?= $property['description']?> </h5>
        <h5 class="p_capacity">Max capacity: <?= $property['capacity']?> </h5>
        <h5 class="p_owner"><a href="../pages/profile.php?username=<?=$property['owner']?>">Owner: <?=$property['owner']?></a></h5>
    </section>
<?php } ?>

<!-- TODO: acho que esta função ja nao faz nada aqui(apagar mais tarde)-->
<?php function draw_property_info_resumed($property) { ?>
    <section class = info_property>
        <!-- TODO: remove the id field, it is only temporary for testing purposes -->
        <h4 class="p_title">Title: <?= $property['title']?> </h4>
        <h5 class="p_price">Price per night: <?= $property['price']?> </h5>
        <h5 class="p_city">City:<?= $property['city']?> </h5>
        <h5 class="p_address">Address: <?= $property['address']?> </h5>
        <h5 class="p_description">Description: <?= $property['description']?> </h5>
        <h5 class="p_capacity">Max capacity: <?= $property['capacity']?> </h5>
    </section>
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
    <section id="comments">
        <header>Comments</header>
        <?php if (isset($_SESSION['username'])) { ?>
        <form id="comment_form">
            <textarea id="content" placeholder="What did you think of this property?" rows="5"></textarea>
            <input id="submit" type="button" value="Post" />
        </form>
        <?php } ?>
    </section>
<?php } ?>


<?php function draw_no_properties() { ?>
    <section id="no_properties">
        You have no properties.
    </section>
<?php } ?>
