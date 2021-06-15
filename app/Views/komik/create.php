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
<div class="container">
  <div class="header">
    <h1 class="welcome text-center my-5">Insert Comic</h1>
    <div class="container">
      <div class="row">
        <div class="col-md-12 my-3 p-4 content">
          <form action="/komik/save" method="post">
            <?= csrf_field(); ?> 
            <div class="mb-3">
              <label for="title" class="form-label">Comic Title</label>
              <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp" autofocus>
            </div>
            <div class="mb-3">
              <label for="author" class="form-label">Author</label>
              <input type="text" class="form-control" id="author" name="author" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="publisher" class="form-label">Publisher</label>
              <input type="text" class="form-control" id="publisher" name="publisher" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="cover" class="form-label">Cover</label>
              <input type="text" class="form-control" id="cover" name="cover" aria-describedby="emailHelp">
            </div>
            <button type="submit" class="btn">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endsection('content'); ?>