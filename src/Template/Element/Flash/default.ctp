<?php
// $class = 'message';
// if (!empty($params['class'])) {
//     $class .= ' ' . $params['class'];
// }
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="bg-primary" onclick="this.classList.add('hidden');"><?= $message ?></div>
