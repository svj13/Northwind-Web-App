

<h1>Login</h1>

<?php 
/*
 * A view of the login tab. When a user isn't logged in, it will promp fpor a 
 * login with a username and password field. 
 * If a user is logged in, it will display a log out button
 * 
 */


if ($this->session->userdata('loggedIn') == 'false') { ?>
    <p><b>Please login to begin the session</b></p>
<section class="loginform cf">
<form name="login" action="<?php echo site_url('login/displayLogin'); ?>" method="post" accept-charset="utf-8">
    <ul>
        <li><label for="username">Username</label>
        <input type="username" name="username" placeholder="username" required></li>
        <li><label for="password">Password</label>
        <input type="password" name="password" placeholder="password" required></li>
        <li>
        <input type="submit" value="Login"></li>
    </ul>
</form>
</section>


 <?php } else { ?>
        <p><b>Click "Logout" to log out of the current session</b></p>
<section class="loginform cf">
<form name="login" action="<?php echo site_url('login/logout'); ?>" method="post" accept-charset="utf-8">
    <ul>
        <input type="submit" value="Log Out"></li>
    </ul>
</form>
</section>
<?php } ?>
