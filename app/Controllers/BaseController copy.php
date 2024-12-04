<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Models\SettingModel;  // Import SettingModel

abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var RequestInterface
     */
    protected $request;

    /**
     * Instance of SettingModel.
     *
     * @var SettingModel
     */
    protected SettingModel $SettingModel;

    /**
     * Array untuk menyimpan data global yang akan dikirimkan ke view.
     *
     * @var array
     */
    protected $data = [];

    /**
     * @return void
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Inisialisasi SettingModel
        $this->SettingModel = new SettingModel();

        // Ambil data setting dari model
        $setting = $this->SettingModel->first();
        
        // Menyimpan data setting dalam variabel global $data
        $this->data['setting'] = $setting;

        // Menambahkan helper lainnya jika diperlukan
        $this->helpers = array_merge($this->helpers, ['setting']);
    }
}
