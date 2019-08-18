<?php

namespace App\Http\Controllers;

//use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class HomeController extends Controller
{
    public function home()
    {
/*        $settings1 = [
            'chart_title'           => 'Количество записавшихся на приём за последние 7 дней',
            'chart_type'            => 'line',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\\Appointment',
            'group_by_field'        => 'start_time',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'filter_days'           => '7',
            'group_by_field_format' => 'd-m-Y H:i:s',
            'column_class'          => 'col-md-4',
            'entries_number'        => '5',
        ];

        $chart1 = new LaravelChart($settings1);

        $settings2 = [
            'chart_title'        => 'Специалисты',
            'chart_type'         => 'pie',
            'report_type'        => 'group_by_string',
            'model'              => 'App\\Specialization',
            'group_by_field'     => 'name',
            'aggregate_function' => 'count',
            'filter_field'       => 'created_at',
            'column_class'       => 'col-md-4',
            'entries_number'     => '5',
        ];

        $chart2 = new LaravelChart($settings2);

        $settings4 = [
            'chart_title'           => 'Количество записей за последние 7 дней',
            'chart_type'            => 'bar',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\\Appointment',
            'group_by_field'        => 'start_time',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'filter_days'           => '7',
            'group_by_field_format' => 'd-m-Y H:i:s',
            'column_class'          => 'col-md-4',
            'entries_number'        => '5',
        ];

        $chart4 = new LaravelChart($settings4);*/
//, compact('chart1', 'chart2', 'chart4')
        return view('index');
    }
}
