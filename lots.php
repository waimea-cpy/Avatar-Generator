<?php

$title = 'Avatar Parade';

include_once '../common/common-top.php';

echo '<section style="display: flex; flex-wrap: wrap; gap: 1em;">';

for( $i = 0; $i < 666; $i++ ) {
    echo '<img class="avatar"
                src="/avatar/'.rand(0,999999).'"
                alt="demo avatar"
                style="width: 8em; filter: drop-shadow( 0 0.1em 0.3em rgba(0,0,0,0.5) );">';
}

echo '</section>';

include_once '../common/common-bottom.php';

?>
