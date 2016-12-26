<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="bg-danger" onclick="this.classList.add('hidden');"><?= $message ?></div>
