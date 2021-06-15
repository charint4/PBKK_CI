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

    $data = [
      'title' => 'Daftar Komik',
      'komik' => $this->komikModel->getKomik(),
    ];

    

    return view('komik/index', $data);
  }

  public function detail($slug)
  {
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
      'validation' => \Config\Services::validation(),
    ];

    return view('komik/create', $data);
  }

  public function save()
  {
    if(!$this->validate([
      'title' => [
        'rules' => 'required|is_unique[komik.title]',
        'errors' => [
          'required' => 'Comic {field} needs to be filled',
          'is_unique' => 'Comic {field} must be unique',
        ]
      ],
    ])) {
      $validation = \Config\Services::validation();
      return redirect()->to('/komik/create')->withInput()->with('validation', $validation);
    }

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