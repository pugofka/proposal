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
use App\Calculation;
use App\Stage;
use App\Template;
use App\Reviews;
use App\Clients;
use App\TemplateData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Spatie\LaravelImageOptimizer\Facades\ImageOptimizer;
use PDF;
/**
 * MyClass Class Doc Comment
 *
 * @category Class
 * @package  MyPackage
 * @author   Pugofka <info@pugofka.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://www.hashbangcode.com/
 */
class CalculationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $calculations = Calculation::all();
        return view('calculations.index', compact('calculations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $templates = Template::get(['id', 'name']);
        return view('calculations.create', compact('templates'));
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
        if ($request->ajax()) {
            $deffered_tasks = [];
            $tasksData = [];
            
            foreach ($request->stages as $stage) {
                
                $stageHours = 0;
                $tasks = [];
                
                foreach ($stage['tasks'] as $task) {
                    if ($task['deffered']) {
                        $deffered_tasks[] = [
                            'id' => $task['id'],
                            'name' => $task['name'],
                        ];
                    } else {
                        $tasks[] = [
                            'id' => $task['id'],
                            'name' => $task['name'],
                            'variant_id' => $task['variant_id'],
                            'variant_name' => $task['variant_name'],
                            'hours' => $task['hours'],
                        ];
                        $stageHours += $task['hours'];
                    }
                }

                $tasksData['stages'][] = [
                    'stage_id' => $stage['id'],
                    'stage_name' => $stage['name'],
                    'tasks' => $tasks,
                    'workers' => $stage['workers'],
                    'stage_hours' => $stageHours,
                    'stage_price' => $request->cost_per_hour * $stageHours
                ];

                unset($tasks, $stageHours);
            }

            $tasksData['deffered_tasks'] = $deffered_tasks;
            //Снова отвязка
            unset($deffered_tasks);
            
            //Собственно сохранние данных
            Calculation::create(
                [
                    'name'              => $request->name,
                    'cost_per_hour'     => $request->cost_per_hour,
                    'user_name'         => $request->user_name,
                    'user_phone'        => $request->user_phone,
                    'user_email'        => $request->user_email,
                    'problem'           => $request->problem,
                    'task'              => $request->task,
                    'target'            => $request->target,
                    'template_id'       => $request->template_id,
                    'additional_tasks'  => json_encode($request->additional_tasks),
                    'tasks'             => json_encode($tasksData),
                    'info'              => json_encode($request->info)
                ]
            );
            return response(['status' => 'Расчёт успешно создан'], 201);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Calculation $calculation The comment
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Calculation $calculation)
    {
        $calculateData = Calculation::where('id', $calculation->id)->get();
        $templates = Template::get(['id', 'name']);
        return view('calculations.edit', compact('calculateData', 'templates'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request     $request     The comment
     * @param Calculation $calculation The comment
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Calculation $calculation)
    {
        if ($request->ajax()) {
            $defered_tasks = [];
            $tasksData = [];
            
            foreach ($request->stages as $stage) {
                $stageHours = 0;
                $tasks = [];
                foreach ($stage['tasks'] as $task) {
                    if ($task['deffered']) {
                        $deffered_tasks[] = [
                            'id' => $task['id'],
                            'name' => $task['name'],
                        ];
                    } else {
                        $tasks[] = [
                            'id' => $task['id'],
                            'name' => $task['name'],
                            'variant_id' => $task['variant_id'],
                            'variant_name' => $task['variant_name'],
                            'hours' => $task['hours'],
                        ];
                        $stageHours += $task['hours'];
                    }
                }

                $tasksData['stages'][] = [
                    'stage_id' => $stage['id'],
                    'stage_name' => $stage['name'],
                    'tasks' => $tasks,
                    'workers' => $stage['workers'],
                    'stage_hours' => $stageHours,
                    'stage_price' => $request->cost_per_hour * $stageHours,
                ];
                unset($tasks, $stageHours);
            }

            $tasksData['deffered_tasks'] = $defered_tasks;
            unset($defered_tasks);

            $calculation->name             = $request->name;
            $calculation->cost_per_hour    = $request->cost_per_hour;
            $calculation->user_name        = $request->user_name;
            $calculation->problem          = $request->problem;
            $calculation->task             = $request->task;
            $calculation->target           = $request->target;
            $calculation->user_phone       = $request->user_phone;
            $calculation->user_email       = $request->user_email;
            $calculation->template_id      = $request->template_id;
            $calculation->additional_tasks = json_encode($request->additional_tasks);
            $calculation->tasks            = json_encode($tasksData);
            $calculation->info             = json_encode($request->info);
            $calculation->save();

            return response(['status' => 'Расчёт успешно обновлен'], 201);
        }
    }

    /**
     * SelectTemplate
     *
     * @param Request $request The comment
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function selectTemplate(Request $request)
    {
        //Принимаем айдишник шаблона и отдаём в ответе Этапы->задачи->варианты
        if ($request->ajax()) {
            Validator::make(
                $request->all(),
                [
                    'id' => 'required',
                ]
            )->validate();

            // Получаем данные с расчетами по шаблону
            $calculateData = TemplateData::with('variant', 'task')
                ->where('template_id', $request->id)->get();
            $result = $this->getDataForCalculateTemplate($calculateData);
            return response($result, 200);
        }
    }

    /**
     * Get Data For CalculateTemplate
     *
     * @param TemplateData $calculateData geting data for CalculateTemplate
     *
     * @return array
     */
    protected function getDataForCalculateTemplate($calculateData)
    {
        // Получаем спсок всех этапов
        $stages = Stage::with('tasks')->get();

        // Формируем пустой массив,
        // в который будем складывать данные в нужной структуре
        $result = [];

        // Перебираем все этапы,
        // так как нужна красивая группировка по этапам и данные по эатапам
        foreach ($stages as $stage) {
            // фильтруем задачи этапа
            $taskForStage = $calculateData
                ->whereIn('task_id', $stage->tasks->pluck('id'))
                ->groupBy('task_id');
            $resultTask = [];
            foreach ($taskForStage as $task) {
                $resultVariant = [];
                foreach ($task as $data) {
                    $variant = $data->variant;
                    $resultVariant[] = [
                        'id' => $variant->id,
                        'name' => $variant->name,
                        'variant_time' => $data->variant_time
                    ];
                }
                if (count($resultVariant) > 0) {
                    $resultTask[] = [
                        'id' => $task->first()->task->id,
                        'name' => $task->first()->task->name,
                        'variants' => $resultVariant,
                    ];
                }
            }
            if (count($resultTask) > 0) {
                $result[] = [
                    'name' => $stage->name,
                    'id' => $stage->id,
                    'tasks' => $resultTask
                ];
            }
        }

        return $result;
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param Calculation $calculation The comment
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Calculation $calculation)
    {
        $calculation->delete();
        return redirect(
            route('calculations.index')
        )->with('status', 'Расчёт удалён');
    }

    /**
     * Function for generation PDF-file
     *
     * @param Calculation $calculation The comment
     * @param Request     $request     The comment
     *
     * @return mixed
     */
    public function generatePdf(Calculation $calculation, Request $request)
    {   
        $calculateData  = Calculation::where('id', $calculation->id)->first();
        $reviews = json_decode(
            Reviews::orderBy('sort')->where('active', '=', 1)->get()
        );
        $clients = json_decode(
            Clients::orderBy('sort')->where('active', '=', 1)->get()
        );

        // Дополнительные задачи
        $additional_tasks = json_decode($calculateData->additional_tasks);
        $stage = json_decode($calculateData->tasks);
        $stages = $stage->stages;
       
        $price      = 0;
        $taskHours  = 0;
        $stageHours = 0;
        $totalHours = 0;
        $countWeeks = 0;
        $stageweeks = 0;

        // подсчет часов задач
        for ($i=0; $i < count($additional_tasks); $i++) {
            $taskHours += $additional_tasks[$i]->hours;
        }
        // подсчет часов этапов
        for ($i=0; $i < count($stages); $i++) {
            $stageHours += $stages[$i]->stage_hours;
            $stageweeks += ceil($stages[$i]->stage_hours / 40) * 40;
        }
        
        $additionalTasksHours = ceil($taskHours / 40) * 40;
        $countWeeks = ceil(($stageweeks + $additionalTasksHours) / 40);
        $totalHours = $taskHours + $stageHours;
        $price      = $totalHours * $calculateData->cost_per_hour;
         

        $info       = json_decode($calculateData->info);
        $pdf = PDF::loadView(
            'pdf.document',
            compact(
                'calculateData',
                'price',
                'info', '
                totalHours',
                'stageHours',
                'stages',
                'countWeeks',
                'reviews',
                'clients'
            )
        );
        
        return $pdf->download($calculateData->name .'.pdf');
    }
}
