<?php namespace CodeCommerce\Http\Controllers\Auth;

use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\User;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller {


	use AuthenticatesAndRegistersUsers;


	public function __construct()
	{
		$this->middleware('guest', ['except' => 'getLogout']);
	}

    public function getRegister()
    {
        return view('auth.register');
    }

    public function postRegister(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $this->validateProfile($request);

        $dataUser = $request->all();
        unset($dataUser['profile']);

        $user = $this->create($dataUser);

        $user->profile()->create($request->get('profile'));

        Auth::login($user);

        return redirect('/');
    }

    public function validateProfile(Request $request)
    {
        $this->validate($request, [
            'profile.cep' => 'required',
            'profile.endereco' => 'required',
            'profile.numero' => 'required',
            'profile.bairro' => 'required',
            'profile.cidade' => 'required',
            'profile.estado' => 'required',
        ], [
            'profile.cep.required' => 'CEP é requerido',
            'profile.endereco.required' => 'Endereço é requerido',
            'profile.numero.required' => 'Número é requerido',
            'profile.bairro.required' => 'Bairro é requerido',
            'profile.cidade.required' => 'Cidade é requerido',
            'profile.estado.required' => 'Estado é requerido',
        ]);
    }

    public function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

}
