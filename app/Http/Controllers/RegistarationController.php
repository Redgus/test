<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\LoginRequest;
use App\Models\User;

use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegistarationCustomerRequest;
use App\Http\Requests\RegistarationSellerRequest;

class RegistarationController extends Controller
{
    
    public function registation_customer(RegistarationCustomerRequest $request)
    {
        $validated = $request->validated();

        $user = new User;

        $user->name = $validated['name'];

        $user->type_user = 'customer';

        $user->password = Hash::make($validated['password']);

        $user->save();

        return redirect('login');

    }

    public function registation_seller(RegistarationSellerRequest $request)
    {
        $validated = $request->validated();

        $user = new User;

        $user->name = $validated['name'];

        $user->type_user = 'seller';

        $user->market = $validated['market'];

        $user->password = Hash::make($validated['password']);

        $user->save();

        return redirect('login');

    }
}
