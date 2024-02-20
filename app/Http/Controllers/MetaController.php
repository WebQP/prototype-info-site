<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MetaController extends Controller
{
    public function getMeta($array, $lang)
    {
        $lang = ltrim($lang, '/');
        $data['name'] = $this->getName($array, $lang);
        $data['title'] = $this->getTitle($array, $lang);
        $data['description'] = $this->getDescription($array, $lang);
        $data['content'] = $this->getContent($array, $lang);
        $data['language'] = $lang;
        $data['languageUrl'] = $this->getLanguageUrl($lang);
        return $data;
    }

    private function getName($array, $lang)
    {
        $fieldName = 'name_' . $lang;
        if ($lang == '') {
            return $array->name;
        } else {
            return $array->$fieldName != '' ? $array->$fieldName : $array->name;
        }
    }

    private function getTitle($array, $lang)
    {
        $fieldTitle = 'title_' . $lang;
        $fieldName = 'name_' . $lang;
        if ($lang == '') {
            return $array->title != '' ? $array->title : $array->name;
        } else {
            if ($array->$fieldTitle == '') {
                if ($array->title == '') {
                    return $array->$fieldName != '' ? $array->$fieldName : $array->name;
                }
                return $array->title;
            } else {
                return $array->$fieldTitle;
            }
        }
    }

    private function getDescription($array, $lang)
    {
        $fieldTitle = 'description_' . $lang;
        $fieldName = 'name_' . $lang;
        if ($lang == '') {
            return $array->description != '' ? $array->description : $array->name;
        } else {
            if ($array->$fieldTitle == '') {
                if ($array->description == '') {
                    return $array->$fieldName != '' ? $array->$fieldName : $array->name;
                }
                return $array->description;
            } else {
                return $array->$fieldTitle;
            }
        }
    }

    private function getContent($array, $lang)
    {
        $fieldName = 'contents_' . $lang;
        if ($lang == '') {
            return $array->contents;
        } else {
            return $array->$fieldName != '' ? $array->$fieldName : $array->content;
        }
    }

    private function getLanguageUrl($lang)
    {
        if ($lang == '') {
            return ltrim($_SERVER['REQUEST_URI'], '/');
        } else {
            $urlFormatted = ltrim($_SERVER['REQUEST_URI'], '/');
            $urlFormatted = ltrim($urlFormatted, $lang);
            $urlFormatted = explode('/', $urlFormatted);
            return array_pop($urlFormatted);
        }
    }
}
