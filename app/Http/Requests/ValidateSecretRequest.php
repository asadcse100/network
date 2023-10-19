<?php

namespace App\Http\Requests;

use Cache;
use Crypt;
use Google2FA;
use App\Models\Publisher;
use Request;
use Session;
use Illuminate\Validation\Factory as ValidatonFactory;

class ValidateSecretRequest extends Request
{
    private $publisher;

    public function __construct(ValidatonFactory $factory)
    {
        $factory->extend(
            'valid_token',
            function ($attribute, $value, $parameters, $validator) {
                $secret = Crypt::decrypt($this->publisher->google2fa_secret);

                return Google2FA::verifyKey($secret, $value);
            },
            'Not a valid token'
        );

        $factory->extend(
            'used_token',
            function ($attribute, $value, $parameters, $validator) {
                $key = $this->publisher->id . ':' . $value;

                return !Cache::has($key);
            },
            'Cannot reuse token'
        );
    }

    public function authorize()
    {
        try {
            $this->publisher = Publisher::findOrFail(
                session('2fa:publisher:id')
            );
        } catch (Exception $exc) {
            return false;
        }

        return true;
    }

    public function rules()
    {
        return [
            'totp' => 'bail|required|digits:6|valid_token|used_token',
        ];
    }
}
