<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Note;

class NotesSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Note::create([
			'type_id' => 1,
			'title' => 'First Note',
			'description' => 'This is the first seeded note.',
			'sprint' => 'Sprint 1',
			'content' => 'Content of the first note.',
			'user_id' => 1,
		]);

		Note::create([
			'type_id' => 1,
			'title' => 'Second Note',
			'description' => 'This is the second seeded note.',
			'sprint' => 'Sprint 2',
			'content' => 'Content of the second note.',
			'user_id' => 1,
		]);
	}
}
