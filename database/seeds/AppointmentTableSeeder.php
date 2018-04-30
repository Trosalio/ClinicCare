<?php

use Illuminate\Database\Seeder;

class AppointmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // delete pre-existing data
        DB::table('diagnoses')->delete();
        DB::table('appointments')->delete();

        factory(\App\Appointment::class, 30)->create()->each(function ($appointment) {
            if($appointment->save()){
                if($appointment->status === 1){
                    $diagnose = factory(\App\Diagnosis::class)->make();
                    $diagnose->appointment()->associate($appointment);
                    $diagnose->client()->associate($appointment->client);
                    $diagnose->doctor()->associate($appointment->doctor);
                    $diagnose->save();
                }
            }
        });
    }
}
