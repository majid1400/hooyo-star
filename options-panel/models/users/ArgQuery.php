<?php


class ArgQuery
{

    private $user_age_toy;

    public function __construct($user_age_toy)
    {
        $this->user_age_toy = $user_age_toy;
    }

    public function get_submit_hosh_age()
    {


        if (!empty($this->user_age_toy) && isset($this->user_age_toy)) {
            $age = [];
            $age_blog = [];
            $hosh1 = [];
            $hosh2 = [];
            $hosh3 = [];
            $hosh4 = [];
            $hosh5 = [];
            $hosh6 = [];
            $hosh1_blog = [];
            $hosh2_blog = [];
            $hosh3_blog = [];
            $hosh4_blog = [];
            $hosh5_blog = [];
            $hosh6_blog = [];

            foreach ($this->user_age_toy[0] as $key => $check) {

                $split = explode('_', $check);
                $hosh_split = $split[0];
                $month_split = $split[1];

                $hosh_convert = self::convert_hosh_en_to_fa($hosh_split);

                if ($month_split == 0 and isset($hosh_convert)) {
                    $hosh1[] = $hosh_convert[0];
                    $hosh1_blog[] = $hosh_convert[1];
                }
                if ($month_split == 1 and isset($hosh_convert)) {
                    $hosh2[] = $hosh_convert[0];
                    $hosh2_blog[] = $hosh_convert[1];
                }
                if ($month_split == 2 and isset($hosh_convert)) {
                    $hosh3[] = $hosh_convert[0];
                    $hosh3_blog[] = $hosh_convert[1];
                }
                if ($month_split == 3 and isset($hosh_convert)) {
                    $hosh4[] = $hosh_convert[0];
                    $hosh4_blog[] = $hosh_convert[1];
                }
                if ($month_split == 4 and isset($hosh_convert)) {
                    $hosh5[] = $hosh_convert[0];
                    $hosh5_blog[] = $hosh_convert[1];
                }
                if ($month_split == 5 and isset($hosh_convert)) {
                    $hosh6[] = $hosh_convert[0];
                    $hosh6_blog[] = $hosh_convert[1];
                }
            }

            $hosh = [$hosh1, $hosh2, $hosh3, $hosh4, $hosh5, $hosh6];
            $hosh_blog = [$hosh1_blog, $hosh2_blog, $hosh3_blog, $hosh4_blog, $hosh5_blog, $hosh6_blog];


            foreach ($this->user_age_toy[1] as $key => $check) {
                $age[] = $check;
                if (isset($check)) {
                    $convert_age = self::convert_age_blog($check);
                    foreach ($convert_age as $item) {
                        $age_blog[] = $item;
                    }
                }

            }

            return [$hosh, $age, $hosh_blog, $age_blog];
        }

        return false;

    }

    public function get_toy()
    {
        if (!$this->get_submit_hosh_age()) {
            return ['در حال حاضر انتخابی انجام نشده'];
        }

        $data = [
            "hosh" => $this->get_submit_hosh_age()[0],
            "age" => $this->get_submit_hosh_age()[1],
        ];

        return $data;
    }

    public function wp_query()
    {
        $data = $this->get_toy();

        $wc = new APIWOO();
        $result = $wc->get('wc', 'GET', $data);


        return $result;
    }

    public function wp_post()
    {
        $hosh = $this->get_submit_hosh_age()[2];
        $age = $this->get_submit_hosh_age()[3];
        $args_month = [];

        foreach ($hosh as $value) {
            if (empty($value) or !isset($value)) {
                $args_month[] = false;
                continue;
            }

            $args_month[] = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'category__in' => array_merge($value, $age),
            );
        }

        $result = [
            'month_0' => ['blogs' => []],
            'month_1' => ['blogs' => []],
            'month_2' => ['blogs' => []],
            'month_3' => ['blogs' => []],
            'month_4' => ['blogs' => []],
            'month_5' => ['blogs' => []],
        ];
        for ($i = 0; $i <= 5; $i++) {
            if ($args_month[$i] != false) {
                $query = new WP_Query($args_month[$i]);
                if ($query->have_posts()) {
                    while ($query->have_posts()) {
                        $query->the_post();
                        $result['month_' . $i]['blogs'][] = [
                            'title' => strip_tags(get_the_title()),
                            'id' => get_the_ID(),
                            'permalink' => get_the_permalink(),
                            'cat' => 'بلاگ'
                        ];
                    }

                }
                wp_reset_query();
            }
        }

        return $result;
    }

    public static function convert_hosh_en_to_fa($text)
    {
        switch ($text) {
            case "kalami":
                return ["کلامی-زبانی", 1571];
                break;
            case "logical":
                return ["منطقی-ریاضی", 1570];
                break;
            case "pic":
                return ["تصویری-فضایی", 1569];
                break;
            case "motion":
                return ["حرکتی-جنبشی", 1575];
                break;
            case "music":
                return ["موسیقیایی", 1576];
                break;
            case "miyanFardi":
                return ["میان-فردی", 1573];
                break;
            case "daronFardi":
                return ["درون-فردی", 1574];
                break;
            case "naturalist":
                return ["طبیعت-گرا", 1572];
                break;
        }

        return '';
    }

    public static function convert_age_blog($text)
    {
        switch ($text) {
            case "age_group_1":
                return [1578, 1580, 1579];
                break;
            case "age_group_2":
                return [1581, 1582];
                break;
            case "age_group_3":
                return [1583, 1584];
                break;
            case "age_group_4":
                return [1585, 1586, 1587];
                break;
            case "age_group_5":
                return [1588, 1589, 1590, 1591, 1592];
                break;
            case "grown-up":
                return [1593];
                break;
        }

        return '';
    }

}

$Arg_query = new  ArgQuery($user_age_hosh_date);
