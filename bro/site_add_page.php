<?php
/**
 * Created by PhpStorm.
 * User: alexey
 * Date: 10/7/17
 * Time: 12:54 PM
 */
$tmp_user_id = $_SESSION['user_id'];
$site_add_form = <<<SITE_ADD_END
<form method="POST" action="continue.php">
<input type="text" name="sitename">Site name<br/>
<input type="text" name="url">URL of site<br/>
<input type="hidden" name="user_id" value="$tmp_user_id">
<input type="submit"  name="in_command" value="Додати сайт"><br/>
</form>
SITE_ADD_END;
// <input type="hidden" name="user_id" value=>