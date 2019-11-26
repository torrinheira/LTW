<?php

    function draw_login() { ?>

        <section id="login">
            <header>Login</header>
            <form action="../actions/action_login.php" method="post">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="submit" value="Log in">
            </form>
            <p>Don't have an account? <a href="../pages/signup.php">Sign up</a></p>
        </section>

    <?php }

    function draw_signup() { ?>

        <section id="signup">
            <header>Sign Up</header>
            <form action="../actions/action_signup.php" method="post">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="submit" value="Sign up">
            </form>
            <p>Already have an account? <a href="../pages/login.php">Log in</a></p>
        </section>

    <?php }

?>
