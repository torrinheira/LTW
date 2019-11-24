<!DOCTYPE html>
<html>
    <head>
        <title>Place Genie</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <header>
            <img src="./images/logo.png" width="130" height="80" alt="Place Genie Logo">
            <div>
                <a href="">Be a genie</a>
                <a href="pages/signup.html">Sign up</a>
                <a href="pages/login.html">Log in</a>
            </div>
        </header>

        <div id="search">
            <!-- TODO: set the action correctly -->
            <form action="save.php" method="get">
                <fieldset>
                    <legend>Wish for a place</legend>
                    <label>Where<input type="search" placeholder="Your dreams"></label>
                    <label>Check-in<input type="date" value="<?php echo date('Y-m-d');?>"></label>
                    <!-- TODO: set default value to the day after the current date -->
                    <label>Check-out<input type="date" value="<?php echo date('Y-m-d');?>"></label>
                    <label>Guests<input type="number" value="1" min="1" max="20"></label>
                    <input type="submit" value="Make a wish">
                </fieldset>
            </form>
        </div>
    </body>
</html>
