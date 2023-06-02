<?php

namespace App\Controllers;

use CodeIgniter\Files\File;

class Upload extends BaseController {
    public function image() {

        $validationRule = [
            'image' => [
                'rules' => [
                    'uploaded[image]',
                    'is_image[image]',
                    'mime_in[image,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                    // 'max_size[image,100]',
                ],
            ],
        ];

        if (!$this->validate($validationRule)) {
            return $this->response->setJSON($this->validator->getErrors());
        };

        $img = $this->request->getFile("image");

        if (!$img->hasMoved()) {
            $filepath = WRITEPATH . 'uploads/' . $img->store();

            return $this->response->setJSON(new File($filepath));
        }
    }
}
