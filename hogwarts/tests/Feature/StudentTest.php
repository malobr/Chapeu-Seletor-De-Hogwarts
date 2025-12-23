<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StudentTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_view_students_list()
    {
        $response = $this->get('/students');
        $response->assertStatus(200);
        $response->assertViewIs('students.index');
    }

    public function test_can_create_student_gryffindor()
    {
        // 1 for all answers should be Gryffindor
        $response = $this->post('/students', [
            'name' => 'Harry Potter',
            'matricula' => 'HP001',
            'age' => 11,
            'sex' => 'Male',
            'blood_status' => 'Half-blood',
            'q1' => 1, // Courage
            'q2' => 1, // Phoenix
            'q3' => 1, // DADA
            'q4' => 1, // Forest
            'q5' => 1, // Fearless
        ]);

        $response->assertRedirect('/students');
        $this->assertDatabaseHas('students', [
            'name' => 'Harry Potter',
            'house' => 'Grifinória'
        ]);
    }

    public function test_can_create_student_slytherin()
    {
        // 2 for all answers should be Slytherin
        $response = $this->post('/students', [
            'name' => 'Draco Malfoy',
            'matricula' => 'DM001',
            'age' => 11,
            'sex' => 'Male',
            'blood_status' => 'Pure-blood',
            'q1' => 2,
            'q2' => 2,
            'q3' => 2,
            'q4' => 2,
            'q5' => 2,
        ]);

        $response->assertRedirect('/students');
        $this->assertDatabaseHas('students', [
            'name' => 'Draco Malfoy',
            'house' => 'Sonserina'
        ]);
    }
}
