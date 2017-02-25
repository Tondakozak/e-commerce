<?php
$common = $this->navigation["common"];
$active = $this->navigation["active"];
$custom = $this->navigation["custom"];

foreach ($common as $item) {
    $is_active = ($item[0] == $active)?" class='active'":"";
    echo "<li$is_active>
            <a href='{$item[0]}'>{$item[1]}</a>
         </li>";
}

?>
<li><a></a></li>
<li><a></a></li>
<li><a></a></li>


<?php
foreach ($custom as $item) {
    $is_active = ($item[0] == $active)?" class='active'":"";
    echo "<li$is_active>
            <a href='{$item[0]}'>{$item[1]}</a>
         </li>";
}