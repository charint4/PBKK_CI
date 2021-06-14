<?= $this->extend('layout/layout'); ?>

<?= $this->section('css'); ?>

      .welcome{
        color: #6610f2;
        font-size: 100px;
        font-weight: 800;
      }

      .about-content{
        color: #6610f2;
        border: 2px solid #6610f2;
        border-radius: 20px;
        font-weight: 400;
      }
<?= $this->endsection('css'); ?>

<?= $this->section('content'); ?>
      <div class="container">
        <div class="header">
          <h1 class="welcome text-center my-5">About</h1>
          <div class="contaier">
            <div class="row">
              <div class="col-md-12">
                <div class="about-content p-4 my-3">
                  <h4 class="mb-3 fw-bold">Rafif Ridho</h4>

                  <p>05111840000058</p>

                  <p>PBKK - A</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<?= $this->endsection('content'); ?>