<?php

namespace App\Admin\Metrics;

use App\Models\CheckRecord;
use App\Models\CheckTrack;
use App\Models\DeviceRecord;
use Closure;
use Dcat\Admin\Grid\LazyRenderable as LazyGrid;
use Dcat\Admin\Traits\LazyWidget;
use Dcat\Admin\Widgets\Card;
use Illuminate\Contracts\Support\Renderable;

class CheckDevicePercentage extends Card
{
    /**
     * @param string|Closure|Renderable|LazyWidget $content
     *
     * @return $this
     */
    public function content($content): CheckDevicePercentage
    {
        if ($content instanceof LazyGrid) {
            $content->simple();
        }

        $device_records_all = DeviceRecord::count();
        $check_record = CheckRecord::where('check_item', 'device')->where('status', 0)->first();
        if (!empty($check_record)) {
            $check_tracks_counts = CheckTrack::where('check_id', $check_record->id)
                ->where('status', '!=', 0)
                ->count();
            $done_counts = trans('main.check_process') . $check_tracks_counts . ' / ' . $device_records_all;

            if ($device_records_all != 0) {
                $percentage = round($check_tracks_counts / $device_records_all * 100, 2);
            } else {
                $percentage = 0;
            }

        } else {
            $done_counts = trans('main.check_none');
            $percentage = 0;
        }

        $display = <<<HTML
    <div class="progress">
      <div class="progress-bar" style="background: rgba(131,106,181,1);width: {$percentage}%"></div>
    </div>
HTML;
        if ($percentage == 0) {
            $display = '';
        }

        $html = <<<HTML
<div class="info-box" style="background:transparent;margin-bottom: 0;padding: 0;">
    <span class="info-box-icon"><i class="feather icon-monitor" style="color:rgba(33,115,186,1);"></i></span>
    <div class="info-box-content" style="display: flex;flex-direction: column;justify-content: center;">
        <span class="info-box-number">{$done_counts}</span>
        {$display}
        <span class="progress-description">
          {$percentage}%
        </span>
    </div>
</div>
HTML;

        $this->content = $this->formatRenderable($html);
        $this->noPadding();

        return $this;
    }
}
