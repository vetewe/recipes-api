<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ResepModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Resep extends BaseController
{
    public function index()
    {
        $resep = new ResepModel();
        $getdata = $resep->findAll();
        $data['list'] = $getdata;

        return view('home', $data);
    }

    public function preview($id)
    {
        //megambil data dahulu
        $resep = new ResepModel();
        $data['recipes'] = $resep->where(['id' => $id])->first();

        //cek apakah data kosong
        if (!$data['recipes']) {
            throw PageNotFoundException::forPageNotFound();
        }

        return view('detail_resep', $data);
    }

    public function create()
    {
        $validation = \Config\Services::validation();
        $validation->setRules(['name' => 'required']);
        $isDataValid = $validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $resep = new ResepModel();
            $resep->insert([
                "name" => $this->request->getPost('name'),
                "ingredients" => $this->request->getPost('ingredients'),
                "instructions" => $this->request->getPost('instructions'),
                "cookTimeMinutes" => $this->request->getPost('cookTimeMinutes'),
                "cuisine" => $this->request->getPost('cuisine'),
                "caloriesPerServing" => $this->request->getPost('caloriesPerServing'),
                "image" => $this->request->getPost('image'),
                "rating" => $this->request->getPost('rating'),
                "mealType" => $this->request->getPost('mealType')
            ]);
            return redirect('/');
        }
        return view('create_resep');
    }

    public function edit($id)
    {
        //ambil data yang akan diubah
        $resep = new ResepModel();
        $data['recipes'] = $resep->where('id', $id)->first();

        //validasi form data
        $validation = \Config\Services::validation();
        $validation->setRules(['name' => 'required']);
        $isDataValid = $validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $resep = new ResepModel();
            $resep->update($id, [
                "name" => $this->request->getPost('name'),
                "ingredients" => $this->request->getPost('ingredients'),
                "instructions" => $this->request->getPost('instructions'),
                "cookTimeMinutes" => $this->request->getPost('cookTimeMinutes'),
                "cuisine" => $this->request->getPost('cuisine'),
                "caloriesPerServing" => $this->request->getPost('caloriesPerServing'),
                "image" => $this->request->getPost('image'),
                "rating" => $this->request->getPost('rating'),
                "mealType" => $this->request->getPost('mealType')
            ]);
            return redirect('/');
        }

        return view('edit_resep', $data);
    }

    public function delete($id)
    {
        $resep = new ResepModel();
        $resep->delete($id);
        return redirect('/');
    }
}
