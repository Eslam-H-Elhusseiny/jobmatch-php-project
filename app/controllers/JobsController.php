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
        // $id = $params['id'] ?? '';
        // inspectAndDie($id);

        // $params = [
        //     'id' => $id,
        // ];

        // $jobs = $this->db->query('SELECT * FROM jobs WHERE id = :id', $params)->fetch();
        // Check if jobs exists
        // if (!$jobs) {
        //     ErrorController::notFound('Jobs not found');
        //     return;
        // }

        // inspectAndDie($jobs);

        loadView('jobs/show');
    }



}
