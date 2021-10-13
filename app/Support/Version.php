<?php

namespace App\Support;

use JetBrains\PhpStorm\ArrayShape;

class Version
{
    #[ArrayShape(['kenya' => "string[]", 'yirgacheffe' => "string[]", 'geisha' => "string[]"])]
    public static function list(): array
    {
        return [
            'kenya' => [
                'name' => '肯亚（Kenya）',
                'description' => '肯亚即肯尼亚咖啡豆，肯尼亚咖啡大多生长在海拔1500--2100米的地方，一年中收获两次。其主要特色是鲜明的水果香，常见的水果香是柑橘。肯尼亚咖啡具有多层次感的口味和果汁的酸度，完美的柚子和葡萄酒的风味，醇度适中，是许多咖啡业内人士最喜爱的单品。肯尼亚咖啡借好莱坞电影《走出非洲》(OutofAfrica)的轰动而进一步扬名。',
            ],
            'yirgacheffe' => [
                'name' => '耶加雪菲（Yirgacheffe）',
                'description' => '耶加雪菲是座小镇，海拔1700-2100公尺，是埃塞俄比亚精品咖啡的代名词。这里自古是块湿地，古语“耶加”（Yirga）意指“安顿下来”，“雪菲”(Cheffe)意指“湿地”。这里咖啡的生产方式与风味太突出，致使埃塞俄比亚咖啡农争相以自家咖啡带有耶加雪菲风味为荣，至而成为非洲最负盛名的咖啡产区。',
            ],
            'geisha' => [
                'name' => '瑰夏（Geisha）',
                'description' => '瑰夏(Geisha)的种是在1931年从埃塞俄比亚的瑰夏森林里发现的，然后送到肯尼亚的咖啡研究所；1936年引进到乌干达和坦桑尼亚，1953年哥斯达黎加引进，巴拿马是1970年代由洞巴七农园的弗朗西可.塞拉新先生从哥斯达黎加的CATIE分到种子然后开始种植瑰夏咖啡，因为产量极低并要参与竞标，这款豆子可以说来之不易。',
            ],
        ];
    }
}
