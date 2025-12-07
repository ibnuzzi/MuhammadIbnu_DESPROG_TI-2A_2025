<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Dashboard</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Selamat Datang</h3>
        </div>
        <div class="card-body">
            Selamat Datang <b><?php echo $session->get('name'); ?></b>. Anda login sebagai <b><?php echo $session->get('level'); ?></b>.
        </div>
    </div>
</section>  