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
use App\Reviews;
use Illuminate\Http\Request;
use Spatie\LaravelImageOptimizer\Facades\ImageOptimizer;
use Illuminate\Support\Facades\Storage;

/**
 * MyClass Class Doc Comment
 *
 * @category Class
 * @package  MyPackage
 * @author   Pugofka <info@pugofka.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://www.hashbangcode.com/
 */
class ReviewsController extends Controller
{
    /**
     * Reviews list
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {   
        $reviews  = Reviews::orderBy('sort')->get();
        return view('reviews.index', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reviews.create');
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
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
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

        Reviews::create(
            [
                'name'   => $request->name,
                'active' => $active,
                'image'  => $img,
                'sort'   => $request->sort
            ]
        );

        return redirect(
            route('reviews.index')
        )->with('status', 'Отзыв успешно добавлен');
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
        $review = Reviews::find($id);
        return view('reviews.edit', compact('review'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int     $id      The comment
     * @param Request $request The comment
     * @param Reviews $reviews The comment
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, Request $request, Reviews $reviews)
    {
        $reviews = Reviews::find($id);
        if ($request->file('image')) {
            $img = $request->file('image')->store('uploads', 'public');
            $reviews->image = $img;
        }
        if ($request->active) {
            $active = 1;
        } else {
            $active = 0;
        }

        $reviews->name   = $request->input('name');
        $reviews->sort   = $request->input('sort');
        $reviews->active = $active;
        $reviews->save();
        return redirect(
            route('reviews.index')
        )->with('status', 'Отзыв успешно обновлен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Reviews $review The comment
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Reviews $review)
    {
        $review->delete();
        return redirect(route('reviews.index'))->with('status', 'Отзыв удалён.');
    }
}
