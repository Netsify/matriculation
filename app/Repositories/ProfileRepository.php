<?php

namespace App\Repositories;

use App\Models\Profile;

class ProfileRepository extends BaseRepository
{
    /**
     * Create a new ProfileRepository instance.
     *
     * @param  App\Models\Profile $profile
     * @return void
     */
    public function __construct(Profile $profile)
    {
        $this->model = $profile;
    }

    /**
     * Create or update a profile.
     *
     * @param array $check
     * @param array $inputs
     * @return void
     */
    public function updateOrCreateProfile($check, $inputs)
    {
        $this->model->updateOrCreate($check, $inputs)->save();
    }

    /**
     * Get current profile data.
     *
     * @return void
     */
    public function getCurrentProfile()
    {
        //подумать, скорее всего нужно по другому переписать
        return $this->model->where('user_id', \Auth::id())->first();
    }
}
