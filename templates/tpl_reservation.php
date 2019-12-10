<?php function draw_manage_reservation($reservation, $title, $city, $owner) { ?>
    <section id="reservation_of_user">
        <li><?= $title?>, <?= $city?> [ <?=$reservation['arrival_date']?> to <?=$reservation['departure_date']?>] : <a href="../pages/show_property.php?id=<?=$reservation['property_id']?>">View property</a> | <a href="../pages/profile.php?username=<?=$owner?>">View host</a> | <a href="../actions/action_cancel_reservation.php?id=<?=$reservation['id']?>">Cancel</a></li>
    </section>
<?php } ?>

<?php function draw_no_reservations() { ?>
    <section id="no_properties">
        You have no reservations made.
    </section>
<?php } ?>





<?php function draw_no_property_reservations() { ?>
    <section id="no_properties_reservations">
        <li>There are no reservations.</li>
    </section>
<?php } ?>


<?php function draw_current_previous($reservation) { ?>
            <li><a href="../pages/profile.php?username=<?=$reservation['tourist']?>"><?= $reservation['tourist']?></a>, [ <?= $reservation['arrival_date']?> to <?=$reservation['departure_date']?>] </li>
<?php } ?>


<?php function draw_upcoming($reservation) { ?>
    <li><a href="../pages/profile.php?username=<?=$reservation['tourist']?>"><?= $reservation['tourist']?></a>, [ <?= $reservation['arrival_date']?> to <?=$reservation['departure_date']?>] : <a href="../actions/action_cancel_reservation.php?id=<?=$reservation['id']?>">Cancel</a></li>
<?php } ?>