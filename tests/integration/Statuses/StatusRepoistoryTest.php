<?php

use Larabook\Statuses\StatusRepository;
use Laracasts\TestDummy\Factory as Dummy;

class StatusRepoistoryTest extends \Codeception\TestCase\Test
{
   /**
    * @var \IntegrationTester
    */
    protected $tester;
    protected $repo;

    protected function _before()
    {
        $this->repo = new StatusRepository();
    }

    /** @test */
    public function it_gets_all_statuses_for_a_user()
    {
        // given I have 2 users
       $users = Dummy::times(2)->create('Larabook\Users\User');

        // Statuses for both of them.
        Dummy::times(2)->create('Larabook\Statuses\Status', [
            'user_id' => $users[0]->id
        ]);

        Dummy::times(2)->create('Larabook\Statuses\Status', [
            'user_id' => $users[1]->id
        ]);

        // when I fetch statuses for one user
        $statusesForUser = $this->repo->getAllForUser($users[0]);

        // Then I should receive only the relevant ones
        $this->assertCount(2, $statusesForUser);
    }

    /** @test */
    public function it_saves_a_status_for_a_user()
    {
        // Given I have an unsaved status
        $status = Dummy::create('Larabook\Statuses\Status', [
            'user_id' => null,
            'body' => 'My status'
        ]);

        // And an existing user
        $user = Dummy::create('Larabook\Users\User');

        // When I try to persist this status
        $this->repo->save($status, $user->id);

        // Then it should be saved, and have the correct user_id
        $this->tester->seeRecord('statuses', [
            'body' => 'My status',
            'user_id' => $user->id
        ]);
    }

}