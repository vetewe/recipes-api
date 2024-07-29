<?php

namespace App\Controllers;

// use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\ResepModel;
use CodeIgniter\HTTP\ResponseInterface;

class Recipesapi extends ResourceController
{
    use ResponseTrait;
    public function index()
    {
        $model = new ResepModel();
        $data = $model->orderBy('id', 'DESC')->findAll();
        return $this->respond(['message' => 'success', 'data' => $data]);
    }

    public function show($id = null)
    {
        $model = new ResepModel();
        $data = $model->where('id', $id)->first();
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('Resep Tidak Ditemukan.');
        }
    }

    public function create()
    {
        $model = new ResepModel();
        $data = [
            'name' => $this->request->getVar('name'),
            'ingredients' => $this->request->getVar('ingredients'),
            'instructions' => $this->request->getVar('instructions'),
            'cookTimeMinutes' => $this->request->getVar('cookTimeMinutes'),
            'cuisine' => $this->request->getVar('cuisine'),
            'caloriesPerServing' => $this->request->getVar('caloriesPerServing'),
            'image' => $this->request->getVar('image'),
            'rating' => $this->request->getVar('rating'),
            'mealType' => $this->request->getVar('mealType')
        ];
        $model->insert($data);
        $response = [
            'status' => 201,
            'error' => null,
            'messages' => [
                'success' => 'Resep berhasil ditambah.'
            ]
        ];
        return $this->respondCreated($response);
    }

    public function update($id = null)
    {
        $model = new ResepModel();
        $input = $this->request->getRawInput();
        $data = [
            'name' => $input['name'],
            'ingredients' => $input['ingredients'],
            'instructions' => $input['instructions'],
            'cookTimeMinutes' => $input['cookTimeMinutes'],
            'cuisine' => $input['cuisine'],
            'tags' => $input['tags'],
            'caloriesPerServing' => $input['caloriesPerServing'],
            'image' => $input['image'],
            'rating' => $input['rating'],
            'mealType' => $input['mealType']
        ];
        $model->update($id, $data);
        $response = [
            'status' => 200,
            'error' => null,
            'messages' => [
                'success' => 'Resep Berhassil Diubah.'
            ]
        ];
        return $this->respond($response);
    }

    public function delete($id = null)
    {
        $model = new ResepModel();
        $data = $model->where('id', $id)->delete($id);
        if ($data) {
            $model->delete($id);
            $response = [
                'status' => 200,
                'error' => null,
                'messages' => [
                    'success' => 'Resep Berhasil Dihapus.'
                ]
            ];
            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('Resep Tidak Ditemukan.');
        }
    }
}
