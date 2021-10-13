<?php

namespace App\Admin\Metrics;

use App\Models\User;
use Closure;
use Dcat\Admin\Grid\LazyRenderable as LazyGrid;
use Dcat\Admin\Traits\LazyWidget;
use Dcat\Admin\Widgets\Card;
use Illuminate\Contracts\Support\Renderable;

class BannerMyAssetsWorth extends Card
{
    /**
     * @param string|Closure|Renderable|LazyWidget $content
     *
     * @return BannerMyAssetsWorth
     */
    public function content($content): BannerMyAssetsWorth
    {
        if ($content instanceof LazyGrid) {
            $content->simple();
        }
        $user = User::find(auth('admin')->user()->id);
        $value = $user->itemsPrice();
        $text = trans('main.my_assets_worth');
        $html = <<<HTML
<div class="small-box" style="padding:0 20px;height:100px;margin-bottom: 0;border-radius: .25rem;background: url('static/images/green.png') no-repeat;background-size: 100% 100%;">
    <div class="inner">
        <h4 style="color: white;font-size: 30px;text-shadow: #888888 1px 1px 2px;">{$value}</h4>
        <p style="color: white;text-shadow: #888888 1px 1px 2px;">{$text}</p>
    </div>
</div>
HTML;

        $this->content = $this->formatRenderable($html);
        $this->noPadding();

        return $this;
    }
}
