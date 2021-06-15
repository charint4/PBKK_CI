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

  public function delete($id)
  {
    $this->komikModel->delete($id);
    session()->setFlashdata('message', 'Comic deleted succesfully.');
    return redirect()->to('/komik');
  }

  public function edit($slug)
  {
    $data = [
      'title' => 'Edit Comic Form',
      'validation' => \Config\Services::validation(),
      'komik' => $this->komikModel->getKomik($slug),
    ];

    return view('komik/edit', $data);
  }

  public function update($id)
  {
    //cek title
    $komikLama = $this->komikModel->getKomik($this->request->getVar('slug'));
    if($komikLama['title'] == $this->request->getVar('title')){
      $rules_title = 'required';
    } else {
      $rules_title = 'required|is_unique[komik.title]';
    }

    if(!$this->validate([
      'title' => [
        'rules' => $rules_title,
        'errors' => [
          'required' => 'Comic {field} needs to be filled',
          'is_unique' => 'Comic {field} must be unique',
        ]
      ],
    ])) {
      $validation = \Config\Services::validation();
      return redirect()->to('/komik/edit/'. $this->request->getVar('slug'))->withInput()->with('validation', $validation);
    }

    $slug = url_title($this->request->getVar('title'), '-', true);
    $this->komikModel->save([
      'id' => $id,
      'title' => $this->request->getVar('title'), 
      'slug' => $slug,
      'author' => $this->request->getVar('author'), 
      'publisher' => $this->request->getVar('publisher'), 
      'cover' => $this->request->getVar('cover'), 
    ]);

    session()->setFlashData('message', 'Comic updated succesfully.');

    return redirect()->to('/komik');
  }
}