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
      'cover' => [
        'rules' => 'max_size[cover,2048]|is_image[cover]|mime_in[cover,image/jpg,image/jpeg,image/png]',
        'errors' => [
          'max_size' => 'Cover size is too big',
          'is_image' => 'Uploaded file is not an image',
          'mime_in' => 'Uploaded file is not an image',

        ]
      ]
    ])) {
      // $validation = \Config\Services::validation();
      // return redirect()->to('/komik/create')->withInput()->with('validation', $validation);
      return redirect()->to('/komik/create')->withInput();
    }

    // ambil gambar
    $fileCover = $this->request->getFile('cover');
    // tidak ada gambar yg di upload
    if($fileCover->getError() == 4){
      $namaCover = 'naruto-cover.jpg';
    } else {
      // generate nama sampul random
      $namaCover = $fileCover->getRandomName();
      // pindahkan file ke folder img
      $fileCover->move('img', $namaCover);
    }

    $slug = url_title($this->request->getVar('title'), '-', true);
    $this->komikModel->save([
      'title' => $this->request->getVar('title'), 
      'slug' => $slug,
      'author' => $this->request->getVar('author'), 
      'publisher' => $this->request->getVar('publisher'), 
      'cover' => $namaCover, 
    ]);

    session()->setFlashData('message', 'Comic inserted succesfully.');

    return redirect()->to('/komik');
  }

  public function delete($id)
  {

    // cari gambar berdasarkan id
    $komik = $this->komikModel->find($id);

    //
    if($komik['cover'] != 'naruto-cover.jpg'){
      // hapus gambar
      unlink('img/' . $komik['cover']);
    }


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
      'cover' => [
        'rules' => 'max_size[cover,1024]|is_image[cover]|mime_in[cover,image/jpg,image/jpeg,image/png]',
        'errors' => [
          'max_size' => 'Cover size is too big',
          'is_image' => 'Uploaded file is not an image',
          'mime_in' => 'Uploaded file is not an image',

        ]
      ]
    ])) {
      return redirect()->to('/komik/edit/'. $this->request->getVar('slug'))->withInput();
    }

    $fileCover = $this->request->getFile('cover');

    if($fileCover->getError() == 4) {
      $namaCover = $this->request->getVar('oldCover');
    } else {
      $namaCover = $fileCover->getRandomName();
      $fileCover->move('img', $namaCover);
      unlink('img/'. $this->request->getVar('oldCover'));
    }



    $slug = url_title($this->request->getVar('title'), '-', true);
    $this->komikModel->save([
      'id' => $id,
      'title' => $this->request->getVar('title'), 
      'slug' => $slug,
      'author' => $this->request->getVar('author'), 
      'publisher' => $this->request->getVar('publisher'), 
      'cover' => $namaCover, 
    ]);

    session()->setFlashData('message', 'Comic updated succesfully.');

    return redirect()->to('/komik');
  }
}