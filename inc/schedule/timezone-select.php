<?php
$timezone_identifiers = DateTimeZone::listIdentifiers();
echo '<select name="wa_bubble_page_schedule[wa_bubble_timezone_select_field]">';
foreach($timezone_identifiers as $timezone) {
  echo "<option ". isset(self::$page_schedule['wa_bubble_timezone_select_field']) ? selected($timezone, self::$page_conditions['wa_bubble_timezone_select_field'], true) : 'hello' ." value=\"$timezone\">$timezone</option>";
}
echo '</select>';