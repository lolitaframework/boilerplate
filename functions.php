<?php
// ==============================================================
// Bootstraping
// ==============================================================
if (! class_exists('LolitaFramework')) {
    require_once 'LolitaFramework/LolitaFramework.php';
}
$lolita_framework = \lolitatheme\LolitaFramework::getInstance();
$lolita_framework->addModule('Configuration');
$lolita_framework->addModule('Widgets');
$lolita_framework->addModule('CssLoader');
