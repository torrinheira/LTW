<?php function draw_header() { ?>
    <header>
        <section id="menu">
            <a href="../index.php"><img src="../images/logo.png" width="130" height="80" alt="Place Genie Logo"></a>
            <nav>
                <input type="checkbox" id="hamburger" />
                <label class="hamburger" for="hamburger"></label>
                <ul>
                    <?php if (isset($_SESSION['username'])) { ?>
                        <li><a href="../pages/manage_reservations.php">Reservations</a></li>
                        <li><a href="../pages/manage_properties.php">Properties</a></li>
                        <li><a href="../pages/profile.php?username=<?=$_SESSION['username']?>"><?=$_SESSION['username']?></a></li>
                        <li><a href="../actions/action_logout.php">Logout</a></li>
                    <?php } else { ?>
                        <li><input class="login" type="button" value="Log in"/></li>
                        <li><input class="signup" type="button" value="Sign up"/></li>
                    <?php } ?>
                </ul>
            </nav>
        </section>

        <?php if (isset($_SESSION['messages'])) { ?>
            <section id="messages">
                <?php foreach($_SESSION['messages'] as $message) { ?>
                    <div class="<?=$message['type']?>">
                        <?=$message['content']?>
                    </div>
                <?php } ?>
            </section>
        <?php unset($_SESSION['messages']); } ?>
    </header>
<?php } ?>


<?php function draw_search() { ?>
    <section id="search">
        <form action="../pages/search.php" method="get">
            <label>Where<input type="search" name ="city" placeholder="Your dreams"></label>
            <label>Check-in<input id="checkin" name="checkin" type="date" value="<?php echo date('Y-m-d');?>"></label>
            <label>Check-out<input id="checkout" name="checkout" type="date" value="<?php echo date('Y-m-d', strtotime('tomorrow'));?>"></label>
            <label>Guests<input name="guests" type="number" value="1" min="1" max="20"></label>
            <label>Min Price<input name="minprice" type="number" value="1" min="1" max="50000"></label>
            <label>Max Price<input name="maxprice" type="number" value="500" min="1" max="50000"></label>
            <input type="submit" value="Make a wish">
        </form>
    </section>
<?php } ?>


<?php function draw_footer() { ?>
    <footer>
        <p>&copy; Place Genie, LTW-2019</p>
        <p>Bernardo Santos, Margarida Cosme, Vítor Gonçalves</p>
    </footer>
<?php } ?>
