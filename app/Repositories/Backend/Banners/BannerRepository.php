<?php

namespace App\Repositories\Backend\Banners;

use App\Events\Backend\Banners\BannerCreated;
use App\Events\Backend\Banners\BannerDeleted;
use App\Events\Backend\Banners\BannerUpdated;
use DB;
use Carbon\Carbon;
use App\Models\Banners\Banner;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * Class BannerRepository.
 */
class BannerRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Banner::class;

    protected $upload_path;

    protected $storage;

    public function __construct()
    {
        $this->upload_path = 'img' . DIRECTORY_SEPARATOR . 'banner' . DIRECTORY_SEPARATOR;
        $this->storage = Storage::disk('public');
    }

    public function getForDataTable()
    {
        return $this->query()
            ->leftjoin(config('access.users_table'), config('access.users_table') . '.id', '=', config('module.banners.table') . '.created_by')
            ->select([
                config('module.banners.table') . '.id',
                config('module.banners.table').'.title1',
                config('module.banners.table').'.title2',
                config('module.banners.table').'.featured_image',
                config('module.banners.table').'.created_at',
                config('module.banners.table').'.updated_at',
                config('module.banners.table') . '.status',
                config('module.banners.table') . '.created_by',
                config('access.users_table') . '.first_name as user_name',
            ]);
    }


    public function create(array $input)
    {
        DB::transaction(function () use ($input) {
            $input = $this->uploadImage($input);
            $input['created_by'] = access()->user()->id;

            if ($banner = Banner::create($input)) {

                event(new BannerCreated($banner));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.banners.create_error'));
        });
    }


    public function update(Banner $banner, array $input)
    {
        $input['updated_by'] = access()->user()->id;

        // Uploading Image
        if (array_key_exists('featured_image', $input)) {
            $this->deleteOldFile($banner);
            $input = $this->uploadImage($input);
        }

        DB::transaction(function () use ($banner, $input) {
            if ($banner->update($input)) {

                event(new BannerUpdated($banner));

                return true;
            }

            throw new GeneralException(
                trans('exceptions.backend.banners.update_error')
            );
        });
    }


    public function delete(Banner $banner)
    {
        DB::transaction(function () use ($banner) {
            $fileName = $banner->featured_image;
            if ($banner->delete()) {
                $this->deleteFile($fileName);
                event(new BannerDeleted($banner));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.events.delete_error'));
        });
    }

    public function uploadImage($input)
    {
        if (isset($input['featured_image']) && !empty($input['featured_image'])) {
            $avatar = $input['featured_image'];
            if ($avatar->getSize())
                $fileType = $avatar->getClientOriginalExtension();

            $fileName = time() . '-' . $avatar->getClientOriginalExtension();

            $this->storage->put($this->upload_path . $fileName . '.' . $fileType, file_get_contents($avatar->getRealPath()));

            $input = array_merge($input, ['featured_image' => $fileName . '.' . $fileType]);

            return $input;
        }
    }

    private function deleteOldFile($model)
    {
        $fileName = $model->featured_image;

        return $this->storage->delete($this->upload_path . $fileName);
    }

    private function deleteFile($fileName)
    {
        return $this->storage->delete($this->upload_path . $fileName);
    }
}
