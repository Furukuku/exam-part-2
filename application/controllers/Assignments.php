<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Assignments extends CI_Controller {
    /**
     * Initialize the select option of tracks
     */
    private $tracks = array("Introduction", "Web Fundamentals", "PHP");

    /**
     * Loads the assignment model
     * @return void
     */
    public function __construct() {
        parent::__construct();
        $this->load->model("Assignment");
    }

    /**
     * Displays the index page that contains the table of assignments
     * @return void Renders the index view
     */
    public function index() {
        $csrf = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        );
        $this->load->view("assignments/index", array(
            "assignments" => $this->Assignment->getAllAssignments(),
            "tracks" => $this->tracks,
            "csrf" => $csrf
        ));
    }

    /**
     * Displays the index page that contains the table of assignments that is searched
     * @return void Renders the index view
     */
    public function search() {
        $csrf = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        );
        $this->load->view("assignments/index", array(
            "assignments" => $this->Assignment->searchAssignments($this->input->get()),
            "tracks" => $this->tracks,
            "csrf" => $csrf,
            "values" => $this->input->get()
        ));
    }
}