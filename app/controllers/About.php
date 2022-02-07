<?php 

class About extends Controller
{
  // method default
  public function index($nama = 'Pande Deva', $umur = 21, $pekerjaan = 'Mahasiswa')
  {
    $data['nama'] = $nama;
    $data['umur'] = $umur;
    $data['pekerjaan'] = $pekerjaan;
    $data['judul'] = 'About Me';
    $this->view('tempelates/header', $data);
    $this->view('about/index', $data);
    $this->view('tempelates/footer');
  }
  
  public function page()
  {
    $data['judul'] = 'Pages';
    $this->view('tempelates/header', $data);
    $this->view('about/page');
    $this->view('tempelates/footer');
  }
}
