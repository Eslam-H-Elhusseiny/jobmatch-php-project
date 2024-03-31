<?php

namespace App\Controllers;

use Framework\Database;

class HomeController
{
  protected $db;

  public function __construct()
  {
    $config = require basePath('config/db.php');
    $this->db = new Database($config);
  }

  /*
   * Show the latest listings
   * 
   * @return void
   */
  public function index()
  {
    $listings = $this->db->query('SELECT * FROM jobs LIMIT 6')->fetchAll();
    // inspectAndDie($listings);
    loadView('home', [
      'listings' => $listings
    ]);

    // loadView('home');
  }
}
