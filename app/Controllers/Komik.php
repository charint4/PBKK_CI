<?php

namespace App\Controllers;

use App\Models\KomikModel;

class Komik extends BaseController
{
  protected $komikModel;
  public function __construct()
  {
    $this->komikModel = new KomikModel();
  }

  public function index()
  {
    // $komik = $this->komikModel->findAll();

    $data = [
      'title' => 'Daftar Komik',
      'komik' => $this->komikModel->getKomik(),
    ];

    

    return view('komik/index', $data);
  }

  public function detail($slug)
  {
    // $komik = $this->komikModel->getKomik($slug);
    $data = [
      'title' => 'Comic Detail',
      'komik' => $this->komikModel->getKomik($slug),
    ];

    if(empty($data['komik'])) {
      throw new \CodeIgniter\Exceptions\PageNotFoundException('Title'. $slug . 'not found');
    }

    return view('komik/detail', $data);
  }

  public function create()
  {
    $data = [
      'title' => 'Insert Comic Form',
    ];

    return view('komik/create', $data);
  }

  public function save()
  {
    $slug = url_title($this->request->getVar('title'), '-', true);
    $this->komikModel->save([
      'title' => $this->request->getVar('title'), 
      'slug' => $slug,
      'author' => $this->request->getVar('author'), 
      'publisher' => $this->request->getVar('publisher'), 
      'cover' => $this->request->getVar('cover'), 
    ]);

    session()->setFlashData('message', 'Comic inserted succesfully.');

    return redirect()->to('/komik');
  }
}