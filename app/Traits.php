<?php

namespace App\Traits;

use App\Controllers\BaseController;

trait BaseControllerTrait
{
    protected $baseController;

    // Inisialisasi BaseController hanya sekali
    public function initializeBaseController()
    {
        if (!$this->baseController) {
            $this->baseController = new BaseController();
            $this->baseController->initController($this->request, $this->response, \Config\Services::logger());
        }
    }

    // Menggunakan method render dari BaseController
    public function renderView(string $view, array $data = [])
    {
        // Pastikan BaseController sudah diinisialisasi
        $this->initializeBaseController();

        // Gabungkan data dari BaseController dan data controller ini
        $data = array_merge($this->baseController->data, $data);

        // Render view
        return $this->baseController->render($view, $data);
    }
}
