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
     * Show all jobs
     * 
     * @return void
     */
    public function index()
    {
        $jobs = $this->db->query('SELECT * FROM jobs')->fetchAll();

        // inspectAndDie($jobs);

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
        // if (!$jobs) {
        //     ErrorController::notFound('Jobs not found');
        //     return;
        // }

        // inspectAndDie($jobs);

        loadView('jobs/show', [
            'jobs' => $jobs
        ]);
    }

    public function search()
    {
        $keywords = isset($_GET['keywords']) ? trim($_GET['keywords']) : '';

        $query = "SELECT * FROM jobs WHERE title LIKE :keywords OR description LIKE :keywords OR location LIKE :keywords OR job_type LIKE :keywords OR job_model LIKE :keywords";


        $params = [
            'keywords' => "%{$keywords}%"
        ];

        $jobs = $this->db->query($query, $params)->fetchAll();

        // inspectAndDie($jobs);
        loadView('/jobs/index', [
            'jobs' => $jobs,
        ]);
    }
}
