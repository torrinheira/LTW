<?php function draw_manage_reservation($reservation, $title, $city) { ?>
    <section id="reservation_of_user">
        <li><?= $title?>, <?= $city?> [ <?=$reservation['arrival_date']?> to <?=$reservation['departure_date']?>] : <a href="../pages/show_property.php?id=<?=$reservation['property_id']?>">View property</a> | <a href="../pages/view_host.php?id=<?=$reservation['property_id']?>">View host</a> | <a href="../actions/action_cancel_reservation.php?id=<?=$reservation['id']?>">Cancel</a></li>
    </section>
<?php } ?>

<?php function draw_no_reservations() { ?>
    <section id="no_properties">
        You have no reservations made.
    </section>
<?php } ?>