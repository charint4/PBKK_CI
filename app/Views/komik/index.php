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

      .image-cover{
        width: 100px;
      }

      .table > tbody > tr > * {
        vertical-align: middle;
      }


<?= $this->endsection('css'); ?>


<?= $this->section('content'); ?>
<div class="container">
  <div class="header">
    <h1 class="welcome text-center my-5">Comic List</h1>
    <div class="container">
      <div class="row">
        <div class="col-md-12 my-3 p-4 content">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Cover</th>
                <th scope="col">Title</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1 ?>
              <?php foreach($komik as $k) : ?>
              <tr>
                <th scope="row"><?= $i++; ?></th>
                <td><img src="/img/<?= $k['cover']; ?>" alt="" class="image-cover"></td>
                <td><?= $k['title']; ?></td>
                <td>
                  <a href="/komik/<?= $k['slug']; ?>" class="btn">detail</a>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endsection('content'); ?>