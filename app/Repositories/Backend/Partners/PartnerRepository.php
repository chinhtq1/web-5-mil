<?php

namespace App\Repositories\Backend\Partners;

use App\Events\Backend\Partners\PartnerCreated;
use App\Events\Backend\Partners\PartnerDeleted;
use App\Events\Backend\Partners\PartnerUpdated;
use DB;
use Carbon\Carbon;
use App\Models\Partners\Partner;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * Class PartnerRepository.
 */
class PartnerRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Partner::class;

    protected $upload_path;

    protected $storage;

    public function __construct()
    {
        $this->upload_path = 'img' . DIRECTORY_SEPARATOR . 'partner' . DIRECTORY_SEPARATOR;
        $this->storage = Storage::disk('public');
    }

    public function getForDataTable()
    {
        return $this->query()
            ->leftjoin(config('access.users_table'), config('access.users_table') . '.id', '=', config('module.partners.table') . '.created_by')
            ->select([
                config('module.partners.table') . '.id',
                config('module.partners.table').'.name',
                config('module.partners.table').'.featured_image',
                config('module.partners.table').'.created_at',
                config('module.partners.table').'.updated_at',
                config('module.partners.table') . '.status',
                config('module.partners.table') . '.created_by',
                config('access.users_table') . '.first_name as user_name',
            ]);
    }


    public function create(array $input)
    {
        DB::transaction(function () use ($input) {
            $input = $this->uploadImage($input);
            $input['created_by'] = access()->user()->id;

            if ($partner = Partner::create($input)) {

                event(new PartnerCreated($partner));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.partners.create_error'));
        });
    }


    public function update(Partner $partner, array $input)
    {
        $input['updated_by'] = access()->user()->id;

        // Uploading Image
        if (array_key_exists('featured_image', $input)) {
            $this->deleteOldFile($partner);
            $input = $this->uploadImage($input);
        }

        DB::transaction(function () use ($partner, $input) {
            if ($partner->update($input)) {

                event(new PartnerUpdated($partner));

                return true;
            }

            throw new GeneralException(
                trans('exceptions.backend.partners.update_error')
            );
        });
    }


    public function delete(Partner $partner)
    {
        DB::transaction(function () use ($partner) {
            $fileName = $partner->featured_image;
            if ($partner->delete()) {
                $this->deleteFile($fileName);
                event(new PartnerDeleted($partner));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.partners.delete_error'));
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
