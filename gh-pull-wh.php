<?php
exec('git pull 2>&1', $output);
exec('wp wpsdb migrate 1 2>&1', $output);
?>
<pre><?php print_r($output);?></pre>
