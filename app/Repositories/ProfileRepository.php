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
            'birthday' => $inputs['birthday'],
            'gender' => $inputs['gender'],
            'phone' => $inputs['phone'],
            'address' => $inputs['address'],
            'graduation_inst' => $inputs['graduation_inst'],
            'graduation_date' => $inputs['graduation_date'],
            ]
        )->save();
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
        $profile->birthday = $inputs['birthday'];
        $profile->gender = $inputs['gender'];
        $profile->phone = $inputs['phone'];
        $profile->address = $inputs['address'];
        $profile->graduation_inst = $inputs['graduation_inst'];
        $profile->graduation_date = $inputs['graduation_date'];
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
