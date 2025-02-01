<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\Auth\EmailVerifyRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\Auth\EmailVerifyResource;
use App\Http\Resources\Auth\LoginResource;
use App\Http\Resources\Auth\RegisterResource;
use App\Http\UseCase\Auth\EmailVerifyUseCase;
use App\Http\UseCase\Auth\LoginUseCase;
use App\Http\UseCase\Auth\RegisterUseCase;

class AuthController extends Controller
{
    /**
     * @param LoginRequest $request
     * @param LoginUseCase $useCase
     * @return LoginResource
     */
    public function login(LoginRequest $request, LoginUseCase $useCase): LoginResource
    {
        $useCase->execute($request->makeData());

        return new LoginResource(null);
    }

    /**
     * @param RegisterRequest $request
     * @param RegisterUseCase $useCase
     * @return RegisterResource
     */
    public function register(RegisterRequest $request, RegisterUseCase $useCase): RegisterResource
    {
        $useCase->execute($request->makeData());

        return new RegisterResource(null);
    }

    /**
     * @param EmailVerifyRequest $request
     * @param EmailVerifyUseCase $useCase
     * @return EmailVerifyResource
     */
    public function verifyEmail(EmailVerifyRequest $request, EmailVerifyUseCase $useCase): EmailVerifyResource
    {
        $useCase->execute($request->token);

        return new EmailVerifyResource(null);
    }
}
