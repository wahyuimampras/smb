<?php

namespace App\Charts;

use App\Models\Customer;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class CustomerPieChart
{
    public function build()
    {   
        $data = [
            Customer::where('address', 'like', '%Jakarta Pusat%')->count(),
            Customer::where('address', 'like', '%Jakarta Barat%')->count(),
            Customer::where('address', 'like', '%Jakarta Timur%')->count(),
            Customer::where('address', 'like', '%Jakarta Selatan%')->count(),
            Customer::where('address', 'like', '%Jakarta Utara%')->count(),
        ];


        return (new LarapexChart)->pieChart()
            ->setTitle('Customers Distribution')
            ->setSubtitle('Tahun 2026')
            ->addData($data)
            ->setLabels(['Jakarta Pusat', 'Jakarta Barat', 'Jakarta Timur', 'Jakarta Selatan', 'Jakarta Utara'])
            ->setColors(['#FF8383', '#DD9E59', '#99AD7A', '#73A5CA', '#C9BEFF']);
    }
}