<?php

namespace App\Utils;

class Skpi {

    static function getSettingByName ($name) {
        $setting = \App\Models\Pengaturan::where('nama', $name)->first();
        if (!$setting) {
            return null;
        }

        $settingType = $setting->tipe;
        $settingValue = $setting->nilai ?? '';

        if ($settingType == 'json') {
            $settingValue = json_decode($settingValue);
        }

        return $settingValue;
    }

}
