<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
  protected $table = 'users';
  protected $primaryKey = 'id';
  protected $allowedFields = ['username', 'email', 'password', 'created_at', 'updated_at'];
  protected $useTimestamps = true;
  protected $useSoftDeletes = false; // Jika Anda ingin menggunakan soft delete, ubah ini ke true

  // Validasi saat menyimpan data
  protected $validationRules = [
    'username' => 'required|alpha_numeric_space|min_length[3]|is_unique[users.username]',
    'email'    => 'required|valid_email|is_unique[users.email]',
    'password' => 'required|min_length[6]',
  ];

  protected $validationMessages = [
    'username' => [
      'required' => 'Username harus diisi.',
      'is_unique' => 'Username sudah digunakan.',
      'min_length' => 'Username harus minimal 3 karakter.',
    ],
    'email' => [
      'required' => 'Email harus diisi.',
      'valid_email' => 'Email harus valid.',
      'is_unique' => 'Email sudah digunakan.',
    ],
    'password' => [
      'required' => 'Password harus diisi.',
      'min_length' => 'Password harus minimal 6 karakter.',
    ],
  ];

  // Fungsi untuk registrasi pengguna baru
  public function registerUser($data)
  {
    $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
    return $this->insert($data);
  }

  // Fungsi untuk login pengguna
  public function loginUser($email, $password)
  {
    $user = $this->where('email', $email)->first();

    if ($user && password_verify($password, $user['password'])) {
      return $user; // Login berhasil
    }

    return false; // Login gagal
  }
}
