<?php

namespace App\Repositories\Backend\Subcribes;

use DB;
use Carbon\Carbon;
use App\Models\Subcribes\Subcribe;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SubcribeRepository.
 */
class SubcribeRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Subcribe::class;

    /**
     * This method is used by Table Controller
     * For getting the table data to show in
     * the grid
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->query()
            ->select([
                config('module.subcribes.table').'.id',
                config('module.subcribes.table').'.created_at',
                config('module.subcribes.table').'.updated_at',
            ]);
    }

    /**
     * For Creating the respective model in storage
     *
     * @param array $input
     * @throws GeneralException
     * @return bool
     */
    public function create(array $input)
    {
        if (Subcribe::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.subcribes.create_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Subcribe $subcribe
     * @throws GeneralException
     * @return bool
     */
    public function delete(Subcribe $subcribe)
    {
        if ($subcribe->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.subcribes.delete_error'));
    }
}
