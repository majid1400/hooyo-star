<?php

include "Handler.php";
include HSP_DIR . 'view.class.php';

class ResultHandler extends Handler
{
    private $ref_id;

    public function __construct()
    {
        $this->ref_id = sanitize_text_field($_GET['ref_id']);
    }

    public function index()
    {
        include HSP_OPTION . 'woocamerceApi/APIWOO.php';
        $params = [
            "result" => $this->get_result_question()[0],
            "toys" => $this->get_result_toy_handler(),
            "focus_month" => $this->data_sort()
        ];
        if ($_GET['month']) {
            View::load('panel.result.month', $params);
        } else {
            View::load('panel.result.index', $params);
        }

    }

    public function get_result_question()
    {
        global $wpdb;

        $user_number_question = $wpdb->get_results("
                SELECT *
				FROM {$wpdb->prefix}data_form_hooyo_star
				WHERE statistic_ref_id={$this->ref_id}");
        return $user_number_question;

    }

    public function get_result_toy()
    {
        global $wpdb;

        $user_number_question = $wpdb->get_results("
                SELECT `product_id`, `grid_name`, `month`
				FROM {$wpdb->prefix}hooyo_star_grid_result
				WHERE statistic_ref_id={$this->ref_id}");
        return $user_number_question;

    }

    public function convert_hosh_en_to_fa($text)
    {
        $r = unserialize($this->get_result_question()[0]->info_user)[0]["percentage_test"];

        switch ($text) {
            case "kalami":
                return ["کلامی زبانی", $r['kalami']];
                break;
            case "logical":
                return ["منطقی ریاضی", $r['logical']];
                break;
            case "pic":
                return ["تصویری فضایی", $r['pic']];
                break;
            case "motion":
                return ["حرکتی جنبشی", $r['motion']];
                break;
            case "music":
                return ["موسیقیایی", $r['music']];
                break;
            case "miyanFardi":
                return ["میان فردی", $r['miyanFardi']];
                break;
            case "daronFardi":
                return ["درون فردی", $r['daronFardi']];
                break;
            case "naturalist":
                return ["طبیعت گرا", $r['naturalist']];
                break;
        }

        return '';
    }

    public function get_focus_month()
    {
        $result = $this->get_result_question()[0];
        $r = unserialize($result->data_form_hooyo_star);
        $data = [
            'm1' => ['h' => [], 'p' => []],
            'm2' => ['h' => [], 'p' => []],
            'm3' => ['h' => [], 'p' => []],
            'm4' => ['h' => [], 'p' => []],
            'm5' => ['h' => [], 'p' => []],
            'm6' => ['h' => [], 'p' => []],
        ];
        foreach ($r[0] as $item) {
            $split = explode('_', $item);
            $hosh_split = $split[0];
            $month_split = $split[1];


            if ($month_split == 0) {
                $hosh_convert = $this->convert_hosh_en_to_fa($hosh_split);
                $data['m1']['h'][] = $hosh_convert[0];
                $data['m1']['p'][] = $hosh_convert[1];
            }
            if ($month_split == 1) {
                $hosh_convert = $this->convert_hosh_en_to_fa($hosh_split);
                $data['m2']['h'][] = $hosh_convert[0];
                $data['m2']['p'][] = $hosh_convert[1];
            }
            if ($month_split == 2) {
                $hosh_convert = $this->convert_hosh_en_to_fa($hosh_split);
                $data['m3']['h'][] = $hosh_convert[0];
                $data['m3']['p'][] = $hosh_convert[1];
            }
            if ($month_split == 3) {
                $hosh_convert = $this->convert_hosh_en_to_fa($hosh_split);
                $data['m4']['h'][] = $hosh_convert[0];
                $data['m4']['p'][] = $hosh_convert[1];
            }
            if ($month_split == 4) {
                $hosh_convert = $this->convert_hosh_en_to_fa($hosh_split);
                $data['m5']['h'][] = $hosh_convert[0];
                $data['m5']['p'][] = $hosh_convert[1];
            }
            if ($month_split == 5) {
                $hosh_convert = $this->convert_hosh_en_to_fa($hosh_split);
                $data['m6']['h'][] = $hosh_convert[0];
                $data['m6']['p'][] = $hosh_convert[1];
            }


        }

        return $data;
    }

    public function data_sort()
    {
        $data = $this->get_focus_month();

        $data_sort = [
            'm1' => [],
            'm2' => [],
            'm3' => [],
            'm4' => [],
            'm5' => [],
            'm6' => [],
        ];

        for ($i = 1; $i <= 6; $i++) {
            arsort($data["m" . $i]["p"]);
            $keys = array_keys($data["m" . $i]["p"]);
            $data_sort['m' . $i][] = $data['m' . $i]["h"][$keys[0]];
            $data_sort['m' . $i][] = $data['m' . $i]["h"][$keys[1]];
        }

        return $data_sort;
    }

    public function get_result_toy_handler()
    {
        $toys = $this->get_result_toy();

        $wc = new APIWOO();
        $res = [
            "games" => [],
            "books" => [],
            "blogs" => [],
        ];

        foreach ($toys as $toy) {
            for ($i = 1; $i <= 6; $i++) {

                if ($toy->month == $i) {
                    if ($toy->grid_name == 'بازی') {
                        $data = ["product_id" => $toy->product_id];
                        $rsult = $wc->get('wcget', 'GET', $data);
                        $res["games"][] = (object)array_merge((array)$rsult[0], (array)$toy);;
                    }
                    if ($toy->grid_name == 'کتاب') {
                        $data = ["product_id" => $toy->product_id];
                        $rsult = $wc->get('wcget', 'GET', $data);
                        $res["books"][] = (object)array_merge((array)$rsult[0], (array)$toy);;
                    }
                    if ($toy->grid_name == 'بلاگ') {
                        $data = ["product_id" => $toy->product_id];

                        $rsult = get_post($data["product_id"]);

                        $data_book = [
                            "title" => $rsult->post_title,
                            "link" => $rsult->guid,
                            "img" => get_the_post_thumbnail_url($data["product_id"], 'full'),
                        ];

                        $res["blogs"][] = (object)array_merge($data_book, (array)$toy);;
                    }
                }
            }
        }
        return $res;
    }


}
