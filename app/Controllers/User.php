<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController {
    public function register() {
        $submitted_user = (object) [
            "username" => $this->request->getJsonVar("username"),
            "password" => $this->request->getJsonVar("password"),
        ];

        $userModel = new UserModel();

        $user = $userModel->where("username", $submitted_user->username);

        $userModel->save($user);
    }

    public function login() {
        $cridentials =  [
            "username" => $this->request->getJsonVar("username"),
            "password" => $this->request->getJsonVar("password"),
        ];

        $rules = [
            "username" => "required",
            "password" => "required",
        ];

        if (!$this->validateData($cridentials, $rules)) {
            return $this->response->setJSON(["error" => true]);
        }

        $user = (new UserModel())
            ->where("username", $this->request->getJsonVar("username"))
            ->first();

        if (!$user) {
            return $this->response->setJSON(["error" => true]);
        }

        if (/*password_verify($cridentials["password"], $user->password)*/$cridentials["password"] !== $user["password"]) {
            return $this->response->setJSON(["error" => true]);
        }

        /**
         * User is Authenticated
         */
        return $this->response->setJSON([
            "loggedIn" => true,
            "user" => $user
        ]);
    }
}
