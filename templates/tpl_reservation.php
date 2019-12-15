<?php function draw_no_reservations() { ?>
    <li>You have no reservations made.</li>
<?php } ?>

<?php function draw_no_property_reservations() { ?>
    <li>There are no reservations.</li>
<?php } ?>


<?php function draw_current_previous($reservation) { ?>
    <li>
        <p><i class="fa fa-user"></i><a href="../pages/profile.php?username=<?=$reservation['tourist']?>"><?=$reservation['tourist']?></a></p>
        <p><i class="fa fa-calendar"></i><?= $reservation['arrival_date']?> to <?=$reservation['departure_date']?></p>
    </li>
<?php } ?>


<?php function draw_upcoming($reservation) { ?>
    <li>
        <p><i class="fa fa-user"></i><a href="../pages/profile.php?username=<?=$reservation['tourist']?>"><?= $reservation['tourist']?></a></p>
        <p><i class="fa fa-calendar"></i>  <?= $reservation['arrival_date']?> to <?=$reservation['departure_date']?></p>   
        <p><a class="button" href="../actions/action_cancel_reservation.php?id=<?=$reservation['id']?>">Cancel</a></p>
    </li>
<?php } ?>


<!-- draw user reservations -->
<?php function draw_user_current_previous($reservation, $title, $city, $owner) { ?>
    <li>
        <p><i class="fa fa-home"></i><?= $title?></p>
        <p><i class="fa fa-map-marker"></i><?= $city?></p>
        <p><i class="fa fa-calendar"></i><?=$reservation['arrival_date']?> to <?=$reservation['departure_date']?></p>
        <p><a class="button" href="../pages/property.php?id=<?=$reservation['property_id']?>">Property</a></p>
        <p><a class="button" href="../pages/profile.php?username=<?=$owner?>">Host</a></p>
    </li>
<?php } ?>

<?php function draw_user_upcoming($reservation, $title, $city, $owner) { ?>
    <li>
        <p><i class="fa fa-home"></i><?= $title?></p>
        <p><i class="fa fa-map-marker"></i><?= $city?></p>
        <p><i class="fa fa-calendar"></i><?=$reservation['arrival_date']?> to <?=$reservation['departure_date']?></p>
        <p><a class="button" href="../pages/property.php?id=<?=$reservation['property_id']?>">Property</a></p>
        <p><a class="button" href="../pages/profile.php?username=<?=$owner?>">Host</a></p>
        <p><a class="button" href="../actions/action_cancel_reservation.php?id=<?=$reservation['id']?>">Cancel</a></p>
    </li>

<?php } ?>
