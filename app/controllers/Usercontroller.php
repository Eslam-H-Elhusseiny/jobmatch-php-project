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
    // Required fields validation
    $requiredFields = ['fname', 'lname', 'phone_num', 'title', 'gender', 'bdate', 'country', 'experience', 'email', 'city', 'bio', 'password', 'password_confirmation'];
    $errors = [];

    foreach ($requiredFields as $field) {
      if (empty($_POST[$field])) {
        $errors[$field] = ucfirst($field) . ' is required';
      }
    }

    // Additional validations
    if (!Validation::email($_POST['email'])) {
      $errors['email'] = 'Please enter a valid email address';
    }

    if (!Validation::string($_POST['fname'], 2, 50)) {
      $errors['fname'] = 'First name must be between 2 and 50 characters';
    }

    if (!Validation::string($_POST['lname'], 2, 50)) {
      $errors['lname'] = 'Last name must be between 2 and 50 characters';
    }

    if (!Validation::string($_POST['password'], 6, 50)) {
      $errors['password'] = 'Password must be at least 6 characters';
    }

    if (!Validation::match($_POST['password'], $_POST['password_confirmation'])) {
      $errors['password_confirmation'] = 'Passwords do not match';
    }

    // If there are validation errors, load the view with errors
    if (!empty($errors)) {
      loadView('users/createUser', [
        'errors' => $errors,
        'user' => $_POST
      ]);
      exit;
    }

    // Check if email or phone number already exists
    $params = [
      'email' => $_POST['email'],
      'phone_num' => $_POST['phone_num']
    ];

    $existingUser = $this->db->query('SELECT * FROM applicants WHERE email = :email OR phone_num = :phone_num', $params)->fetch();

    if ($existingUser) {
      $errors['email'] = $existingUser->email === $_POST['email'] ? 'That email already exists' : '';
      $errors['phone_num'] = $existingUser->phone_num === $_POST['phone_num'] ? 'Phone number already exists' : '';

      loadView('users/createUser', [
        'errors' => $errors,
        'user' => $_POST
      ]);
      exit;
    }
    
    // Create user account
    $params = [
      'fname' => $_POST['fname'],
      'lname' => $_POST['lname'],
      'email' => $_POST['email'],
      'phone_num' => $_POST['phone_num'],
      'bio' => $_POST['bio'],
      'bdate' => $_POST['bdate'],
      'title' => $_POST['title'],
      'experience' => $_POST['experience'],
      'gender' => $_POST['gender'],
      'country' => $_POST['country'],
      'city' => $_POST['city'],
      'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
    ];

    $this->db->query('INSERT INTO applicants (fname, lname, email, phone_num, bio, bdate, title, experience, gender, country, city, password) VALUES (:fname, :lname, :email, :phone_num, :bio, :bdate, :title, :experience, :gender, :country, :city, :password)', $params);

    // Get new user ID
    $userId = $this->db->conn->lastInsertId();

    // Set user session
    Session::set('user', [
      'id' => $userId,
      'fname' => $_POST['fname'],
      'lname' => $_POST['lname'],
      'email' => $_POST['email'],
      'phone_num' => $_POST['phone_num'],
      'bio' => $_POST['bio'],
      'bdate' => $_POST['bdate'],
      'title' => $_POST['title'],
      'experience' => $_POST['experience'],
      'gender' => $_POST['gender'],
      'country' => $_POST['country'],
      'city' => $_POST['city'],
    ]);

    // Redirect to home page after successful registration
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
