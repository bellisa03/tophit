<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="bg-success" onclick="this.classList.add('hidden')"><?= $message ?></div>
