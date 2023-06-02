<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model {
    protected $table = "users";

    protected $validationRules = [
        'full_name'     => 'required',
        'username'     => 'required|alpha_numeric_space|min_length[3]',
        'email'        => 'required|valid_email|is_unique[users.email]',
        'password'     => 'required|min_length[8]',
        'pass_confirm' => 'required_with[password]|matches[password]',
    ];

    protected $allowedFields = ['username', 'password'];

    protected $beforeInsert = ["hashPassword"];

    protected function hashPassword($data) {

        if (!isset($data["data"]["password"])) return $data;

        $data["data"]["hashed_pw"] = password_hash($data["data"]["password"], PASSWORD_DEFAULT);

        unset($data["data"]["password"]);
        return $data;
    }
}
