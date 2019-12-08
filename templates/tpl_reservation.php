<?php function draw_manage_reservation($reservation, $title, $city) { ?>
    <section id="reservation_of_user">
        <li><?= $title?>, <?= $city?> [ <?=$reservation['arrival_date']?> to <?=$reservation['departure_date']?>] : <a href="../pages/show_property.php?id=<?=$reservation['property_id']?>">View property</a> | <a href="../pages/view_host.php?id=<?=$reservation['property_id']?>">View host</a> | <a href="../index.php?id=<?=$reservation['property_id']?>">Cancel</a> | <a href="../index.php?id=<?=$reservation['property_id']?>">Edit </a> </li>
    </section>
<?php } ?>