<?php 

class Home extends Controller
{
  // method defaultnya
  public function index()
  {
    $data['judul'] = 'Home Page';
    $data['nama'] = $this->model('User_model')->getUser();
    $this->view('tempelates/header', $data);
    $this->view('home/index', $data);
    $this->view('tempelates/footer');
  }
}
