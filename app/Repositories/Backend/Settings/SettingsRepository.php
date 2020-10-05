<?php

namespace App\Repositories\Backend\Settings;

use App\Exceptions\GeneralException;
use App\Models\Settings\Setting;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Storage;

/**
 * Class SettingsRepository.
 */
class SettingsRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Setting::class;
    const SETTINGS_FOLDER = 'settings';

//    LOGO
    protected $site_logo_path;

//  FAVICON
    protected $favicon_path;

//   COMPANY_LOGO
    protected $company_logo_path;

    protected $storage;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->site_logo_path = 'img' . DIRECTORY_SEPARATOR .self::SETTINGS_FOLDER.DIRECTORY_SEPARATOR.'logo' . DIRECTORY_SEPARATOR;
        $this->favicon_path = 'img' . DIRECTORY_SEPARATOR .self::SETTINGS_FOLDER.DIRECTORY_SEPARATOR. 'favicon' . DIRECTORY_SEPARATOR;
        $this->company_logo_path = 'img' . DIRECTORY_SEPARATOR .self::SETTINGS_FOLDER.DIRECTORY_SEPARATOR. 'company-details' . DIRECTORY_SEPARATOR;
        $this->storage = Storage::disk('public');
    }


    public function update(Setting $setting, array $input)
    {
//        LOGO
        if (!empty($input['logo'])) {
            $this->removeLogo($setting, 'logo');

            $input['logo'] = $this->uploadLogo($setting, $input['logo'], 'logo');
        }

//        FAVICON
        if (!empty($input['favicon'])) {
            $this->removeLogo($setting, 'favicon');

            $input['favicon'] = $this->uploadLogo($setting, $input['favicon'], 'favicon');
        }

//        COMPANY_LOGO
        if (!empty($input['company_logo'])) {
            $this->removeLogo($setting, 'company_logo');

            $input['company_logo'] = $this->uploadLogo($setting, $input['company_logo'], 'company_logo');
        }

        if ($setting->update($input)) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.settings.update_error'));
    }

    /*
     * Upload logo image
     */
    public function uploadLogo($setting, $image, $type)
    {
        $path = $this->getPath($type);

        $image_name = time() .'-'.$type.'-'. $image->getClientOriginalName();

        $this->storage->put($path . $image_name, file_get_contents($image->getRealPath()));

        return $image_name;
    }

    /*
     * remove logo or favicon icon
     */
    public function removeLogo(Setting $setting, $type)
    {
        $path = $this->getPath($type);

        if ($setting->$type && $this->storage->exists($path . $setting->$type)) {
            $this->storage->delete($path . $setting->$type);
        }

        $result = $setting->update([$type => null]);

        if ($result) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.settings.update_error'));
    }

    private function getPath($type)
    {
        switch ($type) {
            case 'logo':
                $path = $this->site_logo_path;
                break;
            case 'favicon':
                $path = $this->favicon_path;
                break;
            case 'company_logo':
                $path = $this->company_logo_path;
                break;
            default:
                $path = 'img' . DIRECTORY_SEPARATOR .'trash'.DIRECTORY_SEPARATOR;
        }

        return $path;
    }
}
