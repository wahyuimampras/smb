<?php

namespace App\Charts;

use App\Models\Customer;
use App\Models\Supplier;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class SupplierCustomerBarChart
{
    public function build()
    {   
        $supplierData = [
            Supplier::where('address', 'like', '%Jakarta Pusat%')->count(),
            Supplier::where('address', 'like', '%Jakarta Barat%')->count(),
            Supplier::where('address', 'like', '%Jakarta Timur%')->count(),
            Supplier::where('address', 'like', '%Jakarta Selatan%')->count(),
            Supplier::where('address', 'like', '%Jakarta Utara%')->count(),
        ];
        $customerData = [
            Customer::where('address', 'like', '%Jakarta Pusat%')->count(),
            Customer::where('address', 'like', '%Jakarta Barat%')->count(),
            Customer::where('address', 'like', '%Jakarta Timur%')->count(),
            Customer::where('address', 'like', '%Jakarta Selatan%')->count(),
            Customer::where('address', 'like', '%Jakarta Utara%')->count(),
        ];

        return (new LarapexChart)->horizontalBarChart()
            ->setTitle('Count of Customers and Supplier')
            ->setSubtitle('Customers and Supplier')
            ->addData('Jumlah Supplier', $supplierData)
            ->addData('Jumlah Customer', $customerData)
            ->setXAxis(['Jakarta Pusat', 'Jakarta Barat', 'Jakarta Timur', 'Jakarta Selatan', 'Jakarta Utara'])
            ->setColors(['#ACBFA4', '#F75270']);
    }
}