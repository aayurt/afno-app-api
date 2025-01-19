<?php

namespace App\Http\Controllers\Supabase;

use GuzzleHttp\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SupabaseUsersController extends Controller
{
    private $supabaseUrl;
    private $supabaseKey;
    private $client;

    public function __construct()
    {
        $this->supabaseUrl = env('SUPABASE_URL');
        $this->supabaseKey = env('SUPABASE_SERVICE_KEY');
        $this->client = new Client(); // Guzzle client
    }

    // Fetch all users
    public function index()
    {
        try {
            $response = $this->client->request('GET', $this->supabaseUrl . "/auth/v1/admin/users", [
                'headers' => $this->getAdminHeaders(),
            ]);

            $users = json_decode($response->getBody()->getContents(), true);
            return response()->json($users);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    // Fetch a single user by ID
    public function show($id)
    {
        try {
            $response = $this->client->request('GET', $this->supabaseUrl . "/auth/v1/admin/users/$id", [
                'headers' => $this->getAdminHeaders(),
            ]);

            $user = json_decode($response->getBody()->getContents(), true);
            return response()->json($user);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    // Register a new user
    public function store(Request $request)
    {
        try {
            $response = $this->client->request('POST', $this->supabaseUrl . "/auth/v1/admin/users", [
                'headers' => $this->getAdminHeaders(),
                'json' => [
                    'email' => $request->email,
                    'password' => $request->password,
                ]
            ]);

            $user = json_decode($response->getBody()->getContents(), true);
            return response()->json($user, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    // Update an existing user
    public function update(Request $request, $id)
    {
        $userId = $request->user()->id;

        try {
            $response = $this->client->request('PATCH', $this->supabaseUrl . "/auth/v1/admin/users/$userId", [
                'headers' => $this->getAdminHeaders(),
                'json' => [
                    'data' => $request->all(),
                ]
            ]);

            $user = json_decode($response->getBody()->getContents(), true);
            return response()->json($user);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    // Delete a user
    public function destroy(Request $request)
    {
        $userId = $request->user()->id;

        try {
            $response = $this->client->request('DELETE', $this->supabaseUrl . "/auth/v1/admin/users/$userId", [
                'headers' => $this->getAdminHeaders(),
            ]);

            return response()->json(['message' => 'User deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    // Helper method to set headers for Admin API calls
    private function getAdminHeaders()
    {
        return [
            'apikey' => $this->supabaseKey,
            'Authorization' => "Bearer $this->supabaseKey", // Use service role key for admin access
            'Content-Type' => 'application/json',
        ];
    }
}
