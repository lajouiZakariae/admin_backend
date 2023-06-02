<?php

namespace App\Controllers;

use App\Models\UserModel;

class Product extends BaseController {

    public function index() {

        return $this->response->setJSON((new UserModel())
                ->findAll()
        );
    }

    public function store() {

        return $this->response->setJSON([
            $this->request->getJSON()
        ]);
    }
}
