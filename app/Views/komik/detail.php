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
    <h1 class="my-5 text-center welcome">Comic Detail</h1>
    <div class="container px-5 content"> 
      <div class="row">
        <div class="p-4 my-3 col-md-12 d-flex justify-content-center">
          <!-- <div class="card" style="width: 18rem;"> -->
            <img src="/img/<?= $komik['cover']; ?>" class="card-img-top" alt="...">
            <!-- </div> -->
          </div>
        </div>
        <div class="content">
          <div class="row">
            <div class="flex-row col-md-12 d-flex justify-content-center">
              <h5 class="card-title"><?= $komik['title']; ?></h5>
            </div>
          </div>
          <div class="row">
            <div class="flex-row mt-4 col-md-12 d-flex justify-content-center">
              <p class="card-text"><?= $komik['author']; ?></p>
            </div>
          </div>
          <div class="row">
            <div class="flex-row m-2 col-md-12 d-flex justify-content-center">
              <p class="card-text"><?= $komik['publisher']; ?></p>
            </div>
          </div>
          <div class="row">
            <div class="flex-row m-4 col-md-12 d-flex justify-content-center">
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
          </div>
          <div class="row">
            <div class="flex-row m-4 col-md-12 d-flex justify-content-center">
              <a href="/komik/edit/<?= $komik['slug']; ?>" class="btn">edit</a>
              <form action="/komik/<?= $komik['id']; ?>" method="post">
              <input type="hidden" name="_method" value="DELETE">
                <?= csrf_field(); ?>
                <button type="submit" class="btn" onclick="return confirm('Are you sure you want to delete this comic?')">delete</button>
              </form>
              <br>
            </div>
          </div>
        </div>
        <a href="/komik" class="m-4 btn">Return</a>
      </div>
  </div>
</div>
<?= $this->endsection('content'); ?>