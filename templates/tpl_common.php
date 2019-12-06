<?php


    /**
     * Draws header for all pages
     */
    function draw_header() { ?>
        
        <header>
            <a href="../index.php"><img src="../images/logo.png" width="130" height="80" alt="Place Genie Logo"></a>
            <nav>
                <ul>
                    <?php if (isset($_SESSION['username'])) { ?>
                        <li><a href="../pages/profile.php?username=<?=$_SESSION['username']?>"><?=$_SESSION['username']?></a></li>
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
            <form action="../pages/search.php" method="get">
                <label>Where<input type="search" name ="city" placeholder="Your dreams"></label>
                <label>Check-in<input name="checkin" type="date" value="<?php echo date('Y-m-d');?>"></label>
                <label>Check-out<input name="checkout" type="date" value="<?php echo date('Y-m-d', strtotime('tomorrow'));?>"></label>
                <label>Guests<input name="guests" type="number" value="1" min="1" max="20"></label>
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
