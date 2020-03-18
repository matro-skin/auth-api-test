<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Providers\AuthServiceProvider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

final class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', [
            'except' => [ 'login', 'register' ],
        ]);
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterRequest $request)
    {

        $validated = $request->validated();
        $validated['password'] = Hash::make( $validated['password'] );

        try {
            User::create( $validated );
        } catch (\Exception $e) {
            report($e);
            abort(400,'Register failed');
        }

        return response([
            'status' => 'success',
        ]);

    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRequest $request)
    {

        if(! Auth::attempt( $this->credentials($request) )) {
            abort(401, 'Invalid login or password');
        }

        $user = $request->user();

        try {
            $tokenResult = $user->createToken('Personal Access Token');
            $token = $tokenResult->token;
            $token->save();
        }
        catch (\Exception $e) {
            report($e);
            abort(400, 'Token store failed');
        }

        return $this->respondWithToken($tokenResult);

    }

    /**
     * @param Request $request
     *
     * @return array
     */
    private function credentials(Request $request)
    {
        return [
            'email' => $request->email,
            'password'=> $request->password,
        ];
    }

    /**
     * @param $token
     *
     * @return \Illuminate\Http\Response
     */
    private function respondWithToken($token)
    {
        return response([
            'access_token' => $token->accessToken,
            'expires_at' => Carbon::parse( $token->token->expires_at )->toDateTimeString()
        ])->header('Authorization', $token->accessToken);
    }

    public function refresh(Request $request)
    {
        try {
            $request->user()->token()->update([
                'expires_at' => now()->addDays( AuthServiceProvider::TOKEN_EXPIRED ),
            ]);
        }
        catch (\Exception $e) {
            report($e);
            abort(400,'Refresh failed');
        }

        return response([
            'status' => 'success',
        ]);
    }

    public function me()
    {
        return response([
            'status' => 'success',
            'data' => new UserResource( $this->guard()->user() ),
        ]);
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();

        return response([
            'status' => 'success',
        ]);
    }

    /**
     * @return mixed
     */
    private function guard()
    {
        return Auth::guard('api');
    }

}
