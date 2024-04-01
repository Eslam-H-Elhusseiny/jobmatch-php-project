<?php

namespace App\Controllers;

use Framework\Database;

class JobsController
{
    protected $db;

    public function __construct()
    {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
    }

    /*
     * Show all jobss
     * 
     * @return void
     */
    public function index()
    {
        $keywords = isset($_GET['keywords']) ? trim($_GET['keywords']) : '';
        $job_type = isset($_GET['job_type']) ? trim($_GET['job_type']) : '';
        $job_model = isset($_GET['job_model']) ? trim($_GET['job_model']) : '';
        $job_exp = isset($_GET['job_exp']) ? trim($_GET['job_exp']) : '';
        $is_open = isset($_GET['is_open']) ? trim($_GET['is_open']) : '1';

        // $current_date = isset($_GET['current_date']) ? trim($_GET['current_date']) : 'CURRENT_TIMESTAMP';


        $query = "SELECT * FROM jobs WHERE (title LIKE :keywords OR description LIKE :keywords)AND (job_type LIKE :job_type) AND(job_model LIKE :job_model)   AND(job_exp LIKE :job_exp) AND (is_open Like :is_open) AND(expiry_date >CURRENT_TIMESTAMP)";

        $params = [
            'keywords' => "%{$keywords}%",
            'job_type' => "%{$job_type}%",
            'job_model' => "%{$job_model}%",
            'job_exp' => "%{$job_exp}%",
            'is_open' => "%{$is_open}%",
            // 'current_date' => "%{$current_date}%",
        ];
        $jobs = $this->db->query($query, $params)->fetchAll();

        inspectAndDie($jobs);





    }

    /*
     * Show the create jobs form
     * 
     * @return void
     */
    public function create()
    {
        loadView('jobs/create');
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
        if (!$jobs) {
            ErrorController::notFound('Jobs not found');
            return;
        }

        inspectAndDie($jobs);

        loadView('jobs/show', [
            'jobs' => $jobs
        ]);
    }


    public function appliedJobs($params)
    {
        $id = $params['id'] ?? '';
        $status = isset($_GET['status']) ? trim($_GET['status']) : 'pending';


        $params = [
            'id' => $id,
            'status' => "%{$status}%",
        ];
        // inspectAndDie($id);
        $jobs = $this->db->query('SELECT * FROM app_job where (app_id=:id) AND (status LIKE :status)', $params)->fetchAll();
        inspectAndDie($jobs);



    }

}
