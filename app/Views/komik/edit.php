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
    <h1 class="my-5 text-center welcome">Edit Comic</h1>
    <div class="container">
      <div class="row">
        <div class="p-4 my-3 col-md-12 content">
          <form action="/komik/update/<?= $komik['id']; ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?> 
            <input type="hidden" name="slug" value="<?= $komik['slug']; ?>">
            <input type="hidden" name="oldCover" value="<?= $komik['cover']; ?>">
            <div class="mb-3">
              <label for="title" class="form-label">Comic Title</label>
              <input type="text" class="form-control <?= ($validation->hasError('title'))? 'is-invalid' : ''; ?>" id="title" name="title" aria-describedby="emailHelp" autofocus value="<?= (old('title')) ? old('title') : $komik['title'] ?>">
              <div class="invalid-feedback">
                <?= $validation->getError('title'); ?>
              </div>
            </div>
            <div class="mb-3">
              <label for="author" class="form-label">Author</label>
              <input type="text" class="form-control" id="author" name="author" aria-describedby="emailHelp" value="<?= (old('author')) ? old('author') :$komik['author']; ?>">
            </div>
            <div class="mb-3">
              <label for="publisher" class="form-label">Publisher</label>
              <input type="text" class="form-control" id="publisher" name="publisher" aria-describedby="emailHelp" value="<?= (old('publisher')) ? old('publisher') :$komik['publisher']; ?>">
            </div>
            <div class="mb-3">
              <label for="cover" class="form-label">Cover</label>
              <div class="col-sm-4">
                <img src="/img/<?= $komik['cover']; ?>" alt="" class="img-thumbnail img-preview">
              </div>
              <div class="mb-3 input-group">
              <input type="file" class="form-control <?= ($validation->hasError('cover'))? 'is-invalid' : ''; ?>" id="cover" name="cover" onchange="previewImg()">
              <div class="invalid-feedback">
                <?= $validation->getError('cover'); ?>
              </div>
              <label class="input-group-text" for="cover"><?= $komik['cover']; ?></label>
            </div>
            <button type="submit" class="btn">Edit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endsection('content'); ?>