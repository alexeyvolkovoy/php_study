<?php
/**
 * Created by PhpStorm.
 * User: alexey
 * Date: 10/7/17
 * Time: 12:54 PM
 */
$start_buttons = <<<BUTTONS_END
<form method="post" action="register.php">
<input type="submit" name="in_command" value="Новий користувач"> 
</form>
<form method="post" name="login" action="authenticate.php">
<input type="submit"  value="Увійти">
</form> 
BUTTONS_END;
