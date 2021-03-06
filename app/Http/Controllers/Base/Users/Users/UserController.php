<?php

namespace App\Http\Controllers\Base\Users\Users;

use App\Domain\Base\Users\Users\Actions\UserStoreAction;
use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Domain\Base\Users\Users\DTO\UserDTO;
use App\Http\Requests\Base\Users\Users\UserLogInRequest;
use App\Http\Requests\Base\Users\Users\UserSignUpRequest;
use App\Http\ViewModels\Base\Users\Users\UserIndexVM;
use App\Http\ViewModels\Base\Users\Users\UserShowVM;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        return response()->json(Response::success((new UserIndexVM())->toArray()));
    }

    public function show(UserShowRequest $request){
        return response()->json(Response::success((new UserShowVM($request->validated()))->toArray()));
    }

    public function sign_up(UserSignUpRequest $request){

        $user = UserStoreAction::execute(UserDTO::fromRequest($request->validated()));

        // TODO: send sms or gmail verification message


        $token = $user->createToken('personal access token',$user->arrayOrRoles() ?? []);
        $user->setAttribute('token', $token->accessToken);

        return response()->json(Response::success($user), 200);
    }

    public function log_in(UserLogInRequest $request){
        $user = (new UserShowVM(UserDTO::fromRequest($request->validated())))->toArray();

        if(!Hash::check($request->password, $user->password)){
            return response()->json(Response::createErrorResponse('invalid credentials'));
        }
        $token = $user->createToken('personal access token',$user->arrayOrRoles() ?? []);
        $user->setAttribute('token', $token->accessToken);
        return response()->json(Response::success($user));
    }

    public function update(){

    }

    public function destroy(){

    }
}
