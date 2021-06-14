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

      .card-img-top{
        width: 300px;
      }

      .table > tbody > tr > * {
        vertical-align: middle;
      }

      .card-title {
        font-size: 50px;
        font-weight: 800;
      }

      .card-text > p {
        align-text: center;
      }


<?= $this->endsection('css'); ?>


<?= $this->section('content'); ?>
<div class="container pb-5">
  <div class="header">
    <h1 class="welcome text-center my-5">Comic Detail</h1>
    <div class="container content" style="padding: 0 200px"> 
      <div class="row">
        <div class="col-md-12 my-3 p-4 d-flex justify-content-center">
          <!-- <div class="card" style="width: 18rem;"> -->
            <img src="/img/<?= $komik['cover']; ?>" class="card-img-top" alt="...">
            <!-- </div> -->
          </div>
        </div>
        <div class="content">
          <div class="row">
            <div class="col-md-12 d-flex flex-row justify-content-center">
              <h5 class="card-title"><?= $komik['title']; ?></h5>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 mt-4 d-flex flex-row justify-content-center">
              <p class="card-text"><?= $komik['author']; ?></p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 m-2 d-flex flex-row justify-content-center">
              <p class="card-text"><?= $komik['publisher']; ?></p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 m-4 d-flex flex-row justify-content-center">
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 m-4 d-flex flex-row justify-content-center">
              <a href="" class="btn">edit</a>
              <a href="" class="btn">delete</a>
              <br>
            </div>
          </div>
        </div>
        <a href="/komik" class="btn m-4">Return</a>
      </div>
  </div>
</div>
<?= $this->endsection('content'); ?>