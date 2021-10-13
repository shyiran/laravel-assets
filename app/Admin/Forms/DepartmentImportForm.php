<?php

namespace App\Admin\Forms;

use App\Models\Department;
use App\Services\LDAPService;
use Box\Spout\Common\Exception\IOException;
use Box\Spout\Common\Exception\UnsupportedTypeException;
use Dcat\Admin\Http\JsonResponse;
use Dcat\Admin\Widgets\Form;
use Dcat\EasyExcel\Excel;
use Exception;
use League\Flysystem\FileNotFoundException;

class DepartmentImportForm extends Form
{
    /**
     * 处理表单提交逻辑.
     *
     * @param array $input
     *
     * @return JsonResponse
     */
    public function handle(array $input): JsonResponse
    {
        $success = 0;
        $fail = 0;

        if ($input['type'] == 'file') {
            $file = $input['file'];
            $file_path = public_path('uploads/' . $file);

            try {
                $rows = Excel::import($file_path)->first()->toArray();
                foreach ($rows as $row) {
                    try {
                        if (!empty($row['名称'])) {
                            $department = new Department();
                            $department->name = $row['名称'];
                            if (!empty($row['描述'])) {
                                $department->description = $row['描述'];
                            }
                            if (!empty($row['父级部门'])) {
                                $parent_department = Department::where('name', $row['父级部门'])->first();
                                if (empty($parent_department)) {
                                    $parent_department = new Department();
                                    $parent_department->name = $row['父级部门'];
                                    $parent_department->save();
                                }
                                $department->parent_id = $parent_department->id;
                            }
                            $department->save();
                            $success++;
                        } else {
                            $fail++;
                        }
                    } catch (Exception $exception) {
                        $fail++;
                    }
                }

                return $this->response()
                    ->success(trans('main.success') . ': ' . $success . ' ; ' . trans('main.fail') . ': ' . $fail)
                    ->refresh();
            } catch (IOException $e) {
                return $this->response()
                    ->error(trans('main.file_io_error') . $e->getMessage());
            } catch (UnsupportedTypeException $e) {
                return $this->response()
                    ->error(trans('main.file_format') . $e->getMessage());
            } catch (FileNotFoundException $e) {
                return $this->response()
                    ->error(trans('main.file_none') . $e->getMessage());
            }
        }

        if ($input['type'] == 'ldap') {
            $result = LDAPService::importUserDepartments($input['mode']);
            return $this->response()
                ->success(trans('main.success') . ': ' . $result[0] . ' ; ' . trans('main.fail') . ': ' . $result[1])
                ->refresh();
        }
    }

    /**
     * 构造表单.
     */
    public function form()
    {
        $this->select('type')
            ->when('file', function (Form $form) {
                $form->file('file')
                    ->help(admin_trans_label('File Help'))
                    ->accept('xlsx,csv')
                    ->autoUpload()
                    ->uniqueName();
            })
            ->when('ldap', function (Form $form) {
                $form->radio('mode')
                    ->options(['rewrite' => admin_trans_label('Rewrite'), 'merge' => admin_trans_label('Merge')])
                    ->default('merge');
            })
            ->options(['file' => admin_trans_label('File'), 'ldap' => admin_trans_label('LDAP')])
            ->required()
            ->default('file');
    }
}
