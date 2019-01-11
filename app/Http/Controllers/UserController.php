<?php
/**
 * MyClass File Doc Comment
 * php version 7.2
 *
 * @category MyClass
 * @package  MyPackage
 * @author   Pugofka <info@pugofka.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://www.hashbangcode.com/
 */
namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
/**
 * MyClass Class Doc Comment
 *
 * @category Class
 * @package  MyPackage
 * @author   Pugofka <info@pugofka.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://www.hashbangcode.com/
 */
class UserController extends Controller
{
    /**
     * Show user
     *
     * @param User $user the comment
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(User $user)
    {
        $userData = Auth::user();
        return view('users.edit', compact('userData'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User    $user    the comment
     * @param Request $request the comment
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit(User $user, Request $request)
    {
        $messages = [
            'required' => 'Поле :attribute обязательно к заполнению.',
            'email' => 'Неверный формат e-mail',
        ];

        $this->validate(
            $request, [
                'name' => 'required',
                'email' => 'required|email'
            ],
            $messages
        );

        $user->name = $request->name;
        $user->email = $request->email;

        if (($request->password) && ($request->password != '') ) {
            Validator::make(
                $request->all(), [
                    'password' => 'confirmed|min:6',
                    'password_confirmation' => 'same:password'
                ]
            )->validate();
            $user->password = Hash::make($request->password);
        }
        $user->save();
        return redirect(url()->previous())->with('status', 'Успешно обновлено');
    }
}
