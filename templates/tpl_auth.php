<?php function draw_login() { ?>
    <section id="login">
        <header>Login</header>
        <form action="../actions/action_login.php" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Log in">
        </form>
        <p>Don't have an account? <a href="../pages/signup.php">Sign up</a></p>
    </section>
<?php } ?>


<?php function draw_signup() { ?>
    <section id="signup">
        <header>Sign Up</header>
        <form action="../actions/action_signup.php" method="post">
            <label>Username<input type="text" name="username" placeholder="johnDoe21" required></label>
            <label>Email<input type="email" name="email" placeholder="johndoe@something.com" required></label>
            <label>First Name<input type="text" name="first_name" placeholder="Jonh" required></label>
            <label>Last Name<input type="text" name="last_name" placeholder="Doe" required></label>
            <label>Password<input type="password" name="password" placeholder="p4ssw0rd" required></label>
            <input type="submit" value="Sign up">
        </form>
        <p>Already have an account? <a href="../pages/login.php">Log in</a></p>
    </section>
<?php } ?>
