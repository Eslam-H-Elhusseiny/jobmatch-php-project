<?php

namespace App\Controllers;

use Framework\Database;
use Framework\Validation;
use Framework\Session;

class UserController
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
    loadView('users/createUser');
  }
  /**
   * Store user in database
   * 
   * @return void
   */
  public function store()
  {
    // inspectAndDie('Store');
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $phone_num = $_POST['phone_num'];
    $title  = $_POST['title'];
    $gender  = $_POST['gender'];
    $bdate  = $_POST['bdate'];
    $country = $_POST['country'];
    $experience  = $_POST['experience'];
    $email = $_POST['email'];
    $city = $_POST['city'];
    $bio = $_POST['bio'];
    $password = $_POST['password'];
    $passwordConfirmation = $_POST['password_confirmation'];

    $errors = [];

    // Validation
    if (!Validation::email($email)) {
      $errors['email'] = 'Please enter a valid email address';
    }

    if (!Validation::string($fname, 2, 50)) {
      $errors['fname'] = 'first name must be between 2 and 50 characters';
    }

    if (!Validation::string($lname, 2, 50)) {
      $errors['lname'] = 'last name must be between 2 and 50 characters';
    }


    if (!Validation::string($password, 6, 50)) {
      $errors['password'] = 'Password must be at least 6 characters';
    }

    if (!Validation::match($password, $passwordConfirmation)) {
      $errors['password_confirmation'] = 'Passwords do not match';
    }

    if (!empty($errors)) {
      loadView('users/createUser', [
        'errors' => $errors,
        'user' => [
          'fname' => $fname,
          'lname' => $lname,
          'email' => $email,
          'phone_num' => $phone_num,
          'bio' => $bio,
          'bdate' => $bdate,
          'title' => $title,
          'experience' => $experience,
          'gender' => $gender,
          'country' => $country,
          'city' => $city,
            ]
      ]);
      exit;
    }

    // Check if email exists
    $params = [
      'email' => $email
    ];

    $user = $this->db->query('SELECT * FROM applicants WHERE email = :email', $params)->fetch();

    if ($user) {
      $errors['email'] = 'That email already exists';
      loadView('users/createUser', [
        'errors' => $errors
      ]);
      exit;
    }

    // Create user account
    $params = [
      'fname' => $fname,
      'lname' => $lname,
      'email' => $email,
      'phone_num' => $phone_num,
      'bio' => $bio,
      'bdate' => $bdate,
      'title' => $title,
      'experience' => $experience,
      'gender' => $gender,
      'country' => $country,
      'city' => $city,
      'password' => password_hash($password, PASSWORD_DEFAULT)
    ];

    $this->db->query('INSERT INTO applicants (fname, lname, email, phone_num, bio, bdate, title, experience, gender, country, city, password) VALUES (:fname, :lname, :email, :phone_num, :bio, :bdate, :title, :experience, :gender, :country, :city, :password)', $params);

    // Get new user ID
    $userId = $this->db->conn->lastInsertId();

    // Set user session
    Session::set('user', [
      'id' => $userId,
      'fname' => $fname,
      'lname' => $lname,
      'email' => $email,
      'phone_num' => $phone_num,
      'bio' => $bio,
      'bdate' => $bdate,
      'title' => $title,
      'experience' => $experience,
      'gender' => $gender,
      'country' => $country,
      'city' => $city,
]);

    redirect('/');
  }

  /**
   * Logout a user and kill session
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
   * Authenticate a user with email and password
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

    $user = $this->db->query('SELECT * FROM applicants WHERE email = :email', $params)->fetch();

    if (!$user) {
      $errors['email'] = 'Incorrect credentials';
      loadView('users/login', [
        'errors' => $errors
      ]);
      exit;
    }

    // Check if password is correct
    if (!password_verify($password, $user->password)) {
      $errors['email'] = 'Incorrect credentials';
      loadView('users/login', [
        'errors' => $errors
      ]);
      exit;
    }

    // Set user session
    Session::set('user', [
      'id' => $user->id,
      'fname' => $user->fname,
      'lname' => $user->lname,
      'email' => $user->email,
      'phone_num' => $user->phone_num,
      'bio' => $user->bio,
      'bdate' => $user->bdate,
      'title' => $user->title,
      'experience' => $user->experience,
      'gender' => $user->gender,
      'country' => $user->country,
      'city' => $user->city,
    ]);

    redirect('/');
  }
}
