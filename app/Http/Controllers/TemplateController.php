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
use App\Template;
use App\TemplateData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
class TemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $templates = Template::get();
        return view('templates.index', compact('templates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('templates.create');
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
        ];

        $this->validate(
            $request, [
                'name' => 'required|string|min:1',
            ],
            $messages
        );

        $template = Template::create(
            [
                'name' => $request->name
            ]
        );

        return redirect(
            route('templates.index')
        )->with('status', 'Шаблон ' . $template->name . ' успешно создан');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Template $template The comment
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Template $template)
    {
        $stages = Stage::with(
            'tasks',
            'tasks.variants',
            'tasks.templates_data'
        )->get();
        return view('templates.show', compact('template', 'stages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Template $template The comment
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Template $template)
    {
        $stages = Stage::with(
            'tasks',
            'tasks.variants',
            'tasks.variants.templates_data',
            'tasks.templates_data'
        )->get();
        return view('templates.edit', compact('template', 'stages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request       $request  The comment
     * @param \App\Template $template The comment
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Template $template)
    {
        $messages = [
            'required' => 'Поле :attribute обязательно к заполнению.',
        ];

        $this->validate(
            $request, [
                'name' => 'required|string|min:1',
            ],
            $messages
        );

        $template->name = $request->name;

        $template->save();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Template $template The comment
     *
     * @return \Illuminate\Http\RedirectResponse The comment
     *
     * @throws \Exception
     */
    public function destroy(Template $template)
    {
        $template->delete();
        return redirect(
            route('templates.index')
        )->with('status', 'Шаблон deleted!');
    }

    /**
     * TaskStatus
     *
     * @param Request  $request  The comment
     * @param Template $template The comment
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function taskStatus(Request $request, Template $template)
    {
        try {
            $isset = (bool)$template->
            tasks->whereIn('id', $request->task_id)->count();
            if ($isset) {
                $template->tasks()->detach($request->task_id);
            } else {
                $template->tasks()->attach($request->task_id);
            }
        } catch (\Exception $e) {
            return response($e->getMessage(), 422);
        }

        return response('updated', 200);
    }

    /**
     * UpdateTime
     *
     * @param Request  $request  The comment
     * @param Template $template The comment
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function updateTime(Request $request, Template $template)
    {
        if ($request->ajax()) {
            Validator::make(
                $request->all(), [
                    'task_id' => 'required',
                    'template_id' => 'required',
                    'variant_id' => 'required',
                    'variant_time' => 'required'
                ]
            )->validate();

            TemplateData::updateOrCreate(
                [
                    'task_id' => $request->task_id,
                    'template_id' => $request->template_id,
                    'variant_id' => $request->variant_id
                ], [
                    'variant_time' => $request->variant_time
                ]
            );

            return response('updated', 200);
        }
    }
}
