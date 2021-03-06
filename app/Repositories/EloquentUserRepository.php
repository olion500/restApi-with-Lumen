<?php
/**
 * Created by PhpStorm.
 * User: SangHun
 * Date: 2017-09-03
 * Time: 오후 6:12
 */

namespace App\Repositories;

use App\Repositories\Contracts\UserRepository;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class EloquentUserRepository extends AbstractEloquentRepository implements UserRepository
{

    /**
     * Model name
     *
     * @var string
     */
    protected $modelName = User::class;

    /**
     * @param array $data
     * @return $this|\Illuminate\Database\Eloquent\Model
     */
    public function save(array $data) {
        // update password
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }
        $user = parent::save($data);

        return $user;
    }
}