<?php
namespace App\Traits;

use App\Model\DeviceIntegration as ModelDeviceIntegration;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

trait DeviceIntegration {

    public function storeDeviceAns($data){

        $comid = $data['comp_id'];
        $device_log = $data['device_log'] ? ($data['device_log'] == 'yes' ? 1 : 0) : null;
        $file = $data->file('device_log_file');
        $fileName = null;
        $filePath = null;

        $qsDevice               = new ModelDeviceIntegration();
        $qsDevice->com_id       = $comid;
        $qsDevice->is_upload    = $device_log;
        if(file_exists($file)){
            $extension          = $file->getClientOriginalExtension();
            $fileName           = 'device_log_file'.'.'.$extension;
            $file->storeAs(Str::slug($data['companyName']),$fileName,'public');
            $filePath           = 'storage/app/public/'.Str::slug($data->companyName);
        }
        $qsDevice->file_name    = $fileName;
        $qsDevice->file_path    = $filePath;
        $qsDevice->added_by     = Auth::user()->id;
        $qsDevice->updated_by   = null;
        $qsDevice->save();
    }

}
