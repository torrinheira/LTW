<?php

    include_once('../debug/debug.php');


    /**
     * Draws header for all pages
     */
    function draw_header() { ?>
        
        <header>
            <img src="../images/logo.png" width="130" height="80" alt="Place Genie Logo">
            <nav>
                <ul>
                    <?php console_log($_SESSION['username']);
                    if (isset($_SESSION['username'])) {
                        console_log($_SESSION['username']);
                    } else {
                        console_log('poh caralho');
                    } ?>
                    <?php if (isset($_SESSION['username'])) { ?>
                        <li><?=$_SESSION['username']?></li>
                        <li><a href="../actions/action_logout.php">Logout</a></li>
                    <?php } else { ?>
                        <li><a href="../pages/signup.php">Sign up</a></li>
                        <li><a href="../pages/login.php">Log in</a></li>
                    <?php } ?>
                </ul>
            </nav>
        </header>

        <?php if (isset($_SESSION['messages'])) { ?>
            <section id="messages">
                <?php foreach($_SESSION['messages'] as $message) { ?>
                    <div class="<?=$message['type']?>">
                        <?=$message['content']?>
                    </div>
                <?php } ?>
            </section>
        <?php unset($_SESSION['messages']); } ?>

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
    <?php } 

?>
