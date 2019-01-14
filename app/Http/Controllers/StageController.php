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
use App\Stage;
use Illuminate\Http\Request;
/**
 * MyClass Class Doc Comment
 *
 * @category Class
 * @package  MyPackage
 * @author   Pugofka <info@pugofka.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://www.hashbangcode.com/
 */
class StageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stages = Stage::all();
        return view('stages.index', compact('stages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request The comment
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => 'Поле :attribute обязательно к заполнению.',
            'numeric' => 'Поле :attribute должно быть числом',
        ];

        $this->validate(
            $request,
            [
                'name' => 'required|string|min:1',
                'sort' => 'required|numeric',
            ],
            $messages
        );

        if ($request->active) {
            $active = 1;
        } else {
            $active = 0;
        }

        Stage::create(
            [
                'name' => $request->name,
                'sort' => $request->sort,
                'active' =>$active
            ]
        );
        return redirect(
            route('stages.index')
        )->with('status', 'Этап успешно создан');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Stage $stage The comment
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Stage $stage)
    {
        return view('stages.edit', compact('stage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request The comment
     * @param Stage   $stage   The comment
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Stage $stage)
    {
        $messages = [
            'required' => 'Поле :attribute обязательно к заполнению.',
            'numeric' => 'Поле :attribute должно быть числом',
        ];

        $this->validate(
            $request,
            [
                'name' => 'required|string|min:1',
                'sort' => 'required|numeric',
            ],
            $messages
        );

        if ($request->active) {
            $active = 1;
        } else {
            $active = 0;
        }

        $stage->name = $request->name;
        $stage->sort = $request->sort;
        $stage->active = $active;

        $stage->save();

        return redirect(
            route('stages.index')
        )->with('status', 'Успешно обновлено');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Stage $stage The comment
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Stage $stage)
    {
        $stage->delete();
        return redirect(
            route('stages.index')
        )->with('status', 'Этап удалён с возможностью восстановления.');
    }
}
