<?php

namespace App\Repositories\Backend\Events;

use App\Events\Backend\Events\EventCreated;
use App\Events\Backend\Events\EventDeleted;
use App\Events\Backend\Events\EventUpdated;
use DB;
use Carbon\Carbon;
use App\Models\Events\Event;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * Class EventRepository.
 */
class EventRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Event::class;

    protected $upload_path;

    protected $storage;

    public function __construct()
    {
        $this->upload_path = 'img'.DIRECTORY_SEPARATOR.'event'.DIRECTORY_SEPARATOR;
        $this->storage = Storage::disk('public');
    }

    public function getForDataTable()
    {
        return $this->query()
            ->leftjoin(config('access.users_table'), config('access.users_table').'.id', '=', config('module.events.table').'.created_by')
            ->select([
                config('module.events.table').'.id',
                config('module.events.table').'.name',
                config('module.events.table').'.publish_datetime',
                config('module.events.table').'.start_datetime',
                config('module.events.table').'.end_datetime',
                config('module.events.table').'.status',
                config('module.events.table').'.created_by',
                config('module.events.table').'.created_at',
                config('access.users_table').'.first_name as user_name',
            ]);
    }


    public function create(array $input)
    {

        DB::transaction(function () use ($input) {
            $input['slug'] = Str::slug($input['name']);
            $input['publish_datetime'] = Carbon::parse($input['publish_datetime']);
            $input['start_datetime'] = Carbon::parse($input['start_datetime']);
            $input['end_datetime'] = Carbon::parse($input['end_datetime']);

            if ($input['start_datetime']->gt($input['end_datetime']) ) {
                throw new GeneralException(trans('exceptions.backend.events.create_time_error'));
            }

            $input = $this->uploadImage($input);
            $input['created_by'] = access()->user()->id;

            if ($event = Event::create($input)) {

                event(new EventCreated($event));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.events.create_error'));
        });
    }


    public function update(Event $event, array $input)
    {
        $input['slug'] = Str::slug($input['name']);
        $input['publish_datetime'] = Carbon::parse($input['publish_datetime']);
        $input['start_datetime'] = Carbon::parse($input['start_datetime']);
        $input['end_datetime'] = Carbon::parse($input['end_datetime']);
        $input['updated_by'] = access()->user()->id;

        if ($input['start_datetime']->gt($input['end_datetime']) ) {
            throw new GeneralException(trans('exceptions.backend.events.create_time_error'));
        }
        // Uploading Image
        if (array_key_exists('featured_image', $input)) {
            $this->deleteOldFile($event);
            $input = $this->uploadImage($input);
        }

        DB::transaction(function () use ($event, $input) {
            if ($event->update($input)) {

                event(new EventUpdated($event));

                return true;
            }

            throw new GeneralException(
                trans('exceptions.backend.blogs.update_error')
            );
        });
    }


    public function delete(Event $event)
    {
        DB::transaction(function () use ($event) {
            $fileName = $event->featured_image;
            if ($event->delete()) {
                $this->deleteFile($fileName);
                event(new EventDeleted($event));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.events.delete_error'));
        });
    }

    public function uploadImage($input)
    {
        $avatar = $input['featured_image'];

        if (isset($input['featured_image']) && !empty($input['featured_image'])) {

            if ($avatar->getSize())
            $fileType = $avatar->getClientOriginalExtension();

            $fileName = time().'-'.Str::slug($input['name']);

            $this->storage->put($this->upload_path.$fileName.'.'.$fileType, file_get_contents($avatar->getRealPath()));

            $input = array_merge($input, ['featured_image' => $fileName.'.'.$fileType]);

            return $input;
        }
    }

    private function deleteOldFile($model)
    {
        $fileName = $model->featured_image;

        return $this->storage->delete($this->upload_path.$fileName);
    }

    private function deleteFile($fileName)
    {
        return $this->storage->delete($this->upload_path.$fileName);
    }

    public function getBySlug($slug)
    {
        if (!is_null($this->query()->where(['slug' => $slug, 'active' => 'Publish'])->firstOrFail())) {
            return $this->query()->where(['slug' => $slug, 'active' => 'Publish'])->firstOrFail();
        }
        throw new GeneralException(trans('exceptions.backend.access.pages.not_found'));
    }


}
