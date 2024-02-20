<?php

namespace App\Services;

use App\Models\Data\DataLocalisation;

class MetaSeoService
{
    public static function pageSeo(int $typePage, object $data): object
    {
        $lang = ltrim(request()->route()->getPrefix(), '/');
        $modelLocal = app('typePage');
        $dataPageLocal = (object)[];

        if ($lang != '') {
            $idLocal = DataLocalisation::where('prefix', $lang)->select('id')->first();
            $dataPageLocal = $modelLocal[$typePage]['local']
            ->where('page_id', $data->id)
            ->where('localisation_id', $idLocal->id)
            ->first();
            if (!isset($dataPageLocal->id)) {
                $dataPageLocal = (object)[];
            }
        }

        $content = (object)[];
        $content->title = self::title($data, $dataPageLocal, $lang);
        $content->description = self::description($data, $dataPageLocal, $lang);
        $content->language = $lang;
        $content->languageUrl = self::languageUrl($data, $lang);

        return $content;
    }

    private static function title(object $data, object $dataPageLocal, string $lang): string
    {
        $dataTitle = $data->title != '' ? $data->title : $data->name;

        if ($lang != '') {
            if (isset($dataPageLocal->id)) {
                return $dataPageLocal->title != '' ? $dataPageLocal->title : $dataPageLocal->name;
            }
        }
        return $dataTitle;
    }

    private static function description(object $data, object $dataPageLocal, string $lang): string
    {
        $dataDescription = $data->description != '' ? $data->description : $data->name;
        if ($lang != '') {
            if (isset($dataPageLocal->id)) {
                return $dataPageLocal->description != '' ? $dataPageLocal->description : $dataPageLocal->name;
            }
        }
        return $dataDescription;
    }

    private static function languageUrl(object $data, string $lang): string
    {
        if ($lang == '') {
            return '/' . $data->slug;
        } else {
            return '/' . $lang . '/' . $data->slug;
        }
    }
}
