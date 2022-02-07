<?php 

class App 
{
  // untuk menentukan parameter default nya
  protected $controller = 'Home';
  protected $method = 'index';
  protected $params = [];

  public function __construct()
  {
    // memanggil function parseURL
    $url = $this->parseURL();

    // cek $url[0] kalau Null, jadikan nilai default $url[0] = 'Home':
    if ($url == NULL) {
      $url = [$this->controller];
    }

    // mengcheck file yang ada di controller, dan apakah sama dengan file di method
    if (file_exists('../app/controllers/' . $url[0] . '.php')) {
      $this->controller = $url[0];
      unset($url[0]);
    }

    require_once '../app/controllers/' . $this->controller . '.php';
    $this->controller = new $this->controller;

    //  mengcheck file method. apakah ada di dalam controller
    if (isset($url[1])) {
      if (method_exists($this->controller, $url[1])) {
        $this->method = $url[1];
        unset($url[1]);
      }
    }

    // kelola params
    if (!empty($url)) {
      $this->params = array_values($url);
    }

    // jalankan controller dan method, serta kirimkan params jika ada
    call_user_func_array([$this->controller,$this->method],$this->params);

  }

  public function parseURL()
  {
    // jika ada url yang dikirimkan
    if (isset($_GET['url'])) {
      $url = rtrim($_GET['url'], '/'); // menghapus tanda '/' di belakang url
      $url = filter_var($url, FILTER_SANITIZE_URL); // agar url bersih dari hacker
      $url = explode('/', $url); // memecah url berdasarkan tanda '/'
      return $url;
    }
  }
}
