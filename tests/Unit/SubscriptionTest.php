<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\Subscription;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SubscriptionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_subscription_can_be_created()
    {
        $user = User::factory()->create();

        $subscription = Subscription::create([
            'user_id' => $user->id,
            'name' => 'Test Subscription',
            'description' => 'Test Subscription Description',
            'price' => 99.99,
            'start_date' => now(),
            'end_date' => now()->addMonths(1),
        ]);

        $this->assertDatabaseHas('subscriptions', [
            'id' => $subscription->id,
            'user_id' => $user->id,
            'name' => 'Test Subscription',
            'description' => 'Test Subscription Description',
            'price' => 99.99,
            'start_date' => now(),
            'end_date' => now()->addMonths(1),
        ]);
    }

}
