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
use App\Clients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Spatie\LaravelImageOptimizer\Facades\ImageOptimizer;
/**
 * MyClass Class Doc Comment
 *
 * @category Class
 * @package  MyPackage
 * @author   Pugofka <info@pugofka.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://www.hashbangcode.com/
 */
class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Clients::orderBy('sort')->get();
        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
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
        $this->validate(
            $request, [
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:20000',
                'name'  => 'required|string|max:255',
                'sort'  => 'numeric'
            ],
            [
                '*.required' => 'Заполните обязательное поле',
            ]
        );
        
        $img = $request->file('image')->store('uploads', 'public');
        $imgName = explode('/', $img);
        $pathToOptimizedImage = public_path().Storage::url('opt/' . $imgName[1]);
        $pathToImage = public_path().Storage::url($img);
        ImageOptimizer::optimize($pathToImage);
        
        if ($request->active) {
            $active = 1;
        } else {
            $active = 0;
        }

        Clients::create(
            [
                'name'   => $request->name,
                'active' => $active,
                'image'  => $img,
                'sort'   => $request->sort
            ]
        );

        return redirect(
            route('clients.index')
        )->with('status', 'Клиент успешно добавлен');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int     $id      The comment
     * @param Request $request The comment
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id, Request $request)
    {   
        $client = Clients::find($id);
        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int     $id      The comment
     * @param Request $request The comment
     * @param Clients $clients The comment
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, Request $request, Clients $clients)
    {
        $clients = Clients::find($id);
        if ($request->file('image')) {
            $img = $request->file('image')->store('uploads', 'public');
            $clients->image = $img;
        }
        if ($request->active) {
            $active = 1;
        } else {
            $active = 0;
        }

        $clients->name   = $request->input('name');
        $clients->active = $active;
        $clients->sort   = $request->input('sort');
        $clients->save();
        return redirect(
            route('clients.index')
        )->with('status', 'Клиент успешно обновлен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Clients $client The comment
     *
     * @return \Illuminate\Http\RedirectResponse The comment
     * @throws \Exception
     */
    public function destroy(Clients $client)
    {
        $client->delete();
        return redirect(route('clients.index'))->with('status', 'Клиент удалён.');
    }
}
