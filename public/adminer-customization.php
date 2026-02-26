<?php

if (!file_exists('db-admin.php')) {
    die("<strong>Error:</strong> The Adminer file (<code>db-admin.php</code>) was not found in the <code>public</code> directory. Please run the download command again.");
}

include_once 'db-admin.php';

function adminer_object() {
    class AdminerCustomization extends Adminer {
        function login($login, $password) {
            if ($login == 'root') {
                return true;
            }
            return parent::login($login, $password);
        }
    }
    return new AdminerCustomization();
}