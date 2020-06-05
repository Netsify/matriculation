<?php

namespace App\Repositories;

use App\Models\Profile;
use Illuminate\Support\Collection;

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
     * @return Collection
     */
    public function getCurrentProfile()
    {
        return $this->model->with('user')->find(\Auth::id());
    }
}
