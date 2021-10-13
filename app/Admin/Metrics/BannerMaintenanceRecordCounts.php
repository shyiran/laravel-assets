<?php

namespace App\Admin\Metrics;

use App\Models\MaintenanceRecord;
use Closure;
use Dcat\Admin\Grid\LazyRenderable as LazyGrid;
use Dcat\Admin\Traits\LazyWidget;
use Dcat\Admin\Widgets\Card;
use Illuminate\Contracts\Support\Renderable;

class BannerMaintenanceRecordCounts extends Card
{
    /**
     * @param string|Closure|Renderable|LazyWidget $content
     *
     * @return BannerMaintenanceRecordCounts
     */
    public function content($content): BannerMaintenanceRecordCounts
    {
        if ($content instanceof LazyGrid) {
            $content->simple();
        }
        $value = MaintenanceRecord::count();
        $text = trans('main.maintenance_record_counts');
        $route = admin_route('maintenance.records.index');
        $html = <<<HTML
<a href="{$route}">
    <div class="small-box" style="padding:0 20px;height:100px;margin-bottom: 0;border-radius: .25rem;background: url('static/images/purple.png') no-repeat;background-size: 100% 100%;">
    <div class="inner">
        <h4 style="color: white;font-size: 30px;text-shadow: #888888 1px 1px 2px;">{$value}</h4>
        <p style="color: white;text-shadow: #888888 1px 1px 2px;">{$text}</p>
    </div>
</div>
</a>
HTML;

        $this->content = $this->formatRenderable($html);
        $this->noPadding();

        return $this;
    }
}
