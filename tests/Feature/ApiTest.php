<?php

namespace Tests\Feature;

use App\Models\Employee;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiTest extends TestCase
{
    use RefreshDatabase;

    protected $token;
    protected $employee;

    public function testEmployeeRegister()
    {
        $employee = [
            'email' => 'test@test.ru',
            'password' => '123123123',
        ];
        $response = $this->postJson('api/register', $employee);
        $response->assertOk();
        $response->assertJsonPath('success', true);

        return [
            'token' => $response->json('data.token'),
            'employee' => $employee
        ];
    }

    public function testEmployeeLogin()
    {
        $employee = $this->testEmployeeRegister()['employee'];
        $response = $this->postJson('api/login', $employee);
        $response->assertOk();
        $response->assertJsonPath('success', true);
    }

    public function testTransactionsIndex()
    {
        $this->token = $this->testEmployeeRegister()['token'];
        $response = $this
            ->withToken($this->token)
            ->get('api/transactions');

        $response->assertOk();

        $response->assertJsonPath('success', true);
    }


    public function testTransactionsStore()
    {
        $this->token = $this->testEmployeeRegister()['token'];
        $transaction = [
            'employee_id' => 1,
            'hours' => 10
        ];
        $response = $this
            ->withToken($this->token)
            ->postJson('/api/transactions', $transaction);
        $response->assertOk();

        $response->assertJsonPath('success', true);
        $this->assertDatabaseHas('transactions', $transaction);
    }

    public function testPayAllTransactions()
    {
        $this->token = $this->testEmployeeRegister()['token'];
        $response = $this
            ->withToken($this->token)
            ->patch('/api/transactions/all');
        $response->assertJsonPath('success', true);
        $this->assertDatabaseMissing('transactions', [
            'is_paid' => null
        ]);
    }

}
