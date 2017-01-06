<?php
// $class = 'message';
// if (!empty($params['class'])) {
//     $class .= ' ' . $params['class'];
// }
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="well" style= "background-color: #fcf8e3; font-size: 16px; text-align: center; width: 50%; margin: auto" onclick="this.classList.add('hidden');"><?= $message ?></div>
