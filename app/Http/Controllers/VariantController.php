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
use App\Task;
use App\Variant;
use Illuminate\Http\Request;
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
class VariantController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request The comment
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->ajax()) {
            Validator::make(
                $request->all(), [
                    'name' => 'required|min:2',
                    'task' => 'required',
                ]
            )->validate();

            $task = Task::find($request->task);
            if (!$task) {
                return response('task not found', 404);
            }
            $variant = Variant::create(
                [
                    'name' => $request->name,
                    'task_id' => $request->task
                ]
            );
            return response(['message'=> 'ok', 'id' => $variant->id], 201);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request The comment
     * @param Variant $variant This is model Variant
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Variant $variant)
    {
        if ($request->ajax()) {
            Validator::make(
                $request->all(),
                [
                    'name' => 'required|min:2',
                    'task' => 'required',
                    'id' => 'required',
                ]
            )->validate();

            $variant->name = $request->name;
            $variant->task_id = $request->task;
            $variant->save();

            return response(['message'=> 'ok', 'id' => $variant->id], 201);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Variant $variant This is model Variant
     * @param Request $request The comment
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function destroy(Variant $variant, Request $request)
    {
        $variant->delete();
        if ($request->ajax()) {
            return response('Variant deleted', 200);
        }

    }

}
