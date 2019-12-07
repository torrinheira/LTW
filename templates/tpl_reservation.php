<?php function draw_manage_reservation($reservation, $title, $city) { ?>
    <section id="reservation_of_user">
        <li><?= $title?>, <?= $city?> [ <?=$reservation['arrival_date']?> to <?=$reservation['departure_date']?>] : <a href="../pages/edit_property.php?id=<?=$user_property['id']?>">View property</a> | <a href="../actions/action_delete_property.php?id=<?=$user_property['id']?>">View host</a> | <a href="../actions/action_delete_property.php?id=<?=$user_property['id']?>">Cancel</a> | <a href="../actions/action_delete_property.php?id=<?=$user_property['id']?>">Edit </a> </li>
    </section>
<?php } ?>