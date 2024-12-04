<?php

namespace App\Controllers\Loans;

use App\Models\FinesPerDayModel;
use CodeIgniter\RESTful\ResourceController;
use App\Models\SettingModel;

class FineSettingsController extends ResourceController

{
      protected SettingModel $SettingModel;
    protected $setting; 

    public function __construct()
    {
      
        $this->SettingModel = new SettingModel;
        

        $this->setting = $this->SettingModel->first();
        helper('upload');
    }
    public function index()
    {
        return view('fines/settings', [
            'fine' => FinesPerDayModel::get(),
            'validation' => \Config\Services::validation(),
            'setting'       => $this->setting,
        ]);
    }

    public function show($id = null)
    {
        return $this->index();
    }

    public function update($id = null)
    {
        if (!$this->validate([
            'amount' => 'required|integer|greater_than_equal_to[1000]'
        ])) {
            $data = [
                'validation' => \Config\Services::validation(),
                'oldInput'   => $this->request->getVar(),
                'fine' => FinesPerDayModel::get(),
            ];

            return view('fines/settings', $data);
        }
        try {
            FinesPerDayModel::updateAmount($this->request->getVar('amount'));

            session()->setFlashdata(['msg' => 'Update fine amount successful']);
            return redirect('admin/fines/settings');
        } catch (\Throwable $e) {
            session()->setFlashdata(['msg' => $e->getMessage(), 'error' => true]);
            return redirect('admin/fines/settings');
        }
    }
}
