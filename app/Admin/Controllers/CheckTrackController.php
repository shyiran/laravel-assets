<?php

namespace App\Admin\Controllers;

use App\Admin\Actions\Grid\RowAction\CheckTrackUpdateAction;
use App\Admin\Grid\Displayers\RowActions;
use App\Admin\Repositories\CheckTrack;
use App\Models\CheckRecord;
use App\Support\Data;
use App\Support\Support;
use App\Traits\ControllerHasTab;
use Dcat\Admin\Admin;
use Dcat\Admin\Grid;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Widgets\Alert;
use Dcat\Admin\Widgets\Tab;

/**
 * @property int status
 * @property int check_id
 */
class CheckTrackController extends AdminController
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
        $tab->addLink(Data::icon('record') . trans('main.check_record'), admin_route('check.records.index'));
        $tab->add(Data::icon('track') . trans('main.check_track'), $this->renderGrid(), true);
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
        return Grid::make(new CheckTrack(['checker']), function (Grid $grid) {
            $grid->column('id');
            $grid->column('check_id');
            $grid->column('item_id')->display(function ($item_id) {
                $check = CheckRecord::where('id', $this->check_id)->first();
                if (empty($check)) {
                    return admin_trans_label('Record None');
                } else {
                    $check_item = $check->check_item;
                    $item = Support::getItemRecordByClass($check_item, $item_id);
                    if (empty($item)) {
                        return admin_trans_label('Item None');
                    } else {
                        return $item->name;
                    }
                }
            });
            $grid->column('status')->using(Data::checkTrackStatus());
            $grid->column('checker.name');
            $grid->column('created_at');
            $grid->column('updated_at');

            $grid->disableRowSelector();
            $grid->disableBatchActions();
            $grid->disableCreateButton();
            $grid->disableEditButton();
            $grid->disableViewButton();
            $grid->disableDeleteButton();

            $grid->actions(function (RowActions $actions) {
                // @permissions
                if (Admin::user()->can('check.track.update') && $this->status == 0) {
                    $actions->append(new CheckTrackUpdateAction());
                }
            });

            $grid->toolsWithOutline(false);

            $grid->quickSearch('id', 'check_id', 'checker.name')
                ->placeholder(trans('main.quick_search'))
                ->auto(false);
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
