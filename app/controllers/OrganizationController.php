<?php

namespace App\Controllers;

use Framework\Database;
use Framework\Validation;
use Framework\Session;

class OrganizationController
{
  protected $db;

  public function __construct()
  {
    $config = require basePath('config/db.php');
    $this->db = new Database($config);
  }

  /**
   * Show the login page
   * 
   * @return void
   */
  public function login()
  {
    loadView('users/login');
  }

  /**
   * Show the register page
   * 
   * @return void
   */
  public function create()
  {
    loadView('users/createOrganization');
  }
  /**
   * Store organization in database
   * 
   * @return void
   */
  public function store()
  {
    // inspectAndDie('Store');
    $org_name = $_POST['org_name'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $email = $_POST['email'];
    $founded = $_POST['founded'];
    $industry = $_POST['industry'];
    $description = $_POST['description'];
    $website = $_POST['website'];
    $linkedin = $_POST['linkedin'];
    $password = $_POST['password'];
    $passwordConfirmation = $_POST['password_confirmation'];

    $errors = [];

    // Validation
    if (!Validation::email($email)) {
      $errors['email'] = 'Please enter a valid email address';
    }

    if (!Validation::string($org_name, 2, 50)) {
      $errors['org_name'] = 'first name must be between 2 and 50 characters';
    }


    if (!Validation::string($password, 6, 50)) {
      $errors['password'] = 'Password must be at least 6 characters';
    }

    if (!Validation::match($password, $passwordConfirmation)) {
      $errors['password_confirmation'] = 'Passwords do not match';
    }

    if (!empty($errors)) {
      loadView('users/createOrganization', [
        'errors' => $errors,
        'organization' => [
            'org_name' => $org_name,
            'country' => $country,
            'city' => $city,
            'email' => $email,
            'founded' => $founded,
            'industry' => $industry,
            'description' => $description,
            'website' => $website,
            'linkedin' => $linkedin,
            ]
      ]);
      exit;
    }

    // Check if email exists
    $params = [
      'email' => $email
    ];

    $organization = $this->db->query('SELECT * FROM organizations WHERE email = :email', $params)->fetch();

    if ($organization) {
      $errors['email'] = 'That email already exists';
      loadView('users/createOrganization', [
        'errors' => $errors
      ]);
      exit;
    }

    // Create organization account
    $params = [
        'org_name' => $org_name,
        'country' => $country,
        'city' => $city,
        'email' => $email,
        'founded' => $founded,
        'industry' => $industry,
        'description' => $description,
        'website' => $website,
        'linkedin' => $linkedin,
        'password' => password_hash($password, PASSWORD_DEFAULT)
    ];

    $this->db->query('INSERT INTO organizations (org_name, email, website, linkedin, description, industry, country, city, founded, password) VALUES (:org_name, :email, :website, :linkedin, :description, :industry, :country, :city, :founded, :password)', $params);
    // Get new organization ID
    $userId = $this->db->conn->lastInsertId();

    // Set organization session
    Session::set('organization', [
        'id' => $userId,
        'org_name' => $org_name,
        'country' => $country,
        'city' => $city,
        'email' => $email,
        'founded' => $founded,
        'industry' => $industry,
        'description' => $description,
        'website' => $website,
        'linkedin' => $linkedin,
    ]);

    redirect('/');
  }

  /**
   * Logout a organization and kill session
   * 
   * @return void
   */
  public function logout()
  {
    Session::clearAll();

    $params = session_get_cookie_params();
    setcookie('PHPSESSID', '', time() - 86400, $params['path'], $params['domain']);

    redirect('/');
  }

  /**
   * Authenticate a organization with email and password
   * 
   * @return void
   */
  public function authenticate()
  {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $errors = [];

    // Validation
    if (!Validation::email($email)) {
      $errors['email'] = 'Please enter a valid email';
    }

    if (!Validation::string($password, 6, 50)) {
      $errors['password'] = 'Password must be at least 6 characters';
    }

    // Check for errors
    if (!empty($errors)) {
      loadView('users/login', [
        'errors' => $errors
      ]);
      exit;
    }

    // Check for email
    $params = [
      'email' => $email
    ];

    $organization = $this->db->query('SELECT * FROM organizations WHERE email = :email', $params)->fetch();

    if (!$organization) {
      $errors['email'] = 'Incorrect credentials';
      loadView('users/login', [
        'errors' => $errors
      ]);
      exit;
    }

    // Check if password is correct
    if (!password_verify($password, $organization->password)) {
      $errors['email'] = 'Incorrect credentials';
      loadView('users/login', [
        'errors' => $errors
      ]);
      exit;
    }

    // Set organization session
    Session::set('organization', [
      'id' => $organization->id,
      'org_name' => $organization->org_name,
      'country' => $organization->country,
      'city' => $organization->city,
      'email' => $organization->email,
      'founded' => $organization->founded,
      'industry' => $organization->industry,
      'description' => $organization->description,
      'website' => $organization->website,
      'linkedin' => $organization->linkedin,
  ]);

    redirect('/');
  }
}
