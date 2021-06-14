    <style>
      * {
        margin: 0;
        padding: 0;
      }

      .content-wrap{
        margin: 0;
        padding: 0;
      }

      .nav-wrap{
        background-color: #6610f2;
      }

      .welcome{
        color: #6610f2;
        font-size: 100px;
        font-weight: 800;
      }

      .navbar {
        font-weight: 500;
      }

      .content {
        color: #6610f2;
        font-weight: 600;
        border: 2px solid #6610f2;
        border-radius: 20px;
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
    </style>
  </head>
  <body>
    <div class="container-fluid content-wrap">
      <div class="container-fluid nav-wrap">
        <nav class="navbar navbar-expand-lg navbar-dark nav-wrap ">
          <div class="container-fluid">
            <a class="navbar-brand" href="/">Code Igniter</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/about">About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/contact">Contact Us</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>

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
    </div>
