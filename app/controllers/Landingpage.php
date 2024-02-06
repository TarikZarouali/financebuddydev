<?php
class Landingpage extends Controller
{
  // private $userModel;

  // public function __construct()
  // {
  //   $this->userModel = $this->model('userModel');

  // }
  public function overview()
  {

    $this->view('landingpage/overview');
  }
}
