<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="well" style= "background-color: #dff0d8; font-size: 16px; text-align: center; width: 50%; margin: auto; " onclick="this.classList.add('hidden')"><?= $message ?></div>
