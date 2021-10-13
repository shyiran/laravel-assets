<?php

namespace App\Http\Controllers;

use Ace\Uni;
use App\Models\DeviceRecord;
use App\Models\PartRecord;
use App\Models\SoftwareRecord;
use Celaraze\Response;
use Illuminate\Http\JsonResponse;
use JetBrains\PhpStorm\ArrayShape;

class QueryController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth');
    }

    /**
     * 查询资产.
     *
     * @param $asset_number
     * @return JsonResponse|array
     */
    #[ArrayShape(['code' => "int", 'message' => "string", "data" => "mixed"])]
    public function handle($asset_number): JsonResponse|array
    {
        $asset = DeviceRecord::where('asset_number', $asset_number)->first();
        if (!empty($asset)) {
            $asset->type = 'device';
            $asset->user = $asset->admin_user()->value('name');
            $asset->department = $asset->admin_user()->first()?->department()->value('name');
            if (empty($asset->user)) {
                $asset->user = '闲置';
            }
            if (empty($asset->department)) {
                $asset->department = '无所属部门';
            }
            $asset->category = $asset->category()->value('name');
            $asset->vendor = $asset->vendor()->value('name');
            return Uni::response(200, '查询成功', [$asset]);
        }

        $asset = PartRecord::where('asset_number', $asset_number)->first();
        if (!empty($asset)) {
            $asset->type = 'part';
            $asset->device = $asset->device()->value('name');
            if (empty($asset->device)) {
                $asset->device = '闲置';
            }
            $asset->category = $asset->category()->value('name');
            $asset->vendor = $asset->vendor()->value('name');
            return Uni::response(200, '查询成功', [$asset]);
        }

        $asset = SoftwareRecord::where('asset_number', $asset_number)->first();
        if (!empty($asset)) {
            $asset->type = 'software';
            $asset->device = $asset->device()->value('name');
            if (empty($asset->device)) {
                $asset->device = '闲置';
            }
            $asset->category = $asset->category()->value('name');
            $asset->vendor = $asset->vendor()->value('name');
            return Uni::response(200, '查询成功', [$asset]);
        }

        return Uni::response(404, '没有查询到对应资产');
    }
}
