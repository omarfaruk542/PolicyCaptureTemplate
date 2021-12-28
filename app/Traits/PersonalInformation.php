<?php
namespace App\Traits;

use App\Model\PersonalInfo;
use Illuminate\Support\Facades\Auth;

trait PersonalInformation {


    public function storePIMSAns($data){

        $pims_upload        = $data['pims_upload'] ? ($data['pims_upload'] == 'yes' ? 1 : 0) : null;
        $pims               = new PersonalInfo;
        $pims->com_id       = $data['comp_id'];
        $pims->is_upload    = $pims_upload;
        $pims->added_by     = Auth::user()->id;
        $pims->updated_by   = null;
        $pims->save();
    }

}
