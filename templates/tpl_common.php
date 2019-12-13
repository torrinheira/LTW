<?php function draw_header() { ?>
    <header>
        <section id="menu">
            <a href="../index.php"><img src="../images/logo.png" width="130" height="80" alt="Place Genie Logo"></a>
            <nav>
                <input type="checkbox" id="hamburger" />
                <label class="hamburger" for="hamburger"></label>
                <ul>
                    <?php if (isset($_SESSION['username'])) { ?>
                        <li><a class="button" href="../pages/manage_reservations.php">Reservations</a></li>
                        <li><a class="button" href="../pages/manage_properties.php">Properties</a></li>
                        <li><a class="button" href="../pages/profile.php?username=<?=$_SESSION['username']?>"><?=$_SESSION['username']?></a></li>
                        <li><a class="button" href="../actions/action_logout.php">Logout</a></li>
                    <?php } else { ?>
                        <li><input class="login" type="button" value="Log in"/></li>
                        <li><input class="signup" type="button" value="Sign up"/></li>
                    <?php } ?>
                </ul>
            </nav>
        </section>
    </header>
<?php } ?>


<?php function draw_search() { ?>
    <div id="search">
        <form action="../pages/search.php" method="get">
            <div>Where:<input type="search" name ="city" placeholder="Your dreams"></div>
            <div>Check-in:<input id="checkin" name="checkin" type="date" value="<?php echo date('Y-m-d');?>"></div>
            <div>Check-out:<input id="checkout" name="checkout" type="date" value="<?php echo date('Y-m-d', strtotime('tomorrow'));?>"></div>
            <div>Guests:<input name="guests" type="number" value="1" min="1" max="20"></div>
            <div>Min Price:<input name="minprice" type="number" value="1" min="1" max="50000"></div>
            <div>Max Price:<input name="maxprice" type="number" value="500" min="1" max="50000"></div>
            <div> <input type="submit" value="Make a wish"> </div>
        </form>
    </div>
<?php } ?>


<?php function draw_footer() { ?>
    <footer>
        <p>&copy; Place Genie, LTW-2019</p>
        <p>Bernardo Santos, Margarida Cosme, Vítor Gonçalves</p>
    </footer>
<?php } ?>
