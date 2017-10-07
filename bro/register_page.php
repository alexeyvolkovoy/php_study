<?php
/**
 * Created by PhpStorm.
 * User: alexey
 * Date: 10/7/17
 * Time: 12:54 PM
 */
$register_form = <<<REGISTER_END
<form method="POST" action="register.php">
<input type="text" name="username">Login name<br/>
<input type="password" name="password_1">Password<br/>
<input type="password" name="password_2">Confirm password<br/>
<input type="text" name="firstname">First name<br/>
<input type="text" name="familyname">Family name<br/>
<input type="tel" name="phone">Cell phone number<br/>
<input type="text" name="e_mail">E-mail<br/>
<input type="tel" name="viber">Viber<br/>
<input type="submit"  name="in_command" value="Зареєструватися"><br/> 
</form>
REGISTER_END;
