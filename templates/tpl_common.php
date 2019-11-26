<?php

/**
 * Draws header for all pages
 */
function draw_header() { ?>
    <header>
        <img src="../images/logo.png" width="130" height="80" alt="Place Genie Logo">
        <ul>
            <li><a href="../pages/signup.php">Sign up</a></li>
            <li><a href="../pages/login.php">Log in</a></li>
        </ul>
    </header>
<?php }

/**
 * Draws the search form
 */
function draw_search() { ?>
    <section id="search">
        <!-- TODO: set the action correctly -->
        <form action="action_search.php" method="get">
                <label>Where<input type="search" placeholder="Your dreams"></label>
                <label>Check-in<input id="check-in" type="date" value="<?php echo date('Y-m-d');?>"></label>
                <label>Check-out<input id="check-out" type="date" value="<?php echo date('Y-m-d', strtotime('tomorrow'));?>"></label>
                <label>Guests<input type="number" value="1" min="1" max="20"></label>
                <input type="submit" value="Make a wish">
        </form>
    </section>
<?php }


/**
 * Draws footer for all pages
 */
function draw_footer() { ?>
    <footer>
        <p>&copy; Place Genie, LTW-2019</p>
        <p>Bernardo Santos, Margarida Cosme, Vítor Gonçalves</p>
    </footer>
<?php } ?>
