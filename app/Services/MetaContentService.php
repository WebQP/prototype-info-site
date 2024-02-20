<?php

namespace App\Services;

use App\Models\Data\DataLocalisation;

class MetaContentService
{
    public static function pageContent(int $typePage, object $data): object
    {
        $lang = ltrim(request()->route()->getPrefix(), '/');
        $modelLocal = app('typePage');
        $arrayExceptions = ['id','status','name','content','images'];
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
        $content->id = $data->id;
        $content->status = $data->status;
        $content->name = self::name($data, $dataPageLocal, $lang);
        $content->content = self::content($data, $dataPageLocal, $lang);
        $content->images = self::images($data);

        foreach ($data->getAttributes() as $key => $value) {
            if (!in_array($key, $arrayExceptions)) {
                $content->$key = $value;
            }
        }

        return $content;
    }

    //Определяем название страницы
    private static function name(object $data, object $dataPageLocal, string $lang): string
    {
        $dataName = $data->name;

        if ($lang != '') {
            if (isset($dataPageLocal->id)) {
                return $dataPageLocal->name != '' ? $dataPageLocal->name : $dataName;
            }
        }
        return $dataName;
    }

    //Определяем контент страницы
    private static function content(object $data, object $dataPageLocal, string $lang): string
    {
        $dataContent = $data->contents;

        if ($lang != '') {
            if (isset($dataPageLocal->id)) {
                return $dataPageLocal->contents != '' ? $dataPageLocal->contents : $dataContent;
            }
        }
        return $dataContent;
    }

    private static function images(object $data): array
    {
        $listImages = [];
        if (isset($data->image_preview)) {
            $listImages[] = $data->image_preview;
        } else {
            if (isset($data->image_list)) {
                foreach (unserialize($data->image_list) as $item) {
                    $listImages[] = $item['url'];
                }
            }
        }

        return $listImages;
    }
}
