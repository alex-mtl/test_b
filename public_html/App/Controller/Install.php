<?php
namespace App\Controller;

use App\Model\Clients;

class Install extends Controller {
    public function get() {
        echo "Installation started...<br />";
        $clients = new Clients();
        $clients->createTable(true);
        echo "Clients table created...<br />";
    }
}