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
     * Create a profile.
     *
     * @param array $check
     * @param array $inputs
     * @return void
     */
    public function createProfile($inputs)
    {
        $this->model->create(
            ['user_id' => \Auth::id(),
            'school' => $inputs['school'],
            'graduation_year' => $inputs['graduation_year'],
            'citizenship' => $inputs['citizenship'],
            'city' => $inputs['city'],
            'address' => $inputs['address']
            ])->save();
    }

    /**
     * Update a profile.
     *
     * @param array $inputs
     * @param $profile
     * @return void
     */
    public function updateProfile($inputs, $profile)
    {
        $profile->school = $inputs['school'];
        $profile->graduation_year = $inputs['graduation_year'];
        $profile->citizenship = $inputs['citizenship'];
        $profile->city = $inputs['city'];
        $profile->address = $inputs['address'];
        $profile->save();
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
