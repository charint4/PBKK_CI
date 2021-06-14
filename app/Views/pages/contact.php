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

      .about-content > p{
        margin-bottom: 0;
      }
<?= $this->endsection('css'); ?>
  

<?= $this->section('content'); ?>
      <div class="container">
        <div class="header">
          <h1 class="welcome text-center my-5">Contact</h1>
          <div class="contaier">
            <div class="row">
              <div class="col-md-12">
                <div class="about-content p-4 my-3">
                  <h4 class="mb-3 fw-bold">Contact Info</h4>

                  <p>address : Komplek GBI C1/14 Kabupaten Bandung</p>
                  <p>email : rafifridhoo@gmail.com</p>

                  <p>phone : +6285322850963</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<?= $this->endsection('content'); ?>
