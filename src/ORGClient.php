<?php

namespace CrowCMS;

class ORGClient {

    private $client;
    public $result;
    public $error;

    /**
     * Create a database client
     * 
     * @return void;
     */
    public function __construct() {
        $this->client = new \mysqli('localhost', 'root', 'potato', 'crowcms');
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
            while ($row = $this->result->fetch_assoc()) {
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
            while ($row = $this->result->fetch_assoc()) {
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
            return $this->result->fetch_assoc()['url'];
        } catch (\Throwable $th) {
            $this->error = $th->message;
            return false;
        }
    }

    public function update_employee_info($employee_id, $field, $value) {
        // $this->client->exec("UPDATE info SET blurb = \"{$value}\" WHERE employee_id = \"{$employee_id}\" AND type = \"{$field}\";");
        $stmt = $this->client->prepare("UPDATE info SET blurb = ? WHERE employee_id = ? AND type = ?;");
        $stmt->execute([$value, $employee_id, $field]);
    }

    public function add_new_field($employee_id, $field, $value) {
        // $this->client->exec("INSERT INTO info (employee_id, type, blurb) VALUES (\"{$employee_id}\", \"{$field}\", \"{$value}\");");
        $stmt = $this->client->prepare("INSERT INTO info (employee_id, type, blurb) VALUES (?, ?, ?)");
        $stmt->execute([$employee_id, $field, $value]);
    }
    
    public function get_employee_name($employee_id) {
        $this->result = $this->client->query("SELECT fname, lname FROM employee WHERE employee_id = \"{$employee_id}\";");
        return $this->result->fetch_assoc();
    }

}