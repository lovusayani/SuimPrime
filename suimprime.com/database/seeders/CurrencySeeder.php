<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Currency;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currencies = [
            [
                'currency_name' => 'United States Dollar',
                'currency_symbol' => '$',
                'currency_code' => 'USD',
                'is_primary' => true,
                'currency_position' => 'left',
                'thousand_separator' => ',',
                'decimal_separator' => '.',
                'no_of_decimal' => 2,
            ],
            [
                'currency_name' => 'Euro',
                'currency_symbol' => '€',
                'currency_code' => 'EUR',
                'is_primary' => false,
                'currency_position' => 'left',
                'thousand_separator' => ',',
                'decimal_separator' => '.',
                'no_of_decimal' => 2,
            ],
            [
                'currency_name' => 'Indian Rupee',
                'currency_symbol' => '₹',
                'currency_code' => 'INR',
                'is_primary' => false,
                'currency_position' => 'left',
                'thousand_separator' => ',',
                'decimal_separator' => '.',
                'no_of_decimal' => 2,
            ],
        ];

        foreach ($currencies as $currency) {
            Currency::create($currency);
        }
    }
}
