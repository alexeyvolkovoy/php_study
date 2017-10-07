<?php
/**
 * Created by PhpStorm.
 * User: alexey
 * Date: 10/7/17
 * Time: 12:54 PM
 */
$tmp_user_id = $_SESSION['user_id'];
$site_check_form = <<<SITE_CHECK_END
<form method="POST" action="continue.php">
<input type="hidden" name="user_id" value="$tmp_user_id">
<input type="submit"  name="in_command" value="Перевірити сайт"><br/>
</form>
SITE_CHECK_END;
// <input type="hidden" name="user_id" value=>