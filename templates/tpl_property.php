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