<?php

namespace App\Charts;

use App\Models\Customer;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class CustomerBarChart
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

        return (new LarapexChart)->barChart()
            ->setTitle('Customers Distribution')
            ->setSubtitle('Tahun 2026')
            ->addData('Jumlah Pelanggan',$data)
            ->setXAxis(['Jakarta Pusat', 'Jakarta Barat', 'Jakarta Timur', 'Jakarta Selatan', 'Jakarta Utara'])
            ->setColors(['#3A8B95']);
    }
}