<?php

    function draw_reservation($checkin, $checkout, $numberguests) {?>
        <section id="reservation_form">
            <form action="../actions/action_add_reservation.php" method="post">
                <label>Check-in<input name="checkin" type="date" value="<?php echo date($checkin);?>"></label>
                <label>Check-out<input name="checkout" type="date" value="<?php echo date($checkout);?>"></label>
                <label>Guests<input name="guests" type="number" value="<?= $numberguests?>" min="1" max="20"></label>
                <input type="submit" value="Confirm">
            </form>
        </section>  
    <?php
    }
?>


<?php
    function draw_property_list_item($property, $owner, $checkin, $checkout, $guests){ ?>

    <li>
        <a href="./property.php?id=<?=$property['id']?>&checkin=<?=$checkin?>&checkout=<?=$checkout?>&guests=<?=$guests?>">
        <p> - - - - - - - - - - - - - - - - - - - - - - - - - - - </p>
            <!-- TODO: remove the id field, it is only temporary for testing purposes -->
            <h3>Property ID: <?= $property['id']?></h3> 
            <h4 class="pl_title">Title: <?=$property['title']?></h4>
            <h5 class="pl_price">Price: <?=$property['price']?></h5>
            <h5 class="pl_owner"><a href="../pages/profile.php?username=<?=$owner?>">Owner: <?=$owner?></a></h5>
        <p> - - - - - - - - - - - - - - - - - - - - - - - - - - - </p>
        </a>
    </li>
    
<?php
    }
?>