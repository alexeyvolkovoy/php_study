<?php
/**
 * Created by PhpStorm.
 * User: alexey
 * Date: 10/7/17
 * Time: 4:54 PM
 */
$footer_buttons = <<<FOOTER_BUTTONS_END
<form method="post" action="logout.php">
<input type="submit" name="in_command" value="Вийти"> 
</form>
FOOTER_BUTTONS_END;
echo $footer_buttons;