<?php

use Illuminate\Database\Seeder;

class FormaPgtoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\Modules\Plano\Models\FormaPagamento::class, 3)->create();
    }
}
