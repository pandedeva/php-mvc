<!-- Masthead-->
<header class="masthead text-center">
  <div class="container d-flex align-items-center flex-column">
    <!-- Masthead Avatar Image-->
    <img class="masthead-avatar mb-3 shadow rounded-circle" src="<?= BASEURL; ?>/img/pp.jpg" alt="..." />
    <!-- Masthead Heading-->
    <h1 class="masthead-heading text-uppercase mb-0">About Me</h1>
    <!-- Icon Divider-->
      <div class="divider-custom">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
        <div class="divider-custom-line"></div>
      </div>
      <!-- Masthead Subheading-->
      <p class="masthead-subheading font-weight-light mb-0">Web Developer - College Student</p>
      <p>Hallo nama saya <?= $data['nama'] ?>, umur saya <?= $data['umur'] ?>, dan saya adalah seorang <?= $data['pekerjaan'] ?>.</p>
  </div>
</header>