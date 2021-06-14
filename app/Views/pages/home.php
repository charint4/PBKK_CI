<?= $this->extend('layout/layout'); ?>

<?= $this->section('css'); ?>
      .content {
        color: #6610f2;
        font-weight: 600;
        border: 2px solid #6610f2;
        border-radius: 20px;
      }

      .welcome{
        color: #6610f2;
        font-size: 100px;
        font-weight: 800;
      }

      .btn {
        border: 2px solid #6610f2;
        color: #6610f2;
        margin-right: 20px;
      }

      .btn:hover {
        background-color: #6610f2;
        color: white  ;
      }
<?= $this->endsection('css'); ?>


<?= $this->section('content'); ?>
      <div class="container">
        <div class="header">
          <h1 class="welcome text-center my-5">Welcome</h1>
          <div class="container">
            <div class="row">
              <div class="col-md-12 my-3 p-4 content">
                <h3 class="mb-3">Tugas PBKK 6 - Mencoba Code Igniter</h3>

                <p>Membuat halaman About dan Contact Us</p>
                <div class="d-flex">
                <a href="/about" class="btn btn-about">Go To About</a>
                <a href="/contact" class="btn btn-contact">Go To Contact Us</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
<?= $this->endsection('content'); ?>

