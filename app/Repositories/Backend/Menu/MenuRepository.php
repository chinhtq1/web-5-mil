<?php

namespace App\Repositories\Backend\Menu;

use App\Exceptions\GeneralException;
use App\Models\Menu\Menu;
use App\Repositories\BaseRepository;

/**
 * Class MenuRepository.
 */
class MenuRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Menu::class;

    /**
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->query()
            ->select([
                config('access.menus_table') . '.id',
                config('access.menus_table') . '.name',
                config('access.menus_table') . '.type',
                config('access.menus_table') . '.created_at',
                config('access.menus_table') . '.updated_at',
            ]);
    }

    /**
     * @param array $input
     *
     * @return bool
     * @throws \App\Exceptions\GeneralException
     *
     */
    public function create(array $input)
    {
        if ($this->query()->where('name', $input['name'])->first()) {
            throw new GeneralException(trans('exceptions.backend.menus.already_exists'));
        }

        $input['created_by'] = access()->user()->id;

        if (Menu::create($input)) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.menus.create_error'));
    }

    /**
     * @param \App\Models\Menu\Menu $menu
     * @param  $input
     *
     * @throws \App\Exceptions\GeneralException
     *
     * return bool
     */
    public function update(Menu $menu, array $input)
    {
        if ($this->query()->where('name', $input['name'])->where('id', '!=', $menu->id)->first()) {
            throw new GeneralException(trans('exceptions.backend.menus.already_exists'));
        }

        $input['updated_by'] = access()->user()->id;

        if ($menu->update($input)) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.menus.update_error'));
    }

    /**
     * @param \App\Models\Menu\Menu $menu
     *
     * @return bool
     * @throws \App\Exceptions\GeneralException
     *
     */
    public function delete(Menu $menu)
    {
        if ($menu->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.menus.delete_error'));
    }
}
