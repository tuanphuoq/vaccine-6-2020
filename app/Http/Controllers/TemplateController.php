<?php

namespace App\Http\Controllers;
use App\Template;
use App\Question;
use Illuminate\Http\Request;
use DB;

class TemplateController extends Controller
{
    public function index()
    {
        $templates = Template::all();
        return view('admin.template.index', [
            'templates' => $templates
        ]);
    }

    public function addTemplate()
    {
        return view('admin.template.add');
    }

    public function add(Request $req)
    {
        $template['template_name'] = $req->template_name;
        $newTemp = Template::create($template);
        if ($newTemp) {
            foreach ($req->questions as $item) {
                if ($item != null && $item != '') {
                    $question['template_id'] = $newTemp->id;
                    $question['question'] = $item;
                    Question::create($question);
                }
            }
            return redirect()->route('admin.template.add')->with('success', 'Tạo mới mẫu khai báo thành công.');
        } else {
            return redirect()->route('admin.template.add')->with('error', 'Tạo mới mẫu khai báo thất bại.');
        }
    }

    public function view($id)
    {
        $template = Template::find($id);
        $template['questions'] = Question::where('template_id', $id)->get()->toArray();
        return view('admin.template.view', ['template' => $template, 'isEdit' => false]);
    }

    public function edit($id)
    {
        $template = Template::find($id);
        $template['questions'] = Question::where('template_id', $id)->get()->toArray();
        return view('admin.template.view', ['template' => $template, 'isEdit' => true]);
    }

    public function save(Request $req)
    {
        $id = $req->template_id;
        DB::beginTransaction();
        try {
            // update template_name
            $template = Template::find($id);
            $template->template_name = $req->template_name;
            $template->save();
            
            // if (Question::where('template_id', $id)->delete()) {
                Question::where('template_id', $id)->delete();
                foreach ($req->questions as $item) {
                    if ($item != null && $item != '') {
                        $question['template_id'] = $id;
                        $question['question'] = $item;
                        Question::create($question);
                    }
                }
            // } else {
            //     return redirect()->route('admin.template.view', ['id' => $id])->with('error', 'Cập nhật mẫu khai báo thất bại.');
            // }
            DB::commit();
            return redirect()->route('admin.template.view', ['id' => $id])->with('success', 'Cập nhật mẫu khai báo thành công.');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.template.view', ['id' => $id])->with('error', 'Cập nhật mẫu khai báo thất bại.');
            // throw new Exception($e->getMessage());
        }
    }

    public function answerTemplateView($orderID)
    {
        $answers = Answer::where('order_id', $orderID)->get();
        if 
    }
}
