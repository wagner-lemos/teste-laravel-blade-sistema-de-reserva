<?php

namespace Database\Factories;

use App\Models\Reservation;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReservationFactory extends Factory
{
    protected $model = Reservation::class;

    public function definition()
    {
        $currentYear = date('Y');
        $nextYear = date('Y') + 1;
        $startDate = strtotime(date("Y-m-d"));

        $date = $this->faker->dateTimeBetween(date('Y-m-d', $startDate), $nextYear . '-12-31')->format('Y-m-d');
        $startDateTime = $this->faker->dateTimeBetween($date . ' 18:00:00', $date . ' 23:59:00')->format('Y-m-d H:i:s');
        $endDateTime = $this->faker->dateTimeBetween($startDateTime, $date . ' 23:59:00')->format('Y-m-d H:i:s');
        $email = $this->faker->email;
        $name = $this->faker->name;

        return [
            'date' => $date,
            'start_time' => $startDateTime,
            'end_time' => $endDateTime,
            'email' => $email,
            'name' => $name,
        ];
    }
}
