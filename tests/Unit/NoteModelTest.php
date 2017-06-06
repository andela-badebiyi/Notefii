<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class NoteModelTest extends TestCase
{
    use DatabaseTransactions;

    private $john;
    private $jane;
    private $note1;
    private $note2;

    protected function setUp()
    {
        parent::setUp();
        $this->setUpTestData();
    }

    public function testNoteOwner()
    {
        $this->assertTrue($this->note1->owner->name == 'John Doe');
        $this->assertTrue($this->note2->owner->name == 'John Doe');
    }

    public function testSharedWith() {
        $this->shareJohnNotesWithJane();
        $this->assertTrue($this->note1->sharedWith->count() === 1);
        $this->assertTrue($this->note1->sharedWith->first()->name === 'Jane Doe');
    }


    private function setUpTestData()
    {
        $john = [
            'name' => 'John Doe',
            'email' => 'johndoe@gmail.com',
            'password' => 'test123'
        ];

        $jane = [
            'name' => 'Jane Doe',
            'email' => 'janedoe@gmail.com',
            'password' => 'test123'
        ];

        $note1 = ['title' => 'john\'s notes'];
        $note2 = ['title' => 'jane\'s notes'];

        $this->john = factory(\App\User::class)->create($john);
        $this->jane = factory(\App\User::class)->create($jane);

        $note1['user_id'] = $this->john->id;
        $note2['user_id'] = $this->john->id;

        $this->note1 = factory(\App\Note::class)->create($note1);
        $this->note2 = factory(\App\Note::class)->create($note2);
    }

    private function shareJohnNotesWithJane()
    {
        DB::table('note_user')->insert([
            'user_id' => $this->jane->id,
            'note_id' => $this->note1->id
        ]);

        DB::table('note_user')->insert([
            'user_id' => $this->jane->id,
            'note_id' => $this->note2->id
        ]);
    }
}
