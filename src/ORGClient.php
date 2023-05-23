<?php

namespace CrowCMS;

class ORGClient {

    private \SQLite3 $client;
    public \SQlite3Result $result;
    public $error;

    /**
     * Create a database client
     * 
     * @return void;
     */
    public function __construct() {
        $this->client = new \SQLite3(__DIR__.'/../org.db');
    }

    /**
     * Get the list of employee's from the database
     * 
     * returns an array for success and false for error, error message is found in $this->error
     * @return array|false
     */
    public function get_employees() {
        try {
            $this->result = $this->client->query('select employee_id, fname, lname from employee;');
            $arr = [];
            while ($row = $this->result->fetchArray(SQLITE3_ASSOC)) {
                array_push($arr, $row);
            }
            return $arr;
        } catch (\Throwable $th) {
            $this->error = $th->message;
            return false;
        }
    }

    /**
     * Fetch the info an employee has
     * 
     * @param employee_id is the sqlite3 id for the employee in the employee table
     * 
     * @return array|false
     */
    public function get_employee_info($employee_id) {
        try {
            $this->result = $this->client->query("select type, blurb from info 
                join employee on info.employee_id = employee.employee_id 
                where info.employee_id = {$employee_id}");
            $arr = [];
            while ($row = $this->result->fetchArray(SQLITE3_ASSOC)) {
                array_push($arr, $row);
            }
            return $arr;
        } catch (\Throwable $th) {
            $this->error = $th->message;
            return false;
        }
    }

    /**
     * Return the url that points at an employee's photo
     * 
     * @param employee_id is the sqlite3 employee.employee_id
     * 
     * @return string|false
     */
    public function get_employee_image($employee_id) {
        try {
            $this->result = $this->client->query("select url from img
                join employee on img.employee_id = employee.employee_id
                where img.employee_id = {$employee_id}");
            return $this->result->fetchArray(SQLITE3_ASSOC)['url'];
        } catch (\Throwable $th) {
            $this->error = $th->message;
            return false;
        }
    }

}