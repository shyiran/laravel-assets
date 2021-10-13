<?php

return [
    'labels' => [
        'title' => '盘点',
        'description' => '一项清查资产的任务',
        'records' => '盘点任务',
        'User' => '负责人',
        'Report' => '生成报告',
        'Record None' => '没有此盘点任务',
        'Item None' => '没有此物资',
        'Incomplete' => '还有未完成的相同盘点，请先处理',
        'Cancel Record' => '取消盘点任务',
        'Cancel Fail Done' => '失败，此项盘点任务已经完成了。',
        'Cancel Fail Cancelled' => '失败，此项盘点任务已经取消过了。',
        'Cancelled' => '盘点任务已经取消！',
        'Cancel Confirm' => '取消此盘点任务？',
        'Cancel Confirm Description' => '取消后，相应的盘点追踪将全部被移除。',
        'Finish Record' => '完成盘点任务',
        'Finish Fail Done' => '失败，此项盘点任务已经被完成过了。',
        'Finish Fail Cancelled' => '失败，此项盘点任务已经被提前中止了。',
        'Finished' => '太棒了，已经完成了此项盘点全部内容！',
        'Finish Fail Left' => '失败，至少还有一项未完成的盘点追踪：',
        'Finish Confirm' => '完成盘点任务？',
        'Finish Confirm Description' => '请确认已经完成了所有相关的盘点追踪工作。',
    ],
    'fields' => [
        'check_item' => '盘点项目',
        'start_time' => '开始时间',
        'end_time' => '结束时间',
        'user' => [
            'name' => '负责人',
        ],
        'checker' => [
            'name' => '盘点人',
        ],
        'check_id' => '任务ID',
        'item_id' => '物件',
        'status' => '状态',
        'creator' => '创建者',
        'check_all_counts' => '盘点总数',
        'check_yes_counts' => '盘盈数量',
        'check_no_counts' => '盘亏数量',
        'check_left_counts' => '未盘数量',
    ],
    'options' => [
    ],
];
