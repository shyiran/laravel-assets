<?php

namespace App\Admin\Controllers;

use App\Admin\Actions\Grid\RowAction\SoftwareTrackDeleteAction;
use App\Admin\Grid\Displayers\RowActions;
use App\Admin\Repositories\SoftwareTrack;
use App\Support\Data;
use App\Traits\ControllerHasTab;
use Dcat\Admin\Admin;
use Dcat\Admin\Grid;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Widgets\Alert;
use Dcat\Admin\Widgets\Tab;

/**
 * @property string deleted_at
 */
class SoftwareTrackController extends AdminController
{
    use ControllerHasTab;

    /**
     * 标签布局.
     * @return Row
     */
    public function tab(): Row
    {
        $row = new Row();
        $tab = new Tab();
        $tab->addLink(Data::icon('record') . trans('main.record'), admin_route('software.records.index'));
        $tab->addLink(Data::icon('category') . trans('main.category'), admin_route('software.categories.index'));
        $tab->add(Data::icon('track') . trans('main.track'), $this->renderGrid(), true);
        $tab->addLink(Data::icon('statistics') . trans('main.statistics'), admin_route('software.statistics'));
        $tab->addLink(Data::icon('column') . trans('main.column'), admin_route('software.columns.index'));
        $row->column(12, $tab);
        return $row;
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid(): Grid
    {
        return Grid::make(new SoftwareTrack(['software', 'device']), function (Grid $grid) {
            $grid->column('id');
            $grid->column('software.name');
            $grid->column('device.asset_number');
            $grid->column('created_at');
            $grid->column('updated_at');

            /**
             * 行操作按钮.
             */
            $grid->actions(function (RowActions $actions) {
                // @permissions
                if (Admin::user()->can('software.track.delete') && $this->deleted_at == null) {
                    $actions->append(new SoftwareTrackDeleteAction());
                }
            });

            /**
             * 快速搜索.
             */
            $grid->quickSearch('id', 'software.name', 'device.asset_number')
                ->placeholder(trans('main.quick_search'))
                ->auto(false);

            /**
             * 筛选.
             */
            $grid->filter(function (Grid\Filter $filter) {
                if (admin_setting('switch_to_filter_panel')) {
                    $filter->panel();
                }
                $filter->scope('history', admin_trans_label('History Scope'))->onlyTrashed();
            });

            /**
             * 按钮控制.
             */
            $grid->disableCreateButton();
            $grid->disableRowSelector();
            $grid->disableBatchActions();
            $grid->disableViewButton();
            $grid->disableEditButton();
            $grid->disableDeleteButton();
            $grid->toolsWithOutline(false);
        });
    }

    /**
     * Make a show builder.
     *
     * @return Alert
     */
    protected function detail(): Alert
    {
        return Data::unsupportedOperationWarning();
    }

    /**
     * Make a form builder.
     *
     * @return Alert
     */
    protected function form(): Alert
    {
        return Data::unsupportedOperationWarning();
    }
}
