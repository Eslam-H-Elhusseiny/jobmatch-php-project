<?php

namespace App\Controllers;

use Framework\Database;
use Framework\Validation;
use PDO;

class JobsController
{
    protected $db;

    public function __construct()
    {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
    }

    /*
     * Show all jobs
     * 
     * @return void
     */
    public function index()
    {
        $keywords = isset($_GET['keywords']) ? trim($_GET['keywords']) : '';
        $location = isset($_GET['location']) ? trim($_GET['location']) : '';
        $job_type = isset($_GET['job_type']) ? trim($_GET['job_type']) : '';
        $job_model = isset($_GET['job_model']) ? trim($_GET['job_model']) : '';
        $job_exp = isset($_GET['job_exp']) ? trim($_GET['job_exp']) : '';
        // $is_open = isset($_GET['is_open']) ? trim($_GET['is_open']) : '1';

        // $current_date = isset($_GET['current_date']) ? trim($_GET['current_date']) : 'CURRENT_TIMESTAMP';


        $query = "SELECT * FROM jobs WHERE (title LIKE :keywords OR description LIKE :keywords) AND (location LIKE :location) AND (job_type LIKE :job_type) AND (job_model LIKE :job_model)   AND(job_exp LIKE :job_exp) order by created_at desc";
        //  AND ( is_open = :is_open)";
        //  AND(expiry_date >CURRENT_TIMESTAMP)";

        $params = [
            'keywords' => "%{$keywords}%",
            'location' => "%{$location}%",
            'job_type' => "%{$job_type}%",
            'job_model' => "%{$job_model}%",
            'job_exp' => "%{$job_exp}%",
            // 'is_open' => "%{$is_open}%",
            // 'current_date' => "%{$current_date}%",
        ];
        $jobs = $this->db->query($query, $params)->fetchAll();

        loadView('jobs/index', [
            'jobs' => $jobs
        ]);
    }


    /*
     * Show the create jobs form
     * 
     * @return void
     */
    public function create()
    {
        loadView('/jobs/create');
    }


    public function store()
    {

        if (isset($_SESSION['organization'])) {

            $title = $_POST['title'];
            $description = $_POST['description'];
            $job_type = $_POST['job_type'];
            $job_model = $_POST['job_model'];
            $job_exp = $_POST['job_exp'];
            $location = $_POST['location'];
            $city = $_POST['city'];
            $expiry_date = $_POST['expiry_date'];
            $is_open = $_POST['is_open'];
            $org_id = $_SESSION['organization']['id'];


            $errors = [];

            if (!Validation::string($title, 1, 100)) {
                $errors['title'] = 'Please enter a valid title ';
            }

            if (!Validation::string($description, 2, 300)) {
                $errors['description'] = 'Description must be between 2 and 50 characters';
            }

            if (!Validation::string($job_type, 1, 50)) {
                $errors['job_type'] = 'Job type is required';
            }

            if (!Validation::string($job_model, 1, 50)) {
                $errors['job_model'] = 'Job model is required';
            }

            if (!isset($job_exp)) {
                $errors['job_exp'] = 'Experience must be a valid number';
            }

            if (!Validation::string($location, 1, 100)) {
                $errors['location'] = 'Location is required';
            }

            if (!Validation::string($city, 1, 100)) {
                $errors['city'] = 'City is required';
            }

            if (!isset($expiry_date)) {
                $errors['expiry_date'] = 'Expiry date is not valid';
            }

            if (!isset($is_open)) {
                $errors['is_open'] = 'Invalid value for is_open';
            }

            if (!empty($errors)) {

                // Errors found, load view with errors and previously entered data
                loadView('jobs/create', [
                    'errors' => $errors,
                    'job_data' => [
                        'title' => $title,
                        'description' => $description,
                        'job_type' => $job_type,
                        'job_model' => $job_model,
                        'job_exp' => $job_exp,
                        'location' => $location,
                        'city' => $city,
                        'expiry_date' => $expiry_date,
                        'is_open' => $is_open
                    ]
                ]);
                exit;
            }



            // Create job
            $params = [
                'title' => $title,
                'description' => $description,
                'job_type' => $job_type,
                'job_model' => $job_model,
                'job_exp' => $job_exp,
                'location' => $location,
                'city' => $city,
                'expiry_date' => $expiry_date,
                'is_open' => $is_open,
                'org_id' => $org_id
            ];

            $this->db->query('INSERT INTO jobs (title, description, job_type, job_model, job_exp, location, city, expiry_date, is_open, org_id) VALUES (:title, :description, :job_type, :job_model, :job_exp, :location, :city, :expiry_date, :is_open, :org_id)', $params);
            redirect('/jobs');
        } else {
            ErrorController::unauthorized('you are not authorized');
            //     return;
        }
    }

    /*
     * Show a single jobs
     * 
     * @return void
     */
    public function show($params)
    {
        $id = $params['id'] ?? '';
        // inspectAndDie($id);

        $params = [
            'id' => $id,
        ];

        $jobs = $this->db->query('SELECT * FROM jobs WHERE id = :id', $params)->fetch();
        // Check if jobs exists
        // if (!$jobs) {
        //     ErrorController::notFound('Jobs not found');
        //     return;
        // }

        // inspectAndDie($jobs);

        loadView('jobs/show', [
            'jobs' => $jobs
        ]);
    }

    public function list($params)
    {
        $id = $params['id'] ?? '';
        // inspectAndDie($id);

        $params = [
            'id' => $id,
        ];

        $list = $this->db->query('SELECT applicants.* ,status
        FROM app_job JOIN applicants 
        ON app_id = id WHERE job_id = :id  ', $params)->fetchAll();
        // inspectAndDie($list);
        loadView('jobs/applied', [
            'list' => $list,
            'job_id' => $id
        ]);
    }
    // public function search()
    // {
    //     $keywords = isset($_GET['keywords']) ? trim($_GET['keywords']) : '';
    //     $location = isset($_GET['location']) ? trim($_GET['location']) : '';
    //     $job_type = isset($_GET['job_type']) ? trim($_GET['job_type']) : '';
    //     $job_model = isset($_GET['job_model']) ? trim($_GET['job_model']) : '';

    //     $query = "SELECT * FROM jobs WHERE (title LIKE :keywords OR description LIKE :keywords) and (location LIKE :location) and (job_type LIKE :job_type) and (job_model LIKE :job_model)";


    //     $params = [
    //         'keywords' => "%{$keywords}%",
    //         'location' => "%{$location}%",
    //         'job_type' => "%{$job_type}%",
    //         'job_model' => "%{$job_model}%",
    //     ];

    //     $jobs = $this->db->query($query, $params)->fetchAll();

    //     // inspectAndDie($jobs);
    //     loadView('/jobs/index', [
    //         'jobs' => $jobs,
    //         'keywords' => $keywords,
    //         'location' => $location,
    //         'job_type' => $job_type,
    //         'job_model' => $job_model,
    //     ]);
    // }

    // public function jobApplicants($params)
    // {
    //     // inspectAndDie($params);

    //     $id = $params['id'] ?? '';
    //     // inspectAndDie(is_nan($id));
    //     if (!is_numeric($id)) {
    //         ErrorController::notFound('Please enter a valid id');

    //     }
    //     $query = ("select * from app_job where job_id=$id");
    //     $applied_applicants = $this->db->query($query)->fetchAll();

    //     $response = json_encode($applied_applicants);

    //     // Set the Content-Type header to application/json
    //     header('Content-Type: application/json');

    //     // Return the JSON response
    //     echo $response;
    //     // inspectAndDie($applied_applicants);

    // }

    public function apply($params)
    {
        $job_id = $params['id'];
        $app_id = $_SESSION['user']['id'];


        loadView("jobs/apply", [
            'app_id' => $app_id,
            'job_id' => $job_id
        ]);

    }



    public function jobOrganization()
    {
        // inspectAndDie($params);
        $org_id = $_SESSION['organization']['id'];

        $query = ("select * from jobs where org_id=$org_id");
        $applied_applicants = $this->db->query($query)->fetchAll();

        inspectAndDie($applied_applicants);

    }




    public function updateApplicationStatus()
    {
        // inspectAndDie($params);
        $org_id = $_SESSION['organization']['id'];

        $query = ("select * from jobs where org_id=$org_id");
        $applied_applicants = $this->db->query($query)->fetchAll();

        inspectAndDie($applied_applicants);

    }


    public function application()
    {


        $app_id = $_POST['app_id'];
        $job_id = $_POST['job_id'];
        $experience = $_POST['experience'];
        $cover_letter = $_POST['cover_letter'];
        // inspectAndDie($_FILES['resume']);
        // inspectAndDie($_POST);
        if ($_FILES['resume']['error'] === UPLOAD_ERR_OK) {
            $file_name = $_FILES['resume']['name'];
            $file_size = $_FILES['resume']['size'];
            $file_tmp = $_FILES['resume']['tmp_name'];
            $file_type = $_FILES['resume']['type'];
            $ext = explode('.', $file_name);
            $file_ext = strtolower(end($ext));

            $allowed_extensions = array("pdf");

            if (in_array($file_ext, $allowed_extensions)) {
                $file_path = $_SERVER['DOCUMENT_ROOT'] . "/cv/" . $_POST['app_id'] . "-" . $_POST['job_id'] . "-" . $file_name;
                // inspectAndDie($file_path);

                move_uploaded_file($file_tmp, $file_path);
                $file_path = "/public/cv/" . $_POST['app_id'] . "-" . $_POST['job_id'] . "-" . $file_name;

            } else {
                ErrorController::notFound('you are not authorized');
            }
        } else {
            ErrorController::notFound('you are not authorized');
        }
        $params = [
            'app_id' => $app_id,
            'job_id' => $job_id,
            'status' => 'applied',
            'cv' => $file_path,
            'experience' => $experience,
            'cover_letter' => $cover_letter,

        ];

        $this->db->query('INSERT INTO app_job (app_id, job_id, status, cv, experience, cover_letter) VALUES (:app_id, :job_id, :status, :cv, :experience, :cover_letter)', $params);
        redirect('/');

        // return;



    }

    public function status()
    {
        $app_id = $_POST['app_id'];
        $job_id = $_POST['job_id'];
        $status = $_POST['status'];

        $params = [
            'app_id' => $app_id,
            'job_id' => $job_id,
            'status' => $status
        ];
        $updateQuery = "UPDATE app_job SET status=:status WHERE app_id = :app_id and job_id = :job_id";

        $this->db->query($updateQuery, $params);
        redirect("/jobs/$job_id/list");
        // inspectAndDie($status);

    }

    public function appliedJobs($params)
    {
        $status = isset($_GET['status']) ? trim($_GET['status']) : '';

        $id = $params['id'] ?? '';
        // inspectAndDie($id);

        $params = [
            'id' => $id,
            'status' => "%{$status}%",
        ];

        $query = "SELECT * from app_job aj
        join applicants a on aj.app_id=a.id
        where job_id =:id and status Like :status";

        $applied_jobs = $this->db->query($query, $params)->fetchAll();
        inspectAndDie($applied_jobs);
    }


}
