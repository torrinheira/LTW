<?php function draw_header() { ?>
    <header>
        <nav>
            <a class="logo" href="../index.php"><img src="../images/logo.png" width="130" height="80" alt="Place Genie Logo"></a>
            <input id="menu_btn" type="checkbox"/>
            <label class="menu_icon" for="menu_btn"></label>
            <ul class="menu">
                <?php if (isset($_SESSION['username'])) { ?>
                    <li><a class="button" href="../pages/manage_reservations.php">Reservations</a></li>
                    <li><a class="button" href="../pages/manage_properties.php">Properties</a></li>
                    <li><a class="button" href="../pages/profile.php?username=<?=$_SESSION['username']?>"><?=$_SESSION['username']?></a></li>
                    <li><a class="button" href="../actions/action_logout.php">Logout</a></li>
                <?php } else { ?>
                    <li><a class="button login">Log in</a></li>
                    <li><a class="button signup">Sign up</a></li>
                <?php } ?>
            </ul>
        </nav>
    </header>
<?php } ?>


<?php function draw_search() { ?>
    <div class="search">
        <form action="../pages/search.php" method="get">
            <div class="form_entry where"><label>Where</label><input type="search" name ="city" placeholder="Your dreams"></div>
            <div class="form_entry checkin"><label>Check-in</label><input id="checkin" name="checkin" type="date" value="<?php echo date('Y-m-d');?>"></div>
            <div class="form_entry checkout"><label>Check-out</label><input id="checkout" name="checkout" type="date" value="<?php echo date('Y-m-d', strtotime('tomorrow'));?>"></div>
            <div class="form_entry guests"><label>Guests</label><input name="guests" type="number" value="1" min="1" max="20"></div>
            <div class="form_entry minprice"><label>Min Price</label><input name="minprice" type="number" value="1" min="1" max="50000"></div>
            <div class="form_entry maxprice"><label>Max Price</label><input name="maxprice" type="number" value="500" min="1" max="50000"></div>
            <div class="submit"><input type="submit" value="Make a wish"></div>
        </form>
    </div>
<?php } ?>


<?php function draw_footer() { ?>
    <footer>
        <p>&copy; Place Genie, LTW-2019</p>
        <p>Bernardo Santos, Margarida Cosme, Vítor Gonçalves</p>
    </footer>
<?php } ?>
