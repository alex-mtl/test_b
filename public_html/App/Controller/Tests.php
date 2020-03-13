<?php
namespace App\Controller;

use App\Model\Clients;

class Tests extends Controller {
    public function get() {
        echo "Test Page!<br />";
        $clients = new Clients();
        $clients->createTable(true);
        echo "Clients table created...<br />";
        $clients->insert([
            'salutation' => 'Mr.',
            'firstName' => 'John',
            'lastName' => 'Doe',
            'email' => 'test@mail.com',
            'country' => 'USA',
            'mailingList' => 1,
        ]);
        echo "Test Client inserted...<br />";
    }
}